<?php

namespace app\controllers;

use core\Validator;
use app\forms\BookListForm;
use core\App;
use core\ParamUtils;
use core\Utils;

class main
{
	private $records;
	private $form;
	private $where;
	private $search;

	public function __construct()
	{
		$this->form = new BookListForm();
		$this->form->search = ParamUtils::getFromRequest('sf_searchForm');
		$this->form->page = isset($_GET['page']) ? intval($_GET['page']) - 1 : 0;
		$this->form->limit = 6;
	}

	public function action_StronaGlowna()
	{
		$this->getBook();
		$this->generateView('index.tpl');
	}

	public function action_StronaGlownaBookList(){
		$this->form->page = isset($_GET['page']) ? intval($_GET['page']) - 1 : 0;

		$this->getBook();
		$this->generateView('MainBookList.tpl');


	}





	public function getBook()
	{
		$this->validate();
		$this->page();
		$this->page_where();
		try {
			$this->records = App::getDB()->select("ksiazki", [
				'idKsiazki',
				"Tytul",
				"Cena",
				"Ilosc_stron",
				"Opis",
				"img_url"
			], $this->where);
		} catch (\PDOException $e) {
			Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
			if (App::getConf()->debug)
				Utils::addErrorMessage($e->getMessage());
		}
	}

	public function validate()
	{
		if (!empty($this->form->search)) {
			$this->search = ParamUtils::getFromRequest('sf_searchForm');
			
		}
		return !App::getMessages()->isError();
	}

	public function page_where()
	{
		$search_params = [];
		if (isset($this->form->search) && strlen($this->form->search) > 0) {
			$search_params['Tytul[~]'] = $this->search.'%';
		}
		$num_params = sizeof($search_params);
		if ($num_params > 1) {
			$this->where = ["AND" => &$search_params];
		} else {
			$this->where = &$search_params;
		}
		$this->where['LIMIT'] = [$this->form->from, $this->form->limit];
		

	}

	public function page()
	{
		$this->page_where();
		$this->form->count = (App::getDB()->count("ksiazki", $this->where));
		$this->form->from = $this->form->page * $this->form->limit;
		$this->form->all = ceil($this->form->count / $this->form->limit);
	}

	public function action_wiadomosci()
	{
		$v = new Validator();
		$email = $v->validateFromPost('name', [
			'trim' => true,
			'required' => true,
			'min_length' => 2,
			'max_length' => 25,
			'required_message' => 'Podaj Imie',
			'validator_message' => 'Imie powinien mieć max 25 znaków'
		]);
		$name = $v->validateFromPost('email', [
			'trim' => true,
			'required' => true,
			'required_message' => 'Podaj Email',
			'validator_message' => 'podaj dobry email',
			'email' => true,
			'validator_message' => 'Email powinnien wygladac np. 123@gmail.com'
		]);
		$text = $v->validateFromPost('message', [
			'trim' => true,
			'required' => true,
			'min_length' => 2,
			'max_length' => 1000,
			'required_message' => 'Podaj text',
			'validator_message' => 'text powinien mieć max 1000 znaków'
		]);
		try {
			App::getDB()->insert("wiadomosci", [
				"Email" => $email,
				"Name" => $name,
				"Text" => $text
			]);
		} catch (\PDOException $e) {
			Utils::addErrorMessage('Wystąpił błąd podczas wysylania wiadomosci');
		}
		App::getRouter()->forwardTo('StronaGlowna');
	}

	public function generateView($data)
	{
		if (isset($_SESSION['user'])) {
			App::getSmarty()->assign('user', unserialize($_SESSION['user']));
		}

		
		App::getSmarty()->assign('searchForm', $this->form);
		App::getSmarty()->assign('records', $this->records);
		App::getSmarty()->display($data);
	}
}
