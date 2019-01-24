<?php
abstract class Conexion {
	//la clase es abstracta porque solo se podra heredar esta clase mas no usar new
	private static $serv = "127.0.0.1";
	//private static $serv = "20.0.0.2";
	//private static $serv = "128.121.0.11";
	//private static $serv = "10.10.10.30"; // para acceder a variables estaticas se usa self Ã³ parent
	private static $port = "5433";
	private static $user = "postgres";
	private static $pass = "Magaly123";
	//private static $pass = "MpMn2015#..";
	//private static $pass = "CeticosIlo";
	//private static $pass = "Gra16Aqp*";
	//protected      $base = "ceticos";
	//protected      $base = "letizia_mpmn";
	protected      $base = "letizia";

	private $ErServ = "Error al tratar conectarse con el Servidor PostgreSQL, consulte con DBA";
	//private $ErBase = "Error al seleccionar la Base de Datos";
	private $conn;

	protected $sql       = "";  protected $arra    = array();  protected $rows   = array();
	protected $type_edit = 0;   protected $menu_id = 0;        protected $net_ip = "";

	protected $perssess_key = "";  protected $persacce_key = "";  protected $persacce_id = 0;  protected $persacce_psw1 = "";  protected $persacce_psw2 = "";  protected $pers_id = 0;  protected $pers_key = "";
	protected $year_id = 0;  protected $unieje_id = 0;  protected $unieje_key = "";  protected $area_id = 0;  protected $area_key = "";
	protected $fechaini = "";  protected $fechafin = "";  protected $monto_min = "0";  protected $monto_max = "0";
	protected $type_record = "";  protected $type_query = "";  protected $type_report = "";
	protected $order_by = "";  protected $record_limit = "1";  protected $record_start = "";

	public function setRows($val)         { $this->rows = $val; }
	public function getRows()             { return $this->rows; }

	public function setType_edit($val)    { $this->type_edit = $val; }
	public function getType_edit()        { return $this->type_edit; }

	public function setMenu_id($val)      { $this->menu_id = $val; }
	public function getMenu_id()          { return $this->menu_id; }

	public function setNet_ip($val)       { $this->net_ip = $val; }
	public function getNet_ip()           { return $this->net_ip; }

	public function setPerssess_key($val) { $this->perssess_key = $val; }
	public function getPerssess_key()     { return $this->perssess_key; }

	public function setPersacce_key($val) { $this->persacce_key = $val; }
	public function getPersacce_key()     { return $this->persacce_key; }

	public function setPersacce_id($val)  { $this->persacce_id = $val; }
	public function getPersacce_id()      { return $this->persacce_id; }

	public function setPersacce_psw1($val){ $this->persacce_psw1 = $val; }
	public function getPersacce_psw1()    { return $this->persacce_psw1; }

	public function setPersacce_psw2($val){ $this->persacce_psw2 = $val; }
	public function getPersacce_psw2()    { return $this->persacce_psw2; }	

	public function setPers_id($val) { $this->pers_id = $val; }
	public function getPers_id() { return $this->pers_id; }

	public function setPers_key($val){ $this->pers_key = $val; }
	public function getPers_key() { return $this->pers_key; }

	public function setYear_id($val) { $this->year_id = $val; }
	public function getYear_id() { return $this->year_id; }

	public function setUnieje_id($val) { $this->unieje_id = $val; }
	public function getUnieje_id() { return $this->unieje_id; }

	public function setUnieje_key($val) { $this->unieje_key = $val; }
	public function getUnieje_key() { return $this->unieje_key; }

	public function setArea_id($val) { $this->area_id = $val; }
	public function getArea_id() { return $this->area_id; }

	public function setArea_key($val) { $this->area_key = $val; }
	public function getArea_key() { return $this->area_key; }

	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	public function setFechaini($val)     { $this->fechaini = $val; }
	public function getFechaini()           { return $this->fechaini; }

	public function setFechafin($val)     { $this->fechafin = $val; }
	public function getFechafin()           { return $this->fechafin; }

	public function setMonto_min($val)    { $this->monto_min = $val; }
	public function getMonto_min()          { return $this->monto_min; }

	public function setMonto_max($val)    { $this->monto_max = $val; }
	public function getMonto_max()          { return $this->monto_max; }

	public function setType_record($val)  { $this->type_record = $val; }
	public function getType_record()        { return $this->type_record; }

	public function setType_query($val)   { $this->type_query = $val; }
	public function getType_query()         { return $this->type_query; }

	public function setType_report($val)  { $this->type_report = $val; }
	public function getType_report()        { return $this->type_report; }

	public function setOrder_by($val)     { $this->order_by = $val; }
	public function getOrder_by()           { return $this->order_by; }

	public function setRecord_limit($val) { $this->record_limit = $val; }
	public function getRecord_limit()       { return $this->record_limit; }

	public function setRecord_start($val) { $this->record_start = $val; }
	public function getRecord_start()       { return $this->record_start; }

	public function getConn() { return $this->conn; }

	private function conectar() {
		$this->conn = pg_pconnect("host=" .self::$serv. " port=" .self::$port. " dbname=" .$this->base. " user=" .self::$user. " password=" .self::$pass);
		if ( $this->conn ) { return $conn; }
		else               { echo $this->ErServ; }
	}

	private function desconectar() {
		pg_close( $this->conn );
	}

	public function execute() { // ejecuta sentencia SQL que solo devuleve error si lo hubiera ( ejm: raise exception )
		$this->conectar();
		pg_query("SET NAMES 'utf8'");
		$this->ejec = @pg_query($this->conn, $this->sql) or die( substr(pg_last_error(), 6) );
		$this->desconectar();
		pg_free_result( $this->ejec );
	}

	public function execute_01() { // ejecuta sentencia SQL que devuelve un codigo que devuelve el precedimiento almacenado
		$this->conectar();
		pg_query("SET NAMES 'utf8'");
		$this->ejec = @pg_query($this->conn, $this->sql) or die( substr(pg_last_error(), 6) );
		$this->desconectar();
		$n = pg_fetch_row( $this->ejec );
		pg_free_result( $this->ejec );
		return $n[0];
	}

	public function execute_03() { // ejecuta SQL que devuelve una sola fila ( registro )
		$this->rows = array();
		$this->conectar();
		pg_query("SET NAMES 'utf8'");
		$this->ejec = @pg_query($this->conn, $this->sql) or die( substr(pg_last_error(), 6) );
		$this->desconectar();

		while ( $this->rows[] = pg_fetch_assoc( $this->ejec ) );
		pg_free_result( $this->ejec );
		array_pop( $this->rows ); // array_pop  ELIMINA el ultimo elmento del array
		if ( count( $this->rows ) != 1 ) { $this->rows = array(); }
		return $this->rows;
	}

	public function execute_04() { // ejecuta SQL que devuelve conjunto de resultados ( registro ), de 0  mas
		$this->arra = array();
		$this->conectar();
		pg_query("SET NAMES 'utf8'");
		$this->ejec = @pg_query( $this->conn, $this->sql) or die( substr(pg_last_error(), 6) );
		$this->desconectar();

		while ( $this->arra[] = pg_fetch_assoc( $this->ejec ) );
		pg_free_result( $this->ejec );
		array_pop( $this->arra ); // array_pop  ELIMINA el ultimo elmento del array
	}
	
	public function executeSQL() { // ejecuta SQL que devuelve conjunto de resultados ( registro ), de 0  mas
		$this->rows = array();
		$this->conectar();
		pg_query("SET NAMES 'utf8'");
		$this->ejec = @pg_query( $this->conn, $this->sql) or die( substr(pg_last_error(), 6) );
		$this->desconectar();

		while ( $this->rows[] = pg_fetch_assoc( $this->ejec ) );
		pg_free_result( $this->ejec );
		array_pop( $this->rows ); // array_pop  ELIMINA el ultimo elmento del array
		return $this->rows;
	}
}
?>