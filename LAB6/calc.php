<?php
require_once 'init.php';


switch ($action) {
	default:
		include 'check.php';
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView();

		break;
	case 'login':
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogin();
		break;
	case 'CalcView':
		include 'check.php';
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView();
		break;
	case 'Calc':
		include 'check.php';
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->process();
		break;
	case 'NumbersView':

		$ctrl = new app\controllers\CalcNumbers();
		$ctrl->generateView();
		break;
	case 'Numbers':

		$ctrl = new app\controllers\CalcNumbers();
		$ctrl->process();
		break;

	case 'logout': 
		include 'check.php';  
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogout();
		break;
}
