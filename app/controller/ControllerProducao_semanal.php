<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerProducao_semanal extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Produção Semanal");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("Producao_semanal");
        $this->renderLayout();
    }

    

}