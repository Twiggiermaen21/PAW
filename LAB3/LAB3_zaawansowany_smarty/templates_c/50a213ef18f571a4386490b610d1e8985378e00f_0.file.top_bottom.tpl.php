<?php
/* Smarty version 4.3.2, created on 2024-03-22 16:10:02
  from 'C:\xampp\htdocs\studia\LAB3_smarty\templates\top_bottom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65fd9f4abe26a7_43263630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50a213ef18f571a4386490b610d1e8985378e00f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB3_smarty\\templates\\top_bottom.tpl',
      1 => 1711118235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65fd9f4abe26a7_43263630 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_180667301665fd9f4abe0f60_73668698', 'glowna');
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_203688659465fd9f4abe1637_62325798', 'kredytowy');
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_197451776665fd9f4abe1b40_91168706', 'zwykly');
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
class Block_180667301665fd9f4abe0f60_73668698 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_180667301665fd9f4abe0f60_73668698',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'glowna'} */
/* {block 'kredytowy'} */
class Block_203688659465fd9f4abe1637_62325798 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'kredytowy' => 
  array (
    0 => 'Block_203688659465fd9f4abe1637_62325798',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'kredytowy'} */
/* {block 'zwykly'} */
class Block_197451776665fd9f4abe1b40_91168706 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zwykly' => 
  array (
    0 => 'Block_197451776665fd9f4abe1b40_91168706',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'zwykly'} */
}
