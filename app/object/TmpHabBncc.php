<?php
namespace app\object;
use app\object\TableRow;
class TmpHabBncc extends TableRow{
    private $IdHabilidadeBncc;
    
    public function setIdHabilidadeBncc($id){
        $this->IdHabilidadeBncc = $id;
    }
}
?>