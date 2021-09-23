<?php
    include 'vendor/autoload.php';
    include 'custom_autoload.php';
    use app\controller\ReadBridge\Reader;

    Reader::read($argv[1]);
?>