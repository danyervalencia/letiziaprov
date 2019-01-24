<?php
session_start();
require_once "config.php";
require_once CON . DIRECTORY_SEPARATOR . "session_validate_interno.php";
require_once LIB . DIRECTORY_SEPARATOR . "fffff.php";
require_once LIB . DIRECTORY_SEPARATOR . "ppppp.php";
require_once LIB . DIRECTORY_SEPARATOR . "pdf.php";
//require_once LIB . DIRECTORY_SEPARATOR . "pdf.php";
//require_once LIB . DIRECTORY_SEPARATOR . "function01.php";
require_once MOD . DIRECTORY_SEPARATOR . "v000.php";
require_once MOD . DIRECTORY_SEPARATOR . "usuario_acceso.php";

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf = new PDF("P", "mm", "A4");
$pdf->SetFillColor(192, 192, 192);
$pdf->SetTextColor(0, 0, 0);

//$pdf->AliasNbPages();
//$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
//$pdf->SetFillColor(192, 192, 192);
//$pdf->SetTextColor(0, 0, 0);
//$pdf->SetTopMargin(0);
//$pdf->SetTopMargin(0);

$pdf->ini_x = 9;   $pdf->eje_x = $pdf->ini_x;
$pdf->ini_y = 20;  $pdf->eje_y = $pdf->ini_y;
$pdf->h_row = 5;   $pdf->max =   190;
$nro = 1;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ob = new Usuario_Acceso();
$ob->setUsuracce_key( $_REQUEST["phpUSURACCE_KEY"] );
$ar = $ob->registros();

$pdf->fnNuevaPagina( 5000 );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, 5, "", "LTR", 0, 'C');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "B", 9);
//$pdf->Cell(189, 5, "CONSTANCIA "." DE ". " ENTREGA "." DE "." ACCESO "." A "." ". "SIGEM", "LR", 0, 'C');
$pdf->Cell(189, 5, "CONSTANCIA  ENTREGA  CONTRASEÑA  DE  ACCESO  A  SIGEM", "LR", 0, 'C');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, 5, "", "LR", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(189, 5, " La presente constancia certifica la entrega de la Constraseña de acceso al Sistema Integrado de Gestion Municipal ( SIGEM ), ", "LR", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(189, 5, " a la persona: ", "LR", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(5,   $pdf->h_row, "", "L", 0, 'L');
$pdf->Cell(34,  $pdf->h_row, "DNI", "", 0, 'L');
$pdf->Cell(4,   $pdf->h_row, ":",   "", 0, 'L');
$pdf->SetFont('helvetica', "B", 9);
$pdf->Cell(146, $pdf->h_row, $ar[0]["indiv_dni"], "R", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(5,   $pdf->h_row, "", "L", 0, 'L');
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(34,  $pdf->h_row, "Apellidos y Nombres", "", 0, 'L');
$pdf->Cell(4,   $pdf->h_row, ":",            "", 0, 'L');
$pdf->SetFont('helvetica', "B", 9);
$pdf->Cell(146, $pdf->h_row, $ar[0]["apenom"], "R", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(5,   $pdf->h_row, "", "L", 0, 'L');
$pdf->Cell(34,  $pdf->h_row, "Login de Usuario", "", 0, 'L');
$pdf->Cell(4,   $pdf->h_row, ":", "", 0, 'L');
$pdf->SetFont('helvetica', "B", 9);
$pdf->Cell(146, $pdf->h_row, $ar[0]["usur_login"], "R", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(5,   $pdf->h_row, "", "L", 0, 'L');
$pdf->Cell(34,  $pdf->h_row, "Contraseña", "", 0, 'L');
$pdf->Cell(4,   $pdf->h_row, ":", "", 0, 'L');
$pdf->SetFont('helvetica', "B", 9);
$pdf->Cell(146, $pdf->h_row, $ar[0]["usur_clave"], "R", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(5,   $pdf->h_row, "", "L", 0, 'L');
$pdf->Cell(34,  $pdf->h_row, "Año de Trabajo", "", 0, 'L');
$pdf->Cell(4,   $pdf->h_row, ":", "", 0, 'L');
$pdf->SetFont('helvetica', "B", 9);
$pdf->Cell(146, $pdf->h_row, $ar[0]["ano_eje"], "R", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(5,   $pdf->h_row, "", "L", 0, 'L');
$pdf->Cell(34,  $pdf->h_row, "Unidad Orgánica", "", 0, 'L');
$pdf->Cell(4,   $pdf->h_row, ":", "", 0, 'L');
$pdf->SetFont('helvetica', "B", 9);
$pdf->Cell(146, $pdf->h_row, $ar[0]["area_nombre"], "R", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(5,   $pdf->h_row, "", "L", 0, 'L');
$pdf->Cell(34,  $pdf->h_row, "Cargo", "", 0, 'L');
$pdf->Cell(4,   $pdf->h_row, ":", "", 0, 'L');
$pdf->SetFont('helvetica', "B", 9);
$pdf->Cell(146, $pdf->h_row, $ar[0]["cargo_nombre"], "R", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', "", 9);
$pdf->Cell(5,   $pdf->h_row, "", "L", 0, 'L');
$pdf->Cell(34,  $pdf->h_row, "Ingreso Requerimiento", "", 0, 'L');
$pdf->Cell(4,   $pdf->h_row, ":", "", 0, 'L');
$pdf->SetFont('helvetica', "B", 9);
$pdf->Cell(146, $pdf->h_row, $ar[0]["tirq_nombre03"], "R", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, 5, "", "LR", 0, 'L');

$pdf->SetFont('helvetica', "", 9);
$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, $pdf->h_row, " La persona ha tomado conocimiento de las operaciones que pueda realizar en el sistema por medio de esta contraseña, asi como", "LR", 0, 'L');

$pdf->SetFont('helvetica', "", 9);
$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, $pdf->h_row, " de las responsabilidades que se asume por el extravio, perdida o uso indebido de dicho acceso.", "LR", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, 5, "", "LR", 0, 'L');

$pdf->SetFont('helvetica', "", 9);
$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, $pdf->h_row, " Asi mismo ha tomado conocimiento que toda operación que se realice a traves del SIGEM por medio de esta contraseña, se ", "LR", 0, 'L');

$pdf->SetFont('helvetica', "", 9);
$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, $pdf->h_row, " entenderá que ha sido efectuada por el titular de la cuenta", "LR", 0, 'L');


$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, 5, "", "LR", 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(189, $pdf->h_row*7, "", "LR", 0, 'L');

$pdf->eje_y += $pdf->h_row*7;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(40, $pdf->h_row, "", "L", 0, "L");
$pdf->Cell(30, $pdf->h_row, "................................................", "", 0, "C");
$pdf->Cell(54, $pdf->h_row, "", "", 0, "L");
$pdf->Cell(30, $pdf->h_row, "..............................", "", 0, "C");
$pdf->Cell(35, $pdf->h_row, "", "R", 0, "L");

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(40, $pdf->h_row, "", "L", 0, 'L');
$pdf->Cell(30, $pdf->h_row, "Firma", "", 0, "C");
$pdf->Cell(54, $pdf->h_row, "", "", 0, 'L');
$pdf->Cell(30, $pdf->h_row, "Huella Digital", "", 0, "C");
$pdf->Cell(35, $pdf->h_row, "", "R", 0, "L");

$ejy += $h_row; $pdf->fnEstablecerEjes( $ejy, $ejx );
$pdf->Cell(184, $h_row*2, "", "LR", 0, 'L');

$ejy += $h_row*2;
$pdf->fnEstablecerEjes( $ejy, $ejx );
$pdf->Cell(10, $h_row, "", "L", 0, "L");
$pdf->SetFont('helvetica', "B", 9);
$pdf->Cell(174, $h_row, "Recibido por :", "R", 0, "L");
$pdf->SetFont('helvetica', "", 9);

$ejy += $h_row;
$pdf->fnEstablecerEjes( $ejy, $ejx );
$pdf->Cell(10,  $h_row, "", "L", 0, "L");
$pdf->Cell(36, $h_row, "El representante Legal : ", "", 0, "L");
$pdf->Cell(138, $h_row, "[ ".($ar[0]["indiv_id"] == "0" ? "X" : "")." ]", "R", 0, "L");

$ejy += $h_row;
$pdf->fnEstablecerEjes( $ejy, $ejx );
$pdf->Cell(10,  $h_row, "", "L", 0, "L");
$pdf->Cell(36, $h_row, "Tercero autorizado : ", "", 0, "L");
$pdf->Cell(10, $h_row, "[ ".($ar[0]["indiv_id"] == "0" ? " "." " : "X")." ]", "", 0, "L");
$pdf->Cell(128, $h_row, ($ar[0]["indiv_id"] == "0" ? "" : $ar[0]["indiv_dni"]." ".$ar[0]["ir_indiv_apno"]), "R", 0, "L");

$ejy += $h_row;
$pdf->fnEstablecerEjes( $ejy, $ejx );
$pdf->Cell(184, $h_row, "", "LRB", 0, 'L');

$pdf->Output();
?>