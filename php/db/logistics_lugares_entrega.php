<?php
require_once 'conexion.php';

class Logistics_Lugares_Entrega extends Conexion {
	private $lugentr_id = 0;  private $lugentr_flga = '';  private $lugentr_nombre = '';  private $lugentr_abrev = '';  private $lugentr_code = '';  private $alma_id = 'NULL';  private $lugentr_estado = 'NULL';  private $lugentr_key = '';

	public function setLugentr_id( $val )     { $this->lugentr_id = $val; }
	public function getLugentr_id()           { return $this->lugentr_id; }

	public function setLugentr_flga( $val )   { $this->lugentr_flga = $val; }
	public function getLugentr_flga()         { return $this->lugentr_flga; }
 
	public function setLugentr_nombre( $val ) { $this->lugentr_nombre = $val; }
	public function getLugentr_nombre()       { return $this->lugentr_nombre; }

	public function setLugentr_abrev( $val )  { $this->lugentr_abrev = $val; }
	public function getLugentr_abrev()        { return $this->lugentr_abrev; }

	public function setLugentr_code( $val )   { $this->lugentr_code = $val; }
	public function getLugentr_code()         { return $this->lugentr_code; }

	public function setAlma_id( $val )        { $this->alma_id = $val; }
	public function getAlma_id()              { return $this->alma_id; }

	public function setLugentr_estado( $val ) { $this->lugentr_estado = $val; }
	public function getLugentr_estado()       { return $this->lugentr_estado; }

	public function setLugentr_key( $val )    { $this->lugentr_key = $val; }
	public function getLugentr_key()          { return $this->lugentr_key; }

	public function registros() {
		$this->sql = "SELECT logistics.lugares_entrega_records('o', 
						  '$this->lugentr_id', '$this->lugentr_key', '$this->unieje_id', '$this->lugentr_nombre', '$this->lugentr_abrev', $this->alma_id, $this->lugentr_estado,
						  '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
						  FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}
?> 