<?php
require_once 'conexion.php';

class Logistics_Pedidos_Det extends Conexion {
	private $peddet_flga = '';  private $peddet_item  = 0;
	private $peddet_cantid = 0;  private $peddet_preuni = 0;  private $peddet_pretot = 0;  private $espedet_id = 0;

	private $ped_key = '';  private $doc_id = 0;  private $tipped_id = 0;  private $tarea_key = '';  private $meta_id = 0;  private $fuefin_id = 0;  private $tiprecur_id = 0;
	private $bs_key = '';  private $bst_id = 0;  private $bsg_id = 0;  private $bsc_id = 0;  private $bsf_id = 0;

	public function setPeddet_flga( $val )    { $this->peddet_flga = $val; }
	public function getPeddet_flga()          { return $this->peddet_flga; }

	public function setPeddet_item( $val )    { $this->peddet_item = $val; }
	public function getPeddet_item()          { return $this->peddet_item; }

	public function setPeddet_cantid( $val )  { $this->peddet_cantid = $val; }
	public function getPeddet_cantid()        { return $this->peddet_cantid; }

	public function setPeddet_preuni( $val )  { $this->peddet_preuni = $val; }
	public function getPeddet_preuni()        { return $this->peddet_preuni; }

	public function setPeddet_pretot( $val )  { $this->peddet_pretot = $val; }
	public function getPeddet_pretot()        { return $this->peddet_pretot; }

	public function setEspedet_id( $val )     { $this->espedet_id = $val; }
	public function getEspedet_id()           { return $this->espedet_id; }

	public function setPed_key( $val ) { $this->ped_key = $val; }
	public function getPed_key() { return $this->ped_key; }

	public function setDoc_id( $val ) { $this->doc_id = $val; }
	public function getDoc_id() { return $this->doc_id; }

	public function setTipped_id( $val ) { $this->tipped_id = $val; }
	public function getTipped_id() { return $this->tipped_id; }

	public function setTarea_key( $val ) { $this->tarea_key = $val; }
	public function getTarea_key() { return $this->tarea_key; }

	public function setMeta_id( $val ) { $this->meta_id = $val; }
	public function getMeta_id() { return $this->meta_id; }

	public function setFuefin_id( $val ) { $this->fuefin_id = $val; }
	public function getFuefin_id() { return $this->fuefin_id; }

	public function setTiprecur_id( $val ) { $this->tiprecur_id = $val; }
	public function getTiprecur_id() { return $this->tiprecur_id; }

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
		$this->sql  = "SELECT logistics.pedidos_det_records_web('o','$this->peddet_item', '$this->espedet_id',
							'$this->ped_key', '$this->year_id', '$this->doc_id', '$this->tipped_id', '$this->area_key', '$this->tarea_key', '$this->meta_id', '$this->fuefin_id', '$this->tiprecur_id',
							'$this->bs_key', '$this->bst_id', '$this->bsg_id', '$this->bsc_id', '$this->bsf_id',
							'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					   FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}
?>