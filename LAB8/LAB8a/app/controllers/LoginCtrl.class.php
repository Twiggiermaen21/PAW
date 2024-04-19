<?php

namespace app\controllers;

use app\forms\LoginForm;
use app\transfer\User;
use PDOException;
use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;

class LoginCtrl{
	private $form;
	private $records;
	
	public function __construct(){
		$this->form = new LoginForm();
	}
		
	public function validate() {
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
		
		if ($this->form->login == "admin" && $this->form->pass == "admin") {
			RoleUtils::addRole('admin');
			$user = new User($this->form->login, 'admin');
			$_SESSION['user'] = serialize($user);

		} else if ($this->form->login != "admin" && $this->form->pass != "admin") {
			try{
				$this->records = App::getDB()->get("person", "*",[
					"name"=>$this->form->login,
						"surname"=>$this->form->pass,
				]);

			} catch (PDOException $e){
				 Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
				if (App::getConf()->debug)  Utils::addErrorMessage($e->getMessage());			
			}	
			if(empty($this->records)){
				 Utils::addErrorMessage('Niepoprawny login lub hasło');
			}else{
				RoleUtils::	addRole($this->records["role"]);
				$user = new User($this->form->login, $this->records["role"]);
				$_SESSION['user'] = serialize($user);
			}
		} else {
			 Utils::addErrorMessage($this->records["name"]);
		}
		
		return !App::getMessages()->isError();
	}

	public function findLogBd(){
		try{
			$this->records = App::getDB()->select("person", [	
					"name"=>$this->form->login,
					"surname"=>$this->form->pass,
					"role"=> $this->form->role 
						]);
		} catch (PDOException $e){
			 Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
			if (App::getConf()->debug)  Utils::addErrorMessage($e->getMessage());			
		}	
		
		 Utils::addErrorMessage($this->records);

	}

	public function action_loginShow(){
		$this->generateView(); 
	}
	
	public function action_login(){
		if ($this->validate()){
			
			 App::getRouter()->redirectTo("MainShow");
		} else {
			
			$this->generateView(); 
		}		
	}
	
	public function action_logout(){
		
		session_destroy();
	
		

		$this->generateView();	
		
	}	
	
	public function generateView(){
		App::getSmarty()->assign('form',$this->form); 
		App::getSmarty()->assign('pom',"log"); 
		App::getSmarty()->display('topLog.tpl');		
	}
}