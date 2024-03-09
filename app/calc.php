<?php
require_once dirname(__FILE__).'/../config.php';

$kwota = $_REQUEST ['kwota'];
$miesiecy = $_REQUEST ['miesiecy'];
$oprocentowanie = $_REQUEST ['oprocentowanie'];
$calkowityKoszt=0;
$koszt=0;

if ( ! (isset($oprocentowanie) && isset($miesiecy) && isset($kwota))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


if ( $kwota == "" || $kwota == "000") {
	$messages [] = 'Nie podano kwoty';
}
if ( $miesiecy == "" || $miesiecy == "0") {
	$messages [] = 'Nie podano liczby miesięcy';
}
if ( $oprocentowanie == "" ||$oprocentowanie =="0" ) {
	$messages [] = 'Nie podano oprocentowania rocznego';
}

	

if (empty( $messages )) {
	if (! is_numeric( $kwota )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	if (! is_numeric( $miesiecy )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $oprocentowanie )) {
		$messages [] = 'Trzecia wartość nie jest liczbą';
	}	
}


if (empty ( $messages )) { 
	$miesiecy = intval($miesiecy);
	$kwota = intval($kwota);
	$oprocentowanie = floatval($oprocentowanie);
	
	$result=round(($kwota*(($oprocentowanie/100)/12)*pow((1+(($oprocentowanie/100)/12)),$miesiecy))/(pow((1+(($oprocentowanie/100)/12)),$miesiecy)-1),2);
	

	$calkowityKoszt=round(($result*$miesiecy),2);
	$koszt=round($calkowityKoszt-$kwota,2);
}

include 'calc_view.php';