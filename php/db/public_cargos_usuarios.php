<?php
require_once "conexion.php";

class Public_Cargos_Usuarios extends Conexion {
    private $cargusur_flga = '';  private $cargusur_nombre = '';  private $cargusur_abrev = '';  private $cargusur_estado = 'NULL';

    public function setCargusur_flga( $val )   { $this->cargusur_flga = $val; }
    public function getCargusur_flga()         { return $this->cargusur_flga; }
    
    public function setCargusur_nombre( $val ) { $this->cargusur_nombre = $val; }
    public function getCargusur_nombre()       { return $this->cargusur_nombre; }
 
    public function setCargusur_abrev( $val )  { $this->cargusur_abrev = $val; }
    public function getCargusur_abrev()        { return $this->cargusur_abrev; }

    public function setCargusur_observ( $val ) { $this->cargusur_observ = $val; }
    public function getCargusur_observ()       { return $this->cargusur_observ; }

    public function setCargusur_estado( $val ) { $this->cargusur_estado = $val; }
    public function getCargusur_estado()       { return $this->cargusur_estado; }

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function registros() {
        $this->sql = "SELECT public.cargos_usuarios_records('o', 
                          $this->cargusur_id, '$this->cargusur_nombre', '$this->cargusur_abrev', $this->cargusur_estado,
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                          FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>