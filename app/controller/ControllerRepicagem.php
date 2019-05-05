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
use App\Model\ClassRepicagem;
use Src\Classes\ClassValidate;

class ControllerRepicagem extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Repicagem");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("repicagem");
        $this->btn_excluir_event();
        $this->Main();
        $this->renderLayout();
        $session= new ClassSessions();
         $session->verifyInsideSession("padrao");
    }
    /**
     * 
     */
    private function Main(){
        $arrVar=null;
        $repicagem=new ClassRepicagem();
        $validate=new ClassValidate();
        if(!empty($_POST)){
            $arrVar=[
            "especies"=>$repicagem::getEspecie(),
            "data"=>$repicagem::getData(),
            "qtde"=>$repicagem::getQtde(),
            "descricao"=>$repicagem::getDescricao(),
            "material"=>$repicagem::getMaterial()
        ];
        $validate->validateFields($_POST);
        if($validate->getErro()===""){
            $repicagem->insertRepicagem($arrVar);
        }
    }
}
# evento do botão excluir
    private function btn_excluir_event(){
        if(isset($_REQUEST["id"])){
            $id=$_REQUEST["id"];
            $repicagem = new ClassRepicagem();
            $repicagem->deleteDataRepicagem($id);
        }
    }

}