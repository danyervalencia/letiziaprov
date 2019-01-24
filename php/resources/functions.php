<?php
function fnCauxNew( $table, $camp_ip, $usur_id, $campo_secuencia ) {
	require_once "config.php";
	require_once MOD . DIRECTORY_SEPARATOR . "modelo.php";
	$ob = new Modelo();
	$ob->setTabla($table);
	$ob->setCampo_ip($camp_ip);
	$ob->setValor_ip(fnGetRealIP());
	$ob->setUsur_id( $usur_id );
	$ob->setCampo_secuencia($campo_secuencia);
	$ob->nuevo_id();
	return $ob->getId_md5();
}

function fnCellColor( $cells, $color ){
	global $objPHPExcel;
	$objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(
		array("type" => PHPExcel_Style_Fill::FILL_SOLID,
			  "startcolor" => array("rgb" => $color)
		));
}

function fnDateAddDays( $pdFecha, $pnNumero = 0, $pcFormat = "") {
	if ( $pcFormat == "SQL" ) {
		$lc = date( "Y-m-d", strtotime("+" .$pnNumero. " day", strtotime($pdFecha)) );
	} else {
		$lc = date( "d/m/Y", strtotime("+" .$pnNumero. " day", strtotime($pdFecha)) );
	} 
	return $lc;
}

function fnDateDDMMAAAA( $pdFech ) {
	if ( $pdFech == "" ) {
		$lcRetu = "";
	} else {
		$laData = split("-", $pdFech);
		$lcRetu = $laData[2] ."/". $laData[1] ."/". $laData[0];
	}
	return $lcRetu;
}

function fnDateLetters( $pnDsm, $pnDia, $pnMes, $pnAno ) {
	$lcLetr = fnDayWeekLetters($pnDsm) .', '. $pnDia . ' de ' . fnMonthLetters($pnMes) . ' del ' . $pnAno;
	return $lcLetr;
}

function fnDateSQL( $pdFech ) {
	if ( $pdFech == '' ) {
		$lcRetu = '';
	} else {
		$laData = split( "/", $pdFech );
		$lcRetu = $laData[2] ."-". $laData[1] ."-". $laData[0];
	}
	return $lcRetu;
}

function fnDateSQLReturnDay( $pdFecha ) {
	if ( $pdFecha == '' ) { $lcReturn = ''; } 
	else { $lcReturn = substr($pdFecha, 8, 2);
	}
	return $lcReturn;
}

function fnDateSQLReturnMonthLetters( $pdFecha ) {
	if ( $pdFecha == '' ) { 
		$lcReturn = ''; 
	} else { 
		$laMeses = Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre');
		$lcReturn = $laMeses[substr($pdFecha, 5, 2)*1];
	}
	return $lcReturn;
}

function fnDateSQLReturnYear( $pdFecha ) {
	if ( $pdFecha == '' ) { $lcReturn = ''; } 
	else { $lcReturn = substr($pdFecha, 0, 4);
	}
	return $lcReturn;
}

function fnDatesDifference( $diff, $pcTipo ) {
	$segundos = $diff % 60;
	$segundos = str_pad( $segundos, 2, "0", STR_PAD_LEFT );
	$diff     = floor($diff / 60);
	$minutos  = $diff % 60;
	$minutos  = str_pad($minutos, 2, "0", STR_PAD_LEFT);
	$diff     = floor($diff / 60);
	$horas    = $diff;
	$cadena   = ( pcTipo == '' ) ? $horas .":". $minutos .":". $segundos : $horas;
	return $cadena;
}

function fnDatesRange( $pdFech, $pdFe01, $pdFe02 ) {
	$fe = fnDTOS( $pdFech );
	$f1 = fnDTOS( $pdFe01 );
	$f2 = fnDTOS( $pdFe02 );
	if ( $f2 == 0 ) { $f2 = 99999999; }
	if ( $fe >= $f1 && $fe <= $f2 ) { return TRUE; }
	else                            { return FALSE; }
}

function fnDayWeekLetters( $pnDsm ) {
	$laLedi = Array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
	return $laLedi[$pnDsm];
}

function fnDayWeekLettersTilde( $pnDsm ) {
	$laLedi = Array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
	return $laLedi[$pnDsm];
}

function fnDTOS( $pdFech ) {
	if ( pdFech == '' ) { $lcRetu = 0; }
	else                { $lcRetu = substr($pdFech,0,4) . substr($pdFech,5,2) . substr($pdFech,8,2); }
	return $lcRetu;
}

function fnEmptyIfZero( $pnNume ) {
	if ( $pnNume == 0 ) {
	   return "";
	} else {
	   return number_format( $pnNume, 2 );
	}
}

function fnEncrypta( $pcCadena, $pcTipo ) {
	$lc = "";
	$ln = strlen(trim($pcCadena));
	for ( $i=0; $i<$ln; $i++ ) {
		$c = substr($pcCadena, $i, 1);
		$c = ord($c)*1;

		if ( $pcTipo == "E" ) {
			if      ( $c <= 16  ) { $c += 16; }
			else if ( $c <= 32  ) { $c -= 16; }
			else if ( $c <= 48  ) { $c += 16; }
			else if ( $c <= 64  ) { $c -= 16; }
			else if ( $c <= 80  ) { $c += 16; }
			else if ( $c <= 96  ) { $c -= 16; }
			else if ( $c <= 112 ) { $c += 16; }
			else if ( $c <= 128 ) { $c -= 16; }
			else if ( $c <= 144 ) { $c += 16; }
			else if ( $c <= 160 ) { $c -= 16; }
			else if ( $c <= 176 ) { $c += 16; }
			else if ( $c <= 192 ) { $c -= 16; }
			else if ( $c <= 208 ) { $c += 16; }
			else if ( $c <= 224 ) { $c -= 16; }
			else if ( $c <= 240 ) { $c += 16; }
			else if ( $c <= 256 ) { $c -= 16; }
			
			if      ( $c <= 32 )  { $c += 32; }
			else if ( $c <= 64 )  { $c -= 32; }
			else if ( $c <= 96 )  { $c += 32; }
			else if ( $c <= 128 ) { $c -= 32; }
			else if ( $c <= 160 ) { $c += 32; }
			else if ( $c <= 192 ) { $c -= 32; }
			else if ( $c <= 224 ) { $c += 32; }
			else if ( $c <= 256 ) { $c -= 32; }

			if      ( $c <= 64  ) { $c += 64; }
			else if ( $c <= 128 ) { $c -= 64; }
			else if ( $c <= 192 ) { $c += 64; }
			else if ( $c <= 256 ) { $c -= 64; }
		} else if ( $pcTipo == "D" ) {
			if      ( $c <= 64  ) { $c += 64; }
			else if ( $c <= 128 ) { $c -= 64; }
			else if ( $c <= 192 ) { $c += 64; }
			else if ( $c <= 256 ) { $c -= 64; }

			if      ( $c <= 32 )  { $c += 32; }
			else if ( $c <= 64 )  { $c -= 32; }
			else if ( $c <= 96 )  { $c += 32; }
			else if ( $c <= 128 ) { $c -= 32; }
			else if ( $c <= 160 ) { $c += 32; }
			else if ( $c <= 192 ) { $c -= 32; }
			else if ( $c <= 224 ) { $c += 32; }
			else if ( $c <= 256 ) { $c -= 32; }

			if      ( $c <= 16  ) { $c += 16; }
			else if ( $c <= 32  ) { $c -= 16; }
			else if ( $c <= 48  ) { $c += 16; }
			else if ( $c <= 64  ) { $c -= 16; }
			else if ( $c <= 80  ) { $c += 16; }
			else if ( $c <= 96  ) { $c -= 16; }
			else if ( $c <= 112 ) { $c += 16; }
			else if ( $c <= 128 ) { $c -= 16; }
			else if ( $c <= 144 ) { $c += 16; }
			else if ( $c <= 160 ) { $c -= 16; }
			else if ( $c <= 176 ) { $c += 16; }
			else if ( $c <= 192 ) { $c -= 16; }
			else if ( $c <= 208 ) { $c += 16; }
			else if ( $c <= 224 ) { $c -= 16; }
			else if ( $c <= 240 ) { $c += 16; }
			else if ( $c <= 256 ) { $c -= 16; }            
		}

		$lc = $lc ."". chr($c);
	}
	return $lc;
}

function fnExecuteSQL( $pc ) {
	echo $lcCade;
}

function fnFirstDayYear( $ldFech ) {
	$ldFech = substr($ldFech, 0, 5) . "01-01";
	return $ldFech;
}

function fnFirstDayMonth( $ldFech ) {
	$ldFech = substr($ldFech, 0, 8) . "01";
	return $ldFech;
}

function fnGetColumnExcel( $piCol ) {
	$_ac = Array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	if ( $piCol*1 <= 25 ) {
		$_return = $_ac[$piCol];
	} else {
		$_1 = floor($piCol / 25)*1 - 1;
		$_2 = ($piCol % 25)*1 - 1;
		$_return = $_ac[$_1].$_ac[$_2];
	}
	return $_return;
}

function fnGetRealIP() {
	if ( !empty($_SERVER["HTTP_CLIENT_IP"]) ) return $_SERVER["HTTP_CLIENT_IP"];
	if ( !empty($_SERVER["HTTP_X_FORWARDED_FOR"]) ) return $_SERVER["HTTP_X_FORWARDED_FOR"];
	return $_SERVER["REMOTE_ADDR"];
}
	
function fnHoursElapsed( $pcFere, $pcHore ) {
	$ti01 = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
	$lcF = fnDTOS( $pcFere );
	$lcH = fnTTOS( $pcHore );
	$ti02 = mktime( substr($lcH,0,2)*1, substr($lcH,2,2)*1, substr($lcH,4,2)*1,
					substr($lcF,4,2)*1, substr($lcF,6,2)*1, substr($lcF,0,4)*1 );
	$ln = $ti01 - $ti02;
	return fnDiferenciaFechas( $ln, 'H' );
}

function fnMonthLetters( $pnMes ) {
	$laLeme = Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre');
	return $laLeme[$pnMes];
}

function fnNume01( $pnNume, $pnNdec ) {
	if ($pnNume == 0) {
		return "";
	} else {
		return number_format( $pnNume, $pnNdec );
	}
}

function fnPadLeft( $pnNume, $pnLeng, $pcCade ) {
	if ( $pnNume*1 > 0 ) {
		return sprintf( "%0" . $pnCero."s", $pnNume );
	} else {
		return "";
	}
}

function fnPhp2js ($var) {
	if (is_array($var)) {
		$res = "[";
		$array = array();
		foreach ($var as $a_var) {
			$array[] = php2js($a_var);
		}
		return "[" . join(",", $array) . "]";
	}
	elseif (is_bool($var)) {
		return $var ? "true" : "false";
	}
	elseif (is_int($var) || is_integer($var) || is_double($var) || is_float($var)) {
		return $var;
	}
	elseif (is_string($var)) {
		return "\"" . addslashes(stripslashes($var)) . "\"";
	}

	return FALSE;
}

function fnRepeat( $pcChar, $pnNume ) {
	$lc = "";
	for ( $i=1; $i <= $pnNume*1; $i++ ) { $lc = $lc ."". $pcChar; }     
	return $lc;
}

function fnRoundDosDec( $pcNume ) {
   $lc = round($pcNume * 100) / 100;
   return $lc;
}

function fnTTOS( $pcHora ) {
	if ( pcHora == '' ) { $lcRetu = 0; }
	else                { $lcRetu = substr($pcHora,0,2) . substr($pcHora,3,2) . substr($pcHora,6,2); }
	return $lcRetu;
}

function fnSQLChar( $pcCadena ) {
	$cadena = trim($pcCadena);

	//$cadena = str_replace("\", "\", $pcCadena);
	$cadena = str_replace("'", "\'", $pcCadena);
	$cadena = str_replace(",", "\,", $pcCadena);

	return $cadena;
}

function fnZerosLeft( $pnNume, $pnCero ){
	if ( $pnNume == '' ) {
		return '';
	} else {
		return sprintf("%0" . $pnCero."s", $pnNume);
	}
}
?>