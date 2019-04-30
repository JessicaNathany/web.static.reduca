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

class ControllerEspecies extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Especies");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("especies");
        $this->Main();
        $this->renderLayout();
        $session= new ClassSessions();
        $session->verifyInsideSession("padrao");
        
        
    }
    /**
     * 
     * 
     */
    public function Main(){
        $arrVar = null;
        $especies = new especies();
        $validate = new validate();
        
        /**
         * 
         */
        if(!empty($_POST)){
            /**
             * 
             */
            $nomePopular = $especies::getNomePopular();
            $nomeCientifico = $especies::getNomeCientifico();
            $familia = $especies::getFamilia();
            $classeSucessional = $especies::getClasseSucessional();
            $gFuncional = $especies::getGrupoFuncional();
            $extincao = $especies::getExtincao();
            $dispersao = $especies::getDispercao();
            $habito = $especies::getHabito();
            $bioma = $especies::getBioma();
            $descricao = $especies::getDescricao();
            
            /**
             * 
             */
            $arrVar =[
                "nPopular"=>$nomePopular,
                "nCientifico"=>$nomeCientifico,
                "familia"=>$familia,
                "classeSucessional"=>$classeSucessional,
                "gFuncional"=>$gFuncional,
                "extincao"=>$extincao,
                "dispersao"=>$dispersao,
                "habito"=>$habito,
                "bioma"=>$bioma,
                "descricao"=>$descricao
            ];
            
            /**
             * 
             */
            $validate->validateFields($_POST);            
            if($validate->getErro()== ""){
                $especies->insertEspecie($arrVar);
            }else{
                
            }
            
            
            
        }
        
        
    }
    /*
     * 
     */
    public function btn_excluir_event(){
        if(isset($_POST['btn_excluir'])){
            
        }
        }
    

}