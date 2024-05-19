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
								<img src="{$conf->app_url}/images/{$b["Tytul"]}.jpg" />
							</span>
						</div>
						<div class="col-6 col-12-xsmall">

<h1> {$b["Tytul"]}</h1>


							<div class="table-wrapper">
								<table class="alt">
									<tbody>
										<tr>
											<td>Autor</td>
											<td>'Imie' 'Nazwisko'</td>

										</tr>
										<tr>
											<td>Kraj Pochodzenia</td>
											<td>'Kraj_pochodzenia'</td>

										</tr>
										<tr>
											<td>Data Urodzenia Autora</td>
											<td> Data_urodzenia </td>

										</tr>
										<tr>
											<td>Cena</td>
											<td>$$$$$</td>

										</tr>
										<tr>
											<td>Ilość Stron</td>
											<td>55657</td>

										</tr>
										
									</tbody>

								</table>
							</div>
							
							Opis
							

						

						</div>


					</div>
				{/foreach}
			</section>
		</div>
	</div>

{/block }