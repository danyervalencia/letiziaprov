<?php
require_once 'conexion.php';

class Logistics_Ordenes_Det extends Conexion {
	private $ordendet_id = 0;  private $ordendet_flga = "";  private $orden_id = 0;  private $ordendet_item  = 0;  private $tablex = 0;    private $tablex_id = 0;  private $tabley = 0;  private $tabley_id = 0;
	private $ordendet_detalle = "";  private $ordendet_cantid = 0;  private $ordendet_preuni = 0;  private $ordendet_pretot = 0;  private $espedet_id = 0;  private $ordendet_estado = 0;  private $ordendet_key = "";

	private $orden_key = "";  private $doc_id = 0;  private $tipgast_id = 0;  private $tiporden_id = 0;  private $fuefin_id = 0;  private $tiprecur_id = 0;  private $meta_id = 0;
	private $bs_key = "";  private $bst_id = 0;  private $bsg_id = 0;  private $bsc_id = 0;  private $bsf_id = 0;

	public function setOrdendet_flga( $val )    { $this->ordendet_flga = $val; }
	public function getOrdendet_flga()          { return $this->ordendet_flga; }

	public function setOrdendet_item( $val )    { $this->ordendet_item = $val; }
	public function getOrdendet_item()          { return $this->ordendet_item; }

	public function setOrdendet_cantid( $val )  { $this->ordendet_cantid = $val; }
	public function getOrdendet_cantid()        { return $this->ordendet_cantid; }

	public function setOrdendet_preuni( $val )  { $this->ordendet_preuni = $val; }
	public function getOrdendet_preuni()        { return $this->ordendet_preuni; }

	public function setOrdendet_pretot( $val )  { $this->ordendet_pretot = $val; }
	public function getOrdendet_pretot()        { return $this->ordendet_pretot; }

	public function setEspedet_id( $val )       { $this->espedet_id = $val; }
	public function getEspedet_id()             { return $this->espedet_id; }

	public function setOrdendet_estado( $val )  { $this->ordendet_estado = $val; }
	public function getOrdendet_estado()        { return $this->ordendet_estado; }

	public function setOrdendet_key( $val )     { $this->ordendet_key = $val; }
	public function getOrdendet_key()           { return $this->ordendet_key; }

	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	public function setOrden_key( $val ) { $this->orden_key = $val; }
	public function getOrden_key() { return $this->orden_key; }

	public function setDoc_id( $val ) { $this->doc_id = $val; }
	public function getDoc_id() { return $this->doc_id; }

	public function setTiporden_id( $val ) { $this->tiporden_id = $val; }
	public function getTiporden_id() { return $this->tiporden_id; }

	public function setFuefin_id( $val ) { $this->fuefin_id = $val; }
	public function getFuefin_id() { return $this->fuefin_id; }

	public function setTiprecur_id( $val ) { $this->tiprecur_id = $val; }
	public function getTiprecur_id() { return $this->tiprecur_id; }

	public function setMeta_id( $val ) { $this->meta_id = $val; }
	public function getMeta_id() { return $this->meta_id; }

	public function setBs_key( $val ) { $this->bs_key = $val; }
	public function getBs_key() { return $this->bs_key; }

	public function setBst_id( $val ) { $this->bst_id = $val; }
	public function getBst_id() { return $this->bst_id; }

	public function setBsg_id( $val ) { $this->bsg_id = $val; }
	public function getBsg_id() { return $this->bsg_id; }

	public function setBsc_id( $val ) { $this->bsc_id = $val; }
	public function getBsc_id() { return $this->bsc_id; }

	public function setBsf_id( $val ) { $this->bsf_id = $val; }
	public function getBsf_id() { return $this->bsf_id; }

	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	public function registros() {
		$this->sql = "SELECT logistics.ordenes_det_records_prv('o',
						'$this->ordendet_key', '$this->ordendet_item', '$this->espedet_id',
						'$this->orden_key', '$this->year_id', '$this->doc_id', '$this->tipgast_id', '$this->fechaini', '$this->fechafin', 
						'$this->tiporden_id', '$this->fuefin_id', '$this->tiprecur_id', '$this->unieje_key', '$this->area_key', '$this->meta_id', '$this->pers_key',
						'$this->bs_key', '$this->bst_id', '$this->bsg_id', '$this->bsc_id', '$this->bsf_id',
						'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					  FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}
?>