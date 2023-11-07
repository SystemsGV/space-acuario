$(($) => {
	"use strict";
	sessionStorage.clear();

	speciesJson();
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
					if (data == undefined || data == "") {
						return `<a class="add_fish" href="javascript:void(0)">Agregar Especies</a>`;
					}
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

	$("#select-new-species, #select-existing, #select-minus").select2({
		dropdownParent: $("#mdl_logs .modal-body"),
		language: {
			noResults: function () {
				return "No se encontraron resultados";
			},
		},
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
			total: item.total_species,
		};
		sessionStorage.setItem("jsonData", JSON.stringify(data));
		$("#title_log").text(item.type_bowl + " " + item.name_bowl);
		GraphicPie(item.id_bowl);
		data_logs();

		$("#mdl_logs").modal("show");
		InitFormAdd();
		InitFormAmmon();
		InitFormMinus();
	});

	// ** BUTTON ADD && AMOUNT
	$("#advance-product-tab").on("click", () => {
		$("#manifest-option").addClass("show active");
		$("#manifest-option-tab").addClass("active");
		$("#new-specie-fishbowl").removeClass("active");
		$("#additional-option").removeClass("show");
		$("#additional-option").removeClass("active");
		InitFormAdd();
		InitFormAmmon();
	});
	$("#detail-product-tab").on("click", () => {
		data_logs();
	});
	$("#select-new-species").on("change", function () {
		const selectedOption = $(this).find(":selected");
		const amount = selectedOption.data("amount");
		sessionStorage.setItem("am_species", amount);
		$("#amount_fish").text(amount);
		$("#add-amount").removeAttr("disabled");
		$("#reason-add").removeAttr("disabled");
		$("#restant_fish").text("0");
	});
	$("#select-existing").on("change", function () {
		const selectedOption = $(this).find(":selected");
		const amount = selectedOption.data("amount");
		const ammon = selectedOption.data("quantity");
		sessionStorage.setItem("am_species", amount);
		sessionStorage.setItem("ammon_species", ammon);
		$("#quantity_fish").text(amount);
		$("#ammon-add").removeAttr("disabled");
		$("#reason-ammon").removeAttr("disabled");
		$("#ammon_fish").text(ammon);
	});
	$("#add-amount").on("keyup", function () {
		const add = $("#add-amount").val();
		const amount = sessionStorage.getItem("am_species");
		if (add <= parseInt(amount)) {
			$(this).removeClass("is-invalid");
			$("#restant_fish").text(amount - add);
		} else {
			$(this).addClass("is-invalid");
			$("#btn-send-new-specie").attr("disabled");
		}
	});
	$("#ammon-add").on("keyup", function () {
		const add = parseInt($("#ammon-add").val());
		const ammon = parseInt(sessionStorage.getItem("ammon_species"));
		const amount = parseInt(sessionStorage.getItem("am_species"));
		if (add <= amount) {
			$(this).removeClass("is-invalid");
			$("#ammon_fish").text(ammon + add);
			$("#quantity_fish").text(amount - add);
		} else {
			$(this).addClass("is-invalid");
			$("#btn-send-ammon-specie").attr("disabled");
			$("#ammon_fish").text(ammon);
			$("#quantity_fish").text(amount);
		}
	});
	$("#form-new-specie input").keyup(function (e) {
		var form = $("#form-new-specie").find(':input[type="text"]');
		var check = checkCampos(form);
		if (check) {
			$("#btn-send-new-specie").removeAttr("disabled");
		} else {
			$("#btn-send-new-specie").attr("disabled");
		}
	});
	$("#add-existing input").keyup(function (e) {
		var form = $("#add-existing").find(':input[type="text"]');
		var check = checkCampos(form);
		if (check) {
			$("#btn-send-ammon-specie").removeAttr("disabled");
		} else {
			$("#btn-send-ammon-specie").attr("disabled");
		}
	});
	$("#form-new-specie").on("submit", function (e) {
		e.preventDefault();
		const session = JSON.parse(sessionStorage.getItem("jsonData"));
		const btn = document.querySelector("#btn-send-new-specie");

		const formData = new FormData(this);
		formData.append("idBowl", session.tank);
		formData.append("fishs", session.fishs);
		formData.append("total-s", session.total);
		formData.append("amount-s", sessionStorage.getItem("am_species"));
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
					session.total = data.total_f;
					sessionStorage.setItem("jsonData", JSON.stringify(session));
					InitFormAdd();
					Toast.fire({
						icon: "success",
						title: "Nueva especie agregado",
					});
					t.ajax.reload();
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
	$("#add-existing").on("submit", function (e) {
		e.preventDefault();
		const session = JSON.parse(sessionStorage.getItem("jsonData"));
		const btn = document.querySelector("#btn-send-ammon-specie");

		const formData = new FormData(this);
		formData.append("idBowl", session.tank);
		formData.append("total-s", session.total);
		formData.append("amount-s", sessionStorage.getItem("am_species"));
		formData.append("ammon-s", sessionStorage.getItem("ammon_species"));
		$.ajax({
			url: "ammon-specie-fisbowl",
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
						title: "Aumentando Especie",
						text: "La cantidad que vas a agregar debe ser mayor a 0",
					});
				} else {
					InitFormAmmon();
					session.total = data.total_f;
					sessionStorage.setItem("jsonData", JSON.stringify(session));
					Toast.fire({
						icon: "success",
						title: "Nueva especie agregado",
					});
					t.ajax.reload();
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

	// ** MINUS SPECIE
	$("#category-product-tab").on("click", () => {
		InitFormMinus();
	});
	$("#select-minus").on("change", function () {
		const selectedOption = $(this).find(":selected");
		const amount = selectedOption.data("amount");
		const ammon = selectedOption.data("quantity");
		sessionStorage.setItem("am_species", amount);
		sessionStorage.setItem("ammon_species", ammon);
		$("#actuality_fish").text(ammon);
		$("#minus-restart").removeAttr("disabled");
		$("#reason-minus").removeAttr("disabled");
	});
	$("#minus-restart").on("keyup", function () {
		const add = parseInt($("#minus-restart").val());
		const ammon = parseInt(sessionStorage.getItem("ammon_species"));
		if (add <= ammon) {
			$(this).removeClass("is-invalid");
			$("#restart_fish").text(ammon - add);
		} else {
			$(this).addClass("is-invalid");
			$("#btn-send-ammon-specie").attr("disabled");
			$("#restart_fish").text("0");
		}
	});
	$("#minus-existing input").keyup(function (e) {
		var form = $("#minus-existin").find(':input[type="text"]');
		var check = checkCampos(form);
		if (check) {
			$("#btn-send-minus-specie").removeAttr("disabled");
		} else {
			$("#btn-send-minus-specie").attr("disabled");
		}
	});
	$("#minus-existing").on("submit", function (e) {
		e.preventDefault();
		const session = JSON.parse(sessionStorage.getItem("jsonData"));
		const btn = document.querySelector("#btn-send-minus-specie");

		const formData = new FormData(this);
		formData.append("idBowl", session.tank);
		formData.append("total-s", session.total);
		formData.append("amount-s", sessionStorage.getItem("am_species"));
		formData.append("ammon-s", sessionStorage.getItem("ammon_species"));
		$.ajax({
			url: "dissmis-specie-fisbowl",
			method: "post",
			data: formData,
			dataType: "json",
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Disminuyendo cantidad";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((data) => {
				if (data.rsp == 500) {
					Toast.fire({
						icon: "warning",
						title: "Disminución Especie",
						text: "La cantidad que vas a disminuir debe ser mayor a 0",
					});
				} else {
					InitFormMinus();
					session.total = data.total_f;
					sessionStorage.setItem("jsonData", JSON.stringify(session));
					Toast.fire({
						icon: "success",
						title: "Especie disminuida",
					});
					t.ajax.reload();
				}
			})
			.fail((error) => {
				console.log(error.responseText);
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-minus-square'></i> Disminuir especie";
			});
	});
	//* FINISH MINUS SPECIE
});

function data_logs() {
	$("#data-log").DataTable().destroy();
	const jsonData = JSON.parse(sessionStorage.getItem("jsonData"));
	const tank = jsonData.tank;
	const tbl_logs = $("#data-log").DataTable({
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
			url: "API-LOGSBOWLS/" + tank,
		},
		columns: [
			{
				data: "common_specie",
			},
			{
				data: "amountM",
			},
			{
				data: "reasonM",
			},
			{
				data: "dateM",
				render: function (data, type, row) {
					return convertDate(row.dateM) + " " + row.hourM;
				},
			},
			{
				data: "movementM",
				render: function (data, type, row) {
					return typeMov(data);
				},
			},
		],
	});
}

function InitFormAdd() {
	$("#form-new-specie")[0].reset;
	$("#select-new-species").empty();
	$("#select-new-species").append(
		"<option value='0' disabled selected>Selecciona especie</option>"
	);
	$("#amount_fish").text("0");
	$("#restant_fish").text("0");
	$("#add-amount").val("0");
	$("#reason-add").val("");
	$("#reason-add").prop("disabled", true);
	$("#add-amount").prop("disabled", true);
	getSpecies();
}
function InitFormAmmon() {
	$("#add-existing")[0].reset;
	$("#select-existing").empty();
	$("#select-existing").append(
		"<option value='0' disabled selected>Selecciona especie existente</option>"
	);
	$("#quantity_fish").text("0");
	$("#ammon_fish").text("0");
	$("#ammon-add").val("0");
	$("#reason-ammon").val("");
	$("#reason-ammon").prop("disabled", true);
	$("#ammon-add").prop("disabled", true);
	const selectPlus = document.getElementById("select-existing");

	getCheckoutS(selectPlus);
}
function InitFormMinus() {
	$("#minus-existing")[0].reset;
	$("#select-minus").empty();
	$("#select-minus").append(
		"<option value='0' disabled selected>Selecciona especie existente</option>"
	);
	$("#actuality_fish").text("0");
	$("#restart_fish").text("0");
	$("#minus-restart").val("0");
	$("#reason-minus").val("");
	$("#reason-minus").prop("disabled", true);
	$("#minus-restart").prop("disabled", true);
	const selectMinus = document.getElementById("select-minus");
	getCheckoutD(selectMinus);
}
const getSpecies = () => {
	const j_s = JSON.parse(sessionStorage.getItem("jsonData"));
	const ids_s = j_s.fishs;

	const selectS = document.getElementById("select-new-species");
	const selectA = document.getElementById("select-existing");

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
				if (item.amount_fish <= 0) {
					option.disabled = true;
				}
				if (!ids_s.includes(item.id_specie)) {
					selectS.appendChild(option);
				}
			});
		})
		.catch((error) => {
			console.error("Error:", error.message);
		});
};
const getCheckoutS = (select) => {
	const j_s = JSON.parse(sessionStorage.getItem("jsonData"));
	const ids_s = j_s.fishs;
	const tank = j_s.tank;

	fetch("species-checkout/" + tank, {
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
			console.log(species);
			species.forEach((item) => {
				const option = document.createElement("option");
				option.value = item.id_specie;
				option.text = item.common_specie;
				option.dataset.amount = item.amount_fish;
				option.dataset.quantity = item.amount;
				if (item.amount_fish <= 0) {
					option.disabled = true;
				}
				if (ids_s.includes(item.id_specie)) {
					select.appendChild(option);
				}
			});
		})
		.catch((error) => {
			console.error("Error:", error.message);
		});
};
const getCheckoutD = (select) => {
	const j_s = JSON.parse(sessionStorage.getItem("jsonData"));
	const ids_s = j_s.fishs;
	const tank = j_s.tank;

	fetch("species-checkout/" + tank, {
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
			console.log(species);
			species.forEach((item) => {
				const option = document.createElement("option");
				option.value = item.id_specie;
				option.text = item.common_specie;
				option.dataset.amount = item.amount_fish;
				option.dataset.quantity = item.amount;
				if (ids_s.includes(item.id_specie)) {
					select.appendChild(option);
				}
			});
		})
		.catch((error) => {
			console.error("Error:", error.message);
		});
};
function checkSpecies(i) {
	// Get the JSON string from sessionStorage
	const speciesObjectJSON = sessionStorage.getItem("speciesJSON");
	// Convert the JSON string back to a JavaScript object
	const speciesObject = JSON.parse(speciesObjectJSON);
	if (i != "" || i != undefined) {
		const keys = i.split(",").map(Number);
		const result = keys.map((key) => speciesObject[key]).join(",");
		return `<a class="add_fish" href="javascript:void(0)">${result}</a>`;
	}
}
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
const speciesJson = () => {
	fetch("API-SPECIES")
		.then((response) => {
			if (!response.ok) {
				throw new Error("La respuesta de la red no fue exitosa");
			}
			return response.json();
		})
		.then(({ data }) => {
			let Object = {};
			data.forEach((item) => {
				Object[item.id_specie] = item.common_specie;
			});

			let ObjectJSON = JSON.stringify(Object);
			sessionStorage.setItem("speciesJSON", ObjectJSON);
		})

		.catch((err) => {
			console.error("Error:", error);
		});
};
function GraphicPie(tank) {
	fetch("API-PIE", {
		method: "post",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify({ id_bowl: tank }),
	})
		.then((response) => {
			if (!response.ok) {
				throw new Error("La respuesta de la red no fue exitosa");
			}
			return response.json();
		})
		.then(({ data }) => {
			if (data === null) {
				return alert("No encontramos");
			}

			const title = data[0].type_bowl + " " + data[0].name_bowl;
			const seriesData = data.map(function (item) {
				return {
					value: parseInt(item.amount),
					name: item.common_specie + " " + item.amount,
				};
			});

			const dom = document.getElementById("tank-pie");
			dom.style.width = "100vh";
			dom.style.height = "100vh";
			const myChart = echarts.init(dom, null, {
				renderer: "canvas",
				useDirtyRect: false,
			});

			var app = {};

			var option;

			option = {
				title: {
					text: title,
					subtext: "Data Actual",
					left: "center",
				},
				tooltip: {
					trigger: "item",
				},
				legend: {
					orient: "vertical",
					left: "left",
				},
				series: [
					{
						name: "Especie",
						type: "pie",
						radius: "50%",
						data: seriesData,
						emphasis: {
							itemStyle: {
								shadowBlur: 10,
								shadowOffsetX: 0,
								shadowColor: "rgba(0, 0, 0, 0.5)",
							},
						},
					},
				],
			};

			if (option && typeof option === "object") {
				myChart.setOption(option);
				myChart.resize();
			}

			window.addEventListener("resize", myChart.resize);
		})
		.catch((err) => {
			console.error("Error:", err);
		});
}

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
const typeMov = (i) => {
	const movement = {
		new: { text: "Ingreso", class: "success" },
		update: { text: "Aumento", class: "info" },
		decrease: { text: "Disminuido", class: "warning" },
		dissmis: { text: "Eliminado", class: "danger" },
	};

	const obj = movement[i] || "danger";
	return `<span class='badge badge-${obj.class} badge-pill m-r-5 m-b-5'>${obj.text}</span>`;
};
