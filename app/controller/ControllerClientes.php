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
            $this->btn_excluir_event();
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
                "documento"=>$cliente::getDocumento(),               
                "contato"=>$cliente::getContato(),
                "email"=>$cliente::getEmail(),              
                "endereco"=>$cliente::getEndereco(),
                "cidade"=>$cliente::getCidade(),
                "estado"=>$cliente::getEstado(),
                "cep"=>$cliente::getCep(),
                "descricao"=>$cliente::getDescricao()
            ];

            $validate->validateFields($_POST);
            $validate->validateEmail($cliente::getEmail());
            
            if($validate->getErro()== ""){
                $cliente->insertCliente($arrVar);           
            }  
        }
    }
    # evento do botão excluir
    private function btn_excluir_event(){
        if(isset($_REQUEST["id"])){
            $id=$_REQUEST["id"];
            $cliente = new clientes();
            $cliente->deleteDataCliente($id);
        }
    }

}
