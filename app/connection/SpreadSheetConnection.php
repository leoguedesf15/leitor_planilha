<?php
namespace app\connection;
use PhpOffice\PhpSpreadsheet\IOFactory;
use app\connection\FileConnection;
class SpreadSheetConnection extends FileConnection{

    function __construct($path){
        parent::__construct($path,'xlsx');
    }

    public function read(){                    
        $spreadsheet = $this->connect();
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        return $sheetData;    
    }
    public function write($data,$stream){
        //
        return ;
    }
    public function create(){
        return ;
    }
    public function connect(){
        return IOFactory::load($this->path);   
    }
    public function closeConnection($stream){
        // a lib já fecha a conexão automaticamente
        return ;
    }
}
?>