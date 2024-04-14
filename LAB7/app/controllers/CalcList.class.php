<?php

namespace app\controllers;
use PDOException;

class CalcList
{
	private $recordsCalc;
	private $recordsCalcNumbers;

	public function action_CalcList()
	{

		try {
			$this->recordsCalc = getDB()->select("wynikcalc", [
				"kwota",
				"miesiecy",
				"oprocentowanie",
				"rata",
				"koszt",
				"calkowityKoszt",
				"data"
			]);


			$this->recordsCalcNumbers = getDB()->select("wynikcalcnumbers", [
				"x",
				"y",
				"op",
				"wynik",
				"data"
			]);
		} catch (PDOException $e) {
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());
		}
		getSmarty()->assign('resCalc', $this->recordsCalc);
		getSmarty()->assign('resCalcNumbers', $this->recordsCalcNumbers);
		getSmarty()->display('CalcList.tpl');
	}
}
