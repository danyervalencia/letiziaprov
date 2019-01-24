<?php
require_once 'conexion.php';

class Budget_Metas extends Conexion {
	private $meta_id = 0;  private $meta_flga = '';  private $secfunc_code = '';
	private $func_code = '';  private $prog_code = '';  private $subprog_code = '';  private $actproy_code = '';  private $comp_code = '';  
	private $meta = '';  private $fina_code = '';  private $secfunc_nombre = '';  private $tipgast_id = 0;
	private $unimed_id = 0;  private $meta_cantid = 0;  private $dpto_id = 0;  private $prvn_id = 0;  private $dstt_id = 0;  
	private $secfunc_fechaini = '';  private $secfunc_fechafin = '';  private $secfunc_latitud = 0;  private $secfunc_longitud = 0;  private $secfunc_observ = '';  private $meta_estado = 0;

	public function setMeta_id( $val )          { $this->meta_id = $val; }
	public function getMeta_id()                { return $this->meta_id; }

	public function setMeta_flga( $val )        { $this->meta_flga = $val; }
	public function getMeta_flga()              { return $this->meta_flga; }
	
	public function setSecfunc_code( $val )     { $this->secfunc_code = $val; }
	public function getSecfunc_code()           { return $this->secfunc_code; }

	public function setFunc_code( $val )        { $this->func_code = $val; }
	public function getFunc_code()              { return $this->func_code; }

	public function setProg_code( $val )        { $this->prog_code = $val; }
	public function getProg_code()              { return $this->prog_code; }

	public function setSubprog_code( $val )     { $this->subprog_code = $val; }
	public function getSubprog_code()           { return $this->subprog_code; }

	public function setActproy_code( $val )     { $this->actproy_code = $val; }
	public function getActproy_code()           { return $this->actproy_code; }

	public function setComp_code( $val )        { $this->comp_code = $val; }
	public function getComp_code()              { return $this->comp_code; }

	public function setMeta( $val )             { $this->meta = $val; }
	public function getMeta()                   { return $this->meta; }

	public function setSecfunc_nombre( $val )   { $this->secfunc_nombre = $val; }
	public function getSecfunc_nombre()         { return $this->secfunc_nombre; }

	public function setTipgast_id( $val )       { $this->tipgast_id = $val; }
	public function getTipgast_id()             { return $this->tipgast_id; }

	public function setUnimed_id( $val )        { $this->unimed_id = $val; }
	public function getUnimed_id()              { return $this->unimed_id; }

	public function setSecfunc_fechaini( $val ) { $this->secfunc_fechaini = $val; }
	public function getSecfunc_fechaini()       { return $this->secfunc_fechaini; }

	public function setSecfunc_fechafin( $val ) { $this->secfunc_fechafin = $val; }
	public function getSecfunc_fechafin()       { return $this->secfunc_fechafin; }

	public function setSecfunc_latitud( $val )  { $this->secfunc_latitud = $val; }
	public function getSecfunc_latitud()        { return $this->secfunc_latitud; }

	public function setSecfunc_longitud( $val ) { $this->secfunc_longitud = $val; }
	public function getSecfunc_longitud()       { return $this->secfunc_longitud; }

	public function setSecfunc_observ( $val )   { $this->secfunc_observ = $val; }
	public function getSecfunc_observ()         { return $this->secfunc_observ; }

	public function setSecfunc_estado( $val )   { $this->secfunc_estado = $val; }
	public function getSecfunc_estado()         { return $this->secfunc_estado; }

	/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */  
	public function actualiza() {
		$this->secfunc_fechaini = ( $this->secfunc_fechaini == '' ? 'NULL' : "'" . $this->secfunc_fechaini . "'" );
		$this->secfunc_fechafin = ( $this->secfunc_fechafin == '' ? 'NULL' : "'" . $this->secfunc_fechafin . "'" );
		$this->sql = "SELECT budget.metas_update(
						  '$this->type_edit', '$this->meta_id', '$this->year_id', '$this->secfunc_code', '$this->func_code', '$this->prog_code', '$this->subprog_code', '$this->actproy_code', '$this->comp_code', '$this->meta', '$this->fina_code',
						  '$this->secfunc_nombre', $this->secfunc_fechaini, $this->secfunc_fechafin, '$this->secfunc_latitud', '$this->secfunc_longitud', '$this->secfunc_observ', '$this->usursess_key', '$this->menu_id')";
		//echo $this->sql;
		$this->meta_id = parent::execute_01();
	}
	
	public function registros() {
		$this->sql  = "SELECT budget.metas_records('o', '$this->meta_id',
							'$this->year_id', '$this->unieje_id', '$this->secfunc_code', '$this->func_code', '$this->prog_code', '$this->subprog_code',
							'$this->actproy_code', '$this->comp_code', '$this->secfunc_nombre',
							'$this->tipgast_id', '$this->dpto_id', '$this->prvn_id', '$this->dstt_id', '$this->meta_estado',
							'$this->unieje_key', '$this->proysnip_code', '$this->area_key',
							'$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					   FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}