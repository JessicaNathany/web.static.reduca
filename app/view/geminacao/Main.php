<!--VIEW @Geminação -->
<?php 
    include DIRREQ.'/src/helpers/data.php';
    include DIRREQ.'/src/helpers/paginationGeminacao.php';
?>      
<div class="container" id="tableEspecie" style="display:block;">    
    <h1 style='font-weight:bold;'>Geminação</h1>
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
        Especie
      </div>
      <div class="cell">
        Data
      </div>
      <div class="cell">
        Quantidade
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
      <div class="cell" data-title="Especie">
        <?=$data['especie']?>
      </div>
      <div class="cell" data-title="Data">
        <?=$data['dt']?>
      </div>
      <div class="cell" data-title="Quantidade">
        <?=$data['qtde']?>
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
                                <h5 class="modal-title" id="exampleModalLabel" style="color: black;"><?=$data["especie"]?></h5>
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
           <form action="#" method="post" id="formEspecie" class="form-horizontal" style="display:none;">
               <h1 style='font-weight:bold;'>Geminação</h1>
                <hr>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="especie">Nome Popular da especie:</label>
                    <div class="col-sm-5">
                        <input type="text" name="especie" id="especie" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="data">Data da Geminação:</label>
                    <div class="col-sm-5">
                        <input type="date" name="data" id="data" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="qtde">Quantidade:</label>
                    <div class="col-sm-5">
                        <input type="text" name="qtde" id="qtde" class="form-control">
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
