<div class="container">
            <form action="control/ctrlUsuario.php" method="POST" class="col-md-6 offset-md-3" id="formLogin">
                <h1>Login</h1>
                <hr>
                <div class="form-group">                    
                    <div class="col-md-7">
                        <label for="usuario" class="control-label">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" required maxlength="10">
                    </div>
                    
                <div class="form-group">                    
                    <div class="col-md-7 ">
                        <label for="senha" class="control-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="" required maxlength="10">
                        <a href="#">Recuperar senha <span class="glyphicon glyphicon-envelope"></span></a>   
                    </div>
                </div>
                                                                                  
                 <div class="form-group">                    
                    <div class="col-md-7">
                        <label for="" class="control-label"></label>
                        <input type="submit" class="btn btn-success " id="entrar" name="entrar" value="Entrar">
                    </div>
                </div>                                          
            </form>    
        </div>
    </div>
        