 <div class="container" id="tabelafunc">      
                                                                        
       <table class=" table-condensed rTable" border="2" >
           
            <thead >
              <tr>
                <th id="headerTH">Codigo</th>
                <th id="headerTH">Nome Popular</th>
                <th id="headerTH">Classe</th>
                <th id="headerTH">Habito</th>
                <th id="headerTH">Opções</th>
              </tr>
            </thead>
            <tbody>
              <?php                                
                
                $busca = "SELECT * FROM tb_especiesVariedades WHERE 1";
                $total_reg = "10";
                
                $pagina = $_GET['pagina'];           
                        
                if(!$pagina){
                    $pc = "1";
                }else{
                    $pc = $pagina;
                }
                $inicio = $pc -1;
                $inicio = $inicio * $total_reg;
                
                $limite = mysqli_query($con,"$busca LIMIT $inicio,$total_reg");
                $todos = mysqli_query($con, $busca);
                
                $tr = mysqli_num_rows($todos);
                $tp = $tr/$total_reg;
                ?>
               <?php if($limite->num_rows > 0){
                    while ($row = $limite->fetch_assoc()){ ?>
                             <tr>
                                <td style=' font-weight:bold;'><?=$row['id']?></td>
                                <td style=''><?=$row['nPopular']?></td>
                                 <td><?=$row['classeSucessional']?></td>
                                  <td><?=$row['habito']?></td>
                                            
                                <td>
                                <button class='btn btn-warning' type='button' style='margin-bottom: 2px;' >Editar <span class='glyphicon glyphicon-pencil'></span></button></a>
                                <button class='btn btn-danger' type='button' style='margin-bottom: 2px;' id='excluir' onclick='testeBT()'>Excluir <span class='glyphicon glyphicon-trash'></button></a>
                                <button class='btn btn-info' type='button' style='margin-bottom: 2px;' data-toggle='modal' data-target='#info<?=$row["id"]?>'> <span class='glyphicon glyphicon-info-sign'></button>
                                </td>
                            </tr>                   
                            


                            <!-- Modal -->
                            <div class="modal fade" id="info<?=$row["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;"><?=$row["nPopular"]?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body" style="color: black;">
                                   Codigo:  <?=$row["id"]?> <br>
                                   Nome Popular: <?=$row["nPopular"]?> <br>
                                   Nome Cientifico: <?=$row["nCientifico"]?> <br>
                                   Familia: <?=$row["familia"]?> <br>                                                                   
                                   Classe   : <?=$row["classeSucessional"]?> <br>
                                   Grupo Funcional: <?=$row["gFuncional"]?> <br>
                                   Extinção: <?=$row["extincao"]?> <br>
                                   Dispersão: <?=$row["dispersao"]?> <br>
                                   Habito: <?=$row["habito"]?> <br>
                                   Bioma: <?=$row["bioma"]?> <br>
                                   
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   
                                  </div>
                                </div>
                              </div>
                            </div>
                   <?php } ?>
            
                    <?php $anterior = $pc-1; ?>
                    <?php $proximo = $pc+1;  ?>                
                    
                    
                    <div class='form-group input-group'>
                        <form action='buscar.php' method='post'>
                            <span class='input-group-addon'><i class='glyphicon glyphicon-search'></i></span>
                            <input name='consulta' placeholder='Consultar' type='text' class='form-control'>
                        </form>
                    </div>  
                    <h1 style='font-weight:bold;'>Espécies e Variedades</h1>
                    <hr>
                    
                    
                 <?php if($pc>1){ 
                        echo "<a href='?pagina=$anterior'><button  class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-backward'></button></a>";
                    } 
                   
                  if($pc<$tp){ 
                       echo "<a href='?pagina=$proximo'><button class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-forward'></button></a>";
                    }
                }else{
                    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
                }
                
              ?>
            </tbody>
          </table>
            <hr>
            <a href="../config/gerar_excel.php" class="btn btn-info btn-lg" name="excel"><span class="glyphicon glyphicon-save"></span></a>
            <button class='btn btn-success btn-lg' type='button' onclick="showForm()" name="novo"><span class="glyphicon glyphicon-plus"></span></button>
            
        </div>

<!-- -->
<!-- Form de cadastro de funcionarios -->      
       <div class="container">                    
           <form action="#" method="post" id="cadastrarfunc" class="form-horizontal" style="display:none;">
               <h1>Especies e Variedades</h1>
                <hr>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Nome Popular:</label>
                    <div class="col-sm-5">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Nome Cientifico:</label>
                    <div class="col-sm-5">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Familia:</label>
                    <div class="col-sm-5">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Classe Sucessional:</label>
                    <div class="col-sm-5">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Grupo Funcional:</label>
                    <div class="col-sm-3">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Exntincao:</label>
                    <div class="col-sm-3">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Disperção:</label>
                    <div class="col-sm-3">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Habito:</label>
                    <div class="col-sm-3">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Bioma</label>
                    <div class="col-sm-3">
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                
                <div class="form-group form-inline">
                    <label class="control-label col-sm-2" for="nome"></label>
                    <div class="col-sm-3">
                        <input type="submit" name="nome" id="nome" value="Enviar" class="btn btn-success" >
                        <input type="submit" name="nome" id="nome" value="Voltar" class="btn btn-primary" onclick="hideForm()">
                    </div>
                </div>
            </form>
        </div>

<script>
            function showForm(){
                document.getElementById("cadastrarfunc").style.display="block";
                document.getElementById("tabelafunc").style.display="none";
            }
            function hideForm(){
                document.getElementById("cadastrarfunc").style.display="none";
                document.getElementById("tabelafunc").style.display="block";
            }
            
        </script>