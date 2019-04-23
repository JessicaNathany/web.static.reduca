<?php
namespace App\Controller;

/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassSessions;

class ControllerErroSession extends ClassRender implements InterfaceView{
    /**
     * 
     */
    public function __construct() {
        $this->showError();
        
    }
}