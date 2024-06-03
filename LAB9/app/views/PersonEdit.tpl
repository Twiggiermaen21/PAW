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
                        <form action="{$conf->action_root}personSave" method="post" class="pure-form pure-form-aligned">
                            {strip}
                                <tr>
                                    <th>imię</th>
                                    <td><input id="name" type="text" name="name" value="{$form->Imie}"></td>
                                </tr>
                                <tr>
                                    <th>Nazwisko</th>
                                    <td> <input id="Nazwisko" type="text" name="Nazwisko" value="{$form->Nazwisko}"></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><input id="Email" type="text" name="Email" value="{$form->Email}"></td>
                                </tr>

                                <tr>
                                    <th>Hasło</th>
                                    <td><input id="Haslo" type="password" name="Haslo" value="{$form->Haslo}"></td>
                                </tr>
                                {if $user->role=='Admin'}
                                    <tr>
                                        <th>Rola</th>
                                        <td><input id="Rola" type="text" name="Rola" value="{$form->Role}"></td>
                                    </tr>
                                {/if}
                                <tr>
                                    <th>Data_aktualizacji</th>
                                    <td>{$form->Data_aktualizacji}</td>
                                </tr>
                                <tr>
                                    <th>Id_aktualizacji</th>
                                    <td>{$form->Id_aktualizacji}</td>
                                </tr>

                            {/strip}

                            <input type="hidden" name="id" value="{$form->id}">
                            <input type="submit" class="pure-button pure-button-primary" value="Zapisz" />
                        </form>
                    </tbody>
                </table>
                <a class="button primary" href="{$conf->action_root}personList">Powrót</a>
            </div>
            {include file='messages.tpl'}
{/block}