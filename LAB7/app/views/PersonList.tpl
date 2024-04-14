{extends file="main.tpl"}

{block name=top}
	<div id="main">
		<div class="panel">
			<div class="bottom-margin">
				<form class="pure-form pure-form-stacked" action="{$conf->action_url}personList">

					<legend>Opcje wyszukiwania</legend>

					<fieldset>
						<div class="row">
							<div class="col-6 col-12-medium">
								<input type="text" placeholder="nazwisko" name="sf_surname"
									value="{$searchForm->surname}" /><br />
							</div>
						</div>
						<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
					</fieldset>

				</form>

			</div>
			{include file='messages.tpl'}
		{/block}

		{block name=bottom}
			<div class="bottom-margin">
				<a class="pure-button button-success" href="{$conf->action_root}personNew">+ Nowa osoba</a>
			</div>
			<br>
			<table id="tab_people" class="pure-table pure-table-bordered">
				<thead>
					<tr>
						<th>imię</th>
						<th>nazwisko</th>
						<th>data ur.</th>
						<th>opcje</th>
					</tr>
				</thead>
				<tbody>
					{foreach $people as $p}
						{strip}
							<tr>
								<td>{$p["name"]}</td>
								<td>{$p["surname"]}</td>
								<td>{$p["birthdate"]}</td>
								<td>
									<a class="button-small pure-button button-secondary"
										href="{$conf->action_url}personEdit&id={$p['idperson']}">Edytuj</a>
									&nbsp;
									<a class="button-small pure-button button-warning"
										href="{$conf->action_url}personDelete&id={$p['idperson']}">Usuń</a>
								</td>
							</tr>
						{/strip}
					{/foreach}
				</tbody>
			</table>

{/block}