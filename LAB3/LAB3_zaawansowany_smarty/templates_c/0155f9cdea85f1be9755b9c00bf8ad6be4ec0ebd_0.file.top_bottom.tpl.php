<?php
/* Smarty version 4.3.2, created on 2024-03-22 16:12:18
  from 'C:\xampp\htdocs\studia\LAB3_zaawansowany_smarty\templates\top_bottom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65fd9fd25465b7_81469711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0155f9cdea85f1be9755b9c00bf8ad6be4ec0ebd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB3_zaawansowany_smarty\\templates\\top_bottom.tpl',
      1 => 1711118235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65fd9fd25465b7_81469711 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
	<title>Kalkulator</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<div id="wrapper">

		<nav id="nav">
			<a href="#glowna" class="icon solid fa-home"><span>głowna</span></a>
			<a href="#kredytowy" class="icon solid fa-money-bill"><span>Kredytowy</span></a>
			<a href="#zwykly" class="icon solid fa-calculator"><span>Zwykły</span></a>

			<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/security/logout.php" class="icon solid fa-arrow-right"><span>Wyloguj</span></a>
		</nav>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_148740935465fd9fd2545101_70868446', 'glowna');
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_54363080565fd9fd2545728_00958352', 'kredytowy');
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_126549395865fd9fd2545ba6_91814965', 'zwykly');
?>

		<div id="footer">
			<ul class="copyright">
				<li>&copy; Untitled.</li>
				<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
			</ul>
		</div>

	</div>

	<!-- Scripts -->
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
/* {block 'glowna'} */
class Block_148740935465fd9fd2545101_70868446 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_148740935465fd9fd2545101_70868446',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'glowna'} */
/* {block 'kredytowy'} */
class Block_54363080565fd9fd2545728_00958352 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'kredytowy' => 
  array (
    0 => 'Block_54363080565fd9fd2545728_00958352',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'kredytowy'} */
/* {block 'zwykly'} */
class Block_126549395865fd9fd2545ba6_91814965 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zwykly' => 
  array (
    0 => 'Block_126549395865fd9fd2545ba6_91814965',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'zwykly'} */
}
