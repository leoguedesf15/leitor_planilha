<?php
namespace app\controller\QueryBuilder;
class QueryBuilder{
    private $query;    
    function __construct(){
        $this->query = "";       
    }
    public function build(){
        return $this->query;
    }

    public function insert($attributes, $obj,$table_name){
      
        $keys = array();
        foreach($attributes as $attribute){
            array_push($keys,$attribute['key']);
        }

        $this->query .= " INSERT INTO ".$table_name." VALUES ('";
        foreach($keys as $key){
            if(isset($obj[$key])){
                $this->query .=$obj[$key]."','";
            }else{
                $this->query .="','";
            }
        }
        $this->query=substr($this->query,0,-2);
        $this->query .= ")\n";
        return $this;
    }
    public function createTable($attributes,$table_name){
        $this->query.= " CREATE TABLE ".$table_name."(\n";
        foreach ($attributes as $attribute){
            $this->query.=" ".$attribute["key"]." ".$attribute["type"].", ";
        }
        //removo a última vírgula
        $this->query=substr($this->query,0,-2);
        $this->query .="\n)\n";
        return $this;
    }
    public function genericCommand($command){
        $this->query.= " ".$command."\n";
        return $this;
    }
    public function use($db){
        $this->query.=" USE ".$db."\n";
        return $this;
    }

}
?>