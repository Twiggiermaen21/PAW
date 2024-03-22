{extends file="../templates/top_bottom.tpl"}

{block name=glowna}
	<div id="main">
		<article id="glowna" class="panel">
			<header>
				<h1>Strona głowna</h1>
			</header>
		</article>
	{/block}

	{block name=kredytowy}
		<article id="kredytowy" class="panel">
			<header>
				<h2>Kalkulator kredytowy </h2>
			</header>
			<form action="{$app_url}/app/calc.php#kredytowy" method="post">
				<div class="row">
					<div class="col-6 col-12-medium">
						<label for="id_kwota" class="napis">Kwota kredytu: </label>
						<input type="text" name="kwota" placeholder="wpisz" value="{$kwota}" />
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_miesiecy" class="napis">Liczba miesięcy: </label>
						<input type="text" name="miesiecy" placeholder="wpisz" value="{$miesiecy}" />
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_oprocentowanie" class="napis">Oprocentowanie roczne: </label>
						<input id="id_oprocentowanie" type="text" name="oprocentowanie" placeholder="wpisz"
							value="{$oprocentowanie}">
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_oprocentowanie" class="napis">Wynik </label>

						{if isset($messages)}
							{if count($messages) > 0}
								<ol style=" padding: 2px 10px 10px 50px; border-radius: 5px; background-color: #f88; width:375px;">
									{foreach $messages as $key => $msg }
										{strip}
											<li> {$msg} </li>
										{/strip}
									{/foreach}
								</ol>
							{/if}
						{/if}
						{if isset($result)}
							<b>
								<div style="padding: 10px ; border-radius: 5px; background-color: #ff0; width:400px;  ">
									<h4>Rata: {$result} zł</h4>
									<h4>Koszt kredytu: {$koszt} zł</h4>
									<h4>Koszt całkowity: {$calkowityKoszt} zł</h4>
								</div>
							</b>
						{/if}
					</div>
					<div class="col-12">
						<input type="submit" value="Oblicz" />
					</div>
				</div>
			</form>
		</article>
	{/block}

	{block name=zwykly}
		<article id="zwykly" class="panel">
			<header>
				<h2>Kalkulator zwykły</h2>
			</header>
			<form action="{$app_url}/app/calc_number.php#zwykly" method="post">
				<div class="row">
					<div class="col-6 col-12-medium">
						<label for="x">Pierwsza liczba</label>
						<input type="text" placeholder="wartość x" name="x" {if isset($form['x'])} value="{$form['x']}"
							{/if}>
					</div>
					<div class="col-6 col-12-medium">
						<label for="op">Operacja</label>
						<select id="op" name="op">
							{if isset($form['op_name'])}
								<option value="{$form['op']}">ponownie: {$form['op_name']}</option>
								<option value="" disabled="true">---</option>
							{/if}
							<option value="plus">(+) dodaj</option>
							<option value="minus">(-) odejmij </option>
							<option value="times">(*) pomnóż</option>
							<option value="div">(/) podziel</option>
						</select>
					</div>
					<div class="col-6 col-12-medium">
						<label for="y">Druga liczba</label>
						<input id="y" type="text" placeholder="wartość y" name="y" {if isset($form['y'])}
							value="{$form['y']}" {/if}>
					</div>
					<div class="col-6 col-12-medium">
						{if isset($infos)}
							{if count($infos) > 0}
								<h4>Informacje: </h4>
								<ol class="inf">
									{foreach $infos as $key => $msg}
										{strip}
											<li>{$msg}</li>
										{/strip}
									{/foreach}
								</ol>
							{/if}
						{/if}
						{if isset($result_z)}
							<h4>Wynik</h4>
							<p class="res">
								{$result_z}
							</p>
						{/if}
					</div>
					<div class="col-6 col-12-medium">
						<input type="submit" value="Oblicz" />
					</div>
				</div>
			</form>
		</article>
	</div>
{/block}