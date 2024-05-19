<?php

namespace app\controllers;

use core\App;
use app\transfer\User;
use core\ParamUtils;
use core\Validator;
use app\forms\BookForm;
use core\Utils;

class BookPage
{

    private $id;
    private $book;
    private $form;
private $img_upload_path;
    public function __construct()
    {

        $this->form = new BookForm();
    }
    public function action_BookShow()
    {
        $this->id = intval(ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji'));
        $this->opisKsiazki();
        $this->generateView('BookPage.tpl');
    }

    public function opisKsiazki()
    {
        $this->book = App::getDB()->select(
            "ksiazki",
            [
                'idKsiazki',
                "Tytul",
                "Cena",
                "Ilosc_stron",
                "Opis",
                "img_url"
            ],
            ['idKsiazki' => $this->id]
        );
    }

    public function action_BookAddShow()
    {
        if (isset($_SESSION['user'])) {
            App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        }
        App::getSmarty()->assign('id', $this->id);
        App::getSmarty()->assign('book', $this->form);
        App::getSmarty()->display('BookAdd.tpl');
    }



    public function validateSave()
    {
       $v = new Validator();
        $this->form->Tytul = $v->validateFromPost('Tytul', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj Tytuł',
            'min_length' => 1,
            'max_length' => 100,
            'validator_message' => 'Tytuł powinno mieć od 2 do 20 znaków'

        ]);
        $this->form->Cena = $v->validateFromPost('Cena', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj Cene',
            'numeric' => true,
            'float' => true,
            'min_length' => 1,
            'max_length' => 20,
            'validator_message' => 'cena powinno mieć od 2 do 20 znaków'
        ]);

        $this->form->Autor = $v->validateFromPost('Autor', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj Autora',
            'validator_message' => 'autor powinnien wygladac np. 123@gmail.com'
        ]);


        $this->form->Ilosc_stron = $v->validateFromPost('Ilosc_stron', [
            'trim' => true,
            'required' => true,
            'numeric' => true,
            'int' => true,
            'min_length' => 1,
            'max_length' => 20,
            'required_message' => 'Podaj Ilosc stron',
            'validator_message' => 'Stron powinno mieć od 10 do 20 znaków'

        ]);
        $this->form->Opis = $v->validateFromPost('Opis', [
            'trim' => true,
            'required' => true,
            'min_length' => 1,
            'max_length' => 1000,
            'required_message' => 'Podaj Opis',
            'validator_message' => 'Opis powinien mieć max 1000 znaków'

        ]);

        $this->plik();
        return !App::getMessages()->isError();
    }


    public function plik()
    {

        if (isset($_FILES['plik'])) {
            $img_name = $_FILES['plik']['name'];
           
            $tmp_name = $_FILES['plik']['tmp_name'];
            $error = $_FILES['plik']['error'];
            $this->img_upload_path = "images/". $img_name;
            if ($error == 0) {
             
                        
                        move_uploaded_file($tmp_name, $this->img_upload_path);
                 
            } else {
                Utils::addErrorMessage('blad z plikiem');
            }
        }
    }


    public function action_BookAdd()
    {




        if ($this->validateSave()) {
            try {
                App::getDB()->insert("ksiazki", [
                    "Tytul" => $this->form->Tytul,
                    "Cena" => $this->form->Cena,
                    "Ilosc_stron" => $this->form->Ilosc_stron,
                    "Opis" => $this->form->Opis,
                    "img_url"=>   $this->img_upload_path
                ]);

                Utils::addInfoMessage('Pomyślnie zarejestrowano');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Istnieje już konto z tym Adresem Email');
            }


            if (isset($_SESSION['user'])) {
                App::getSmarty()->assign('user', unserialize($_SESSION['user']));
            }


            App::getRouter()->forwardTo('StronaGlowna');
        } else {

            if (isset($_SESSION['user'])) {
                App::getSmarty()->assign('user', unserialize($_SESSION['user']));
            }

            App::getSmarty()->assign('id', $this->id);
            App::getSmarty()->assign('book', $this->form);
            App::getSmarty()->display("bookAdd.tpl");
        }
    }



    public function generateView($display)
    {
        if (isset($_SESSION['user'])) {
            App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        }
        App::getSmarty()->assign('id', $this->id);
        App::getSmarty()->assign('book', $this->book);
        App::getSmarty()->display($display);
    }
}
