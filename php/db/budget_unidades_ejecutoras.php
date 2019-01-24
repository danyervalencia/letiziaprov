<?php
require_once "conexion.php";

class Budget_Unidades_Ejecutoras extends Conexion {
	private $unieje_flga = "";  private $unieje_nombre = "";  private $unieje_abrev = "";
	private $dpto_id = 0;  private $prvn_id = 0;  private $dstt_id = 0;  private $unieje_estado = "NULL";

	public function setUnieje_flga($val)  { $this->unieje_flga = $val; }
	public function getUnieje_flga()      { return $this->unieje_flga; }
	
	public function setUnieje_nombre($val){ $this->unieje_nombre = $val; }
	public function getUnieje_nombre()    { return $this->unieje_nombre; }
 
	public function setUnieje_abrev($val) { $this->unieje_abrev = $val; }
	public function getUnieje_abrev()     { return $this->unieje_abrev; }

	public function setPais_id($val)      { $this->pais_id = $val; }
	public function getPais_id()          { return $this->pais_id; }

	public function setDpto_id($val)      { $this->dpto_id = $val; }
	public function getDpto_id()          { return $this->dpto_id; }

	public function setPrvn_id($val)      { $this->prvn_id = $val; }
	public function getPrvn_id()          { return $this->prvn_id; }

	public function setDstt_id($val)      { $this->dstt_id = $val; }
	public function getDstt_id()          { return $this->dstt_id; }

	public function setUnieje_estado($val){ $this->unieje_estado = $val; }
	public function getUnieje_estado()    { return $this->unieje_estado; }

	public function registros(){
		$this->sql = "SELECT budget.unidades_ejecutoras_records('o', '$this->unieje_id', '$this->unieje_key', 
						'$this->unieje_nombre', '$this->unieje_abrev', '$this->pers_id', '$this->dpto_id', '$this->prvn_id', '$this->dstt_id',
						 $this->unieje_estado, '$this->pers_key', '', '$this->menu_id',
						'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
						FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}