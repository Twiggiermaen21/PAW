<?php

namespace app\controllers;

use core\App;

use core\Utils;

class Userdata
{
    public $user;
    public $dane;
    public $zam;
    public $zam_ksiazki;
    public $ksiazki;
    public $pay;
    public function __construct()
    {
        $this->user = unserialize($_SESSION['user']);
    }

    public function action_UserDataShow()
    {
        try {
            $this->dane = App::getDB()->select("uzytkownik", "*", [
                "Email" => $this->user->login
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
        }

        $this->getDB();

        $this->generateView();
    }


    public function getDB()
    {

        try {
            $this->zam = App::getDB()->select("zamowienia", "*", [
                "Uzytkownik_idUzytkownik" => $this->user->id
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
        }
        try {
            $this->zam_ksiazki = App::getDB()->select("zamowienia_has_ksiazki", "*", [
                "zamowienia_idzamówienia" => App::getDB()->select("zamowienia", "idzamowienia", [
                    "Uzytkownik_idUzytkownik" => $this->user->id
                ])
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
        }
        try {
            $this->ksiazki = App::getDB()->select("ksiazki", "*", [
                "idKsiazki" => App::getDB()->select("zamowienia_has_ksiazki", "Ksiazki_idKsiazki", [
                    "zamowienia_idzamówienia" => App::getDB()->select("zamowienia", "idzamowienia", [
                        "Uzytkownik_idUzytkownik" => $this->user->id
                    ])
                ])
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
        }

        try {
            $this->pay = App::getDB()->select("platnosci", "*", [
                "idPlatnosci" => App::getDB()->select("zamowienia", "Platnosci_idPlatnosci", [
                    "Uzytkownik_idUzytkownik" => $this->user->id
                ])

            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
        }
    }


    public function generateView()
    {
        App::getSmarty()->assign('ksiazki', $this->ksiazki);
        App::getSmarty()->assign('zam', $this->zam);
        App::getSmarty()->assign('zam_ksiazki',  $this->zam_ksiazki);
        App::getSmarty()->assign('pay',  $this->pay);
        App::getSmarty()->assign('user', $this->user);
        App::getSmarty()->assign('dane', $this->dane);
        App::getSmarty()->display('UserData.tpl');
    }
}
