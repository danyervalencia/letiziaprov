<?php
require_once 'conexion.php';
class Siaf_Expediente_Secuencia extends Conexion {
	private $expe_nro = 0;  private $cicl_code = "";  private $fase_code = ""; private $expefase_secuencia = 0; private $expesecuen_correlativo = 0; 
	private $doc_code = ""; private $doc_num = "";  private $year_ctacte = 0;  private $banc_code = "";  private $ctacte_code = "";  private $docb_code = "";  private $docb_num = "";

	public function setExpe_nro($val)          { $this->expe_nro = $val; }
	public function getExpe_nro()              { return $this->expe_nro; }

	public function setCicl_code($val)         { $this->cicl_code = $val; }
	public function getCicl_code()             { return $this->cicl_code; }

	public function setFase_code($val)         { $this->fase_code = $val; }
	public function getFase_code()             { return $this->fase_code; }

	public function setExpefase_secuencia($val){ $this->expefase_secuencia = $val; }
	public function getExpefase_secuencia()    { return $this->expefase_secuencia; }

	public function setDoc_code($val)          { $this->doc_code = $val; }
	public function getDoc_code()              { return $this->doc_code; }

	public function setDoc_num($val)           { $this->doc_num = $val; }
	public function getDoc_num()               { return $this->doc_num; }

	public function registros() {
		$this->sql = "SELECT siaf.expediente_secuencia_records('o', 
						  '$this->year_id', '$this->unieje_id', '$this->expe_nro', '$this->cicl_code', '$this->fase_code', '$this->expefase_secuencia', '$this->expesecuen_correlativo',
						  '$this->doc_code', '$this->doc_num', '$this->year_ctacte', '$this->banc_code', '$this->ctacte_code',
						  '$this->docb_code', '$this->docb_num', '$this->fechaini', '$this->fechafin', '$this->monto_min', '$this->monto_max',
						  '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
						  FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}