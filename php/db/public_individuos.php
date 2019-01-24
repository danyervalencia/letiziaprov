<?php
require_once "conexion.php";

class Public_Individuos extends Conexion {
    private $indiv_id         = 0;   private $tipdocident_id  = 0;   private $indiv_dni      = '';
    private $indiv_appaterno  = '';  private $indiv_apmaterno = '';  private $indiv_nombres  = '';
    private $tipsex_id        = 0;   private $tipestaciv_id   = 0;   private $indiv_fechanac = '';
    private $pais_id          = 0;   private $dpto_id         = '';  private $prvn_id        = '';  private $dstt_id  = '';
    private $indivdomi_domicilio = '';
    private $indiv_essalud    = '';  private $indiv_sis       = '';  private $indiv_mail = '';  private $indiv_observ = '';
    private $indiv_foto       = '';  private $indiv_pdf       = '';  private $indiv_key  = '';

    private $indiv_apenom = '';  private $indivtmp_key = '';

    public function setIndiv_id( $val )        { $this->indiv_id = $val; }
    public function getIndiv_id()              { return $this->indiv_id; }

    public function setTipdocident_id( $val )  { $this->tipdocident_id = $val; }
    public function getTipdocident_id()        { return $this->tipdocident_id; }

    public function setIndiv_dni( $val )       { $this->indiv_dni = $val; }
    public function getIndiv_dni()             { return $this->indiv_dni; }

    public function setIndiv_appaterno( $val ) { $this->indiv_appaterno = $val; }
    public function getIndiv_appaterno()       { return $this->indiv_appaterno; }

    public function setIndiv_apmaterno( $val ) { $this->indiv_apmaterno = $val; }
    public function getIndiv_apmaterno()       { return $this->indiv_apmaterno; }

    public function setIndiv_nombres( $val )   { $this->indiv_nombres = $val; }
    public function getIndiv_nombres()         { return $this->indiv_nombres; }

    public function setTipsex_id( $val )       { $this->tipsex_id = $val; }
    public function getTipsex_id()             { return $this->tipsex_id; }

    public function settipestaciv_id( $val )   { $this->tipestaciv_id = $val; }
    public function gettipestaciv_id()         { return $this->tipestaciv_id; }

    public function setIndiv_fechanac( $val )  { $this->indiv_fechanac = $val; }
    public function getIndiv_fechanac()        { return $this->indiv_fechanac; }

    public function setPais_id( $val )         { $this->pais_id = $val; }
    public function getPais_id()               { return $this->pais_id; }

    public function setDpto_id( $val )         { $this->dpto_id = $val; }
    public function getDpto_id()               { return $this->dpto_id; }

    public function setPrvn_id( $val )         { $this->prvn_id = $val; }
    public function getPrvn_id()               { return $this->prvn_id; }

    public function setDstt_id( $val )         { $this->dstt_id = $val; }
    public function getDstt_id()               { return $this->dstt_id; }

    public function setIndivdomi_domicilio( $val ) { $this->indivdomi_domicilio = $val; }
    public function getIndivdomi_domicilio()       { return $this->indivdomi_domicilio; }

    public function setIndiv_essalud( $val )   { $this->indiv_essalud = $val; }
    public function getIndiv_essalud()         { return $this->indiv_essalud; }

    public function setIndiv_sis( $val )       { $this->indiv_sis = $val; }
    public function getIndiv_sis()             { return $this->indiv_sis; }

    public function setIndiv_mail( $val )      { $this->indiv_mail = $val; }
    public function getIndiv_mail()            { return $this->indiv_mail; }

    public function setIndiv_observ( $val )    { $this->indiv_observ = $val; }
    public function getIndiv_observ()          { return $this->indiv_observ; }

    public function setIndiv_foto( $val )      { $this->indiv_foto = $val; }
    public function getIndiv_foto()            { return $this->indiv_foto; }

    public function setIndiv_pdf( $val )       { $this->indiv_pdf = $val; }
    public function getIndiv_pdf()             { return $this->indiv_pdf; }

    public function setIndiv_key( $val )       { $this->indiv_key = $val; }
    public function getIndiv_key()             { return $this->indiv_key; }

    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function setIndiv_apenom( $val ) { $this->indiv_apenom = $val; }
    public function getIndiv_apenom()       { return $this->indiv_apenom; }

    public function setIndivtmp_key( $val )   { $this->indivtmp_key = $val; }
    public function getIndivtmp_key()         { return $this->indivtmp_key; }

    public function actualiza() {
        //$this->indiv_fechanac = ( $this->indiv_fechanac == '' ? 'NULL' : "'" . $this->indiv_fechanac . "'" );
        $this->sql = "SELECT individuos_update(
                          '$this->type_edit',       '$this->indiv_id',        '$this->indiv_key',     '$this->tipdocident_id', '$this->indiv_dni',
                          '$this->indiv_appaterno', '$this->indiv_apmaterno', '$this->indiv_nombres',  $this->tipsex_id,        $this->tipestaciv_id,
                           $this->indiv_fechanac,    $this->pais_id,           $this->dpto_id,         $this->prvn_id,          $this->dstt_id,
                          '$this->indiv_mail',      '$this->indiv_observ',    '$this->indiv_foto',    '$this->indiv_pdf',      '$this->usursess_key')";
        //echo $this->sql;
        $this->indiv_key = parent::execute_01();
    }

    public function registros() {
        $this->sql = "SELECT individuos_records('o',
                          '$this->indiv_id',        '$this->indiv_key',        '$this->tipdocident_id', '$this->indiv_dni',
                          '$this->indiv_appaterno', '$this->indiv_apmaterno',  '$this->indiv_nombres',  '$this->tipsex_id',
                          '$this->tipestaciv_id',   '$this->indiv_fechanac',   '$this->indiv_apenom',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>