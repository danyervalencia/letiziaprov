<?php
require_once 'conexion.php';

class Public_Bienes_Servs_Clases_Marcas extends Conexion {
    private $bscmarc_id = 0;  private $bsc_id = 0;  private $marc_id = 0;  private $bscmarc_estado = 'NULL';  private $bscmarc_key = '';
    private $bsc_key = "";  private $marc_key = '';

    public function setBscmarc_id( $val )     { $this->bscmarc_id = $val; }
    public function getBscmarc_id()           { return $this->bscmarc_id; }

    public function setBsc_id( $val )         { $this->bsc_id = $val; }
    public function getBsc_id()               { return $this->bsc_id; }

    public function setMarc_id( $val )        { $this->marc_id = $val; }
    public function getMarc_id()              { return $this->marc_id; }
    
    public function setBscmarc_estado( $val ) { $this->bscmarc_estado = $val; }
    public function getBscmarc_estado()       { return $this->bscmarc_estado; }

    public function setBscmarc_key( $val )    { $this->bscmarc_key = $val; }
    public function getBscmarc_key()          { return $this->bscmarc_key; }

    public function setBsc_key( $val )  { $this->bsc_key = $val; }
    public function getBsc_key()        { return $this->bsc_key; }
    
    public function setMarc_key( $val ) { $this->marc_key = $val; }
    public function getMarc_key()       { return $this->marc_key; }


    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function actualiza() {
        $this->sql = "SELECT bienes_servs_clases_marcas_update('$this->tipo_edit', '$this->bscmarc_id', '$this->bscmarc_key',
                          '$this->bsc_id', '$this->marc_key',
                          '$this->bscmarc_estado', '$this->menu_id', '$this->usur_key')";
        //echo $this->sql;
        $this->marc_key = parent::execute_01();
    }

    public function registros() {
    	$this->sql = "SELECT bienes_servs_clases_marcas_records('o',
                          '$this->bscmarc_id', '$this->bscmarc_key', '$this->bsc_id', '$this->marc_id', $this->bscmarc_estado, '$this->bsc_key', '$this->marc_key',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>