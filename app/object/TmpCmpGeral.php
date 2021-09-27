<?php
namespace app\object;
use app\object\TableRow;
use JsonSerializable;

class TmpCmpGeral extends TableRow implements JsonSerializable{
    private $IdCompetenciaGeral;
    
    public function setIdCompetencia($id){
        $this->IdCompetenciaGeral = $id;
    }
    function getClassVars()
    {  $arrayImplode = implode(",",parent::getClassVars());        
        $thisImplode = implode(",",array_keys(get_class_vars(get_class($this))));        
        $array = explode(",",$arrayImplode.",".$thisImplode);                 
        return $array;
    }

    function jsonSerialize(){
        $retorno = array_merge(parent::jsonSerialize(),get_object_vars($this));
        return $retorno;        
    }

}
?>