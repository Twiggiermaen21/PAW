{extends file="main.tpl"}

{block name=zwykly}
    <div id="main">
        <article id="zwykly" class="panel">
            <header>
                <h2>Kalkulator zwykły</h2>
            </header>
            <form action="{$conf->action_root}CalcNumbers#zwykly" method="post">
                <div class="row">
                    <div class="col-6 col-12-medium">
                        <label for="x" class="napis">Kwota kredytu: </label>
                        <input type="text" placeholder="wartość x" name="x" value="{$form->x}">
                    </div>
                    <div class="col-6 col-12-medium">
                        <label for="op">Operacja</label>
                        <select id="op" name="op">
                            {if isset($res->op_name)}
                                <option value="{$form->op}">ponownie: {$res->op_name}</option>
                                <option value="" disabled="true">---</option>
                            {/if}
                            <option value="plus">(+) dodaj</option>
                            <option value="minus">(-) odejmij </option>
                            <option value="times">(*) pomnóż</option>
                            <option value="div">(/) podziel</option>
                        </select>
                    </div>
                    <div class="col-6 col-12-medium">
                        <label for="y" class="napis">Druga liczba </label>
                        <input id="y" type="text" placeholder="wartość y" name="y" value="{$form->y}">
                    </div>
                    <div class="col-6 col-12-medium">

                        {include file='messages.tpl'}

                        {if isset($res->result)}
                            <h4>Wynik</h4>
                            <p class="res">
                                {$res->result}
                            </p>
                        {/if}
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Oblicz" />
                    </div>
                </div>
            </form>
        </article>
    </div>
{/block}