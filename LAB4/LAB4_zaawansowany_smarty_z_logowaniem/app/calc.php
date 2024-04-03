<?php
//Skrypt uruchamiający akcję wykonania obliczeń kalkulatora
// - należy zwrócić uwagę jak znacząco jego rola uległa zmianie
//   po wstawieniu funkcjonalności do klasy kontrolera

require_once dirname(__FILE__).'/../config.php';
include $conf->root_path.'/app/security/check.php';
//załaduj kontroler
require_once $conf->root_path.'/app/CalcCtrl.class.php';

//utwórz obiekt i użyj
$ctrl = new CalcCtrl();
$ctrl->process();
