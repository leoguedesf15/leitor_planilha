<?php
namespace app\controller\ReadBridge;
class ReadUtil{
    public static function valorValido($value){
        return (isset($value) && $value != "" && $value != "NULL");
    }
}

?>