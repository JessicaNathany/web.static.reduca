<?php
namespace Src\Classes;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Model\ClassLogin;

class ClassPassword {
//    
    private $db;
    
    function __construct() {
        $this->db=new ClassLogin();
    }
    /**
     * Cria o hash da senha pra salvar no banco
     */
    public function passwordHash($senha){
        return password_hash($senha, PASSWORD_DEFAULT);
    }
    /**
     * verifica se o hash da senha está correto
     */
    public function verifyHash($usuario,$senha){
       $hashDB=$this->db->getDataUser($usuario);
       $hash = $hashDB["data"]["hashSenha"];
       return password_verify($senha, $hash);       
       
    }
}
