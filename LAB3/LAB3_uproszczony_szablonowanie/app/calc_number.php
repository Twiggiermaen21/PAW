<?php
require_once dirname(__FILE__).'/../config.php';

function getParams(&$form){
	$form['x'] = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$form['y'] = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$form['op'] = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;	
}

function validate(&$form,&$infos,&$msgs,&$hide_intro){
	if ( ! (isset($form['x']) && isset($form['y']) && isset($form['op']) ))	return false;	
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	if ( $form['x'] == "") $msgs [] = 'Nie podano liczby 1';
	if ( $form['y'] == "") $msgs [] = 'Nie podano liczby 2';
	
	
	if ( count($msgs)==0 ) {
		if (! is_numeric( $form['x'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
		if (! is_numeric( $form['y'] )) $msgs [] = 'Druga wartość nie jest liczbą';
	}
	
	if (count($msgs)>0) return false;
	else return true;
}
	
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	$form['x'] = floatval($form['x']);
	$form['y'] = floatval($form['y']);
	
	switch ($form['op']) {
	case 'minus' :
		$result = $form['x'] - $form['y'];
		$form['op_name'] = '-';
		break;
	case 'times' :
		$result = $form['x'] * $form['y'];
		$form['op_name'] = '*';
		break;
	case 'div' :
		$result = $form['x'] / $form['y'];
		$form['op_name'] = '/';
		break;
	default :
		$result = $form['x'] + $form['y'];
		$form['op_name'] = '+';
		break;
	}
}

$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

$page_title = 'Kalkulator zwykły';
$page_description = 'Najprostsze szablonowanie oparte na budowaniu widoku poprzez dołączanie kolejnych części HTML zdefiniowanych w różnych plikach .php';
$page_header = 'Proste szablony';
$page_footer = 'Dziękujemy za wizytę na stronie';
$next_page = 1;
include 'calc_number_view.php';