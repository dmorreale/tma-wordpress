<?php
/**
 * Plugin Name: Ultimate Dashboard
 * Plugin URI: https://ultimatedashboard.io/
 * Description: Create a Custom WordPress Dashboard.
 * Version: 2.8.3
 * Author: David Vongries
 * Author URI: https://mapsteps.com/
 * Text Domain: ultimate-dashboard
 *
 * @package Ultimate Dashboard
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

// Plugin constants.
define( 'ULTIMATE_DASHBOARD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ULTIMATE_DASHBOARD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ULTIMATE_DASHBOARD_PLUGIN_VERSION', '2.8.3' );

/**
 * Admin scripts & styles.
 */
function udb_admin_scripts() {

	global $pagenow, $typenow;

	$current_screen = get_current_screen();

	// Create new & edit widget screen.
	if ( ( 'post.php' === $pagenow || 'post-new.php' === $pagenow ) && 'udb_widgets' === $typenow ) {

		if ( apply_filters( 'udb_font_awesome', true ) ) {
			// Font Awesome.
			wp_enqueue_style( 'font-awesome', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/font-awesome.min.css', array(), '4.7.0' );
		}

		// Select2 CSS.
		wp_enqueue_style( 'select2', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/select2.min.css', array(), '4.0.6-rc.1' );

		// Custom Post Type CSS.
		wp_enqueue_style( 'udb-edit-widget', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/edit-widget.css', array(), ULTIMATE_DASHBOARD_PLUGIN_VERSION );

		wp_enqueue_style( 'udb-edit-admin-page', ULTIMATE_DASHBOARD_PLUGIN_URL . 'modules/admin-page/assets/css/edit-admin-page.css', array(), ULTIMATE_DASHBOARD_PLUGIN_VERSION );

		do_action( 'udb_edit_styles' );

		// Select2 JS.
		wp_register_script( 'select2', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/js/select2.min.js', array( 'jquery' ), '4.0.6-rc.1', true );
		wp_enqueue_script( 'select2' );

		// CodeMirror.
		wp_enqueue_code_editor( array( 'type' => 'text/html' ) );

		// Custom Post Type JS.
		wp_register_script( 'udb-edit-widget', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/js/edit-widget.js', array( 'jquery' ), ULTIMATE_DASHBOARD_PLUGIN_VERSION, true );
		wp_enqueue_script( 'udb-edit-widget' );

		do_action( 'udb_edit_scripts' );

	}

	// Widget post list & settings page.
	if ( 'edit.php' === $pagenow && 'udb_widgets' === $typenow ) {

		if ( apply_filters( 'udb_font_awesome', true ) ) {
			// Font Awesome.
			wp_enqueue_style( 'font-awesome', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/font-awesome.min.css', array(), '4.7.0' );
		}

	}

	// Widget post list.
	if ( 'edit-udb_widgets' === $current_screen->id ) {

		wp_enqueue_style( 'ultimate-dashboard-post-list', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/post-list.css', array(), ULTIMATE_DASHBOARD_PLUGIN_VERSION );

	}

	// Settings page.
	if ( 'udb_widgets_page_settings' === $current_screen->id || 'udb_widgets_page_branding' === $current_screen->id || 'udb_widgets_page_tools' === $current_screen->id || 'udb_widgets_page_udb_admin_menu' === $current_screen->id ) {

		// Color pickers.
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

		// Settings page styles.
		wp_enqueue_style( 'settings-page', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/settings-page.css', array(), ULTIMATE_DASHBOARD_PLUGIN_VERSION );
		wp_enqueue_style( 'settings-fields', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/setting-fields.css', array(), ULTIMATE_DASHBOARD_PLUGIN_VERSION );
		wp_enqueue_style( 'udb-settings', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/settings.css', array(), ULTIMATE_DASHBOARD_PLUGIN_VERSION );

		// CodeMirror.
		wp_enqueue_code_editor( array( 'type' => 'text/html' ) );

		// Settings page JS.
		wp_register_script( 'udb-settings', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/js/settings.js', array( 'jquery' ), ULTIMATE_DASHBOARD_PLUGIN_VERSION, true );
		wp_enqueue_script( 'udb-settings' );

	}

	// WordPress dashboard.
	if ( 'index.php' === $pagenow ) {

		if ( apply_filters( 'udb_font_awesome', true ) ) {
			// Font Awesome.
			wp_enqueue_style( 'font-awesome', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/font-awesome.min.css', array(), '4.7.0' );
		}

		// Dashboard CSS.
		wp_register_style( 'udb-dashboard', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/css/dashboard.css', array(), ULTIMATE_DASHBOARD_PLUGIN_VERSION );
		wp_enqueue_style( 'udb-dashboard' );

		do_action( 'udb_dashboard_styles' );

		// Dashboard JS.
		wp_register_script( 'udb-dashboard', ULTIMATE_DASHBOARD_PLUGIN_URL . 'assets/js/dashboard.js', array( 'jquery' ), ULTIMATE_DASHBOARD_PLUGIN_VERSION, true );
		wp_enqueue_script( 'udb-dashboard' );

		do_action( 'udb_dashboard_scripts' );

	}

	// Highlight PRO link in sub-menu.
	echo '<style>#adminmenu #menu-posts-udb_widgets a[href="https://ultimatedashboard.io/pro/"] { color: #47D87C; }</style>';

}
add_action( 'admin_enqueue_scripts', 'udb_admin_scripts' );

/**
 * Action links.
 *
 * @param array $links The action links array.
 *
 * @return array The action links array.
 */
function udb_add_action_links( $links ) {

	$settings = array( '<a href="' . admin_url( 'edit.php?post_type=udb_widgets&page=settings' ) . '">' . __( 'Settings', 'ultimate-dashboard' ) . '</a>' );

	return array_merge( $links, $settings );

}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'udb_add_action_links' );

/**
 * Plugin deactivation.
 */
function udb_deactivate() {

	$udb_settings = get_option( 'udb_settings' );

	if ( isset( $udb_settings['remove-on-uninstall'] ) ) {

		delete_option( 'udb_settings' );
		delete_option( 'udb_branding' );
		delete_option( 'udb_login' );
		delete_option( 'udb_import' );

		delete_option( 'udb_compat_widget_type' );
		delete_option( 'udb_compat_delete_login_customizer_page' );
		delete_option( 'udb_compat_settings_meta' );

		delete_option( 'udb_login_customizer_flush_url' );

	}

}
register_deactivation_hook( plugin_basename( __FILE__ ), 'udb_deactivate' );

// Required files.
require_once ULTIMATE_DASHBOARD_PLUGIN_DIR . 'inc/init.php';
