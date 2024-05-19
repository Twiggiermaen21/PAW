<?php

namespace app\controllers;
use core\App;

use core\Utils;
class main  
{
	

    public function __construct()
    {

    
    }


	public function action_StronaGlowna()
	{
		$this->getBook();
		$this->generateView();

	}


	public function generateView()
	{
		if(isset($_SESSION['user'])){
		App::getSmarty()->assign('user', unserialize($_SESSION['user']));
		
		
		}
		
		App::getSmarty()->display('index.tpl');
	}
}
