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
    /**
     * pega todos os campos da tabela viveiro
     */
    public function getAllData($table) {
        $stmt = "SELECT * FROM {$table}";
        $data = $this->conexaoDB()->prepare($stmt);
        $data->execute();
        $result=$data->fetchAll(\PDO::FETCH_ASSOC);
        $fetch=array();
        
        foreach($result as $key => $value){
            foreach ($value as $k => $v){
                $fetch[$key][$k]= utf8_encode($v);
            }
        }
        return $fetch;
    }
}
