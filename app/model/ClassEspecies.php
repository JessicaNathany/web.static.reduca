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

class ClassEspecies extends ClassCrud {

    /**
     *
     * @var type 
     */
    static $nomePopular;
    static $nomeCientifico;
    static $familia;
    static $classeSucessional;
    static $extincao;
    static $dispercao;
    static $habito;
    static $bioma;
    static $descricao;
    private $trait;
    private $dateNow;

    public function __construct() {
        $this->dateNow = date("Y-m-d H:i:s");
        $this->trait = TraitGetIp::getUserIp();
    }

    #Realizará a inserção no banco de dados 

    public function insertEspecie($arrVar) {
        //busca a especie na tabela especie do banco de dados.
        $verify_exist_especie = $this->getDataEspecie($arrVar["nPopular"]);
        if ($verify_exist_especie["rows"] > 0) {
            //se encontrou algo imprima que já existe a especie.
            echo "<script>alert('{$arrVar["nPopular"]} Já Existe!');window.location.href='" . DIRPAGE . "/especies?pagina=1'</script>";
        } else {
            //se nao encontrou insira uma nova especie.
            $this->insertDB(
                    "tb_especies", "?,?,?,?,?,?,?,?,?,?", array(
                0,
                $arrVar['nPopular'],
                $arrVar['nCientifico'],
                $arrVar['familia'],
                $arrVar['classeSucessional'],
                $arrVar['extincao'],
                $arrVar['dispersao'],
                $arrVar['habito'],
                $arrVar['bioma'],
                $arrVar['descricao']
                    )
            );
            echo "<script>alert('{$arrVar["nPopular"]} Cadastrado com Sucesso!');window.location.href='" . DIRPAGE . "/especies?pagina=1'</script>";
        }
    }

    static function getNomePopular() {
        if (isset($_POST['nPopular'])) {
            self::$nomePopular = filter_input(INPUT_POST, 'nPopular', FILTER_DEFAULT);
            return ucwords(self::$nomePopular);
        }
    }

    static function getNomeCientifico() {
        if (isset($_POST['nCientifico'])) {
            self::$nomeCientifico = filter_input(INPUT_POST, 'nCientifico', FILTER_DEFAULT);
            return ucwords(self::$nomeCientifico);
        }
    }

    static function getFamilia() {
        if (isset($_POST['familia'])) {
            self::$familia = filter_input(INPUT_POST, 'familia', FILTER_DEFAULT);
            return ucwords(self::$familia);
        }
    }

    static function getClasseSucessional() {
        if (isset($_POST['classeSucessional'])) {
            self::$classeSucessional = filter_input(INPUT_POST, 'classeSucessional', FILTER_DEFAULT);
            return ucwords(self::$classeSucessional);
        }
    }

    static function getExtincao() {
        if (isset($_POST['extincao'])) {
            self::$extincao = filter_input(INPUT_POST, 'extincao', FILTER_DEFAULT);
            return ucwords(self::$extincao);
        }
    }

    static function getDispercao() {
        if (isset($_POST['dispersao'])) {
            self::$dispercao = filter_input(INPUT_POST, 'dispersao', FILTER_DEFAULT);
            return ucwords(self::$dispercao);
        }
    }

    static function getHabito() {
        if (isset($_POST['habito'])) {
            self::$habito = filter_input(INPUT_POST, 'habito', FILTER_DEFAULT);
            return ucwords(self::$habito);
        }
    }

    static function getBioma() {
        if (isset($_POST['bioma'])) {
            self::$bioma = filter_input(INPUT_POST, 'bioma', FILTER_DEFAULT);
            return ucwords(self::$bioma);
        }
    }

    static function getDescricao() {
        if (isset($_POST['descricao'])) {
            self::$descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
            return ucfirst(self::$descricao);
        }
    }

    /**
     * retorna os dados do usuario
     */
    public function getDataEspecie($especie) {
        $select = $this->selectDB(
                "*", "tb_especies", "where nPopular=?", array(
            $especie
                )
        );
        $fetch = $select->fetch(\PDO::FETCH_ASSOC);
        $row = $select->rowCount();
        return $arrData = [
            "data" => $fetch,
            "rows" => $row
        ];
    }

    /**
     * 
     */
    public function getDataLikeEspecie($nomePopular, $like) {
        $select->$this->likeDB(
                "*", "tb_especies", "where nPopular=?", array(
            $nomePopular
                ), "{$like}"
        );
        $fetch = $select->fetch(\PDO::FETCH_ASSOC);
        $row = $select->rowCount();
        return $arrData = [
            "data" => $fetch,
            "rows" => $row
        ];
    }

    /**
     * deleta a especie do database
     */
    public function deleteDataEspecie($id) {
        $this->deleteDB(
                "tb_especies", "id=?", array(
            $id
                )
        );
    }

}
