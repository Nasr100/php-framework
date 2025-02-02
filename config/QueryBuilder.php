<?php 
namespace config;

use config\Builder;
class QueryBuilder{
    static function table($table){
        return new Builder($table);
    }
}

?>