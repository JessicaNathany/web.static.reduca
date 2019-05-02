<?php
namespace App\Controller;

/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */


use Src\Classes\ClassHelperUser as help;
use App\Model\ClassEspecies;

use App\Model\ClassCliente as cliente;


class ControllerTeste {
    /**
     * metodo construtor da classe de controler do Usuario.
     */
    public function __construct() {

        $especie = new ClassEspecies();
        $oi=$especie->getDataEspecie("wanclei");
        
        print_r($oi["data"]["habito"]);

        $cnpj = "76323649000105";
        $cliente = new cliente();
        $data = $cliente->getDataCliente($cnpj);
        echo $data["data"]["razaosocial"];
        echo $data["data"]["cnpj"];
        echo $data["data"]["contato"];
        
    }   
}
