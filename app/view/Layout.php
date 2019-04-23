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
        <link rel="stylesheet" href="<?=DIRCSS.'Style.css'?>">
              
        <?=$this->addHead();?>
    </head>
        <?php 
            $url = $_GET['url'];
          if($url != ''){
              if($url != 'login'){
                require(DIRREQ.'/config/navbar.php');
              }
          } 
                 
        ?>
        <!-- Menu, Navbars etc..-->
            <div class="Header">
                <?=$this->addHeader();?>
                
                <?php 
                    $url = $_GET['url'];
                    if($url != ''){
                        if($url != 'login'){
                            $BC = new Src\Classes\ClassBreadcrumb();
                            $BC->addBreadcrumb();   
                        }
                       
                    }                    
                    
                ?> 
                <hr>
            </div>
        
        
        <!-- Conteudo -->
        
           <div class="Main">
                 <?=$this->addMain();?>
           </div> 
        
        
        <!-- Rodapé -->
        
            <div class="Footer">
                <?=$this->addFooter();?> 
            </div>
        
        <!-- SCRIPTS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="https://www.google.com/recaptcha/api.js?render=<?=SITEKEY?>"></script>
        <script src="<?= DIRCSS.'bootstrap-3.3.7/dist/js/bootstrap.min.js'?>"></script>
        <script src="<?= DIRJS.'vendor/modernizr-2.8.3-respond-1.4.2.min.js'?>"></script>
        <script src="<?= DIRJS.'zepto.min.js'?>"></script>
        <script src="<?= DIRJS.'main.js' ?>"></script>
        
        
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        
        
               
    </body>
</html>

