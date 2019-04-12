<?php
namespace App;
/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 */
use Src\Classes\ClassRoutes;

/**
 * Classe despachante, responsavel pelo envio das requisições em seus determinado controllers
 * 
 */
class Dispatch extends ClassRoutes {
    
    private $Method;
    private $Param=[];
    private $Obj;
    
    
  
  /**
   * Metodo construtor da class Dispatch
   */     
  public function __construct() {
      self::addController();
  }
  /**
   * Getters And Setters
   * @return type
   */
  protected function getMethod() {
      return $this->Method;
  }

  function setMethod($Method) {
      $this->Method = $Method;
  }
  
  function getParam() {
      return $this->Param;
  }

  function setParam($Param) {
      $this->Param = $Param;
  }

  
    /**
   * Metodo que adiciona um controler na rota
   * @Controller $name
   */
  public function addController(){
      $RotaController= $this->getRota();
      $NameS="App\\Controller\\{$RotaController}";
      $this->Obj=new $NameS;
      
      if(isset($this->parseUrl()[1])){
          self::addMethod();
      }
  }
  /**
   * Metodo que adiciona um metodo na rota
   * @method $name
   * caso aconteça de dar erro na linha 69 na função call_user_func()
   * trocar para call_user_func_array();
   */
  public function addMethod(){
      if(method_exists($this->Obj, $this->parseUrl()[1])){
        $this->setMethod("{$this->parseUrl()[1]}");
        self::addParam();
        call_user_func_array([$this->Obj,$this->getMethod()],$this->getParam());
    }        
  }
  /**
   * metodo que adiciona um parametro na rota
   * @param type $name Description
   * 
   */
  public function addParam(){
      $ContArray=count($this->parseUrl());
      
      if($ContArray > 2){
          foreach ($this->parseUrl() as $Key => $Value){
             if($Key > 1){
                 $this->setParam($this->Param += [$Key => $Value]);
             }
          }
      }
  }
}
