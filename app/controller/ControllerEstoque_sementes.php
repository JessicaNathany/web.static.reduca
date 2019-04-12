<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerEstoque_sementes extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Estoque de Sementes");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("estoque_sementes");
        $this->renderLayout();
    }

    

}