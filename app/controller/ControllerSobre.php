<?php

namespace App\Controller;

/**
 * @author Wanclei Felipe <Wanclei.santos@fatec.sp.gov.br>
 * @license http://URL name
 * 
 */
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerSobre extends ClassRender implements InterfaceView {

    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {


        $this->setTitle("Sobre");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("sobre");
        $this->renderLayout();
    }

}
