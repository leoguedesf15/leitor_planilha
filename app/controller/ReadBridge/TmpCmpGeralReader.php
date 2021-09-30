<?php
namespace app\controller\ReadBridge;
use app\controller\ReadBridge\Reader;
use app\object\TmpCmpGeral;

class TmpCmpGeralReader extends Reader{
    private $dePara =[
        "1"=>"8A808A827A746701017A7CF8C1851AEA",	
        "2"=>"8A808A827A746701017A7CF919B71D82",	
        "3"=>"8A808A827A746701017A7CF97B5A1FEF",	
        "4"=>"8A808A827A746701017A7CF9C9C82215",	
        "5"=>"8A808A827A746701017A7CFA00A72451",	
        "6"=>"8A808A827A746701017A7CFC9B522C26",	
        "7"=>"8A808A827A746701017A7CFCF0242E58",	
        "8"=>"8A808A827A746701017A7CFD4077308F",	
        "9"=>"8A808A827A746701017A7CFDAB27330D",	
        "10"=>"8A808A827A746701017A7CFE54583816"	
    ];
    function __construct(){
        $this->fileColumnIndex="D";
        $this->strategy=new SubtemaTemaStrategy();
    }
    public function getData($row){         
        $valor = $row[$this->fileColumnIndex];    
        if(ReadUtil::valorValido($valor)){
            $splitItems = $this->hookSplitItems($valor);
            foreach($splitItems as $item){
                $obj = new TmpCmpGeral();
                $obj = $this->strategy->read($row,$obj);
                $obj->setIdCompetencia($this->dePara[$item]);                
                array_push(Reader::$listaCompGeral,$obj);
            }
        } 
    }
}
?>