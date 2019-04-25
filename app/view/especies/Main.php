<!--VIEW @ESPECIES -->
<?php 
    include DIRREQ.'/src/helpers/data.php';
    include DIRREQ.'/src/helpers/paginationEspecies.php';
?>
<div class="container" id="tableEspecie" style="display:block;">
    <h1 style='font-weight:bold;'>Espécies e Variedades</h1>
    <hr>
    <div class='navbar-form pull-righ'>
       <form action='buscar.php' method='post'>
            <button class="btn btn-inverse">Buscar</button>
            <input type="text" class="form-control">
         </form>                 
    </div>      
    <hr>
    <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome Popular</th>
                    <th>Nome Cientifico</th>
                    <th>Familia</th>
                    <th>Classe Sucessional</th>
                    <th>Grupo Funcional</th>
                    <th>Dispersão</th>
                    <th>Habito</th>
                    <th>Bioma</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($limite->rowCount() > 0){
                        while($data=$limite->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?=$data['id']?></td>
                    <td><?=$data['nPopular']?></td>
                    <td><?=$data['nCientifico']?></td>
                    <td><?=$data['familia']?></td>
                    <td><?=$data['classeSucessional']?></td>
                    <td><?=$data['gFuncional']?></td>
                    <td><?=$data['dispersao']?></td>
                    <td><?=$data['habito']?></td>
                    <td><?=$data['bioma']?></td>
                    <td>
                      <button class='btn btn-warning' type='button'  >Editar <span class='glyphicon glyphicon-pencil'></span></button>
                      <button class='btn btn-danger ' type='button'  id='excluir' onclick='testeBT()'>Excluir <span class='glyphicon glyphicon-trash'></button>
                      <button class='btn btn-info ' type='button'  data-toggle='modal' data-target='#info<?=$data["id"]?>'> <span class='glyphicon glyphicon-info-sign'></button>
                    </td>
                </tr>
       <!-- JANELA MODAL DE INFORMAÇÕES-->
                <div class="modal fade" id="info<?=$data["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
                    <div class="modal-dialog" role="document">
                       <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: black;"><?=$data["nPopular"]?></h5>
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
                <?php if($pc>1){ ?>
                <a href="?pagina=<?=$anterior?>"><button  class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-backward'></button></a>
                <?php } ?>
                
                <?php if($pc<$tp){ ?>
                <a href="?pagina=<?=$proximo?>"><button class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-forward'></button></a>
                <?php }else{
                    
                }
                ?>                             
            </tbody>        
        </table>
        <a href="../config/gerar_excel.php" class="btn btn-info btn-lg" name="excel"><span class="glyphicon glyphicon-save"></span></a>
        <button class='btn btn-success btn-lg' type='button' onclick="showForm()" name="novo"><span class="glyphicon glyphicon-plus"></span></button>
</div>

<!-- Form de cadastro de funcionarios -->      
       <div class="container">                    
           <form action="#" method="post" id="formEspecie" class="form-horizontal" style="display:none;">
               <h1 style='font-weight:bold;'>Espécies e Variedades</h1>
                <hr>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nPopular">Nome Popular:</label>
                    <div class="col-sm-5">
                        <input type="text" name="nPopular" id="nPopular" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nCientifico">Nome Cientifico:</label>
                    <div class="col-sm-5">
                        <input type="text" name="nCientifico" id="nCientifico" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="familia">Familia:</label>
                    <div class="col-sm-5">
                        <input type="text" name="familia" id="familia" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="classeSucessional">Classe Sucessional:</label>
                    <div class="col-sm-5">
                        <input type="text" name="classeSucessional" id="classeSucessional" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="gFuncional">Grupo Funcional:</label>
                    <div class="col-sm-5">
                        <input type="text" name="gFuncional" id="gFuncional" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="extincao">Extinção:</label>
                    <div class="col-sm-5">
                        <input type="text" name="extincao" id="extincao" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="dispersao">Disperção:</label>
                    <div class="col-sm-5">
                        <input type="text" name="dispersao" id="dispersao" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="habito">Habito:</label>
                    <div class="col-sm-5">
                        <input type="text" name="habito" id="habito" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="bioma">Bioma:</label>
                    <div class="col-sm-5">
                        <input type="text" name="bioma" id="bioma" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="descricao">Descrição:</label>
                    <div class="col-sm-5">
                        <textarea  name="descricao" id="descricao" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                
                <div class="form-group form-inline">
                    <label class="control-label col-sm-2" for="nome"></label>
                    <div class="col-sm-3">
                        <input type="submit" name="btn_enviar" id="nome" value="Enviar" class="btn btn-success" >
                        <input type="submit" name="btn_voltar" id="nome" value="Voltar" class="btn btn-primary" onclick="hideForm()">
                    </div>
                </div>
            </form>
        </div>
