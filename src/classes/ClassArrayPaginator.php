<?php
namespace Src\Interfaces;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Src\Interfaces\InterfacePaginator as Paginator;
use Src\Classes\ClassPaginationInfo as PaginatorInfo;
/**
 * Description of ClassArrayPaginator
 *
 * @author wsantos
 */
class ClassArrayPaginator implements Paginator{
    //put your code here
    private $data;
    private $count;
    
    function __construct($data, $count) {
        $this->data = $data;
        $this->count = count($data);
    }

    
    public function getPage($number, $regsPerPage) {
        if($this->count === 0){
            throw new \EmptyIterator("There is no data to retrieve");
        }
        $totalPages = ceil($this->count / $regsPerPage);
        $offset = ($number - 1)* $regsPerPage;
        
        return new PaginatorInfo(array_slice($this->data, $offset, $number), $number, $totalPages);
    }

}
