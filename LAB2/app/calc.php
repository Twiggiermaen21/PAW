<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kwota, &$miesiecy, &$oprocentowanie){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $miesiecy = isset($_REQUEST['miesiecy']) ? $_REQUEST['miesiecy'] : null;
    $oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;

}

function validate(&$kwota, &$miesiecy, &$oprocentowanie, &$messages){
	global $role;
if ( ! (isset($oprocentowanie) && isset($miesiecy) && isset($kwota))){
	return false;
}
if ( $kwota == "" || $kwota == "000"){
	$messages [] = 'Nie podano kwoty';
}
if ( $miesiecy == "" || $miesiecy == "0"){
	$messages [] = 'Nie podano liczby miesięcy';
}
if ( $oprocentowanie == "" ||$oprocentowanie =="0" ){
	$messages [] = 'Nie podano oprocentowania rocznego';
}

if (empty( $messages )){
	if (! is_numeric( $kwota )){
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';

	}
	if (! is_numeric( $miesiecy )){
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $oprocentowanie )){
		$messages [] = 'Trzecia wartość nie jest liczbą';
	}	
}
if (empty( $messages )){
if($oprocentowanie < 10   && $role == 'admin'){
	$messages [] = "Tylko administrator może przydzielić kredyt o oprocentrowaniu poniżej 10%.";
}
if($kwota > 100000 && $role == 'admin'){
	$messages [] = "Tylko administrator może przydzielić kredyt powyżej 100 000 PLN";
}
}
if (empty( $messages )) return true; 
	else return false;
}

function process(&$kwota, &$miesiecy, &$oprocentowanie, &$result){
	$miesiecy = intval($miesiecy);
	$kwota = intval($kwota);
	$oprocentowanie = floatval($oprocentowanie);
	$result=round(($kwota*(($oprocentowanie/100)/12)*pow((1+(($oprocentowanie/100)/12)),$miesiecy))/(pow((1+(($oprocentowanie/100)/12)),$miesiecy)-1),2);
}

function koszty(&$result,&$kwota,&$miesiecy,&$calkowityKoszt,&$koszt){
	$calkowityKoszt=round(($result*$miesiecy),2);
	$koszt=round($calkowityKoszt-$kwota,2);
}


$kwota = null;
$miesiecy= null;
$oprocentowanie= null;
$result = null;
$messages = array();
$calkowityKoszt=null;
$koszt=null;

getParams($kwota, $miesiecy, $oprocentowanie,);
if(validate($kwota, $miesiecy, $oprocentowanie, $messages)){
    process($kwota, $miesiecy, $oprocentowanie, $result);
	koszty($result,$kwota, $miesiecy,$calkowityKoszt,$koszt);
}

include 'calc_view.php';