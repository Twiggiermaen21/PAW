<?php
require_once dirname(__FILE__) . '/../config.php';
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';
function getParams(&$form)
{
	$form['x'] = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$form['y'] = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$form['op'] = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;
}

function validate(&$form, &$infos, &$msgs_z, &$hide_intro)
{
	if (!(isset($form['x']) && isset($form['y']) && isset($form['op'])))	return false;
	$hide_intro = true;

	$infos[] = 'Przekazano parametry.';

	if ($form['x'] == "") $msgs_z[] = 'Nie podano liczby 1';
	if ($form['y'] == "") $msgs_z[] = 'Nie podano liczby 2';


	if (count($msgs_z) == 0) {
		if (!is_numeric($form['x'])) $msgs_z[] = 'Pierwsza wartość nie jest liczbą';
		if (!is_numeric($form['y'])) $msgs_z[] = 'Druga wartość nie jest liczbą';
	}

	if (count($msgs_z) > 0) return false;
	else return true;
}

function process(&$form, &$infos, &$msgs_z, &$result_z)
{
	$infos[] = 'Parametry poprawne. Wykonuję obliczenia.';

	$form['x'] = floatval($form['x']);
	$form['y'] = floatval($form['y']);

	switch ($form['op']) {
		case 'minus':
			$result_z = $form['x'] - $form['y'];
			$form['op_name'] = '-';
			break;
		case 'times':
			$result_z = $form['x'] * $form['y'];
			$form['op_name'] = '*';
			break;
		case 'div':
			$result_z = $form['x'] / $form['y'];
			$form['op_name'] = '/';
			break;
		default:
			$result_z = $form['x'] + $form['y'];
			$form['op_name'] = '+';
			break;
	}
}

$form = null;
$infos = array();
$messages_z = array();
$result_z = null;
$hide_intro = false;

$kwota = null;
$miesiecy = null;
$oprocentowanie = null;





getParams($form);
if (validate($form, $infos, $messages_z, $hide_intro)) {
	process($form, $infos, $messages_z, $result_z);
}

$smarty_number = new Smarty();

$smarty_number->assign('app_url',_APP_URL);
$smarty_number->assign('root_path',_ROOT_PATH);

$smarty_number->assign('infos',$infos);
$smarty_number->assign('hide_intro',$hide_intro);
$smarty_number->assign('result_z',$result_z);
$smarty_number->assign('messages_z',$messages_z);
$smarty_number->assign('form',$form);

$smarty_number->assign('kwota',$kwota);
$smarty_number->assign('miesiecy',$miesiecy);
$smarty_number->assign('oprocentowanie',$oprocentowanie);

$smarty_number->display(_ROOT_PATH.'/app/home.tpl');
