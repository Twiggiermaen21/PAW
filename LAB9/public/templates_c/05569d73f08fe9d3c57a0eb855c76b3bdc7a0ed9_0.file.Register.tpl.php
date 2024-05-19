<?php
/* Smarty version 4.3.4, created on 2024-05-07 14:19:27
  from 'C:\xampp\htdocs\studia\LAB9\app\views\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_663a1c4f7878d2_58565165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05569d73f08fe9d3c57a0eb855c76b3bdc7a0ed9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\Register.tpl',
      1 => 1715084366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_663a1c4f7878d2_58565165 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1663886731663a1c4f7816e2_69826604', 'glowna');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'glowna'} */
class Block_1663886731663a1c4f7816e2_69826604 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_1663886731663a1c4f7816e2_69826604',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="main">
        <div class="inner">
            <div style="width:90%; margin: 2em auto;">
                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" method="post" class="pure-form pure-form-aligned">
                    <fieldset>
                        <legend>
                            <h1>Rejestracja</h1>
                        </legend>
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-medium">
                                <label for="name">Imię</label>
                                <input id="name" type="text" placeholder="Wpisz Imię" name="Imie" size="10"
                                    value="<?php echo $_smarty_tpl->tpl_vars['form']->value->Imie;?>
">

                                <label for="surname">Nazwisko</label>
                                <input id="Nazwisko" type="text" placeholder="Wpisz Nazwisko" name="Nazwisko"
                                    value="<?php echo $_smarty_tpl->tpl_vars['form']->value->Nazwisko;?>
">

                                <label for="surname">Email</label>
                                <input id="Email" type="text" placeholder="Wpisz Email" name="Email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->Email;?>
">

                               

                             
                            
                            <div class="col-6 col-12-medium">
                                <label for="surname">Hasło</label>
                                <input id="Haslo" type="password" placeholder="Wpisz Hasło" name="Haslo"
                                    value="<?php echo $_smarty_tpl->tpl_vars['form']->value->Haslo;?>
">

                                <label for="surname">Powtórz Hasło</label>
                                <input id="Haslo2" type="password" placeholder="Powtórz Hasło" name="Haslo2"
                                    value="<?php echo $_smarty_tpl->tpl_vars['form']->value->Haslo2;?>
">

                                   
                            <div class="pure-controls">
                                <input type="submit" class="button primary fit" value="Zapisz" />
                                </div>
                                <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    </fieldset>
                </form>
             

            </div>
        </div>
    </div>
<?php
}
}
/* {/block 'glowna'} */
}
