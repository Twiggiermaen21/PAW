<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;

class RoleChange
{
    private $user;
    private $dane_user;
    private $dane_user_role;
    private  $dane_role;
    private $where;

    private $search;
    public function __construct()
    {
        $this->user = unserialize($_SESSION['user']);
        $this->search = ParamUtils::getFromRequest('sf_searchForm');
    }

    public function action_RoleShow()
    {

        $search_params = [];
        if (isset($this->search) && strlen($this->search) > 0) {
            $search_params['Email[~]'] = $this->search . '%';
        }
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $this->where = ["AND" => &$search_params];
        } else {
            $this->where = &$search_params;
        }



        try {
            $this->dane_user = App::getDB()->select("uzytkownik", "*", $this->where);
            $this->dane_user_role  = App::getDB()->select("uzytkownik_has_rola", "*");
            $this->dane_role = App::getDB()->select("rola", "*");
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
        }
        $this->generateView('RoleChange.tpl');
    }


    public function action_RoleShowlist()
    {

        $search_params = [];
        if (isset($this->search) && strlen($this->search) > 0) {
            $search_params['Email[~]'] = $this->search . '%';
        }
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $this->where = ["AND" => &$search_params];
        } else {
            $this->where = &$search_params;
        }



        try {
            $this->dane_user = App::getDB()->select("uzytkownik", "*", $this->where);
            $this->dane_user_role  = App::getDB()->select("uzytkownik_has_rola", "*");
            $this->dane_role = App::getDB()->select("rola", "*");
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
        }
        $this->generateView('rolechangelist.tpl');
    }


    public function generateView($data)
    {
        App::getSmarty()->assign('search',$this->search);

        App::getSmarty()->assign('user', $this->user);
        App::getSmarty()->assign('dane', $this->dane_user);
        App::getSmarty()->assign('dane_role', $this->dane_user_role);
        App::getSmarty()->assign('role', $this->dane_role);
        App::getSmarty()->display($data);
    }
}
