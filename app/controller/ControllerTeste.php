<?php
namespace App\Controller;

/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */

use Src\Classes\ClassHelperUser as help;
use App\Model\ClassEspecies;

class ControllerTeste {
    /**
     * metodo construtor da classe de controler do Usuario.
     */
    public function __construct() {
        $especie = new ClassEspecies();
        $oi=$especie->getDataEspecie("wanclei");
        
        print_r($oi["data"]["habito"]);
             
   }
   
   
}