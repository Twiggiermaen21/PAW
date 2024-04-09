<?php namespace app\controllers;

use app\forms\CalcNumbersForm;
use app\transfer\CalcNumbersResult;

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
		$this->form->x = getFromRequest('x');
		$this->form->y = getFromRequest('y');
		$this->form->op = getFromRequest('op');
	}


	public function validate()
	{

		if (!(isset($this->form->x) && isset($this->form->y) && isset($this->form->op))) {

			return false;
		}


		if ($this->form->x == "") {
			getMessages()->addError('Nie podano liczby 1');
		}
		if ($this->form->y == "") {
			getMessages()->addError('Nie podano liczby 2');
		}


		if (!getMessages()->isError()) {


			if (!is_numeric($this->form->x)) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}

			if (!is_numeric($this->form->y)) {
				getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
			}
		}

		return !getMessages()->isError();
	}


	public function process()
	{

		$this->getParams();

		if ($this->validate()) {

			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			getMessages()->addInfo('Parametry poprawne.');

			switch ($this->form->op) {
				case 'minus' :
					if (inRole('admin')) {
						$this->result->result = $this->form->x - $this->form->y;
						$this->result->op_name = '-';
					} else {
						getMessages()->addError('Tylko administrator może wykonać tę operację');
					}
					break;
				case 'times' :
					$this->result->result = $this->form->x * $this->form->y;
					$this->result->op_name = '*';
					break;
				case 'div' :
					if (inRole('admin')) {
						$this->result->result = $this->form->x / $this->form->y;
						$this->result->op_name = '/';
					} else {
						getMessages()->addError('Tylko administrator może wykonać tę operację');
					}
					break;
				default :
					$this->result->result = $this->form->x + $this->form->y;
					$this->result->op_name = '+';
					break;
			}

			getMessages()->addInfo('Wykonano obliczenia.');
		}

		$this->generateView();
	}

	public function generateView()
	{
		
		getSmarty()->assign('user',unserialize($_SESSION['user']));
		
		getSmarty()->assign('form', $this->form);
		getSmarty()->assign('res', $this->result);

		getSmarty()->display('home.tpl');
	}
}
