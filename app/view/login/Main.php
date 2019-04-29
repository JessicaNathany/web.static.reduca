<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?=DIRPAGE.'/login'?>" method="POST" id="loginForm"  id="formLogin">
					<span class="login100-form-title p-b-34">
						Sistema de Gerenciamento de Viveiros & Mudas
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="usuario" placeholder="Nome de Usuário">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
                                                    Entrar
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							
						</span>

						<a href="#" class="txt2">
							
						</a>
					</div>

					<div class="w-full text-center">
						<a href="#" class="txt3">
							Support
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('<?=DIRIMG."0001.jpg"?>');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?=DIRPAGE.'/public/template/Login_v17/vendor/jquery/jquery-3.2.1.min.js'?>"></script>
<!--===============================================================================================-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="<?=DIRPAGE.'/public/template/Login_v17/vendor/bootstrap/js/popper.js'?>"></script>
	<script src="<?=DIRPAGE.'/public/template/Login_v17/vendor/bootstrap/js/bootstrap.min.js'?>"></script>
        <script src="<?=DIRPAGE.'/public/template/Login_v17/vendor/animsition/js/animsition.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?=DIRPAGE.'/public/template/Login_v17/vendor/select2/select2.min.js'?>"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="<?=DIRPAGE.'/public/template/Login_v17/vendor/daterangepicker/moment.min.js'?>"></script>
	<script src="<?=DIRPAGE.'/public/template/Login_v17/vendor/daterangepicker/daterangepicker.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?=DIRPAGE.'/public/template/Login_v17/vendor/countdowntime/countdowntime.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?=DIRPAGE.'/public/template/Login_v17/js/login.js'?>"></script>