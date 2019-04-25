<!-- VIEW @GEMINAÇÃO -->
<?php 
    include DIRREQ.'/src/helpers/data.php';
    include DIRREQ.'/src/helpers/paginationSementes.php';
?>
<div class="container">
    <h1 style='font-weight:bold;'>Geminação</h1>
    <hr>
    <div class='navbar-form pull-righ'>
       <form action='buscar.php' method='post'>
            <button class="btn btn-inverse">Buscar</button>
            <input type="text" class="form-control">
         </form>                 
    </div>      
    <hr>
    <table class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Especie</th>
                    <th>Data da Geminação</th>
                    <th>Quantidade</th>
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
                    <td><?=$data['especie']?></td>
                    <td><?=$data['dt']?></td>
                    <td><?=$data['qtde']?></td>                                   
                    <td>
                      <button class='btn btn-warning' type='button'  >Editar <span class='glyphicon glyphicon-pencil'></span></button>
                      <button class='btn btn-danger ' type='button'  id='excluir' onclick='testeBT()'>Excluir <span class='glyphicon glyphicon-trash'></button>
                      <button class='btn btn-info ' type='button'  data-toggle='modal' data-target=''> <span class='glyphicon glyphicon-info-sign'></button>
                    </td>
                </tr>
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
                                Descrição:  <?=$data["descricao"]?> <br>                                                                     
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                   
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
</div>
