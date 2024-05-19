{extends file="main.tpl"}

{block name=glowna}

	<div id="main">
	<div class="inner">


	{include file='messages.tpl'}

	<div style="width:90%; margin: 2em auto;">

	<form action="{$conf->action_url}login" method="post"  class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
	<div class="row gtr-uniform">
	<div class="col-6 col-12-xsmall">
			<label for="id_login">Email: </label>
			<input id="id_login" type="text" size="20" name="login"/>
		
        
			<label for="id_pass">Hasło: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	
		

</div>
	</div>
	


{/block}
