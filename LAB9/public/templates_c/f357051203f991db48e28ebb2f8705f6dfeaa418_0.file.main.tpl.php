<?php
/* Smarty version 4.3.4, created on 2024-05-07 17:28:38
  from 'C:\xampp\htdocs\studia\LAB9\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_663a48a630ba29_16934380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f357051203f991db48e28ebb2f8705f6dfeaa418' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\templates\\main.tpl',
      1 => 1715095715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_663a48a630ba29_16934380 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
	<title>Księgarnia</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" />
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
		integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/style.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<noscript>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/noscript.css" />
	</noscript>
</head>



<body class="is-preload">
	<div id="wrapper">
		<header id="header">
			<div class="inner">
				<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
StronaGlowna" class="logo">
					<span class="symbol"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/images/logo.jpg" alt="" /></span><span
						class="title">Ksiegarnia</span>
				</a>
				<nav>
					<ul>
						<li><a href="#menu">Menu</a></li>
					</ul>
				</nav>

			</div>
		</header>
		<nav id="menu">
			<h2>Menu</h2>
			<ul>
				<?php if (!(isset($_smarty_tpl->tpl_vars['user']->value))) {?>
				
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">LOG</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registerShow">REJ</a></li>
				<?php } else { ?>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
UserDataShow"><?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</a></li>
					<?php if ($_smarty_tpl->tpl_vars['user']->value->role == 'admin') {?>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
BookAddShow">Dodaj Książke</a></li>
					<?php }?>
					
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">WYLOG</a></li>
				<?php }?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
KoszykShow">Koszyk</a></li>
			</ul>
		</nav>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1513166102663a48a63090c2_85642547', 'glowna');
?>


		<footer id="footer">
			<div class="inner">
				<section>
					<h2>Get in touch</h2>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>
							<div class="field half">
								<input type="email" name="email" id="email" placeholder="Email" />
							</div>
							<div class="field">
								<textarea name="message" id="message" placeholder="Message"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" value="Send" class="primary" /></li>
						</ul>
					</form>
				</section>
				<section>
					<h2>Follow</h2>
					<ul class="icons">
					
						<li><a href="https://github.com/Twiggiermaen21" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
				
					</ul>
				</section>
				<ul class="copyright">
					<li>&copy; Untitled. All rights reserved</li>
					<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</div>
		</footer>

	</div>

	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
/* {block 'glowna'} */
class Block_1513166102663a48a63090c2_85642547 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_1513166102663a48a63090c2_85642547',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'glowna'} */
}
