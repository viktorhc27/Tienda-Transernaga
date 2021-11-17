$('#btn-modificar').click(function (e) {
    e.preventDefault();
    $id= $('#id').val();
    $nombre = $('#nombre').val();
    $app = $('#app').val();
    $apm = $('#apm').val();
    $correo = $('#correo').val();
    $telefono = $('#telefono').val();
    $direccion = $('#direccion').val();
    $rol = $('#rol').val();

    if ($nombre != "" && $app != "" && $apm != "" && $correo != "" && $telefono != "" && $direccion != "" && $rol != "") {
        datos = {
            "id": $id,
            "nombre": $nombre,
            "app": $app,
            "apm": $apm,
            "correo": $correo,
            "telefono": $telefono,
            "direccion": $direccion,
            "rol": $rol,
        };
        console.log(datos);

        $.ajax({
            url: '../../controller/UsuariosController.php?accion=modificar',
            type: 'POST',
            data: datos,
        }).done(function (respuesta) {

            if (respuesta.estado === "modificado") {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'modificado',
                    showConfirmButton: false,
                    timer: 1500
                })

                $('#modal-sm').modal('hide');
                setTimeout(function () {
                    window.locationf = "http://localhost/tienda-transernaga/views/admin/index.php?param=registrar";
                }, 1000)
            }
        })
    }
});