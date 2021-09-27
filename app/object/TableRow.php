<?php
namespace app\object;
class TableRow{
    private $IdTema;
    private $IdSubTema;

    public function setIdTema($id){
        $this->IdTema=$id;        
    }
    public function setIdSubTema($id){
        $this->IdSubTema=$id;
    }
    function getClassVars()
    {
        return array_keys(get_class_vars(get_class($this)));
    }
    function jsonSerialize(){
        return get_object_vars($this);
    }
}
?>