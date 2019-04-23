<?php
namespace App\Controller;

/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;


class ControllerAcessDenied extends ClassRender implements InterfaceView{
    /**
     * 
     */
    public function __construct() {
        $this->setTitle("Acesso Negado");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("AcessDenied");
        $this->addMain();
    }
}