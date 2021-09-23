<?php
namespace app\controller\ReadBridge;
use app\object\TableRow;
interface ReadStrategy{
    function read($fileRow, TableRow $obj);
}
?>