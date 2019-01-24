<?php
require_once 'conexion.php';

class Logistics_Pedidos_Fases extends Conexion {
    private $pedfase_id = 0;  private $pedfase_key = '';  private $pedfase_flga = '';  private $ped_id = 0;
    private $rec_fase_id = 0;  private $rec_fecha = '';  private $rec_hora = '';  private $rec_usuracce_id = 0;  private $rec_area_id = 0;  private $rec_observ = '';
    private $apr_fase_id = 0;  private $apr_fecha = '';  private $apr_hora = '';  private $apr_usuracce_id = 0;  private $apr_usursess_id = 0;  private $apr_area_id = 0;  private $apr_observ = '';
    private $env_fase_id = 0;  private $env_fecha = '';  private $env_hora = '';  private $env_usuracce_id = 0;  private $env_area_id = 0;  private $env_observ = '';  private $env_rec = 0;

    private $ped_key = '';  private $doc_id = 0;  private $ped_certificado = 'NULL';  private $ped_observ = '';  private $pedweb_estado = 'NULL';  private $pedweb_dias = 0;
    private $faseacce_key = '';  private $fase_type = '';  private $env_usuracce_key = '';

    public function setPedfase_id( $val )      { $this->pedfase_id = $val; }
    public function getPedfase_id()            { return $this->pedfase_id; }

    public function setPedfase_flga( $val )    { $this->pedfase_flga = $val; }
    public function getPedfase_flga()          { return $this->pedfase_flga; }

    public function setPed_id( $val )          { $this->ped_id = $val; }
    public function getPed_id()                { return $this->ped_id; }

    public function setRec_fase_id( $val )     { $this->rec_fase_id = $val; }
    public function getRec_fase_id()           { return $this->rec_fase_id; }

    public function setRec_fecha( $val )       { $this->rec_fecha = $val; }
    public function getRec_fecha()             { return $this->rec_fecha; }

    public function setRec_hora( $val )        { $this->rec_hora = $val; }
    public function getRec_hora()              { return $this->rec_hora; }

    public function setRec_usuracce_id( $val ) { $this->rec_usuracce_id = $val; }
    public function getRec_usuracce_id()       { return $this->rec_usuracce_id; }

    public function setRec_area_id( $val )     { $this->rec_area_id = $val; }
    public function getRec_area_id()           { return $this->rec_area_id; }

    public function setRec_observ( $val )      { $this->rec_observ = $val; }
    public function getRec_observ()            { return $this->rec_observ; }

    public function setApr_fase_id( $val )     { $this->apr_fase_id = $val; }
    public function getApr_fase_id()           { return $this->apr_fase_id; }

    public function setApr_fecha( $val )       { $this->apr_fecha = $val; }
    public function getApr_fecha()             { return $this->apr_fecha; }

    public function setApr_hora( $val )        { $this->apr_hora = $val; }
    public function getApr_hora()              { return $this->apr_hora; }

    public function setApr_usuracce_id( $val ) { $this->apr_usuracce_id = $val; }
    public function getApr_usuracce_id()       { return $this->apr_usuracce_id; }

    public function setApr_usursess_id( $val ) { $this->apr_usursess_id = $val; }
    public function getApr_usursess_id()       { return $this->apr_usursess_id; }

    public function setApr_area_id( $val )     { $this->apr_area_id = $val; }
    public function getApr_area_id()           { return $this->apr_area_id; }

    public function setApr_observ( $val )      { $this->apr_observ = $val; }
    public function getApr_observ()            { return $this->apr_observ; }

    public function setEnv_fase_id( $val )     { $this->env_fase_id = $val; }
    public function getEnv_fase_id()           { return $this->env_fase_id; }

    public function setEnv_fecha( $val )       { $this->env_fecha = $val; }
    public function getEnv_fecha()             { return $this->env_fecha; }

    public function setEnv_hora( $val )        { $this->env_hora = $val; }
    public function getEnv_hora()              { return $this->env_hora; }

    public function setEnv_usuracce_id( $val ) { $this->env_usuracce_id = $val; }
    public function getEnv_usuracce_id()       { return $this->env_usuracce_id; }

    public function setEnv_area_id( $val )     { $this->env_area_id = $val; }
    public function getEnv_area_id()           { return $this->env_area_id; }

    public function setEnv_observ( $val )      { $this->env_observ = $val; }
    public function getEnv_observ()            { return $this->env_observ; }

    public function setPedfase_key( $val )      { $this->pedfase_key = $val; }
    public function getPedfase_key()            { return $this->pedfase_key; }

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function setPed_key( $val ) { $this->ped_key = $val; }
    public function getPed_key() { return $this->ped_key; }

    public function setDoc_id( $val ) { $this->doc_id = $val; }
    public function getDoc_id() { return $this->doc_id; }

    public function setPed_certificado( $val ) { $this->ped_certificado = $val; }
    public function getPed_certificado() { return $this->ped_certificado; }

    public function setPed_observ( $val ) { $this->ped_observ = $val; }
    public function getPed_observ() { return $this->ped_observ; }

    public function setPedweb_estado( $val ) { $this->pedweb_estado = $val; }
    public function getPedweb_estado() { return $this->pedweb_estado; }

    public function setPedweb_dias( $val ) { $this->pedweb_dias = $val; }
    public function getPedweb_dias() { return $this->pedweb_dias; }

    public function setFaseacce_key( $val ) { $this->faseacce_key = $val; }
    public function getFaseacce_key() { return $this->faseacce_key; }

    public function setFase_type( $val ) { $this->fase_type = $val; }
    public function getFase_type() { return $this->fase_type; }

    public function setEnv_usuracce_key( $val ) { $this->env_usuracce_key = $val; }
    public function getEnv_usuracce_key() { return $this->env_usuracce_key; }

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function actualiza161() {
        $this->sql  = "SELECT logistics.pedidos_fases_update161(
                            '$this->type_edit', '$this->pedfase_key', '$this->ped_key', '$this->env_usuracce_key', '$this->env_observ', 
                            '$this->usursess_key', '$this->menu_id')";
        //echo $this->sql;
        $this->pedfase_key = parent::execute_01();
    }

    public function rechazar() {
        $this->sql = "SELECT logistics.pedidos_fases_reject(
                         '$this->pedfase_id', '$this->pedfase_key', '$this->faseacce_key', '$this->ped_observ', '$this->usursess_key', '$this->usur_psw2')";
        //echo $this->sql;
        $this->pedfase_key = parent::execute_01();
    }

    public function registros() {
        $this->sql  = "SELECT logistics.pedidos_fases_records('o', '$this->pedfase_id', '$this->pedfase_key',
                            '$this->ped_id', '$this->ped_key','$this->usursess_key',
                            '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                       FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }

    public function visto_bueno() {
        $this->sql  = "SELECT logistics.pedidos_fases_vobo(
                            '$this->pedfase_id', '$this->pedfase_key', '$this->faseacce_key', '$this->fase_type', $this->ped_certificado, 
                            '$this->env_usuracce_key', $this->pedweb_estado, '$this->pedweb_dias', '$this->ped_observ', '$this->usursess_key', '$this->usur_psw2')";
        //echo $this->sql;
        $this->pedfase_key = parent::execute_01();
    }
}
?>