<?php
require_once 'db/public_menus.php';

$ob = new Public_Menus();
$ob->setMenu_id( $_POST['xxMenu_id'] == '' ? '0' : $_POST['xxMenu_id'] );
$ob->setMenu_key( $_POST['xxMenu_key'] );
$ob->setMenu_parent( $_POST['xxMenu_parent'] == '' ? 'NULL' : "'".$_POST['xxMenu_parent']."'" );
$ob->setMenu_type( $_POST['xxMenu_type'] == '' ? '0' : $_POST['xxMenu_type'] );
$ob->setMenu_leaf( $_POST['xxMenu_leaf'] == '' ? '0' : $_POST['xxMenu_leaf'] );
$ob->setMenu_nombre( $_POST['xxMenu_nombre'] );
$ob->setMenu_abrev( $_POST['xxMenu_abrev'] );
$ob->setMenu_url( $_POST['xxMenu_url'] );
$ob->setMenu_estado( $_POST['xxMenu_estado'] == '' ? 'NULL' : "'".$_POST['xxMenu_estado']."'" );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );

if ( $_POST['xxPaginate'] == '1' ) {
     $ob->setRecord_limit('');
     $ar = $ob->registros();
     foreach ( $ar as $row ) { $_total = $row["treg"]; }

     $ob->setRecord_limit( $_POST['limit'] );
     $ob->setRecord_start( $_POST['start'] );
}
$ar = $ob->registros();

$_dat = array(); $_menu_root = '';
if ( $_POST['xxType_record'] == 'menu_proveedores' ) {
    foreach ( $ar as $row ) {
        if ( $row['menu_root'] !== $_menu_root ) {
            if ( $_menu_root !== '' ) {
                $_dat[] = array('menu_id' => $_menu_parent, 'menu_type' => $_menu_type, 'menu_leaf' => $_menu_leaf, 'menu_par' => '0',
                                'menu_nombre' => $_menu_nombre, 'menu_name' => $_menu_name, 'menu_css'  => $_menu_css,  'items' => $_i );
            }
            $_i = array();
            $_menu_id = $row['menu_id'];  $_menu_type = $row['menu_type'];  $_menu_leaf = $row['menu_leaf'];
            $_menu_nombre = $row['menu_nombre'];  $_menu_name = $row['menu_name'];  $_menu_css  = $row['menu_css'];
            $_menu_parent = $row['menu_parent'];  $_menu_root = $row['menu_root'];
        }

        $_i[] = array('menu_id' => $row['menu_id'], 'menu_type' => $row['menu_type'], 'menu_leaf' => $row['menu_leaf'], 'menu_par' => $row['menu_parent'],
                      'menu_nombre' => $row['menu_nombre'], 'submenu_nombre' => $row['submenu_nombre'], 'menu_name' => $row['menu_name'], 'submenu_name' => $row['submenu_name'],
                      'menu_xtype' => $row['menu_xtype'], 'menu_css' => $row['menu_css']);
    }
    $_dat[] = array('menu_id' => $_menu_parent, 'menu_type' => $_menu_type, 'menu_leaf' => $_menu_leaf, 'menu_par' => '0',
                    'menu_nombre' => $_menu_nombre, 'menu_name' => $_menu_name, 'menu_css' => $_menu_css, 'items' => $_i );

    echo json_encode( array('items' => $_dat) );
}
?>