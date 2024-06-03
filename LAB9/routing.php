<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('StronaGlowna');
App::getRouter()->setLoginRoute('login');

Utils::addRoute('StronaGlowna', 'main');
Utils::addRoute('StronaGlownaBookList', 'main');



Utils::addRoute('BookShow', 'BookPage');
Utils::addRoute('wiadomosci', 'main');
Utils::addRoute('loginShow',    'LoginCtrl');
Utils::addRoute('login',  'LoginCtrl');
Utils::addRoute('register',  'RegisterCtrl');
Utils::addRoute('registerShow',  'RegisterCtrl');
Utils::addRoute('logout',    'LoginCtrl');


Utils::addRoute('BookAddShow', 'BookPage', ['Pracownik']);
Utils::addRoute('BookAdd', 'BookPage', [ 'Pracownik']);
Utils::addRoute('AutorAdd', 'AutorPage', [ 'Pracownik']);
Utils::addRoute('AutorAddShow', 'AutorPage', [ 'Pracownik']);




Utils::addRoute('Showbill',    'Bill', ['User', 'Pracownik', 'Admin']);

Utils::addRoute('KoszykShow',    'Koszyk', ['User', 'Pracownik', 'Admin']);

Utils::addRoute('Ordertrasfer', 'Koszyk', ['User', 'Pracownik', 'Admin']);
Utils::addRoute('ErrorPay', 'Koszyk', ['User', 'Pracownik', 'Admin']);
Utils::addRoute('PayAdres', 'Bill', ['User', 'Pracownik', 'Admin']);
Utils::addRoute('KoszykClear', 'Koszyk', ['User', 'Pracownik', 'Admin']);
Utils::addRoute('AddBookKoszyk', 'Koszyk', ['User', 'Pracownik', 'Admin']);
Utils::addRoute('OrderComplete', 'Bill', ['User', 'Pracownik', 'Admin']);
Utils::addRoute('UserDataShow', 'Userdata', ['User', 'Pracownik', 'Admin']);



Utils::addRoute('RoleShow', 'RoleChange', ['Admin']);
Utils::addRoute('RoleShowlist', 'RoleChange', ['Admin']);


Utils::addRoute('personEdit', 'PersonEditCtrl', ['Admin']);
Utils::addRoute('personSave', 'PersonEditCtrl', ['Admin']);
Utils::addRoute('personDelete', 'PersonEditCtrl', ['Admin']);
