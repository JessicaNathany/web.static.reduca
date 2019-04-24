 <body style="background-color: #f8f8f8;">
        <nav class="navbar navbar-default">
        <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="Opções de Cadastramentros">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                  <a class="navbar-brand" href="<?= DIRPAGE.'/home' ?>"><span class='glyphicon glyphicon-home'></a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class=""></span></a>
                    <ul class="dropdown-menu">
                        <!--<li><a href="funcionarios.php?pagina=1">Funcionários</a></li>-->
                        <li><a href="<?= DIRPAGE.'/especies' ?>">Espécies e Variedades</a></li>
                      <li><a href="<?= DIRPAGE.'/viveiros' ?>">Viveiros</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="<?= DIRPAGE.'/clientes' ?>">Clientes</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="<?= DIRPAGE.'/locais_coleta' ?>">Locais de Coleta</a></li>
                    </ul>
                  </li>
                  <!-- -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produção <span class=""></span></a>
                    <ul class="dropdown-menu">  
                      <li><a href="<?= DIRPAGE.'/coleta_sementes' ?>">Coleta de Sementes</a></li> 
                      <li><a href="<?= DIRPAGE.'/geminacao' ?>">Geminação</a></li>
                      <li><a href="<?= DIRPAGE.'/repicagem' ?>">Repicagem</a></li>                                         
                    </ul>
                  </li>
                  <!-- -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lembretes <span class=""></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?= DIRPAGE.'/descartes' ?>">Perdas e Descartes</a></li>
                      <li><a href="<?= DIRPAGE.'/inventario' ?>">Inventário de Mudas</a></li>
                      <li><a href="<?= DIRPAGE.'/lotes' ?>">Lotes</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="<?= DIRPAGE.'/insumos' ?>">Insumos</a></li>
                      
                    </ul>
                  </li>
                  <!-- -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Serviços <span class=""></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= DIRPAGE.'/doacao' ?>">Doação</a></li>
                      
                    </ul>
                  </li>
                  <!-- -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relátorios <span class=""></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?= DIRPAGE.'/estoque_mudas' ?>">Estoque de Mudas</a></li>
                      <li><a href="<?= DIRPAGE.'/estoque_sementes' ?>">Estoque de Sementes</a></li>
                      <li><a href="<?= DIRPAGE.'/lotes_periodo' ?>">Lotes por Periodo</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="<?= DIRPAGE.'/producao_anual' ?>">Produção Anual</a></li>
                      <li><a href="<?= DIRPAGE.'/producao_semanal' ?>">Produção Semanal</a></li>
                      <li><a href="<?= DIRPAGE.'/producao_mensal' ?>">Produção Mensal</a></li>
                      
                    </ul>
                  </li>
                  <!-- -->
                  <li class="dropdown">
                    <a href="<?= DIRPAGE ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Config <span class=''></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?= DIRPAGE ?>">Perfil</a></li>
                      <li><a href="<?= DIRPAGE.'/users' ?>" >Novo Usuario</a></li>
                      <li><a href="<?= DIRPAGE ?>">Trocar Senha</a></li>
                      <li><a href="<?= DIRPAGE ?>">Maps</a></li>
                      
                    </ul>
                  </li>
                </ul>                                                               
                  <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= DIRPAGE."/logout" ?>"><span class="glyphicon glyphicon-off"></span></a></li>
              </ul>
                  
              </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
     