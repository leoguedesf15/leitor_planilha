<?php
namespace app\connection;

abstract class FileConnection{
    protected $path;
    protected $extension;    
    function __construct($path,$extension){
        $this->path=$path;
        $this->extension = $extension;    
    }

    public abstract function read();
    public abstract function connect();
    public abstract function write($data,$stream);
    public abstract function create();
    public abstract function closeConnection($stream);
}
?>
