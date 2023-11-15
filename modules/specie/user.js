$(($) => {
	sessionStorage.clear();
	("use strict");

	const t = $("#data-user").DataTable({
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
			url: "API-USERS",
		},
		columns: [
			{
				data: "firstname",
			},
			{
				data: "id_empoyee",
			},
			{
				data: "id_rol",
				render: function (data, type, row) {
					return viewRol(data);
				},
			},
			{
				data: "user_name",
			},

			{
				data: "user_id",
				render: function (data, type, row) {
					return addActions(data);
				},
			},
		],
	});

	$("#type_role").select2({
		dropdownParent: $("#mdl_add .modal-body"),
	});

	$("#data-user tbody").on("mouseenter", "td", function () {
		var colIdx = t.cell(this).index().column;
		$(t.cells().nodes()).removeClass("highlight");
		$(t.column(colIdx).nodes()).addClass("highlight");
	});

	$("#btn_add").on("click", (e) => {
		e.preventDefault();
		clearForm();
		$("#btn_send").removeClass("hidden").prop("disabled", false);
		$("#btn_update").addClass("hidden").prop("disabled", true);
		$("#title_modal").html("Agregar Usuario");
		$("#mdl_add").modal("show");
	});

	t.on("click", ".btn_edit", function () {
		var item = t.row($(this).parents("tr")).data(); //Detecta a que fila hago click y me captura los datos en la variable data.
		if (t.row(this).child.isShown()) {
			//Cuando esta en tamaño responsivo
			var item = t.row(this).data();
		}
		$("#title_modal").html("Editar Usuario");
		$("#btn_send").addClass("hidden").prop("disabled", true);
		$("#btn_update").removeClass("hidden").prop("disabled", false);
		$("#btn_send").addClass("hidden");
		$("#id_user").val(item.user_id);
		$("#user_name").val(item.user_name);
		$("#dni_user")
			.val(item.id_empoyee)
			.prop("disabled", true)
			.addClass("disabled");

		$("#flname")
			.val(item.firstname)
			.prop("disabled", true)
			.addClass("disabled");

		$("#type_role").val(item.id_rol).trigger("change");
		$("#mdl_add").modal("show");
	});

	$("#btn_send").on("click", (e) => {
		let btn = document.querySelector("#btn_send");
		e.preventDefault();

		$.ajax({
			url: "save-user",
			type: "post",
			data: $("#frm_user").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Guardando Usuario";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				Toast.fire({
					icon: "success",
					title: "Vista Usuario",
					text: "Usuario añadido correctamente",
				});
				$("#mdl_add").modal("hide");

				clearForm();
				t.ajax.reload();
			})
			.fail((e) => {
				console.log(e.responseText);
				Toast.fire({
					icon: "error",
					title: "Vista Usuario",
					text: "Error del sistema, Comunicarse con SISTEMAS",
				});
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-save'></i> Guardar Usuario";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	$("#btn_update").on("click", (e) => {
		let btn = document.querySelector("#btn_send");
		e.preventDefault();

		$.ajax({
			url: "update-user",
			type: "post",
			data: $("#frm_user").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Editando Usuario";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				Toast.fire({
					icon: "success",
					title: "Vista Usuario",
					text: "Usuario editado correctamente",
				});
				clearForm();
				t.ajax.reload();
				$("#mdl_add").modal("hide");
			})
			.fail((e) => {
				console.log(e.responseText);
				Toast.fire({
					icon: "error",
					title: "Vista Usuario",
					text: "Error del sistema, Comunicarse con SISTEMAS",
				});
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-edit'></i> Actualizar Usuario";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});
});
const addActions = (i) => {
	return `<button class="btn btn-pill btn-warning btn-air-warning btn-animation btn_edit" type="submit" title="Editar usuario"><i class="icofont icofont-edit f-18"></i></button>`;
};
const clearForm = () => {
	$("#frm_user")[0].reset();
	$("#type_role").val("0").trigger("change");

	$("#flname").prop("disabled", false).removeClass("disabled");
	$("#dni_user").removeClass("disabled").prop("disabled", false);
};
const viewRol = (i) => {
	const rolesText = {
		1: "Jefe Acuario",
		2: "Control",
		// Puedes agregar más roles según sea necesario
	};
	return rolesText[i] || "desconocido";
};
