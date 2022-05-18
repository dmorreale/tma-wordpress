<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<meta http-equiv="Content-Security-Policy"
      content="default-src * 'self' data: gap: 'unsafe-inline' 'unsafe-eval';
      style-src * 'self' 'unsafe-inline' 'unsafe-eval' gap:;
      script-src * 'self' 'unsafe-inline' 'unsafe-eval' gap:; frame-src *;">
<?php wp_head(); ?>
<?php astra_head_bottom();
	
	$pageId = get_the_id();
	$userId = get_current_user_id();
	$meta = get_user_meta($userId, 'history_resources', true);
	//var_dump($meta);
	if($pageId == 700 && $meta == 'true'){
?>
	<script>
		jQuery(document).ready(function(){
			console.log('hooked');
			var resource1 = '<a target="_BLANK" class="custom_resource_link" href="https://themacallanacademy.com/wp-content/uploads/2020/06/The_Macallan_Book_2020_05_23.pdf"><span>The Macallan. The Future Started There.</span></a>',
				resource2 = '<a target="_BLANK" class="custom_resource_link" href="https://themacallanacademy.com/wp-content/uploads/2020/06/DNA7StrandsSummary.mov"><span>The Macallan DNA</span></a>',
				resource3 = '<a target="_BLANK" class="custom_resource_link" href="https://themacallanacademy.com/wp-content/uploads/2020/06/AlexanderReid.mp4"><span>Alexander Reid</span></a>';
			jQuery('.custom_resource').append(resource1);
			jQuery('.custom_resource').append(resource2);
			jQuery('.custom_resource').append(resource3);
		})
	</script>
<?php
	}
	
	$referer = $_SERVER['HTTP_REFERER'];
	
	if($referer && strpos($referer, 'wp-login.php') !== false){
		$redirect_to = explode('=', $referer);
		$redirect_to = urldecode($redirect_to[1]);

		//header('Location:'.$redirect_to);	
?>	
		
		
<script type="text/javascript">
	jQuery('document').ready(function(){
		console.log('<?php echo $redirect_to; ?>');
		window.location.href = '<?php echo $redirect_to; ?>';
	})
</script>

		
		
<?php	
	}
?>
</head>
<style>
	.footerHelp{
		color:#fff !important;
	}	
	.footerHelp:hover{
		color:#b29b70 !important;
	}
</style>
	
<?php
	if($pageId == 313 || $pageId == 72593 || $pageId == 81878){
	
?>
	<style>
		#lesson_heading, .ld-course-list-content{
			display:none;
		}
	</style>
	
<?php
	
	}
?>

<?php
	if($pageId == 120970){
?>
	<style>
		#custom_secondary_header{
			display:none !important;
		}
		.elementor-element-9e206f2 .elementor-element-populated{
			padding:0 !important;
		}
		#content.site-content{
			position:relative;
			top:3px;
		}
		.ast-button, .ast-custom-button, body, button, input[type=button], input[type=submit], textarea{
			line-height:normal !important;
		}
		/* 
		html::-webkit-scrollbar {
		  display: none;
		}

		/* 
		html {
		  -ms-overflow-style: none; 
		  scrollbar-width: none;  
		}*/
	</style>	
<?php		
	}
?>
	
<body <?php astra_schema_body(); ?> <?php body_class(); ?>>

<?php astra_body_top(); ?>
<?php wp_body_open(); ?>
<div 
	<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?></a>

	<?php astra_header_before(); ?>

	<?php astra_header(); ?>

	<?php astra_header_after(); ?>

	<?php astra_content_before(); ?>

	<div id="content" class="site-content">

		<?php if(get_the_id() != 99123){ ?>
		<div class="ast-container">
		<?php } ?> 


		<?php astra_content_top(); ?>
