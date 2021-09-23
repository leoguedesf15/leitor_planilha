<?php 
namespace app\connection;

use Exception;

class SqlFileConnection extends FileConnection{
    private $readWritableParam;
    function __construct($path,$readWritableParam){
        $this->readWritableParam = $readWritableParam;
        parent::__construct($path,".sql");
    }
    public function read(){
        return ;
    }
    public function write($line){
        
        return ;
    }
    public function create(){
        return ; 
    }
    public function connect(){
       return fopen($this->path,$this->readWritableParam);
    }
}
?>