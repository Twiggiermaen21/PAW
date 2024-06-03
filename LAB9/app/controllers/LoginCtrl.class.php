<?php

namespace app\controllers;

use app\forms\LoginForm;
use app\transfer\User;
use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;

class LoginCtrl
{
	private $form;
	private $records;
	public function __construct()
	{
		$this->form = new LoginForm();
	}

	public function validate()
	{
		$this->form->login = ParamUtils::getFromRequest('login');
		$this->form->pass = ParamUtils::getFromRequest('pass');

		if (!isset($this->form->login)) return false;
		if (empty($this->form->login)) {
			Utils::addErrorMessage('Nie podano loginu');
		}
		if (empty($this->form->pass)) {
			Utils::addErrorMessage('Nie podano hasła');
		}
		if (App::getMessages()->isError()) return false;

		try {
			$this->records = App::getDB()->get("uzytkownik", "*", [
				"Email" => $this->form->login,
				"Haslo" => $this->form->pass,
			]);
		} catch (\PDOException $e) {
			Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
			if (App::getConf()->debug)  Utils::addErrorMessage($e->getMessage());
		}
		if (empty($this->records)) {
			Utils::addErrorMessage('Niepoprawny login lub hasło');
		} else {
			try {
				$role = App::getDB()->get(
					"rola",
					"NazwaRoli",
					["IdRola" => App::getDB()->get(
						"uzytkownik_has_rola",
						'Rola_idRola',
						['Uzytkownik_idUzytkownik' => $this->records["idUzytkownik"]]
					)]
				);
			} catch (\PDOException $e) {
				Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
				if (App::getConf()->debug)  Utils::addErrorMessage($e->getMessage());
			}
			RoleUtils::addRole($role);
			$user = new User($this->form->login, $role, $this->records["idUzytkownik"], $this->records["Imie"], $this->records["Nazwisko"]);
			$_SESSION['user'] = serialize($user);
			try {
				App::getDB()->update("rola", [
					"OstatnieUzycie" => date('Y-m-d H:i:s')

				], [
					"idRola" =>  App::getDB()->get(
						"uzytkownik_has_rola",
						'Rola_idRola',
						['Uzytkownik_idUzytkownik' => $this->records["idUzytkownik"]]
					)
				]);
			} catch (\PDOException $e) {
				Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
				if (App::getConf()->debug)  Utils::addErrorMessage($e->getMessage());
			}
		}
		return !App::getMessages()->isError();
	}

	public function action_loginShow()
	{
		App::getSmarty()->assign('form', $this->form);
		App::getSmarty()->assign('pom', "log");
		App::getSmarty()->display('topLog.tpl');
	}

	public function action_login()
	{
		if ($this->validate()) {
			App::getRouter()->redirectTo("MainShow");
		} else {
			$this->action_loginShow();
		}
	}

	public function action_logout()
	{
		session_destroy();
		App::getRouter()->redirectTo("MainShow");
	}
}
