<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

/**
 * Description of ClassEspecies
 *
 * @author wsantos
 */
use App\Model\ClassCrud;
use Src\Traits\TraitGetIp;
use PDO;




class ClassGeminacao extends ClassCrud{
    /**
     *
     * @var type 
     */
    
     static $especie;
     static $data;
     static $qtde;
     static $descricao;
    private $trait;
    private $dateNow;
    
    

    public function __construct() {
        $this->dateNow = date("Y-m-d H:i:s");
        $this->trait = TraitGetIp::getUserIp();
        
    }
    
    #Realizará a inserção no banco de dados
    public function insertGeminacao($arrVar,$especie)
    {   
        /*date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');*/
        $verifyEspecie = $this->getDataEspecie($especie);
        $verifyData = $this->getDataGeminacao($especie);
        $getDataQtde = $this->getDataGeminacao($especie)["data"]["qtde"];
        $qtde = $getDataQtde + $arrVar['qtde'];
        
        if($verifyEspecie["rows"] > 0){
            //encontrou algo na tabela especie
            /* @var $verifyData type */
            if($verifyData["rows"] > 0){
                //encontrou algo na tabela geminacao, faça o update.
               $sql = "update tb_geminacao set qtde = :qtde where especie= :especie and dt= :data";
               $pdo=$this->conexaoDB();
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $pdo->prepare($sql);
               $stmt->execute(array(
                   ':especie' => $especie,
                   ':data' => $arrVar["data"],
                   ':qtde' => $qtde                  
               ));
               if($stmt->rowCount()>0){
                   echo "<script>alert('Campo {$especie} alterado!');window.location.href='".DIRPAGE."/geminacao?pagina=1'</script>";
               }
            }else{
               $this->insertDB(
                "tb_geminacao",
                "?,?,?,?,?",
                array(
                    0,
                    $arrVar['especie'],
                    $arrVar['data'],
                    $arrVar['qtde'],                    
                    $arrVar['descricao']                  
                )
            );
               echo "<script>alert('Ação Bem sucedida');window.location.href='".DIRPAGE."/geminacao?pagina=1'</script>";
        }
                
    }else{
        echo "<script>alert('Especie não existe,por favor efetue o cadastro!');window.location.href='".DIRPAGE."/geminacao?pagina=1'</script>";
    }

    }
    static function getEspecie() {
        if(isset($_POST['especie'])){
            self::$especie = filter_input(INPUT_POST, 'especie', FILTER_DEFAULT);
            return self::$especie;
        }
    }

    static function getData() {
        if(isset($_POST['data'])){
            self::$data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
            return self::$data;
        }
    }

    static function getQtde() {
        if(isset($_POST['qtde'])){
            self::$qtde = filter_input(INPUT_POST, 'qtde', FILTER_DEFAULT);
            return self::$qtde;
        }
    }

    static function getDescricao() {
        if(isset($_POST['descricao'])){
            self::$descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
            return self::$descricao;
        }
    }
    /**
     * retorna os dados do usuario
     */
    public function getDataGeminacao($especie){
        $select=$this->selectDB(
             "*",
                "tb_geminacao",
                "where especie=?",
                array(
                   $especie
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
     * retorna os dados do usuario
     */
    public function getDataEspecie($especie){
        $select=$this->selectDB(
             "*",
                "tb_especies",
                "where nPopular=?",
                array(
                   $especie
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
    public function getIssetEspecie($especie){
        $select=$this->selectDB(
             "*",
                "tb_especies",
                "where especie=?",
                array(
                   $especie
                )
            );
        return $res=$select->rowCount();
    }
    /**
     * 
     */
    public function getIssetGeminacao($especie){
        $select=$this->selectDB(
             "*",
                "tb_geminacao",
                "where geminacao=?",
                array(
                   $especie
                )
            );
        return $res=$select->rowCount();
    }


    
   
        
        
        
        
    
    
   
    
}
