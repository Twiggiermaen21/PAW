<?php
require_once dirname(__FILE__).'/../config.php';

$kwota = $_REQUEST ['kwota'];
$miesiecy = $_REQUEST ['miesiecy'];
$oprocentowanie = $_REQUEST ['oprocentowanie'];


if ( ! (isset($oprocentowanie) && isset($miesiecy) && isset($kwota))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


if ( $kwota == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $miesiecy == "") {
	$messages [] = 'Nie podano ilosci miesiecy';
}
if ( $oprocentowanie == "") {
	$messages [] = 'Nie podano oprocentowania';
}

	

if (empty( $messages )) {
	if (! is_numeric( $kwota )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	if (! is_numeric( $miesiecy )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $oprocentowanie )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
}


if (empty ( $messages )) { 
	$miesiecy = intval($miesiecy);
	$kwota = intval($kwota);
	$oprocentowanie = intval($oprocentowanie);
	
	$result=($kwota*($oprocentowanie/12)*(1+($oprocentowanie/12))^$miesiecy)/((1+($oprocentowanie/12))^$miesiecy-1);
}

include 'calc_view.php';