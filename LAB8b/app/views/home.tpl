{extends file="2main.tpl"}

{block name=glowna}
	<div id="main">
		<article id="glowna" class="panel">
			<header>
				<h1>Strona głowna</h1>
				<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
			</header>
		</article>
		</div>
	{/block}
