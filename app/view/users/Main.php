<!-- Form de cadastro de funcionarios -->            
<div class="container">                    
           <form action="<?=DIRPAGE.'/users'?>" method="POST" id="formUsers" class="form-horizontal">
               <h1>Cadastrar Usuários</h1>
                <hr>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Nome Completo</label>
                    
                    <div class="col-sm-5">
                        <input type="text" name="nome" id="nome" class="form-control" required>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="usuario">Usuário</label>
                    <div class="col-sm-5">
                        <input type="text" name="usuario" id="usuario" class="form-control" required>
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" id="email" class="form-control" required>
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="senha">Senha:</label>
                    <div class="col-sm-5">
                        <input type="password" name="senha" id="senha" class="form-control" required>
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="repSenha">Repita a Senha:</label>
                    <div class="col-sm-5">
                        <input type="password" name="repSenha" id="repSenha" class="form-control" required>
                        
                    </div>
                </div>
                
                <!--<div class="form-group">
                    <label class="control-label col-sm-2" for="tipo">Tipo de Usuário:</label>
                    <div class="col-sm-5">
                        <input type="text" name="tipo" id="tipo" class="form-control" required>
                        
                    </div>
                </div>-->
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="tipo">Tipo de usuario:</label>
                    <div class="col-sm-3">
                        <select id="inputEstado" class="form-control" name="tipo" required>
                          <option  selected>Escolha...</option>
                          <option  value="administrador">Administrador</option>
                          <option  value="padrao">Padrão</option>
                        </select>
                    </div>
                </div> 
                <!-- CAMPO DO CAPTCHA -->
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" required>
                <input type="text" name="retornoUsers" id="retornoUsers" style="color: red;">
                                          
                
                <div class="form-group form-inline">
                    <label class="control-label col-sm-2" for="btn_enviar"></label>
                    <div class="col-sm-3">
                        <input type="submit" name="btn_enviar" id="btn_enviar" value="Enviar" class="btn btn-success" >
                    </div>
                </div>
            </form>
        </div>
