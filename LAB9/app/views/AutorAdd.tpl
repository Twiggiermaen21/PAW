{extends file="main.tpl"}

{block name=glowna}

    <div id="main">
        <div class="inner">
            <header>
                <h1>Dodaj Autora<br /></h1>

            </header>
            <section>
                <form method="post" action="{$conf->action_root}AutorAdd">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <input type="text" name="Imie" id="Imie" value="{$Autor->Imie}" placeholder="Imie" />
                            <br>
                            <input type="text" name="Nazwisko" id="Nazwisko" placeholder="Nazwisko" value="{$Autor->Nazwisko}" />
                            <br>
                            <input id="Data_urodzenia"   type="text" name="Data_urodzenia" placeholder="Data_urodzenia"  value="{$Autor->Data_urodzenia}" />
                            <br>
                            <input type="text" name="Kraj_pochodzenia" id="Kraj_pochodzenia" value="{$Autor->Kraj_pochodzenia}" placeholder="Kraj pochodzenia" />
                            <br>
                        </div>

                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" name="submit " value="Dodaj" class="primary" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
                {include file='messages.tpl'}
            </section>
        </div>
    </div>
{/block}