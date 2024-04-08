<?php
require_once 'init.php';


switch ($action) {
	default:

			$ctrl = new app\controllers\CalcCtrl();
			$ctrl->generateView();
		
		break;
	case 'CalcView':

		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView();
		break;
	case 'Calc':

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
}
