<?php
/* Smarty version 4.3.4, created on 2024-05-07 14:56:52
  from 'C:\xampp\htdocs\studia\LAB9\app\views\PersonEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_663a2514dc6382_01307245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e34352f69f42a3f31b6b356679c17ba23a732407' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\PersonEdit.tpl',
      1 => 1715086555,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_663a2514dc6382_01307245 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_938199871663a2514dbf595_88215716', 'glowna');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'glowna'} */
class Block_938199871663a2514dbf595_88215716 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_938199871663a2514dbf595_88215716',
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
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSave" method="post" class="pure-form pure-form-aligned">
        <tr><th>imię</th> <td><input id="name" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->Imie;?>
"></td> </tr><tr><th>Nazwisko</th><td> <input id="Nazwisko" type="text" name="Nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->Nazwisko;?>
"></td> </tr><tr> <th>Email</th> <td><input id="Email" type="text" name="Email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->Email;?>
"></td> </tr><tr><th>Hasło</th><td><input id="Haslo" type="password" name="Haslo" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->Haslo;?>
"></td> </tr><tr> <th>Data_aktualizacji</th><td><?php echo $_smarty_tpl->tpl_vars['form']->value->Data_aktualizacji;?>
</td> </tr><tr> <th>Id_aktualizacji</th> <td><?php echo $_smarty_tpl->tpl_vars['form']->value->Id_aktualizacji;?>
</td> </tr>

        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
        <input type="submit" class="pure-button pure-button-primary" value="Zapisz" />
        </form>
</tbody>
</table>
<a class="button primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personList">Powrót</a>
            </div>
            <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block 'glowna'} */
}
