<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerDescartes extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Perdas & Descartes");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("descartes");
        $this->renderLayout();
    }

    

}