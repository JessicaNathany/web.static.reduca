<?php
namespace App\Controller;
session_start();
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */
use Src\Classes\ClassSessions as session;

class ControllerLogout{
    /**
     * 
     */
    public function __construct() {
        $session = new session();
        $session->destructSessions();
        $this->main();
    }
    
    /**
     * 
     */
    public function main (){
        if($_SESSION == false){
            echo "<script>alert('Você fez Logoff');window.location.href='".DIRPAGE."';</script>"; 
        }
    }
}