<?php
namespace app\controller\ReadBridge;
use app\controller\ReadBridge\ReadStrategy;
use app\object\TableRow;

class SubtemaTemaStrategy implements ReadStrategy{
    private $indexes=[
        "tema"=>"A",
        "subtema"=>"B"
    ];
    function read($fileRow, TableRow $obj){
        var_dump($obj);
        $valorSubtema = $fileRow[$this->indexes["subtema"]];
        if(ReadUtil::valorValido($valorSubtema)){
            $obj->setIdSubTema($valorSubtema);
        }else{
            $valorTema = $fileRow[$this->indexes["tema"]];
            $obj->setIdTema($valorTema);
        }
        return $obj;
    }
    
}
?>