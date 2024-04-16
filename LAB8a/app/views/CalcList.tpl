{extends file="main.tpl"}


{block name=CalcList}
	<div id="main">
		<div class="panel">
			<h2>Lista obliczen kalkulatora kredytowego</h2>
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
						{foreach $resCalcNumbers as $n}
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
		</div>
	</div>
{/block}