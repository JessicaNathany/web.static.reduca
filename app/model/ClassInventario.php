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
           $stmt = "SELECT especie, dt, MAX(qtde) FROM {$table}";
            $con = $this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $res = $con->query($stmt)->fetchAll();
            return $res["0"];
        } catch (\PDOExceptionException $ex) {
            echo $ex->getMessage();
        }
    }
    /**
     * tras a quantidade min
     */
    public function getMinQtde($table){   
        try{
           $stmt = "SELECT especie, dt, Min(qtde) FROM {$table}";
            $con = $this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $res = $con->query($stmt)->fetchAll();
            return $res["0"];
        } catch (\PDOExceptionException $ex) {
            echo $ex->getMessage();
        }
    }

}
