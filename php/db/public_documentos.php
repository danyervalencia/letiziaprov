<?php
require_once 'conexion.php';

class Public_Documentos extends Conexion {
    private $doc_id = 0;  private $doc_flga = '';  private $doc_nombre = '';  private $doc_nombre02 = '';  private $doc_nombre03 = '';  private $doc_abrev = '';
    private $doc_reg_serie = 0;  private $doc_reg_alma = 0;  private $doc_reg_aux = 0;
    private $doc_essunat = 0;  private $doc_escontable = 0;  private $doc_escompra = 0;  private $doc_esgasto = 0;  private $doc_esventa = 0;
    private $doc_escobro = 0;  private $doc_espago = 0;  private $doc_estercero = 0;  private $doc_esdocumentary = 0;  private $doc_esexportar = 0;
    private $doc_estado = 0;

    public function setDoc_id( $val )         { $this->doc_id = $val; }
    public function getDoc_id()               { return $this->doc_id; }

    public function setDoc_flga( $val )       { $this->doc_flga = $val; }
    public function getDoc_flga()             { return $this->doc_flga; }

    public function setDoc_nombre( $val )     { $this->doc_nombre = $val; }
    public function getDoc_nombre()           { return $this->doc_nombre; }

    public function setDoc_nombre02( $val )   { $this->doc_nombre02 = $val; }
    public function getDoc_nombre02()         { return $this->doc_nombre02; }

    public function setDoc_nombre03( $val )   { $this->doc_nombre03 = $val; }
    public function getDoc_nombre03()         { return $this->doc_nombre03; }

    public function setDoc_abrev( $val )      { $this->doc_abrev = $val; }
    public function getDoc_abrev()            { return $this->doc_abrev; }

    public function setDoc_reg_serie( $val )  { $this->doc_reg_serie = $val; }
    public function getDoc_reg_serie()        { return $this->doc_reg_serie; }
    
    public function setDoc_reg_alma( $val )   { $this->doc_reg_alma = $val; }
    public function getDoc_reg_alma()         { return $this->doc_reg_alma; }

    public function setDoc_reg_aux( $val )    { $this->doc_reg_aux = $val; }
    public function getDoc_reg_aux()          { return $this->doc_reg_aux; }

    public function setdoc_essunat( $val   )  { $this->cod_sunat = $val; }
    public function getdoc_essunat()          { return $this->cod_sunat; }
   
    public function setDoc_escontable( $val ) { $this->doc_escontable = $val; }
    public function getDoc_escontable()       { return $this->doc_escontable; }

    public function setDoc_escompra( $val )   { $this->doc_escompra = $val; }
    public function getDoc_escompra()         { return $this->doc_escompra; }

    public function setDoc_esgasto( $val )    { $this->doc_esgasto = $val; }
    public function getDoc_esgasto()          { return $this->doc_esgasto; }

    public function setDoc_esventa( $val )    { $this->doc_esventa = $val; }
    public function getDoc_esventa()          { return $this->doc_esventa; }

    public function setDoc_escobro( $val )    { $this->doc_escobro = $val; }
    public function getDoc_escobro()          { return $this->doc_escobro; }

    public function setDoc_espago( $val )     { $this->doc_espago = $val; }
    public function getDoc_espago()           { return $this->doc_espago; }

    public function setDoc_estercero( $val )  { $this->doc_estercero = $val; }
    public function getDoc_estercero()        { return $this->doc_estercero; }

    public function setDoc_esdocumentary( $val ) { $this->doc_esdocumentary = $val; }
    public function getDoc_esdocumentary()       { return $this->doc_esdocumentary; }

    public function setDoc_esexportar( $val ) { $this->doc_esexportar = $val; }
    public function getDoc_esexportar()       { return $this->doc_esexportar; }

    public function setDoc_estado( $val )     { $this->doc_estado = $val; }
    public function getDoc_estado()           { return $this->doc_estado; }

    public function registros() {
    	$this->sql = "SELECT documentos_records('o', 
                          '$this->doc_id', '$this->doc_nombre', '$this->doc_abrev', '$this->doc_code', '$this->doc_reg_serie',
                          '$this->doc_essunat', '$this->doc_escontable', '$this->doc_escompra',  '$this->doc_esgasto', '$this->doc_esventa',
                          '$this->doc_escobro', '$this->doc_espago', '$this->doc_estercero', '$this->doc_esdocumentary', '$this->doc_esexportar', '$this->doc_estado',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>