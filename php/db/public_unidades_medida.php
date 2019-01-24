<?php
require_once 'conexion.php';

class Public_Unidades_Medida extends Conexion {
    private $unimed_id = 0;  private $unimed_flga = '';  private $unimed_nombre = '';  private $unimed_nombre02 = '';
    private $unimed_abrev = '';  private $unimed_abrev02 = '';  private $unimed_equiv = 0;  private $unimed_bien = 'NULL';  private $unimed_serv = 'NULL';  private $unimed_estado = 'NULL';
    
    public function setUnimed_id( $val )       { $this->unimed_id = $val; }
    public function getUnimed_id()             { return $this->unimed_id; }

    public function setUnimed_flga( $val )     { $this->unimed_flga = $val; }
    public function getUnimed_flga()           { return $this->unimed_flga; }
 
    public function setUnimed_nombre( $val )   { $this->unimed_nombre = $val; }
    public function getUnimed_nombre()         { return $this->unimed_nombre; }

    public function setUnimed_nombre02( $val ) { $this->unimed_nombre02 = $val; }
    public function getUnimed_nombre02()       { return $this->unimed_nombre02; }

    public function setUnimed_abrev( $val )    { $this->unimed_abrev = $val; }
    public function getUnimed_abrev()          { return $this->unimed_abrev; }

    public function setUnimed_abrev02( $val )  { $this->unimed_abrev02 = $val; }
    public function getUnimed_abrev02()        { return $this->unimed_abrev02; }

    public function setUnimed_equiv( $val )    { $this->unimed_equiv = $val; }
    public function getUnimed_equiv()          { return $this->unimed_equiv; }

    public function setUnimed_bien( $val )     { $this->unimed_bien = $val; }
    public function getUnimed_bien()           { return $this->unimed_bien; }

    public function setUnimed_serv( $val )     { $this->unimed_serv = $val; }
    public function getUnimed_serv()           { return $this->unimed_serv; }

    public function setUnimed_estado( $val )   { $this->unimed_estado = $val; }
    public function getUnimed_estado()         { return $this->unimed_estado; }
    
    public function registros() {
        $this->sql = "SELECT unidades_medida_records('o', 
                         '$this->unimed_id', '$this->unimed_nombre', '$this->unimed_abrev', '$this->unimed_equiv',
                          $this->unimed_bien, $this->unimed_serv,   $this->unimed_estado,
                         '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start'); 
                      FETCH ALL IN o";
        return parent::executeSQL();
    }
}
?>