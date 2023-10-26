$(($) => {
	"use strict";

	//EVENT CLASS DATE INPUT
	const cleave = new Cleave("#cleave-date1", {
		date: true,
		delimiter: "-",
		datePattern: ["d", "m", "Y"],
	});

	//EVENT CHARGE DATATABLE
	const t = $("#data-fishbowls").DataTable({
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
			url: "API-FISHBOWLS",
		},
		columns: [
			{
				data: "name_bowl",
				render: function (data, type, row) {
					return row.type_bowl + " " + row.name_bowl;
				},
			},
			{
				data: "water_bowl",
			},

			{
				data: "large_bowl",
			},
			{
				data: "width_bowl",
			},
			{
				data: "height_bowl",
			},
			{
				data: "volumen_bowl",
				render: function (data, type, row) {
					return `<span class="product-price">${data}</span>`;
				},
			},

			{
				data: "status_bowl",
				render: function (data, type, row) {
					return checkStatus(data);
				},
			},
			{
				data: "species",
				render: function (data, type, row) {
					return checkSpecies(data);
				},
			},
			{
				data: "install_bowl",
			},
			{
				data: "type_bowl",
				visible: false,
			},
			{
				data: "tmp_min",
				visible: false,
			},
			{
				data: "tmp_max",
				visible: false,
			},
			{
				data: "id_bowl",
				render: function (data, type, row) {
					return addActions(row.id_specie);
				},
			},
		],
	});

	$("#select-new-species").select2({
		dropdownParent: $("#mdl_logs .modal-body"),
	});

	$("#data-species tbody").on("mouseenter", "td", function () {
		var colIdx = t.cell(this).index().column;
		$(t.cells().nodes()).removeClass("highlight");
		$(t.column(colIdx).nodes()).addClass("highlight");
	});

	$("#type_water, #type_bowl, #status").select2({
		dropdownParent: $("#mdl_add .modal-body"),
	});

	//EVENT CLICK OPEN MODAL ADD
	$("#btn_add").on("click", (e) => {
		e.preventDefault();
		clearForm();
		$("#btn_send").removeClass("hidden");
		$("#btn_update").addClass("hidden");
		$("#title_modal").html("Agregar Pecera");
		$("#mdl_add").modal("show");
	});

	$("#frm_fishbowl input").keyup(function (e) {
		var form = $("#frm_fishbowl").find(':input[type="text"]');
		var check = checkCampos(form);
		console.log(check);
		if (check) {
			$("#btn_send").removeAttr("disabled");
		} else {
			$("#btn_send").attr("disabled");
		}
	});

	$("#large_b, #width_b, #height_b").on("input", () => {
		const v1 = $("#large_b").val();
		const v2 = $("#width_b").val();
		const v3 = $("#height_b").val();

		if (v1 !== "" && v2 !== "" && v3 !== "") {
			const resultado =
				(parseFloat(v1) * parseFloat(v2) * parseFloat(v3)) / 1000;
			const r = resultado.toFixed(2);
			$("#volumen_w").val(format_cs(r));
		} else {
			$("#volumen_w").val("");
		}
	});

	t.on("click", ".btn_edit", function () {
		var item = t.row($(this).parents("tr")).data(); //Detecta a que fila hago click y me captura los datos en la variable data.
		if (t.row(this).child.isShown()) {
			//Cuando esta en tamaño responsivo
			var item = t.row(this).data();
		}
		$("#title_modal").html("Editar Especie");
		$("#btn_send").addClass("hidden");
		$("#btn_update").removeClass("hidden");
		$("#name_bowl").val(item.name_bowl);
		$("#type_water").val(item.water_bowl).trigger("change");
		$("#cleave-date1").val(item.install_bowl);
		$("#status").val(item.status_bowl).trigger("change");
		$("#type_bowl").val(item.type_bowl).trigger("change");
		$("#large_b").val(item.large_bowl);
		$("#width_b").val(item.width_bowl);
		$("#height_b").val(item.height_bowl);
		$("#volumen_w").val(item.volumen_bowl);
		$("#id_fishbowl").val(item.id_bowl);
		$("#tmp_min").val(item.tmp_min);
		$("#tmp_max").val(item.tmp_max);
		$("#mdl_add").modal("show");
	});

	$("#btn_send").on("click", (e) => {
		let btn = document.querySelector("#btn_send");
		e.preventDefault();
		console.log($("#frm_fishbowl").serialize());
		$.ajax({
			url: "save-fishbowl",
			type: "post",
			data: $("#frm_fishbowl").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Guardando Pecera";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				Toast.fire({
					icon: "success",
					title: "Vista Pecera",
					text: "Pecera añadido correctamente",
				});
				clearForm();
				t.ajax.reload();
			})
			.fail((e) => {
				console.log(e.responseText);
				Toast.fire({
					icon: "error",
					title: "Vista Pecera",
					text: "Error del sistema, Comunicarse con SISTEMAS",
				});
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-save'></i> Guardar Especie";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	t.on("click", ".btn_delete", function () {
		var row = t.row($(this).parents("tr")).data(); // Encuentra la fila padre del botón
		if (t.row(this).child.isShown()) {
			//Cuando esta en tamaño responsivo
			var id_bowl = t.row(row).data().id_bowl;
		}
		var id_bowl = t.row(row).data().id_bowl; // Encuentra la fila padre del botón
		Swal.fire({
			title: "Estas Seguro?",
			text: "¡Una vez eliminado, no podrás recuperar este registro!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Si, elimialo!",
		}).then((result) => {
			if (result.isConfirmed) {
				fetch("delete-fishbowl", {
					method: "DELETE",
					headers: {
						"Content-Type": "application/json",
					},
					body: JSON.stringify({ id_bowl: id_bowl }),
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

	$("#btn_update").on("click", (e) => {
		let btn = document.querySelector("#btn_update");
		e.preventDefault();
		$.ajax({
			url: "edit-fishbowl",
			type: "post",
			data: $("#frm_fishbowl").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Actualizando Pecera";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				Toast.fire({
					icon: "success",
					title: "Vista Pecera",
					text: "Pecera editado Correctamente",
				});
				var row = t.row((idx, data, node) => {
					return data.id_bowl === r.id;
				});
				const node = row
					.data({
						name_bowl: r.data["name_bowl"],
						type_bowl: r.data["type_bowl"],
						water_bowl: r.data["water_bowl"],
						install_bowl: r.data["install_bowl"],
						status_bowl: r.data["status_bowl"],
						large_bowl: r.data["large_bowl"],
						width_bowl: r.data["width_bowl"],
						height_bowl: r.data["height_bowl"],
						volumen_bowl: r.data["volumen_bowl"],
						type_bowl: r.data["type_bowl"],
						tmp_min: r.data["tmp_min"],
						tmp_max: r.data["tmp_max"],
						id_bowl: r.id,
					})
					.draw(false);
			})
			.fail((e) => {
				console.log(e.responseText);
				Toast.fire({
					icon: "error",
					title: "Vista Pecera",
					text: "Error del sistema, Comunicarse con SISTEMAS",
				});
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-edit'></i> Actualizar Pecera";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	//TODO: Add species to the fish tank
	t.on("click", ".add_fish", function (e) {
		var item = t.row($(this).parents("tr")).data(); //Detecta a que fila hago click y me captura los datos en la variable data.
		if (t.row(this).child.isShown()) {
			//Cuando esta en tamaño responsivo
			var item = t.row(this).data();
		}
		const data = {
			tank: item.id_bowl,
			fishs: item.species,
		};
		sessionStorage.setItem("jsonData", JSON.stringify(data));
		$(".title_log").html(item.type_bowl + " " + item.name_bowl);
		$("#mdl_logs").modal("show");
		const datos = JSON.parse(sessionStorage.getItem("jsonData"));
	});

	// ** BUTTON ADD && AMOUNT
	$("#advance-product-tab").on("click", () => {
		$("#manifest-option").addClass("show active");
		$("#manifest-option-tab").addClass("active");
		$("#new-specie-fishbowl").removeClass("active");
		$("#additional-option").removeClass("show");
		$("#additional-option").removeClass("active");
		InitFormAdd();
	});

	// ** ADD NEW SPECIE FISHBOWL
	$("#btn-addSpecie").on("click", () => {
		$("#mdl_movements").modal("show");
	});

	$("#select-new-species").on("change", function () {
		const selectedOption = $(this).find(":selected");
		const amount = selectedOption.data("amount");
		sessionStorage.setItem("am_species", amount);
		$("#amount_fish").text(amount);
		$("#add-amount").removeAttr("disabled");
		$("#reason-add").removeAttr("disabled");
	});

	$("#add-amount").on("input", function () {
		const add = $(this).val();
		const amount = sessionStorage.getItem("am_species");
		if (add <= amount) {
			$(this).removeClass("is-invalid");
			$("#restant_fish").text(amount - add);
		} else {
			$(this).addClass("is-invalid");
		}
	});

	$("#form-new-specie").on("submit", function (e) {
		e.preventDefault();
		const session = JSON.parse(sessionStorage.getItem("jsonData"));
		const btn = document.querySelector("#btn-send-new-specie");

		const formData = new FormData(this);
		formData.append("idBowl", session.tank);
		formData.append("fishs", session.fishs);
		formData.append("amount_s", sessionStorage.getItem("am_species"));
		$.ajax({
			url: "new-specie-fisbowl",
			method: "post",
			data: formData,
			dataType: "json",
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Actualizando Pecera";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((data) => {
				if (data.rsp == 500) {
					Toast.fire({
						icon: "warning",
						title: "Agregando Nueva Especie",
						text: "La cantidad que vas a agregar debe ser mayor a 0",
					});
				} else {
					session.fishs = data.species;
					sessionStorage.setItem("jsonData", JSON.stringify(session));
					InitFormAdd();
				}
			})
			.fail((error) => {
				console.log(error.responseText);
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-plus'></i> Agregar nueva especie";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	//** FINISH ADD NEW SPECIE FISHBOWL */
});

function InitFormAdd() {
	$("#form-new-specie")[0].reset;
	$("#select-new-species").empty();
	$("#select-new-species").append(
		"<option value='0' disabled selected>Selecciona especie</option>"
	);
	$("#amount_fish").text("0");
	$("#restant_fish").text("0");
	$("#add-amount").val("0");
	$("#reason-add").prop("disabled", true);
	$("#add-amount").prop("disabled", true);
	getSpecies();
}

const getSpecies = () => {
	const selectS = document.getElementById("select-new-species");
	fetch("species-select", {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
		},
	})
		.then((response) => {
			if (!response.ok) {
				throw new Error(`HTTP error! status: ${response.status}`);
			}
			return response.json();
		})
		.then(({ species }) => {
			species.forEach((item) => {
				const option = document.createElement("option");
				option.value = item.id_specie;
				option.text = item.common_specie;
				option.dataset.amount = item.amount_fish;
				if (parseInt(item.amount_fish <= 0)) {
					option.disabled = true;
				}
				selectS.appendChild(option);
			});
		})
		.catch((error) => {
			console.error("Error:", error);
		});
};
const checkSpecies = (i) => {
	if (i != "") {
		return ``;
	}
	return `<a class="add_fish" href="javascript:void(0)">Agregar Especies</a>`;
};
const checkStatus = (i) => {
	return i == 1
		? '<span class="badge rounded-pill badge-success">ACTIVO</span>'
		: '<span class="badge rounded-pill badge-danger">INACTIVO</span>';
};
const addActions = (i) => {
	return `<button class="btn btn-pill btn-warning btn-air-warning btn_edit btn-animation" type="submit" title="Editar especie"><i class="icofont icofont-edit f-18"></i></button> 
		<button class="btn_delete btn btn-pill btn-danger btn-air-danger btn-animation" type="button" title="Eliminar especie"><i class="icofont  icofont-trash f-18"></i></button>`;
};
const clearForm = () => {
	$("#frm_fishbowl")[0].reset();
	$("#type_water").val("0").trigger("change");
	$("#status").val("0").trigger("change");
	$("#type_bowl").val("0").trigger("change");
};

// Función para formatear un número con comas como separadores de miles
const format_cs = (num) => {
	// Convierte el número a una cadena de texto
	return (
		num
			.toString()
			// Usa una expresión regular para agregar comas como separadores de miles
			.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	);
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
	return camposRellenados;
};
