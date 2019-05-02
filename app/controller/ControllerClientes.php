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
        $arrVar=null;
        $cliente=new clientes();
        $validate=new validate();
        if(isset($_POST)){
            $arrVar =[
                "razaosocial"=> $cliente::getRazaoSocial(),
                "cnpj"=>$cliente::getCNPJ(),
                "rg"=>null,
                "contato"=>$cliente::getContato(),
                "email"=>$cliente::getEmail(),              
                "endereco"=>$cliente::getEndereco(),
                "cidade"=>$cliente::getCidade(),
                "estado"=>$cliente::getEstado(),
                "cep"=>$cliente::getCep(),
                "descricao"=>$cliente::getDescricao()
            ];

            /**
             * 
             */
            $validate->validateFields($_POST);
            $validate->validateEmail($clientes::getEmail());
            
            if($validate->getErro()== ""){
                $clientes->insertCliente($arrVar,$clientes::getRazaoSocial(),$clientes::$CNPJ);

            $validate->validateEmail($arrVar["email"]);
            $erro = $validate->getErro();            
            if($erro === ""){
                $cliente->insertCliente($arrVar);

            }else{
                
                
            }
            }  
        }
    }
}
