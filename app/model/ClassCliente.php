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



class ClassCliente extends ClassCrud{
    /**
     *
     * @var type 
     */
    
     static $razaoSocial;
     static $CNPJ;
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
    public function insertCliente($arrVar,$razaosocial,$cnpj)
    {
        /*date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');*/
        $verify = $this->getDataCliente($razaosocial)['data']['cnpj'];
        $verifyN = $this->getDataCliente($razaosocial)['data']['razaosocial'];
        var_dump($verify);
        
        if($cnpj == $verify && $razaosocial == $verifyN){           
            echo "<script>alert('{$arrVar['razaosocial']} já Existente');window.location.href='".DIRPAGE."/clientes?pagina=1'</script>";          
        }else{    
            $this->insertDB(
              "tb_clientes",
              "?,?,?,?,?,?,?,?,?,?,?",
                    array(
                        0,
                        $arrVar['razaosocial'],
                        $arrVar['cnpj'],
                        $arrVar['rg'],
                        $arrVar['contato'],
                        $arrVar['email'],
                        $arrVar['endereco'],
                        $arrVar['cidade'],
                        $arrVar['estado'],
                        $arrVar['cep'],                    
                        $arrVar['descricao']                  
                    )
            );
            echo "<script>alert('{$arrVar['razaosocial']} cadastrado com Sucesso!');window.location.href='".DIRPAGE."/clientes?pagina=1'</script>";
        }
    }
    static function getRazaoSocial() {
        if(isset($_POST['razaosocial'])){
            self::$razaoSocial = filter_input(INPUT_POST, 'razaosocial', FILTER_DEFAULT);
            return self::$razaoSocial;
        }
    }

    static function getCNPJ() {
        if(isset($_POST['cnpj'])){
            self::$CNPJ = filter_input(INPUT_POST, 'cnpj', FILTER_DEFAULT);
            return self::$CNPJ;
        }
    }

    static function getContato() {
        if(isset($_POST['contato'])){
            self::$contato = filter_input(INPUT_POST, 'contato', FILTER_DEFAULT);
            return self::$contato;
        }
    }

    static function getEmail() {
        if(isset($_POST['email'])){
            self::$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
            return self::$email;
        }
    }

    static function getEndereco() {
        if(isset($_POST['endereco'])){
            self::$endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
            return self::$endereco;
        }
    }

    static function getCidade() {
        if(isset($_POST['cidade'])){
            self::$cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
            return self::$cidade;
        }
    }

    static function getEstado() {
        if(isset($_POST['estados'])){
            self::$estado = filter_input(INPUT_POST, 'estados', FILTER_DEFAULT);
            return self::$estado;
        }
    }

    static function getCep() {
        if(isset($_POST['cep'])){
            self::$cep = filter_input(INPUT_POST, 'cep', FILTER_DEFAULT);
            return self::$cep;
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
    public function getDataCliente($razaosocial){
        $select=$this->selectDB(
             "*",
                "tb_clientes",
                "where razaosocial=?",
                array(
                   $razaosocial
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
