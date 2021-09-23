<?php
namespace app\object;
use app\object\TableRow;
class TmpCmpEspecifica extends TableRow{
    private $IdCompetenciaAreaBncc;

    public function setIdCompetencia($id){
        $this->IdCompetenciaAreaBncc = $id;
    }
}
?>