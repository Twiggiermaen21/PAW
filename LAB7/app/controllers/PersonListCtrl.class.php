<?php

namespace app\controllers;

use app\forms\PersonSearchForm;
use PDOException;

class PersonListCtrl {

	private $form;
	private $records; 

	public function __construct(){
		$this->form = new PersonSearchForm();
	}
		
	public function validate() {
		
		$this->form->surname = getFromRequest('sf_surname');
	
		return ! getMessages()->isError();
	}
	
	public function action_personList(){
		
		$this->validate();
		
		
		$search_params = [];
		if ( isset($this->form->surname) && strlen($this->form->surname) > 0) {
			$search_params['surname[~]'] = $this->form->surname.'%'; 
		}
	
		$num_params = sizeof($search_params);
		if ($num_params > 1) {
			$where = [ "AND" => &$search_params ];
		} else {
			$where = &$search_params;
		}
		
		$where ["ORDER"] = "surname";		
		try{
			$this->records = getDB()->select("person", [
					"idperson",
					"name",
					"surname",
					"birthdate",
				], $where );
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}	
	
		getSmarty()->assign('searchForm',$this->form);
		getSmarty()->assign('people',$this->records); 
		getSmarty()->display('PersonList.tpl');
	}
	
}
