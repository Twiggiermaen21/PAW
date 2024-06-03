{extends file="main.tpl"}

{block name=glowna}

    <div id="main">
        <div class="inner">
            <header>
                <h1>Adres dostawy i rodzaj płatności<br /></h1>
                {include file='messages.tpl'}

            </header>
            <section>
                <form method="post" action="{$conf->action_root}OrderComplete">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label for="Adres">Podaj Adres</label>

                            <input type="text" name="Adres" id="Adres" value="{$pay->Adres}"
                                placeholder="np. Drogowa 13 Warszawa 21-231" />
                            <br>
                            <label for="pay">Wybierz rodzaj płatności</label>


                            <div class="col-4 col-12-small">
                                <input type="radio" id="Przelew" name="pay" value="Przelew Bankowy"
                                    {if $pay->Pay =="Przelew Bankowy" } checked {/if}>
                                <label for="Przelew">Przelew Bankowy</label>
                            </div>
                            <div class="col-4 col-12-small">
                                <input type="radio" id="Blik" name="pay" value="Blik" {if $pay->Pay =="Blik" } checked
                                    {/if}>
                                <label for="Blik">Blik</label>
                            </div>



                            <div class="col-4 col-12-small">
                                <input type="radio" id="Gotowka" name="pay" value="Gotowka" {if $pay->Pay =="Gotowka" }
                                    checked {/if}>
                                <label for="Gotowka">Gotówka</label>
                            </div>

                            <div class="col-6 col-12-small">
                                <input type="checkbox" id="regulamin" name="regulamin">
                                <label for="regulamin">Akceptuje regulami płatności i dostawy</label>
                            </div>


                        </div>

                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" name="submit " value="Zrealizuj zamównienie" class="primary" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
{/block}