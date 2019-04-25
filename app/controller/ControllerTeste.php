<?php
namespace App\Controller;

/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassHelperUser as help;

class ControllerTeste {
    /**
     * metodo construtor da classe de controler do Usuario.
     */
    public function __construct() {
        $this->main();
             
   }
   private function main(){
       echo "Voce testou!";
   }
   
}