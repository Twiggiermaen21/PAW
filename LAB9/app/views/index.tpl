{extends file="main.tpl"}

{block name=glowna}
	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<h1>Kupuj, wypożyczaj i czytaj książki, które lubisz.<br /></h1>
			
			</header>
			<section class="tiles">
			{foreach $records as $r}
				{strip}
			<article>
					<span class="image">
						<img src="{$r["img_url"]}" alt="" />
					</span>
					<a href="{$conf->action_root}BookShow/{$r["idKsiazki"]}">
					
						<div class="content">
					
							<!--Tytuł -->
							<p>Tytuł:  {$r["Tytul"]}</p>
							<!-- Cena -->
							<p>Cena: {$r["Cena"]}</p>

							<p>Ilosc stron: {$r["Ilosc_stron"]}</p>
							<!-- Opis -->
							<p>Opis:  {$r["Opis"]}</p>
						
						</div>
					</a>
				</article>
			{/strip}
		{/foreach}
			</section>
		</div>
	</div>
{/block }