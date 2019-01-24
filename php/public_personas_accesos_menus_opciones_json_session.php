<?php
session_start();
if($_SESSION['scPersacce_key'] == ""){exit;}
require_once 'db/public_personas_accesos.php';
$ob = new Public_Personas_Accesos();
$ob->setPersacce_key( $_SESSION['scPersacce_key'] );

$_dat = array();  $_menu_root = ''; $ar = $ob->registros_session();
foreach ( $ar as $row ) {
	if ( $row['menu_root'] !== $_menu_root ) {
		if ( $_menu_root !== '' ) {
			$_dat[] = array('menu_id'=>$_menu_parent, 'menu_type'=>$_menu_type, 'menu_leaf'=>$_menu_leaf, 'menu_par'=>'0',
			                'menu_nombre'=>$_menu_nombre, 'menu_name'=>$_menu_name, 'menu_css' =>$_menu_css,  'items'=>$_i );
		}
		$_i = array();
		$_menu_id = $row['menu_id'];  $_menu_type = $row['menu_type'];  $_menu_leaf = $row['menu_leaf'];
		$_menu_nombre = $row['menu_nombre'];  $_menu_name = $row['menu_name'];  $_menu_css  = $row['menu_css'];
		$_menu_parent = $row['menu_parent'];  $_menu_root = $row['menu_root'];
	}

	$_i[] = array('menu_id'=>$row['menu_id'], 'menu_type'=>$row['menu_type'], 'menu_leaf'=>$row['menu_leaf'], 'menu_par'=>$row['menu_parent'],
		          'menu_nombre'=>$row['menu_nombre'], 'submenu_nombre'=>$row['submenu_nombre'], 'menu_name'=>$row['menu_name'], 'submenu_name'=>$row['submenu_name'],
		          'menu_xtype'=>$row['menu_xtype'], 'menu_controller'=>$row['menu_controller'], 'menu_css'=>$row['menu_css']);
}
$_dat[] = array('menu_id'=>$_menu_parent, 'menu_type'=>$_menu_type, 'menu_leaf'=>$_menu_leaf, 'menu_par'=>'0',
                'menu_nombre'=>$_menu_nombre, 'menu_name'=>$_menu_name, 'menu_css'=>$_menu_css, 'items'=>$_i );

echo json_encode( array('items'=>$_dat) );