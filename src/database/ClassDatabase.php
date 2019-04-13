<?php
namespace Src\database;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Model\ClassConexao;
use PDO;
/**
 * Description of ClassDatabase
 *
 * @author ModoHacker
 */
class ClassDatabase extends ClassConexao{
    //put your code here
   private $nameDB = DB;
    /**
     * Cria uma base de dados
     * 
     */    
    public function createDB(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="CREATE DATABASE IF NOT EXISTS {$this->nameDB}";
            $con->exec($stmt);
            echo "database=> criada com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage();
        }
    }
    /**
     * @author John Doe <john.doe@example.com>
     * cria a tabela usuario
     * 
     */
    public function createTableUserDB(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
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
            echo "tb_users=> criado com sucesso!<br>";
        } catch (PDOException $e) {
           echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * @author John Doe <john.doe@example.com>
     * 
     * 
     */
    public function createTableAttemptDB(){
        try{
           $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_attempt("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "ip varchar (20),"
                    . "data datetime"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_attempt=>,criado com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableConfirmation(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_confirmation("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "email varchar (90),"
                    . "token text"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_confirmation=> criada a tabela com sucesso!";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
}
