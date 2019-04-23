<?php
namespace Src\Classes;
/** 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ClassRender{
    
    private $Dir;
    private $Title;
    private $Description;
    private $Keywords;
    
    /**
     * GETTERS AND SETTERS
     * @return type
     */    
    function getDir() {
        return $this->Dir;
    }

    function getTitle() {
        return $this->Title;
    }

    function getDescription() {
        return $this->Description;
    }

    function getKeywords() {
        return $this->Keywords;
    }

    function setDir($Dir) {
        $this->Dir = $Dir;
    }

    function setTitle($Title) {
        $this->Title = $Title;
    }

    function setDescription($Description) {
        $this->Description = $Description;
    }

    function setKeywords($Keywords) {
        $this->Keywords = $Keywords;
    }
        
    /**
     * Metodo responsavel por renderizar todo layout;
     */    
    public function renderLayout(){
        include_once(DIRREQ."/app/view/Layout.php");
        
    }
    /**
     * Adiciona caracteriticas no head
     */    
    public function addHead(){
        if(file_exists(DIRREQ."/app/view/{$this->getDir()}/Head.php")){
            include (DIRREQ."/app/view/{$this->getDir()}/Head.php"); 
        }
    }
    /**
     * Adiciona caracteriticas no headear
     */    
    public function addHeader(){
        if(file_exists(DIRREQ."/app/view/{$this->getDir()}/Header.php")){
            include (DIRREQ."/app/view/{$this->getDir()}/Header.php"); 
        }
    }
    /**
     * 
     */    
    public function addMain(){
        if(file_exists(DIRREQ."/app/view/{$this->getDir()}/Main.php")){
            include (DIRREQ."/app/view/{$this->getDir()}/Main.php"); 
        }
    }
    /**
     * 
     */    
    public function addFooter(){
        if(file_exists(DIRREQ."/app/view/{$this->getDir()}/Footer.php")){
            include (DIRREQ."/app/view/{$this->getDir()}/Footer.php"); 
        }
    }
    
}
