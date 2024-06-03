<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\PersonEditForm;
use app\forms\RegisterForm;

class RegisterCtrl
{
    private $form;
    public function __construct()
    {
        $this->form = new RegisterForm();
    }
    public function validateSave()
    {
        $v = new Validator();
        $this->form->Imie = $v->validateFromPost('Imie', [
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
            'validator_message' => 'podaj dobry email',
            'email' => true,
            'validator_message' => 'Email powinnien wygladac np. 123@gmail.com'
        ]);
        $this->form->Haslo = $v->validateFromPost('Haslo', [
            'trim' => true,
            'required' => true,
            'min_length' => 10,
            'max_length' => 20,
            'required_message' => 'Podaj Haslo',
            'validator_message' => 'Hasło powinno mieć od 10 do 20 znaków'
        ]);
        $this->form->Haslo2 = $v->validateFromPost('Haslo2', [
            'trim' => true,
            'required' => true,
            'min_length' => 10,
            'max_length' => 20,
            'required_message' => 'Podaj Haslo2',
            'validator_message' => 'Hasło powinno mieć od 10 do 20 znaków'
        ]);
        if ($this->form->Haslo <> $this->form->Haslo2) {
            Utils::addErrorMessage("Hasła nie sa takie same");
        }
        return !App::getMessages()->isError();
    }

    public function action_register()
    {
        if ($this->validateSave()) {
            try {
                App::getDB()->insert("uzytkownik", [
                    "Imie" => $this->form->Imie,
                    "Nazwisko" => $this->form->Nazwisko,
                    "Email" => $this->form->Email,
                    "Data_utworzenia" => date('Y-m-d H:i:s'),
                    "Haslo" => $this->form->Haslo
                ]);
                Utils::addInfoMessage('Pomyślnie zarejestrowano');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Istnieje już konto z tym Adresem Email');
            }
            if (!App::getMessages()->isError()) {
                $this->getRegisterRolaUser();
                App::getRouter()->forwardTo('login');
            }
        } else {
            $this->generateView();
        }
    }


    public function getRegisterRolaUser()
    {
        try {
            App::getDB()->insert("uzytkownik_has_rola", [
                "Data_nadania" =>  date('Y-m-d H:i:s'),
                "Uzytkownik_idUzytkownik" => App::getDB()->get("uzytkownik", 'idUzytkownik', ["Email" => $this->form->Email]),
                "Rola_idRola" => 3
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd w nadawaniu roli');
        }
    }
    public function action_registerShow()
    {
        $this->generateView();
    }
    public function generateView()
    {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('Register.tpl');
    }
}
