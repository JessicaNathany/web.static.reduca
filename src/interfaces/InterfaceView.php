<?php
namespace Src\Interfaces;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface InterfaceView{
   public function  setDir($Dir);
   public function  setTitle($Title);
   public function  setDescription($Description);
   public function  setKeywords($Keywords);
   public function  renderlayout();
   
}