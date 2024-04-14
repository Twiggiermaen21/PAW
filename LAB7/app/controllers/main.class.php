<?php

namespace app\controllers;

class main
{

	public function action_MainShow()
	{
		$this->generateView();
	}

	public function generateView()
	{
		getSmarty()->assign('user', unserialize($_SESSION['user']));
		getSmarty()->display('home.tpl');
	}
}
