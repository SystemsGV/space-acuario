$(($) => {
	"use strict";
	let btn = document.querySelector("#btn_send");
	$("#user_name").focus();

	$("#frm_login").on("submit", (e) => {
		e.preventDefault();
		const user = $("#user_name").val(),
			pass = $("#user_password").val();
		if (user == "" || pass == "") {
			authInputs("Ingrese las crendeciales", "red", "red");
		} else {
			$.ajax({
				url: "Login",
				data: { u: user, p: pass },
				type: "post",
				dataType: "json",
				beforeSend: () => {
					btn.innerHTML =
						"<i class='fa fa-spin fa-spinner'></i>  Validando Credenciales";
					btn.disabled = true;
					btn.form.firstElementChild.disabled = true;
				},
			})
				.done((v) => {
					if (v.rsp === 100) {
						authInputs("No se ha encontrado ningun usuario", "red", "red");
					} else if (v.rsp === 400) {
						authInputs("Contraseña errónea ", "green", "red");
					} else if (v.rsp == 200) {
						console.log("echo");
					}
				})
				.always(() => {
					btn.innerHTML = "INICIAR SESION";
					btn.disabled = false;
					btn.form.firstElementChild.disabled = false;
				})
				.fail((e) => {
					console.log(e.responseText);
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
