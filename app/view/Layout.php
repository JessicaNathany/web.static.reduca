<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?= $this->getTitle(); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
        <link rel="stylesheet" href="<?= DIRCSS . 'fonts/icomoon/style.css' ?>">
        <!--===============================[CSS]======================================-->
        <link rel="stylesheet" href="<?= DIRCSS . 'bootstrap.min.css' ?>">
        <link rel="stylesheet" href="<?= DIRCSS . 'magnific-popup.css' ?>">
        <link rel="stylesheet" href="<?= DIRCSS . 'jquery-ui.css' ?>">
        <link rel="stylesheet" href="<?= DIRCSS . 'owl.carousel.min.css' ?>">
        <link rel="stylesheet" href="<?= DIRCSS . 'owl.theme.default.min.css' ?>">

        <link rel="stylesheet" href="<?= DIRCSS . 'bootstrap-datepicker.css' ?>">

        <link rel="stylesheet" href="<?= DIRCSS . 'fonts/flaticon/font/flaticon.css' ?>">

        <link rel="stylesheet" href="<?= DIRCSS . 'aos.css' ?>">

        <link rel="stylesheet" href="<?= DIRCSS . 'style.css' ?>">

    </head>
    <body>
        <!--=================[HEADER SUPERIOR]====================-->    
        <div class="site-wrap">
            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>

            <div class="border-bottom top-bar py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-0">
                                <span class="mr-3"><strong>Tel::</strong> <a href="tel://#">(11)1234-0000</a></span>
                                <span><strong>Email:</strong> <a href="#">emaildareuca@reduca.com</a></span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <ul class="social-media">
                                <li><a href="<?=FACEBOOK?>" class="p-2"><span class="icon-facebook"></span></a></li>
                                <li><a href="<?=TWITTER?>" class="p-2"><span class="icon-twitter"></span></a></li>
                                <li><a href="<?=INSTAGRAM?>" class="p-2"><span class="icon-instagram"></span></a></li>
                                <li><a href="<?=LINKEDIN?>" class="p-2"><span class="icon-linkedin"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!--=================[MENU]======================-->
        <header class="site-navbar py-4 bg-white" role="banner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-11 col-xl-2">
                        <h1 class="mb-0 site-logo"><a href="<?= DIRPAGE ?>" class="text-black h2 mb-0">REDUCA</a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li class="active"><a href="<?= DIRPAGE ?>">Home</a></li>
                                <li><a href=""></a></li>
                                <li class="has-children">
                                    <a href="">Projetos</a>
                                    <ul class="dropdown">
                                        <li><a href="<?= DIRPAGE.'/fumcad' ?>">FUMCAD</a></li>
                                        <li><a href="<?= DIRPAGE.'/proac' ?>">PROAC</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?= DIRPAGE.'/sobre' ?>">Sobre</a></li>
                                <li><a href="<?= DIRPAGE.'/comoAjudar' ?>">Como Ajudar?</a></li>
                                <li><a href="<?= DIRPAGE.'/contatos' ?>">Contatos</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
                </div>
            </div>
        </header>
        <!--=================[/HEADER]====================--
        <div class="Header">
           
        </div>
        

        <!--=================[MAIN]====================-->
        <div class="Main">
            <?= $this->addMain(); ?>
        </div> 


        <!--=================[FOOTER]====================-->
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-5">
                                <h2 class="footer-heading mb-4">Sobre nós</h2>
                                <p>pequeno resumo sobre quem é a reduca.</p>
                            </div>
                            <div class="col-md-3 ml-auto">
                                <h2 class="footer-heading mb-4">Caracteristicas</h2>
                                <ul class="list-unstyled">
                                    <li><a href="<?=DIRPAGE.'/sobre'?>">Sobre</a></li>
                                    <li><a href="<?=DIRPAGE.'/projetos'?>">Projetos</a></li>
                                    <li><a href="<?=DIRPAGE.'/comoAjudar'?>">Como Ajudar?</a></li>
                                    <li><a href="<?=DIRPAGE.'/contatos'?>">Contatos</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h2 class="footer-heading mb-4">Siga-nos</h2>
                                <a href="<?=FACEBOOK?>" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                                <a href="<?=TWITTER?>" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                                <a href="<?=INSTAGRAM?>" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                                <a href="<?=LINKEDIN?>" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Inscrever-se</h2>
                        <form action="#" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Site criado <i class="icon-heart" aria-hidden="true"></i> por <a href="#" target="_blank" >Reduca</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
        <div class="footer">
            <?= $this->addFooter(); ?>
        </div>
        <script src="<?= DIRJS . 'jquery-3.3.1.min.js' ?>"></script>
        <script src="<?= DIRJS . 'jquery-migrate-3.0.1.min.js' ?>"></script>
        <script src="<?= DIRJS . 'jquery-ui.js' ?>"></script>
        <script src="<?= DIRJS . 'popper.min.js' ?>"></script>
        <script src="<?= DIRJS . 'bootstrap.min.js' ?>"></script>
        <script src="<?= DIRJS . 'owl.carousel.min.js' ?>"></script>
        <script src="<?= DIRJS . 'jquery.stellar.min.js' ?>"></script>
        <script src="<?= DIRJS . 'jquery.countdown.min.js' ?>"></script>
        <script src="<?= DIRJS . 'jquery.magnific-popup.min.js' ?>"></script>
        <script src="<?= DIRJS . 'bootstrap-datepicker.min.js' ?>"></script>
        <script src="<?= DIRJS . 'aos.js' ?>"></script>

        <script src="<?= DIRJS . 'typed.js' ?>"></script>
        <script src="<?= DIRJS . 'main.js' ?>"></script>
    </body>
</html>