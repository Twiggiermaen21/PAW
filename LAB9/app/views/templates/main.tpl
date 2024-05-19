<!DOCTYPE HTML>
<html lang="pl">

<head>
	<title>Księgarnia</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
		integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="{$conf->app_url}/assets/css/style.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<noscript>
		<link rel="stylesheet" href="{$conf->app_url}/css/noscript.css" />
	</noscript>
</head>



<body class="is-preload">
	<div id="wrapper">
		<header id="header">
			<div class="inner">
				<a href="{$conf->action_root}StronaGlowna" class="logo">
					<span class="symbol"><img src="{$conf->app_url}/images/logo.jpg" alt="" /></span><span
						class="title">Ksiegarnia</span>
				</a>
				<nav>
					<ul>
						<li><a href="#menu">Menu</a></li>
					</ul>
				</nav>

			</div>
		</header>
		<nav id="menu">
			<h2>Menu</h2>
			<ul>
				{if !isset($user)}
				
					<li><a href="{$conf->action_root}login">LOG</a></li>
					<li><a href="{$conf->action_root}registerShow">REJ</a></li>
				{else}
					<li><a href="{$conf->action_root}UserDataShow">{$user->login}</a></li>
					{if $user->role == 'admin'}
						<li><a href="{$conf->action_root}BookAddShow">Dodaj Książke</a></li>
					{/if}
					
					<li><a href="{$conf->action_root}logout">WYLOG</a></li>
				{/if}
				<li><a href="{$conf->action_root}KoszykShow">Koszyk</a></li>
			</ul>
		</nav>


		{block name=glowna} {/block}

		<footer id="footer">
			<div class="inner">
				<section>
					<h2>Get in touch</h2>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>
							<div class="field half">
								<input type="email" name="email" id="email" placeholder="Email" />
							</div>
							<div class="field">
								<textarea name="message" id="message" placeholder="Message"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" value="Send" class="primary" /></li>
						</ul>
					</form>
				</section>
				<section>
					<h2>Follow</h2>
					<ul class="icons">
					
						<li><a href="https://github.com/Twiggiermaen21" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
				
					</ul>
				</section>
				<ul class="copyright">
					<li>&copy; Untitled. All rights reserved</li>
					<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</div>
		</footer>

	</div>

	<script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
	<script src="{$conf->app_url}/assets/js/browser.min.js"></script>
	<script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
	<script src="{$conf->app_url}/assets/js/util.js"></script>
	<script src="{$conf->app_url}/assets/js/main.js"></script>

</body>

</html>