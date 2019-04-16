<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

/**
 * Description of ClassLogin
 *
 * @author wsantos
 */
use PDO;

class ClassLogin extends ClassCrud{
    //put your code here
    
    /**
     * retorna os dados do usuario
     */
    public function getDataUser($usuario){
        $select=$this->selectDB(
             "*",
                "tb_users",
                "where usuario=?",
                array(
                   $usuario 
                )
            );
     
    return $arrData=[
        "data"=>$this->fetch(\PDO::FETCH_ASSOC),
        "rows"=>$this->rowCount(),
        ];
    \var_dump($arrData); 
    }
       
    
}
