<?php
namespace Src\database;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Model\ClassConexao;
/**
 * Description of ClassDatabase
 *
 * @author ModoHacker
 */
class ClassDatabase extends ClassConexao{
    //put your code here
   
    /**
     * Cria uma base de dados
     * 
     */    
    public function createDB($nameDB){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="CREATE DATABASE IF NOT EXISTS {$nameDB}";
            $con->exec($stmt);
            echo "database=> ".$nameDB. ",criada com sucesso!";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage();
        }
    }
    /**
     * @author John Doe <john.doe@example.com>
     * cria a tabela usuario
     * 
     */
    public function createTableUserDB($nameDB){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use $nameDB";
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_users("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "nome varchar (100),"
                    . "usuario varchar (30),"
                    . "hashSenha varchar(255),"
                    . "email varchar(100),"
                    . "tipo varchar(30),"
                    . "data datetime"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
        } catch (PDOException $e) {
           echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * @author John Doe <john.doe@example.com>
     * 
     * 
     */
    public function createTableAttemptDB($nameDB){
        try{
           $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use $nameDB";
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_attempt("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "ip varchar (20),"
                    . "data datetime"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt); 
        } catch (PDOException $e) {
            
        }
    }
}
