<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\PersonEditForm;

class PersonEditCtrl
{

    private $form;

    public function __construct()
    {

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
    public function validateSave()
    {

        $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');



        $v = new Validator();

        $this->form->Imie = $v->validateFromPost('name', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj imię',
            'min_length' => 2,
            'max_length' => 20,
            'validator_message' => 'Imię powinno mieć od 2 do 20 znaków'
        ]);
        $this->form->Nazwisko = $v->validateFromPost('Nazwisko', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj nazwisko',
            'min_length' => 2,
            'max_length' => 20,
            'validator_message' => 'Nazwisko powinno mieć od 2 do 20 znaków'
        ]);
        $this->form->Email = $v->validateFromPost('Email', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj Email',
            'min_length' => 2,
            'max_length' => 20,
            'email' => true,
            'validator_message' => 'Zły format Email'
        ]);
       
        $this->form->Haslo = $v->validateFromPost('Haslo', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj Haslo',
            'min_length' => 10,
            'max_length' => 20,
            'validator_message' => 'Hasło powinno mieć od 10 do 20 znaków'
        ]);


       

        $this->form->Data_aktualizacji = date('Y-m-d H:i:s');
        $this->form->Id_aktualizacji = $this->form->id;



        return !App::getMessages()->isError();
    }


    public function validateEdit()
    {

        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNew()
    {
        $this->generateView();
    }


    public function action_personEdit()
    {

        if ($this->validateEdit()) {
            try {

                $record = App::getDB()->get("uzytkownik", "*", [
                    "idUzytkownik" => $this->form->id
                ]);

                $this->form->id = $record['idUzytkownik'];
                $this->form->Imie = $record['Imie'];
                $this->form->Nazwisko = $record['Nazwisko'];
                
                $this->form->Email = $record['Email'];
                
                $this->form->Data_aktualizacji = $record['Data_aktualizacji'];
                $this->form->Haslo = $record['Haslo'];
                $this->form->Id_aktualizacji = $record['Id_aktualizacji'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }


        $this->generateView();
    }

    public function action_personDelete()
    {

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

    public function action_personSave()
    {


        if ($this->validateSave()) {

            try {

                App::getDB()->update("uzytkownik", [
                    "Imie" => $this->form->Imie,
                    "Nazwisko" => $this->form->Nazwisko,
                    "Email" => $this->form->Email,
                    
                    
                    "Data_aktualizacji" => $this->form->Data_aktualizacji,
                    "Id_aktualizacji" => $this->form->Id_aktualizacji,
                    "Haslo" => $this->form->Haslo
                ], [
                    "idUzytkownik" => $this->form->id
                ]);

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


    public function generateView()
    {


        App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('PersonEdit.tpl');
    }
}
