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
}
?>