<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerProducao_anual extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Produção Anual");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("producao_anual");
        $this->renderLayout();
    }

    

}