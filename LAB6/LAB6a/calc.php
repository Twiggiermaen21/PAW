<?php
require_once 'init.php';
getConf()->login_action = 'login';

switch ($action) {
	default:
		control('app\\controllers', 'CalcCtrl', 'generateView', ['user', 'admin']);
	case 'login':
		control('app\\controllers', 'LoginCtrl', 'doLogin');
	case 'CalcView':
		control('app\\controllers', 'CalcCtrl', 'generateView', ['user', 'admin']);
	case 'Calc':
		control('app\\controllers', 'CalcCtrl', 'process', ['user', 'admin']);
	case 'NumbersView':
		control('app\\controllers', 'CalcNumbers', 'generateView', ['user', 'admin']);
	case 'Numbers':
		control('app\\controllers', 'CalcNumbers', 'process', ['user', 'admin']);
	case 'logout':
		control('app\\controllers', 'LoginCtrl', 'doLogout', ['user', 'admin']);
}
