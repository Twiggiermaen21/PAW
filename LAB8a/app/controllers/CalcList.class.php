<?php

namespace app\controllers;
use PDOException;
use core\App;
use core\Utils;
class CalcList
{
	private $recordsCalc;
	private $recordsCalcNumbers;

	public function action_CalcList()
	{

		try {
			$this->recordsCalc = App::getDB()->select("wynikcalc", [
				"kwota",
				"miesiecy",
				"oprocentowanie",
				"rata",
				"koszt",
				"calkowityKoszt",
				"data"
			]);


			$this->recordsCalcNumbers = App::getDB()->select("wynikcalcnumbers", [
				"x",
				"y",
				"op",
				"wynik",
				"data"
			]);
		} catch (PDOException $e) {
			Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
			if (App::getConf()->debug) 
			Utils::addErrorMessage($e->getMessage());
		}
		App::getSmarty()->assign('resCalc', $this->recordsCalc);
		App::getSmarty()->assign('resCalcNumbers', $this->recordsCalcNumbers);
		App::getSmarty()->display('CalcList.tpl');
	}
}
