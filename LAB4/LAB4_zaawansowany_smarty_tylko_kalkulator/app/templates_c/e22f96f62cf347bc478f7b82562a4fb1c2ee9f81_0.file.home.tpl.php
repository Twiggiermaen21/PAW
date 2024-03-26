<?php
/* Smarty version 4.3.2, created on 2024-03-26 16:28:04
  from 'C:\xampp\htdocs\studia\LAB44_zaawansowany_smarty2\app\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6602e98404c765_44435779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e22f96f62cf347bc478f7b82562a4fb1c2ee9f81' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB44_zaawansowany_smarty2\\app\\home.tpl',
      1 => 1711360823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6602e98404c765_44435779 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2542485956602e98403a2f4_48003399', 'glowna');
?>


	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12812212216602e98403ae80_22541497', 'kredytowy');
?>


	<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/top_bottom.tpl");
}
/* {block 'glowna'} */
class Block_2542485956602e98403a2f4_48003399 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_2542485956602e98403a2f4_48003399',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div id="main">
		<article id="glowna" class="panel">
			<header>
				<h1>Strona głowna</h1>
			</header>
		</article>
	<?php
}
}
/* {/block 'glowna'} */
/* {block 'kredytowy'} */
class Block_12812212216602e98403ae80_22541497 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'kredytowy' => 
  array (
    0 => 'Block_12812212216602e98403ae80_22541497',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<article id="kredytowy" class="panel">
			<header>
				<h2>Kalkulator kredytowy </h2>
			</header>
			<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php#kredytowy" method="post">
				<div class="row">
					<div class="col-6 col-12-medium">
						<label for="id_kwota" class="napis">Kwota kredytu: </label>
						<input type="text" name="kwota" placeholder="wpisz" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
" />
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_miesiecy" class="napis">Liczba miesięcy: </label>
						<input type="text" name="miesiecy" placeholder="wpisz" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->miesiecy;?>
" />
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_oprocentowanie" class="napis">Oprocentowanie roczne: </label>
						<input id="id_oprocentowanie" type="text" name="oprocentowanie" placeholder="wpisz"
							value="<?php echo $_smarty_tpl->tpl_vars['form']->value->oprocentowanie;?>
">
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_oprocentowanie" class="napis">Wynik </label>

						
							<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
								<ol style=" padding: 2px 10px 10px 50px; border-radius: 5px; background-color: #f88; width:375px;">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
										<li> <?php echo $_smarty_tpl->tpl_vars['err']->value;?>
 </li>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</ol>
							<?php }?>
						
						<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
							<b>
								<div style="padding: 10px ; border-radius: 5px; background-color: #ff0; width:400px;  ">
									<h4>Rata: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
 zł</h4>
									<h4>Koszt kredytu: <?php echo $_smarty_tpl->tpl_vars['res']->value->koszt;?>
 zł</h4>
									<h4>Koszt całkowity: <?php echo $_smarty_tpl->tpl_vars['res']->value->calkowityKoszt;?>
 zł</h4>
								
									</div>
							</b>
						<?php }?>
					</div>
					<div class="col-12">
						<input type="submit" value="Oblicz" />
					</div>
				</div>
			</form>
		</article>
	<?php
}
}
/* {/block 'kredytowy'} */
}
