{extends file="main.tpl"}

{block name=top}
	<div id="main">
		<div class="panel">
			<div class="col-6 col-12-medium">
				<a class="pure-button button-secondary" href="{$conf->action_root}CalcList">Lista Kredytowa</a>
				<a class="pure-button button-secondary" href="{$conf->action_root}CalcListNumbers">Lista Zwykła</a>
			</div>
			<div class="bottom-margin">
				<form class="pure-form pure-form-stacked" action="{$conf->action_url}CalcListNumbers">

					<legend>Opcje wyszukiwania</legend>
					<fieldset>
						<div class="row">
							<div class="col-6 col-12-medium">
								<input type="text" placeholder="operator" name="sf_searchForm"
									value="{$searchForm->search}" /><br />
							</div>
						</div>
						<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
					</fieldset>

				</form>

			</div>
			{include file='messages.tpl'}
		{/block}

		{block name=CalcList}
			<h2>Lista obliczen kalkulatora zwyklego</h2>
			<div class="scale">
				<table id="tab_CalcNumbers" class="pure-table pure-table-bordered">
					<thead>
						<tr>
							<th>x</th>
							<th>y</th>
							<th>op</th>
							<th>wynik</th>
							<th>data</th>
						</tr>
					</thead>
					<tbody>
						{foreach $resCalc as $n}
							{strip}
								<tr>
									<td>{$n["x"]}</td>
									<td>{$n["y"]}</td>
									<td>{$n["op"]}</td>
									<td>{$n["wynik"]}</td>
									<td>{$n["data"]}</td>
								</tr>
							{/strip}
						{/foreach}
					</tbody>
				</table>
			</div>


			<div style="text-align: center">
				<a class="pure-button pure-button-active" href="{$conf->action_root}CalcListNumbers?page=1"> First</a>
				{for $i=1 to $searchForm->all}
					{if $i>$searchForm->page-2 && $i <=$searchForm->page+3}
						<a class="pure-button pure-button-active"
							href="{$conf->action_root}CalcListNumbers?page={$i}&sf_searchForm={$searchForm->search}"> {$i} </a>
					{/if}
				{/for}
				<a class="pure-button pure-button-active"
					href="{$conf->action_root}CalcListNumbers?page={$searchForm->all}&sf_searchForm={$searchForm->search}"> Last
				</a>
			</div>
		</div>
	</div>
{/block}