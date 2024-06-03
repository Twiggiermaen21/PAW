{extends file="main.tpl"}

{block name=glowna}
	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<h1>Twój Koszyk<br /></h1>
				{include file='messages.tpl'}
			</header>
			<div style="width:90%; margin: 2em auto;">
				<form action="{$conf->action_root}Ordertrasfer" method="post" class="pure-form pure-form-aligned">
					<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th>Książka</th>
									<th>Autor</th>
									<th>Sztuk</th>
									<th>Cena</th>
								</tr>
							</thead>
							<tbody>
								{foreach $book as $b}
									<tr>
										<td> {$b['Tytul']}</td>
										{foreach $autor as $a}
											{foreach $autor_book as $ab}
												{if $b['idKsiazki']==$ab['Ksiazki_idKsiazki'] && $a['idAutor_Ksiazki']== $ab['Autor_Ksiazki_idAutor_Ksiazki']}
													<td> {$a['Imie']} {$a['Nazwisko']}</td>
												{/if}
											{/foreach}
										{/foreach}
										{for $i=0 to $Ilosc}
											{if $b['idKsiazki']==$tablica[0][$i]}
												<td>{$tablica[1][$i]}</td>
											{/if}
										{/for}
										<td>{$b['Cena']}</td>
									</tr>
								{/foreach}
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3"></td>
									<td>
										{$cena}</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<input type="submit" class="pure-button pure-button-primary" value="Płatność i dostawa" />
				</form>
				<a class="button primary" href="{$conf->action_url}KoszykClear">Wyczyść Koszyk</a>
			</div>
		</div>
	</div>
{/block }