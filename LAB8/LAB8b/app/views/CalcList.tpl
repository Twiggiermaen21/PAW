{extends file="main.tpl"}

{block name=top}
	<div id="main">
		<div class="panel">
			<div class="col-6 col-12-medium">
				<a class="pure-button button-secondary" href="{$conf->action_root}CalcList">Lista Kredytowa</a>
				<a class="pure-button button-secondary" href="{$conf->action_root}CalcListNumbers">Lista Zwykła</a>
			</div>
			<div class="bottom-margin">
				<form class="pure-form pure-form-stacked" action="{$conf->action_url}CalcList">

					<legend>Opcje wyszukiwania</legend>
					<fieldset>
						<div class="row">
							<div class="col-6 col-12-medium">
								<input type="text" placeholder="kwota" name="sf_searchForm"
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

			<div class="panel">
				<h2>Lista obliczen kalkulatora kredytowego</h2>
				<br>
				<a>page {$searchForm->page+1} </a><br>
				<a>count {$searchForm->count} </a><br>
				<a>from {$searchForm->from} </a><br>
				<a>all page {$searchForm->all} </a><br>
				
				<div class="scale">
					<table id="tab_Calc" class="pure-table pure-table-bordered">
						<thead>
							<tr>
								<th>kwota</th>
								<th>miesiecy</th>
								<th>oproc.</th>
								<th>rata</th>
								<th>koszt</th>
								<th>calkowityKoszt</th>
								<th>data</th>
							</tr>
						</thead>
						<tbody>
							{foreach $resCalc as $r}
								{strip}
									<tr>
										<td>{$r["kwota"]}</td>
										<td>{$r["miesiecy"]}</td>
										<td>{$r["oprocentowanie"]}</td>
										<td>{$r["rata"]}</td>
										<td>{$r["koszt"]}</td>
										<td>{$r["calkowityKoszt"]}</td>
										<td>{$r["data"]}</td>
									</tr>
								{/strip}
							{/foreach}
						</tbody>
					</table>
				</div>
			<div style="text-align: center">
			<a class="pure-button pure-button-active" href ="{$conf->action_root}CalcList?page=1"> First</a>
			{for $i=1 to $searchForm->all}
					{if $i>$searchForm->page-2 && $i <=$searchForm->page+3} 
					<a class="pure-button pure-button-active" href ="{$conf->action_root}CalcList?page={$i}&sf_searchForm={$searchForm->search}"> {$i} </a>	
				{/if}
				{/for}
					<a class="pure-button pure-button-active" href ="{$conf->action_root}CalcList?page={$searchForm->all}&sf_searchForm={$searchForm->search}"> Last </a>
					</div>	
				{/block}