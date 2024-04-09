{extends file="top_bottom.tpl"}

{block name=glowna}
	<div id="main">
		<article id="glowna" class="panel">
			<header>
				<h1>Strona głowna</h1>
				<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
			</header>
		</article>
	{/block}

	{block name=kredytowy}
		<article id="kredytowy" class="panel">
			<header>
				<h2>Kalkulator kredytowy </h2>
			</header>
			<form action="{$conf->action_root}Calc#kredytowy" method="post">
				<div class="row">
					<div class="col-6 col-12-medium">
						<label for="id_kwota" class="napis">Kwota kredytu: </label>
						<input type="text" name="kwota" placeholder="wpisz" value="{$form->kwota}" />
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_miesiecy" class="napis">Liczba miesięcy: </label>
						<input type="text" name="miesiecy" placeholder="wpisz" value="{$form->miesiecy}" />
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_oprocentowanie" class="napis">Oprocentowanie roczne: </label>
						<input id="id_oprocentowanie" type="text" name="oprocentowanie" placeholder="wpisz"
							value="{$form->oprocentowanie}">
					</div>
					<div class="col-6 col-12-medium">

						{include file='messages.tpl'}

						{if isset($res->result)}
							<p class="res">
							<h4>Wyniki: </h4>
							<h5>Rata: {$res->result} zł</h5>
							<h5>Koszt kredytu: {$res->koszt} zł</h5>
							<h5>Koszt całkowity: {$res->calkowityKoszt} zł</h5>

							</p>
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
			<form action="{$conf->action_root}Numbers#zwykly" method="post">
				<div class="row">
					<div class="col-6 col-12-medium">
						<label for="x" class="napis">Kwota kredytu: </label>
						<input type="text" placeholder="wartość x" name="x" value="{$form->x}">
					</div>
					<div class="col-6 col-12-medium">
						<label for="op">Operacja</label>
						<select id="op" name="op">
							{if isset($res->op_name)}
								<option value="{$form->op}">ponownie: {$res->op_name}</option>
								<option value="" disabled="true">---</option>
							{/if}
							<option value="plus">(+) dodaj</option>
							<option value="minus">(-) odejmij </option>
							<option value="times">(*) pomnóż</option>
							<option value="div">(/) podziel</option>
						</select>
					</div>
					<div class="col-6 col-12-medium">
						<label for="y" class="napis">Druga liczba </label>
						<input id="y" type="text" placeholder="wartość y" name="y" value="{$form->y}">
					</div>
					<div class="col-6 col-12-medium">

						{include file='messages.tpl'}

						{if isset($res->result)}
							<h4>Wynik</h4>
							<p class="res">
								{$res->result}
							</p>
						{/if}
					</div>
					<div class="col-12">
						<input type="submit" value="Oblicz" />
					</div>
				</div>
			</form>
		</article>
{/block}