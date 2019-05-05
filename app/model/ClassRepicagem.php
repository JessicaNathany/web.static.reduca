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

class ClassRepicagem extends ClassCrud {

    /**
     *
     * @var type 
     */
    static $especies;
    static $data;
    static $qtde;
    static $material;
    static $descricao;
    private $trait;
    private $dateNow;

    public function __construct() {
        $this->dateNow = date("Y-m-d H:i:s");
        $this->trait = TraitGetIp::getUserIp();
    }

    #Realizará a inserção no banco de dados

    public function insertRepicagem($arrVar) {
        //busca a especie na tabela @especies e retorna um array de objetos.
        $verify_exist_especie = $this->getDataEspecie($arrVar["especies"]);
        //busca a especie na tabela @repicagem e retorna um array de objetos.
        $verify_exist_repicagem = $this->getDataRepicagem($arrVar["especies"]);
        //busca a data na tabela repicagem e retorna um array de objetos.
        $verify_exist_data = $this->getDataDateRepicagem($arrVar["data"]);
        //pega a qtde que ja existe e soma.
        $qtde = $verify_exist_data["data"]["qtde"] + $arrVar["qtde"];

        if ($verify_exist_especie["rows"] > 0) {
            //Já existe na tabela especie entao verifica se existe na tabela repicagem
            if ($verify_exist_repicagem["rows"] > 0) {
                //Já existe na tabela repicagem, entao verifique se é a mesma data.
                if ($verify_exist_data["data"]["dt"] === $arrVar["data"]) {
                    //se a data for igual então faca um update na quantidade na tabela repicagem.
                    $sql = "update tb_repicagem set qtde = :qtde where especies= :especie and dt= :data";
                    $pdo = $this->conexaoDB();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                        ':especie' => $arrVar["especies"],
                        ':data' => $arrVar["data"],
                        ':qtde' => $qtde
                    ));
                    if ($stmt->rowCount() > 0) {
                        echo "<script>alert('Quantidade somada');window.location.href='" . DIRPAGE . "/repicagem?pagina=1'</script>";
                    } else {
                        echo "<script>alert('Erro!');window.location.href='" . DIRPAGE . "/repicagem?pagina=1'</script>";
                    }
                } else {
                    //se a data for diferente entao faça um insert na tabela repicagem
                    $this->insertDB(
                            "tb_repicagem", "?,?,?,?,?,?", array(
                        0,
                        $arrVar['especies'],
                        $arrVar['data'],
                        $arrVar['qtde'],
                        $arrVar['descricao'],
                        $arrVar['material']
                            )
                    );
                    echo "<script>alert('Ação bem sucedida');window.location.href='" . DIRPAGE . "/repicagem?pagina=1'</script>";
                }
            } else {
                //se entrou aqui entao faça o insert na tabela repicagem
                $this->insertDB(
                        "tb_repicagem", "?,?,?,?,?,?", array(
                    0,
                    $arrVar['especies'],
                    $arrVar['data'],
                    $arrVar['qtde'],
                    $arrVar['descricao'],
                    $arrVar['material']
                        )
                );
                //Imprima o resultado
                echo "<script>alert('{$arrVar["especies"]} Cadastrado com sucesso!');window.location.href='" . DIRPAGE . "/repicagem?pagina=1'</script>";
            }
        } else {
            //não existe na tabela especie entao faz o cadastro
            echo "<script>alert('Especie não existe, Faça o cadastro!');window.location.href='" . DIRPAGE . "/repicagem?pagina=1'</script>";
        }
    }

    static function getEspecie() {
        if (isset($_POST['especies'])) {
            self::$especies = filter_input(INPUT_POST, 'especies', FILTER_DEFAULT);
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

    static function getDescricao() {
        if (isset($_POST['descricao'])) {
            self::$descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
            return ucfirst(self::$descricao);
        }
    }

    static function getMaterial() {
        if (isset($_POST['material'])) {
            self::$material = filter_input(INPUT_POST, 'material', FILTER_DEFAULT);
            return ucwords(self::$material);
        }
    }

    /**
     * retorna os dados do usuario
     */
    public function getDataRepicagem($especie) {
        $select = $this->selectDB(
                "*", "tb_repicagem", "where especies=?", array(
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
    public function getDataDateRepicagem($data) {
        $select = $this->selectDB(
                "*", "tb_repicagem", "where dt=?", array(
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
    public function deleteDataRepicagem($id) {
        $this->deleteDB(
                "tb_repicagem", "id=?", array(
            $id
                )
        );
    }

}
