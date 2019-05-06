<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Src\Classes;

/**
 * Description of ExportExcel
 *
 * @author ModoHacker
 */
use App\Model\ClassConexao;
use App\Model\ClassCrud;

class ClassExport extends ClassConexao {

    private $data;

    //put your code here
    function __construct() {
        $this->data = new ClassCrud();
    }

    /**
     * função que gera o arquivo xls para exportação ao excel.
     */
    public function gerarExcelViveiro($NomeTabela) {

        //tabela html no formato da planilha do excel.
        $tabela = "<table border='1'>";
        $tabela .= "<tr>";
        $tabela .= "<td colspan='2'>$NomeTabela</tr>";
        $tabela .= "</tr>";
        $tabela .= "<td><b>ID</b></td>";
        $tabela .= "<td><b>Local</b></td>";
        $tabela .= "<td><b>Data</b></td>";
        $tabela .= "<td><b>Manutenção</b></td>";
        $tabela .= "<td><b>Cep</b></td>";
        $tabela .= "<td><b>Endereço</b></td>";
        $tabela .= "<td><b>Bairro</b></td>";
        $tabela .= "<td><b>Cidade</b></td>";
        $tabela .= "<td><b>UF</b></td>";
        $tabela .= "<td><b>Descrição</b></td>";
        $tabela .= "</tr>";
        
        //chama o comando pra fazer o select no banco
        $result = $this->data->getAllData("tb_viveiro");
        //varre o aaray
        foreach ($result as $data) {
            $tabela .= "<tr>";
            $tabela .= "<td>" . utf8_decode($data['id']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['local']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['nome']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['dt']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['cep']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['endereco']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['bairro']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['cidade']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['uf']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['descricao']) . "</td>";
            $tabela .= "<tr>";
        }
        $tabela .= "</table>";
        #nome do arquivo que será gerado.
        $arquivo = "{$NomeTabela}.xls";
        
        //configura o header
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        //caso seja o I9
        header('Cache-Control: max-age=1');
        
        //faz o download
        echo utf8_decode($tabela);
        exit;
    }
    /**
     * função que gera o arquivo xls para exportação ao excel.
     */
    public function gerarExcelRepicagem($NomeTabela) {

        //tabela html no formato da planilha do excel.
        $tabela = "<table border='1'>";
        $tabela .= "<tr>";
        $tabela .= "<td colspan='2'>$NomeTabela</tr>";
        $tabela .= "</tr>";
        $tabela .= "<td><b>ID</b></td>";
        $tabela .= "<td><b>Especie</b></td>";
        $tabela .= "<td><b>Data</b></td>";
        $tabela .= "<td><b>Quantidade</b></td>";
        $tabela .= "<td><b>Material</b></td>";
        $tabela .= "<td><b>Descrição</b></td>";
        $tabela .= "</tr>";
        
        //chama o comando pra fazer o select no banco
        $result = $this->data->getAllData("tb_repicagem");
        //varre o aaray
        foreach ($result as $data) {
            $tabela .= "<tr>";
            $tabela .= "<td>" . utf8_decode($data['id']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['especie']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['dt']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['qtde']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['material']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['descricao']) . "</td>";
            $tabela .= "<tr>";
        }
        $tabela .= "</table>";
        #nome do arquivo que será gerado.
        $arquivo = "{$NomeTabela}.xls";
        
        //configura o header
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        //caso seja o I9
        header('Cache-Control: max-age=1');
        
        //faz o download
        echo utf8_decode($tabela);
        exit;
    }
    /**
     * função que gera o arquivo xls para exportação ao excel.
     */
    public function gerarExcelCliente($NomeTabela) {

        //tabela html no formato da planilha do excel.
        $tabela = "<table border='1'>";
        $tabela .= "<tr>";
        $tabela .= "<td colspan='2'>$NomeTabela</tr>";
        $tabela .= "</tr>";
        $tabela .= "<td><b>ID</b></td>";
        $tabela .= "<td><b>Razão Social</b></td>";
        $tabela .= "<td><b>Documento</b></td>";
        $tabela .= "<td><b>Contato</b></td>";
        $tabela .= "<td><b>Email</b></td>";
        $tabela .= "<td><b>Cep</b></td>";
        $tabela .= "<td><b>Endereço</b></td>";
        $tabela .= "<td><b>Bairro</b></td>";
        $tabela .= "<td><b>Cidade</b></td>";
        $tabela .= "<td><b>UF</b></td>";
        $tabela .= "<td><b>Descrição</b></td>";
        $tabela .= "</tr>";
        
        //chama o comando pra fazer o select no banco
        $result = $this->data->getAllData("tb_clientes");
        //varre o aaray
        foreach ($result as $data) {
            $tabela .= "<tr>";
            $tabela .= "<td>" . utf8_decode($data['id']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['razaosocial']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['documento']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['contato']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['email']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['cep']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['endereco']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['bairro']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['cidade']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['uf']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['descricao']) . "</td>";
            $tabela .= "<tr>";
        }
        $tabela .= "</table>";
        #nome do arquivo que será gerado.
        $arquivo = "{$NomeTabela}.xls";
        
        //configura o header
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        //caso seja o I9
        header('Cache-Control: max-age=1');
        
        //faz o download
        echo utf8_decode($tabela);
        exit;
    }
    /**
     * função que gera o arquivo xls para exportação ao excel.
     */
    public function gerarExcelDescartes($NomeTabela) {

        //tabela html no formato da planilha do excel.
        $tabela = "<table border='1'>";
        $tabela .= "<tr>";
        $tabela .= "<td colspan='2'>$NomeTabela</tr>";
        $tabela .= "</tr>";
        $tabela .= "<td><b>ID</b></td>";
        $tabela .= "<td><b>Especie</b></td>";
        $tabela .= "<td><b>Data</b></td>";
        $tabela .= "<td><b>Quantidade</b></td>";
        $tabela .= "<td><b>Motivo</b></td>";
        $tabela .= "</tr>";
        
        //chama o comando pra fazer o select no banco
        $result = $this->data->getAllData("tb_descartes");
        //varre o aaray
        foreach ($result as $data) {
            $tabela .= "<tr>";
            $tabela .= "<td>" . utf8_decode($data['id']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['especie']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['dt']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['qtde']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['motivo']) . "</td>";
            $tabela .= "<tr>";
        }
        $tabela .= "</table>";
        #nome do arquivo que será gerado.
        $arquivo = "{$NomeTabela}.xls";
        
        //configura o header
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        //caso seja o I9
        header('Cache-Control: max-age=1');
        
        //faz o download
        echo utf8_decode($tabela);
        exit;
    }
    /**
     * função que gera o arquivo xls para exportação ao excel.
     */
    public function gerarExcelEspecie($NomeTabela) {

        //tabela html no formato da planilha do excel.
        $tabela = "<table border='1'>";
        $tabela .= "<tr>";
        $tabela .= "<td colspan='2'>$NomeTabela</tr>";
        $tabela .= "</tr>";
        $tabela .= "<td><b>ID</b></td>";
        $tabela .= "<td><b>Nome Popular</b></td>";
        $tabela .= "<td><b>Nome Cientifico</b></td>";
        $tabela .= "<td><b>Familia</b></td>";
        $tabela .= "<td><b>Classe Sucessional</b></td>";
        $tabela .= "<td><b>Extinção</b></td>";
        $tabela .= "<td><b>Dispersão</b></td>";
        $tabela .= "<td><b>Habito</b></td>";
        $tabela .= "<td><b>Bioma</b></td>";
        $tabela .= "<td><b>Descrição</b></td>";
        $tabela .= "</tr>";
        
        //chama o comando pra fazer o select no banco
        $result = $this->data->getAllData("tb_especies");
        //varre o aaray
        foreach ($result as $data) {
            $tabela .= "<tr>";
            $tabela .= "<td>" . utf8_decode($data['id']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['nPopular']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['nCientifico']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['familia']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['classeSucessional']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['extincao']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['dispersao']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['habito']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['bioma']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['descricao']) . "</td>";
            $tabela .= "<tr>";
        }
        $tabela .= "</table>";
        #nome do arquivo que será gerado.
        $arquivo = "{$NomeTabela}.xls";
        
        //configura o header
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        //caso seja o I9
        header('Cache-Control: max-age=1');
        
        //faz o download
        echo utf8_decode($tabela);
        exit;
    }
    /**
     * função que gera o arquivo xls para exportação ao excel.
     */
    public function gerarExcelGeminacao($NomeTabela) {

        //tabela html no formato da planilha do excel.
        $tabela = "<table border='1'>";
        $tabela .= "<tr>";
        $tabela .= "<td colspan='2'>$NomeTabela</tr>";
        $tabela .= "</tr>";
        $tabela .= "<td><b>ID</b></td>";
        $tabela .= "<td><b>Especie</b></td>";
        $tabela .= "<td><b>Data</b></td>";
        $tabela .= "<td><b>Quantidade</b></td>";
        $tabela .= "<td><b>Descrição</b></td>";
        $tabela .= "</tr>";
        
        //chama o comando pra fazer o select no banco
        $result = $this->data->getAllData("tb_geminacao");
        //varre o aaray
        foreach ($result as $data) {
            $tabela .= "<tr>";
            $tabela .= "<td>" . utf8_decode($data['id']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['especie']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['dt']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['qtde']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['descricao']) . "</td>";
            $tabela .= "<tr>";
        }
        $tabela .= "</table>";
        #nome do arquivo que será gerado.
        $arquivo = "{$NomeTabela}.xls";
        
        //configura o header
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        //caso seja o I9
        header('Cache-Control: max-age=1');
        
        //faz o download
        echo utf8_decode($tabela);
        exit;
    }
    /**
     * função que gera o arquivo xls para exportação ao excel.
     */
    public function gerarExcelInsumos($NomeTabela) {

        //tabela html no formato da planilha do excel.
        $tabela = "<table border='1'>";
        $tabela .= "<tr>";
        $tabela .= "<td colspan='2'>$NomeTabela</tr>";
        $tabela .= "</tr>";
        $tabela .= "<td><b>ID</b></td>";
        $tabela .= "<td><b>Nome</b></td>";
        $tabela .= "<td><b>Categoria</b></td>";
        $tabela .= "<td><b>Tipo</b></td>";
        $tabela .= "<td><b>Quantidade</b></td>";
        $tabela .= "<td><b>Descrição</b></td>";
        $tabela .= "</tr>";
        
        //chama o comando pra fazer o select no banco
        $result = $this->data->getAllData("tb_insumos");
        //varre o aaray
        foreach ($result as $data) {
            $tabela .= "<tr>";
            $tabela .= "<td>" . utf8_decode($data['id']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['nome']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['categoria']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['tipo']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['qtde']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['descricao']) . "</td>";
            $tabela .= "<tr>";
        }
        $tabela .= "</table>";
        #nome do arquivo que será gerado.
        $arquivo = "{$NomeTabela}.xls";
        
        //configura o header
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        //caso seja o I9
        header('Cache-Control: max-age=1');
        
        //faz o download
        echo utf8_decode($tabela);
        exit;
    }
    /**
     * função que gera o arquivo xls para exportação ao excel.
     */
    public function gerarExcelSementes($NomeTabela) {

        //tabela html no formato da planilha do excel.
        $tabela = "<table border='1'>";
        $tabela .= "<tr>";
        $tabela .= "<td colspan='2'>$NomeTabela</tr>";
        $tabela .= "</tr>";
        $tabela .= "<td><b>ID</b></td>";
        $tabela .= "<td><b>Local</b></td>";
        $tabela .= "<td><b>Especie</b></td>";
        $tabela .= "<td><b>Data</b></td>";
        $tabela .= "<td><b>Cep</b></td>";
        $tabela .= "<td><b>Endereco</b></td>";
        $tabela .= "<td><b>Bairro</b></td>";
        $tabela .= "<td><b>Cidade</b></td>";
        $tabela .= "<td><b>UF</b></td>";
        $tabela .= "<td><b>Descrição</b></td>";
        $tabela .= "</tr>";
        
        //chama o comando pra fazer o select no banco
        $result = $this->data->getAllData("tb_sementes");
        //varre o aaray
        foreach ($result as $data) {
            $tabela .= "<tr>";
            $tabela .= "<td>" . utf8_decode($data['id']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['local']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['especie']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['dt']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['cep']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['endereco']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['bairro']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['cidade']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['uf']) . "</td>";
            $tabela .= "<td>" . utf8_decode($data['descricao']) . "</td>";
            $tabela .= "<tr>";
        }
        $tabela .= "</table>";
        #nome do arquivo que será gerado.
        $arquivo = "{$NomeTabela}.xls";
        
        //configura o header
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        //caso seja o I9
        header('Cache-Control: max-age=1');
        
        //faz o download
        echo utf8_decode($tabela);
        exit;
    }
    /**
     * 
     */
    public function exportJson($tabela){
        $stmt="SELECT * FROM {$tabela}";
        $select=$this->conexaoDB()->prepare($stmt);
        $select->execute();
        $result=$select->fetchAll();
        $fetch=array();
        foreach($result as $key => $value){
            foreach ($value as $k => $v){
                $fetch[$key][$k]= $v;
            }
        }
        echo json_encode($fetch, JSON_UNESCAPED_UNICODE);
    }

}
