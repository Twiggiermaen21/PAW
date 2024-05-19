<?php
/* Smarty version 4.3.4, created on 2024-05-12 20:20:50
  from 'C:\xampp\htdocs\studia\LAB9\app\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66410882727126_57534063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39b9ac356fcec9a0dd1eae46125a786905f08257' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\index.tpl',
      1 => 1715538048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66410882727126_57534063 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_166005619566410882717d97_29404049', 'glowna');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'glowna'} */
class Block_166005619566410882717d97_29404049 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_166005619566410882717d97_29404049',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<h1>Kupuj, wypożyczaj i czytaj książki, które lubisz.<br /></h1>
			
			</header>
			<section class="tiles">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['records']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
				<article><span class="image"><img src="<?php echo $_smarty_tpl->tpl_vars['r']->value["img_url"];?>
" alt="" /></span><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
BookShow/<?php echo $_smarty_tpl->tpl_vars['r']->value["idKsiazki"];?>
"><div class="content"><!--Tytuł --><p>Tytuł:  <?php echo $_smarty_tpl->tpl_vars['r']->value["Tytul"];?>
</p><!-- Cena --><p>Cena: <?php echo $_smarty_tpl->tpl_vars['r']->value["Cena"];?>
</p><p>Ilosc stron: <?php echo $_smarty_tpl->tpl_vars['r']->value["Ilosc_stron"];?>
</p><!-- Opis --><p>Opis:  <?php echo $_smarty_tpl->tpl_vars['r']->value["Opis"];?>
</p></div></a></article>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</section>
		</div>
	</div>
<?php
}
}
/* {/block 'glowna'} */
}
