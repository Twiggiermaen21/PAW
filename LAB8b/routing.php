<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('MainShow'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('CalcShow', 'CalcCtrl', ['user', 'admin']);
Utils::addRoute('Calc', 'CalcCtrl', ['user', 'admin']);

Utils::addRoute('CalcNumbersShow', 'CalcNumbers', ['user', 'admin']);
Utils::addRoute('CalcNumbers', 'CalcNumbers', ['user', 'admin']);

Utils::addRoute('CalcList',        'CalcList');
Utils::addRoute('MainShow',        'main', ['user', 'admin']);

Utils::addRoute('personList',    'PersonListCtrl');
Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('personNew',     'PersonEditCtrl',	['user','admin']);
Utils::addRoute('personEdit',    'PersonEditCtrl',	['user','admin']);
Utils::addRoute('personSave',    'PersonEditCtrl',	['user','admin']);
Utils::addRoute('personDelete',  'PersonEditCtrl',	['admin']);