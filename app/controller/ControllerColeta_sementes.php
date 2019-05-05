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
                "especies"=>$sementes::getEspecie(),
                "data"=>$sementes::getData(),
                "endereco"=>$sementes::getEndereco(),
                "cidade"=>$sementes::getCidade(),
                "estado"=>$sementes::getEstado(),
                "cep"=>$sementes::getCep(),
                "descricao"=>$sementes::getDescricao(),
                "local"=>$sementes::getLocal()
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

}