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
                                <span class="mr-3"><strong>Tel::</strong> <a href="tel://#">(11)99321-9897</a></span>
                                <span><strong>Email:</strong> <a href="#">reduca@gmail.com</a></span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <ul class="social-media">
                                <li><a href="#" class="p-2"><span class="icon-facebook"></span></a></li>
                                <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
                                <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
                                <li><a href="#" class="p-2"><span class="icon-linkedin"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
            <!--=================[HEADER]====================-->
            <div class="Header">
                <?= $this->addHeader(); ?>
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
                                    <h2 class="footer-heading mb-4">About Us</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
                                </div>
                                <div class="col-md-3 ml-auto">
                                    <h2 class="footer-heading mb-4">Features</h2>
                                    <ul class="list-unstyled">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Testimonials</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h2 class="footer-heading mb-4">Follow Us</h2>
                                    <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                                    <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                                    <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                                    <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                            <form action="#" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
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
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
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
    </body>
</html>