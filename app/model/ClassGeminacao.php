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

class ClassGeminacao extends ClassCrud {

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

    public function insertGeminacao($arrVar) {
        //busca a especie na tabela @especies e retorna um array de objetos.
        $verify_exist_especie = $this->getDataEspecie($arrVar["especie"]);
        //busca a especie na tabela @repicagem e retorna um array de objetos.
        $verify_exist_geminacao = $this->getDataGeminacao($arrVar["especie"]);
        //busca a data na tabela repicagem e retorna um array de objetos.
        $verify_exist_data = $this->getDataDateGeminacao($arrVar["data"]);
        //pega a qtde que ja existe e soma.
        $qtde = $verify_exist_data["data"]["qtde"] + $arrVar["qtde"];


        if ($verify_exist_especie["rows"] > 0) {
            //se existe,entaoverifica se existe na tabela geminacao
            if ($verify_exist_geminacao["rows"] > 0) {
                //se existe,entao verifica se a data ´igual.
                if ($verify_exist_data["data"]["dt"] === $arrVar["data"]) {
                    //se a data for igual, então faça um update na quantidade.
                    $sql = "update tb_geminacao set qtde = :qtde where especie= :especie and dt= :data";
                    $pdo = $this->conexaoDB();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                        ':especie' => $arrVar["especie"],
                        ':data' => $arrVar["data"],
                        ':qtde' => $qtde
                    ));
                    if ($stmt->rowCount() > 0) {
                        echo "<script>alert('Quantidade somada');window.location.href='" . DIRPAGE . "/geminacao?pagina=1'</script>";
                    } else {
                        echo "<script>alert('Erro!');window.location.href='" . DIRPAGE . "/geminacao?pagina=1'</script>";
                    }
                } else {
                    //se for diferente entao insira uma nova geminação.
                    $this->insertDB(
                            "tb_geminacao", "?,?,?,?,?", array(
                        0,
                        $arrVar['especie'],
                        $arrVar['data'],
                        $arrVar['qtde'],
                        $arrVar['descricao']
                            )
                    );
                    echo "<script>alert('{$arrVar["especie"]} Cadastrada com sucesso!');window.location.href='" . DIRPAGE . "/geminacao?pagina=1'</script>";
                }
            } else {
                //se nao existir, insira uma nova geminação no banco de dados.
                $this->insertDB(
                        "tb_geminacao", "?,?,?,?,?", array(
                    0,
                    $arrVar['especie'],
                    $arrVar['data'],
                    $arrVar['qtde'],
                    $arrVar['descricao']
                        )
                );
                echo "<script>alert('{$arrVar["especie"]} Cadastrada com sucesso!');window.location.href='" . DIRPAGE . "/geminacao?pagina=1'</script>";
            }
        } else {
            //informe ao usuario que ele precisa fazer o cadastro.
            echo "<script>alert('{$arrVar["especie"]} não existe, por favor faça o cadastro!');window.location.href='" . DIRPAGE . "/geminacao?pagina=1'</script>";
        }
    }

    static function getEspecie() {
        if (isset($_POST['especie'])) {
            self::$especie = filter_input(INPUT_POST, 'especie', FILTER_DEFAULT);
            return ucwords(self::$especie);
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

    /**
     * retorna os dados do usuario
     */
    public function getDataGeminacao($especie) {
        $select = $this->selectDB(
                "*", "tb_geminacao", "where especie=?", array(
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
     * retorna os dados da geminacao pela data.
     */
    public function getDataDateGeminacao($data) {
        $select = $this->selectDB(
                "*", "tb_geminacao", "where dt=?", array(
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
     * deleta a geminação do database
     */
    public function deleteDataGeminacao($id) {
        $this->deleteDB(
                "tb_geminacao", "id=?", array(
            $id
                )
        );
    }

}
