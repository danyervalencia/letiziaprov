<?php
require_once "conexion.php";

class Public_Areas extends Conexion {
    private $area_flga = '';  private $sucur_id = 'NULL';  private $area_parent = 'NULL';  private $area_nombre = '';  private $area_abrev = '';  private $area_siglas = '';
    private $tiparea_id = 'NULL';  private $niv_id = 'NULL';  private $area_fechaini = '';  private $area_fechafin = '';  private $area_observ    = '';  private $area_estado = 'NULL';

    private $parent_key = '';

    public function setArea_flga( $val )      { $this->area_flga = $val; }
    public function getArea_flga()            { return $this->area_flga; }
    
    public function setSucur_id( $val )       { $this->sucur_id = $val; }
    public function getSucur_id()             { return $this->sucur_id; }

    public function setArea_parent( $val )    { $this->area_parent = $val; }
    public function getArea_parent()          { return $this->area_parent; }

    public function setArea_nombre( $val )    { $this->area_nombre = $val; }
    public function getArea_nombre()          { return $this->area_nombre; }
 
    public function setArea_abrev( $val )     { $this->area_abrev = $val; }
    public function getArea_abrev()           { return $this->area_abrev; }

    public function setArea_siglas( $val )    { $this->area_siglas = $val; }
    public function getArea_siglas()          { return $this->area_siglas; }

    public function setTiparea_id( $val )     { $this->tiparea_id = $val; }
    public function getTiparea_id()           { return $this->tiparea_id; }

    public function setArea_fechaini( $val )  { $this->area_fechaini = $val; }
    public function getArea_fechaini()        { return $this->area_fechaini; }

    public function setArea_fechafin( $val )  { $this->area_fechafin = $val; }
    public function getArea_fechafin()        { return $this->area_fechafin; }
 
    public function setArea_observ( $val )    { $this->area_observ = $val; }
    public function getArea_observ()          { return $this->area_observ; }

    public function setArea_estado( $val )    { $this->area_estado = $val; }
    public function getArea_estado()          { return $this->area_estado; }

    public function setParent_key( $val ) { $this->parent_key = $val; }
    public function getParent_key() { return $this->parent_key; }

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function actualiza() {
    	$this->area_fechaini = ( $this->area_fechaini == "" ? 'NULL' : "'" . $this->area_fechaini . "'" );
        $this->area_fechafin = ( $this->area_fechafin == "" ? 'NULL' : "'" . $this->area_fechafin . "'" );
        $this->sql = "SELECT areas_update(
                        '$this->type_edit', '$this->area_id', '$this->area_key', '$this->parent_key', '$this->area_nombre', '$this->area_abrev', '$this->area_siglas',
                         $this->area_fechaini, $this->area_fechafin, '$this->area_observ', $this->area_estado, '$this->usursess_key')";
        //echo $this->sql;
        $this->area_key = parent::execute_01();
    }

    public function registros() {
        $this->sql = "SELECT public.areas_records('o', 
                          '$this->area_id', '$this->area_key', $this->unieje_id, $this->area_parent, '$this->area_nombre', '$this->area_abrev',
                           $this->tiparea_id, $this->area_estado,  '$this->unieje_key', '$this->usuracce_key', '$this->menu_id',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                          FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }

    public function reporte_stock() {
        $this->sql  = "SELECT siace.areacenes_report_stock('o', 
                            '$this->area_id', '$this->area_key', '0', '$this->pers_id', '$this->pers_key',
                             $this->bs_id , '$this->bs_key', $this->bst_id, $this->bsg_id,  $this->bsc_id, $this->bsf_id,
                            '$this->bs_nombre', '$this->nand_id',   '$this->nand_key', '$this->fechaini', '$this->fechafin',
                            '$this->type_report', '$this->order_by', '$this->record_limit', '$this->record_start');
                       FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }

}
?>