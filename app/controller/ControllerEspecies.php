<?php
namespace App\Controller;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassDatabasePaginator as DatabasePaginator;
use Src\Classes\ClassPdoDatabasePaginatorAdapter as PdoDatabasePaginatorAdapter;

class ControllerEspecies extends ClassRender implements InterfaceView{
    
    /**
     * metodo construtor da classe de controler da home.
     */
    public function __construct() {
        $this->setTitle("Especies");
        $this->setDescription("");
        $this->setKeywords("");
        $this->setDir("especies");
        $this->Main();
        $this->renderLayout();
        
        
    }
    /**
     * 
     * 
     */
    public function Main(){
        
        
        
    }

    

}