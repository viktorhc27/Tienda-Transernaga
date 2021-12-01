   
            $("#estado").click(function(e) {
                e.preventDefault();
                var id = $("id").val();

                datos = {
                    "id": id,
                }
                $.ajax({
                    url: '../../controller/UsuariosController.php?accion=cambiar_estado',
                    type: 'POST',
                    data: datos,

                }).done(function(respuesta) {

                    
                    if (respuesta.datos === "hecho") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'hecho',
                            showConfirmButton: false,
                            timer: 1500
                        })

                    }
                    
                })
            })