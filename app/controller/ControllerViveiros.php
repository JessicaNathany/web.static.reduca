<?php
namespace App\Controller;
session_start();
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassSessions;
use Src\Classes\ClassValidate;
use App\Model\ClassViveiros;
use Src\Classes\ClassExport;

class ControllerViveiros extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Viveiros");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("viveiros");
        $this->btn_excluir_event();
        $this->btn_export_event();
        $this->Main();
        $this->renderLayout();
        $session= new ClassSessions();
        $session->verifyInsideSession("padrao");
    }
    /**
     * Função principal
     */
    private function Main(){
        $arrVar=null;
        $validate=new ClassValidate();
        $viveiro=new ClassViveiros();
        
        #
        if(!empty($_POST)){
            $arrVar=[
                "local"=>$viveiro::getLocal(),
                "nome"=>$viveiro::getNome(),
                "data"=>$viveiro::getData(),
                "manutencao"=>$viveiro::getManutencao(),
                "cep"=>$viveiro::getCep(),
                "endereco"=>$viveiro::getEndereco(),
                "bairro"=>$viveiro::getBairro(),
                "cidade"=>$viveiro::getCidade(),
                "uf"=>$viveiro::getUF(),                
                "descricao"=>$viveiro::getDescricao()
            ];
            
            $validate->validateFields($_POST);
                if($validate->getErro()==""){
                    $viveiro->insertViveiro($arrVar);
                }
        }
    }
    /**
     * Função do evento do botão excluir
     */
    private function btn_excluir_event(){
        if(isset($_REQUEST["id"])){
            $id=$_REQUEST["id"];
            $viveiro = new ClassViveiros();
            $viveiro->deleteDataViveiro($id);
        }
    }
    /**
     * Função do evento do botão excluir
     */
    private function btn_export_event(){
        if(isset($_REQUEST["pagina"])&& $_REQUEST["pagina"]==0){
             $export=new ClassExport();
             $export->gerarExcelViveiro("Tabela Viveiro");
        }
    }
    

    

}