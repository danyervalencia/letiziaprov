<?php
require_once "conexion.php";

class Logistics_Cotizaciones_Det extends Conexion {
	private $cotidet_flga = "";  private $cotidet_item = 0;  private $bs_id = 0;  private $cotidet_detalle = "";  
	private $cotidet_cantid = 0;  private $cotidet_preuni = 0;  private $cotidet_pretot = 0; private $cotidet_estado = "NULL";

	private $coti_key = "";  private $doc_id = 0;  private $tipcoti_id = 0;  
	private $bs_key = "";  private $bst_id = 0;  private $bsg_id = 0;  private $bsc_id = 0;  private $bsf_id = 0;
	
	public function setCotidet_flga($val)   { $this->cotidet_flga = $val; }
	public function getCotidet_flga()       { return $this->cotidet_flga; }

	public function setCotidet_item($val)   { $this->cotidet_item = $val; }
	public function getCotidet_item()       { return $this->cotidet_item; }

	public function setBs_id($val)          { $this->bs_id = $val; }
	public function getBs_id()              { return $this->bs_id; }

	public function setCotidet_detalle($val){ $this->cotidet_detalle = $val; }
	public function getCotidet_detalle()    { return $this->cotidet_detalle; }

	public function setCotidet_cantid($val) { $this->cotidet_cantid = $val; }
	public function getCotidet_cantid()     { return $this->cotidet_cantid; }

	public function setCotidet_preuni($val) { $this->cotidet_preuni = $val; }
	public function getCotidet_preuni()     { return $this->cotidet_preuni; }

	public function setCotidet_pretot($val) { $this->cotidet_pretot = $val; }
	public function getCotidet_pretot()     { return $this->cotidet_pretot; }

	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	public function setCoti_key($val){ $this->coti_key = $val; }
	public function getCoti_key(){ return $this->coti_key; }

	public function setDoc_id($val){ $this->doc_id = $val; }
	public function getDoc_id(){ return $this->doc_id; }

	public function setTipcoti_id($val){ $this->tipcoti_id = $val; }
	public function getTipcoti_id(){ return $this->tipcoti_id; }

	public function setBs_key($val){ $this->bs_key = $val; }
	public function getBs_key(){ return $this->bs_key; }

	public function setBst_id($val){ $this->bst_id = $val; }
	public function getBst_id(){ return $this->bst_id; }

	public function setBsg_id($val){ $this->bsg_id = $val; }
	public function getBsg_id(){ return $this->bsg_id; }

	public function setBsc_id($val){ $this->bsc_id = $val; }
	public function getBsc_id(){ return $this->bsc_id; }

	public function setBsf_id($val){ $this->bsf_id = $val; }
	public function getBsf_id(){ return $this->bsf_id; }

	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	public function registros() {
		$this->sql  = "SELECT logistics.cotizaciones_det_records('o',
							'$this->cotidet_key', '$this->cotidet_item', $this->cotidet_estado, '$this->coti_key',
							'$this->year_id', '$this->unieje_key', '$this->doc_id', '$this->tipcoti_id', '$this->peddet_key', '$this->ped_key',
							'$this->bs_key', '$this->bst_id', '$this->bsg_id', '$this->bsf_id',
							'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					   FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}
?>