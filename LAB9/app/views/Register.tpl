{extends file="main.tpl"}

{block name=glowna}
    <div id="main">
        <div class="inner">
            <div style="width:90%; margin: 2em auto;">
                <form action="{$conf->action_root}register" method="post" class="pure-form pure-form-aligned">
                    <fieldset>
                        <legend>
                            <h1>Rejestracja</h1>
                        </legend>
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-medium">
                                <label for="name">Imię</label>
                                <input id="name" type="text" placeholder="Wpisz Imię" name="Imie" size="10"
                                    value="{$form->Imie}">

                                <label for="surname">Nazwisko</label>
                                <input id="Nazwisko" type="text" placeholder="Wpisz Nazwisko" name="Nazwisko"
                                    value="{$form->Nazwisko}">

                                <label for="surname">Email</label>
                                <input id="Email" type="text" placeholder="Wpisz Email" name="Email" value="{$form->Email}">

                               

                             
                            
                            <div class="col-6 col-12-medium">
                                <label for="surname">Hasło</label>
                                <input id="Haslo" type="password" placeholder="Wpisz Hasło" name="Haslo"
                                    value="{$form->Haslo}">

                                <label for="surname">Powtórz Hasło</label>
                                <input id="Haslo2" type="password" placeholder="Powtórz Hasło" name="Haslo2"
                                    value="{$form->Haslo2}">

                                   
                            <div class="pure-controls">
                                <input type="submit" class="button primary fit" value="Zapisz" />
                                </div>
                                {include file='messages.tpl'}
                    </fieldset>
                </form>
             

            </div>
        </div>
    </div>
{/block }