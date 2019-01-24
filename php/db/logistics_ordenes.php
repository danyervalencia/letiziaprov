<?php
require_once "conexion.php";
class Logistics_Ordenes extends Conexion {
	private $orden_flga = "";  private $doc_id = 0;  private $orden_nro = 0;  private $orden_fecha = "";  private $tiporden_id = 0;  private $fuefin_id = 0;  private $tiprecur_id = 0;
	private $lugentr_id = 0;  private $tippag_id = 0;  private $orden_fechaini = "";  private $orden_fechafin = "";
	private $orden_monto = 0;  private $orden_percep = 0;  private $orden_pago = 0; private $orden_observ = "";  private $expe_nro = 0;  private $orden_estado = "NULL";  private $orden_key = ""; 

	private $tarea_key = "";  private $meta_id = 0; private $procedencias = "";

	public function setOrden_key($val)     { $this->orden_key = $val; }
	public function getOrden_key()         { return $this->orden_key; }

	public function setOrden_flga($val)    { $this->orden_flga = $val; }
	public function getOrden_flga()        { return $this->orden_flga; }

	public function setDoc_id($val)        { $this->doc_id = $val; }
	public function getDoc_id()            { return $this->doc_id; }

	public function setOrden_nro($val)     { $this->orden_nro = $val; }
	public function getOrden_nro()         { return $this->orden_nro; }

	public function setOrden_fecha($val)   { $this->orden_fecha = $val; }
	public function getOrden_fecha()       { return $this->orden_fecha; }

	public function setTiporden_id($val)   { $this->tiporden_id = $val; }
	public function getTiporden_id()       { return $this->tiporden_id; }

	public function setFuefin_id($val)     { $this->fuefin_id = $val; }
	public function getFuefin_id()         { return $this->fuefin_id; }

	public function setTiprecur_id($val)   { $this->tiprecur_id = $val; }
	public function getTiprecur_id()       { return $this->tiprecur_id; }

	public function setLugentr_id($val)    { $this->lugentr_id = $val; }
	public function getLugentr_id()        { return $this->lugentr_id; }

	public function setOrden_fechaini($val){ $this->orden_fechaini = $val; }
	public function getOrden_fechaini()    { return $this->orden_fechaini; }

	public function setOrden_fechafin($val){ $this->orden_fechafin = $val; }
	public function getOrden_fechafin()    { return $this->orden_fechafin; }

	public function setTippag_id($val)     { $this->tippag_id = $val; }
	public function getTippag_id()         { return $this->tippag_id; }

	public function setOrden_monto($val)   { $this->orden_monto = $val; }
	public function getOrden_monto()       { return $this->orden_monto; }
	
	public function setOrden_percep($val)  { $this->orden_percep = $val; }
	public function getOrden_percep()      { return $this->orden_percep; }

	public function setOrden_pago($val)    { $this->orden_pago = $val; }
	public function getOrden_pago()        { return $this->orden_pago; }

	public function setOrden_observ($val)  { $this->orden_observ = $val; }
	public function getOrden_observ()      { return $this->orden_observ; }

	public function setExpe_nro($val)      { $this->expe_nro = $val; }
	public function getExpe_nro()          { return $this->expe_nro; }

	public function setOrden_estado($val)  { $this->orden_estado = $val; }
	public function getOrden_estado()      { return $this->orden_estado; }

	public function setTarea_key($val){ $this->tarea_key = $val; }
	public function getTarea_key(){ return $this->tarea_key; }

	public function setMeta_id($val){ $this->meta_id = $val; }
	public function getMeta_id(){ return $this->meta_id; }

	public function setTablex($val){ $this->tablex = $val; }
	public function getTablex(){ return $this->tablex; }

	public function setTablex_key($val){ $this->tablex_key = $val; }
	public function getTablex_key(){ return $this->tablex_key; }

	public function setProcedencias($val){ $this->procedencias = $val; }
	public function getProcedencias(){ return $this->procedencias; }

	/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */  
	public function registros() {
		$this->sql="SELECT logistics.ordenes_records_web('o', '$this->orden_key',
						'$this->year_id', '$this->doc_id', '$this->orden_nro', '$this->fechaini', '$this->fechafin', 
						'$this->tiporden_id', '$this->fuefin_id', '$this->tiprecur_id', '$this->lugentr_id', '$this->monto_min', '$this->monto_max', '$this->expe_nro',
						'$this->unieje_key', '$this->area_key', '$this->tarea_key', '$this->meta_id', '$this->pers_key', '$this->menu_id',
						'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}