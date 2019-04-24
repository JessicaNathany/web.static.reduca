<?php
namespace Src\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Src\Interfaces\InterfaceDatabasePaginatorAdapter as DatabasePaginatorAdapter;
use PDO;
/**
 * Description of ClassPdoDatabasePaginatorAdapter
 *
 * @author wsantos
 */
class ClassPdoDatabasePaginatorAdapter implements DatabasePaginatorAdapter{
    //put your code here
    private $params;
    private $stmt;
    private $countStmt;
    /**
     * 
     */
    function __construct(PDO $dbh, $query, array $params = array()) {
        $this->params = $params;
        $this->stmt = $dbh->prepare($query . ' LIMIT :PAGINATOR_LIMIT OFFSET :PAGINATOR_OFFSET');
        $this->countStmt = $dbh->prepare(preg_replace('/^SELECT.*FROM\s*(.*)$/im', 'SELECT COUNT(*) AS DB_PAGINATOR_ADAPTER_TOTAL_REGS FROM $1', $query));
        
    }

    public function count(): int {
        if($this->countStmt->execute($this->params)){
            return $this->countStmt->fetchColumn(0);
        }
        return 0;
    }

    public function getData($offset, $limit) {
        $params = array_merge(
                $this->params,
                array(
                    ':PAGINATOR_LIMIT'=>$limit,
                    ':PAGINATOR_OFFSET'=>$offset,
                )
            );
        if($this->stmt->execute($params)){
            return $stmt->fetchAll();
        }
        return array();
    }

}
