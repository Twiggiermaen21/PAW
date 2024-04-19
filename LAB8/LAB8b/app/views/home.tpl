{extends file="main.tpl"}

{block name=glowna}
	<div id="main">
		<article id="glowna" class="panel">
			<header>
				<h1>Strona głowna</h1>
				<h3>Końcowa wersja by Kacper Pudełko</h3>
				<span class="bottom-right">użytkownik: {$user->login}, rola: {$user->role}</span>
			</header>
		</article>
		</div>
	{/block}
