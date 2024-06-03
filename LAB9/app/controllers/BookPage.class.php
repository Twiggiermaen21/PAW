<?php

namespace app\controllers;

use core\App;
use core\Validator;
use app\forms\BookForm;
use core\Utils;

class BookPage
{
    private $id;
    private $book;
    private $form;
    private $img_upload_path;
    private $autor;
    public function __construct()
    {
        $this->form = new BookForm();
    }
    public function action_BookShow()
    {
        $this->id = $_GET['book'];
        $this->opisKsiazki();
        App::getSmarty()->assign('book', $this->book);
        $this->generateView('BookPage.tpl');
    }

    public function opisKsiazki()
    {
        try {
            $this->book = App::getDB()->select("ksiazki", [
                'idKsiazki',
                "Tytul",
                "Cena",
                "Ilosc_stron",
                "Opis",
                "img_url"
            ], ['idKsiazki' => $this->id]);
            try {
                $this->autor = App::getDB()->select("autor_ksiazki", [
                    'idAutor_Ksiazki',
                    'Imie',
                    'Nazwisko',
                    'Kraj_pochodzenia',
                    'Data_urodzenia'
                ], ['idAutor_Ksiazki' => App::getDB()->select(
                    'ksiazki_has_autor_ksiazki',
                    'Autor_Ksiazki_idAutor_Ksiazki',
                    ['Ksiazki_idKsiazki' => $this->id]
                )]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('blad z autorem');
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Istnieje już konto z tym Adresem Email');
        }
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
        $this->form->Autor = $v->validateFromPost('Autor', [
            'trim' => true,
            'required' => true,
            'numeric' => true,
            'int' => true,
            'required_message' => 'Podaj Autor',
            'validator_message' => 'Autor powinien mieć max 1000 znaków'

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
            $this->img_upload_path = "images/" . $img_name;
            if ($error == 0) {
                move_uploaded_file($tmp_name, $this->img_upload_path);
            } else {
                Utils::addErrorMessage('blad z plikiem');
            }
        }
    }

    public function autor()
    {
        try {
            $this->autor =  App::getDB()->select("autor_ksiazki", [
                'idAutor_Ksiazki',
                "Imie",
                "Nazwisko"
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('blad z autor_ksiazki');
        }
    }

    public function action_BookAddShow()
    {
        $this->autor();
        App::getSmarty()->assign('book', $this->form);
        $this->generateView("bookAdd.tpl");
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
                    "img_url" =>   $this->img_upload_path
                ]);
                try {
                    App::getDB()->insert("ksiazki_has_autor_ksiazki", [
                        "Autor_Ksiazki_idAutor_Ksiazki" => $this->form->Autor,
                        "Ksiazki_idKsiazki" =>  App::getDB()->get(
                            "ksiazki",
                            'idKsiazki',
                            ["Tytul" => $this->form->Tytul]
                        )
                    ]);
                } catch (\PDOException $e) {
                    Utils::addErrorMessage('blad z ksiazk has autor');
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('blad z ksiazki');
            }
            App::getRouter()->forwardTo('StronaGlowna');
        } else {
            App::getSmarty()->assign('book', $this->form);
            $this->generateView("bookAdd.tpl");
        }
    }

    public function generateView($data)
    {
        if (isset($_SESSION['user'])) {
            App::getSmarty()->assign('user', unserialize($_SESSION['user']));
        }
        App::getSmarty()->assign('autor', $this->autor);
        App::getSmarty()->assign('id', $this->id);
        App::getSmarty()->display($data);
    }
}
