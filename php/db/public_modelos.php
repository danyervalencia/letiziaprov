<?php
require_once 'conexion.php';

class Public_Modelos extends Conexion {
    private $mod_id = 0;  private $bsc_id = 0;  private $marc_id = 0;  private $mod_nombre = '';  private $mod_abrev = '';
    private $mod_foto = '';  private $mod_observ = '';  private $mod_estado = 'NULL';  private $mod_key = '';

    private $bsc_key = '';  private $marc_key = '';

    public function setMod_id( $val )     { $this->mod_id = $val; }
    public function getMod_id()           { return $this->mod_id; }

    public function setBsc_id( $val )     { $this->bsc_id = $val; }
    public function getBsc_id()           { return $this->bsc_id; }

    public function setMarc_id( $val )    { $this->marc_id = $val; }
    public function getMarc_id()          { return $this->marc_id; }

    public function setMod_nombre( $val ) { $this->mod_nombre = $val; }
    public function getMod_nombre()       { return $this->mod_nombre; }

    public function setMod_abrev( $val )  { $this->mod_abrev = $val; }
    public function getMod_abrev()        { return $this->mod_abrev; }

    public function setMod_foto( $val )   { $this->mod_foto = $val; }
    public function getMod_foto()         { return $this->mod_foto; }

    public function setMod_observ( $val ) { $this->mod_observ = $val; }
    public function getMod_observ()       { return $this->mod_observ; }

    public function setMod_estado( $val ) { $this->mod_estado = $val; }
    public function getMod_estado()       { return $this->mod_estado; }
    
    public function setMod_key( $val )    { $this->mod_key = $val; }
    public function getMod_key()          { return $this->mod_key; }

    public function setBsc_key( $val ) { $this->bsc_key = $val; }
    public function getBsc_key() { return $this->bsc_key; }

    public function setMarc_key( $val ) { $this->marc_key = $val; }
    public function getMarc_key() { return $this->marc_key; }

    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function actualiza() {
        $this->sql = "SELECT modelos_update('$this->tipo_edit', '$this->mod_id', '$this->mod_key',
                          '$this->bsc_key', '$this->marc_key',
                          '$this->mod_nombre', '$this->mod_abrev', '$this->mod_observ', '$this->mod_estado', 
                          '$this->menu_id',   '$this->usur_key')";
        //echo $this->sql;
        $this->mod_key = parent::execute_01();
    }

    public function registros() {
    	$this->sql = "SELECT modelos_records('o',
                          '$this->mod_id', '$this->mod_key', '$this->bsc_id', '$this->marc_id', '$this->mod_nombre', '$this->mod_abrev', $this->mod_estado,
                          '$this->bsc_key', '$this->marc_key',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>