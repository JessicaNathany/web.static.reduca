<?php
namespace App\Controller;

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
        
            
            $this->setTitle("Home");
            $this->setDescription("");
            $this->setKeywords("");
            $this->setDir("home");
            $this->renderLayout();
            
        
        
    }

    

}