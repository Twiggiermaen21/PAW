<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\PersonEditForm;

class PersonEditCtrl {

    private $form; 

    public function __construct() {
      
        $this->form = new PersonEditForm();
    }

    /* Walidacja danych przed zapisem (nowe dane lub edycja).
     * Poniżej pełna, możliwa konfiguracja metod walidacji:
     *  [ 
     *    'trim' => true,
     *    'required' => true,
     *    'required_message' => 'message...',
     *    'min_length' => value,
     *    'max_length' => value,
     *    'email' => true,
     *    'numeric' => true,
     *    'int' => true,
     *    'float' => true,
     *    'date_format' => format,
     *    'regexp' => expression,
     *    'validator_message' => 'message...',
     *    'message_type' => error | warning | info,
     *  ]
     */
    public function validateSave() {
      
        $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');

        
        
        $v = new Validator();

        $this->form->name = $v->validateFromPost('name', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj imię',
            'min_length' => 2,
            'max_length' => 20,
            'validator_message' => 'Imię powinno mieć od 2 do 20 znaków'
        ]);
        $this->form->surname = $v->validateFromPost('surname', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj nazwisko',
            'min_length' => 2,
            'max_length' => 20,
            'validator_message' => 'Nazwisko powinno mieć od 2 do 20 znaków'
        ]);

            $this->form->role = $v->validateFromPost('role', [
                'trim' => true,
                'required' => true,
                'required_message' => 'Podaj role',
                'min_length' => 1,
                'max_length' => 5,
                'validator_message' => 'Role: admin lub user'
                


        ]);
        if(!($this->form->role=="admin" || $this->form->role=="user")){
            Utils::addErrorMessage('zła rola');  
             }
        
        $date = $v->validateFromPost('birthdate', [
            'trim' => true,
            'required' => true,
            'required_message' => "Wprowadź datę urodzenia",
            'date_format' => 'Y-m-d',
            'validator_message' => "Niepoprawny format daty. Przykład: 2001-04-15"
        ]);
        if ($v->isLastOK()) {
            $this->form->birthdate = $date->format('Y-m-d');
        }
        return !App::getMessages()->isError();
    }

   
    public function validateEdit() {
        
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNew() {
        $this->generateView();
    }

  
    public function action_personEdit() {
     
        if ($this->validateEdit()) {
            try {
                
                $record = App::getDB()->get("person", "*", [
                    "idperson" => $this->form->id
                ]);
                
                $this->form->id = $record['idperson'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->birthdate = $record['birthdate'];
                $this->form->role = $record['role'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        
        $this->generateView();
    }

    public function action_personDelete() {
    
        if ($this->validateEdit()) {

            try {
             
                App::getDB()->delete("person", [
                    "idperson" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

      
        App::getRouter()->forwardTo('personList');
    }

    public function action_personSave() {


        if ($this->validateSave()) {
            
            try {

             
                if ($this->form->id == '') {
                    
                    $count = App::getDB()->count("person");
                    if ($count <= 20) {
                        App::getDB()->insert("person", [
                            "name" => $this->form->name,
                            "surname" => $this->form->surname,
                            "birthdate" => $this->form->birthdate,
                            "role" => $this->form->role
                        ]);
                    } else { 
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); 
                        exit(); 
                    }
                } else {
                    
                    App::getDB()->update("person", [
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "birthdate" => $this->form->birthdate,
                        "role" => $this->form->role
                            ], [
                        "idperson" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            
            App::getRouter()->forwardTo('personList');
        } else {
            
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('PersonEdit.tpl');
    }

}
