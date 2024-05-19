<?php
/* Smarty version 4.3.4, created on 2024-05-05 21:13:39
  from 'C:\xampp\htdocs\studia\LAB9\app\views\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6637da631d5fa9_26846819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40873c1785b7dd740b95b6333fd34105096d8243' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\home.tpl',
      1 => 1713521432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6637da631d5fa9_26846819 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2681722046637da631d1108_90946762', 'glowna');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'glowna'} */
class Block_2681722046637da631d1108_90946762 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_2681722046637da631d1108_90946762',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div id="main">
		<article id="glowna" class="panel">
			<header>
				<h1>Strona głowna</h1>
				<h3>Końcowa wersja by Kacper Pudełko</h3>
				<span class="bottom-right">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
			</header>
		</article>
		</div>
	<?php
}
}
/* {/block 'glowna'} */
}
