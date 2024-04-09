<?php
require_once 'init.php';

getRouter()->setDefaultRoute('CalcShow');
getRouter()->setLoginRoute('login');

getRouter()->addRoute('CalcShow', 'CalcCtrl', ['user', 'admin']);
getRouter()->addRoute('Calc', 'CalcCtrl', ['user', 'admin']);

getRouter()->addRoute('CalcNumbersShow', 'CalcNumbers', ['user', 'admin']);
getRouter()->addRoute('CalcNumbers', 'CalcNumbers', ['user', 'admin']);

getRouter()->addRoute('login', 'LoginCtrl');
getRouter()->addRoute('logout', 'LoginCtrl', ['user', 'admin']);

getRouter()->go();
