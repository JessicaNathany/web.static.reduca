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

class ControllerClientes extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        if(isset($_SESSION['login'])){
            $this->setTitle("Clientes");
            $this->setDescription("");
            $this->setKeywords("");
            $this->setDir("clientes");
            $this->renderLayout();
        }else{
            header("location:".DIRPAGE.'/login');
        }
        
    }

    

}