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

class ControllerHome extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        
        
            
            $this->setTitle("Pagina Inicial");
            $this->setDescription("Esse é um teste para transferir o tcc");
            $this->setKeywords("Dae teste, robustez para fazer deploy");
            $this->setDir("home");
            $this->renderLayout();
            
        
        
    }

    

}