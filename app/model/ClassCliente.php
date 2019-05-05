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

class ClassCliente extends ClassCrud {

    /**
     *
     * @var type 
     */
    static $razaoSocial;
    static $documento;
    static $contato;
    static $email;
    static $endereco;
    static $cidade;
    static $estado;
    static $cep;
    static $descricao;
    private $trait;
    private $dateNow;

    public function __construct() {
        $this->dateNow = date("Y-m-d H:i:s");
        $this->trait = TraitGetIp::getUserIp();
    }

    #Realizará a inserção no banco de dados

    public function insertCliente($arrVar) {
        $verify_exist = $this->getDataCliente($arrVar["documento"]);
        if ($verify_exist["rows"] > 0) {
            //verifica se existe um cpf ou cnpj.
            if ($verify_exist["data"]["razaosocial"] === $arrVar["razaosocial"]) {
                //verifica se a razao é igual, diga pro usuario que já existe!
                echo "<script>alert('ERRO: Cliente já existe!');window.location.href='" . DIRPAGE . "/clientes?pagina=1'</script>";
            } else {
                echo "<script>alert('ERRO: Cnpj ou Cpf já existe!');window.location.href='" . DIRPAGE . "/clientes?pagina=1'</script>";
            }
        } else {
            //faz o cadastro
            $this->insertDB(
                    "tb_clientes", "?,?,?,?,?,?,?,?,?,?", array(
                0,
                $arrVar['razaosocial'],
                $arrVar['documento'],
                $arrVar['contato'],
                $arrVar['email'],
                $arrVar['endereco'],
                $arrVar['cidade'],
                $arrVar['estado'],
                $arrVar['cep'],
                $arrVar['descricao']
                    )
            );

            echo "<script>alert('Cadastrado com sucesso!');window.location.href='" . DIRPAGE . "/clientes?pagina=1'</script>";
        }
    }

    static function getRazaoSocial() {
        if (isset($_POST['razaosocial'])) {
            self::$razaoSocial = filter_input(INPUT_POST, 'razaosocial', FILTER_DEFAULT);
            return ucwords(self::$razaoSocial);
        }
    }

    static function getDocumento() {
        if (isset($_POST['documento'])) {
            self::$documento = filter_input(INPUT_POST, 'documento', FILTER_DEFAULT);
            return self::$documento;
        }
    }

    static function getContato() {
        if (isset($_POST['contato'])) {
            self::$contato = filter_input(INPUT_POST, 'contato', FILTER_DEFAULT);
            return self::$contato;
        }
    }

    static function getEmail() {
        if (isset($_POST['email'])) {
            self::$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
            return self::$email;
        }
    }

    static function getEndereco() {
        if (isset($_POST['endereco'])) {
            self::$endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
            return ucfirst(self::$endereco);
        }
    }

    static function getCidade() {
        if (isset($_POST['cidade'])) {
            self::$cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
            return ucwords(self::$cidade);
        }
    }

    static function getEstado() {
        if (isset($_POST['estados'])) {
            self::$estado = filter_input(INPUT_POST, 'estados', FILTER_DEFAULT);
            return ucwords(self::$estado);
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
    public function getDataCliente($documento) {
        $select = $this->selectDB(
                "*", "tb_clientes", "where documento=?", array(
            $documento
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
    public function deleteDataCliente($id) {
        $this->deleteDB(
                "tb_clientes", "id=?", array(
            $id
                )
        );
    }

}
