$(($) => {
	"use strict";
	let btn = document.querySelector("#btn_send");
	$("#user_name").focus();

	$("#frm_login").on("submit", (e) => {
		e.preventDefault();

		const user = $("#user_name").val();
		const pass = $("#user_password").val();
		const btn = $("#btn_send")[0]; // Asegúrate de proporcionar el ID correcto

		if (user === "" || pass === "") {
			authInputs("Ingrese las credenciales", "red", "red");
		} else {
			$.ajax({
				url: "AuthUser",
				data: { u: user, p: pass },
				type: "post",
				dataType: "json",
				beforeSend: () => {
					updateButton(btn, true);
				},
			})
				.done((response) => {
					handleLoginResponse(response);
				})
				.fail((error) => {
					console.log(error.responseText);
				})
				.always(() => {
					updateButton(btn, false);
				});
		}
	});
});
function authInputs(text, txtuser, txtpass) {
	const audio = new Audio("assets/sounds/alert.mp3");
	audio.play();
	const toastt = document.getElementById("toast_alert");
	const toast = new bootstrap.Toast(toastt);
	$("#user_name").css("border-color", txtuser);
	$("#user_password").css("border-color", txtpass);
	$("#text_alert").text(text);
	var notify = $.notify('<i class="fa fa-warning"></i>' + text + "</strong>", {
		type: "theme",
		allow_dismiss: true,
		allow_duplicates: 0,
		delay: 2000,
		showProgressbar: true,
		timer: 400,
		animate: {
			enter: "animated fadeInDown",
			exit: "animated fadeOutUp",
		},
	});
}
function updateButton(btn, isLoading) {
	// Función para actualizar el estado del botón de inicio de sesión
	if (isLoading) {
		btn.innerHTML = "<i class='fa fa-spinner'></i>  Validando Credenciales";
	} else {
		btn.innerHTML = "INICIAR SESION";
	}

	btn.disabled = isLoading;
	btn.form.firstElementChild.disabled = isLoading;
}

function handleLoginResponse(response) {
	// Función para manejar la respuesta de la solicitud de inicio de sesión
	if (response.rsp === 100) {
		authInputs("No se ha encontrado ningún usuario", "red", "red");
	} else if (response.rsp === 400) {
		authInputs("Contraseña errónea ", "green", "red");
	} else if (response.rsp == 200) {
		// Lógica adicional para el caso de éxito
		console.log(response.id_rol);
		if (response.id_rol == 1) {
			window.location.href = "Acuario/Dashboard-Temperatura";
		} else {
			window.location.href = "Acuario/Control-Temperatura";
		}
	}
}
