$(($) => {
	"use strict";
	const t = $("#data-species").DataTable({
		responsive: true,
		dom: "Bfrtip",
		buttons: [
			{
				extend: "colvis",
				text: '<i class="fa fa-eye-slash"></i> Columnas Visibles',
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
				btn.innerHTML = "<i class='fa fa-spin'></i> Actualizando Especie";
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
				var row = t.row((idx, data, node) => {
					return data.id_specie === r.id;
				});
				const node = row
					.data({
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
				btn.innerHTML = "<i class='fa fa-edit'></i> Actualizar Especie";
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
		swal({
			title: "Estas Seguro?",
			text: "¡Una vez eliminado, no podrás recuperar este registro!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
			buttons: ["Cancelar", "Eliminar"],
		}).then((willDelete) => {
			if (willDelete) {
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
							swal("El registro ha sido eliminado!", {
								icon: "success",
							});
							t.row(row).remove().draw(); // Elimina la fila en la tabla
						} else {
							// Si hubo un error en la eliminación
							swal("Hubo un error al eliminar el registro.", {
								icon: "error",
							});
						}
					})
					.catch((error) => {
						console.error("Error:", error);
					});
			}
		});
	});
});

const clearForm = () => {
	$("#frm_specie")[0].reset();
	$("#type_water").val("0").trigger("change");
	$("#status").val("0").trigger("change");
};
const addActions = (i) => {
	return `<button class="btn btn-pill btn-warning btn-air-warning" type="submit" title="Editar especie" OnClick="tbl_edit(${i})">Editar</button> 
		<button class="btn_delete btn btn-pill btn-danger btn-air-danger" type="button" title="Eliminar especie">Eliminar</button>`;
};
const tbl_edit = (i) => {
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
