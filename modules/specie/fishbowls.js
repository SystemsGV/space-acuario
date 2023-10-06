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
				data: "id_bowl",
				render: function (data, type, row) {
					return addActions(row.id_specie);
				},
			},
		],
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
			$("#btn_send").removeClass("disabled");
		} else {
			$("#btn_send").addClass("disabled");
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

	t.on("click", ".add_fish", function (e) {
		var item = t.row($(this).parents("tr")).data(); //Detecta a que fila hago click y me captura los datos en la variable data.
		if (t.row(this).child.isShown()) {
			//Cuando esta en tamaño responsivo
			var item = t.row(this).data();
		}
		$(".title_log").html(item.type_bowl + " " + item.name_bowl);
		$("#mdl_logs").modal("show");
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
				alert_type("Pecera añadido correctamente", "Vista Pecera", "success");
				clearForm();
				t.row
					.add({
						name_bowl: r.data["name_bowl"],
						type_bowl: r.data["type_bowl"],
						water_bowl: r.data["water_bowl"],
						install_bowl: r.data["install_bowl"],
						status_bowl: r.data["status_bowl"],
						large_bowl: r.data["large_bowl"],
						width_bowl: r.data["width_bowl"],
						height_bowl: r.data["height_bowl"],
						type_bowl: r.data["type_bowl"],
						volumen_bowl: r.data["volumen_bowl"],
						tmp_min: r.data["tmp_min"],
						tmp_max: r.data["tmp_max"],
						id_bowl: r.id,
					})
					.draw(false);
			})
			.fail((e) => {
				console.log(e.responseText);
				alert_type(
					"Error del sistema, Comunicarse con SISTEMAS",
					"Vista Pecera",
					"error"
				);
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
		swal({
			title: "Estas Seguro?",
			text: "¡Una vez eliminado, no podrás recuperar este registro!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
			buttons: ["Cancelar", "Eliminar"],
		}).then((willDelete) => {
			if (willDelete) {
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

	$("#btn_update").on("click", (e) => {
		let btn = document.querySelector("#btn_update");
		e.preventDefault();
		$.ajax({
			url: "edit-fishbowl",
			type: "post",
			data: $("#frm_fishbowl").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML = "<i class='fa fa-spin'></i> Actualizando Pecera";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				alert_type("Pecera editado Correctamente", "Vista Peceras", "success");
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
				alert_type(
					"Error del sistema, Comunicarse con SISTEMAS",
					"Vista Peceras",
					"error"
				);
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-edit'></i> Actualizar Pecera";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});
});

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
	return `<button class="btn btn-pill btn-warning btn-air-warning btn_edit" type="submit" title="Editar especie">Editar</button> 
		<button class="btn_delete btn btn-pill btn-danger btn-air-danger" type="button" title="Eliminar especie">Eliminar</button>`;
};
const clearForm = () => {
	$("#frm_fishbowl")[0].reset();
	$("#type_water").val("0").trigger("change");
	$("#status").val("0").trigger("change");
	$("#type_bowl").val("0").trigger("change");
};
const format_cs = (num) => {
	return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
