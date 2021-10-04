<section class="section-content padding-y">

    <!-- ============================ COMPONENT REGISTER   ================================= -->
    <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
        <article class="card-body">
            <header class="mb-4">
                <h4 class="card-title">Sign up</h4>
            </header>
            <form method="post" action="../controller/UsuariosController.php?accion=register_user">
                <div class="form-row">
                    <div class="col form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="">
                    </div> <!-- form-group end.// -->
                    <div class="col form-group">
                        <label>Apellido Paterno</label>
                        <input type="text" class="form-control" placeholder="">
                    </div> <!-- form-group end.// -->
                    <div class="col form-group">
                        <label>Apellido Materno</label>
                        <input type="text" class="form-control" placeholder="">
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="">
                    <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                </div> <!-- form-group end.// -->
                <div class="form-group">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" checked="" type="radio" name="gender" value="option1">
                        <span class="custom-control-label"> Masculino </span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="gender" value="option2">
                        <span class="custom-control-label"> Femenino </span>
                    </label>
                </div> <!-- form-group end.// -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Telefono</label>
                        <input name="telefono" type="text" class="form-control">
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Direccion</label>
                        <input name="direccion" type="text" class="form-control">
                    </div>
                </div> <!-- form-row.// -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Contraseña</label>
                        <input class="form-control" type="password">
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Repetir contraseña</label>
                        <input class="form-control" type="password">
                    </div> <!-- form-group end.// -->
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Register </button>
                </div> <!-- form-group// -->
                <div class="form-group">
                    <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="">
                        <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a> </div>
                    </label>
                </div> <!-- form-group end.// -->
            </form>
        </article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">Have an account? <a href="?param=login">Log In</a></p>
    <br><br>
    <!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>


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
                    </div> --> <!-- form-group end.// -->