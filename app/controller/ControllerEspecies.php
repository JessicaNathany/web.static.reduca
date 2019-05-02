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
        $this->btn_excluir_event();
        $this->consultar();
        $this->renderLayout();
        $session= new ClassSessions();
        $session->verifyInsideSession("padrao");
        
        
    }
    /**
     * 
     * 
     */
    public function Main(){              
        /**
         * 
         */

        if(!empty($_POST)){           
            /**
             * 
             */

        $arrVar = null;
        $especies = new especies();
        $validate = new validate();
        if(!empty($_POST)){
            /**
             * 
             */
            

            $arrVar =[

                "nPopular"=>$especies::getNomePopular(),
                "nCientifico"=>$especies::getNomeCientifico(),
                "familia"=>$especies::getFamilia(),
                "classeSucessional"=>$especies::getClasseSucessional(),

                "nPopular"=> $especies::getNomePopular(),
                "nCientifico"=>$especies::getNomeCientifico(),
                "familia"=>$especies::getFamilia(),
                "classeSucessional"=>$especies::getClasseSucessional(),              

                "extincao"=>$especies::getExtincao(),
                "dispersao"=>$especies::getDispercao(),
                "habito"=>$especies::getHabito(),
                "bioma"=>$especies::getBioma(),
                "descricao"=>$especies::getDescricao()
            ];
            
            /**
             * 
             */
            $validate->validateFields($_POST);            
            if($validate->getErro()== ""){
                $especies->insertEspecie($arrVar,$especies::getNomePopular());
            }
            
        }   
            
        }
        
        
    }
    /**
     * 
     */
    public function consultar(){
        $especie = new especies();
        if(isset($_POST['btn_consultar'])){
            echo "<script>alert('Voce esta procurando!');window.location.href='".DIRPAGE."/especies?pagina=1'</script>";
            
        }
    }
    /*
     * 
     */
    public function btn_excluir_event(){
        if(isset($_POST['btn_excluir'])){
            echo "<script>alert('voce esta excluindo');window.location.href='".DIRPAGE."/especies?pagina=1'</script>";
        }
        }
    }


