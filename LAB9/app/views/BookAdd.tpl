{extends file="main.tpl"}

{block name=glowna}

    <div id="main">
        <div class="inner">
            <header>
                <h1>Dodaj książkę<br /></h1>

            </header>
            <section>
                <form method="post" action="{$conf->action_root}BookAdd" ENCTYPE="multipart/form-data">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <input type="text" name="Tytul" id="Tytul" value="{$book->Tytul}" placeholder="Tytył" />
                            <br>
                            <input type="text" name="Cena" id="Cena" placeholder="Cena" value="{$book->Cena}" />
                            <br>
                            <input id="Autor"   type="text" name="Autor" placeholder="Autor"  value="{$book->Autor}" />

                            <select name="Autor" id="Autor">
                            <option value="">- Category -</option>
                            <option value="1">Manufacturing</option>
                            <option value="1">Shipping</option>
                            <option value="1">Administration</option>
                            <option value="1">Human Resources</option>
                        </select>

                            <br>
                            <a class="button primary" href="{$conf->action_url}autorAdd">Dodaj Autora</a>
                            <input type="text" name="Ilosc_stron" id="Ilosc_stron" value="{$book->Ilosc_stron}" placeholder="Ilość Stron" />
                            <br>
                            <textarea type="text" name="Opis" id="Opis" placeholder="Opis">{$book->Opis} </textarea>
                            <br>
                            <input id="plik" type="file" name="plik" /><br />
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