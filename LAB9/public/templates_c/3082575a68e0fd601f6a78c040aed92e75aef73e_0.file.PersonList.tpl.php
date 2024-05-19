<?php
/* Smarty version 4.3.4, created on 2024-05-05 23:00:59
  from 'C:\xampp\htdocs\studia\LAB9\app\views\PersonList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6637f38b3a1be9_68779788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3082575a68e0fd601f6a78c040aed92e75aef73e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\PersonList.tpl',
      1 => 1713527867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6637f38b3a1be9_68779788 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17884367746637f38b38b438_41702889', 'top');
?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19744311716637f38b394a42_91947655', 'bottom');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_17884367746637f38b38b438_41702889 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_17884367746637f38b38b438_41702889',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div id="main">
		<div class="panel">
			<div class="bottom-margin">
				<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personList">

					<legend>Opcje wyszukiwania</legend>

					<fieldset>
						<div class="row">
							<div class="col-6 col-12-medium">
								<input type="text" placeholder="nazwisko" name="sf_surname"
									value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->surname;?>
" /><br />
							</div>
						</div>
						<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
					</fieldset>

				</form>

			</div>
			<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_19744311716637f38b394a42_91947655 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_19744311716637f38b394a42_91947655',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<div class="bottom-margin">
				<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNew">+ Nowa osoba</a>
			</div>
			<br>
			<table id="tab_people" class="pure-table pure-table-bordered">
				<thead>
					<tr>
						<th>imię</th>
						<th>nazwisko</th>
						<th>data ur.</th>
						<th>rola</th>
						<th>opcje</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
						<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["birthdate"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["role"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idperson'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idperson'];?>
">Usuń</a></td></tr>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</tbody>
			</table>
<?php
}
}
/* {/block 'bottom'} */
}
