<!DOCTYPE HTML>
<html lang="pl">

<head>
	<title>Kalkulator</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<div id="wrapper">

		<nav id="nav">
			<a href="{$conf->action_root}CalcView#glowna" class="icon solid fa-home"><span>głowna</span></a>
			<a href="{$conf->action_root}CalcView#kredytowy" class="icon solid fa-money-bill"><span>Kredytowy</span></a>
			<a href="{$conf->action_root}NumbersView#zwykly" class="icon solid fa-calculator"><span>Zwykły</span></a>
		
		</nav>
		{block name=glowna} Domyślna treść zawartości .... {/block}
		{block name=kredytowy} Domyślna treść zawartości .... {/block}
		{block name=zwykly} Domyślna treść zawartości .... {/block}
		<div id="footer">
			<ul class="copyright">
				<li>&copy; Untitled.</li>
				<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
			</ul>
		</div>

	</div>

	<script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
	<script src="{$conf->app_url}/assets/js/browser.min.js"></script>
	<script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
	<script src="{$conf->app_url}/assets/js/util.js"></script>
	<script src="{$conf->app_url}/assets/js/main.js"></script>

</body>

</html>