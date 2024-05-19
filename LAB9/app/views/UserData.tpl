{extends file="main.tpl"}

{block name=glowna}

    <div id="main">
        <div class="inner">
            <header>
                <h1>Dane użytkownika<br /></h1>

            </header>
            <div style="width:90%; margin: 2em auto;">
                <table id="User_tab" class="pure-table pure-table-bordered">

                    <tbody>
                        {foreach $dane as $d}
                            {strip}
                                <tr><th>imię</th><td>{$d["Imie"]}</td></tr>
                                <tr><th>Nazwisko</th>  <td>{$d["Nazwisko"]}</td>  </tr>
                                <tr><th>Email</th> <td>{$d["Email"]}</td>    </tr>
                               
                                <tr>  <th>Hasło</th>   <td>{$d["Haslo"] }</td>  </tr>
                                <tr> <th>Data_aktualizacji</th>   <td>{$d["Data_aktualizacji"] }</td> </tr>
                                <tr>  <th>Id_aktualizacji</th>  <td>{$d["Id_aktualizacji"] }</td>  </tr>
                            {/strip}
                        {/foreach}
                    </tbody>
                </table>

                <a class="button primary" href="{$conf->action_url}personEdit/{$d['idUzytkownik']}">Edytuj</a>

            </div>
        </div>
    </div>
{/block}