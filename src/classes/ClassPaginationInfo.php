<?php
namespace Src\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Src\Interfaces\InterfaceInfoPagination as InfoPagination;
/**
 * Description of ClassPaginationInfo
 *
 * @author wsantos
 */
class ClassPaginationInfo implements InfoPagination{
    //put your code here
    private $data;
    private $currentPage;
    private $totalPages;
    private $count;
    
    /**
     * 
     */
    function __construct(array $data, $currentPage, $totalPages) {
        $this->data = $data;
        $this->currentPage = $currentPage;
        $this->totalPages = $totalPages;
        $this->count = count($data);
    }
    /**
     * 
     */
    
    public function count(): int {
        return $this->count;
    }

    public function getCurrentPage() {
        return $this->currentPage;
    }

    public function getIterator(): \Traversable {
        return new \ArrayIterator($this->data);
    }

    public function getTotalPages() {
        return $this->totalPages;
    }

}
