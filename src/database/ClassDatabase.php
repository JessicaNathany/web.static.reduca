<?php
namespace Src\database;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Model\ClassConexao;
use App\Model\ClassUser;
use Src\Classes\ClassPassword;
use Src\Classes\ClassValidate;
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
     * 
     */
     private function insertAdministrador(){
         $validate = new ClassValidate();
         $user = "admin";
         $senha = "@dmin0000";
         $password = new ClassPassword($senha);
         $hash= $password->passwordHash($senha);
         $verify=$validate->validateUsuario($user);
       
       
        
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
        
        if($verify == false){
            echo "O sistema ja possui um administrador <br>";
        }else{
            $nome = "Administrador do Sistema";
            $usuario = "admin";
            $email = "sgvmroot00@gmail.com";
            $tipo = "admin"; 
            $arrVar=[
                "nome"=>$nome,
                "usuario"=>$usuario,
                "email"=>$email,
                "senha"=>$senha,
                "hashSenha"=>$hash,
                "tipo"=>$tipo,
                "data"=>$date
            ];       
           $validate->validateFinal($arrVar);
           echo '<div class="" style="color:red; font-weight:bold;">'.$validate->getErro().'</div>';
           echo "usuario administrador criado!<br>";
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
            
            if($con == true){
                $this->insertAdministrador();
            }
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
            echo "tb_confirmation=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableEspecies(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_especies("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "nPopular varchar(30),"
                    . "nCientifico varchar(30),"
                    . "familia varchar (30),"
                    . "classeSucessional varchar(30),"
                    . "extincao varchar(30),"
                    . "dispersao varchar(30),"
                    . "habito varchar(30),"
                    . "bioma varchar(30),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_especies=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableClientes(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_clientes("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "razaosocial varchar(30),"
                    . "documento char(30),"
                    . "contato char(30),"
                    . "email varchar(30),"
                    . "endereco varchar(30),"
                    . "cidade varchar(30),"
                    . "estado varchar(30),"
                    . "cep char(30),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_clientes=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableSementes(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_sementes("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "especie varchar(30),"
                    . "dt date,"
                    . "endereco varchar(30),"
                    . "cidade varchar(30),"
                    . "estado varchar(30),"
                    . "cep char(30),"
                    . "descricao varchar(255),"
                    . "local varchar(30)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_sementes=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableViveiro(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_viveiro("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "nome varchar(30),"
                    . "dt date,"
                    . "manutencao varchar(30),"
                    . "endereco varchar(30),"
                    . "cidade varchar(30),"
                    . "estado varchar(30),"
                    . "cep mediumint(30),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_viveiro=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableGeminacao(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_geminacao("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "especie varchar(30),"
                    . "dt date,"
                    . "qtde int(30),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_geminacao=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableRepicagem(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_repicagem("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "especies varchar (30),"
                    . "dt date,"
                    . "qtde int(30),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_especies=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableInsumos(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_insumos("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "nome varchar(30),"
                    . "categoria varchar(30),"
                    . "tipo varchar(30),"
                    . "qtde int(30),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_insumos=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
}
