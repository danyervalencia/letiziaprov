<?php 
session_start();
$result['success'] = false;
if ( $_POST['xx0005'] == 'YES' ) {
} else {
    $result['msg'] = 'Usuario intruso no hay permiso de conexión';
    echo json_encode($result);  exit;
}

require_once 'session_validate.php';
if ( $result['success'] == false ) {
    echo json_encode($result);  exit;
}

require_once 'db/public_personas_fonos.php';
$ob = new Public_Personas_Fonos();
$ob->setType_edit( $_POST['persfono_key'] == '' ? '1' : '2' );
$ob->setPersfono_key($_POST['persfono_key']);
$ob->setPers_key($_POST['pers_key']);
$ob->setTipfono_id($_POST['tipfono_id']*1 <= 0 ? 'NULL' : "'".$_POST['tipfono_id']."'");
$ob->setCompfono_id($_POST['compfono_id']*1 <= 0 ? 'NULL' : "'".$_POST['compfono_id']."'");
$ob->setPersfono_nro($_POST['persfono_nro'] );
$ob->setPersfono_observ($_POST['persfono_observ'] );
$ob->setPersfono_estado( $_POST['_persfono_estado'] == 'on' ? '1' : '0' );
$ob->setUsursess_key( $_USURSESS_KEY );
$ob->setMenu_id($_POST['menu_id'] );

$ob->actualiza();
if ( substr($ob->getPersfono_key(), 0, 10) == 'YTLLLL-OVC' ) {
    $result['success'] = true;
    $result['msg'] = 'Datos se han guardado en forma satisfactoria';
    $result['key'] = substr($ob->getPersfono_key(), 10, 32);
} else {
}

echo json_encode($result);
?>