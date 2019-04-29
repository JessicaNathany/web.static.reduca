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



class ClassEspecies extends ClassCrud{
    /**
     *
     * @var type 
     */
     static $nomePopular;
     static $nomeCientifico;
    // static $familia;
     static $classeSucessional;
     static $grupoFuncional;
     static $extincao;
     static $dispercao;
     static $habito;
     static $bioma;
     static $descricao;
    private $trait;
    private $dateNow;
    

    public function __construct() {
        self::$nomePopular = self::getNomePopular();
        self::$nomeCientifico = self::getNomeCientifico();
        //self::$Familia = self::getFamilia();
        self::$classeSucessional = self::getClasseSucessional();
        self::$extincao = self::getExtincao();
        self::$dispercao = self::getDispercao();
        self::$habito = self::getHabito();
        self::$bioma = self::getBioma();
        self::$descricao = self::getDescricao();
        $this->dateNow = date("Y-m-d H:i:s");
        $this->trait = TraitGetIp::getUserIp();
    }
    
    #Realizará a inserção no banco de dados
    public function insertEspecie($arrVar)
    {
        /*date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');*/
    
        $this->insertDB(
          "tb_especies",
          "?,?,?,?,?,?,?,?,?,?,?",
                array(
                    0,
                    $arrVar['nPopular'],
                    $arrVar['nCientifico'],
                    $arrVar['familia'],
                    $arrVar['classeSucessional'],
                    $arrVar['gFuncional'],
                    $arrVar['extincao'],
                    $arrVar['dispersao'],
                    $arrVar['habito'],
                    $arrVar['bioma'],
                    $arrVar['descricao']                  
                )
        );

    }
    static function getNomePopular() {
        if(isset($_POST['nPopular'])){
            self::$nomePopular = filter_input(INPUT_POST, 'nPopular', FILTER_DEFAULT);
            return self::$nomePopular;
        }
    }

    static function getNomeCientifico() {
        if(isset($_POST['nCientifico'])){
            self::$nomeCientifico = filter_input(INPUT_POST, 'nCientifico', FILTER_DEFAULT);
            return self::$nomeCientifico;
        }
    }

    static function getFamilia() {
        if(isset($_POST['familia'])){
            self::$familia = filter_input(INPUT_POST, 'familia', FILTER_DEFAULT);
            return self::$familia;
        }
    }

    static function getClasseSucessional() {
        if(isset($_POST['classeSucessional'])){
            self::$classeSucessional = filter_input(INPUT_POST, 'classeSucessional', FILTER_DEFAULT);
            return self::$classeSucessional;
        }
    }

    static function getGrupoFuncional() {
        if(isset($_POST['gFuncional'])){
            self::$grupoFuncional = filter_input(INPUT_POST, 'gFuncional', FILTER_DEFAULT);
            return self::$grupoFuncional;
        }
    }

    static function getExtincao() {
        if(isset($_POST['extincao'])){
            self::$extincao = filter_input(INPUT_POST, 'extincao', FILTER_DEFAULT);
            return self::$extincao;
        }
    }

    static function getDispercao() {
        if(isset($_POST['dispersao'])){
            self::$dispercao = filter_input(INPUT_POST, 'dispersao', FILTER_DEFAULT);
            return self::$dispercao;
        }
    }

    static function getHabito() {
        if(isset($_POST['habito'])){
            self::$habito = filter_input(INPUT_POST, 'habito', FILTER_DEFAULT);
            return self::$habito;
        }
    }

    static function getBioma() {
        if(isset($_POST['bioma'])){
            self::$bioma = filter_input(INPUT_POST, 'bioma', FILTER_DEFAULT);
            return self::$bioma;
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
    public function getDataEspecie($nomePopular){
        $select=$this->selectDB(
             "*",
                "tb_especie",
                "where nPopular=?",
                array(
                   $nomePopular
                )
            );
    $fetch = $select->fetch(\PDO::FETCH_ASSOC);                          
    $row = $select->rowCount();
    return $arrData=[
        "data"=>$fetch,
        "rows"=>$row
        ];
    
    }


    
   
        
        
        
        
    
    
   
    
}
