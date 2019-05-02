<!--VIEW @Clientes -->
<?php 
    include DIRREQ.'/src/helpers/data.php';
    include DIRREQ.'/src/helpers/paginationClientes.php';
?>      
<div class="container" id="tableEspecie" style="display:block;">    
    <h1 style='font-weight:bold;'>Clientes</h1>
    <hr>
<div class="wrapper">
    <div class="form-group form-inline">
<<<<<<< HEAD
        <form method="post" action="<?=DIRPAGE.'/especies?pagina=1'?>">
=======
        <form method="post" action="<?=DIRPAGE.'/clientes?pagina=0'?>">
>>>>>>> origin/master
            <button class="btn btn-sm btn-primary" type="submit" id="btn_consulta" name="btn_consultar"><span class='glyphicon glyphicon-search'></span></button>
            <input id="consultar" name='consultar' placeholder='Consultar' type='text' class='form-control'>           
        </form>
    </div>
    <div class="table">    
    <div class="row header green">
      <div class="cell">
        ID
      </div>
      <div class="cell">
        Razão Social
      </div>
      <div class="cell">
        CNPJ
      </div>
      <div class="cell">
        Contato
      </div>
      <div class="cell">
        Email
      </div>
      <div class="cell">
        Cidade
      </div>
      <div class="cell">
        Ações
      </div>
    </div>
    <?php 
      if($limite->rowCount() > 0){
        while($data=$limite->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="row">
      <div class="cell" data-title="ID">
        <?=$data['id']?>
      </div>
      <div class="cell" data-title="Razão Social">
        <?=$data['razaosocial']?>
      </div>
      <div class="cell" data-title="CNPJ">
        <?=$data['cnpj']?>
      </div>
      <div class="cell" data-title="Contato">
        <?=$data['contato']?>
      </div>
      <div class="cell" data-title="Email">
        <?=$data['email']?>
      </div>       
      <div class="cell" data-title="Cidade">
       <?=$data['cidade']?>
      </div>
      <div class="cell" data-title="Ações">
        <button class="btn btn-sm btn-warning" type="submit">Editar <span class='glyphicon glyphicon-pencil'></span></button>
        <button class="btn btn-sm btn-danger" type="submit">Excluir<span class='glyphicon glyphicon-trash'></span></button>
        <button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target='#info<?=$data["id"]?>'><span class='glyphicon glyphicon-info-sign'></span></button>
      </div>
</div>
<!-- JANELA MODAL DE INFORMAÇÕES-->
<div class="modal fade" id="info<?=$data["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                       <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: black;"><?=$data["razaosocial"]?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: black;">
                                Descrição: <?=$data["descricao"]?> <br>                                                                     
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                   
                           </div>
                        </div>
                    </div>
                </div>
        <?php 
        }
      }
        ?>
        <?php 
        if($pc>1){ ?>
            <a href="?pagina=<?=$anterior?>"><button  class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-backward'></button></a>
          <?php } ?>
                
       <?php 
       if($pc<$tp){ ?>
           <a href="?pagina=<?=$proximo?>"><button class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-forward'></button></a>
          <?php }else{
                    
         }
       ?>
    </div>
    <a href="#" class="btn btn-info btn-lg" name="excel"><span class="glyphicon glyphicon-save"></span></a>
     <button class='btn btn-success btn-lg' type='button' onclick="showForm()" name="novo"><span class="glyphicon glyphicon-plus"></span></button>    
</div>
    
</div>
    
<!--=========================================================================-->
<div class="container">                    
           <form action="<?=DIRPAGE.'/clientes?pagina=1'?>" method="post" id="formEspecie" class="form-horizontal" style="display:none;">
               <h1 style='font-weight:bold;'>Clientes</h1>
                <hr>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="razaosocial">Nome / Razão Social:</label>
                    <div class="col-sm-5">
                        <input type="text" name="razaosocial" id="razaosocial" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="cnpj">CNPJ:</label>
                    <div class="col-sm-5">
                        <input type="text" name="cnpj" id="cnpj" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="contato">Contato:</label>
                    <div class="col-sm-5">
                        <input type="tel" name="contato" id="contato" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="endereço">Endereço:</label>
                    <div class="col-sm-5">
                        <input type="text" name="endereco" id="endereco" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="cidade">Cidade:</label>
                    <div class="col-sm-5">
                        <input type="text" name="cidade" id="cidade" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="estados">Estados:</label>
                    <div class="col-sm-3">
                        <select id="inputEstado" class="form-control" name="estados" required>
                          <option  selected>Escolha...</option>
                          <option value="Ac">Acre</option>
                          <option value="Al">Alagoas</option>
                          <option value="Ap">Amapá</option>
                          <option value="Am" >Amazonas</option>
                          <option value="Ba">Bahia</option>
                          <option value="Ce">Ceará</option>
                          <option value="Df">Distrito Federal</option>
                          <option value="Es">Espírito Santo</option>
                          <option value="Go">Goiás</option>
                          <option value="Ma">Maranhão</option>
                          <option value="Mt">Mato Grosso</option>
                          <option value="Ms">Mato Grosso do Sul</option>
                          <option value="Mg">Minas Gerais</option>
                          <option value="Pa">Pará</option>
                          <option value="Pb">Paraíba</option>
                          <option value="Pr">Paraná</option>
                          <option value="Pe">Pernambuco</option>
                          <option value="Pi">Piauí</option>
                          <option value="Rj">Rio de Janeiro</option>
                          <option value="Rn">Rio Grande do Norte</option>
                          <option value="Rs">Rio Grande do Sul</option>
                          <option value="Ro">Rondônia</option>
                          <option value="Rr">Roraima</option>
                          <option value="Sc">Santa Catarina</option>
                          <option value="Sp">São Paulo</option>
                          <option value="Se">Sergipe</option>
                          <option value="To">Tocantins</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="cep">Cep:</label>
                    <div class="col-sm-5">
                        <input type="text" name="cep" id="cep" class="form-control">
                    </div>
                </div>               
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="descricao">Descrição:</label>
                    <div class="col-sm-5">
                        <textarea  name="descricao" id="descricao" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                
                <div class="form-group form-inline">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-3">
                        <input type="submit" name="btn_enviar" id="btn_enviar" value="Enviar" class="btn btn-success" >
                        <input type="submit" name="btn_voltar" id="btn_voltar" value="Voltar" class="btn btn-primary" onclick="hideForm()">
                    </div>
                </div>
            </form>
        </div>
