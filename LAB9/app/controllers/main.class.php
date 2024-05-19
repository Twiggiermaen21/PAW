<?php

namespace app\controllers;
use core\App;

use core\Utils;
class main  
{
	private $records;
	public function action_StronaGlowna()
	{
		$this->getBook();
		$this->generateView();

	}

public function getBook(){


	try {

		$this->records = App::getDB()->select("ksiazki", [
			'idKsiazki',
			"Tytul",
			"Cena",
			"Ilosc_stron",
			"Opis",
			"img_url"
				]);
	} catch (\PDOException $e) {
		Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
		if (App::getConf()->debug)
			Utils::addErrorMessage($e->getMessage());
	}

}



	public function generateView()
	{
		if(isset($_SESSION['user'])){
		App::getSmarty()->assign('user', unserialize($_SESSION['user']));
		
		
		}
		App::getSmarty()->assign('records',$this->records );
		App::getSmarty()->display('index.tpl');
	}
}
