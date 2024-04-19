<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\PersonSearchForm;

class PersonListCtrl {

    private $form;
    private $records;

    public function __construct() {
     
        $this->form = new PersonSearchForm();
    }

    public function validate() {
    
        $this->form->surname = ParamUtils::getFromRequest('sf_surname');


        return !App::getMessages()->isError();
    }

    public function action_personList() {
   
        $this->validate();

       
        $search_params = []; 
        if (isset($this->form->surname) && strlen($this->form->surname) > 0) {
            $search_params['surname[~]'] = $this->form->surname . '%'; 
        }

     
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        
        $where ["ORDER"] = "surname";
        

        try {
            $this->records = App::getDB()->select("person", [
                "idperson",
                "name",
                "surname",
                "birthdate",
                "role"
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getSmarty()->assign('searchForm', $this->form); 
        App::getSmarty()->assign('people', $this->records);  
        App::getSmarty()->display('PersonList.tpl');
    }

}
