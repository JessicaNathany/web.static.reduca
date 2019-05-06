<?php
#<!--VIEW @Insumos -->
include DIRREQ . '/src/helpers/data.php';
include DIRREQ . '/src/helpers/paginationInsumos.php';
?>      
<div class="container" id="tableEspecie" style="display:block;">    
    <h1 style='font-weight:bold;'>Insumos</h1>
    <hr>
    <div class="wrapper">
        <div class="form-group form-inline">
            <form method="post" action="<?= DIRPAGE . '/insumos?pagina=1' ?>">
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
                    Nome
                </div>
                <div class="cell">
                    Categoria
                </div>
                <div class="cell">
                    Tipo
                </div>
                <div class="cell">
                    Quantidade
                </div>
                <div class="cell">
                    Ações
                </div>
            </div>
            <?php
            if ($limite->rowCount() > 0) {
                while ($data = $limite->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="row">
                        <div class="cell" data-title="ID">
                            <?= $data['id'] ?>
                        </div>
                        <div class="cell" data-title="Popular">
                            <?= $data['nome'] ?>
                        </div>
                        <div class="cell" data-title="Familia">
                            <?= $data['categoria'] ?>
                        </div>
                        <div class="cell" data-title="Dispersão">
                            <?= $data['tipo'] ?>
                        </div>
                        <div class="cell" data-title="Habito">
                            <?= $data['qtde'] ?>
                        </div>
                        <div class="cell" data-title="Ações">
                            <button class='btn btn-sm btn-warning' type='button'>Editar <span class='glyphicon glyphicon-pencil'></span></button>
                            <button class='btn btn-sm btn-danger ' type='submit' id='btn_excluir' name="btn_excluir" onclick="btn_excluir(<?= $data["id"] ?>)">Excluir <span class='glyphicon glyphicon-trash'></span></button>
                            <button class='btn btn-sm btn-info' type='button' data-toggle='modal' data-target='#info<?= $data["id"] ?>'><span class='glyphicon glyphicon-info-sign'></span></button>
                        </div>
                    </div>
                    <!-- JANELA MODAL DE INFORMAÇÕES-->
                    <div class="modal fade" id="info<?= $data["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;"><?= $data["nome"] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="color: black;">
                                    Descrição: <?= $data["descricao"] ?> <br>                                                                     
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
            <?php if ($pc > 1) { ?>
                <a href="?pagina=<?= $anterior ?>"><button  class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-backward'></button></a>
            <?php } ?>

            <?php if ($pc < $tp) { ?>
                <a href="?pagina=<?= $proximo ?>"><button class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-forward'></button></a>
                <?php
            } else {
                
            }
            ?>
        </div>
        <a href="<?= DIRPAGE . '/insumos?pagina=0' ?>" class="btn btn-info btn-lg" name="excel"><span class="glyphicon glyphicon-save"></span></a>
        <button class='btn btn-success btn-lg' type='button' onclick="showForm()" name="novo"><span class="glyphicon glyphicon-plus"></span></button>    
    </div>

</div>

<!--=========================================================================-->
<div class="container">                    
    <form action="<?= DIRPAGE . '/insumos?pagina=1' ?>" method="post" id="formEspecie" class="form-horizontal" style="display:none;">
        <h1 style='font-weight:bold;'>Insumos</h1>
        <hr>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nome">Nome:</label>
            <div class="col-sm-5">
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="categoria">Categoria:</label>
            <div class="col-sm-3">
                <select id="categoria" name="categoria" class="form-control" required>
                    <option  selected>Escolha...</option>
                    <option value="Natural">Natural</option>                         
                    <option value="Organico">Organico</option>                         
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="tipo">Tipo:</label>
            <div class="col-sm-5">
                <input type="text" name="tipo" id="tipo" class="form-control">
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
            <label class="control-label col-sm-2"></label>
            <div class="col-sm-3">
                <input type="submit" name="btn_enviar" id="nome" value="Enviar" class="btn btn-success" >
                <input type="submit" name="btn_voltar" id="nome" value="Voltar" class="btn btn-primary" onclick="reload();">
            </div>
        </div>
    </form>
</div>
