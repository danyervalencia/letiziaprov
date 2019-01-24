<?php
require_once 'conexion.php';

class Public_Personas_Accesos extends Conexion {
	private $persacce_fecha = ""; private $clav_id = 0;  private $indiv_id = 0;  private $persacce_observ = "";  private $persacce_estado = 'NULL';
	private $pers_ruc = "";  private $indiv_key = "";

	public function setPersacce_fecha($val) { $this->persacce_fecha = $val; }
	public function getPersacce_fecha()     { return $this->persacce_fecha; }

	public function setClav_id($val)        { $this->clav_id = $val; }
	public function getClav_id()            { return $this->clav_id; }

	public function setIndiv_id($val)       { $this->indiv_id = $val; }
	public function getIndiv_id()           { return $this->indiv_id; }

	public function setPersacce_observ($val){ $this->persacce_observ = $val; }
	public function getPersacce_observ()    { return $this->persacce_observ; }
 
	public function setPersacce_estado($val){ $this->persacce_estado = $val; }
	public function getPersacce_estado()    { return $this->persacce_estado; }

	public function setPers_ruc($val){ $this->pers_ruc = $val; }
	public function getPers_ruc(){ return $this->pers_ruc; }

	public function setIndiv_key($val){ $this->indiv_key = $val; }
	public function getIndiv_key(){ return $this->indiv_key; }

	public function actualiza() {
		$this->sql = "SELECT personas_accesos_update('$this->type_edit', '$this->persacce_id', '$this->persacce_key', '$this->pers_key',
						   $this->persacce_fecha, '$this->clav_id', '$this->indiv_key', '$this->persacce_observ', $this->persacce_estado,
						  '$this->usursess_key', '$this->menu_id')";
		//echo $this->sql;
		$this->persacce_key = parent::execute_01();
	}

    public function actualiza_psw() {
        $this->sql = "SELECT personas_accesos_update_psw('$this->type_edit', '$this->persacce_key', '$this->persacce_psw1', '$this->persacce_psw2', '$this->perssess_key', '$this->menu_id')";
        //echo $this->sql;
        $this->persacce_key = parent::execute_01();
    }

	public function registros() {
		$this->sql = "SELECT personas_accesos_records('o',
						  '$this->persacce_key', '$this->fechaini', '$this->fechafin', '$this->pers_id', '$this->clav_id',
						  '$this->persacce_login', '$this->persacce_psw1', '$this->persacce_psw2', $this->persacce_estado, 
						  '$this->pers_key', '$this->pers_ruc', '$this->unieje_key', 
						  '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					  FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}

	public function registros_session() {
		$this->sql = "SELECT personas_accesos_menus_opciones_records('o', '$this->persacce_key');
					  FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}
?>