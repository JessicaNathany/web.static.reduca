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
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassSessions;
use App\Model\ClassCliente as clientes;


class ControllerClientes extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        
            $this->setTitle("Clientes");
            $this->setDescription("");
            $this->setKeywords("");
            $this->setDir("clientes");
            $this->renderLayout();
            $this->Main();
            $session= new ClassSessions();
            $session->verifyInsideSession("padrao");
        }
    /**
     * 
     */
    private function Main(){
        $arrVar = null;
        $clientes = new clientes();
        $validate = new validate();                       
            /**
             * 
             */
            $arrVar =[
                "razaosocial"=>$clientes::getRazaoSocial(),
                "cnpj"=>$clientes::getCNPJ(),
                "rg"=>"null",
                "contato"=>$clientes::getContato(),
                "email"=>$clientes::getEmail(),
                "endereco"=>$clientes::getEndereco(),
                "cidade"=>$clientes::getCidade(),
                "estado"=>$clientes::getEstado(),
                "cep"=>$clientes::getCep(),
                "descricao"=>$clientes::getDescricao()
            ];
            /**
             * 
             */
            $validate->validateFields($_POST);
            $validate->validateEmail($clientes::getEmail());
            
            if($validate->getErro()== ""){
                $clientes->insertCliente($arrVar,$clientes::getRazaoSocial(),$clientes::$CNPJ);
            }else{
                
            }
        
    }

    

}