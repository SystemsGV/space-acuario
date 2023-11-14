$(($) => {
	sessionStorage.clear();
	("use strict");
	const t = $("#data-species").DataTable({
		responsive: true,
		dom: "Bfrtip",
		buttons: [
			{
				extend: "colvis",
				text: '<i class="fa fa-eye-slash"></i> Columnas Visibles',
			},
			{
				text: '<i class="fa fa-file-pdf-o f-18"></i> Exportar PDF',
				action: function (e, dt, node, config) {
					window.open("Reporte-Especies", "_blank");
				},
			},
		],

		language: {
			url: "../assets/json/Spanish.json",
		},
		ajax: {
			url: "API-SPECIES",
		},
		columns: [
			{
				data: "common_specie",
			},
			{
				data: "scientific_specie",
			},
			{
				data: "type_water",
			},
			{
				data: "amount_fish",
				render: function (data, type, row) {
					return `<a class="quantity_fish" href="javascript:void(0)"> ${data} (${row.total_species})</a>`;
				},
			},
			{
				data: "status",
				render: function (data, type, row) {
					return checkStatus(row.status);
				},
			},
			{
				data: "id_specie",
				render: function (data, type, row) {
					return addActions(row.id_specie);
				},
			},
		],
	});
	t.on("click", ".quantity_fish", function () {
		let item = t.row($(this).parents("tr")).data(); //Detecta a que fila hago click y me captura los datos en la variable data.
		if (t.row(this).child.isShown()) {
			//Cuando esta en tamaño responsivo
			let item = t.row(this).data();
		}
		const data = {
			quantity_fish: item.amount_fish,
			id_fish: item.id_specie,
			total_fish: item.total_species,
		};
		sessionStorage.setItem("dataSpecies", JSON.stringify(data));

		$("#mdl_quantity").modal("show");
		$("#quantityFish").val(item.total_species);
		$("#amountM").val(item.amount_fish);
		let btn = document.querySelector("#btn_quantity_minus");

		if (item.amount_fish == 0) {
			btn.disabled = true;
			btn.form.firstElementChild.disabled = true;
		} else {
			btn.disabled = false;
			btn.form.firstElementChild.disabled = false;
		}
		$("#title_quantity").text(item.common_specie);
	});

	$("#type_water, #status").select2({
		dropdownParent: $("#mdl_add .modal-body"),
	});

	$("#btn_add").on("click", (e) => {
		e.preventDefault();
		clearForm();
		$("#btn_send").removeClass("hidden");
		$("#btn_update").addClass("hidden");
		$("#title_modal").html("Agregar Especie");
		$("#mdl_add").modal("show");
		$("#process").val("save");
		$("#amount_s").removeClass("disabled");
	});

	$("#frm_specie input").keyup(function () {
		var form = $("#frm_specie").find(':input[type="text"]');
		var check = checkCampos(form);
		if (check) {
			$("#btn_send").removeClass("disabled");
		} else {
			$("#btn_send").addClass("disabled");
		}
	});

	$("#btn_send").on("click", (e) => {
		let btn = document.querySelector("#btn_send");
		e.preventDefault();
		$.ajax({
			url: "save-specie",
			type: "post",
			data: $("#frm_specie").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Guardando Especie";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				alert_type("Especie añadido correctamente", "Vista Especie", "success");
				clearForm();
				t.row
					.add({
						common_specie: r.data["common_specie"],
						scientific_specie: r.data["scientific_specie"],
						type_water: r.data["type_water"],
						amount_fish: r.data["amount_fish"],
						status: r.data["status"],
						id_specie: r.id,
					})
					.draw(false);
			})
			.fail((e) => {
				console.log(e.responseText);
				alert_type(
					"Error del sistema, Comunicarse con SISTEMAS",
					"Vista Especie",
					"error"
				);
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-save'></i> Guardar Especie";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	//EDIT SPECIES
	$("#btn_update").on("click", (e) => {
		let btn = document.querySelector("#btn_update");
		e.preventDefault();
		$.ajax({
			url: "edit-specie",
			type: "post",
			data: $("#frm_specie").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Actualizando Especie";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				alert_type(
					"Especie editado Correctamente",
					"Vista Especies",
					"success"
				);
				t.ajax.reload();
			})
			.fail((e) => {
				console.log(e.responseText);
				alert_type(
					"Error del sistema, Comunicarse con SISTEMAS",
					"Vista Especie",
					"error"
				);
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-edit'></i> Actualizar Especie";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	$("#frm_quantity").on("submit", function (e) {
		e.preventDefault();
		let btn = document.querySelector("#btn_quantity");

		const sess = JSON.parse(sessionStorage.getItem("dataSpecies"));

		const formData = new FormData(this);
		formData.append("quantity", sess.quantity_fish);
		formData.append("id_fish", sess.id_fish);
		formData.append("total_fish", sess.total_fish);

		$.ajax({
			url: "update-quantity",
			type: "post",
			data: formData,
			dataType: "json",
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> 	Aumentando Especie";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				alert_type(
					"Especie aumentado Correctamente",
					"Vista Especies",
					"success"
				);
				$("#mdl_quantity").modal("hide");
				$(this)[0].reset();
				t.ajax.reload();
			})
			.fail((e) => {
				console.log(e.responseText);
				alert_type(
					"Error del sistema, Comunicarse con SISTEMAS",
					"Vista Especie",
					"error"
				);
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-plus'></i> Aumentar Especie";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	$("#frm_minus").on("submit", function (e) {
		e.preventDefault();
		let btn = document.querySelector("#btn_quantity_minus");

		const sess = JSON.parse(sessionStorage.getItem("dataSpecies"));

		const formData = new FormData(this);
		formData.append("quantity", sess.quantity_fish);
		formData.append("id_fish", sess.id_fish);
		formData.append("total_fish", sess.total_fish);

		$.ajax({
			url: "update-minus",
			type: "post",
			data: formData,
			dataType: "json",
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> 	Disminuyendo Especie";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				alert_type(
					"Especie disminuida Correctamente",
					"Vista Especies",
					"success"
				);
				$("#mdl_quantity").modal("hide");
				$(this)[0].reset();
				t.ajax.reload();
			})
			.fail((e) => {
				console.log(e.responseText);
				alert_type(
					"Error del sistema, Comunicarse con SISTEMAS",
					"Vista Especie",
					"error"
				);
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-minus-square'></i> Disminuir Especie";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	t.on("click", ".btn_delete", function () {
		var row = t.row($(this).parents("tr")).data(); // Encuentra la fila padre del botón
		if (t.row(this).child.isShown()) {
			//Cuando esta en tamaño responsivo
			var id_specie = t.row(row).data().id_specie;
		}
		var id_specie = t.row(row).data().id_specie; // Encuentra la fila padre del botón
		Swal.fire({
			title: "Estas Seguro?",
			text: "¡Una vez eliminado, no podrás recuperar este registro!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Si, elimialo!",
		}).then((result) => {
			if (result.isConfirmed) {
				fetch("delete-specie", {
					method: "DELETE",
					headers: {
						"Content-Type": "application/json",
					},
					body: JSON.stringify({ id_specie: id_specie }),
				})
					.then((response) => response.json())
					.then((data) => {
						if (data.success) {
							// Si la eliminación fue exitosa
							Toast.fire({
								icon: "success",
								title: "El registro ha sido eliminado!",
							});
							t.row(row).remove().draw(); // Elimina la fila en la tabla
						} else {
							// Si hubo un error en la eliminación
							Toast.fire({
								icon: "error",
								title: "Hubo un error al eliminar el registro.",
							});
						}
					})
					.catch((error) => {
						console.error("Error:", error);
					});
			}
		});
	});

	$("#view-logs").on("click", viewLogs);
});

const clearForm = () => {
	$("#frm_specie")[0].reset();
	$("#type_water").val("0").trigger("change");
	$("#status").val("0").trigger("change");
};
const addActions = (i) => {
	return `<button class="btn btn-pill btn-warning btn-air-warning" type="submit" title="Editar especie" OnClick="tbl_edit(${i})"><i class="icofont icofont-edit f-18"></i></button> 
		<button class="btn_delete btn btn-pill btn-danger btn-air-danger" type="button" title="Eliminar especie"><i class="icofont  icofont-trash f-18"></i></button>`;
};
const tbl_edit = (i) => {
	$("#amount_s").addClass("disabled");
	$("#title_modal").html("Editar Especie");
	$("#btn_send").addClass("hidden");
	$("#btn_update").removeClass("hidden");
	$.ajax({
		url: "API-SPECIE",
		type: "post",
		data: { i: i },
		dataType: "json",
		beforeSend: () => {
			$("#js-busy-loader").removeClass("hidden");
		},
	}).done((data) => {
		let array = data.r;
		array.forEach((item) => {
			$("#common_n").val(item.common_specie);
			$("#scientific_n").val(item.scientific_specie);
			$("#type_water").val(item.type_water).trigger("change");
			$("#status").val(item.status).trigger("change");
			$("#amount_s").val(item.amount_fish);
			$("#id_specie").val(item.id_specie);
		});
		$("#mdl_add").modal("show");
	});
};
const checkStatus = (i) => {
	return i == 1
		? '<span class="badge rounded-pill badge-success">ACTIVO</span>'
		: '<span class="badge rounded-pill badge-danger">INACTIVO</span>';
};
const checkCampos = (obj) => {
	var camposRellenados = true;
	obj.each(function () {
		var $this = $(this);
		if ($this.val().length <= 0) {
			camposRellenados = false;
			return false;
		}
	});
	if (camposRellenados == false) {
		return false;
	} else {
		return true;
	}
};
const viewLogs = () => {
	$("#data-logs").DataTable().destroy();
	const tbl_logs = $("#data-logs").DataTable({
		order: [[3, "desc"]],
		bAutoHeader: false,
		scrollY: "50vh",
		scrollX: false,
		scrollCollapse: true,
		paging: false,
		language: {
			url: "../assets/json/Spanish.json",
		},
		ajax: {
			url: "API-LOGSPECIES",
		},
		columns: [
			{
				data: "common_specie",
			},
			{
				data: "type_log",
				render: function (data) {
					if (data === "plus") {
						return '<div class="badge badge-success label-square"><i class="fa fa-plus-square f-14"></i><span class="f-14"> &nbsp; INGRESO</span></div>';
					} else {
						return '<div class="badge badge-danger label-square"><i class="fa fa-minus-square f-14"></i><span class="f-14">  &nbsp; SALIDA</span></div>';
					}
				},
			},
			{
				data: "amount_log",
				render: function (data) {
					return `<h5 class=" f-w-300"><code>${data}</code></h5>`;
				},
			},
			{
				data: "reason_log",
			},
			{
				data: "date_log",
				render: function (data) {
					return formatDateTime(data);
				},
			},
		],
	});
	$("#mdl_logs").modal("show");
};
