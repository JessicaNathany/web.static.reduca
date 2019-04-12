<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerEstoque_mudas extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Estoque de Mudas");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("estoque_mudas");
        $this->renderLayout();
    }

    

}