<section class="tiles">
				{foreach $records as $r}
					{strip}
						<article>
							<span class="image">
								<img src="{$r["img_url"]}" alt="" />
							</span>
							<a href="{$conf->action_root}BookShow?book={$r["idKsiazki"]}">
								<div class="content">
									<p>Tytuł: {$r["Tytul"]}</p>
									<p>Cena: {$r["Cena"]}</p>
									<p>Ilosc stron: {$r["Ilosc_stron"]}</p>
									<p>Opis: {$r["Opis"]}</p>
								</div>
							</a>
						</article>
					{/strip}
				{/foreach}

				
			</section>