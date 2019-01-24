<?php
require_once 'conexion.php';

class Public_Personas extends Conexion {
	private $tipdocident_id = 0;  private $pers_ruc = '';
	private $pers_nombre = '';  private $pers_nombre02 = '';  private $pers_abrev = '';  private $grupempr_id = 0; private $indiv_id = 0;
	private $pais_id = 0;  private $dpto_id = 0;  private $prvn_id = 0;  private $dstt_id = 0;  private $pers_domicilio = '';
	private $pers_mail = '';  private $pers_web  = '';  private $pers_foto = '';  private $pers_observ = '';  private $pers_estado = '';
	private $indiv_key = '';  private $indiv_dni = '';  private $indiv_appaterno = '';  private $indiv_apmaterno = '';  private $indiv_nombres = '';
	private $indiv_fechanac = '';  private $tipsex_id = '';
	private $perstransp_id = 0;  private $perstransp_key = '';  private $perstransp_code = '';
	private $persimpor_id = 0;  private $persimpor_key = '';  private $tipimpor_id = 0;  private $persimpor_code = '';
	private $repleg_indiv_key = '';  private $estado_sol  = '';
 
	public function setTipdocident_id( $val )  { $this->tipdocident_id = $val; }
	public function getTipdocident_id()        { return $this->tipdocident_id; }

	public function setPers_ruc( $val )        { $this->pers_ruc = $val; }
	public function getPers_ruc()              { return $this->pers_ruc; }

	public function setPers_nombre( $val )     { $this->pers_nombre = $val; }
	public function getPers_nombre()           { return $this->pers_nombre; }

	public function setPers_nombre02( $val )   { $this->pers_nombre02 = $val; }
	public function getPers_nombre02()         { return $this->pers_nombre02; }
 
	public function setPers_abrev( $val )      { $this->pers_abrev = $val; }
	public function getPers_abrev()            { return $this->pers_abrev; }

	public function setIndiv_id( $val )        { $this->indiv_id = $val; }
	public function getIndiv_id()              { return $this->indiv_id; }

	public function setGrupempr_id( $val )     { $this->grupempr_id = $val; }
	public function getGrupempr_id()           { return $this->grupempr_id; }

	public function setPais_id( $val )         { $this->pais_id = $val; }
	public function getPais_id()               { return $this->pais_id; }

	public function setDpto_id( $val )         { $this->dpto_id = $val; }
	public function getDpto_id()               { return $this->dpto_id; }
	
	public function setPrvn_id( $val )         { $this->prvn_id = $val; }
	public function getPrvn_id()               { return $this->prvn_id; }

	public function setDstt_id( $val )         { $this->dstt_id = $val; }
	public function getDstt_id()               { return $this->dstt_id; }

	public function setPers_domicilio( $val )  { $this->pers_domicilio = $val; }
	public function getPers_domicilio()        { return $this->pers_domicilio; }

	public function setPers_mail( $val )       { $this->pers_mail = $val; }
	public function getPers_mail()             { return $this->pers_mail; }

	public function setPers_web( $val )        { $this->pers_web = $val; }
	public function getPers_web()              { return $this->pers_web; }

	public function setPers_foto( $val )       { $this->pers_foto = $val; }
	public function getPers_foto()             { return $this->pers_foto; }

	public function setPers_observ( $val )     { $this->pers_observ = $val; }
	public function getPers_observ()           { return $this->pers_observ; }

	public function setPers_estado( $val )     { $this->pers_estado = $val; }
	public function getPers_estado()           { return $this->pers_estado; }

	/*  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	public function setIndiv_key( $val )        { $this->indiv_key = $val; }
	public function getIndiv_key()              { return $this->indiv_key; }

	public function setIndiv_dni( $val )        { $this->indiv_dni = $val; }
	public function getIndiv_dni()              { return $this->indiv_dni; }

	public function setIndiv_appaterno( $val )  { $this->indiv_appaterno = $val; }
	public function getIndiv_appaterno()        { return $this->indiv_appaterno; }

	public function setIndiv_apmaterno( $val )  { $this->indiv_apmaterno = $val; }
	public function getIndiv_apmaterno()        { return $this->indiv_apmaterno; }

	public function setIndiv_nombres( $val )    { $this->indiv_nombres = $val; }
	public function getIndiv_nombres()          { return $this->indiv_nombres; }

	public function setIndiv_fechanac( $val )   { $this->indiv_fechanac = $val; }
	public function getIndiv_fechanac()         { return $this->indiv_fechanac; }

	public function setTipsex_id( $val )        { $this->tipsex_id = $val; }
	public function getTipsex_id()              { return $this->tipsex_id; }

	public function setRepleg_indiv_key( $val ) { $this->repleg_indiv_key = $val; }
	public function getRepleg_indiv_key()       { return $this->repleg_indiv_key; }

	public function setPerstransp_id( $val )    { $this->perstransp_id = $val; }
	public function getPerstransp_id()          { return $this->perstransp_id; }

	public function setPerstransp_key( $val )   { $this->perstransp_key = $val; }
	public function getPerstransp_key()         { return $this->perstransp_key; }

	public function setPerstransp_code( $val )  { $this->perstransp_code = $val; }
	public function getPerstransp_code()        { return $this->perstransp_code; }

	public function setPersimpor_id( $val )     { $this->persimpor_id = $val; }
	public function getPersimpor_id()           { return $this->persimpor_id; }

	public function setPersimpor_key( $val )    { $this->persimpor_key = $val; }
	public function getPersimpor_key()          { return $this->persimpor_key; }

	public function setTipimpor_id( $val )      { $this->tipimpor_id = $val; }
	public function getTipimpor_id()            { return $this->tipimpor_id; }

	public function setPersimpor_code( $val )   { $this->persimpor_code = $val; }
	public function getPersimpor_code()         { return $this->persimpor_code; }

	public function setEstado_sol( $val )       { $this->estado_sol = $val; }
	public function getEstado_sol()             { return $this->estado_sol; }

	public function actualiza() {
		$this->sql = "SELECT personas_update('$this->type_edit', '$this->pers_id', '$this->pers_key',
						  '$this->tipdocident_id', '$this->pers_ruc',  '$this->pers_nombre', '$this->pers_nombre02',
						  '$this->pers_abrev',     '$this->indiv_key', '$this->grupempr_id',
						   $this->pais_id,         $this->dpto_id,     $this->prvn_id,       $this->dstt_id,     '$this->pers_domicilio',
						  '$this->pers_mail',      '$this->pers_web',  '$this->pers_observ', '$this->usursess_key')";
		$this->pers_key = parent::execute_01();
	}

	public function actualiza_rap() {
		$this->indiv_fechanac = ( $this->indiv_fecha == "" ? 'NULL' : "'" . $this->indiv_fechanac . "'" );
		$this->sql = "SELECT personas_update_fast('$this->tipo_edit', '$this->pers_id', '$this->pers_key',
						  '$this->tipdocident_id', '$this->pers_ruc',        '$this->pers_nombre',     '$this->pais_id',       '$this->pers_domicilio',
						  '$this->indiv_dni',      '$this->indiv_appaterno', '$this->indiv_apmaterno', '$this->indiv_nombres',
						   $this->indiv_fechanac,  '$this->tipsex_id',       '$this->usur_key')";
		//echo $this->sql;
		$this->pers_key = parent::execute_01();
	}


	public function actualiza_transportistas() {
		$this->sql = "SELECT personas_update_transportistas('$this->type_edit', '$this->pers_id', '$this->pers_key',
						  '$this->perstransp_code', '$this->tipdocident_id', '$this->pers_ruc', '$this->pers_nombre', '$this->pais_id', '$this->pers_domicilio', '$this->usursess_key')";
		//echo $this->sql;
		$this->pers_key = parent::execute_01();
	}

	public function actualiza_importadores() {
		$this->sql = "SELECT personas_importadores_update('$this->tipo_edit', '$this->persimpor_id', '$this->persimpor_key',
						  '$this->pers_id', '$this->pers_key', '$this->tipimpor_id', '$this->usur_key', '$this->menu_id')";
		//echo $this->sql;
		$this->pers_key = parent::execute_01();
	}

	public function registros() {
		$this->sql = "SELECT personas_records('o', 
						  '$this->pers_id',     '$this->pers_key', '$this->tipdocident_id', '$this->pers_ruc', '$this->pers_nombre', '$this->indiv_id',        '$this->indiv_key',
						  '$this->grupempr_id', '$this->pais_id',  '$this->dpto_id',        '$this->prvn_id',  '$this->dstt_id',     '0', '$this->repleg_indiv_key', '$this->perstransp_code',
						  '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
					  FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}