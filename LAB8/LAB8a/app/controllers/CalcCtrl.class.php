<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;
use PDOException;
use core\ParamUtils;
use core\Utils;
use core\RoleUtils;
use core\App;

class CalcCtrl
{
	private $form;
	private $result;

	public function __construct()
	{
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}


	public function getParams()
	{
		$this->form->kwota = ParamUtils::getFromRequest('kwota', true, 'Błędne wywołanie aplikacji');
		$this->form->miesiecy = ParamUtils::getFromRequest('miesiecy', true, 'Błędne wywołanie aplikacji');
		$this->form->oprocentowanie = ParamUtils::getFromRequest('oprocentowanie', true, 'Błędne wywołanie aplikacji');
	}

	public function validate()
	{

		if (!(isset($this->form->kwota) && isset($this->form->miesiecy) && isset($this->form->oprocentowanie))) {
			return false;
		}
		if ($this->form->kwota == "") {
			Utils::addErrorMessage('Nie podano kwoty');
		}
		if ($this->form->miesiecy == "") {
			Utils::addErrorMessage('Nie podano liczby misiecy');
		}
		if ($this->form->oprocentowanie == "") {
			Utils::addErrorMessage('Nie podano oprcentowania');
		}

		if (!App::getMessages()->isError()) {

			if (!is_numeric($this->form->kwota)) {
				Utils::addErrorMessage('Pierwsza wartość nie jest liczbą');
			}
			if (!is_numeric($this->form->miesiecy)) {
				Utils::addErrorMessage('Druga wartość nie jest liczbą');
			}
			if (!is_numeric($this->form->oprocentowanie)) {
				Utils::addErrorMessage('Druga wartość nie jest liczbą');
			}
			if ($this->form->kwota > 1000000) {
				Utils::addErrorMessage('Za duża kwota');
			}
			if ($this->form->miesiecy > 1200) {
				Utils::addErrorMessage('Za duża liczba miesiecy');
			}
			if ($this->form->oprocentowanie > 100) {
				Utils::addErrorMessage('Za duża oprocentowanie');
			}
		}
		return !App::getMessages()->isError();
	}


	public function koszty()
	{
		$this->result->calkowityKoszt = round(($this->result->result * $this->form->miesiecy), 2);
		$this->result->koszt = round($this->result->calkowityKoszt - $this->form->kwota, 2);
	}

	public function rata()
	{
		$this->result->result = round(($this->form->kwota * (($this->form->oprocentowanie / 100) / 12) * pow((1 + (($this->form->oprocentowanie / 100) / 12)), $this->form->miesiecy)) / (pow((1 + (($this->form->oprocentowanie / 100) / 12)), $this->form->miesiecy) - 1), 2);
	}

	public function action_Calc()
	{

		$this->getparams();

		if ($this->validate()) {



			if ($this->form->oprocentowanie < 10 && !RoleUtils::inRole('admin')) {
				Utils::addErrorMessage("Tylko administrator może przydzielić oprocentowanie poniżej 10%");
			}
			if ($this->form->kwota > 100000 && !RoleUtils::inRole('admin')) {
				Utils::addErrorMessage("Tylko administrator może przydzielić kredyt powyżej 100 000 PLN");
			}


			if (!App::getMessages()->isError()) {
				$this->form->kwota = intval($this->form->kwota);
				$this->form->miesiecy = intval($this->form->miesiecy);
				$this->form->oprocentowanie = doubleval($this->form->oprocentowanie);
			//	Utils::addErrorMessage('Parametry poprawne.');


				$this->rata();
				$this->koszty();

			//	Utils::addErrorMessage('Wykonano obliczenia.');
				$this->CalcBdSave();
			}
		}

		$this->generateView();
	}

	public function CalcBdSave()
	{

		if ($this->validate()) {
			try {
				App::getDB()->insert("wynikcalc", [
					"kwota" => $this->form->kwota,
					"miesiecy" => $this->form->miesiecy,
					"oprocentowanie" => $this->form->oprocentowanie,
					"rata" => $this->result->result,
					"koszt" => $this->result->koszt,
					"calkowityKoszt" => $this->result->calkowityKoszt,
					"data" => date("Y-m-d H:i:s")
				]);
			} catch (PDOException $e) {
				Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (App::getConf()->debug) 
				Utils::addErrorMessage($e->getMessage());
			}
		}
	}

	public function action_CalcShow()
	{
		$this->generateView();
	}

	public function generateView()
	{
	

		App::getSmarty()->assign('form', $this->form);
		App::getSmarty()->assign('res', $this->result);

		App::getSmarty()->display('CalcView.tpl');
	}
}
