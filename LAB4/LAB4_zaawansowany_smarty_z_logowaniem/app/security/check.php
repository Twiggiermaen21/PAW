<?php
require_once dirname(__FILE__) . '/../../config.php';
require_once $conf->root_path . '/app/security/login.class.php';

session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';


if (empty($role)) {
	
	$loginy = new login();
	$loginy->process();

	exit();
}
