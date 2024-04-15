{extends file="2main.tpl"}

{block name=kredytowy}
    <div id="main">
        <article id="kredytowy" class="panel">
            <header>
                <h2>Kalkulator kredytowy </h2>
            </header>
            <form action="{$conf->action_root}Calc#kredytowy" method="post">
                <div class="row">
                    <div class="col-6 col-12-medium">
                        <label for="id_kwota" class="napis">Kwota kredytu: </label>
                        <input type="text" name="kwota" placeholder="wpisz" value="{$form->kwota}" />
                    </div>
                    <div class="col-6 col-12-medium">
                        <label for="id_miesiecy" class="napis">Liczba miesięcy: </label>
                        <input type="text" name="miesiecy" placeholder="wpisz" value="{$form->miesiecy}" />
                    </div>
                    <div class="col-6 col-12-medium">
                        <label for="id_oprocentowanie" class="napis">Oprocentowanie roczne: </label>
                        <input id="id_oprocentowanie" type="text" name="oprocentowanie" placeholder="wpisz"
                            value="{$form->oprocentowanie}">
                    </div>
                    <div class="col-6 col-12-medium">

                        {include file='messages.tpl'}

                        {if isset($res->result)}
                            <p class="res">
                            <h4>Wyniki: </h4>
                            <h5>Rata: {$res->result} zł</h5>
                            <h5>Koszt kredytu: {$res->koszt} zł</h5>
                            <h5>Koszt całkowity: {$res->calkowityKoszt} zł</h5>

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