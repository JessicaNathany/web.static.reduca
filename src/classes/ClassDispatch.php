<?php
namespace Classes;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Src\Traits;

class ClassDispatch {
    
    use Traits\TraitUrlParser;
    
    /**
     * 
     */
    private $init;
    
    /**
     * 
     */
    private $url;
    
    /**
     * 
     */
    private $dir=null;
    
    /**
     * 
     */
    private $cont;
    
    /**
     * 
     */
    private $file;
    
    /**
     * 
     */
    private $page;
    
    /**
     * 
     */
    public function __construct() {
        $this->url=TraitParseUrl::parseUrl();
        $this->cont=count($this->url);
        $this->verificaParametros();
    }
    
    /**
     * 
     */
    private function verificaParametros(){
        if($this->cont == 1 and empty($this->url[0])){
            $this->page=DIRREQ.'/views/index.php';
        }else{
            $this->verificaDir();
        }
    }
    
    /**
     * 
     */
    private function verificaDir(){
        $this->init= $this->url[0].'/';
        
        for($i=0; $i<$this->cont; $i++){
            if(is_dir($this->init)){
                if($i == 0){
                    $this->dir.=$this->init;
                }elseif(is_dir($this->dir.$this->url[$i])){
                    $this->dir.=$this->url[$i].'/';
                }else{
                    $this->file=$this->url[$i];
                    break;
                }
            }else{
                if($i == 0){
                    
                    $this-> dir.='Views/';
                    
                }elseif(is_dir($this->dir.$this->url[$i])){
                    $this->dir.=$this->url[$i];
                }else{
                    $this->file=$this->url[$i];
                    break;
                }
                
            }
        }
        $this->dir=str_replace("//","/",$this->dir);
        $this->verificaFile();
    }
    /**
     * 
     * 
     */

    private function verificaFile(){
        $dirAbs=DIRREQ.$this->dir;
        if(file_exists($dirAbs.$this->file.'php')){
            $this->page=$dirAbs.$this->file.'php';
        }elseif(file_exists($dirAbs.'index.php')){
            $this->page=$dirAbs.'index.php';
        }else{
            echo "Está pagina não existe 404";
        }
    }
    /**
     * 
     * 
     */
    
    public function getInclusao(){
        return $this->page;
    }
}