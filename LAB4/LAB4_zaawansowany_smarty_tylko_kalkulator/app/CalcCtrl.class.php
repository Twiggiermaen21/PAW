<?php
require_once $conf->root_path . '/lib/smarty/Smarty.class.php';
require_once $conf->root_path . '/lib/Messages.class.php';
require_once $conf->root_path . '/app/CalcForm.class.php';
require_once $conf->root_path . '/app/CalcResult.class.php';

class CalcCtrl
{

	private $msgs;   
	private $form;   
	private $result; 

	public function __construct()
	{
		
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}


	public function getParams()
	{
		$this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
		$this->form->miesiecy = isset($_REQUEST['miesiecy']) ? $_REQUEST['miesiecy'] : null;
		$this->form->oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
	}

	public function validate()
	{
		
		if (!(isset($this->form->kwota) && isset($this->form->miesiecy) && isset($this->form->oprocentowanie))) {
			
			return false; 
		}

		
		if ($this->form->kwota == "") {
			$this->msgs->addError('Nie podano kwoty');
		}
		if ($this->form->miesiecy == "") {
			$this->msgs->addError('Nie podano liczby misiecy');
		}
		if ($this->form->oprocentowanie == "") {
				$this->msgs->addError('Nie podano oprcentowania');
		}

		
		if (!$this->msgs->isError()) {

		
			if (!is_numeric($this->form->kwota)) {
				$this->msgs->addError('Pierwsza wartość nie jest liczbą');
			}

			if (!is_numeric($this->form->miesiecy)) {
				$this->msgs->addError('Druga wartość nie jest liczbą');
			}
			if (!is_numeric($this->form->oprocentowanie)) {
				$this->msgs->addError('Druga wartość nie jest liczbą');
			}
		}

		return !$this->msgs->isError();
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

	public function process()
	{

		$this->getparams();

		if ($this->validate()) {

			
			$this->form->kwota = intval($this->form->kwota);
			$this->form->miesiecy = intval($this->form->miesiecy);
			$this->form->oprocentowanie = doubleval($this->form->oprocentowanie);
			$this->msgs->addInfo('Parametry poprawne.');

			
			$this->rata();
			$this->koszty();

			$this->msgs->addInfo('Wykonano obliczenia.');
		}

		$this->generateView();
	}



	public function generateView()
	{
		global $conf;

		$smarty = new Smarty();
		$smarty->assign('conf', $conf);
		$smarty->assign('msgs', $this->msgs);
		$smarty->assign('form', $this->form);
		$smarty->assign('res', $this->result);

		$smarty->display($conf->root_path . '/app/home.tpl');
	}
}
