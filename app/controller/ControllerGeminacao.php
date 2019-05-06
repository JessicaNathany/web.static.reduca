<?php
namespace App\Controller;
session_start();
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Classes\ClassValidate as validate;
use App\Model\ClassGeminacao as geminacao;
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassSessions;
use Src\Classes\ClassExport;

class ControllerGeminacao extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Geminação");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("geminacao");
        $this->renderLayout();
        $this->btn_excluir_event();
        $this->btn_export_event();
        $this->Main();
        $session= new ClassSessions();
        $session->verifyInsideSession("padrao");
    }
  #
    private function Main(){
        $arrVar = null;
        $geminacao = new geminacao();
        $validate = new validate();

        if(!empty($_POST)){                                
            $arrVar =[
                "especie"=>$geminacao::getEspecie(),
                "data"=>$geminacao::getData(),
                "qtde"=>$geminacao::getQtde(),
                "descricao"=>$geminacao::getDescricao()
            ];
            $validate->validateFields($_POST);           
            
            if($validate->getErro()== ""){
                $geminacao->insertGeminacao($arrVar);
                echo '<div class="" style="color:red; font-weight:bold;">'.$validate->getErro().'</div>';
            }
        }           
    }
    # evento do botão excluir
    private function btn_excluir_event(){
        if(isset($_REQUEST["id"])){
            $id=$_REQUEST["id"];
            $geminacao = new geminacao();
            $geminacao->deleteDataGeminacao($id);
        }
    }
    /**
     * Função do evento do botão excluir
     */
    private function btn_export_event(){
        if(isset($_REQUEST["pagina"])&& $_REQUEST["pagina"]==0){
             $export=new ClassExport();
             $export->gerarExcelGeminacao("Tabela Geminacao");
        }
    }

    

}