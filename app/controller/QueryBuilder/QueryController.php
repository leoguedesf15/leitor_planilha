<?php
namespace app\controller\QueryBuilder;

use app\controller\ReadBridge\TmpCmpEspecificaReader;
use app\object\TmpCmpEspecifica;
use app\object\TmpCmpGeral;
use app\object\TmpHabBncc;

class QueryController{
    
    private TmpCmpEspecifica $tmpCmpEspec;
    private TmpCmpGeral $tmpCmpGeral;
    private TmpHabBncc $tmpHabBncc;
    public QueryBuilder $queryBuilder;
    private $listaCmpGeral,$listaCmpEspec,$listaHabBncc;
    function __construct($listaCmpEspec,$listaCmpGeral,$listaHabBncc){  
        $this->tmpCmpEspec = new TmpCmpEspecifica();
        $this->tmpCmpGeral = new TmpCmpGeral();
        $this->tmpHabBncc = new TmpHabBncc();          
        $this->queryBuilder=new QueryBuilder();
        $this->listaCmpGeral=$listaCmpGeral;
        $this->listaCmpEspec=$listaCmpEspec;
        $this->listaHabBncc=$listaHabBncc;                       
    }
   
    function initializeQuery(){
        $this->queryBuilder
                        ->use("ModernaPortal")
                        ->genericCommand("GO")                        
                        ->genericCommand("SET XACT_ABORT ON")
                        ->genericCommand("GO");                
        return $this->queryBuilder;
    }
    function mount(){
        $attrEspecs = $this->setAttributes($this->tmpCmpEspec->getClassVars());
        $attrGeral = $this->setAttributes($this->tmpCmpGeral->getClassVars());
        $attrHabBncc = $this->setAttributes($this->tmpHabBncc->getClassVars());    
        $this->initializeQuery()->genericCommand("BEGIN TRAN")
                                ->genericCommand("GO")
                                ->createTable($attrEspecs,"#tmpTemaSubtemaCmpAreaBNCC")
                                ->createTable($attrGeral,"#tmpTemaSubtemaCmpGeral")
                                ->createTable($attrHabBncc,"#tmpTemaSubtemaHabBncc");
                                foreach($this->listaCmpGeral as $item){                                    
                                    $this->queryBuilder->insert($attrGeral,$item->jsonSerialize(),"#tmpTemaSubtemaCmpGeral");
                                }
                                foreach($this->listaCmpEspec as $item){
                                    $this->queryBuilder->insert($attrEspecs,$item->jsonSerialize(),"#tmpTemaSubtemaCmpAreaBNCC");
                                }  
                                foreach($this->listaHabBncc as $item){
                                    $this->queryBuilder->insert($attrHabBncc,$item->jsonSerialize(),"#tmpTemaSubtemaHabBncc");
                                }
                                 $this->queryBuilder->genericCommand("COMMIT TRAN");                                                               
        return $this->queryBuilder->build();                                                        
    }

    private function setAttributes($attr){
        //COMO É SÓ TROCA DE IDS CONSIGO SALVAR TODOS COMO CHAR 32 E USAR UMA LÓGICA DINÂMICA
        $attributes=array();
        foreach($attr as $a){
            array_push($attributes,['key'=>$a, 'type'=>'CHAR(32)']);    
        }
        return $attributes;
    }
    

}
?>
