<?php
function getFromRequest($param_name){
	return isset($_REQUEST [$param_name]) ? $_REQUEST [$param_name] : null;
}


function getFromLog(){
	return isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;

}
