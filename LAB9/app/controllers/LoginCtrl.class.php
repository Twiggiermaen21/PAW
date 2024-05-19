<?php

namespace app\controllers;

use app\forms\LoginForm;
use app\transfer\User;
use PDOException;
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
		} catch (PDOException $e) {
			Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
			if (App::getConf()->debug)  Utils::addErrorMessage($e->getMessage());
		}
		if (empty($this->records)) {
			Utils::addErrorMessage('Niepoprawny login lub hasło');
		} else {
			$role = App::getDB()->get(
				"rola",
				"NazwaRoli",
				["IdRola" => App::getDB()->get("uzytkownik_has_rola", 'Rola_idRola', ['Uzytkownik_idUzytkownik' => $this->records["idUzytkownik"]])]
			);


			RoleUtils::addRole($role);
			$user = new User($this->form->login, $role);
			$_SESSION['user'] = serialize($user);

			App::getDB()->update("rola", [
				"OstatnieUzycie" => date('Y-m-d H:i:s')

			], [
				"idRola" =>  App::getDB()->get("uzytkownik_has_rola", 'Rola_idRola', ['Uzytkownik_idUzytkownik' => $this->records["idUzytkownik"]])
			]);
		}


		return !App::getMessages()->isError();
	}



	public function action_loginShow()
	{
		$this->generateView();
	}

	public function action_login()
	{
		if ($this->validate()) {

			App::getRouter()->redirectTo("MainShow");
		} else {

			$this->generateView();
		}
	}

	public function action_logout()
	{

		session_destroy();


		App::getRouter()->redirectTo("MainShow");
	}

	public function generateView()
	{
		App::getSmarty()->assign('form', $this->form);
		App::getSmarty()->assign('pom', "log");
		App::getSmarty()->display('topLog.tpl');
	}
}
