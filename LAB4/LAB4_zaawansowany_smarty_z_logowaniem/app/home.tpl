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
			<form action="{$conf->app_url}/app/calc.php#kredytowy" method="post">
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

	