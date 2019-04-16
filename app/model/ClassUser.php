<?php
namespace App\Model;

class ClassUser extends ClassCrud{

    #Realizará a inserção no banco de dados
    public function insertUser($arrVar)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
    
        $this->insertDB(
          "tb_users",
          "?,?,?,?,?,?,?",
                array(
                    0,
                    $arrVar['nome'],
                    $arrVar['usuario'],
                    $arrVar['hashSenha'],
                    $arrVar['email'],
                    $arrVar['tipo'],
                    $date
                )
        );

    }
    /**
     * verifica diretamente se o imail existe no banco
     * 
     */
    public function getIssetEmail($email){
        $select=$this->selectDB(
             "*",
                "tb_users",
                "where email=?",
                array(
                   $email 
                )
            );
        return $res=$select->rowCount();
    }
    /**
     * verifica diretamente se o imail existe no banco
     * 
     */
    public function getIssetUser($user){
        $select=$this->selectDB(
             "*",
                "tb_users",
                "where usuario=?",
                array(
                   $user 
                )
            );
        return $res=$select->rowCount();
    }
}