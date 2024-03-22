<?php
/* Smarty version 4.3.2, created on 2024-03-22 16:12:21
  from 'C:\xampp\htdocs\studia\LAB3_zaawansowany_smarty\app\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65fd9fd5dde0d3_60977065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efa44d0caf9451609f8f79a5edcf81545dfdbcab' => 
    array (
      0 => 'C:\\xampp\\htdocs\\studia\\LAB3_zaawansowany_smarty\\app\\home.tpl',
      1 => 1711119547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65fd9fd5dde0d3_60977065 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_179216733265fd9fd5dd0828_63346764', 'glowna');
?>


	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_210645134465fd9fd5dd1044_70603118', 'kredytowy');
?>


	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_32282194665fd9fd5dd9ff0_15866701', 'zwykly');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/top_bottom.tpl");
}
/* {block 'glowna'} */
class Block_179216733265fd9fd5dd0828_63346764 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'glowna' => 
  array (
    0 => 'Block_179216733265fd9fd5dd0828_63346764',
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
class Block_210645134465fd9fd5dd1044_70603118 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'kredytowy' => 
  array (
    0 => 'Block_210645134465fd9fd5dd1044_70603118',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<article id="kredytowy" class="panel">
			<header>
				<h2>Kalkulator kredytowy </h2>
			</header>
			<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php#kredytowy" method="post">
				<div class="row">
					<div class="col-6 col-12-medium">
						<label for="id_kwota" class="napis">Kwota kredytu: </label>
						<input type="text" name="kwota" placeholder="wpisz" value="<?php echo $_smarty_tpl->tpl_vars['kwota']->value;?>
" />
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_miesiecy" class="napis">Liczba miesięcy: </label>
						<input type="text" name="miesiecy" placeholder="wpisz" value="<?php echo $_smarty_tpl->tpl_vars['miesiecy']->value;?>
" />
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_oprocentowanie" class="napis">Oprocentowanie roczne: </label>
						<input id="id_oprocentowanie" type="text" name="oprocentowanie" placeholder="wpisz"
							value="<?php echo $_smarty_tpl->tpl_vars['oprocentowanie']->value;?>
">
					</div>
					<div class="col-6 col-12-medium">
						<label for="id_oprocentowanie" class="napis">Wynik </label>

						<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
							<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
								<ol style=" padding: 2px 10px 10px 50px; border-radius: 5px; background-color: #f88; width:375px;">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg', false, 'key');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
										<li> <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
 </li>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</ol>
							<?php }?>
						<?php }?>
						<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
							<b>
								<div style="padding: 10px ; border-radius: 5px; background-color: #ff0; width:400px;  ">
									<h4>Rata: <?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 zł</h4>
									<h4>Koszt kredytu: <?php echo $_smarty_tpl->tpl_vars['koszt']->value;?>
 zł</h4>
									<h4>Koszt całkowity: <?php echo $_smarty_tpl->tpl_vars['calkowityKoszt']->value;?>
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
/* {block 'zwykly'} */
class Block_32282194665fd9fd5dd9ff0_15866701 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zwykly' => 
  array (
    0 => 'Block_32282194665fd9fd5dd9ff0_15866701',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<article id="zwykly" class="panel">
			<header>
				<h2>Kalkulator zwykły</h2>
			</header>
			<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc_number.php#zwykly" method="post">
				<div class="row">
					<div class="col-6 col-12-medium">
						<label for="x">Pierwsza liczba</label>
						<input type="text" placeholder="wartość x" name="x" <?php if ((isset($_smarty_tpl->tpl_vars['form']->value['x']))) {?> value="<?php echo $_smarty_tpl->tpl_vars['form']->value['x'];?>
"
							<?php }?>>
					</div>
					<div class="col-6 col-12-medium">
						<label for="op">Operacja</label>
						<select id="op" name="op">
							<?php if ((isset($_smarty_tpl->tpl_vars['form']->value['op_name']))) {?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['form']->value['op'];?>
">ponownie: <?php echo $_smarty_tpl->tpl_vars['form']->value['op_name'];?>
</option>
								<option value="" disabled="true">---</option>
							<?php }?>
							<option value="plus">(+) dodaj</option>
							<option value="minus">(-) odejmij </option>
							<option value="times">(*) pomnóż</option>
							<option value="div">(/) podziel</option>
						</select>
					</div>
					<div class="col-6 col-12-medium">
						<label for="y">Druga liczba</label>
						<input id="y" type="text" placeholder="wartość y" name="y" <?php if ((isset($_smarty_tpl->tpl_vars['form']->value['y']))) {?>
							value="<?php echo $_smarty_tpl->tpl_vars['form']->value['y'];?>
" <?php }?>>
					</div>
					<div class="col-6 col-12-medium">
						<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
							<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?>
								<h4>Informacje: </h4>
								<ol class="inf">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg', false, 'key');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
										<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</ol>
							<?php }?>
						<?php }?>
						<?php if ((isset($_smarty_tpl->tpl_vars['result_z']->value))) {?>
							<h4>Wynik</h4>
							<p class="res">
								<?php echo $_smarty_tpl->tpl_vars['result_z']->value;?>

							</p>
						<?php }?>
					</div>
					<div class="col-6 col-12-medium">
						<input type="submit" value="Oblicz" />
					</div>
				</div>
			</form>
		</article>
	</div>
<?php
}
}
/* {/block 'zwykly'} */
}
