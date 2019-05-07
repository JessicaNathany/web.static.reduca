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
use App\Model\ClassInventario;

class ControllerInventario extends ClassRender implements InterfaceView{
    
    use \Src\Traits\TraitUrlParser;
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
                   
        $this->setTitle("Inventario");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("inventario");
        $this->Main();
        $this->renderLayout();
        $session= new ClassSessions();
        $session->verifyInsideSession("padrao"); 
        
        
    }
    
    public function Main(){
       
        
    }
    

    

}