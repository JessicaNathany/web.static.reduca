<?php
namespace App\Model;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ClassCrud extends ClassConexao{
    
    /**
     * 
     */
    private $crud;
    
    /**
     * 
     */
    private function prepareExecute($prep, $exec){
        $this->crud= $this->conexaoDB()->prepare($prep);
        $this->crud->execute($exec); 
    }
    
    /**
     * 
     * 
     */
    public function selectDB($fields, $table, $where, $exec){
        $this->prepareExecute("select {$fields} from {$table} {$where}", $exec);
        return $this->crud;
    }
    /**
     * 
     * 
     */
    public function likeDB($fields, $table, $where,$like, $exec){
        $this->prepareExecute("select {$fields} from {$table} {$where} like %{$like}%", $exec);
        return $this->crud;
    }
    /**
     * 
     * 
     */
    public function insertDB($table, $values, $exec){
        $this->prepareExecute("insert into {$table} values ({$values})", $exec);
        return $this->crud;
    }
    /**
     * 
     * 
     */
    public function deleteDB($table, $values, $exec){
        $this->prepareExecute("delete from {$table} where {$values}", $exec);
        return $this->crud;
    }
    /**
     * 
     * 
     */
    public function updateDB($table, $values, $where, $exec){
        $this->prepareExecute("update {$table} set {$values} where {$where}", $exec);
        return $this->crud;
    }
}
