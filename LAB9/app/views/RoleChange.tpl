{extends file="main.tpl"}

{block name=glowna}

    <div id="main">
        <div class="inner">

            <form id="search-form" class="pure-form pure-form-stacked"
                onsubmit="ajaxPostForm('search-form','{$conf->action_root}RoleShowlist','table'); return false;">
                <div class="row">
                    <div class="col-6 col-12-xsmall">
                        <label>
                            <h2>Opcje wyszukiwania</h2>
                        </label>
                        <input type="text" placeholder="Email" name="sf_searchForm" value="{$search}" /><br />
                    </div>
                </div>
                <button type="submit" class="button primary">Filtruj</button>
            </form>

            {include file='messages.tpl'}
            <div style="width:90%; margin: 2em auto;">
                <div id="table">
                    {include file="rolechangelist.tpl"}
                </div>
            </div>
        </div>
    </div>
{/block}