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
use Src\Classes\ClassPassword;




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
            $this->main();  
   }
   /**
    * 
    */
   private function main(){
       /**
        * 
        */
       if(isset($_POST["nome"]) and isset($_POST["usuario"]) and isset($_POST['email']) and isset($_POST['senha']) and isset($_POST['tipo']) and isset($_POST['repSenha'])){
           $nome= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           $usuario= filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
           $senha= filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           $repSenha= filter_input(INPUT_POST, 'repSenha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           $tipo= filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           $objPass = new ClassPassword();$hashSenha = $objPass->passwordHash($senha);
           
           /**
            * 
            * 
            */
           $arrVar=["nome"=>$nome, "usuario"=>$usuario, "email"=>$email, "senha"=>$senha, "repSenha=>$repSenha", "hashSenha"=>$hashSenha, "tipo"=>$tipo];
           
           /**
            * 
            * 
            */
           $validate = new ClassValidate();
           $validate->validateEmail($email);
           $validate->validateIssetEmail($email); 
           $validate->validateRepSenha($senha, $repSenha);
           $validate->validateStrongSenha($senha);
           
           var_dump($validate->getErro());
           /**
            * 
            */
          /* if($validate->validateEmail($email) == true){
                if($validate->validateIssetEmail($email) == true ){
                    //$validate->validateFinal($arrVar);
                    echo "<script language='javascript' type='text/javascript'>alert('Cadastrado com Sucesso!');window.location.href='".DIRPAGE.'/users'."';</script>"; 
                    die();
                        }else{
                            echo "<script language='javascript' type='text/javascript'>alert('Email Já existente no Sistema!');window.location.href='".DIRPAGE.'/users'."';</script>";
                            die();
                        }
           }else{               
               echo "<script language='javascript' type='text/javascript'>alert('Erro ao Cadastrar, verifique os campos!');window.location.href='".DIRPAGE.'/users'."';</script>";
                 die();
            } */                     
       }
   }
}