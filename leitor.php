<?php
    include 'vendor/autoload.php';
    include 'custom_autoload.php';
    use app\controller\ReadBridge\Reader;
    use app\controller\QueryBuilder\QueryController;
use app\controller\Writer\FileWriter;

$data = Reader::read($argv[1]);
    $controller = new QueryController($data["compEspecifica"],$data["compGeral"],$data["habBncc"]);    
    $query  = $controller->mount();
    $writer = new FileWriter();
    var_dump($query);
    $query = str_replace("''","NULL",$query);
    $writer->write($query);
?>