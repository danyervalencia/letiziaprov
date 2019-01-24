<?php
require_once 'conexion.php';

class Public_Documentos_Series extends Conexion {
    private $docser_id = 0;  private $docser_flga = '';  private $doc_id = 0;  private $docser_serie = 0;
    private $mes_id    = 0;  private $docser_aux  = 0;   private $docser_estado = '';

    public function setDocser_id( $val )     { $this->docser_id = $val; }
    public function getDocser_id()           { return $this->docser_id; }

    public function setDocser_flga( $val )   { $this->docser_flga = $val; }
    public function getDocser_flga()         { return $this->docser_flga; }

    public function setDoc_id( $val )        { $this->doc_id = $val; }
    public function getDoc_id()              { return $this->doc_id; }

    public function setDocser_serie( $val )  { $this->docser_serie = $val; }
    public function getDocser_serie()        { return $this->docser_serie; }

    public function setMes_id( $val )        { $this->mes_id = $val; }
    public function getMes_id()              { return $this->mes_id; }

    public function setDocser_aux( $val )    { $this->docser_aux = $val; }
    public function getDocser_aux()          { return $this->docser_aux; }

    public function setDocser_estado( $val ) { $this->docser_estado = $val; }
    public function getDocser_estado()       { return $this->docser_estado; }

    public function registros() {
    	$this->sql = "SELECT documentos_series_records('o', 
                          '$this->docser_id',  '$this->doc_id', '$this->year_id', '$this->mes_id', '$this->docser_serie', '$this->alma_id', '$this->docser_aux', $this->docser_estado,
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>