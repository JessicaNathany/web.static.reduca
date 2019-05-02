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




class ClassInsumos extends ClassCrud{
    /**
     *
     * @var type 
     */
    
     static $nome;
     static $categoria;
     static $qtde;
     static $tipo;
     static $descricao;
    private $trait;
    private $dateNow;
    
    

    public function __construct() {
        $this->dateNow = date("Y-m-d H:i:s");
        $this->trait = TraitGetIp::getUserIp();
        
    }
    
    #Realizará a inserção no banco de dados
    public function insertInsumo($arrVar)
    {  
    
    $return=$this->getDataInsumo($arrVar["nome"]);
    $tipo=$this->getDataInsumoTipo($arrVar["tipo"]);
    $qtde = $return["data"]["qtde"] + $arrVar["qtde"];
    $qtdetipo = $tipo["data"]["qtde"] + $arrVar["qtde"];
    
    
    if($return["rows"] > 0){
        //encontrou algo
            if($tipo["data"]["tipo"]!== $arrVar["tipo"]){
                //faz cadastro
                $this->insertDB(
                "tb_geminacao",
                "?,?,?,?,?,?",
                array(
                    0,
                    $arrVar['nome'],
                    $arrVar['categoria'],
                    $arrVar['tipo'],                    
                    $arrVar['qtde'],                    
                    $arrVar['descricao']                  
                )
            );
                echo "<script>alert('Cadastrado com sucesso!');window.location.href='".DIRPAGE."/insumos?pagina=1'</script>";
            }else{
                $sql = "update tb_insumos set qtde = :qtde where nome= :nome and tipo= :tipo";
               $pdo=$this->conexaoDB();
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $pdo->prepare($sql);
               $stmt->execute(array(
                   ':nome' => $arrVar["nome"],
                   ':tipo' => $arrVar["tipo"],
                   ':qtde' => $qtdetipo                  
               ));
               if($stmt->rowCount()>0){
                   echo "<script>alert('A Quantidade foi somada!');window.location.href='".DIRPAGE."/insumos?pagina=1'</script>";
               }
            }
        }else{  
            //faz o cadastro
            echo "<script>alert('Cadastrado com Sucesso!');window.location.href='".DIRPAGE."/insumos?pagina=1'</script>";
        }
    }
    static function getNome() {
        if(isset($_POST['nome'])){
            self::$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
            return self::$nome;
        }
    }

    static function getCategoria() {
        if(isset($_POST['categoria'])){
            self::$categoria = filter_input(INPUT_POST, 'categoria', FILTER_DEFAULT);
            return self::$categoria;
        }
    }

    static function getTipo() {
        if(isset($_POST['tipo'])){
            self::$tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
            return self::$tipo;
        }
    }

    static function getQtde() {
        if(isset($_POST['qtde'])){
            self::$qtde = filter_input(INPUT_POST, 'qtde', FILTER_DEFAULT);
            return self::$qtde;
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
    public function getDataInsumo($nome){
        $select=$this->selectDB(
             "*",
                "tb_insumos",
                "where nome=?",
                array(
                   $nome
                )
            );
    $fetch = $select->fetch(\PDO::FETCH_ASSOC);                          
    $row = $select->rowCount();
    return $arrData=[
        "data"=>$fetch,
        "rows"=>$row
        ];
    
    }
    /**
     * retorna os dados do usuario
     */
    public function getDataInsumoTipo($tipo){
        $select=$this->selectDB(
             "*",
                "tb_insumos",
                "where tipo=?",
                array(
                   $tipo
                )
            );
    $fetch = $select->fetch(\PDO::FETCH_ASSOC);                          
    $row = $select->rowCount();
    return $arrData=[
        "data"=>$fetch,
        "rows"=>$row
        ];
    
    }
    /**
     * 
     */
    public function getIssetInsumo($nome){
        $select=$this->selectDB(
             "*",
                "tb_insumos",
                "where nome=?",
                array(
                   $nome
                )
            );
        return $res=$select->rowCount();
    }
   
    
   
        
        
        
        
    
    
   
    
}
