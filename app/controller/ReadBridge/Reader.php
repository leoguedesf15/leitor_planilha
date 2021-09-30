<?php
namespace app\controller\ReadBridge;

use app\connection\SpreadSheetConnection;
use app\controller\ReadBridge\TmpHabBnccReader;
use app\controller\ReadBridge\TmpCmpGeralReader;
abstract class Reader{
    private $valueSeparator=";";
    protected static $listaCompEspecifica = array();
    protected static $listaCompGeral = array();
    protected static $listaHabBncc = array();
    protected $fileColumnIndex;
    protected ReadStrategy $strategy;
    public static function read($filePath){        
        $fileConnecion = new SpreadSheetConnection($filePath);
        $data = $fileConnecion->read();
        $readerHabBncc = new TmpHabBnccReader();
        $readerCmpGeral = new TmpCmpGeralReader();
        $readerCmpEspecifica = new TmpCmpEspecificaReader();              
        
        foreach($data as $row){
            $readerHabBncc->getData($row);
            $readerCmpGeral->getData($row);
            $readerCmpEspecifica->getData($row);             
        }

       
        return [
            "compEspecifica"=> Reader::$listaCompEspecifica,
            "compGeral"=> Reader::$listaCompGeral,
            "habBncc"=> Reader::$listaHabBncc
        ];    
    }
   
    protected function hookSplitItems($items){
        $splitItems = explode($this->valueSeparator,$items);
        return $splitItems;        
    }
    public abstract function getData($row);
}
?>