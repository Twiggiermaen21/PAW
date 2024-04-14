<?php

namespace app\controllers;

use app\forms\PersonEditForm;
use DateTime;
use PDOException;

class PersonEditCtrl
{

	private $form;

	public function __construct()
	{

		$this->form = new PersonEditForm();
	}


	public function validateSave()
	{

		$this->form->id = getFromRequest('id', true, 'Błędne wywołanie aplikacji');
		$this->form->name = getFromRequest('name', true, 'Błędne wywołanie aplikacji');
		$this->form->surname = getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
		$this->form->birthdate = getFromRequest('birthdate', true, 'Błędne wywołanie aplikacji');

		if (getMessages()->isError()) return false;

		if (empty(trim($this->form->name))) {
			getMessages()->addError('Wprowadź imię');
		}
		if (empty(trim($this->form->surname))) {
			getMessages()->addError('Wprowadź nazwisko');
		}
		if (empty(trim($this->form->birthdate))) {
			getMessages()->addError('Wprowadź datę urodzenia');
		}

		if (getMessages()->isError()) return false;

		$d = DateTime::createFromFormat('Y-m-d', $this->form->birthdate);
		if ($d === false) {
			getMessages()->addError('Zły format daty. Przykład: 2015-12-20');
		}

		return !getMessages()->isError();
	}


	public function validateEdit()
	{

		$this->form->id = getFromRequest('id', true, 'Błędne wywołanie aplikacji');
		return !getMessages()->isError();
	}

	public function action_personNew()
	{
		$this->generateView();
	}


	public function action_personEdit()
	{

		if ($this->validateEdit()) {
			try {

				$record = getDB()->get("person", "*", [
					"idperson" => $this->form->id
				]);

				$this->form->id = $record['idperson'];
				$this->form->name = $record['name'];
				$this->form->surname = $record['surname'];
				$this->form->birthdate = $record['birthdate'];
			} catch (PDOException $e) {
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());
			}
		}

		$this->generateView();
	}

	public function action_personDelete()
	{

		if ($this->validateEdit()) {

			try {

				getDB()->delete("person", [
					"idperson" => $this->form->id
				]);
				getMessages()->addInfo('Pomyślnie usunięto rekord');
			} catch (PDOException $e) {
				getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());
			}
		}


		forwardTo('personList');
	}

	public function action_personSave()
	{

		if ($this->validateSave()) {

			try {
				if ($this->form->id == '') {
					$count = getDB()->count("person");
					if ($count <= 20) {
						getDB()->insert("person", [
							"name" => $this->form->name,
							"surname" => $this->form->surname,
							"birthdate" => $this->form->birthdate
						]);
					} else { 
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); 
						exit(); 
					}
				} else {
					
					getDB()->update("person", [
						"name" => $this->form->name,
						"surname" => $this->form->surname,
						"birthdate" => $this->form->birthdate
					], [
						"idperson" => $this->form->id
					]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');
			} catch (PDOException $e) {
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());
			}

				forwardTo('personList');
		} else {
	
			$this->generateView();
		}
	}

	public function generateView()
	{
		getSmarty()->assign('form', $this->form); 
		getSmarty()->display('PersonEdit.tpl');
	}
}
