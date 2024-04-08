<?php
require_once 'init.php';


switch ($action) {
	default : 
       
            include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		
            $ctrl = new CalcCtrl ();
            $ctrl->generateView ();
           
	break;
    case 'CalcView' :
        include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
    break;
	case 'Calc' :
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
	case 'NumbersView' :
        include_once $conf->root_path.'/app/calcNumbers/CalcNumbers.class.php';
		$ctrl = new CalcNumbersCtrl ();
		$ctrl->generateView ();
	break;
	case 'Numbers' :
		include_once $conf->root_path.'/app/calcNumbers/CalcNumbers.class.php';
		$ctrl = new CalcNumbersCtrl ();
		$ctrl->process ();
	break;

}