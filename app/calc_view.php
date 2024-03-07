<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_kwota">Podaj kwote: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php 

	if(!empty($kwota)){print($kwota);} 
	?>" /><br />

	<label for="id_miesiecy">Podaj ile miesiecy: </label>
	<input id="id_miesiecy" type="text" name="miesiecy" value="<?php
	 if(!empty($miesiecy)){
		print($miesiecy); 
	} ?>" /><br />
	<label for="id_oprocentowanie">Podaj oprocentowanie: </label>
	<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php if(!empty($oprocentowanie)){
		print($oprocentowanie); 
		
	} ?>" /><br />
		<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</body>
</html>