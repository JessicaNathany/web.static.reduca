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
use App\Model\ClassSementes;
use Src\Classes\ClassExport;

class ControllerColeta_sementes extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Coleta de Sementes");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("coleta_sementes");
        $this->btn_excluir_event();
        $this->btn_export_event();
        $this->main();
        $this->renderLayout();
        $session= new ClassSessions();
        $session->verifyInsideSession("padrao");
    }
    /**
     * 
     */
    private function main(){
        $arrVar=null;
        $validate=new ClassValidate();
        $sementes=new ClassSementes();
        
        if(!empty($_POST)){
            $arrVar=[
                "local"=>$sementes::getLocal(),
                "especies"=>$sementes::getEspecie(),
                "data"=>$sementes::getData(),
                "cep"=>$sementes::getCep(),
                "endereco"=>$sementes::getEndereco(),
                "bairro"=>$sementes::getBairro(),
                "cidade"=>$sementes::getCidade(),
                "uf"=>$sementes::getUF(),                
                "descricao"=>$sementes::getDescricao()              
            ];
            $validate->validateFields($_POST);
                if($validate->getErro()===""){
                    $sementes->insertSementes($arrVar);
                }
        }
        
    }
    # evento do botão excluir
    private function btn_excluir_event(){
        if(isset($_REQUEST["id"])){
            $id=$_REQUEST["id"];
            $semente = new ClassSementes();
            $semente->deleteDataSementes($id);
        }
    }
    /**
     * Função do evento do botão excluir
     */
    private function btn_export_event(){
        if(isset($_REQUEST["pagina"])&& $_REQUEST["pagina"]==0){
             $export=new ClassExport();
             $export->gerarExcelSementes("Tabela Sementes");
        }
    }

}