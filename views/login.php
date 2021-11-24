<section class="section-conten padding-y" style="min-height:84vh">
  <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
    <div class="card-body">
      <h4 class="card-title mb-4">Sign in</h4>
      <form action="./controller/UsuariosController.php?accion=login" method="post">
        <div class="form-group">
          <input name="correo" class="form-control" placeholder="Correo" type="text">
        </div>
        <div class="form-group">
          <input name="password" class="form-control" placeholder="Password" type="password">
        </div> 
        <div class="form-group">
          <a href="#" class="float-right">Forgot password?</a>
          <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="">
            <div class="custom-control-label"> Remember </div>
          </label>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block"> Login </button>
        </div>
      </form>
    </div>
  </div>
  <p class="text-center mt-4">Don't have account? <a href="#">Sign up</a></p>
  <br><br>
</section>