<table id="User_tab" class="pure-table pure-table-bordered">
<tbody>
    {foreach $dane as $d}
        {strip}
            <tr>
                <th>imię</th>
                <td>{$d["Imie"]}</td>
            </tr>
            <tr>
                <th>Nazwisko</th>
                <td>{$d["Nazwisko"]}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{$d["Email"]}</td>
            </tr>

            <tr>
                <th>Hasło</th>
                <td>{$d["Haslo"] }</td>
            </tr>

            <tr>
                <th>Rola</th>
                <td>
                    {foreach $dane_role as $dr}
                        {if $dr["idUzytkownik_has_Rola"] =={$d["idUzytkownik"]}}
                            {foreach $role as $r}
                                {if $r["idRola"] ==$dr["Rola_idRola"]}
                                    {$r["NazwaRoli"]}
                                {/if}
                            {{/foreach}}
                        {/if}
                    {{/foreach}}
                </td>
            </tr>
            <tr>
                <th>Data_aktualizacji</th>
                <td>{$d["Data_aktualizacji"] }</td>
            </tr>
            <tr>
                <th>Id_aktualizacji</th>
                <td>{$d["Id_aktualizacji"] }</td>
            </tr>
            <tr>
                <td> <a class="button primary"
                        href="{$conf->action_url}personEdit?id={$d['idUzytkownik']}">Edytuj</a></td>
                <td> <a class="button primary"
                        href="{$conf->action_url}personDelete?id={$d['idUzytkownik']}">Usuń</a></td>
            </tr>
        {/strip}
    {/foreach}
</tbody>
</table>