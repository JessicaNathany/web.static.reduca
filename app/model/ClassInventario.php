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
use App\Model\ClassGeminacao;
use App\Model\ClassEspecies;
use App\Model\ClassRepicagem;
use App\Model\ClassDescartes;
use PDO;

class ClassInventario extends ClassCrud {

    /**
     *
     * @var type 
     */
    private $tableEspecies = "tb_especies";
    private $tableGeminacao = "tb_geminacao";
    private $tableRepicagem = "tb_Repicagem";
    private $tableDescartes = "tb_Descartes";
    
    public function __construct() {
        
    }

    /**
     * retorna os dados do usuario
     */
    public function getRowsEspecie() {
        $data=$this->getRowsData($this->tableEspecies);
        return $data;
    }
    /**
     * pega a quantidade total da coluna qtde da tabela repicagem
     */
    public function getTotalRepicagemData(){
        $data=$this->getSomaColQtde($this->tableRepicagem);
        return $data;
    }
    /**
     * pega a quantidade total da coluna qtde da tabela geminacao
     */
    public function getTotalGeminacaoData(){
        $data=$this->getSomaColQtde($this->tableGeminacao);
        return $data;
    }
    /**
     * pega a quantidade total da coluna qtde da tabela descarte
     */
    public function getTotalDescarteData(){
        $data=$this->getSomaColQtde($this->tableDescartes);
        return $data;
    }
    /**
     * tras a quantidade max
     */
    public function getMaxQtde($table){   
        try{
           $stmt = "SELECT especie, dt, qtde FROM {$table} WHERE qtde=(SELECT MAX(qtde) FROM {$table})";
            $con = $this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $res = $con->query($stmt)->fetchAll();
            $array=[
                "especie"=>$res["0"]["0"],
                "data"=>$res["0"]["1"],
                "qtde"=>$res["0"]["2"],
            ];
            return $array;
        } catch (\PDOExceptionException $ex) {
            echo $ex->getMessage();
        }
    }
    /**
     * tras a quantidade min
     */
    public function getMinQtde($table){   
        try{
           $stmt = "SELECT especie, dt, qtde FROM {$table} WHERE qtde=(SELECT MIN(qtde) FROM {$table})";
            $con = $this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $res = $con->query($stmt)->fetchAll();
            $array=[
                "especie"=>$res["0"]["0"],
                "data"=>$res["0"]["1"],
                "qtde"=>$res["0"]["2"],
            ];
            return $array;
        } catch (\PDOExceptionException $ex) {
            echo $ex->getMessage();
        }
    }
    /**
     * 
     * @return type
     */
    public function getInventario(){
        
        //pega a qtde de especies cadastradas no sistema
        $RowsEspecie=$this->getRowsEspecie();
        
        //pega a qtde de mudas que germinaram.
        $QtdeGem=$this->getTotalGeminacaoData();
        
        //pega a qtde de mudas que repicaram.
        $QtdeRep=$this->getTotalRepicagemData();
        
        //pega a qtde de descartes
        $QtdeDesc=$this->getTotalDescarteData();
       
          
        $arrData=[
            "especie"=>$RowsEspecie,
            "geminacao"=>$QtdeGem,
            "repicagem"=>$QtdeRep,
            "descartes"=>$QtdeDesc                   
        ];
        //echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        return $arrData;
        
        
    }
    

}
