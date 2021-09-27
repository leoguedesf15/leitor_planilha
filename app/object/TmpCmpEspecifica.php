<?php
namespace app\object;
use app\object\TableRow;
use JsonSerializable;

class TmpCmpEspecifica extends TableRow implements JsonSerializable{
    private $IdCompetenciaAreaBncc;

    public function setIdCompetencia($id){
        $this->IdCompetenciaAreaBncc = $id;
    }
    public function getIdCompetenciaAreaBncc(){
        return $this->IdCompetenciaAreaBncc;
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