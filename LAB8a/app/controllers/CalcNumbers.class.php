<?php

namespace app\controllers;

use app\forms\CalcNumbersForm;
use app\transfer\CalcNumbersResult;
use PDOException;
use core\ParamUtils;
use core\Utils;
use core\App;
use core\RoleUtils;
class CalcNumbers
{
	private $form;
	private $result;


	public function __construct()
	{
		$this->form = new CalcNumbersForm();
		$this->result = new CalcNumbersResult();
	}


	public function getParams()
	{
		$this->form->x = ParamUtils::getFromRequest('x');
		$this->form->y = ParamUtils::getFromRequest('y');
		$this->form->op = ParamUtils::getFromRequest('op');
	}


	public function validate()
	{

		if (!(isset($this->form->x) && isset($this->form->y) && isset($this->form->op))) {

			return false;
		}


		if ($this->form->x == "") {
			Utils::addErrorMessage('Nie podano liczby 1');
		}
		if ($this->form->y == "") {
			Utils::addErrorMessage('Nie podano liczby 2');
		}


		if (!App::getMessages()->isError()) {


			if (!is_numeric($this->form->x)) {
				Utils::addErrorMessage('Pierwsza wartość nie jest liczbą całkowitą');
			}

			if (!is_numeric($this->form->y)) {
				Utils::addErrorMessage('Druga wartość nie jest liczbą całkowitą');
			}
		}

		return !App::getMessages()->isError();
	}


	public function action_CalcNumbers()
	{

		$this->getParams();

		if ($this->validate()) {

			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);


			switch ($this->form->op) {
				case 'minus':
					if (RoleUtils::inRole('admin')) {
						$this->result->result = $this->form->x - $this->form->y;
						$this->result->op_name = '-';
					} else {
						Utils::addErrorMessage('Tylko administrator może wykonać tę operację');
					}
					break;
				case 'times':
					$this->result->result = $this->form->x * $this->form->y;
					$this->result->op_name = '*';
					break;
				case 'div':
					if (RoleUtils::inRole('admin')) {
						$this->result->result = $this->form->x / $this->form->y;
						$this->result->op_name = '/';
					} else {
						Utils::addErrorMessage('Tylko administrator może wykonać tę operację');
					}
					break;
				default:
					$this->result->result = $this->form->x + $this->form->y;
					$this->result->op_name = '+';
					break;
			}
			if (!App::getMessages()->isError()) {
				Utils::addErrorMessage('Wykonano obliczenia.');
				Utils::addErrorMessage('Parametry poprawne.');
				$this->CalcNumbersBdSave();
			}
		}

		$this->generateView();
	}


	public function CalcNumbersBdSave()
	{

		
			try {
				App::getDB()->insert("wynikcalcnumbers", [
					"x" => $this->form->x,
					"y" => $this->form->y,
					"op" => $this->result->op_name,
					"wynik" => $this->result->result,
					"data" => date("Y-m-d H:i:s")
				]);
			} catch (PDOException $e) {
				Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
			}
		
	}

	public function action_CalcNumbersShow()
	{
		$this->generateView();
	}

	public function generateView()
	{

		App::getSmarty()->assign('user', unserialize($_SESSION['user']));

		App::getSmarty()->assign('form', $this->form);
		App::getSmarty()->assign('res', $this->result);

		App::getSmarty()->display('CalcNumbersView.tpl');
	}
}
