<h1>AGEify - Settings</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">

		<?php 
			settings_fields('agify_install_options_group');
			do_settings_sections('install_agify');
			submit_button();
		?>

</form>