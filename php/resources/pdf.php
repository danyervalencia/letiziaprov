<?php
session_start();
require_once "../tcpdf/config/tcpdf_config.php";
require_once "../tcpdf/tcpdf.php";
require_once "../db/budget_unidades_ejecutoras.php";

Class PDF extends TCPDF {
	public $ini_x = 14;  public $ini_y = 20;  public $eje_x = 14;  public $eje_y = 20;  public $h_row = 0;  public $max = 0;  public $pdf_grupo = "";
	private $printer_header = "1"; private $printer_footer = "1";

	public function setPrinter_header( $val ) { $this->printer_header = $val; }
	public function setPrinter_footer( $val ) { $this->printer_footer = $val; }
	public function setTitle1( $val ) { $this->title1 = $val; }
	public function setTitle2( $val ) { $this->title2 = $val; }
	public function setTitle3( $val ) { $this->title3 = $val; }
	public function setFile_header( $val ) { $this->file_header = $val; }

	function Header() {
		if ($this->printer_header == "1" ) {
			$ob = new Budget_Unidades_Ejecutoras();
			$ob->setUnieje_key($GLOBALS["_UNIEJE_KEY"]);
			$ob->setType_record("rep_head");
			$_aue = $ob->registros();
			$this->Image("../../resources/images/".$_aue[0]["unieje_logo"], 14, 8, 11, 10);
			$this->SetFont("helvetica", "", 7);
			$this->setXY(26, 8);
			$this->Cell( 260 ,4, $_aue[0]["unieje_nombre"], "", 0, "L", false);
			$this->setXY(26, 11);
			$this->SetFont("helvetica", "", 6);
			$this->Cell( 260, 4, $_aue[0]["pers_ruc"], "", 0, "L", false);
			$this->setXY(26, 14);
			$this->SetFont("helvetica", "", 6);
			$this->Cell( 260, 4, $_aue[0]["uniejeanex_headreport"], "", 0, "L", false);
		}

		if ( $this->file_header != "" ) {
			include $this->file_header;
		}
	}

	function Footer() {
		if ( $this->printer_footer == "1" ) {
			$this->SetXY(8,-8);
			$this->SetFont("helvetica", "B", 5);
			$this->Cell(1);

			$_npag = "Pág. ".$this->PageNo()." / ".$this->getAliasNbPages();
			$_dia = date("d")."/".date("m")."/".date("Y"); 
			$_hora = date("H").":".date("i").":".date("s");
			$_usur = $_SESSION["scPerssess_key"]." - ".$_SESSION["scPersacce_key"];
			$this->Cell( 150 , 4, $_npag."  *  ".$_dia." * ".$_hora."  [ ".$_usur." ]", 0, 0, "L", false); 

		} else if ( $this->printer_footer == "logistics_ordenes_printer" ) {
			$_x = 14; $_y = -52;  $_doc_id = $GLOBALS["_ah"][0]["doc_id"];

			$_lc = ( $GLOBALS["_ah"][0]["doc_id"] == "516" ? "Jefatura Almacen" : "Solicitante" );
			$this->SetXY($_x, $_y);  $this->SetFont("helvetica", "B", 8);
			$this->Cell(140, 4.5, "Logística", 1, 0, "C", 1);
			$this->Cell(50, 4.5, "Conformidad ".( $_doc_id == "516" ? "Almacen" : "Servicio" ), 1, 0, "C", 1);

			$_y += 4;  $this->SetXY($_x, $_y);
			$this->Cell(140, 15, "", "LR", 0, "C");
			$this->Cell(50, 15, "", "LR", 0, "C");

			$_y += 15;  $this->SetXY($_x, $_y);
			$this->Cell(70, 3, fnRepeat(".", 40), "L", 0, "C");
			$this->Cell(70, 3, fnRepeat(".", 40), "R", 0, "C");
			$this->Cell(50, 3, fnRepeat(".", 40), "LR", 0, "C");

			$_y += 3;  $this->SetXY($_x, $_y);
			$this->Cell(70, 2, "Adquisiciones", "L", 0, "C");
			$this->Cell(70, 2, "Jefatura Logística", "R", 0, "C");
			$this->Cell(50, 2, $_lc, "LR", 0, "C");

			$_y += 2;  $this->SetXY($_x, $_y);
			$this->Cell(140, 2, "", "LR", 0, 'C');
			$this->Cell(50, 2, "", "LR", 0, 'C');

			$_y += 2;  $this->SetXY($_x+1, $_y); $this->SetFont('helvetica', "", 6);
			if ( $GLOBALS["_ah"][0]["doc_id"] == "516" ) {
				$this->MultiCell(138, 0, "Esta Orden de Compra es Nula sin la firma y sello del Jefe de Adquisiciones, Jefatura de Logística y el Jefe de Almacen; asi como también si sufre enmendaduras, adulteraciones, borrones, etc."."\n"."La institución se reserva el derecho de devolver la Mercaderia que no este de acuerdo a nuestras Especificaciones Técnicas"."\n"."En caso de incumplimiento de plazos se aplicará la Sanciones y/o Penalidades respectivas segun normativa vigente"."\n", 'T', 'J', 0, 1, "", "", false); 
			} else {
				$this->MultiCell(138, 0, "Esta Orden de Servicio es Nula sin la firma y sello del Jefe de Adquisiciones, Jefatura de Logística y la Conformidad respectiva; asi como también si sufre enmendaduras, adulteraciones, borrones, etc."."\n"."La institución se reserva el derecho de rechazar los Servicios que no esten de acuerdo a nuestros Términos de Referencia"."\n"."En caso de incumplimiento de plazos se aplicará la Sanciones y/o Penalidades respectivas segun normativa vigente"."\n", 'T', 'J', 0, 1, "", "", false);
			}
			$this->SetXY($_x, $_y); $this->Cell(1, 12.55, "", "LTB", 0, 'C');
			$this->SetXY($_x+139, $_y); $this->Cell(1, 12.55, "", "RTB", 0, 'C');
			$this->SetFont('helvetica', 'B', 7);
			$this->SetXY($_x+140, $_y); $this->Cell(13, 4, "Día", "1", 0, 'C');
			$this->SetXY($_x+153, $_y); $this->Cell(13, 4, "Mes", "1", 0, 'C');
			$this->SetXY($_x+166, $_y); $this->Cell(24, 4, "Año", "1", 0, 'C');

			$_y += 4;
			$this->SetXY($_x+140, $_y); $this->Cell(13, 8.55, "", "1", 0, 'C');
			$this->SetXY($_x+153, $_y); $this->Cell(13, 8.55, "", "1", 0, 'C');
			$this->SetXY($_x+166, $_y); $this->Cell(24, 8.55, "", "1", 0, 'C');

			$npag = 'Pág. '.$this->PageNo()." / ".$this->getAliasNbPages();
			$dia = date('d').'/'.date('m').'/'.date('Y'); 
			$hora = date('H').':'.date('i').':'.date('s');
			$usur = $_SESSION['scUsursess_key'].' - '.$_SESSION['scUsuracce_key'];
			$this->SetXY(14, 285);
			//$this->Cell( 150 , 4, $npag."  *  ".$dia.' * '.$hora.'  [ '.$usur.' ]', 0, 0, 'L', false);
			$this->Cell( 150 , 4, $npag."  *  [ ".$usur." ]", 0, 0, 'L', false);

		}
	}
	
	
	public function print_celda($value, $x, $y, $dim, $alto_linea = 4, $align="C", $max_chars = 50){
		//  $this->Cell(40,6, "adas dasdasda ","TRL",0,"C", false);
		$this->setXY($x,$y);
		$lines = wordwrap($value, $max_chars ,"_");
		$lines = explode("_",$lines);
		foreach($lines as $k => $line){
			if(strlen($line)> $max_chars){
				$lines[$k] = chunk_split($line, ($max_chars-3))."..";
			}
		}
			
		$px = $x;
		$py = $y;
		$n_lineas = sizeof($lines);
		$border = "TRL";
		if ( $n_lineas > 1) {
			foreach($lines as $k =>  $line) {
				if ($k == 0) {
					$border = "TRL";
				} else {
					$border = "RL";
				}
				$this->Cell($dim,$alto_linea, $line,$border,0, $align, false);
				$py+=$alto_linea;
				$this->setXY($px,$py);
			}
		} else {
			$this->Cell($dim,$alto_linea, $value,$border,0, $align , false);
		}
		return $n_lineas;
	} 

	public function emparejar($xi,$yi, $n_lineas, $altura_linea ){       
		$this->setXY($xi,$yi);
		for($i = 0; $i<=$n_lineas; $i++){
					$border = ($i == $n_lineas) ? "BRL" : "RL";
					
					$this->Cell($dim,$alto_linea, $line,$border,0,"C", false);
					$py+=$alto_linea;
					$this->setXY($px,$py);
		  }
	}

	public function fnEstablecerEjes( $pnYyyy, $pnXxxx ) {
		$this->SetY( $pnYyyy );
		$this->SetX( $pnXxxx );
	}

	public function fnNuevaPagina( $h = 0 ) {
		if ( $h == 0 ) {
			if ( $this->eje_y*1 >= $this->max*1 ) {
				$this->eje_y = $this->ini_y;
				$this->AddPage();
			}
		} else {
			if ( ($this->eje_y*1 + $h*1) >= $this->max*1 ) {
				$this->eje_y = $this->ini_y;
				$this->AddPage();
			}
		}
	}
}