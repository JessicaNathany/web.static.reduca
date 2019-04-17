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

class ControllerErroSession{
    /**
     * 
     */
    public function __construct() {
        echo "<h2 style=align='center'; color='red';'>Você não tem permissão de acesso.<br>Por favor efetue <a href='".DIRPAGE."'>Login</h2>";
    }
}