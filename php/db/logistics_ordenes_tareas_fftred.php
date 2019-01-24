<?php
require_once 'conexion.php';

class Logistics_Ordenes_Tareas_Fftred extends Conexion {
	private $ordentareafte_id = 0;  private $ordentareafte_flga = '';  private $orden_id = 0;  private $ordentareafte_item  = 0;
	private $tareafte_id = 0;  private $ordentareafte_monto = 0;  private $ordentareafte_percep = 0;  private $ordentareafte_estado = 'NULL';

	private $orden_key = '';  private $tablex = 0;  private $tablex_key = '';
	private $tareafte_key = '';  private $tarea_id = 0;  private $fuefin_id = 0;  private $tiprecur_id = 0;  private $espedet_id = 0;  
	private $tarea_key = ''; private $meta_id = 0;

	public function setOrdentareafte_id( $val )     { $this->ordentareafte_id = $val; }
	public function getOrdentareafte_id()           { return $this->ordentareafte_id; }

	public function setOrdentareafte_flga( $val )   { $this->ordentareafte_flga = $val; }
	public function getOrdentareafte_flga()         { return $this->ordentareafte_flga; }

	public function setOrden_id( $val )             { $this->orden_id = $val; }
	public function getOrden_id()                   { return $this->orden_id; }

	public function setOrdentareafte_item( $val )   { $this->ordentareafte_item = $val; }
	public function getOrdentareafte_item()         { return $this->ordentareafte_item; }

	public function setTareafte_id( $val )          { $this->tareafte_id = $val; }
	public function getTareafte_id()                { return $this->tareafte_id; }

	public function setOrdentareafte_monto( $val )  { $this->ordentareafte_monto = $val; }
	public function getOrdentareafte_monto()        { return $this->ordentareafte_monto; }

	public function setOrdentareafte_estado( $val ) { $this->ordentareafte_estado = $val; }
	public function getOrdentareafte_estado()       { return $this->ordentareafte_estado; }

	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	public function setOrden_key( $val ) { $this->orden_key = $val; }
	public function getOrden_key() { return $this->orden_key; }

	public function setTablex( $val ) { $this->tablex = $val; }
	public function getTablex() { return $this->tablex; }

	public function setTablex_key( $val ) { $this->tablex_key = $val; }
	public function getTablex_key() { return $this->tablex_key; }

	public function setTareafte_key( $val ) { $this->tareafte_key = $val; }
	public function getTareafte_key() { return $this->tareafte_key; }

	public function setTarea_id( $val ) { $this->tarea_id = $val; }
	public function getTarea_id() { return $this->tarea_id; }

	public function setFuefin_id( $val ) { $this->fuefin_id = $val; }
	public function getFuefin_id() { return $this->fuefin_id; }

	public function setTiprecur_id( $val ) { $this->tiprecur_id = $val; }
	public function getTiprecur_id() { return $this->tiprecur_id; }

	public function setEspedet_id( $val ) { $this->espedet_id = $val; }
	public function getEspedet_id() { return $this->espedet_id; }

	public function setTarea_key( $val ) { $this->tarea_key = $val; }
	public function getTarea_key() { return $this->tarea_key; }

	public function setMeta_id( $val ) { $this->meta_id = $val; }
	public function getMeta_id() { return $this->meta_id; }

	public function setTareacomp_key( $val ) { $this->tareacomp_key = $val; }
	public function getTareacomp_key() { return $this->tareacomp_key; }

	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	public function registros() {
		$this->sql  = "SELECT logistics.ordenes_tareas_fftred_records('o',
							'$this->ordentareafte_id', '$this->orden_id', '$this->ordentareafte_item', '$this->area_id', '$this->tareafte_id', $this->ordentareafte_estado,
							'$this->orden_key', '$this->tablex', '$this->tablex_key', '$this->pers_id', '$this->pers_key',
							'$this->area_key', '$this->tareafte_key', '$this->tarea_id', '$this->fuefin_id', '$this->tiprecur_id', '$this->espedet_id', '$this->tarea_key', '$this->meta_id',
							'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					   FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}