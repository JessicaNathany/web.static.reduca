<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Src\Interfaces;

/**
 *
 * @author wsantos
 */
interface InterfaceInfoPagination extends \IteratorAggregate, \Countable{
    //put your code here
    public function getTotalPages();
    public function getCurrentPage();
}
