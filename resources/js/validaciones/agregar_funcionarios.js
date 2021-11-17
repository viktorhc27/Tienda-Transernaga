$("#btnGuardar").click(function (e) {
    e.preventDefault();
    var nombre = $("#nombre").val();
    var app = $("#app").val();
    var apm = $("#apm").val();
    var correo = $("#correo").val();
    var password = $("#password").val();
    var telefono = $("#telefono").val();
    var direccion = $("#direccion").val();
    var departamento = $("#departamento").val();
    var block = $("#block").val();
    var numero = $("#numero").val();
    var direccion_full = direccion + ", " + departamento + ", " + block + ", N° " + numero;
    var sexo = $("#sexo").val()
    var rol = $("#rol").val()


    if (nombre != "" && app != "" && apm != "" && correo != "" && password != "" && telefono != "" && direccion && departamento != "" && block != "" && numero != "" && sexo != "" && rol != "") {

        datos = {
            "nombre": nombre,
            "app": app,
            "apm": apm,
            "correo": correo,
            "password": password,
            "telefono": telefono,
            "direccion": direccion_full,
            "sexo": sexo,
            "rol": rol,

        };
        console.log(datos)

        $.ajax({
            url: '../../controller/UsuariosController.php?accion=register_employees',
            type: 'POST',
            data: datos,

        }).done(function (respuesta) {


            if (respuesta.estado === "agregado") {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Agregado',
                    showConfirmButton: false,
                    timer: 1500
                })

                $('#modal-sm').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1000)
            }
        })

    } else {
        $('#nombre').removeClass('is-valid');
        $('#nombre').addClass('is-invalid');
        $('#app').removeClass('is-valid');
        $('#app').addClass('is-invalid');
        $('#apm').removeClass('is-valid');
        $('#apm').addClass('is-invalid');
        $('#correo').removeClass('is-valid');
        $('#correo').addClass('is-invalid');
        $('#password').removeClass('is-valid');
        $('#password').addClass('is-invalid');
        $('#telefono').removeClass('is-valid');
        $('#telefono').addClass('is-invalid');
        $('#sexo').removeClass('is-valid');
        $('#sexo').addClass('is-invalid');
        $('#rol').removeClass('is-valid');
        $('#rol').addClass('is-invalid');
        $('#direccion').removeClass('is-valid');
        $('#direccion').addClass('is-invalid');
        $('#numero').removeClass('is-valid');
        $('#numero').addClass('is-invalid');



    }
})
//valida correo
$("#correo").blur(function () {
    var correo = $("#correo").val();

    if (correo != "") {
        if (correo.indexOf('@', 0) == -1 || correo.indexOf('.', 0) == -1) {
            $('#correo').removeClass('is-valid');
            $('#correo').addClass('is-invalid');

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
                    console.log("correo ocupado")
                }
                if (respuesta.datos === "no existe") {
                    $('#correo').removeClass('is-invalid');
                    $('#correo').addClass('is-valid');
                    console.log("correo no ocupado")
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
