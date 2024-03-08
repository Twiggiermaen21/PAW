<?php require_once dirname(__FILE__) .'/../config.php';?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>
<div style= "text-align: center;">
<b>
<p style="color: goldenrod; font-size:xx-large; font-family: Century Gothic;"  > Kalkulator kredytowy</p>
</b>
<img src="..\img\sto.jpg"  alt="100zl" width="200" height="80" >
</div>
<form style="text-align: center; font-family: Century Gothic;" action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_kwota">Podaj kwote: </label> 
	<input id="id_kwota" type="text" name="kwota" minlength="3" maxlength="6" size="6" value="<?php if(!empty($kwota)){print($kwota);} ?>" />

	<label for="id_kwota">zl</label>
	<br />
	<label for="id_miesiecy">Podaj ile miesiecy: </label>
	<input id="id_miesiecy" type="text" name="miesiecy" minlength="1" maxlength="2" size="2" value="<?php if(!empty($miesiecy)){print($miesiecy);} ?>" />
	<br />

	<label for="id_oprocentowanie">Podaj oprocentowanie: </label>
	<input id="id_oprocentowanie" type="text" name="oprocentowanie" minlength="1" maxlength="2" size="2" value="<?php if(!empty($oprocentowanie)){print($oprocentowanie);} ?>" />
<br />
		<input type="submit" value="Oblicz Rate" style="width: 100px; height: 30px; background-color: tomato;"  />
	</form>	




<center><?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style=" margin:50px ; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:200px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
</center>

<center><?php if (isset($result)){ ?>
	<b>
	<div style=" margin:10px; padding: 10px ; border-radius: 5px; background-color: #ff0; width:300px;  ">
	
<?php echo 'RATA: '.$result; ?></center>
</div>
</b>


<?php } ?>

</body>
</html>