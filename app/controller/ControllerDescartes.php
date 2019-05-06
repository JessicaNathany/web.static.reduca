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
use App\Model\ClassDescartes;
use Src\Classes\ClassExport;

class ControllerDescartes extends ClassRender implements InterfaceView {

    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Perdas & Descartes");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("descartes");
        $this->btn_excluir_event();
        $this->btn_export_event();
        $this->Main();
        $this->renderLayout();
        $session = new ClassSessions();
        $session->verifyInsideSession("padrao");
    }

    /**
     * 
     */
    private function Main() {
        $validate = new ClassValidate();
        $descartes = new ClassDescartes();
        $arrVar = null;

        if (!empty($_POST)) {
            $arrVar = [
                "especie" => $descartes::getEspecie(),
                "data" => $descartes::getData(),
                "qtde" => $descartes::getQtde(),
                "motivo" => $descartes::getMotivo()
            ];
            $validate->validateFields($_POST);
            if ($validate->getErro() == "") {
                $descartes->insertDescarte($arrVar);
            }
        }
    }

    /**
     * 
     */
    private function btn_excluir_event() {
        if(isset($_REQUEST["id"])){
            $id=$_REQUEST["id"];
            $descartes = new ClassDescartes();
            $descartes->deleteDataDescartes($id);
        }
    }
    /**
     * Função do evento do botão excluir
     */
    private function btn_export_event(){
        if(isset($_REQUEST["pagina"])&& $_REQUEST["pagina"]==0){
             $export=new ClassExport();
             $export->gerarExcelDescartes("Tabela Descartes");
        }
    }

}
