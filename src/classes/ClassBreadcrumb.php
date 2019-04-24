<?php
namespace Src\Classes;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ClassBreadcrumb{
    use \Src\Traits\TraitUrlParser;
    /**
     * 
     * 
     */
    public function addBreadcrumb(){
        $Contador = count($this->parseUrl());
        
        $ArrayLink[0]='';
        echo "<a href=".DIRPAGE.'/home'." class='breadcrumb'>home</a> > ";
        for($I=0; $I < $Contador; $I++){
            $ArrayLink[0].=$this->parseUrl()[$I].'/';
           echo "<a href=".DIRPAGE.'/'.$ArrayLink[0]." class='breadcrumb'>".$this->parseUrl()[$I]."</a>";
           
           if($I < $Contador - 1){
               echo " > ";
           }
        }
    }
}