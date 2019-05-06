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

class ClassDescartes extends ClassCrud {

    /**
     *
     * @var type 
     */
    static $especies;
    static $data;
    static $qtde;
    static $motivo;
    private $trait;
    private $dateNow;

    public function __construct() {
        $this->dateNow = date("Y-m-d H:i:s");
        $this->trait = TraitGetIp::getUserIp();
    }

    #Realizará a inserção no banco de dados

    public function insertDescarte($arrVar) {
        //busca a especie na tabela especie.
        $verify_exist_especie=$this->getDataEspecie($arrVar["especie"]);
        //busca a especie na tabela descartes.
        $verify_exist_descarte=$this->getDataDescarte($arrVar["especie"]);
        //busca a data
        $verify_date=$this->getDataDateDescarte($arrVar["data"]);
        //soma a qtde atual com a do database
        $qtde = $verify_date["data"]["qtde"] + $arrVar["qtde"];
        
        if($verify_exist_especie["rows"]>0){
            //verifica se a especie existe, se existe entao verifique se existe na tabela descarte.
            if($verify_exist_descarte["rows"]>0){
                //verifica se a especie existe, se existe entao verifica a data do descarte
                if($verify_date["data"]["dt"]===$arrVar["data"]){
                    //se a data for igual,entao faca um update na qtde desta data
                    $sql = "update tb_descartes set qtde = :qtde where especie= :especie and dt= :data";
                    $pdo = $this->conexaoDB();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                        ':especie' => $arrVar["especie"],
                        ':data' => $arrVar["data"],
                        ':qtde' => $qtde
                    ));
                    if ($stmt->rowCount() > 0) {
                        echo "<script>alert('Quantidade somada');window.location.href='" . DIRPAGE . "/descartes?pagina=1'</script>";
                    } else {
                        echo "<script>alert('Erro!');window.location.href='" . DIRPAGE . "/descartes?pagina=1'</script>";
                    }
                }else{
                   //se nao existir,então faça a inserção no banco de dados.
                $this->insertDB(
                            "tb_descartes", "?,?,?,?,?", array(
                        0,
                        $arrVar['especie'],
                        $arrVar['data'],
                        $arrVar['qtde'],
                        $arrVar['motivo']
                            )
                    );
                echo "<script>alert('Cadastrado com Sucesso!');window.location.href='" . DIRPAGE . "/descartes?pagina=1'</script>"; 
                }
                echo "<script>alert('existe');window.location.href='" . DIRPAGE . "/descartes?pagina=1'</script>";
            }else{
                //se nao existir,então faça a inserção no banco de dados.
                $this->insertDB(
                            "tb_descartes", "?,?,?,?,?", array(
                        0,
                        $arrVar['especie'],
                        $arrVar['data'],
                        $arrVar['qtde'],
                        $arrVar['motivo']
                            )
                    );
                echo "<script>alert('Cadastrado com Sucesso!');window.location.href='" . DIRPAGE . "/descartes?pagina=1'</script>";
            }
            
        }else{
            //se nao existir diga ao usuario que ela nao existe.
            echo "<script>alert('{$arrVar["especie"]} Não cadastrada, efetue o cadastro!');window.location.href='" . DIRPAGE . "/descartes?pagina=1'</script>";
        }
    }

    static function getEspecie() {
        if (isset($_POST['especie'])) {
            self::$especies = filter_input(INPUT_POST, 'especie', FILTER_DEFAULT);
            return ucwords(self::$especies);
        }
    }

    static function getData() {
        if (isset($_POST['data'])) {
            self::$data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
            return self::$data;
        }
    }

    static function getQtde() {
        if (isset($_POST['qtde'])) {
            self::$qtde = filter_input(INPUT_POST, 'qtde', FILTER_DEFAULT);
            return self::$qtde;
        }
    }

    static function getMotivo() {
        if (isset($_POST['motivo'])) {
            self::$motivo = filter_input(INPUT_POST, 'motivo', FILTER_DEFAULT);
            return ucfirst(self::$motivo);
        }
    }

    /**
     * retorna os dados do usuario
     */
    public function getDataDescarte($especie) {
        $select = $this->selectDB(
                "*", "tb_descartes", "where especie=?", array(
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
     * retorna os dados referente a data.
     */
    public function getDataDateDescarte($data) {
        $select = $this->selectDB(
                "*", "tb_descartes", "where dt=?", array(
            $data
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
     * deleta a especie do database
     */
    public function deleteDataDescartes($id) {
        $this->deleteDB(
                "tb_repicagem", "id=?", array(
            $id
                )
        );
    }

}
