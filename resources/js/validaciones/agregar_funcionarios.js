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
    var direccion_full = $("#direccion_full").val();
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

        $.ajax({
            url: '../../../controllers/employeesControllers.php?accion=agregar',
            type: 'POST',
            data: datos,
        }).done(function (respuesta) {
            console.log(respuesta);
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
        $('#apellidos').removeClass('is-valid');
        $('#apellidos').addClass('is-invalid');
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
        $('#estado').removeClass('is-valid');
        $('#estado').addClass('is-invalid');



    }
})
