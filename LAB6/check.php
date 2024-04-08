<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$user = getFromLog();

if (!(isset($user) && isset($user->login) && isset($user->role))) {
	$ctrl = new app\controllers\LoginCtrl();
	$ctrl->generateView();

	exit();
}
