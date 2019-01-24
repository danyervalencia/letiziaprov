<?php
require_once "conexion.php";

class Logistics_Pedidos extends Conexion {
	private $ped_flga = "";  private $sucr_id = 0;  private $doc_id = 0;  private $tipped_id = 0;  private $ped_nro = 0;  private $ped_fecha = ""; private $categ_id = 0;
	private $fuefin_id = 0;  private $tiprecur_id = 0; private $ped_monto = 0; private $ped_estado = "NULL";
	
	private $tarea_key = "";  private $meta_id = 0; private $pedweb_filter = "NULL";

	public function setPed_key($val)    { $this->ped_key = $val; }
	public function getPed_key()        { return $this->ped_key; }

	public function setPed_flga($val)   { $this->ped_flga = $val; }
	public function getPed_flga()       { return $this->ped_flga; }

	public function setDoc_id($val)     { $this->doc_id = $val; }
	public function getDoc_id()         { return $this->doc_id; }

	public function setTipped_id($val)  { $this->tipped_id = $val; }
	public function getTipped_id()      { return $this->tipped_id; }

	public function setPed_nro($val)    { $this->ped_nro = $val; }
	public function getPed_nro()        { return $this->ped_nro; }

	public function setPed_fecha($val)  { $this->ped_fecha = $val; }
	public function getPed_fecha()      { return $this->ped_fecha; }

	public function setCateg_id($val)   { $this->categ_id = $val; }
	public function getCateg_id()       { return $this->categ_id; }

	public function setFuefin_id($val)  { $this->fuefin_id = $val; }
	public function getFuefin_id()      { return $this->fuefin_id; }

	public function setTiprecur_id($val){ $this->tiprecur_id = $val; }
	public function getTiprecur_id()    { return $this->tiprecur_id; }

	public function setPed_monto($val)  { $this->ped_monto = $val; }
	public function getPed_monto()      { return $this->ped_monto; }

	public function setPed_observ($val) { $this->ped_observ = $val; }
	public function getPed_observ()     { return $this->ped_observ; }

	public function setPed_estado($val) { $this->ped_estado = $val; }
	public function getPed_estado()     { return $this->ped_estado; }

	public function setTarea_key($val){ $this->tarea_key = $val; }
	public function getTarea_key(){ return $this->tarea_key; }

	public function setMeta_id($val){ $this->meta_id = $val; }
	public function getMeta_id(){ return $this->meta_id; }

	/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */  
	public function registros() {
		$this->sql  = "SELECT logistics.pedidos_records_web('o', '$this->ped_key',
							'$this->year_id', '$this->doc_id', '$this->tipped_id', '$this->ped_nro', '$this->fechaini', '$this->fechafin',
							'$this->categ_id', '$this->fuefin_id', '$this->tiprecur_id', '$this->monto_min', '$this->monto_max', $this->ped_estado, 
							'$this->unieje_key', '$this->area_key', '$this->tarea_key', '$this->meta_id', $this->pedweb_filter, '$this->perssess_key', '$this->menu_id',
							'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					   FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}