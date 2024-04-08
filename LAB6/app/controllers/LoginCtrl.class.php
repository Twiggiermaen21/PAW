<?php

namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;

class LoginCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new LoginForm();
	}
	
	public function getParams(){
		$this->form->login = getFromRequest('login');
		$this->form->pass = getFromRequest('pass');
	}
	
	public function validate() {
		if (! (isset ( $this->form->login ) && isset ( $this->form->pass ))) {
			getMessages()->addError('Błędne wywołanie aplikacji !');
		}
			
			
		if (! getMessages()->isError ()) {
			
			
			if ($this->form->login == "") {
				getMessages()->addError ( 'Nie podano loginu' );
			}
			if ($this->form->pass == "") {
				getMessages()->addError ( 'Nie podano hasła' );
			}
		}

		if ( !getMessages()->isError() ) {
		
			
			if ($this->form->login == "admin" && $this->form->pass == "admin") {
				if (session_status() == PHP_SESSION_NONE) {
					session_start();
				}
				$user = new User($this->form->login, 'admin');
			
				$_SESSION['user'] = serialize($user);				
			} else if ($this->form->login == "user" && $this->form->pass == "user") {
				if (session_status() == PHP_SESSION_NONE) {
					session_start();
				}
				$user = new User($this->form->login, 'user');
				
				$_SESSION['user'] = serialize($user);				
			} else {
				getMessages()->addError('Niepoprawny login lub hasło');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function doLogin(){

		$this->getParams();
		
		if ($this->validate()){
			
			header("Location: ".getConf()->app_url."/");
		} else {
			
			$this->generateView(); 
		}
		
	}
	
	public function doLogout(){

		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		session_destroy();
		
		
		getMessages()->addInfo('Poprawnie wylogowano z systemu');

		$this->generateView();		 
	}
	
	public function generateView(){
		
		getSmarty()->assign('page_title','Strona logowania');
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('topLog.tpl');		
	}
}