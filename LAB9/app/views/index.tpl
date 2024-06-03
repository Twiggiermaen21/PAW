{extends file="main.tpl"}

{block name=glowna}
	<div id="main">
		<div class="inner">
			<header>
				<h1>Kupuj, wypożyczaj i czytaj książki, które lubisz.<br /></h1>
				<form id="search-form" class="pure-form pure-form-stacked"
					onsubmit="ajaxPostForm('search-form','{$conf->action_root}StronaGlownaBookList','table'); return false;">
					<div class="row">
						<div class="col-6 col-12-xsmall">
							<label>
								<h2>Opcje wyszukiwania</h2>
							</label>
							<input type="text" placeholder="Tytul" name="sf_searchForm"
								value="{$searchForm->search}" /><br />
						</div>
					</div>
					<button type="submit" class="button primary">Filtruj</button>
				</form>
				{include file='messages.tpl'}
			</header>

			<div id="table">
				{include file="MainBookList.tpl"}
			</div>

			<br><br><br><br><br>

			<div style="text-align: center">
				<a class="pure-button pure-button-active" href="{$conf->action_root}StronaGlowna?page=1"> First</a>
				{for $i=1 to $searchForm->all}
					{if $i>$searchForm->page-2 && $i <=$searchForm->page+3}
						<a id="ButtonI" class="pure-button pure-button-active"
						href="{$conf->action_root}StronaGlowna?page={$i}&sf_searchForm={$searchForm->search}">
							{$i} </a>
					{/if}
				{/for}
				<a class="pure-button pure-button-active"
				href="{$conf->action_root}StronaGlowna?page={$searchForm->all}&sf_searchForm={$searchForm->search}">
					Last
				</a>
			</div>
		</div>
	</div>
{/block }