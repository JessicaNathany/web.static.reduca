<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Classes\ClassValidate;
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassHelperUser;



class ControllerLogin extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Login");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("login");
        $this->renderLayout();
        $this->Main();
    }
    /**
     * 
     * 
     * 
     */
    private function Main(){
        $login = new \Src\Classes\ClassPassword();
        $post = new ClassHelperUser();
        $validate = new ClassValidate();
        $arrVar = "";
        
        /**
         * 
         *
        if(isset($_POST['g-recaptcha-response'])){
                $gRecaptchaResponse = $post::getGRecaptchaResponse();
                $validate->validateCaptcha($gRecaptchaResponse); 
            } else {
                $gRecaptchaResponse = null;
            }
        /**
         * 
         */
        if(!empty($_POST)){ 
            
            $usuario = $post::getUsuario();
            $senha = $post::getSenha();         
            $arrVar = [
                "usuario"=>$usuario,
                "senha"=>$senha,
            ];
            
            $validate->validateFields($_POST);
            $validate->validateUsuario($usuario,"login");
            $validate->validateSenha($usuario, $senha);            
            $validate->validateAttemptLogin();
            $validate->validateFinalLogin($usuario);
            
            //var_dump($validate->getErro());
            var_dump($_SESSION);
            echo "<script>window.location.href='".DIRPAGE.'/home'."';</script>";
            
            
        }else{            
           //echo "<script language='javascript' type='text/javascript'>alert('Erro ao fazer login!');window.location.href='".$DIRREQ."';</script>";              
            
           
           
        }
    }
    
    

}