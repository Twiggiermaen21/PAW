<?php

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/calcNumbers/CalcNumbersForm.class.php';
require_once $conf->root_path.'/app/calcNumbers/CalcNumbersResult.class.php';

class CalcNumbersCtrl {

	private $msgs;  
	private $form;  
	private $result; 

	
	public function __construct(){
		
		$this->msgs = new Messages();
		$this->form = new CalcNumbersForm();
		$this->result = new CalcNumbersResult();
	}
	
	
	public function getParams(){
		$this->form->x = isset($_REQUEST ['x']) ? $_REQUEST ['x'] : null;
		$this->form->y = isset($_REQUEST ['y']) ? $_REQUEST ['y'] : null;
		$this->form->op = isset($_REQUEST ['op']) ? $_REQUEST ['op'] : null;
	}
	
	
	public function validate() {

		if (! (isset ( $this->form->x ) && isset ( $this->form->y ) && isset ( $this->form->op ))) {
			
			return false;
		}
		

		if ($this->form->x == "") {
			$this->msgs->addError('Nie podano liczby 1');
		}
		if ($this->form->y == "") {
			$this->msgs->addError('Nie podano liczby 2');
		}
		
		
		if (! $this->msgs->isError()) {
			
		
			if (! is_numeric ( $this->form->x )) {
				$this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				$this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
			}
		}
		
		return ! $this->msgs->isError();
	}
	

	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
	
			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			$this->msgs->addInfo('Parametry poprawne.');
		
			switch ($this->form->op) {
				case 'minus' :
					$this->result->result = $this->form->x - $this->form->y;
					$this->result->op_name = '-';
					break;
				case 'times' :
					$this->result->result = $this->form->x * $this->form->y;
					$this->result->op_name = '*';
					break;
				case 'div' :
					$this->result->result = $this->form->x / $this->form->y;
					$this->result->op_name = '/';
					break;
				default :
					$this->result->result = $this->form->x + $this->form->y;
					$this->result->op_name = '+';
					break;
			}
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/home.tpl');
	}
}
