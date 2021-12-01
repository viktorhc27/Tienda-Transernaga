$("#login").click(function (e) {
	e.preventDefault();

	var correo = $("#correo").val();
	var password = $("#password").val();


	if (correo.trim() != "" && password.trim() != "") {


		datos = { "correo": correo, "password": password };

		$.ajax({
			url: "controller/UsuariosController.php?accion=login",
			type: "POST",
			data: datos
		}).done(function (respuesta) {

			if (respuesta.estado === "ok") {

				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Logueado',
					showConfirmButton: false,
					timer: 1500
				})

				setTimeout(function () {
					location.reload();//se agrega 2 segundos de carga

				}, 2000)

			}
			if (respuesta.estado === "password incorrecta") {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Contraseña incorrecta',
				})

			}
			if (respuesta.estado === "ingrese datos") {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Datos Erroneos o tu cuenta esta Desactivada',

				})

			}
			else {
				/* alert("error");
				alert(JSON.stringify(respuesta)); */

			}
		});
	} else {
		validar(correo, password);
	}
});

function validar(correo, password) {
	if (correo.trim() != "" && password.trim() == "") {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debes ingresar una contraseña!',
		})
	}
	if (correo.trim() == "" && password.trim() != "") {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debes ingresar una correo!',
		})
	}

	if (correo == "" && password.trim() == "") {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debes ingresar una Dato!',

		})
	}
}
