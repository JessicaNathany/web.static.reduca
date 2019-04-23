<!doctype html>
<html lang="pt-br">
    <head>
        <!--Meta obrigatorio -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Wanclei Felipe">
        <meta name="description" content="<?=$this->getDescription();?>">
        <meta name="keywords" content="<?=$this->getKeywords();?>">
        <title><?=$this->getTitle();?></title>
        
        <!-- Estilos em cascata @CSS--> 
        <link rel="stylesheet" href="<?= DIRCSS.'bootstrap-3.3.7/dist/css/bootstrap.min.css' ?>">
        <link rel="stylesheet" href="<?= DIRCSS.'bootstrap-3.3.7/dist/css/bootstrap-theme.min.css' ?>">        
        <link rel="stylesheet" href="<?=DIRCSS.'login_view.css'?>">
              
        <?=$this->addHead();?>
    </head>
    <body>
     <div class='container'>
            <div class='row'>
                <div class='Absolute-Center is-Responsive'>                    
                    <div class='col-sm-12 col-md-10 col-md-offset-1'>
                        Acesso Proibido! <a href="<?= DIRPAGE ?>">Faça Login.</a>
                    </div>
                    </div>
                </div>                
            </div>              
    </body>
</html>



        