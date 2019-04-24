<?php
namespace Src\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Src\Interfaces\InterfacePaginator as Paginator;
use Src\Classes\ClassPaginationInfo as PaginationInfo;
use Src\Interfaces\InterfaceDatabasePaginatorAdapter;

/**
 * Description of ClassDatabasePaginator
 *
 * @author wsantos
 */
class ClassDatabasePaginator implements Paginator{
    //put your code here
    private $dbAdapter;
    private $totalPages;
    private $currentPage;
    
    function __construct(InterfaceDatabasePaginatorAdapter $dbAdapter) {
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * 
     * @param type $number
     * @param type $regsPerPage
     */
    public function getPage($number, $regsPerPage = 10) {
        $totalRegs = $this->dbAdapter->count();
        if($totalRegs === 0){
            echo('There is no data retrieve');
        }
        $totalPages = ceil($totalRegs / $regsPerPage);
        $offset = ($number - 1) * $regsPerPage;
        
        $data = $this->dbAdapter->getData($offset, $number);
        if(count($data)===0){
            echo("Page {$number} does not exist");
        }
        return new PaginationInfo($data, $number,$totalPages);
    }

}
