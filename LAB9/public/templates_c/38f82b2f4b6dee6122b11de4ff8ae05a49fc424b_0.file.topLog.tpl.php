<?php
/* Smarty version 4.3.4, created on 2024-05-06 23:35:53
  from 'C:\xampp\htdocs\studia\LAB9\app\views\topLog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66394d39ce9116_68402397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38f82b2f4b6dee6122b11de4ff8ae05a49fc424b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\topLog.tpl',
      1 => 1715031352,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_66394d39ce9116_68402397 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_85418763866394d39cdfc36_45576993', 'glowna');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'glowna'} */
class Block_85418763866394d39cdfc36_45576993 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_85418763866394d39cdfc36_45576993',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<div id="main">
	<div class="inner">


	<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div style="width:90%; margin: 2em auto;">

	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post"  class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
	<div class="row gtr-uniform">
	<div class="col-6 col-12-xsmall">
			<label for="id_login">Email: </label>
			<input id="id_login" type="text" size="20" name="login"/>
		
        
			<label for="id_pass">Hasło: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	
		

</div>
	</div>
	


<?php
}
}
/* {/block 'glowna'} */
}
