<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerLocais_coleta extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Locais de Coleta");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("locais_coleta");
        $this->renderLayout();
    }

    

}