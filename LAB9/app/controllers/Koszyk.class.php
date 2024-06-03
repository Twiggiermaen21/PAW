<?php

namespace app\controllers;

use app\transfer\Order;
use core\App;
use core\Utils;
use core\Validator;

class Koszyk
{
	private $id;
	private $Ilosc;
	private $book;
	private $autor;
	private $autor_book;
	private $tablica;
	private $cena;
	private $bookid;
	private $book_ilosc;
	private $tablicaLong;

	public function koszykIlosc()
	{
		if (isset($_SESSION['koszyk']) && isset($_SESSION['Ilosc'])) {
			$this->bookid = explode(",", $_SESSION['koszyk']);
			$this->book_ilosc = explode(",", $_SESSION['Ilosc']);

			for ($i = 0; $i < count($this->bookid); $i++) {
				$this->tablica[0][$i] = $this->bookid[$i];
				$this->tablica[1][$i] = $this->book_ilosc[$i];
			}
			$this->tablicaLong = count($this->tablica[0]) - 1;
		}
	}

	public function getFromDB()
	{

		if (isset($_SESSION['koszyk']) && isset($_SESSION['Ilosc'])) {
			try {
				$this->book = App::getDB()->select("ksiazki", ['idKsiazki', "Tytul", "Cena"], ['idKsiazki' => $this->bookid]);
				try {
					$this->autor = App::getDB()->select(
						"autor_ksiazki",
						['idAutor_Ksiazki', 'Imie', 'Nazwisko'],
						['idAutor_Ksiazki' => App::getDB()->select('ksiazki_has_autor_ksiazki', 'Autor_Ksiazki_idAutor_Ksiazki', ['Ksiazki_idKsiazki' => $this->bookid])]
					);
					try {
						$this->autor_book = App::getDB()->select(
							"ksiazki_has_autor_ksiazki",
							['Autor_Ksiazki_idAutor_Ksiazki', 'Ksiazki_idKsiazki'],
							['Ksiazki_idKsiazki' => $this->bookid]
						);
					} catch (\PDOException $e) {
						Utils::addErrorMessage('blad z autorem');
					}
				} catch (\PDOException $e) {
					Utils::addErrorMessage('blad z autorem');
				}
			} catch (\PDOException $e) {
				Utils::addErrorMessage('Istnieje już konto z tym Adresem Email');
			}
			$this->cena = 0;
			$ILOSC = 0;
			foreach ($this->book as $b) {
				for ($i = 0; $i < count($this->bookid); $i++) {

					if ($b['idKsiazki'] == $this->tablica[0][$i]) {
						$cena = $b['Cena'] * $this->tablica[1][$i];
						$ILOSC = $ILOSC + $this->tablica[1][$i];
						$this->cena = $this->cena + $cena;
					}
				}
			}

			$Order = new Order($this->book, $this->autor, $this->autor_book, $this->tablica, $this->tablicaLong, $this->cena);
			$_SESSION['Order'] = serialize($Order);
		}
	}
	public function action_KoszykShow()
	{
		$this->koszykIlosc();
		$this->getFromDB();
		$this->generateView();
	}

	public function validateAddBook()
	{
		$v = new Validator();
		$this->id = $_GET['book'];
		$this->Ilosc = $v->validateFromPost('Ilosc', [
			'trim' => true,
			'required' => true,
			'numeric' => true,
			'int' => true,
			'min_length' => 1,
			'max_length' => 2,
			'required_message' => 'Podaj Ilosc',
			'validator_message' => 'Ilosc powinien mieć max 2 znaki'

		]);
		if (isset($_SESSION['koszyk']) && isset($_SESSION['Ilosc'])) {
			$this->bookid = explode(",", $_SESSION['koszyk']);
			for ($i = 0; $i < count($this->bookid); $i++) {
				if ($this->id == $this->bookid[$i]) {
					Utils::addErrorMessage("Juz masz w koszyku ta książke");
				}
			}
		}
		return !App::getMessages()->isError();
	}

	public function action_AddBookKoszyk()
	{

		if ($this->validateAddBook()) {
			if (!isset($_SESSION['koszyk'])) {
				$Books = $this->id;
			} else {
				$Books = $_SESSION['koszyk'] . "," . $this->id;
			}
			if (!isset($_SESSION['Ilosc'])) {
				$ilosc = $this->Ilosc;
			} else {
				$ilosc = $_SESSION['Ilosc'] . "," . $this->Ilosc;
			}
			$_SESSION['Ilosc'] = $ilosc;
			$_SESSION['koszyk'] = $Books;
		}
		App::getRouter()->redirectTo("KoszykShow");
	}

	public function action_Ordertrasfer()
	{
		App::getRouter()->redirectTo("PayAdres");
	}

	public function action_ErrorPay()
	{
		Utils::addErrorMessage('blad z platnoscia');
		$this->koszykIlosc();
		$this->getFromDB();
		$this->generateView();
	}

	public function generateView()
	{
		if (isset($_SESSION['user'])) {
			App::getSmarty()->assign('user', unserialize($_SESSION['user']));
		}
		if (isset($_SESSION['koszyk']) &&  isset($_SESSION['Ilosc'])) {
			App::getSmarty()->assign('Ilosc', $this->tablicaLong);
		}
		App::getSmarty()->assign('tablica', $this->tablica);
		App::getSmarty()->assign('cena', $this->cena);
		App::getSmarty()->assign('autor_book', 	$this->autor_book);
		App::getSmarty()->assign('book', $this->book);
		App::getSmarty()->assign('autor', $this->autor);
		App::getSmarty()->display('Koszyk.tpl');
	}
	public function action_KoszykClear()
	{
		$_SESSION['koszyk'] = null;
		$_SESSION['Ilosc'] = null;
		App::getRouter()->redirectTo("KoszykShow");
	}
}
