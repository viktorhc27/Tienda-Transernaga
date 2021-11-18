$(function () {
    $("#formuploadajax").on("submit", function (e) {
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        formData.append("dato", "valor");
        //formData.append(f.attr("name"), $(this)[0].files[0]);
        $.ajax({
            url: "../../controller/ProductosController.php?accion=agregar_producto",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (respuesta) {
                if (respuesta.datos === "Agregado") {
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

                }/* else{
                    $("#mensaje").html("Respuesta: " + respuesta);
                } */

            });
    });
});

//Validacion de modelos

var extensionesValidas = ".glb";
var pesoPermitido = 30024;

// Cuando cambie #fichero
$("#fichero").change(function () {
    $('#texto').text('');
    $('#img').attr('src', '');
    if (validarExtension(this)) {
        if (validarPeso(this)) {
            console.log("correcto");
        }
    }
});

// Validacion de extensiones permitidas

function validarExtension(datos) {

    var ruta = datos.value;
    var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
    var extensionValida = extensionesValidas.indexOf(extension);

    if (extensionValida < 0) {
        $('#texto').text('La extensión no es válida Su fichero tiene de extensión: .' + extension + " Tiene que ser .glb");
        return false;
    } else {
        return true;
    }
}

// Validacion de peso del fichero en kbs

function validarPeso(datos) {

    if (datos.files && datos.files[0]) {

        var pesoFichero = datos.files[0].size / 1024;

        if (pesoFichero > pesoPermitido) {
            $('#texto').text('El peso maximo permitido del fichero es: ' + pesoPermitido + ' KBs Su fichero tiene: ' + pesoFichero + ' KBs');
            return false;
        } else {
            return true;
        }
    }
}