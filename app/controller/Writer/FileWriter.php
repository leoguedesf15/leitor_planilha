<?php
namespace app\controller\Writer;
use app\connection\SqlFileConnection;
class FileWriter{
    private $file;
    private $outputDirectory = "app/output/output.sql";
    public function write($data){

        $fileCon = new SqlFileConnection($this->outputDirectory,'w');
        $stream = $fileCon->connect();
        $fileCon->write($data,$stream);
        $fileCon->closeConnection($stream);
    }
 
}
?>