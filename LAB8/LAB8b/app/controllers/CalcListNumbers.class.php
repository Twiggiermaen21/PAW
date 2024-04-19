<?php

namespace app\controllers;

use PDOException;
use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\CalcListSearchForm;

class CalcListNumbers
{
	private $recordsCalc;
	private $form;
	private $page;
	private $where;
	private $search;
	public function __construct()
	{
		$this->form = new CalcListSearchForm();
		$this->form->search = ParamUtils::getFromRequest('sf_searchForm');
		$this->form->page = isset($_GET['page']) ? intval($_GET['page']) - 1 : 0;
		$this->form->limit = 5;
		
	}


	public function validate()
	{

		if (!empty($this->form->search)) {
			$this->search = (ParamUtils::getFromRequest('sf_searchForm'));
		}
		
		return !App::getMessages()->isError();
	}

public function page_where(){

	$search_params = [];
	if (isset($this->form->search) && strlen($this->form->search) > 0) {
		$search_params['op'] = $this->search;
	}
	$num_params = sizeof($search_params);
	if ($num_params > 1) {
		$this->where = ["AND" => &$search_params];
	} else {
		$this->where = &$search_params;
	}
	$this->where['LIMIT'] = [$this->form->from, 5];
	$this->where["ORDER"] = "data";

}



	public function page()
	{

		
		$this->page_where();
		$this->form->count = (App::getDB()->count("wynikcalcnumbers", $this->where));
		$this->form->from = $this->form->page * $this->form->limit;
		$this->form->all = ceil($this->form->count / $this->form->limit);
	}

	public function action_CalcListNumbers()
	{
		$this->validate();
		$this->page();
		$this->page_where();
		
		try {
			$this->recordsCalc = App::getDB()->select("wynikcalcnumbers", [
				"x",
				"y",
				"op",
				"wynik",
				"data"
			], $this->where);
		} catch (PDOException $e) {
			Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
			if (App::getConf()->debug)
				Utils::addErrorMessage($e->getMessage());
		}
		$this->action_CalcListShow();
	}



	public function action_CalcListShow()
	{
		App::getSmarty()->assign('searchForm', $this->form);
		App::getSmarty()->assign('resCalc', $this->recordsCalc);
		App::getSmarty()->display("CalcListNumbers.tpl");

	}
}
