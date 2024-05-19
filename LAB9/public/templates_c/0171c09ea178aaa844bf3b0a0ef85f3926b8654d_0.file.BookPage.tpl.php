<?php
/* Smarty version 4.3.4, created on 2024-05-07 15:52:00
  from 'C:\xampp\htdocs\studia\LAB9\app\views\BookPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_663a32000c5010_70747427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0171c09ea178aaa844bf3b0a0ef85f3926b8654d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB9\\app\\views\\BookPage.tpl',
      1 => 1715089918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_663a32000c5010_70747427 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2008888432663a32000b7263_32854138', 'glowna');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'glowna'} */
class Block_2008888432663a32000b7263_32854138 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_2008888432663a32000b7263_32854138',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<!-- Main -->
	<div id="main">
		<div class="inner">
			<section>
				
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['book']->value, 'b');
$_smarty_tpl->tpl_vars['b']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->do_else = false;
?>
					<div class="row gtr-uniform">
						<div class="col-6 col-12-xsmall">

							<span class="image fit">
								<img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/images/<?php echo $_smarty_tpl->tpl_vars['b']->value["Tytul"];?>
.jpg" />
							</span>
						</div>
						<div class="col-6 col-12-xsmall">

<h1> <?php echo $_smarty_tpl->tpl_vars['b']->value["Tytul"];?>
</h1>


							<div class="table-wrapper">
								<table class="alt">
									<tbody>
										<tr>
											<td>Autor</td>
											<td>'Imie' 'Nazwisko'</td>

										</tr>
										<tr>
											<td>Kraj Pochodzenia</td>
											<td>'Kraj_pochodzenia'</td>

										</tr>
										<tr>
											<td>Data Urodzenia Autora</td>
											<td> Data_urodzenia </td>

										</tr>
										<tr>
											<td>Cena</td>
											<td>$$$$$</td>

										</tr>
										<tr>
											<td>Ilość Stron</td>
											<td>55657</td>

										</tr>
										
									</tbody>

								</table>
							</div>
							
							Opis
							

						

						</div>


					</div>
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
