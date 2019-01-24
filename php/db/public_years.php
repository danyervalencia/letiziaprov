<?php
require_once 'conexion.php';

class Public_Years extends Conexion {
    private $year_flga = "";  private $year_nombre = "";  private $year_nro = "";  private $year_estado = "";
    private $year_ini = 0;  private $year_fin = 0;

    public function setYear_nombre( $val ) { $this->year_nombre = $val; }
    public function getYear_nombre()       { return $this->year_nombre; }

    public function setYear_nro( $val )  { $this->year_nro = $val; }
    public function getYear_nro()        { return $this->year_nro; }

    public function setYear_estado( $val ) { $this->year_estado = $val; }
    public function getYear_estado()       { return $this->year_estado; }

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    public function setYear_ini( $val ) { $this->year_ini = $val; }
    public function getYear_ini()       { return $this->year_ini; }

    public function setYear_fin( $val ) { $this->year_fin = $val; }
    public function getYear_fin()       { return $this->year_fin; }

    public function registros() {
    	$this->sql = "SELECT years_records('o',
                          '$this->year_id',       '$this->year_nombre', '$this->year_nro', '$this->year_estado', '$this->year_ini', '$this->year_fin',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>