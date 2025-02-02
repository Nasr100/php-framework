<?php 
namespace config;

use ArrayObject;
use config\DB;
use PDOException;
use PDO;
class Builder{
    
    private $table;
    private $columns = [];
    private $conditions =[];
    private $sqlQuery ;
    private $values = [];
    private $result;
    public function __construct($table){
        $this->sqlQuery = "";
        $this->table = $table;
    }

    public function where($column,$value,$eq = "="){
        if(count($this->conditions) > 0){
            array_push( $this->conditions,["AND",$column,$eq,'?']);
        }else{
            array_push( $this->conditions,[$column,$eq,'?']);
        }
        array_push($this->values,$value);
        return $this;
    }
    public function get(){
        $columns="";
        if(count($this->columns) <= 0){
            $columns = "*";
        }else{
            $columns = implode(",",$this->columns);
        }
        if(count($this->conditions)>0){
            $this->sqlQuery = " WHERE";
            foreach($this->conditions as $condition){
                $this->sqlQuery .=" ".implode(' ',$condition);
            }
        }
        $finalQuery = "SELECT $columns from $this->table".$this->sqlQuery;
        try{
            $statement = DB::getConx()->prepare($finalQuery);
            $statement->execute($this->values);
            $this->result =   $statement->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $this->result;
    }

}

?>