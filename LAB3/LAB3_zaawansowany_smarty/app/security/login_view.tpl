<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>

<body>

	<div style="width:90%; margin: 2em auto;">

		<form action="{$app_url}/app/security/login.php" method="post" class="pure-form pure-form-stacked">
			<legend>Logowanie</legend>
			<fieldset>
				<label for="id_login">login: </label>
				<input id="id_login" type="text" name="login" value="{$form['login']}" />
				<label for="id_pass">pass: </label>
				<input id="id_pass" type="password" name="pass" value="{$form['pass']}" />
			</fieldset>
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary" />
		</form>
		</div>
		<div class="l-box-lrg pure-u-1 pure-u-med-3-5">
		{if isset($messages) }
			{if count($messages) > 0}
				<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">
				{foreach $messages as $key => $msg}
					{strip}
					<li>{$msg}  </li>
					{/strip}
			{/foreach}
				</ol>
			{/if}
		{/if}
		

	</div>

</body>

</html>