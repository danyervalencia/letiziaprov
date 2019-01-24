<?php
require_once "conexion.php";

class Logistics_Cotizaciones extends Conexion {
	private $coti_id = 0;  private $coti_flga = "";  private $sucr_id = 0;  private $doc_id = 0;  private $tipcoti_id = 0;  private $coti_nro = 0;  private $coti_fecha = "";
	private $ped_id = 0;  private $coti_monto = 0;  private $coti_inc_igv = 0;  private $coti_vigencia = 0;  private $coti_plazo = 0;  private $coti_garantia = 0;  private $tippag_id = 0;  private $lugentr_id = 0;
	private $coti_file1 = "";  private $coti_observ = "";  private $coti_ip = ""; private $coti_estado = 0;  private $coti_key = "";

	private $det = "";  private $ped_key = "";
	private $tipped_id = 0;  private $tarea_id = 0;  private $tareacomp_id = 0;  private $fuefin_id = 0;  private $tiprecur_id = 0;  private $meta_id = 0; private $tarea_key = "";  private $tareacomp_key = "";

	public function setCoti_id( $val )       { $this->coti_id = $val; }
	public function getCoti_id()             { return $this->coti_id; }

	public function setCoti_flga( $val )     { $this->coti_flga = $val; }
	public function getCoti_flga()           { return $this->coti_flga; }

	public function setDoc_id( $val )        { $this->doc_id = $val; }
	public function getDoc_id()              { return $this->doc_id; }

	public function setTipcoti_id( $val )    { $this->tipcoti_id = $val; }
	public function getTipcoti_id()          { return $this->tipcoti_id; }

	public function setCoti_nro( $val )      { $this->coti_nro = $val; }
	public function getCoti_nro()            { return $this->coti_nro; }

	public function setCoti_fecha( $val )    { $this->coti_fecha = $val; }
	public function getCoti_fecha()          { return $this->coti_fecha; }

	public function setPed_id( $val )        { $this->ped = $val; }
	public function getPed_id()              { return $this->ped; }

	public function setCoti_monto( $val )    { $this->coti_monto = $val; }
	public function getCoti_monto()          { return $this->coti_monto; }
	
	public function setCoti_inc_igv( $val )  { $this->coti_inc_igv = $val; }
	public function getCoti_inc_igv()        { return $this->coti_inc_igv; }

	public function setCoti_vigencia( $val ) { $this->coti_vigencia = $val; }
	public function getCoti_vigencia()       { return $this->coti_vigencia; }

	public function setCoti_plazo( $val )    { $this->coti_plazo = $val; }
	public function getCoti_plazo()          { return $this->coti_plazo; }

	public function setCoti_garantia( $val ) { $this->coti_garantia = $val; }
	public function getCoti_garantia()       { return $this->coti_garantia; }

	public function setTippag_id( $val )     { $this->tippag_id = $val; }
	public function getTippag_id()           { return $this->tippag_id; }

	public function setLugentr_id( $val )    { $this->lugentr_id = $val; }
	public function getLugentr_id()          { return $this->lugentr_id; }

	public function setCoti_file1( $val )    { $this->coti_file1 = $val; }
	public function getCoti_file1()          { return $this->coti_file1; }

	public function setCoti_ip( $val )       { $this->coti_ip = $val; }
	public function getCoti_ip()             { return $this->coti_ip; }

	public function setCoti_observ( $val )   { $this->coti_observ = $val; }
	public function getCoti_observ()         { return $this->coti_observ; }

	public function setCoti_estado( $val )   { $this->coti_estado = $val; }
	public function getCoti_estado()         { return $this->coti_estado; }

	public function setCoti_key( $val )      { $this->coti_key = $val; }
	public function getCoti_key()            { return $this->coti_key; }

	public function setDet( $val ) { $this->det = $val; }
	public function getDet() { return $this->det; }

	public function setPed_key( $val ) { $this->ped_key = $val; }
	public function getPed_key() { return $this->ped_key; }

	public function setTipped_id( $val ) { $this->tipped_id = $val; }
	public function getTipped_id() { return $this->tipped_id; }

	public function setTarea_id( $val ) { $this->tarea_id = $val; }
	public function getTarea_id() { return $this->tarea_id; }

	public function setTareacomp_id( $val ) { $this->tareacomp_id = $val; }
	public function getTareacomp_id() { return $this->tareacomp_id; }

	public function setFuefin_id( $val ) { $this->fuefin_id = $val; }
	public function getFuefin_id() { return $this->fuefin_id; }

	public function setTiprecur_id( $val ) { $this->tiprecur_id = $val; }
	public function getTiprecur_id() { return $this->tiprecur_id; }

	public function setMeta_id( $val ) { $this->meta_id = $val; }
	public function getMeta_id() { return $this->meta_id; }

	public function setTarea_key( $val ) { $this->tarea_key = $val; }
	public function getTarea_key() { return $this->tarea_key; }

	public function setTareacomp_key( $val ) { $this->tareacomp_key = $val; }
	public function getTareacomp_key() { return $this->tareacomp_key; }

	/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */  
	public function actualiza() {
		$this->sql  = "SELECT logistics.cotizaciones_update('$this->type_edit', '$this->coti_key', '$this->coti_fecha', '$this->ped_key', '$this->coti_monto',
						'$this->coti_inc_igv', '$this->coti_vigencia', '$this->coti_plazo', $this->coti_garantia, 
						$this->tippag_id, $this->lugentr_id, '$this->coti_observ', '$this->coti_file1', '$this->coti_ip',
						'$this->perssess_key', '$this->menu_id', '$this->det')";
		//echo $this->sql;
		$this->coti_key = parent::execute_01();
	}

	public function eliminar() {
		$this->sql  = "SELECT logistics.cotizaciones_delete_web(
						   '$this->coti_key', '$this->coti_observ', '$this->perssess_key', '$this->persacce_psw2', '$this->menu_id')";
		//echo $this->sql;
		$this->coti_key = parent::execute_01();
	}

	public function registros() {
		$this->sql  = "SELECT logistics.cotizaciones_records_web('o', '$this->coti_key',
							'$this->year_id', '$this->tipcoti_id', '$this->coti_nro', '$this->fechaini', '$this->fechafin', '$this->lugentr_id', '$this->monto_min', '$this->monto_max',
							'$this->unieje_key', '$this->ped_key', '$this->tipped_id', '$this->fuefin_id', '$this->tiprecur_id', '$this->area_key', '$this->tarea_key', '$this->meta_id',
							'$this->pers_key', '$this->menu_id',
							'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					   FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}

	public function registros_comparativo() {
		$this->sql  = "SELECT logistics.cotizaciones_records_comparative('o', '$this->ped_id', '$this->ped_key');
					   FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}

	public function registros_personas() {
		$this->sql  = "SELECT logistics.cotizaciones_records_personas('o', '$this->ped_id', '$this->ped_key',  '$this->type_record');
					   FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}