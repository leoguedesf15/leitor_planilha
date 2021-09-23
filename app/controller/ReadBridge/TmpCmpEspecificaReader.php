<?php
namespace app\controller\ReadBridge;
use app\object\TmpCmpEspecifica;
use app\controller\ReadBridge\Reader;
use app\controller\ReadBridge\ReadStrategy;
use app\controller\ReadBridge\ReadUtil;
class TmpCmpEspecificaReader extends Reader{
    
    function __construct(){
        $this->fileColumnIndex="E";
        $this->strategy=new SubtemaTemaStrategy();
    }
    public function getData($row){
        $valor = $row[$this->fileColumnIndex];    
        if(ReadUtil::valorValido($valor)){
            $splitItems = $this->hookSplitItems($valor);
            foreach($splitItems as $item){
                $obj = new TmpCmpEspecifica();
                $obj = $this->strategy->read($row,$obj);
                $obj->setIdCompetencia($item);                
                array_push(Reader::$listaCompEspecifica,$obj);
            }
        }     
    }
}
?>