</div>
<div class="footer">
	<p>
		<?php out($page_footer); if (!isset($page_footer)) {  ?> ... <?php } ?>
	</p>
	<div>
	<?php if($next_page==0){?>
			<a href="<?php print(_APP_ROOT); ?>/app/calc_number.php" class="pure-button button-secondary">Kolejna chroniona strona</a>
	<?php }else {?>
			<a href="<?php print(_APP_ROOT); ?>/app/calc.php" class="pure-button button-secondary">Kolejna chroniona strona</a>
	<?php }?>
		<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button button-warning">Wyloguj</a>
    </div>
	<p>
		Widok oparty na stylach <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>
	</p>
</div>
</body>
</html>
