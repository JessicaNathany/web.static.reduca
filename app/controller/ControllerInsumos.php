<?php
namespace App\Controller;
session_start();
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Classes\ClassValidate;
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassSessions;
use App\Model\ClassInsumos;
use Src\Classes\ClassExport;

class ControllerInsumos extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Insumos");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("insumos");
        $this->Main();
        $this->btn_excluir_event();
        $this->btn_export_event();
        $this->renderLayout();
        $session= new ClassSessions();
        $session->verifyInsideSession("padrao");
    }
    /**
     * funcão principal
     */
    private function Main(){
        $arrVar=null;
        $data = new ClassInsumos();
        $validate = new ClassValidate();
        
        if(!empty($_POST)){
            $arrVar=[
                "nome"=>$data::getNome(),
                "categoria"=>$data::getCategoria(),
                "tipo"=>$data::getTipo(),
                "qtde"=>$data::getQtde(),
                "descricao"=>$data::getDescricao(),
            ];
         $validate->validateFields($_POST);
            if($validate->getErro() === ""){
                $data->insertInsumo($arrVar);
            }
        }    
    }
    # evento do botão excluir
    private function btn_excluir_event(){
        if(isset($_REQUEST["id"])){
            $id=$_REQUEST["id"];
            $insumo = new ClassInsumos();
            $insumo->deleteDataInsumo($id);
        }
    }
    /**
     * Função do evento do botão excluir
     */
    private function btn_export_event(){
        if(isset($_REQUEST["pagina"])&& $_REQUEST["pagina"]==0){
             $export=new ClassExport();
             $export->gerarExcelInsumos("Tabela Insumos");
        }
    }
}