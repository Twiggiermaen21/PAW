{extends file="main.tpl"}

{block name=top}
   
    <div id="main">
    
        <div class="panel">
        
            <div class="bottom-margin">
                <form action="{$conf->action_root}personSave" method="post" class="pure-form pure-form-aligned">
              
                <div class="row">
                
                            <legend>Dane osoby</legend>
                            <div class="col-6 col-12-medium">
                                <label for="name">imię</label>
                                <input id="name" type="text" placeholder="imię" name="name" value="{$form->name}">
                            </div>
                            <div class="col-6 col-12-medium">
                                <label for="surname">nazwisko</label>
                                <input id="surname" type="text" placeholder="nazwisko" name="surname"
                                    value="{$form->surname}">
                            </div>
                            <div class="col-6 col-12-medium">
                                <label for="birthdate">data ur.</label>
                                <input id="birthdate" type="text" placeholder="data ur." name="birthdate"
                                    value="{$form->birthdate}">
                            </div>
                            <div class="col-6 col-12-medium">
                            <label for="role">rola</label>
                            <input id="role" type="text" placeholder="rola" name="role"
                                value="{$form->role}">
                        </div>
                            <div class="pure-controls">
                                <input type="submit" class="pure-button pure-button-primary" value="Zapisz" />
                                <a class="pure-button button-secondary" href="{$conf->action_root}personList">Powrót</a>
                            </div>
                      
                        
                        <input type="hidden" name="id" value="{$form->id}">
                        
                </form>
            </div>
            {include file='messages.tpl'}
{/block}