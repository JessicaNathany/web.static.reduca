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

class ClassSementes extends ClassCrud {

    /**
     *
     * @var type 
     */
    static $local;
    static $especie;
    static $data;
    static $cep;
    static $endereco;
    static $bairro;
    static $cidade;
    static $uf;
    static $descricao;
    private $trait;
    private $dateNow;

    public function __construct() {
        $this->dateNow = date("Y-m-d H:i:s");
        $this->trait = TraitGetIp::getUserIp();
    }

    #Realizará a inserção no banco de dados

    public function insertSementes($arrVar) {
        //busca a especie na tabela especie.
        $verify_exist_especie = $this->getDataEspecie($arrVar["especie"]);
        //busca a especie na tabela na tabela coleta sementes.
        $verify_exist_especie_semente = $this->getDataSementes($arrVar["especie"]);
        //busca o local na tabela coleta de sementes.
        $verify_exist_local = $this->getDataLocal($arrVar["local"]);

        if ($verify_exist_especie["rows"] > 0) {
            //verifica se existe na tabela especies 
            if ($verify_exist_especie_semente["rows"] > 0) {
                //verifica se existe na tabela coleta sementes
                if ($verify_exist_local["data"]["local"] === $arrVar["local"]) {
                    //verifica a data
                    if ($verify_exist_local["data"]["dt"] === $arrVar["data"]) {
                        //data igual entao diga que ja existe
                        echo "<script>alert('Já existe esse local!');window.location.href='" . DIRPAGE . "/coleta_sementes?pagina=1'</script>";
                    } else {
                        //insere na tabela repicagem
                        $this->insertDB(
                                "tb_sementes", "?,?,?,?,?,?,?,?,?,?", array(
                            0,
                            $arrVar['local'],
                            $arrVar['especie'],
                            $arrVar['data'],
                            $arrVar['cep'],
                            $arrVar['endereco'],
                            $arrVar['bairro'],
                            $arrVar['cidade'],
                            $arrVar['uf'],
                            $arrVar['descricao']
                                )
                        );
                        echo "<script>alert('Cadastrado com sucesso!');window.location.href='" . DIRPAGE . "/coleta_sementes?pagina=1'</script>";
                    }
                } else {
                    //insere na tabela repicagem
                    $this->insertDB(
                            "tb_sementes", "?,?,?,?,?,?,?,?,?,?", array(
                        0,
                        $arrVar['local'],
                        $arrVar['especie'],
                        $arrVar['data'],
                        $arrVar['cep'],
                        $arrVar['endereco'],
                        $arrVar['bairro'],
                        $arrVar['cidade'],
                        $arrVar['uf'],
                        $arrVar['descricao']
                            )
                    );
                    echo "<script>alert('Cadastrado com sucesso!');window.location.href='" . DIRPAGE . "/coleta_sementes?pagina=1'</script>";
                }
            } else {
                //insere na tabela repicagem.
                $this->insertDB(
                        "tb_sementes", "?,?,?,?,?,?,?,?,?,?", array(
                    0,
                    $arrVar['local'],
                    $arrVar['especie'],
                    $arrVar['data'],
                    $arrVar['cep'],
                    $arrVar['endereco'],
                    $arrVar['bairro'],
                    $arrVar['cidade'],
                    $arrVar['uf'],
                    $arrVar['descricao']
                        )
                );
                echo "<script>alert('Cadastrado com sucesso!');window.location.href='" . DIRPAGE . "/coleta_sementes?pagina=1'</script>";
            }
        } else {
            echo "<script>alert('Especie não existe, Faça o cadastro!');window.location.href='" . DIRPAGE . "/coleta_sementes?pagina=1'</script>";
        }
    }

    static function getLocal() {
        if (isset($_POST['local'])) {
            self::$local = filter_input(INPUT_POST, 'local', FILTER_DEFAULT);
            return ucwords(self::$local);
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

    static function getEndereco() {
        if (isset($_POST['endereco'])) {
            self::$endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
            return ucfirst(self::$endereco);
        }
    }
    static function getBairro() {
        if (isset($_POST['bairro'])) {
            self::$bairro = filter_input(INPUT_POST, 'bairro', FILTER_DEFAULT);
            return ucwords(self::$bairro);
        }
    }

    static function getCidade() {
        if (isset($_POST['cidade'])) {
            self::$cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
            return ucwords(self::$cidade);
        }
    }

    static function getUF() {
        if (isset($_POST['uf'])) {
            self::$uf = filter_input(INPUT_POST, 'uf', FILTER_DEFAULT);
            return ucwords(self::$uf);
        }
    }

    static function getCep() {
        if (isset($_POST['cep'])) {
            self::$cep = filter_input(INPUT_POST, 'cep', FILTER_DEFAULT);
            return self::$cep;
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
    public function getDataSementes($especie) {
        $select = $this->selectDB(
                "*", "tb_sementes", "where especie=?", array(
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
    public function getDataLocal($local) {
        $select = $this->selectDB(
                "*", "tb_sementes", "where local=?", array(
            $local
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
    public function deleteDataSementes($id) {
        $this->deleteDB(
                "tb_sementes", "id=?", array(
            $id
                )
        );
    }

}
