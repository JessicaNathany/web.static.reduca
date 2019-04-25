<?php
namespace App\Controller;
session_start();
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassSessions;

class ControllerLotes_periodo extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Lotes por periodo");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("lotes_periodo");
        $this->renderLayout();
        $session= new ClassSessions();
            $session->verifyInsideSession("padrao");
    }

    

}