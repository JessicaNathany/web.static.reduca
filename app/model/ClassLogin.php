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
use Src\Traits\TraitGetIp;

class ClassLogin extends ClassCrud{
    //put your code here
    private $trait;
    private $dateNow;
    
    /**
     * 
     */
    public function __construct() {
        $this->trait = TraitGetIp::getUserIp();
        $this->dateNow = date("Y-m-d H:i:s");
    }

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
    $fetch = $select->fetch(\PDO::FETCH_ASSOC);                          
    $row = $select->rowCount();
    return $arrData=[
        "data"=>$fetch,
        "rows"=>$row
        ];
    
    }
    /**
     * 
     */
    public function countAttempt(){
        $select=$this->selectDB(
            "*",
                "tb_attempt",
                "where ip=?",
                array(
                   $this->trait 
                )
            );
        $row=0;
        while($fetch=$select->fetch(\PDO::FETCH_ASSOC)){
            if(strtotime($fetch["date"]) > strtotime($this->dateNow)-1200){
                $row++;
            }
        }
        return $row;
    }
    /**
     * 
     */
    public function insertAttempt(){
        if($this->countAttempt() < 5){
           $this->insertDB(
                   "tb_attempt",
                   "?,?,?",
                   array(
                       0,
                       $this->trait,
                       $this->dateNow
                   )
            ); 
        }
    }
    /**
     * 
     */
    public function deleteAttempt(){
        $this->deleteDB(
                "tb_attempt",
                "ip=?",
                array(
                    $this->trait
                )
        );
    }
       
    
}
