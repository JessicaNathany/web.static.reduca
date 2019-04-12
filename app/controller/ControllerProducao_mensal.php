<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerProducao_mensal extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Produção Mensal");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("produção_mensal");
        $this->renderLayout();
    }

    

}