<?php

namespace app\controllers;

use app\forms\LoginForm;
use app\transfer\User;
use PDOException;

class LoginCtrl{
	private $form;
	private $records;
	private $logBD;
	private $passBD;
	public function __construct(){
		$this->form = new LoginForm();
	}
		
	public function validate() {
		$this->form->login = getFromRequest('login');
		$this->form->pass = getFromRequest('pass');
		
		if (!isset($this->form->login)) return false;
		if (empty($this->form->login)) {
			getMessages()->addError('Nie podano loginu');
		}
		if (empty($this->form->pass)) {
			getMessages()->addError('Nie podano hasła');
		}

		if (getMessages()->isError()) return false;
		
		if ($this->form->login == "admin" && $this->form->pass == "admin") {
			addRole('admin');
			$user = new User($this->form->login, 'admin');
			$_SESSION['user'] = serialize($user);

		} else if ($this->form->login == "user" && $this->form->pass == "user") {
			addRole('user');
			$user = new User($this->form->login, 'user');
			$_SESSION['user'] = serialize($user);

		} else if ($this->form->login != "user" && $this->form->pass != "user" && $this->form->login != "admin" && $this->form->pass != "admin") {
			try{
				$this->records = getDB()->get("person", "*",[
					"name"=>$this->form->login,
						"surname"=>$this->form->pass,
				]);

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
			if(empty($this->records)){
				getMessages()->addError('Niepoprawny login lub hasło');
			}else{
				addRole('user');
			$user = new User($this->form->login, 'user');
			$_SESSION['user'] = serialize($user);
			}
		} else {
			getMessages()->addError($this->records["name"]);
		}
		
		return ! getMessages()->isError();
	}

	public function findLogBd(){
		try{
			$this->records = getDB()->select("person", [	
					"name"=>$this->form->login,
					"surname"=>$this->form->pass,
						]);
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}	
		
		getMessages()->addError($this->records);

	}

	public function action_loginShow(){
		$this->generateView(); 
	}
	
	public function action_login(){
		if ($this->validate()){
			
			getMessages()->addError('Poprawnie zalogowano do systemu');
			redirectTo("MainShow");
		} else {
			
			$this->generateView(); 
		}		
	}
	
	public function action_logout(){
		
		session_destroy();
	
		getMessages()->addInfo('Poprawnie wylogowano z systemu');

		$this->generateView();	
		
	}	
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); 
		getSmarty()->assign('pom',"log"); 
		getSmarty()->display('topLog.tpl');		
	}
}