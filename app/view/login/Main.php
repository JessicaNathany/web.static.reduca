<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo-container"></div>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <form action="<?=DIRPAGE.'/login'?>" method="POST" id="loginForm"  id="formLogin">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control" type="text" name='usuario' placeholder="Nome de Usuário"/>          
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" type="password" name='senha' placeholder="Senha"/>     
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-def btn-block" id="btn_login" name="btn_login" value="Login">
          </div>
          <div class="form-group text-center">
            &nbsp;<a href="#">Support</a>
          </div>
        </form>        
      </div>  
    </div>    
  </div>
</div>