<?php
session_start();
require_once '../resources/functions.php';
require_once '../resources/pdf.php';
require_once '../db/public_personas_accesos.php';

$ob = new Public_Personas_Accesos();
$ob->setPers_key( $_REQUEST['xxPers_key'] );
$ob->setType_record('CONSTANCIA');
$ar = $ob->registros();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 13);
        $this->Ln(6);        
        $this->Cell(5);
        $this->Cell(184, 2, ', 'LTR', 0, 'C');
        $this->Ln(2);
        $this->Cell(5);
        $this->Cell(184, 6, 'MUNICIPALIDAD '.' PROVINCIAL '. ' DE '.' ILO', 'LR', 0, 'C');
        $this->Ln(6);
        $this->Cell(5);
        $this->Cell(184, 6, 'MPI', 'LR', 0, 'C');
        $this->Ln(4);
        $this->Cell(5);
        $this->Cell(184, 4, ', 'LBR', 0, 'C');
    }

    function Footer() { //Pie de página
    	$gg = time();
        $fecha = date(d.'/'.m.'/'.Y) .'   '. date( 'H:i:s' , $gg); //strftime( '%Y-%m-%d-%H-%M-%S', time() );
        $this->SetFont('Arial', 'I', 7);
        $this->SetY(-9);
        $this->Cell(7);
        $this->Cell(110, 5, $_REQUEST['xxCodigo'].'*Pág. '.$this->PageNo().' / {nb}'.' ( '.$_SESSION['scCod_usur'].'-'.$_SESSION['scCod_v003'].' )', 0, 0, 'R');
        $this->Cell(70, 5, $fecha.'  '.$_SESSION['reg'], 0, 0, 'R');
    }
} */

/////////////////////////////////////////////////////////////////////////////////////////////
$pdf = new PDF('P', 'mm', 'A4');
$pdf->SetFillColor(192, 192, 192);
$pdf->SetTextColor(0, 0, 0);

$pdf->ini_x = 15;   $pdf->eje_x = $pdf->ini_x;
$pdf->ini_y = 30;   $pdf->eje_y = $pdf->ini_y;
$pdf->h_row = 4;    $pdf->max = 190;

$pdf->fnNuevaPagina(2500);
$pdf->SetFont('helvetica', '', 9);

$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );

$pdf->Cell(184, 5, '', 'LTR', 0, 'C');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(184, 8, 'CONSTANCIA  DE  ENTREGA  DE  CLAVE  S.I.A.P.', 'LR', 0, 'C');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(184, $pdf->h_row, ' La presente constancia certifica la entrega de la clave de acceso al S.I.A.P., al provedor:', 'LR', 0, 'L');

$pdf->eje_y += 2;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, 2, '', 'LR', 0, 'L');
$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(5, $pdf->h_row, '', 'L', 0, 'L');
$pdf->Cell(21,$pdf->h_row, 'RUC', '', 0, 'L');
$pdf->Cell(4, $pdf->h_row, ':', '', 0, 'L');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(154, $pdf->h_row, $ar[0]['pers_ruc'], 'R', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(5, $pdf->h_row, '', 'L', 0, 'L');
$pdf->Cell(21, $pdf->h_row, utf8_encode('Razón Social'), '', 0, 'L');
$pdf->Cell(4, $pdf->h_row, ':', '', 0, 'L');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(154, $pdf->h_row, $ar[0]['pers_nombre'], 'R', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(5, $pdf->h_row, '', 'L', 0, 'L');
$pdf->Cell(21, $pdf->h_row, 'Repr. Legal', '', 0, 'L');
$pdf->Cell(4, $pdf->h_row, ':', '', 0, 'L');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(154, $pdf->h_row, utf8_decode($ar[0]['repleg_apenom']), 'R', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(5, $pdf->h_row, '', 'L', 0, 'L');
$pdf->Cell(21, $pdf->h_row, 'E-mail', '', 0, 'L');
$pdf->Cell(4, $pdf->h_row, ':', '', 0, 'L');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(154, $pdf->h_row, $ar[0]['pers_mail'], 'R', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', '', 9);
//La entrega se realizó en sobre cerrado, sellado con Nro
$pdf->Cell(83, $pdf->h_row, utf8_encode(' La entrega se realizó en sobre cerrado, sellado con Nro '), 'L', 0, 'L');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(101, $pdf->h_row, $ar[0]['clav_id'].'.', 'R', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(184, $pdf->h_row, ' A traves del cual el proveedor declara bajo juramento:', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, ' Autorizar expresamente para que se me notifique por medio del SIAP todos los actos administrativos y/o procesos de', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, utf8_encode(' selección.'), 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, utf8_encode(' La notificación a través del SIAP prevalece sobre cualquier medio que se haya utilizado adicionalmente, siendo '), 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, utf8_encode(' responsabilidad del participante el permanente seguimiento del respectivo proceso a través del SIAP. '), 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, ' Someterme al cumplimiento de la Directiva 0.0000.00000', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, utf8_encode(' He tomado conocimiento de que el uso de la Clave SIAP es de plena responsabilidad del Titular y/o Representante Legal'), 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, ' asi como el extravio, perdida o uso indebido.', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, utf8_encode(' Asimismo, he tomado conocimiento que toda transacción que se realice a traves del SIAP con la clave de acceso, se'), 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, utf8_encode(' entenderá que ha sido efectuada por el proveedor.'), 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, ' Autorizo por medio de la presente a que se me notifique mis respectivas Ordenes de Compra y/o Servicio, asi como los demas.', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, utf8_encode(' documentos administrativos al Correo Electrónico  el cual he consignado:'), 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row*7, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row*7;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(40, $pdf->h_row, '', 'L', 0, 'L');
$pdf->Cell(30, $pdf->h_row, '................................................', '', 0, 'C');
$pdf->Cell(50, $pdf->h_row, '', '', 0, 'L');
$pdf->Cell(30, $pdf->h_row, '..............................', '', 0, 'C');
$pdf->Cell(34, $pdf->h_row, '', 'R', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(40, $pdf->h_row, '', 'L', 0, 'L');
$pdf->Cell(30, $pdf->h_row, 'Firma', '', 0, 'C');
$pdf->Cell(50, $pdf->h_row, '', '', 0, 'L');
$pdf->Cell(30, $pdf->h_row, 'Huella Digital', '', 0, 'C');
$pdf->Cell(34, $pdf->h_row, '', 'R', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row*2, '', 'LR', 0, 'L');

$pdf->eje_y += $pdf->h_row*2;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(10, $pdf->h_row, '', 'L', 0, 'L');
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(174, $pdf->h_row, 'Recibido por :', 'R', 0, 'L');
$pdf->SetFont('helvetica', '', 9);

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(10,  $pdf->h_row, '', 'L', 0, 'L');
$pdf->Cell(36, $pdf->h_row, 'El representante Legal : ', '', 0, 'L');
$pdf->Cell(138, $pdf->h_row, '[ '.($ar[0]['indiv_id'] == '' ? 'X' : '  ').' ]', 'R', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(10,  $pdf->h_row, '', 'L', 0, 'L');
$pdf->Cell(36, $pdf->h_row, 'Tercero autorizado : ', '', 0, 'L');
$pdf->Cell(10, $pdf->h_row, '[ '.($ar[0]['indiv_id'] == '' ? '  ' : 'X').' ]', '', 0, 'L');
$pdf->Cell(128, $pdf->h_row, ($ar[0]['indiv_id'] == '' ? '' : $ar[0]['repleg_dni'].' '.$ar[0]['repleg_apenom']), 'R', 0, 'L');

$pdf->eje_y += $pdf->h_row;
$pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(184, $pdf->h_row, '', 'LRB', 0, 'L');

$pdf->Output();
?>