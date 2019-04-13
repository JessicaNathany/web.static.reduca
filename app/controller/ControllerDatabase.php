<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */
use Src\database\ClassDatabase;

class ControllerDatabase extends ClassDatabase{
    /**
     * metodo construtor da classe de controler da database.
     */
    public function __construct() {
        
        $this->createDB();
        $this->createTableUserDB();
        $this->createTableAttemptDB();
        $this->createTableConfirmation();
        
    }
}