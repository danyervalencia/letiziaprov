<?php
require_once 'conexion.php';

class Modelo extends Conexion {
    private $table = '';  private $id    = 0;   private $id_md5   = '';  private $key = '';
    private $field = '';  private $value = '';  private $valor_ip = '';  private $field_sequence = '';

    private $schema_table = '';  private $table_field = '';  private $record_key = '';  private $record_field = '';  private $file_name = '';

    public function setTable( $val )          { $this->table = $val; }
    public function getTable()                { return $this->table; }

    public function setId( $val )             { $this->id = $val; }
    public function getId()                   { return $this->id; }

    public function setId_md5( $val )         { $this->id_md5 = $val; }
    public function getId_md5()               { return $this->id_md5; }

    public function setKey( $val )            { $this->key = $val; }
    public function getKey()                  { return $this->key; }

    public function setField( $val )          { $this->field = $val; }
    public function getField()                { return $this->field; }

    public function setValue( $val )          { $this->value = $val; }
    public function getValue()                { return $this->value; }
 
    public function setValor_ip( $val )       { $this->valor_ip = $val; }
    public function getValor_ip()             { return $this->valor_ip; }

    public function setField_sequence( $val ) { $this->field_sequence = $val; }
    public function getField_sequence()       { return $this->field_sequence; }

    public function setSchema_table( $val )   { $this->schema_table = $val; }
    public function getSchema_table()         { return $this->schema_table; }

    public function setTable_field( $val )    { $this->table_field = $val; }
    public function getTable_field()          { return $this->table_field; }

    public function setRecord_key( $val )     { $this->record_key = $val; }
    public function getRecord_key()           { return $this->record_key; }

    public function setRecord_field( $val )   { $this->record_field = $val; }
    public function getRecord_field()         { return $this->record_field; }

    public function setFile_name( $val )      { $this->file_name = $val; }
    public function getFile_name()            { return $this->file_name; }


    public function buscar_registro() {
        if ( $this->campo == '' ) {
            $this->sql = "SELECT query03('o', '" . $this->tabla . "', '" .$this->codigo. "'); FETCH ALL IN o";
        } else {
            $this->sql = "SELECT query03('o', '$this->tabla', '$this->campo', '$this->codigo'); FETCH ALL IN o";
        }
        //echo $this->sql;
        return parent::execute_03();
        /*if ( count($this->arra) == 1 ) { $this->rows = $this->arra; }
        else                           { $this->rows = array(); }*/
    }

    public function eliminar_registro() {
        $this->sql = "DELETE FROM " . $this->tabla . " WHERE " . $this->campo . " = '" . $this->codigo . "'";
        parent::execute();
    }

    public function nuevo_id() {
        $this->sql = "SELECT fn_new_id('$this->tabla', '$this->campo_ip', '$this->valor_ip', '$this->usur_id', '$this->campo_secuencia');";
        //echo $this->sql;
        $this->id_md5 = parent::execute_01();
    }

    public function registros() {
        $this->sql = "SELECT table_records('o', '$this->table', '$this->field', '$this->value', '$this->order_by'); FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }

    public function subir_archivo() {
        $this->sql  = "SELECT upload_file('$this->schema_table', '$this->table_field', '$this->record_key',
                        '$this->record_field', '$this->file_name', '$this->usursess_key')";
        //echo $this->sql;
        $this->key = parent::execute_01();
    }
}
?>