<?php
namespace app\controller\ReadBridge;
use app\controller\ReadBridge\Reader;
use app\object\TmpHabBncc;
class TmpHabBnccReader extends Reader{
    
    function __construct(){
        $this->fileColumnIndex="C";
        $this->strategy=new SubtemaTemaStrategy();
    }
    public function getData($row){         
        $valor = $row[$this->fileColumnIndex];    
        if(ReadUtil::valorValido($valor)){
            $splitItems = $this->hookSplitItems($valor);
            foreach($splitItems as $item){
                $obj = new TmpHabBncc();
                $obj = $this->strategy->read($row,$obj);
                $obj->setCodHabilidadeBncc($item);                
                array_push(Reader::$listaHabBncc,$obj);
            }
        } 
    }
}
?>