<section class="section-content padding-y">

    <!-- ============================ COMPONENT REGISTER   ================================= -->
    <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
        <article class="card-body">
            <header class="mb-4">
                <h4 class="card-title">Registro</h4>
            </header>
            <form method="post" action="./controller/UsuariosController.php?accion=register_user">
                <div class="form-row">
                    <div class="col form-group">
                        <label>Nombre</label>
                        <input id="nom" name="nombre" type="text" class="form-control" placeholder="">
                    </div> <!-- form-group end.// -->
                    <div class="col form-group">
                        <label>Apellido Paterno</label>
                        <input id="App" name="app" type="text" class="form-control" placeholder="">
                    </div> <!-- form-group end.// -->
                    <div class="col form-group">
                        <label>Apellido Materno</label>
                        <input id="Apm" name="apm" type="text" class="form-control" placeholder="">
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
                <div class="form-group">
                    <label>Correo</label>
                    <input id="email" type="text" name="correo" type="email" class="form-control">
                    <small id="alerta" class="form-text text-muted"></small>
                </div> <!-- form-group end.// -->
                <div class="form-group">
                    <label id="sexo" class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" checked="" type="radio" name="sexo" value="hombre">
                        <span class="custom-control-label"> Masculino </span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="sexo" value="mujer">
                        <span class="custom-control-label"> Femenino </span>
                    </label>
                </div> <!-- form-group end.// -->
                <div class="form-group">

                    <label>Telefono</label>
                    <input id="tel" type="text" name="telefono" type="text" class="form-control">


                </div>
                <div class="buscador form-group">

                    <label>Direccion</label>
                    <input id="dir" name="direccion" type="text" class="form-control">




                </div>
                <div id="mapa-geocoder" class="form-group mapa">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Contraseña</label>
                        <input id="pass" name="password" type="password" class="form-control" type="password">
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Repetir contraseña</label>
                        <input id="r_pass" class="form-control" type="password">
                    </div> <!-- form-group end.// -->
                </div>
                <div class="form-group">
                    <button id="btn-registrar" type="submit" class="btn btn-primary btn-block"> Registrar </button>
                </div> <!-- form-group// -->
                <!-- <div class="form-group">
                    <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="">
                        <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a> </div>
                    </label>
                </div> -->
                <!-- form-group end.// -->
            </form>
        </article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">¿Tienes Cuenta? <a href="?param=login">Log In</a></p>
    <br><br>
</section>
<script>
    $(document).ready(function() {
        $(window).on("load resize", function() {
            var alturaBuscador = $(".buscador").outerHeight(true),
                alturaVentana = $(window).height(),
                alturaMapa = alturaVentana - alturaBuscador;

            $("#mapa-geocoder").css("height", "200" + "px");
        });
    });

    function localizar(elemento, direccion) {
        var geocoder = new google.maps.Geocoder();

        var map = new google.maps.Map(document.getElementById(elemento), {
            zoom: 16,
            scrollwheel: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        geocoder.geocode({
            'address': direccion
        }, function(results, status) {
            if (status === 'OK') {
                var resultados = results[0].geometry.location,
                    resultados_lat = resultados.lat(),
                    resultados_long = resultados.lng();
                /* console.log(resultados_lat);
                console.log(resultados_long); */

                $(".buscador").append("<input type='hidden' id='latitud' value='" + resultados_lat + "'>");
                $(".buscador").append("<input type='hidden' id='longitud' value='" + resultados_long + "'>");

                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                var mensajeError = "";
                if (status === "ZERO_RESULTS") {
                    mensajeError = "No hubo resultados para la dirección ingresada.";
                } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
                    mensajeError = "Error general del mapa.";
                } else if (status === "INVALID_REQUEST") {
                    mensajeError = "Error de la web. Contacte con Name Agency.";
                }
                alert(mensajeError);
            }
        });
    }

    $.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyCenp6Eupizf2ow5uX1NgMkZhMz-LtwOQQ", function() {
        $("#dir").change(function() {
            var dir = $("#dir").val();
            var direccion = dir + ", Arica y Parinacota"

            if (direccion !== "") {
                localizar("mapa-geocoder", direccion);
            }
        });
    });
</script>
<script>
    $("#btn-registrar").click(function(e) {
        e.preventDefault();
        var nombre = $("#nom").val();
        var app = $("#App").val();
        var apm = $("#Apm").val();
        var correo = $("#email").val();
        var password = $("#pass").val();
        var telefono = $("#tel").val();
        var direccion = $("#dir").val();
        var sexo = $('input:radio[name=sexo]:checked').val()
        var latitud = $('#latitud').val();
        var longitud = $('#longitud').val();
        var alerta = $("#alert_correo").val();
        console.log(latitud, longitud);
        if (alerta == "correo disponible") {
            /* if (nombre != "" && app != "" && apm != "" && correo != "" && password != "" && telefono != "" && direccion&& sexo != "") { */

                datos = {
                    "nombre": nombre,
                    "app": app,
                    "apm": apm,
                    "correo": correo,
                    "password": password,
                    "telefono": telefono,
                    "direccion": direccion,
                    "sexo": sexo,
                    "latitud": latitud,
                    "longitud": longitud
                };

                $.ajax({
                    url: './controller/UsuariosController.php?accion=register_user',
                    type: 'POST',
                    data: datos,

                }).done(function(respuesta) {


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
                        setTimeout(function() {
                            location.reload();
                        }, 1000)
                    }
                })


            /* } else {

                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Llene todos los campos',
                    showConfirmButton: false,
                    timer: 1500
                })


            } */
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
        var r;
        datos = {
            "correo": correo
        };

        $.ajax({
            url: './controller/UsuariosController.php?accion=verificar',
            type: 'POST',
            data: datos,

        }).done(function(respuesta) {
            if (respuesta.datos === "existe") {
                r = false;

            }
            if (respuesta.datos === "no existe") {
                r = true;

            }
        })

        return true

    }


    $("#nombre").blur(function() {
        var nombre = $("#nombre").val();
        if (nombre.trim() != '') {
            $('#nombre').removeClass('is-invalid');
            $('#nombre').addClass('is-valid');
        } else {
            $('#nombre').removeClass('is-valid');
            $('#nombre').addClass('is-invalid');
        }

    });

    $("#email").blur(function() {

        var correo = $("#email").val();
        console.log("hola")
        if (correo != "") {
            if (correo.indexOf('@', 0) == -1 || correo.indexOf('.', 0) == -1) {
                $('#email').removeClass('is-valid');
                $('#email').addClass('is-invalid');
                $("#alerta").text('correo no valido');


            } else {
                datos = {
                    "correo": correo
                };

                $.ajax({
                    url: './controller/UsuariosController.php?accion=verificar',
                    type: 'POST',
                    data: datos,

                }).done(function(respuesta) {
                    console.log(JSON.stringify(respuesta));
                    if (respuesta.datos === "existe") {
                        $('#email').removeClass('is-valid');
                        $('#email').addClass('is-invalid');
                        $("#alerta").text('correo no disponible');

                        $("#alerta").append("<input type='hidden' id='alert_correo' value='correo no disponible'>");


                    }
                    if (respuesta.datos === "no existe") {
                        $('#email').removeClass('is-invalid');
                        $('#email').addClass('is-valid');
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

    $("#password_retry").blur(function() {
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
    $("#app").blur(function() {
        var apellidos = $("#app").val();
        if (apellidos.trim() != '') {
            $('#app').removeClass('is-invalid');
            $('#app').addClass('is-valid');
        } else {
            $('#app').removeClass('is-valid');
            $('#app').addClass('is-invalid');
        }

    });
    $("#apm").blur(function() {
        var apellidos = $("#apm").val();
        if (apellidos.trim() != '') {
            $('#apm').removeClass('is-invalid');
            $('#apm').addClass('is-valid');
        } else {
            $('#apm').removeClass('is-valid');
            $('#apm').addClass('is-invalid');
        }

    });
    $("#pass").blur(function() {
        var dato = $("#pass").val();
        if (dato.trim() != '') {
            $('#pass').removeClass('is-invalid');
            $('#pass').addClass('is-valid');
        } else {
            $('#pass').removeClass('is-valid');
            $('#pass').addClass('is-invalid');
        }

    });
    $("#telefono").blur(function() {
        var dato = $("#telefono").val();
        if (dato.trim() != '') {
            $('#telefono').removeClass('is-invalid');
            $('#telefono').addClass('is-valid');
        } else {
            $('#telefono').removeClass('is-valid');
            $('#telefono').addClass('is-invalid');
        }

    });
    $("#direccion").blur(function() {
        var dato = $("#direccion").val();
        if (dato.trim() != '') {
            $('#direccion').removeClass('is-invalid');
            $('#direccion').addClass('is-valid');
        } else {
            $('#direccion').removeClass('is-valid');
            $('#direccion').addClass('is-invalid');
        }

    });
    $("#r_pass").blur(function() {
        console.log("d")
        var password = $("#pass").val();
        var retry_password = $("#r_pass").val();

        if (password == retry_password) {
            $('#pass').removeClass('is-invalid');
            $('#pass').addClass('is-valid');
            $('#r_pass').removeClass('is-invalid');
            $('#r_pass').addClass('is-valid');
        } else {
            $('#pass').removeClass('is-valid');
            $('#pass').addClass('is-invalid');
            $('#r_pass').removeClass('is-valid');
            $('#r_pass').addClass('is-invalid');
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Las Contraseñas deben ser iguales',
                showConfirmButton: false,
                timer: 1500
            })
        }
        if (password == '' && retry_password == '') {
            $('#pass').removeClass('is-valid');
            $('#pass').addClass('is-invalid');
            $('#r_pass').removeClass('is-valid');
            $('#r_pass').addClass('is-invalid');

        }
    });
</script>

<!-- <div class="form-group col-md-6">
                        <label>Country</label>
                        <select id="inputState" class="form-control">
                            <option> Choose...</option>
                            <option>Uzbekistan</option>
                            <option>Russia</option>
                            <option selected="">United States</option>
                            <option>India</option>
                            <option>Afganistan</option>
                        </select>
                    </div> -->
<!-- form-group end.// -->