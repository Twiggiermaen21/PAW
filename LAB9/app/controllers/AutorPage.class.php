<?php

namespace app\controllers;

use app\forms\AutorForm;
use core\App;
use core\Utils;
use core\Validator;

class AutorPage
{
	private $Autor;
	public function __construct()
	{
		$this->Autor = new AutorForm();
	}
	public function action_AutorAddShow()
	{
		$this->generateView();
	}

	public function action_AutorAdd()
	{
		if ($this->validateSave()) {
			try {
				App::getDB()->insert("autor_ksiazki", [
					"Imie" => $this->Autor->Imie,
					"Nazwisko" => $this->Autor->Nazwisko,
					"Data_urodzenia" => $this->Autor->Data_urodzenia,
					"Kraj_pochodzenia" => $this->Autor->Kraj_pochodzenia
				]);
				Utils::addInfoMessage('Pomyślnie Dodany autor');
			} catch (\PDOException $e) {
				Utils::addErrorMessage('Istnieje juz');
			}
			App::getRouter()->forwardTo('BookAddShow');
		} else {
			Utils::addErrorMessage('BLAD');
			$this->generateView();
		}
	}

	public function validateSave()
	{
		$v = new Validator();
		$this->Autor->Imie = $v->validateFromPost('Imie', [
			'trim' => true,
			'required' => true,
			'required_message' => 'Podaj Imie',
			'min_length' => 1,
			'max_length' => 100,
			'validator_message' => 'Imie powinno mieć od 2 do 20 znaków'

		]);
		$this->Autor->Nazwisko = $v->validateFromPost('Nazwisko', [
			'trim' => true,
			'required' => true,
			'required_message' => 'Podaj Nazwisko',
			'min_length' => 1,
			'max_length' => 20,
			'validator_message' => 'Nazwisko powinno mieć od 2 do 20 znaków'
		]);

		$this->Autor->Kraj_pochodzenia = $v->validateFromPost('Kraj_pochodzenia', [
			'trim' => true,
			'required' => true,
			'min_length' => 1,
			'max_length' => 20,
			'required_message' => 'Podaj kraj pochodzenia',
			'validator_message' => 'Kraj pochodzenia powinnien mieć od 2 do 20 znaków'
		]);
		$date = $v->validateFromPost('Data_urodzenia', [
			'trim' => true,
			'required' => true,
			'required_message' => "Wprowadź datę urodzenia",
			'date_format' => 'Y-m-d',
			'validator_message' => "Niepoprawny format daty. Przykład: 2001-04-15"
		]);
		if ($v->isLastOK()) {
			$this->Autor->Data_urodzenia = $date->format('Y-m-d');
		}
		return !App::getMessages()->isError();
	}

	public function generateView()
	{
		if (isset($_SESSION['user'])) {
			App::getSmarty()->assign('user', unserialize($_SESSION['user']));
		}
		App::getSmarty()->assign('Autor', $this->Autor);
		App::getSmarty()->display('AutorAdd.tpl');
	}
}
