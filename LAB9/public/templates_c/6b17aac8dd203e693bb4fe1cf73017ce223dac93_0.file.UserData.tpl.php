<?php
/* Smarty version 4.3.4, created on 2024-05-07 14:56:51
  from 'C:\xampp\htdocs\studia\LAB9\app\views\UserData.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_663a2513230d72_60180111',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b17aac8dd203e693bb4fe1cf73017ce223dac93' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\UserData.tpl',
      1 => 1715086609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_663a2513230d72_60180111 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_380506530663a251314f118_50033864', 'glowna');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'glowna'} */
class Block_380506530663a251314f118_50033864 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_380506530663a251314f118_50033864',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div id="main">
        <div class="inner">
            <header>
                <h1>Dane użytkownika<br /></h1>

            </header>
            <div style="width:90%; margin: 2em auto;">
                <table id="User_tab" class="pure-table pure-table-bordered">

                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dane']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
                            <tr><th>imię</th><td><?php echo $_smarty_tpl->tpl_vars['d']->value["Imie"];?>
</td></tr><tr><th>Nazwisko</th> <td><?php echo $_smarty_tpl->tpl_vars['d']->value["Nazwisko"];?>
</td> </tr><tr><th>Email</th> <td><?php echo $_smarty_tpl->tpl_vars['d']->value["Email"];?>
</td> </tr><tr> <th>Hasło</th> <td><?php echo $_smarty_tpl->tpl_vars['d']->value["Haslo"];?>
</td> </tr><tr> <th>Data_aktualizacji</th> <td><?php echo $_smarty_tpl->tpl_vars['d']->value["Data_aktualizacji"];?>
</td> </tr><tr> <th>Id_aktualizacji</th> <td><?php echo $_smarty_tpl->tpl_vars['d']->value["Id_aktualizacji"];?>
</td> </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>

                <a class="button primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEdit/<?php echo $_smarty_tpl->tpl_vars['d']->value['idUzytkownik'];?>
">Edytuj</a>

            </div>
        </div>
    </div>
<?php
}
}
/* {/block 'glowna'} */
}
