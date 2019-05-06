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
use App\Model\ClassEspecies as especies;
use Src\Classes\ClassValidate as validate;
use Src\Classes\ClassExport;

class ControllerEspecies extends ClassRender implements InterfaceView {

    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Especies");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("especies");
        $this->Main();
        $this->btn_excluir_event();
        $this->btn_export_event();
        $this->renderLayout();
        $session = new ClassSessions();
        $session->verifyInsideSession("padrao");
    }

    /**
     * 
     * 
     */
    public function Main() {
        if (!empty($_POST)) {
            $arrVar = null;
            $especies = new especies();
            $validate = new validate();

            if (!empty($_POST)) {
                $arrVar = [
                    "nPopular" => $especies::getNomePopular(),
                    "nCientifico" => $especies::getNomeCientifico(),
                    "familia" => $especies::getFamilia(),
                    "classeSucessional" => $especies::getClasseSucessional(),
                    "extincao" => $especies::getExtincao(),
                    "dispersao" => $especies::getDispercao(),
                    "habito" => $especies::getHabito(),
                    "bioma" => $especies::getBioma(),
                    "descricao" => $especies::getDescricao()
                ];
                $validate->validateFields($_POST);
                if ($validate->getErro() == "") {
                    $especies->insertEspecie($arrVar);
                }
            }
        }
    }

# evento do botão excluir

    private function btn_excluir_event() {
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $especie = new especies();
            $especie->deleteDataEspecie($id);
        }
    }
    /**
     * Função do evento do botão excluir
     */
    private function btn_export_event(){
        if(isset($_REQUEST["pagina"])&& $_REQUEST["pagina"]==0){
             $export=new ClassExport();
             $export->gerarExcelEspecie("Tabela Especies");
        }
    }

}
