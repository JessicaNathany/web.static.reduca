<?php

namespace App\Model;

use Src\Classes\ClassPassword;

class ClassUser extends ClassCrud {

    public static $nome;
    public static $usuario;
    public static $senha;
    public static $email;
    public static $tipo;
    public static $hashSenha;
    public static $repSenha;
    public static $gRecaptchaResponse;
    private $trait;
    private $dateNow;

    /**
     * 
     * @return type
     * 
     */
    static function getNome() {
        if (isset($_POST['nome'])) {
            self::$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
            return strtolower(self::$nome);
        }
    }

    /**
     * 
     * @return type
     */
    static function getUsuario() {
        if (isset($_POST['usuario'])) {
            self::$usuario = filter_input(INPUT_POST, 'usuario', FILTER_DEFAULT);
            return strtolower(self::$usuario);
        }
    }

    /**
     * 
     * @return type
     */
    static function getSenha() {
        if (isset($_POST['senha'])) {
            self::$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
            return self::$senha;
        }
    }

    /**
     * 
     * @return type
     */
    static function getEmail() {
        if (isset($_POST['email'])) {
            self::$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
            return self::$email;
        }
    }

    /**
     * 
     * @return type
     */
    static function getTipo() {
        if (isset($_POST['tipo'])) {
            self::$tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
            return strtolower(self::$tipo);
        }
    }

    /**
     * 
     * @return type
     */
    static function getHashSenha() {
        $objPass = new ClassPassword();
        self::$hashSenha = $objPass->passwordHash(self::$senha);
        return self::$hashSenha;
    }

    /**
     * 
     * @return type
     */
    static function getRepSenha() {
        if (isset($_POST['repSenha'])) {
            self::$repSenha = filter_input(INPUT_POST, 'repSenha', FILTER_DEFAULT);
            return self::$repSenha;
        }
    }

    static function getGRecaptchaResponse() {
        if (isset($_POST['g-recaptcha-response'])) {
            self::$gRecaptchaResponse = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_DEFAULT);
            return self::$gRecaptchaResponse;
        } else {
            return self::$gRecaptchaResponse == NULL;
        }
    }

    #Realizará a inserção no banco de dados

    public function insertUser($arrVar) {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');

        //busca o usuario.
        $verify_user = $this->getIssetUser($arrVar["usuario"]);

        if ($verify_user > 0) {
            //se o usuario existe entao imprima que ele  existe.
            echo "<script>alert('Erro!Usuário Já existe');window.location.href='" . DIRPAGE . "/users?'</script>";
        } else {
            $this->insertDB(
                    "tb_users", "?,?,?,?,?,?,?,?", array(
                0,
                $arrVar['nome'],
                $arrVar['usuario'],
                $arrVar['hashSenha'],
                $arrVar['email'],
                $arrVar['tipo'],                
                $date,
                "ativo"        
                
                    )
            );
            echo "<script>alert('{$arrVar["usuario"]} Cadastrado com sucesso!');window.location.href='" . DIRPAGE . "/users'</script>";
        }
    }

    /**
     * verifica diretamente se o imail existe no banco
     * 
     */
    public function getIssetEmail($email) {
        $select = $this->selectDB(
                "*", "tb_users", "where email=?", array(
            $email
                )
        );
        return $res = $select->rowCount();
    }

    /**
     * verifica diretamente se o imail existe no banco
     * 
     */
    public function getIssetUser($user) {
        $select = $this->selectDB(
                "*", "tb_users", "where usuario=?", array(
            $user
                )
        );
        return $res = $select->rowCount();
    }

    /**
     * deleta a especie do database
     */
    public function deleteDataUser($id) {
        $this->deleteDB(
                "tb_users", "id=?", array(
            $id
                )
        );
    }

}
