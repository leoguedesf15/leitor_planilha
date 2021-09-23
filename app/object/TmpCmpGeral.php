<?php
namespace app\object;
use app\object\TableRow;
class TmpCmpGeral extends TableRow{
    private $IdCompetenciaGeral;
    
    public function setIdCompetencia($id){
        $this->IdCompetenciaGeral = $id;
    }
}
?>