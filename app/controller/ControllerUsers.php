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




class ControllerUsers extends ClassRender implements InterfaceView{

    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        
            $this->setTitle("Cadastro de Usuários");
            $this->setDescription("");
            $this->setKeywords("");
            $this->setDir("users");
            $this->renderLayout();
            $this->post();
            
                     
            
        }

    public function post(){
        
        if(isset($_POST['nome']) and isset($_POST['usuario']) and isset($_POST['email']) and isset($_POST['senha']) and isset($_POST['tipo'])){
            
            $nome= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $usuario= filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha= filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $tipo= filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $arrVar=[
                "nome"=>$nome,
                "usuario"=>$usuario,
                "email"=>$email,
                "senha"=>$senha,
                "tipo"=>$tipo,
            ];
            
            $user = new \App\Model\ClassUser();
            $user->insertUser($arrVar);
            
            echo "<script language='javascript' type='text/javascript'>alert('Cadastrado com Sucesso!');window.location.href='".DIRPAGE.'/users'."';</script>";           
            
            var_dump($arrVar);
                        
        }else{
            
            
        }
        
    }

        
        
        
    
    
}