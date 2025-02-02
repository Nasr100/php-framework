<?php 
namespace config;

use ArrayObject;
use config\DB;
use PDOException;
use PDO;
class Builder{
    
    private $table;
    private $columns = [];
    private $conditions ;
    private $sqlQuery = "";
    private $result;
    public function __construct($table){
        $this->conditions = new ArrayObject(array());
        $this->table = $table;
    }

    public function where($column,$value,$eq = "="){
        if(count($this->conditions) > 0){
            $this->conditions->append( ["AND",$column,$eq,$value]);
        }else{
            $this->conditions->append( [$column,$eq,$value]);
        }
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
        echo $finalQuery;
        try{
            $statement = DB::getConx()->prepare($finalQuery);
            $statement->execute();
            $this->result =   $statement->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            $e->getMessage();
        }
        return $this->result;
    }
}

?>