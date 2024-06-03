<?php

namespace app\transfer;

class User
{
	public $login;
	public $role;
	public $id;
	public $Imie;
	public $Nazwisko;
	public function __construct($login, $role, $id, $Imie, $Nazwisko)
	{
		$this->login = $login;
		$this->role = $role;
		$this->Nazwisko = $Nazwisko;
		$this->id = $id;
		$this->Imie = $Imie;
	}
}
