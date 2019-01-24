<?php
require_once 'conexion.php';

class Logistics_Buena_Pro extends Conexion {
	private $bp_id = 0;  private $bp_flga = '';  private $sucr_id = 0;  private $doc_id = 0;  private $bp_nro = 0;  private $tipbp_id = 0;  private $bp_fecha = '';
	private $coti_id = 0;  private $bp_monto = 0;  private $bp_observ = '';  private $certif_id = 0;  private $certif_nro = 'NULL';  private $orden_id = 0;  private $bp_estado = 0;  private $bp_key = '';

	private $det = '';  private $coti_key = '';  private $coti_nro = 0;  private $ped_id = 0;
	private $ped_key = '';  private $tipped_id = 0;  private $ped_nro = 0;  private $tarea_id = 0;  private $tareacomp_id = 0;  private $fuefin_id = 0;  private $tiprecur_id = 0;
	private $meta_id = 0;  private $tarea_key = '';  private $tarea_fftred = '';

	public function setDoc_id( $val )     { $this->doc_id = $val; }
	public function getDoc_id()           { return $this->doc_id; }

	public function setBp_nro( $val )     { $this->bp_nro = $val; }
	public function getBp_nro()           { return $this->bp_nro; }

	public function setTipbp_id( $val )   { $this->tipbp_id = $val; }
	public function getTipbp_id()         { return $this->tipbp_id; }

	public function setBp_fecha( $val )   { $this->bp_fecha = $val; }
	public function getBp_fecha()         { return $this->bp_fecha; }

	public function setBp_monto( $val )   { $this->bp_monto = $val; }
	public function getBp_monto()         { return $this->bp_monto; }

	public function setCertif_id( $val )  { $this->certif_id = $val; }
	public function getCertif_id()        { return $this->certif_id; }

	public function setCertif_nro( $val ) { $this->certif_nro = $val; }
	public function getCertif_nro()       { return $this->certif_nro; }

	public function setBp_observ( $val )  { $this->bp_observ = $val; }
	public function getBp_observ()        { return $this->bp_observ; }

	public function setBp_estado( $val ) { $this->bp_estado = $val; }
	public function getBp_estado()       { return $this->bp_estado; }

	public function setBp_key( $val )    { $this->bp_key = $val; }
	public function getBp_key()          { return $this->bp_key; }

	public function setDet( $val ) { $this->det = $val; }
	public function getDet() { return $this->det; }

	public function setCoti_key( $val ) { $this->coti_key = $val; }
	public function getCoti_key() { return $this->coti_key; }

	public function setCoti_nro( $val ) { $this->coti_nro = $val; }
	public function getCoti_nro() { return $this->coti_nro; }

	public function setPed_key( $val ) { $this->ped_key = $val; }
	public function getPed_key() { return $this->ped_key; }

	public function setTipped_id( $val ) { $this->tipped_id = $val; }
	public function getTipped_id() { return $this->tipped_id; }

	public function setPed_nro( $val ) { $this->ped_nro = $val; }
	public function getPed_nro() { return $this->ped_nro; }

	public function setFuefin_id( $val ) { $this->fuefin_id = $val; }
	public function getFuefin_id() { return $this->tarea_key; }

	public function setTiprecur_id( $val ) { $this->tiprecur_id = $val; }
	public function getTiprecur_id() { return $this->tiprecur_id; }

	public function setMeta_id( $val ) { $this->meta_id = $val; }
	public function getMeta_id() { return $this->meta_id; }

	public function setTarea_key( $val ) { $this->tarea_key = $val; }
	public function getTarea_key() { return $this->tarea_key; }

	public function setTarea_fftred( $val ) { $this->tarea_fftred = $val; }
	public function getTarea_fftred() { return $this->tarea_fftred; }

	/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */  
	public function actualiza() {
		$this->sql  = "SELECT logistics.buena_pro_update('$this->type_edit', '$this->bp_id', '$this->bp_key',
						'$this->year_id', '$this->unieje_id', '$this->doc_id', '$this->coti_key', '$this->ped_key', '$this->bp_monto', '$this->bp_observ',
						'$this->usursess_key', '$this->menu_id', '$this->det')";
		//echo $this->sql;
		$this->bp_key = parent::execute_01();
	}

	public function actualiza_certificado() {
		$this->sql  = "SELECT logistics.buena_pro_update_certificate('$this->type_edit', '$this->bp_id', '$this->bp_key', '$this->coti_key', 
						'$this->tarea_key', '$this->fuefin_id', '$this->tiprecur_id', '$this->bp_monto', $this->certif_nro, '$this->bp_observ',
						'$this->usursess_key', '$this->menu_id', '$this->det', '$this->tarea_fftred')";
		//echo $this->sql;
		$this->bp_key = parent::execute_01();
	}

	public function eliminar() {
		$this->sql  = "SELECT logistics.buena_pro_delete(
						   '$this->bp_key', '$this->coti_key', '$this->bp_observ', '$this->usursess_key', '$this->usur_psw2', '$this->menu_id')";
		//echo $this->sql;
		$this->bp_key = parent::execute_01();
	}

	public function eliminar_certificado() {
		$this->sql  = "SELECT logistics.buena_pro_delete_certificado(
						   '$this->bp_key', '$this->certif_nro', '$this->bp_observ', '$this->usursess_key', '$this->usur_psw2', '$this->menu_id')";
		//echo $this->sql;
		$this->bp_key = parent::execute_01();
	}

	public function registros() {
		$this->sql  = "SELECT logistics.buena_pro_records('o', '$this->bp_id', '$this->bp_key',
							'$this->year_id', '$this->unieje_id', '$this->sucr_id', '$this->doc_id', '$this->tipbp_id', '$this->bp_nro', 
							'$this->fechaini', '$this->fechafin', '$this->coti_id', '$this->monto_min', '$this->monto_max', 
							'$this->coti_key', '$this->coti_nro', '$this->ped_id', '$this->pers_id', 
							'$this->ped_key', '$this->tipped_id', '$this->ped_nro', '$this->area_id', '$this->tarea_id', '$this->tareacomp_id', '$this->fuefin_id', '$this->tiprecur_id',
							'$this->pers_key', '$this->area_key', '$this->meta_id', '$this->tarea_key', '$this->usursess_key', '$this->menu_id',
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