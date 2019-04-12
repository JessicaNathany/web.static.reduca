<?php
namespace Src\Classes;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ClassPassword {
    /**
     * Cria o hash da senha pra salvar no banco
     */
    public function passwordHash($senha){
        return password_hash($senha, PASSWORD_DEFAULT);
    }
}
