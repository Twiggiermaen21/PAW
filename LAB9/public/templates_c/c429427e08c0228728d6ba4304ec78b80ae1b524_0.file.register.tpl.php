<?php
/* Smarty version 4.3.4, created on 2024-05-05 22:33:02
  from 'C:\xampp\htdocs\studia\LAB9\app\views\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6637ecfee31605_41378068',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c429427e08c0228728d6ba4304ec78b80ae1b524' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\register.tpl',
      1 => 1714941180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6637ecfee31605_41378068 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18400501066637ecfee26b25_33770434', 'top');
?>

<?php }
/* {block 'top'} */
class Block_18400501066637ecfee26b25_33770434 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_18400501066637ecfee26b25_33770434',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 

<body>

	<div style="width:90%; margin: 2em auto;">

	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
register" method="post"  class="pure-form pure-form-aligned bottom-margin">
	<legend>Rejestracja do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">Adress Email </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">Hasło </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-control-group">
		<label for="id_cor_pass">Powtórz Hasło </label>
		<input id="id_cor_pass" type="password" name="cor_pass" /><br />
	</div>
	
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	
		
<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</div>

</body>
<?php
}
}
/* {/block 'top'} */
}
