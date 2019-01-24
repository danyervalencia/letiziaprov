<?php
require_once 'conexion.php';

class Logistics_Pedidos_Ettr extends Conexion {
    private $pedettr_id = 0;  private $pedettr_flga = '';  private $ped_id = 0;
    private $pedettr_nombre = '';  private $pedettr_finalidad = '';  private $pedettr_objetivo = '';  private $pedettr_condiciones = ''; private $lugentr_id = '';  private $pedettr_lugar = '';  private $pedettr_actividades = '';  private $pedettr_entregable = '';
    private $pedettr_persona = '';  private $pedettr_plazo = '';  private $tipplaz_id = 0; private $pedettr_plazo_nro = 0; private $pedettr_fechaini = ''; private $pedettr_fechafin = ''; private $pedettr_garantia = ''; private $pedettr_garantia_nro = ''; private $pedettr_forma_pago = '';
    private $pedettr_supervisa = ''; private $pedettr_penalidad = ''; private $pedettr_otros = ''; private $pedettr_file1 = ''; private $pedettr_file2 = '';  private $pedettr_key = '';

    private $ped_key = ''; private $fase_id = '0'; private $apr_observ = '';

    public function setPedettr_id( $val )           { $this->pedettr_id = $val; }
    public function getPedettr_id()                 { return $this->pedettr_id; }

    public function setPedettr_flga( $val )         { $this->pedettr_flga = $val; }
    public function getPedettr_flga()               { return $this->pedettr_flga; }

    public function setPed_id( $val )               { $this->ped_id = $val; }
    public function getPed_id()                     { return $this->ped_id; }

    public function setPedettr_nombre( $val )       { $this->pedettr_nombre = $val; }
    public function getPedettr_nombre()             { return $this->pedettr_nombre; }

    public function setPedettr_finalidad( $val )    { $this->pedettr_finalidad = $val; }
    public function getPedettr_finalidad()          { return $this->pedettr_finalidad; }

    public function setPedettr_objetivo( $val )     { $this->pedettr_objetivo = $val; }
    public function getPedettr_objetivo()           { return $this->pedettr_objetivo; }

    public function setPedettr_condiciones( $val )  { $this->pedettr_condiciones = $val; }
    public function getPedettr_condiciones()        { return $this->pedettr_condiciones; }

    public function setLugentr_id( $val )           { $this->lugentr_id = $val; }
    public function getLugentr_id()                 { return $this->lugentr_id; }

    public function setPedettr_lugar( $val )        { $this->pedettr_lugar = $val; }
    public function getPedettr_lugar()              { return $this->pedettr_lugar; }

    public function setPedettr_actividades( $val )  { $this->pedettr_actividades = $val; }
    public function getPedettr_actividades()        { return $this->pedettr_actividades; }

    public function setPedettr_entregable( $val )   { $this->pedettr_entregable = $val; }
    public function getPedettr_entregable()         { return $this->pedettr_entregable; }

    public function setPedettr_persona( $val )      { $this->pedettr_persona = $val; }
    public function getPedettr_persona()            { return $this->pedettr_persona; }

    public function setPedettr_plazo( $val )        { $this->pedettr_plazo = $val; }
    public function getPedettr_plazo()              { return $this->pedettr_plazo; }

    public function setTipplaz_id( $val )           { $this->tipplaz_id = $val; }
    public function getTipplaz_id()                 { return $this->tipplaz_id; }

    public function setPedettr_plazo_nro( $val )    { $this->pedettr_plazo_nro = $val; }
    public function getPedettr_plazo_nro()          { return $this->pedettr_plazo_nro; }

    public function setPedettr_fechaini( $val )     { $this->pedettr_fechaini = $val; }
    public function getPedettr_fechaini()           { return $this->pedettr_fechaini; }

    public function setPedettr_fechafin( $val )     { $this->pedettr_fechafin = $val; }
    public function getPedettr_fechafin()           { return $this->pedettr_fechafin; }

    public function setPedettr_garantia( $val )     { $this->pedettr_garantia = $val; }
    public function getPedettr_garantia()           { return $this->pedettr_garantia; }

    public function setPedettr_garantia_nro( $val ) { $this->pedettr_garantia_nro = $val; }
    public function getPedettr_garantia_nro()       { return $this->pedettr_garantia_nro; }

    public function setPedettr_forma_pago( $val )   { $this->pedettr_forma_pago = $val; }
    public function getPedettr_forma_pago()         { return $this->pedettr_forma_pago; }

    public function setPedettr_supervisa( $val )    { $this->pedettr_supervisa = $val; }
    public function getPedettr_supervisa()          { return $this->pedettr_supervisa; }

    public function setPedettr_penalidad( $val )    { $this->pedettr_penalidad = $val; }
    public function getPedettr_penalidad()          { return $this->pedettr_penalidad; }

    public function setPedettr_otros( $val )        { $this->pedettr_otros = $val; }
    public function getPedettr_otros()              { return $this->pedettr_otros; }

    public function setPedettr_file1( $val )        { $this->pedettr_file1 = $val; }
    public function getPedettr_file1()              { return $this->pedettr_file1; }

    public function setPedettr_file2( $val )        { $this->pedettr_file2 = $val; }
    public function getPedettr_file2()              { return $this->pedettr_file2; }

    public function setPedettr_key( $val )          { $this->pedettr_key = $val; }
    public function getPedettr_key()                { return $this->pedettr_key; }

    public function setPed_key( $val ) { $this->ped_key = $val; }
    public function getPed_key() { return $this->ped_key; }

    public function setFase_id( $val ) { $this->fase_id = $val; }
    public function getFase_id() { return $this->fase_id; }

    public function setApr_observ( $val ) { $this->apr_observ = $val; }
    public function getApr_observ() { return $this->apr_observ; }    

    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */  
    public function actualiza() {
        $this->sql  = "SELECT logistics.pedidos_ettr_update('$this->type_edit', '$this->pedettr_id', '$this->pedettr_key',  '$this->ped_key',
                        '$this->pedettr_nombre', '$this->pedettr_finalidad', '$this->pedettr_objetivo', '$this->pedettr_condiciones', $this->lugentr_id, '$this->pedettr_lugar', '$this->pedettr_actividades', '$this->pedettr_entregable',
                        '$this->pedettr_persona', '$this->pedettr_plazo', $this->tipplaz_id, $this->pedettr_plazo_nro, $this->pedettr_fechaini, $this->pedettr_fechafin, '$this->pedettr_garantia', $this->pedettr_garantia_nro, '$this->pedettr_forma_pago',
                        '$this->pedettr_supervisa', '$this->pedettr_penalidad', '$this->pedettr_otros', '$this->pedettr_file1', '$this->pedettr_file2', 
                        '$this->usursess_key', '$this->fase_id', '$this->apr_observ')";
        //echo $this->sql;
        $this->pedettr_key = parent::execute_01();
    }

    public function registros() {
        $this->sql  = "SELECT logistics.pedidos_ettr_records('o', '$this->pedettr_id', '$this->pedettr_key',
                            '$this->ped_id', '$this->ped_key', '$this->usursess_key', '$this->menu_id',
                            '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                       FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>