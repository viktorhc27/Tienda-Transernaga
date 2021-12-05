$("#btnGuardar").click(function (e) {
    e.preventDefault();
    var nombre = $("#nombre").val();
    var app = $("#app").val();
    var apm = $("#apm").val();
    var correo = $("#correo").val();
    var password = $("#password").val();
    var telefono = $("#telefono").val();
    var direccion = $("#direccion").val();
    var numero = $("#numero").val();
    var sexo = $("#sexo").val()
    var rol = $("#rol").val()
    var alerta = $("#alert_correo").val();

    console.log(alerta);

    if (alerta == "correo disponible") {
        if (nombre != "" && app != "" && apm != "" && correo != "" && password != "" && telefono != "" && direccion && numero != "" && sexo != "" && rol != "") {

           
            datos = {
                "nombre": nombre,
                "app": app,
                "apm": apm,
                "correo": correo,
                "password": password,
                "telefono": telefono,
                "direccion": direccion,
                "sexo": sexo,
                "rol": rol,

            };


            $.ajax({
                url: '../../controller/UsuariosController.php?accion=register_employees',
                type: 'POST',
                data: datos,

            }).done(function (respuesta) {


                if (respuesta.estado === "agregado") {
                    alert("entro");
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Agregado',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#staticBackdrop').modal('hide');
                    setTimeout(function () {
                        location.reload();
                    }, 1000)
                }
            })


        } else {

            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Llene todos los campos',
                showConfirmButton: false,
                timer: 1500
            })


        }
    } else {

        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Correo ya registrado',
            showConfirmButton: false,
            timer: 1500
        })
    }


})
//valida correo
function validar(correo) {

    datos = {
        "correo": correo
    };

    $.ajax({
        url: '../../controller/UsuariosController.php?accion=verificar',
        type: 'POST',
        data: datos,

    }).done(function (respuesta) {
        if (respuesta.datos === "existe") {
            return false;

        }
        if (respuesta.datos === "no existe") {
            return true;

        }
    })


}
$("#correo").blur(function () {
    var correo = $("#correo").val();
    $("#repuesta").val('');
    if (correo != "") {
        if (correo.indexOf('@', 0) == -1 || correo.indexOf('.', 0) == -1) {
            $('#correo').removeClass('is-valid');
            $('#correo').addClass('is-invalid');
            $("#alerta").text('correo no valido');


        } else {
            datos = {
                "correo": correo
            };

            $.ajax({
                url: '../../controller/UsuariosController.php?accion=verificar',
                type: 'POST',
                data: datos,

            }).done(function (respuesta) {
                console.log(JSON.stringify(respuesta));
                if (respuesta.datos === "existe") {
                    $('#correo').removeClass('is-valid');
                    $('#correo').addClass('is-invalid');
                    $("#alerta").text('correo no disponible');

                    $("#alerta").append("<input type='hidden' id='alert_correo' value='correo no disponible'>");


                }
                if (respuesta.datos === "no existe") {
                    $('#correo').removeClass('is-invalid');
                    $('#correo').addClass('is-valid');
                    $("#alerta").text('correo disponible');
                    $("#alerta").append("<input type='hidden' id='alert_correo'  value='correo disponible'>");

                }
            })

        }

    } else {
        $('#correo').removeClass('is-valid');
        $('#correo').addClass('is-invalid');
    }
});

$("#nombre").blur(function () {
    var nombre = $("#nombre").val();
    if (nombre.trim() != '') {
        $('#nombre').removeClass('is-invalid');
        $('#nombre').addClass('is-valid');
    } else {
        $('#nombre').removeClass('is-valid');
        $('#nombre').addClass('is-invalid');
    }

});

$("#password_retry").blur(function () {
    var password = $('#password').val();
    var password_retry = $("#password_retry").val();
    if (password == password_retry) {

        $('#password').removeClass('is-invalid');
        $('#password').addClass('is-valid');

        $('#password_retry').removeClass('is-invalid');
        $('#password_retry').addClass('is-valid');
    } else {
        Swal.fire({
            title: 'Error!',
            text: 'Las contraseñas deben Coincidir ',
            icon: 'error',
            confirmButtonText: 'OK'
        })
        $('#password_retry').removeClass('is-valid');
        $('#password_retry').addClass('is-invalid');
        $('#password').removeClass('is-valid');
        $('#password').addClass('is-invalid');
    }

});
$("#app").blur(function () {
    var apellidos = $("#app").val();
    if (apellidos.trim() != '') {
        $('#app').removeClass('is-invalid');
        $('#app').addClass('is-valid');
    } else {
        $('#app').removeClass('is-valid');
        $('#app').addClass('is-invalid');
    }

});
$("#apm").blur(function () {
    var apellidos = $("#apm").val();
    if (apellidos.trim() != '') {
        $('#apm').removeClass('is-invalid');
        $('#apm').addClass('is-valid');
    } else {
        $('#apm').removeClass('is-valid');
        $('#apm').addClass('is-invalid');
    }

});
$("#password").blur(function () {
    var dato = $("#password").val();
    if (dato.trim() != '') {
        $('#password').removeClass('is-invalid');
        $('#password').addClass('is-valid');
    } else {
        $('#password').removeClass('is-valid');
        $('#password').addClass('is-invalid');
    }

});
$("#telefono").blur(function () {
    var dato = $("#telefono").val();
    if (dato.trim() != '') {
        $('#telefono').removeClass('is-invalid');
        $('#telefono').addClass('is-valid');
    } else {
        $('#telefono').removeClass('is-valid');
        $('#telefono').addClass('is-invalid');
    }

});
$("#sexo").blur(function () {
    var dato = $("#sexo").val();
    if (dato.trim() != '') {
        $('#sexo').removeClass('is-invalid');
        $('#sexo').addClass('is-valid');
    } else {
        $('#sexo').removeClass('is-valid');
        $('#sexo').addClass('is-invalid');
    }

});
$("#rol").blur(function () {
    var dato = $("#rol").val();
    if (dato.trim() != '') {
        $('#rol').removeClass('is-invalid');
        $('#rol').addClass('is-valid');
    } else {
        $('#rol').removeClass('is-valid');
        $('#rol').addClass('is-invalid');
    }

});