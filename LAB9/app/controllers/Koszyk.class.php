<?php

namespace app\controllers;
use core\App;
use app\transfer\User;
class Koszyk  
{
	public function action_KoszykShow()
	{
		$this->generateView();

	}

	public function generateView()
	{
		if(isset($_SESSION['user'])){
		App::getSmarty()->assign('user', unserialize($_SESSION['user']));
		
		
		}
		App::getSmarty()->display('Koszyk.tpl');
	}
}
