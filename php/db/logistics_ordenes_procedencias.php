<?php
require_once 'conexion.php';

class Logistics_Ordenes_Procedencias extends Conexion {
	private $ordenproc_id = 0;  private $ordenproc_flga = '';  private $orden_id = 0;  private $ordenproc_item  = 0;
	private $tipordenproc_id = 0;  private $tablex = 0;  private $tablex_id = 0;  private $tabley = 0;  private $tabley_id = 0;  private $ordenproc_estado = 'NULL';

	private $orden_key = '';  private $tarea_id = 0;  private $tareacomp_id = 0;  private $fuefin_id = 0;  private $tiprecur_id = 0;
	private $tarea_key = ''; private $meta_id = 0;  private $tablex_key = '';  private $tabley_key = '';

	public function setOrdenproc_id( $val )     { $this->ordenproc_id = $val; }
	public function getOrdenproc_id()           { return $this->ordenproc_id; }

	public function setOrdenproc_flga( $val )   { $this->ordenproc_flga = $val; }
	public function getOrdenproc_flga()         { return $this->ordenproc_flga; }

	public function setOrden_id( $val )         { $this->orden_id = $val; }
	public function getOrden_id()               { return $this->orden_id; }

	public function setOrdenproc_item( $val )   { $this->ordenproc_item = $val; }
	public function getOrdenproc_item()         { return $this->ordenproc_item; }

	public function setTipordenproc_id( $val )  { $this->tipordenproc_id = $val; }
	public function getTipordenproc_id()        { return $this->tipordenproc_id; }

	public function setTablex( $val )           { $this->tablex = $val; }
	public function getTablex()                 { return $this->tablex; }

	public function setTablex_id( $val )        { $this->tablex_id = $val; }
	public function getTablex_id()              { return $this->tablex_id; }

	public function setOrdenproc_estado( $val ) { $this->ordenproc_estado = $val; }
	public function getOrdenproc_estado()       { return $this->ordenproc_estado; }

	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	public function setOrden_key( $val ) { $this->orden_key = $val; }
	public function getOrden_key() { return $this->orden_key; }

	public function setTarea_id( $val ) { $this->tarea_id = $val; }
	public function getTarea_id() { return $this->tarea_id; }

	public function setFuefin_id( $val ) { $this->fuefin_id = $val; }
	public function getFuefin_id() { return $this->fuefin_id; }

	public function setTiprecur_id( $val ) { $this->tiprecur_id = $val; }
	public function getTiprecur_id() { return $this->tiprecur_id; }

	public function setTarea_key( $val ) { $this->tarea_key = $val; }
	public function getTarea_key() { return $this->tarea_key; }

	public function setMeta_id( $val ) { $this->meta_id = $val; }
	public function getMeta_id() { return $this->meta_id; }

	public function setTablex_key( $val ) { $this->tablex_key = $val; }
	public function getTablex_key() { return $this->tablex_key; }

	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	public function registros() {
		$this->sql  = "SELECT logistics.ordenes_procedencias_records('o',
							'$this->ordenproc_id', '$this->ordenproc_key', '$this->orden_id', '$this->ordenproc_item', '$this->tipordenproc_id', '$this->tablex', '$this->tablex_id',  '$this->tabley', '$this->tabley_id', 
							'$this->orden_key', '$this->area_id', '$this->tarea_id', '$this->tareacomp_id', '$this->fuefin_id', '$this->tiprecur_id', '$this->pers_id',
							'$this->area_key', '$this->tarea_key', '$this->meta_id', '$this->pers_key', '$this->tablex_key', '$this->tabley_key', '$this->usursess_key', '$this->menu_id',
							'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					   FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}