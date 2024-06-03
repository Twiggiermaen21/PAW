{extends file="main.tpl"}

{block name=glowna}

    <div id="main">
        <div class="inner">
            <header>
                <h1>Adres dostawy i rodzaj płatności<br /></h1>
                {include file='messages.tpl'}
            </header>
            <section>
                <div style="width:90%; margin: 2em auto;">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall"> </div>
                        <div class="col-6 col-12-xsmall" style="text-align:right"> {$pay->Data} </div>
                        <div class="col-6 col-12-xsmall">Sprzedawca <br> <a>Ksiegarnia </a> </div>
                        <div class="col-6 col-12-xsmall"> Nabywca <br> <a>{$user->Imie} {$user->Nazwisko} </a> <br> <a>{$user->login} </a> </div>
                        <div class="col-12 col-12-xsmall">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Książka</th>
                                            <th>Autor</th>
                                            <th>Sztuk</th>
                                            <th>Cena</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $Order->book as $b}
                                            <tr>
                                                <td> {$b['Tytul']}</td>
                                                {foreach $Order->autor as $a}
                                                    {foreach $Order->autor_book as $ab}
                                                        {if $b['idKsiazki']==$ab['Ksiazki_idKsiazki'] && $a['idAutor_Ksiazki']== $ab['Autor_Ksiazki_idAutor_Ksiazki']}
                                                            <td> {$a['Imie']} {$a['Nazwisko']}</td>
                                                        {/if}
                                                    {/foreach}
                                                {/foreach}
                                                {for $i=0 to $Order->sztuk}
                                                    {if $b['idKsiazki']==$Order->tablica[0][$i]}
                                                        <td>{$Order->tablica[1][$i]}</td>
                                                    {/if}
                                                {/for}
                                                <td>{$b['Cena']}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>
                                                {$Order->cena}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    Sposób zapłaty: {$pay->Pay} <br>
                    Adres: {$pay->Adres}
                </div>
        </section>
    </div>
    </div>
{/block}