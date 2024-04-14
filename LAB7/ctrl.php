<?php
require_once 'init.php';

getRouter()->setDefaultRoute('MainShow'); 
getRouter()->setLoginRoute('login'); 

getRouter()->addRoute('CalcShow', 'CalcCtrl', ['user', 'admin']);
getRouter()->addRoute('Calc', 'CalcCtrl', ['user', 'admin']);

getRouter()->addRoute('CalcNumbersShow', 'CalcNumbers', ['user', 'admin']);
getRouter()->addRoute('CalcNumbers', 'CalcNumbers', ['user', 'admin']);

getRouter()->addRoute('CalcList',		'CalcList');
getRouter()->addRoute('MainShow',		'main', ['user', 'admin']);

getRouter()->addRoute('personList',		'PersonListCtrl');
getRouter()->addRoute('loginShow',		'LoginCtrl');
getRouter()->addRoute('login',			'LoginCtrl');
getRouter()->addRoute('logout',			'LoginCtrl');
getRouter()->addRoute('personNew',		'PersonEditCtrl',	['user','admin']);
getRouter()->addRoute('personEdit',		'PersonEditCtrl',	['user','admin']);
getRouter()->addRoute('personSave',		'PersonEditCtrl',	['user','admin']);
getRouter()->addRoute('personDelete',	'PersonEditCtrl',	['admin']);


getRouter()->go();