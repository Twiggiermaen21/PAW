<?php
require_once dirname(__FILE__).'/../config.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

switch ($action) {
	default : 
        require_once $conf->root_path . '/app/security/login.class.php';
        
        session_start();

        if (empty($role)) {
            
            $loginy = new login();
            $loginy->process();
        
            exit();
        }else {
            include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		
            $ctrl = new CalcCtrl ();
            $ctrl->generateView ();
        }    
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