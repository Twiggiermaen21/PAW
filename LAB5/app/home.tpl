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
						<label for="id_oprocentowanie" class="napis">Wynik </label>

						
							{if $msgs->isError()}
								<ol style=" padding: 2px 10px 10px 50px; border-radius: 5px; background-color: #f88; width:375px;">
									{foreach $msgs->getErrors() as $err }
										{strip}
											<li> {$err} </li>
										{/strip}
									{/foreach}
								</ol>
							{/if}
						
						{if isset($res->result)}
							<b>
								<div style="padding: 10px ; border-radius: 5px; background-color: #ff0; width:400px;  ">
									<h4>Rata: {$res->result} zł</h4>
									<h4>Koszt kredytu: {$res->koszt} zł</h4>
									<h4>Koszt całkowity: {$res->calkowityKoszt} zł</h4>
								
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
		<form action="{$conf->action_root}Numbers#zwykly" method="post">
			<div class="row">
				<div class="col-6 col-12-medium">
					<label for="x">Pierwsza liczba</label>
					<input type="text" placeholder="wartość x" name="x"  value="{$form->x}">
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
					<label for="y">Druga liczba</label>
					<input id="y" type="text" placeholder="wartość y" name="y" value="{$form->y}" >
				</div>
				<div class="col-6 col-12-medium">
				{if $msgs->isError()}
					<h4>Wystąpiły błędy: </h4>
					<ol class="err">
					{foreach $msgs->getErrors() as $err}
					{strip}
						<li>{$err}</li>
					{/strip}
					{/foreach}
					</ol>
				{/if}

					{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Wynik</h4>
	<p class="res">
	{$res->result}
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