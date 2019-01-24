<?php
require_once 'conexion.php';

class Public_Menus extends Conexion {
    private $menu_flga = '';  private $modu_id = 0;  private $menu_parent = 0;  private $menu_type = 0;  private $menu_leaf = 0;
    private $menu_nombre = '';  private $menu_abrev = '';  private $menu_orden = 0;  private $menu_xtype = '';  private $menu_name = '';
    private $menu_css = '';  private $menu_url = '';  private $menu_estado = 0;  private $menu_key = '';

    public function setMenu_flga( $val )   { $this->menu_flga = $val; }
    public function getMenu_flga()         { return $this->menu_flga; }

    public function setMenu_parent( $val ) { $this->menu_parent = $val; }
    public function getMenu_parent()       { return $this->menu_parent; }

    public function setMenu_type( $val )   { $this->menu_type = $val; }
    public function getMenu_type()         { return $this->menu_type; }

    public function setMenu_leaf( $val )   { $this->menu_leaf = $val; }
    public function getMenu_leaf()         { return $this->menu_leaf; }

    public function setMenu_nombre( $val ) { $this->menu_nombre = $val; }
    public function getMenu_nombre()       { return $this->menu_nombre; }

    public function setMenu_abrev( $val )  { $this->menu_abrev = $val; }
    public function getMenu_abrev()        { return $this->menu_abrev; }

    public function setMenu_orden( $val )  { $this->menu_orden = $val; }
    public function getMenu_orden()        { return $this->menu_orden; }

    public function setMenu_xtype( $val )  { $this->menu_xtype = $val; }
    public function getMenu_xtype()        { return $this->menu_xtype; }

    public function setMenu_name( $val )   { $this->menu_name = $val; }
    public function getMenu_name()         { return $this->menu_name; }

    public function setMenu_css( $val )    { $this->menu_css = $val; }
    public function getMenu_css()          { return $this->menu_css; }

    public function setMenu_url( $val )    { $this->menu_url = $val; }
    public function getMenu_url()          { return $this->menu_url; }

    public function setMenu_estado( $val ) { $this->menu_estado = $val; }
    public function getMenu_estado()       { return $this->menu_estado; }

    public function setMenu_key( $val )    { $this->menu_key = $val; }
    public function getMenu_key()          { return $this->menu_key; }

    public function registros() {
    	$this->sql = "SELECT menus_records('o',
                          '$this->menu_id', '$this->menu_key', '$this->modu_id', $this->menu_parent, '$this->menu_type',
                          '$this->menu_leaf', '$this->menu_nombre', '$this->menu_abrev', '$this->menu_url', $this->menu_estado,
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>