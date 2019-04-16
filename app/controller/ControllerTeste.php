<?php
namespace App\Controller;

/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassHelperUser as help;

class ControllerTeste {
    /**
     * metodo construtor da classe de controler do Usuario.
     */
    public function __construct() {
        $this->main();
             
   }
   private function main(){
       $nome = help::getNome();
       $usuario = help::getUsuario();
       $senha = help::getSenha();
       $email = help::getEmail();
       $repSenha = help::getRepSenha();
       $tipo = help::getTipo();
       $hashSenha = help::getHashSenha();
       
       $arrVar=["nome"=>$nome, "usuario"=>$usuario, "email"=>$email, "senha"=>$senha, "repSenha=>$repSenha", "hashSenha"=>$hashSenha, "tipo"=>$tipo];
       
       var_dump($arrVar);
   }
   
}