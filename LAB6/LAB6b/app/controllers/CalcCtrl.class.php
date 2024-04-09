<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

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
		$this->form->kwota = getFromRequest('kwota');
		$this->form->miesiecy = getFromRequest('miesiecy');
		$this->form->oprocentowanie = getFromRequest('oprocentowanie');
	}

	public function validate()
	{

		if (!(isset($this->form->kwota) && isset($this->form->miesiecy) && isset($this->form->oprocentowanie))) {
			return false;
		}
		if ($this->form->kwota == "") {
			getMessages()->addError('Nie podano kwoty');
		}
		if ($this->form->miesiecy == "") {
			getMessages()->addError('Nie podano liczby misiecy');
		}
		if ($this->form->oprocentowanie == "") {
			getMessages()->addError('Nie podano oprcentowania');
		}

		if (!getMessages()->isError()) {

			if (!is_numeric($this->form->kwota)) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą');
			}
			if (!is_numeric($this->form->miesiecy)) {
				getMessages()->addError('Druga wartość nie jest liczbą');
			}
			if (!is_numeric($this->form->oprocentowanie)) {
				getMessages()->addError('Druga wartość nie jest liczbą');
			}
		}
		return !getMessages()->isError();
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



			if ($this->form->oprocentowanie < 10 && !inRole('admin')) {
				getMessages()->addError("Tylko administrator może przydzielić oprocentowanie poniżej 10%");
			}
			if ($this->form->kwota > 100000 && !inRole('admin')) {
				getMessages()->addError("Tylko administrator może przydzielić kredyt powyżej 100 000 PLN");
			}


			if (!getMessages()->isError()) {
				$this->form->kwota = intval($this->form->kwota);
				$this->form->miesiecy = intval($this->form->miesiecy);
				$this->form->oprocentowanie = doubleval($this->form->oprocentowanie);
				getMessages()->addInfo('Parametry poprawne.');


				$this->rata();
				$this->koszty();

				getMessages()->addInfo('Wykonano obliczenia.');
			}
		}

		$this->generateView();
	}

	public function action_CalcShow()
	{
		$this->generateView();
	}

	public function generateView()
	{
		getSmarty()->assign('user', unserialize($_SESSION['user']));

		getSmarty()->assign('form', $this->form);
		getSmarty()->assign('res', $this->result);

		getSmarty()->display('home.tpl');
	}
}
