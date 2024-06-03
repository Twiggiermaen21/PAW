{extends file="main.tpl"}

{block name=glowna}

	<!-- Main -->
	<div id="main">
		<div class="inner">
			<section>

				{foreach $book as $b}
					<div class="row gtr-uniform">
						<div class="col-6 col-12-xsmall">

							<span class="image fit">
								<img src="{$conf->app_url}/{$b["img_url"]}" />
							</span>
						</div>
						<div class="col-6 col-12-xsmall">

							<h1> {$b["Tytul"]} </h1>
							<form method="post" action="{$conf->action_root}AddBookKoszyk?book={$b["idKsiazki"]}">
								


								<ul class="actions fit">
								<li><input type="submit" class="button primary" value="Kup" /></li>
								<li><div class="button"><input type="text" name="Ilosc" id="Ilosc" value="1" placeholder="Ilość " /></div></li>
								

							</ul>


							</form>

							<div class="table-wrapper">
								<table class="alt">
									{foreach $autor as $a}
										<tbody>
											<tr>
												<td>Autor</td>
												<td>{$a['Imie']} {$a['Nazwisko']}</td>

											</tr>
											<tr>
												<td>Kraj Pochodzenia</td>
												<td>{$a['Kraj_pochodzenia']}</td>

											</tr>
											<tr>
												<td>Data Urodzenia Autora</td>
												<td> {$a['Data_urodzenia']}</td>

											</tr>
										{/foreach}
										<tr>
											<td>Cena</td>
											<td>{$b["Cena"]} zł</td>

										</tr>
										<tr>
											<td>Ilość Stron</td>
											<td>{$b["Ilosc_stron"]}</td>

										</tr>

									</tbody>

								</table>
							</div>

							Opis
							<br>
							{$b["Opis"]}



						</div>


					</div>
				{/foreach}



			</section>
		</div>
	</div>

{/block }