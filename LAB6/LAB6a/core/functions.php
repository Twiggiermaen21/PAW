<?php

function getFrom(&$source,&$idx,&$required,&$required_message){
	if (isset($source[$idx])){
		return $source[$idx];
	} else {
		if ($required) getMessages()->addError($required_message);
		return null;
	}
}

function getFromRequest($param_name,$required=false,$required_message=null){
	return getFrom($_REQUEST,$param_name,$required,$required_message);
}
function getFromGet($param_name,$required=false,$required_message=null){
	return getFrom($_GET,$param_name,$required,$required_message);
}
function getFromPost($param_name,$required=false,$required_message=null){
	return getFrom($_POST,$param_name,$required,$required_message);
}
function getFromCookies($param_name,$required=false,$required_message=null){
	return getFrom($_COOKIES,$param_name,$required,$required_message);
}
function getFromSession($param_name,$required=false,$required_message=null){
	return getFrom($_SESSION,$param_name,$required,$required_message);
}

function forwardTo($action_name){
	global $action;
	$action = $action_name;
	include getConf()->root_path."/calc.php";
	exit;
}

function redirectTo($action_name){
	header("Location: ".getConf()->action_url.$action_name);
	exit;
}

function addRole($role){
	getConf()->roles [$role] = true;
	$_SESSION['_roles'] = serialize(getConf()->roles);
}

function inRole($role){
	return isset(getConf()->roles[$role]);
}

function control($namespace, $controller, $method, $roles = null){
	if ($roles != null){
		$found=false;
		if (is_array($roles)){
			foreach($roles as $role){
				if (inRole($role)){ $found=true; break; }
			}  
		} else {
			if (inRole($roles)) $found=true;
		}
		if (!$found) forwardTo(getConf()->login_action);
	}
	if (empty($namespace)) {
		$controller = "app\\controllers\\".$controller;
	} else {
		$controller = $namespace."\\".$controller;
	}
	include_once getConf()->root_path.DIRECTORY_SEPARATOR.$controller.'.class.php';
	$ctrl = new $controller;
	if(is_callable(array($ctrl, $method))){
		$ctrl->$method();
	}
	exit;
}