<div class="body">
	<?php 
		if(isset($_SESSION['login']))
		{
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}
	?>
	<h2><?php echo $lang['welcome'] ?></h2>
	<br>
	<p>
		<?php echo $lang['welcome_message'] ?>
	</p>
	<br>
		<p>
			<?php echo $lang['contact'] ?> <a href="mailto:v.talanchyan@google.com?Subject=multi-lingual%20website" target="_top">v.talanchyan@google.com</a>
		</p>
</div>