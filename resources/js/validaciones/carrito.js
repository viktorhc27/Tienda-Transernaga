$("#btncarrito").click(function (e) {
    e.preventDefault();
    var id_productos = $("#id_productos").val();
    var cantidad = $("#cantidad").val();

    if (id_productos != "" && cantidad != "") {

        datos = {
            "id_productos": id_productos,
            "cantidad": cantidad

        }

        $.ajax({
            type: "post",
            action: "./controller/CarritoController.php?accion=agregar",
            data: datos,
        }).done(function (respuesta) {
            if (respuesta.datos === "agregado") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Agregado',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function () {
                    location.reload();//se agrega 2 segundos de carga

                }, 2000)
            }
        })
    }
})