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
use App\Model\ClassUser;
use Src\Classes\ClassSessions as session;



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
       $session = new session();
       $session->verifyInsideSession("admin");   
       if($_SESSION['permition']!=="admin"){
            echo "<script>alert('Você não tem permissão!');window.location.href='".DIRPAGE."/home'</script>";
        }
    }   
   private function Main(){ 
       $post = new ClassUser();
       $validate = new ClassValidate();       
       $arrVar = null;            
       /**
       if(isset($_POST['g-recaptcha-response'])){
                $gRecaptchaResponse = $post::getGRecaptchaResponse();
                $validate->validateCaptcha($gRecaptchaResponse); 
            } else {
                $gRecaptchaResponse = null;
            }
        * 
        */
       if(!empty($_POST)){          
        $arrVar=[
           "nome"=>$post::getNome(),
           "usuario"=>$post::getUsuario(),
           "email"=>$post::getEmail(),
           "senha"=>$post::getSenha(),
           "repSenha"=>$post::getRepSenha(),
           "hashSenha"=>$post::getHashSenha(),
           "tipo"=>$post::getTipo()
        ];
       $validate->validateFields($_POST);        
       $validate->validateEmail($post::getEmail());       
       $validate->validateIssetEmail($post::getEmail()); 
       $validate->validateRepSenha($post::getSenha(), $post::getRepSenha());
       $validate->validateStrongSenha($post::getSenha());
           
       if($validate->getErro()==""){          
            $validate->validateFinal($arrVar); 
            echo '<div class="" style="color:red; font-weight:bold;">'.$validate->getErro().'</div>';
       }
   }      
}
# evento do botão excluir
    private function btn_excluir_event(){
        if(isset($_REQUEST["id"])){
            $id=$_REQUEST["id"];
            $users = new ClassUser();
            $users->deleteDataUser($id);
        }
    }
}