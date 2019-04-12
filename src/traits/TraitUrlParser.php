<?php
namespace Src\Traits;

/* 
 * Traits é uma classe auxiliar que irá dividir a URL em array.
 */

trait TraitUrlParser{
    /**
     * 
     */
    public function parseUrl($par=null){
        
        $url = explode("/",rtrim($_GET['url']),FILTER_SANITIZE_URL);        
        return($par == null)?$url:$url[$par];
        
    }
    
}