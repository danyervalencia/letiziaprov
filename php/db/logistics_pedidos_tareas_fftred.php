<?php
require_once 'conexion.php';

class Logistics_Pedidos_Tareas_Fftred extends Conexion {
    private $pedtareafte_id = 0;  private $pedtareafte_flga = '';  private $ped_id = 0;  private $pedtareafte_item  = 0;
    private $tareafte_id = 0;  private $espedet_id = 0;  private $pedtareafte_estado = 'NULL';

    private $ped_key = '';  private $tareafte_key = '';
    private $tarea_key = '';  private $tareacomp_key = '';  private $fuefin_id = 0;  private $tiprecur_id = 0;

    public function setPedtareafte_id( $val )   { $this->pedtareafte_id = $val; }
    public function getPedtareafte_id()         { return $this->pedtareafte_id; }

    public function setPedtareafte_flga( $val ) { $this->pedtareafte_flga = $val; }
    public function getPedtareafte_flga()       { return $this->pedtareafte_flga; }

    public function setPed_id( $val )           { $this->ped_id = $val; }
    public function getPed_id()                 { return $this->ped_id; }

    public function setPedtareafte_item( $val ) { $this->pedtareafte_item = $val; }
    public function getPedtareafte_item()       { return $this->pedtareafte_item; }

    public function setTareafte_id( $val )      { $this->tareafte_id = $val; }
    public function getTareafte_id()            { return $this->tareafte_id; }

    public function setEspedet_id( $val )       { $this->espedet_id = $val; }
    public function getEspedet_id()             { return $this->espedet_id; }

    public function setPedtareafte_estado( $val ) { $this->pedtareafte_estado = $val; }
    public function getPedtareafte_estado()       { return $this->pedtareafte_estado; }

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function setPed_key( $val ) { $this->ped_key = $val; }
    public function getPed_key() { return $this->ped_key; }

    public function setTareafte_key( $val ) { $this->tareafte_key = $val; }
    public function getTareafte_key() { return $this->tareafte_key; }

    public function setTarea_key( $val ) { $this->tarea_key = $val; }
    public function getTarea_key() { return $this->tarea_key; }

    public function setTareacomp_key( $val ) { $this->tareacomp_key = $val; }
    public function getTareacomp_key() { return $this->tareacomp_key; }

    public function setFuefin_id( $val ) { $this->fuefin_id = $val; }
    public function getFuefin_id() { return $this->fuefin_id; }

    public function setTiprecur_id( $val ) { $this->tiprecur_id = $val; }
    public function getTiprecur_id() { return $this->tiprecur_id; }

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function registros() {
        $this->sql  = "SELECT logistics.pedidos_tareas_fftred_records('o',
                            '$this->pedtareafte_id', '$this->ped_id', '$this->pedtareafte_item', '$this->tareafte_id', '$this->espedet_id', $this->pedtareafte_estado, 
                            '$this->ped_key', '$this->tareafte_key',
                            '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                       FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>