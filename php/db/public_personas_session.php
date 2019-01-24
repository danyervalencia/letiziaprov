<?php
require_once "conexion.php";

class Public_Personas_Session extends Conexion {
	private $perssess_fechaing = '';  private $perssess_fechasal = '';  private $perssess_estado = 'NULL'; private $php_session_id = '';
	private $perssess_ip = '';  private $perssess_device = 0;  private $perssess_type = '';  private $perssess_so = '';  private $perssess_browser = '';
	private $persacce_login  = '';

	public function setPerssess_fechaing( $val ) { $this->perssess_fechaing = $val; }
	public function getPerssess_fechaing()       { return $this->perssess_fechaing; }

	public function setPerssess_fechasal( $val ) { $this->perssess_fechasal = $val; }
	public function getPerssess_fechasal()       { return $this->perssess_fechasal; }

	public function setPerssess_estado( $val )   { $this->perssess_estado = $val; }
	public function getPerssess_estado()         { return $this->perssess_estado; }

	public function setPhp_session_id( $val )    { $this->php_session_id = $val; }
	public function getPhp_session_id()          { return $this->php_session_id; }

	public function setPerssess_ip( $val )       { $this->perssess_ip = $val; }
	public function getPerssess_ip()             { return $this->perssess_ip; }

	public function setPerssess_device( $val )   { $this->perssess_device = $val; }
	public function getPerssess_device()         { return $this->perssess_device; }

	public function setPerssess_type( $val )     { $this->perssess_type = $val; }
	public function getPerssess_type()           { return $this->perssess_type; }

	public function setPerssess_so( $val )       { $this->perssess_so = $val; }
	public function getPerssess_so()             { return $this->perssess_so; }

	public function setPerssess_browser( $val )  { $this->perssess_browser = $val; }
	public function getPerssess_browser()        { return $this->perssess_browser; }
	
	public function setPersacce_login( $val )    { $this->persacce_login = $val; }
	public function getPersacce_login()          { return $this->persacce_login; }

	public function actualiza() {
		$this->sql = "SELECT personas_session_update(
						  '$this->type_edit', '0', $this->perssess_estado,
						  '$this->php_session_id', '$this->perssess_ip', '$this->perssess_device', '$this->perssess_type', '$this->perssess_so', '$this->perssess_browser',
						  '$this->persacce_id', '$this->pers_id', '$this->unieje_id', '$this->persacce_login', '$this->persacce_psw1')";
		//echo $this->sql;
		$this->perssess_key = parent::execute_01();
	}

	public function registros() {
		$this->sql = "SELECT personas_session_records('o',
						  '0', '$this->perssess_key', $this->perssess_estado, '$this->php_session_id', '$this->perssess_ip', '$this->perssess_device',
						  '$this->persacce_id', '$this->pers_id', '$this->unieje_id', '$this->persacce_login', '$this->persacce_psw1', '$this->persacce_key', '$this->pers_key', '$this->unieje_key',
						  '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
						  FETCH ALL IN o";
		//echo $this->sql;
		return parent::executeSQL();
	}
}
?>