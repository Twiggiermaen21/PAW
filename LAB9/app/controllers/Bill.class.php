<?php

namespace app\controllers;

use core\Validator;
use core\App;
use core\ParamUtils;
use app\forms\PayForm;
use core\Utils;

class Bill
{
    private $pay;
    private $Order;
    private $User;
    public function __construct()
    {
        $this->Order = unserialize($_SESSION['Order']);
        $this->User = unserialize($_SESSION['user']);
        $this->pay = new PayForm();
    }

    public function validateSave()
    {
        $v = new Validator();
        $this->pay->Adres = $v->validateFromPost('Adres', [
            'trim' => true,
            'required' => true,
            'min_length' => 10,
            'max_length' => 50,
            'required_message' => 'Podaj Adres',
            'validator_message' => 'Adres powinno mieć od 10 do 50 znaków'
        ]);
        $this->pay->Pay = ParamUtils::getFromPost('pay', true, "wybierz rodzaj platnosci");
        $this->pay->Regulamin = ParamUtils::getFromPost('regulamin', true, "zaakceptuj regulamin");
        $this->pay->Data = date('Y-m-d H:i:s');
        return !App::getMessages()->isError();
    }

    public function action_OrderComplete()
    {
        if ($this->validateSave()) {
            if ($this->zamowienie()) {
                $this->generateView('Bill.tpl');
                $_SESSION['koszyk'] = null;
                $_SESSION['Ilosc'] = null;
            } else {
             
                App::getRouter()->redirectTo("ErrorPay");
            }
        } else {
            App::getRouter()->redirectTo("Showbill");
        }
    }

    public function action_Showbill(){
        $this->generateView('Bill.tpl');

    }


    public function zamowienie()
    {
        srand((float)microtime() * 1000000);
        $KodPlatnosci = md5(uniqid(rand()));
        $KodZamowienia = md5(uniqid(rand()));

        try {
            App::getDB()->insert("platnosci", [
                "Data_Platnosci" => $this->pay->Data,
                "Kwota" => $this->Order->cena,
                "Rodzaj_płatnosci" => $this->pay->Pay,
                "idUzytkownik" => $this->User->id,
                "KodPlatnosci" => $KodPlatnosci
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('blad z platnoscia');
        }
        try {
        $idplatnosci = App::getDB()->get(
            "platnosci",
            "idPlatnosci",
            ["KodPlatnosci" => $KodPlatnosci]
        );
    } catch (\PDOException $e) {
        Utils::addErrorMessage('blad z idplatnosci');
    }
        try {
            App::getDB()->insert("zamowienia", [
                "Adres" => $this->pay->Adres,
                "Data_zamowienia" => $this->pay->Data,
                "Platnosci_idPlatnosci" => $idplatnosci,
                "Uzytkownik_idUzytkownik" => $this->User->id,
                "KodZamowienia" => $KodZamowienia
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('blad z zamowienia');
        }

        try {
        $idzamowienia = App::getDB()->get("zamowienia", "idzamowienia", [
            "KodZamowienia" => $KodZamowienia
        ]);
    } catch (\PDOException $e) {
        Utils::addErrorMessage('blad z idzamowienia');
    }
        foreach ($this->Order->book as $b) {
            for ($i = 0; $i <= $this->Order->sztuk; $i++) {
                if ($b['idKsiazki'] == $this->Order->tablica[0][$i]) {
                    try {
                        App::getDB()->insert("zamowienia_has_ksiazki", [
                            "Ilosc_ksiazek" => $this->Order->tablica[1][$i],
                            "Ksiazki_idKsiazki" => $b['idKsiazki'],
                            "zamowienia_idzamówienia" => $idzamowienia
                        ]);
                    } catch (\PDOException $e) {
                        Utils::addErrorMessage('blad z zamowienia_has_ksiazki');
                    }
                }
            }
        }
        return !App::getMessages()->isError();
    }

    public function action_PayAdres()
    {
        $this->generateView('AdresPay.tpl');
    }

    public function generateView($data)
    {
        if (isset($_SESSION['user'])) {
            App::getSmarty()->assign('user', $this->User);
        }
        App::getSmarty()->assign('Order',  $this->Order);
        App::getSmarty()->assign('pay', $this->pay);
        App::getSmarty()->display($data);
    }
}
