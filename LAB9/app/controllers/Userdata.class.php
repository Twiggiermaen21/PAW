<?php

namespace app\controllers;

use core\App;

use core\Utils;

class Userdata
{
    public $user;
    public $dane;
    public function __construct()
    {
        $this->user = unserialize($_SESSION['user']);
    }

    public function action_UserDataShow()
    {
        

        try {
            $this->dane = App::getDB()->select("uzytkownik","*",["Email"=>$this->user->login
            ]);
        } catch (\PDOException $e) {
			Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
			if (App::getConf()->debug)
				Utils::addErrorMessage($e->getMessage());
		}


        $this->generateView();
    }

    public function generateView()
    {
        App::getSmarty()->assign('user', $this->user);
        App::getSmarty()->assign('dane',$this->dane );
        App::getSmarty()->display('UserData.tpl');
    }
}
