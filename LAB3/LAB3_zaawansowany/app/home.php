<?php include _ROOT_PATH . '/templates/top1.php';

?>

<div id="main">
	<article id="kredytowy" class="panel">
		<header>
			<h2>Kalkulator kredytowy </h2>
		</header>
		<form action="<?php print(_APP_URL); ?>/app/calc.php#kredytowy" method="post">
			<div class="row">
				<div class="col-6 col-12-medium">
					<label for="id_kwota" class="napis">Kwota kredytu: </label>
					<input type="text" name="kwota" placeholder="wpisz" value="<?php out($kwota); ?>" />
				</div>
				<div class="col-6 col-12-medium">
					<label for="id_miesiecy" class="napis">Liczba miesięcy: </label>
					<input type="text" name="miesiecy" placeholder="wpisz" value="<?php out($miesiecy); ?>" />
				</div>
				<div class="col-6 col-12-medium">
					<label for="id_oprocentowanie" class="napis">Oprocentowanie roczne: </label>
					<input id="id_oprocentowanie" type="text" name="oprocentowanie" placeholder="wpisz" value="<?php out($oprocentowanie); ?>">
				</div>
				<div class="col-6 col-12-medium">
					<label for="id_oprocentowanie" class="napis">Wynik </label>
					<?php if (isset($messages)) {
						if (count($messages) > 0) {
							echo '<ol   style=" padding: 2px 10px 10px 50px; border-radius: 5px; background-color: #f88; width:375px;">';
							foreach ($messages as $key => $msg) {
								echo '<li>' . $msg . '</li>';
							}
							echo '</ol>';
						}
					} ?>
					<?php if (isset($result)) { ?>
						<b>
							<div style="padding: 10px ; border-radius: 5px; background-color: #ff0; width:400px;  ">
								<?php echo 'RATA:' . $result;   ?>
								<br />
								<?php echo 'Koszt kredytu: ' . $koszt; ?>
								<br />
								<?php echo 'Całkowita kwota spłaty: ' . $calkowityKoszt; ?>
							</div>
						</b>
					<?php } ?>
				</div>
				<div class="col-12">
					<input type="submit" value="Oblicz" />
				</div>
			</div>
		</form>
	</article>

	<article id="zwykly" class="panel">
		<header>
			<h2>Kalkulator zwykły</h2>
		</header>
		<form href="?strona=zwykly" action="<?php print(_APP_ROOT); ?>/app/calc_number.php#zwykly" method="post">

			<div class="row">
				<div class="col-6 col-12-medium">
					<label for="x">Pierwsza liczba</label>
					<input id="x" type="text" placeholder="wpisz" name="x" value="<?php out($form['x']); ?>">
				</div>

				<div class="col-6 col-12-medium">
					<label for="op">Operacja</label>
					<select id="op" name="op">
						<option value="plus">(+) dodaj</option>
						<option value="minus">(-) odejmij </option>
						<option value="times">(*) pomnóż</option>
						<option value="div">(/) podziel</option>
					</select>
				</div>
				<div class="col-6 col-12-medium">
					<label for="y">Druga liczba</label>
					<input id="y" type="text" placeholder="wpisz" name="y" value="<?php out($form['y']); ?>">
				</div>



				<div class="col-6 col-12-medium">

					<?php
					if (isset($infos)) {
						if (count($infos) > 0) {
							echo '<h4>Informacje: </h4>';
							echo '<ol class="inf">';
							foreach ($infos as $key => $msg) {
								echo '<li>' . $msg . '</li>';
							}
							echo '</ol>';
						}
					}
					?>

					<?php if (isset($result_z)) { ?>
						<h4>Wynik</h4>
						<p class="res">
							<?php print($result_z); ?>
						</p>
					<?php } ?>

				</div>

				<div class="col-6 col-12-medium">

					<input type="submit" value="Oblicz" />
				</div>
			</div>

		</form>
	</article>

</div>
<?php include _ROOT_PATH . '/templates/bottom1.php'; ?>