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
use App\Model\ClassLogin;
use App\Model\ClassGeminacao;


class ControllerTeste {
    /**
     * metodo construtor da classe de controler do Usuario.
     */
    public function __construct() {
        $geminacao=new ClassGeminacao();
        $oi=$geminacao->getDataGeminacao("araca vermelho");
        var_dump($oi);

        
        
    }   
}
