<?php

namespace app\controllers;
use core\App;
class main
{

	public function action_MainShow()
	{
		$this->generateView();
	}

	public function generateView()
	{
		App::getSmarty()->assign('user', unserialize($_SESSION['user']));
		App::getSmarty()->display('home.tpl');
	}
}
