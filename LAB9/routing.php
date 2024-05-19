<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('StronaGlowna');
App::getRouter()->setLoginRoute('login');

Utils::addRoute('BookAddShow', 'BookPage', ['admin']);
Utils::addRoute('BookShow', 'BookPage');
Utils::addRoute('StronaGlowna', 'main');
Utils::addRoute('KoszykShow',    'Koszyk',['user', 'admin']);
Utils::addRoute('BookAdd', 'BookPage', ['admin']);

Utils::addRoute('autorAdd', 'AutorPage');



Utils::addRoute('UserDataShow', 'Userdata', ['user', 'admin']);
Utils::addRoute('personEdit',   'PersonEditCtrl',    ['user', 'admin']);
Utils::addRoute('personSave',        'PersonEditCtrl',    ['user', 'admin']);
Utils::addRoute('loginShow',    'LoginCtrl');
Utils::addRoute('login',  'LoginCtrl');
Utils::addRoute('register',  'RegisterCtrl');
Utils::addRoute('registerShow',  'RegisterCtrl');
Utils::addRoute('logout',    'LoginCtrl');

