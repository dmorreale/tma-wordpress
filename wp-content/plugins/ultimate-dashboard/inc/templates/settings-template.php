<?php
/**
 * Settings Page Template
 *
 * @package Ultimate Dashboard
 */

// exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="wrap settingstuff">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<form method="post" action="options.php">
		<div class="neatbox has-subboxes has-bigger-heading">
			<?php
			settings_fields( 'udb-settings-group' );
			do_settings_sections( 'ultimate-dashboard' );
			submit_button();
			?>
		</div>
	</form>
</div>
