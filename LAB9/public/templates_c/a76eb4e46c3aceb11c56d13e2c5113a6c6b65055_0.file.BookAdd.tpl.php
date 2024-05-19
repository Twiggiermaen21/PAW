<?php
/* Smarty version 4.3.4, created on 2024-05-12 21:21:30
  from 'C:\xampp\htdocs\studia\LAB9\app\views\BookAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_664116bab2f0e9_46062069',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a76eb4e46c3aceb11c56d13e2c5113a6c6b65055' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\BookAdd.tpl',
      1 => 1715538675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_664116bab2f0e9_46062069 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1262956484664116bab24c26_21366475', 'glowna');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'glowna'} */
class Block_1262956484664116bab24c26_21366475 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_1262956484664116bab24c26_21366475',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div id="main">
        <div class="inner">
            <header>
                <h1>Dodaj książkę<br /></h1>

            </header>
            <section>
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
BookAdd" ENCTYPE="multipart/form-data">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <input type="text" name="Tytul" id="Tytul" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->Tytul;?>
" placeholder="Tytył" />
                            <br>
                            <input type="text" name="Cena" id="Cena" placeholder="Cena" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->Cena;?>
" />
                            <br>
                            <input id="Autor"   type="text" name="Autor" placeholder="Autor"  value="<?php echo $_smarty_tpl->tpl_vars['book']->value->Autor;?>
" />

                            <select name="Autor" id="Autor">
                            <option value="">- Category -</option>
                            <option value="1">Manufacturing</option>
                            <option value="1">Shipping</option>
                            <option value="1">Administration</option>
                            <option value="1">Human Resources</option>
                        </select>

                            <br>
                            <a class="button primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
autorAdd">Dodaj Autora</a>
                            <input type="text" name="Ilosc_stron" id="Ilosc_stron" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->Ilosc_stron;?>
" placeholder="Ilość Stron" />
                            <br>
                            <textarea type="text" name="Opis" id="Opis" placeholder="Opis"><?php echo $_smarty_tpl->tpl_vars['book']->value->Opis;?>
 </textarea>
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
                <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </section>
        </div>
    </div>
<?php
}
}
/* {/block 'glowna'} */
}
