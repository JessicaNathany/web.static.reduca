<!--VIEW @Viveiros -->
<?php 
    include DIRREQ.'/src/helpers/data.php';
    include DIRREQ.'/src/helpers/paginationViveiros.php';
?>      
<div class="container" id="tableEspecie" style="display:block;">    
    <h1 style='font-weight:bold;'>Viveiros</h1>
    <hr>
<div class="wrapper">
    <div class='form-group input-group'>
        <form action='#' method='post'>
            <span class='input-group-addon'><i class='glyphicon glyphicon-search'></i></span>
            <input name='consulta' placeholder='Consultar' type='text' class='form-control'>
        </form>
    </div>
    <div class="table">    
    <div class="row header green">
      <div class="cell">
        ID
      </div>
      <div class="cell">
        Nome
      </div>
      <div class="cell">
        Data
      </div>
      <div class="cell">
        Manutenção
      </div>
      <div class="cell">
        Endereço
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
      <div class="cell" data-title="Nome">
        <?=$data['nome']?>
      </div>
      <div class="cell" data-title="Data">
        <?=$data['dt']?>
      </div>
      <div class="cell" data-title="Manutenção">
        <?=$data['manutencao']?>
      </div>
      <div class="cell" data-title="Endereço">
        <?=$data['endereco']?>
      </div>
      <div class="cell" data-title="Cidade">
       <?=$data['cidade']?>
      </div>
      <div class="cell" data-title="Ações">
        <button class='btn btn-sm btn-warning' type='button'  >Editar <span class='glyphicon glyphicon-pencil'></span></button>
        <button class='btn btn-sm btn-danger ' type='button'  id='excluir' onclick='testeBT()'>Excluir <span class='glyphicon glyphicon-trash'></button>
        <button class='btn btn-sm btn-info ' type='button'  data-toggle='modal' data-target='#info<?=$data["id"]?>'> <span class='glyphicon glyphicon-info-sign'></button>
      </div>
    </div>
<!-- JANELA MODAL DE INFORMAÇÕES-->
                <div class="modal fade" id="info<?=$data["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
                    <div class="modal-dialog" role="document">
                       <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: black;"><?=$data["nome"]?></h5>
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
    <a href="../config/gerar_excel.php" class="btn btn-info btn-lg" name="excel"><span class="glyphicon glyphicon-save"></span></a>
     <button class='btn btn-success btn-lg' type='button' onclick="showForm()" name="novo"><span class="glyphicon glyphicon-plus"></span></button>    
</div>
    
</div>
    
<!--=========================================================================-->
<div class="container">                    
           <form action="#" method="post" id="formEspecie" class="form-horizontal" style="display:none;">
               <h1 style='font-weight:bold;'>Viveiros</h1>
                <hr>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Nome:</label>
                    <div class="col-sm-5">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="data">Data do ocorrido:</label>
                    <div class="col-sm-5">
                        <input type="date" name="data" id="data" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="manutencao">Data da Manutenção:</label>
                    <div class="col-sm-5">
                        <input type="date" name="manutencao" id="manutencao" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="endereco">Endereço:</label>
                    <div class="col-sm-5">
                        <input type="text" name="endereco" id="endereco" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="cidade">Cidade:</label>
                    <div class="col-sm-5">
                        <input type="text" name="gFuncional" id="gFuncional" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Estados:</label>
                    <div class="col-sm-3">
                        <select id="inputEstado" class="form-control" required>
                          <option id="opcao" selected>Escolha...</option>
                          <option id="opcao">Acre</option>
                          <option id="opcao">Alagoas</option>
                          <option id="opcao">Amapá</option>
                          <option id="opcao" >Amazonas</option>
                          <option id="opcao">Bahia</option>
                          <option id="opcao">Ceará</option>
                          <option id="opcao">Distrito Federal</option>
                          <option id="opcao">Espírito Santo</option>
                          <option id="opcao">Goiás</option>
                          <option id="opcao">Maranhão</option>
                          <option id="opcao">Mato Grosso</option>
                          <option id="opcao">Mato Grosso do Sul</option>
                          <option id="opcao">Minas Gerais</option>
                          <option id="opcao">Pará</option>
                          <option id="opcao">Paraíba</option>
                          <option id="opcao">Paraná</option>
                          <option id="opcao">Pernambuco</option>
                          <option id="opcao">Piauí</option>
                          <option id="opcao">Rio de Janeiro</option>
                          <option id="opcao">Rio Grande do Norte</option>
                          <option id="opcao">Rio Grande do Sul</option>
                          <option id="opcao">Rondônia</option>
                          <option id="opcao">Roraima</option>
                          <option id="opcao">Santa Catarina</option>
                          <option id="opcao">São Paulo</option>
                          <option id="opcao">Sergipe</option>
                          <option id="opcao">Tocantins</option>
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
                    <label class="control-label col-sm-2" for=""></label>
                    <div class="col-sm-3">
                        <input type="submit" name="btn_enviar" id="btn_enviar" value="Enviar" class="btn btn-success" >
                        <input type="submit" name="btn_voltar" id="btn_voltar" value="Voltar" class="btn btn-primary" onclick="hideForm()">
                    </div>
                </div>
            </form>
        </div>
