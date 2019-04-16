<?php
namespace App\Controller;
session_start();
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Classes\ClassValidate;
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassHelperUser;



class ControllerUsers extends ClassRender implements InterfaceView{
    /**
     * metodo construtor da classe de controler do Usuario.
     */
    public function __construct() {
        
            $this->setTitle("Cadastro de Usuários");
            $this->setDescription("");
            $this->setKeywords("");
            $this->setDir("users");
            $this->renderLayout();
            $this->Main();  
   }
   /**
    * 
    * 
    */
   private function Main(){ 
       $post = new ClassHelperUser();
       $validate = new ClassValidate();
       
       if(isset($_POST['g-recaptcha-response'])){
                $gRecaptchaResponse = $post::getGRecaptchaResponse();
                $validate->validateCaptcha($gRecaptchaResponse); 
            } else {
                $gRecaptchaResponse = null;
            }
       if(isset($nome) && isset($usuario) && isset($senha) && isset($email) && isset($repSenha) && isset($tipo) && isset($hashSenha)){          
           
            $nome = $post::getNome();
            $usuario = $post::getUsuario();
            $senha = $post::getSenha();
            $email = $post::getEmail();
            $repSenha = $post::getRepSenha();
            $tipo = $post::getTipo();
            $hashSenha = $post::getHashSenha();           
                
            
            $arrVar=[
           "nome"=>$nome,
           "usuario"=>$usuario,
           "email"=>$email,
           "senha"=>$senha,
           "repSenha=>$repSenha",
           "hashSenha"=>$hashSenha,
           "tipo"=>$tipo
        ];
       
       
       
       
       $validate->validateEmail($email);
       $validate->validateFields($_POST);
       $validate->validateIssetEmail($email); 
       $validate->validateRepSenha($senha, $repSenha);
       $validate->validateStrongSenha($senha);
        
       $validate->validateFinal($arrVar);
       var_dump($arrVar);
     
       echo"<br>";
       echo $validate->validateFinal($arrVar);
       
            
       }
       
            
       
   }
}