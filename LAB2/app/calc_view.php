<?php require_once dirname(__FILE__) .'/../config.php';?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8" />
			<title>Kalkulator kredytowy</title>
			<link rel="stylesheet"  href="../css/style.css"/>
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" 
			integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
		</head>

	<body>
	<div>
        <a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button button-secondary">Kolejna chroniona strona</a>
        <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button button-warning">Wyloguj</a>
    </div>

		<h1 id="Kalkulator_kredytowy">
					Kalkulator kredytowy 
			<br>
				<img src="..\img\sto.jpg"  alt="100zl" width="200" height="80" >
			</br>
		</h1>
		
	<form id="form" action="<?php print(_APP_URL);?>/app/calc.php" method="post">
		<label for="id_kwota" class="napis">Kwota kredytu: </label> 

			<input id="id_kwota" class="wpis" type="text" name="kwota" minlength="3" maxlength="6" size="6" value="<?php out($kwota); ?>" />
		<label for="id_kwota" class="napis">zł</label>
			<br />
		<label for="id_miesiecy" class="napis">Liczba miesięcy: </label>
			<input id="id_miesiecy" class="wpis" type="text" name="miesiecy" minlength="1" maxlength="3" size="2" value="<?php out($miesiecy); ?>" />
			<br />
		<label for="id_oprocentowanie" class="napis">Oprocentowanie roczne: </label>
			<input id="id_oprocentowanie" class="wpis" type="text" name="oprocentowanie" minlength="1" maxlength="4" size="2" value="<?php out($oprocentowanie); ?>" />
			<br />
		<input id="button" type="submit" value="Oblicz Rate"/>
	</form>	

	<center><?php
		if (isset($messages)) {
			if (count ( $messages ) > 0) {
				echo '<ol  style=" margin:10px ; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:200px;">';
					foreach ( $messages as $key => $msg ) {
				echo '<li>'.$msg.'</li>';
					}	
				echo '</ol>';
			}
		}
			?>

	<?php if (isset($result)){ ?>
		<b>
			<div style=" margin:10px; padding: 10px ; border-radius: 5px; background-color: #ff0; width:300px;  ">
	<?php echo 'RATA:'.$result;   ?>
		<br />
	<?php echo 'Koszt kredytu: '.$koszt; ?>
		<br />
	<?php echo 'Całkowita kwota spłaty: '.$calkowityKoszt; 
	
	?>

			</div>
		</b>
	<?php } ?>

	<br />

	</center>
	</body>
</html>