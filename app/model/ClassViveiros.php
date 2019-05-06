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

class ClassViveiros extends ClassCrud {

    /**
     *
     * @var type 
     */
    static $local;
    static $nome;
    static $data;
    static $manutencao;
    static $endereco;
    static $bairro;
    static $cidade;
    static $uf;
    static $cep;
    static $descricao;
    private $trait;
    private $dateNow;

    public function __construct() {
        $this->dateNow = date("Y-m-d H:i:s");
        $this->trait = TraitGetIp::getUserIp();
    }

    #Realizará a inserção no banco de dados

    public function insertViveiro($arrVar) {
        //busca no database o viveiro.
        $verify_exist_viveiro = $this->getDataViveiro($arrVar["nome"]);

        if ($verify_exist_viveiro["rows"] > 0) {
            //se existe então imprima que não é possivel fazer a manutenção
            echo "<script>alert('ERRO:Já existe esta ocorrência');window.location.href='" . DIRPAGE . "/viveiros?pagina=1'</script>";
        } else {
            //faz o cadastro
            $this->insertDB(
                    "tb_viveiro", "?,?,?,?,?,?,?,?,?,?,?", array(
                0,
                $arrVar['local'],
                $arrVar['nome'],
                $arrVar['data'],
                $arrVar['manutencao'],
                $arrVar['cep'],
                $arrVar['endereco'],
                $arrVar['bairro'],
                $arrVar['cidade'],
                $arrVar['uf'],
                $arrVar['descricao']
                    )
            );
            echo "<script>alert('Cadastrado com sucesso!');window.location.href='" . DIRPAGE . "/viveiros?pagina=1'</script>";
        }
    }

    static function getLocal() {
        if (isset($_POST['local'])) {
            self::$local = filter_input(INPUT_POST, 'local', FILTER_DEFAULT);
            return ucwords(self::$local);
        }
    }

    static function getNome() {
        if (isset($_POST['nome'])) {
            self::$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
            return ucwords(self::$nome);
        }
    }

    static function getData() {
        if (isset($_POST['data'])) {
            self::$data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
            return self::$data;
        }
    }

    static function getManutencao() {
        if (isset($_POST['manutencao'])) {
            self::$manutencao = filter_input(INPUT_POST, 'manutencao', FILTER_DEFAULT);
            return self::$manutencao;
        }
    }

    static function getEndereco() {
        if (isset($_POST['endereco'])) {
            self::$endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
            utf8_encode(self::$endereco);
            return ucfirst(self::$endereco);
        }
    }

    static function getCidade() {
        if (isset($_POST['cidade'])) {
            self::$cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
            return utf8_encode(ucwords(self::$cidade));
        }
    }

    static function getUF() {
        if (isset($_POST['uf'])) {
            self::$uf = filter_input(INPUT_POST, 'uf', FILTER_DEFAULT);
            return ucwords(self::$uf);
        }
    }

    static function getBairro() {
        if (isset($_POST['bairro'])) {
            self::$bairro = filter_input(INPUT_POST, 'bairro', FILTER_DEFAULT);
            return ucwords(self::$bairro);
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
    public function getDataViveiro($nome) {
        $select = $this->selectDB(
                "*", "tb_viveiro", "where nome=?", array(
            $nome
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
    public function getDataDateViveiro($data) {
        $select = $this->selectDB(
                "*", "tb_viveiro", "where dt=?", array(
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
     * pega todos os campos da tabela viveiro
     */
    public function getAllDataViveiro() {
        $stmt = "SELECT * FROM tb_viveiro";
        $data = $this->conexaoDB()->prepare($stmt);
        $data->execute();
        $result=$data->fetchAll(\PDO::FETCH_ASSOC);
        $fetch=array();
        
        foreach($result as $key => $value){
            foreach ($value as $k => $v){
                $fetch[$key][$k]= utf8_encode($v);
            }
        }
        return $fetch;
    }

    /**
     * deleta a especie do database
     */
    public function deleteDataViveiro($id) {
        $this->deleteDB(
                "tb_viveiro", "id=?", array(
            $id
                )
        );
    }

}
