<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
			<?php astra_content_bottom(); ?>

			<?php if(get_the_id() != 99123){ ?>
			</div> <!-- ast-container -->
			<?php } ?>


		</div><!-- #content -->

		<?php astra_content_after(); ?>

		<?php astra_footer_before(); ?>

		<?php astra_footer(); ?>

		<?php astra_footer_after(); ?>

	</div><!-- #page -->

	<?php astra_body_bottom(); ?>

	<?php wp_footer(); 

	$userId = get_current_user_id();
	$globalId = 2276; //ID for the Global-Europe Group
	$usNE = get_user_meta($userId, 'learndash_group_users_2273', true);
	$usSouth = get_user_meta($userId, 'learndash_group_users_2272', true);
	$usCentral = get_user_meta($userId, 'learndash_group_users_2271', true);
	$usWest = get_user_meta($userId, 'learndash_group_users_2270', true);
	$userState = get_user_meta($userId, 'user_state', true);
	$termsAgreed = get_user_meta($userId, 'terms_agreement', true);
	$isAmbassador = get_user_meta($userId, 'learndash_group_users_114757', true);
	$haveGroup = false;

	$isDistributor = false;
	

	if($usNE || $usSouth || $usCentral || $usWest){
		$isDistributor = true;
	}



	$haveGroup = false;
	$groups = new WP_Query(array(

		'posts_per_page' => -1,

		'post_type' => 'groups',

		'post_status' => 'publish'

	));
//	$groups = $query->posts;
//	foreach($groups as $group){
//		$postId = $group->ID;
//		echo 'learndash_group_users_'.$postId;
//		$meta = get_user_meta($userId, 'learndash_group_users_'.$postId, true);
//		
//		var_dump($meta);
//	}
//
//	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//
//	if(strpos($url, '/es/')){
//		ld_update_group_access()
//	}

	//var_dump($groups);

	while($groups->have_posts()){
		$groups->the_post();
		$postId = get_the_ID();
		//var_dump($postId);
		//var_dump(get_the_title());
		$meta = get_user_meta($userId, 'learndash_group_users_'.$postId, true);
		if($meta){
			$haveGroup = true;
			break;
		}
	}

	wp_reset_query();

	//var_dump($haveGroup);
if(!$isAmbassador){
		?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#edLibraryLink').parent().parent().parent().parent().parent().hide();
			jQuery('#edLibraryLink').parent().parent().parent().parent().parent().siblings('div').css('width', '25%');
			jQuery('#edLibraryLink').parent().parent().parent().parent().parent().remove();
		})
	</script>	
		
<?php
	}
	if(!$haveGroup){

	?>
	<script type="text/javascript">
		//console.log('uhhh');
		jQuery(document).ready(function(){
			jQuery('.loadModal').show();
			jQuery.ajax({type: 'POST', url: '/wp-content/plugins/macallan-custom/ajax/group_check.php', data: {check: 'go', url: window.location.href}}).done(function(data){
				//console.log('ohai');
				console.log(data);
				jQuery('.loadModal').hide();
				window.location.reload();
			})
		})
	</script>
	<?php }
	
	if($isDistributor && !$userState){
			?>

			<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery('.dataModal').fadeIn();
					jQuery('body').addClass('dataModalOn');
					jQuery('html').addClass('dataModalOn');
				})
			</script>		

	<?php
		}

		if(!$termsAgreed){
	?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				console.log('modal should show');
				
				jQuery('#termsSubmit').click(function(e){
					e.preventDefault();
					jQuery.ajax({
						type: 'POST', 
						url: '/wp-content/plugins/macallan-custom/ajax/terms_agreement.php', 
						data: {
							check: 'go', 
							url: window.location.href
						}
					}).done(function(data){
						console.log(data);
						jQuery('.termsModal').hide();
					})
				})
			})
		</script>	
		

	<?php
		}
	?>
	<div class="loadModal">
		<div class="loadModalInner">
			<div class="modalContent">
				<div class="modalImg">
					<img src="/wp-content/uploads/themacallanacademy_logo2.svg"/>
				</div>
				
				<p class="loading">Welcome to The Macallan Academy. On first entering the site, it will take approximately 10 minutes for your account to activate. Please check back in a few minutes. Thank you!</p>
			</div>
		</div>
	</div>
	<div class="termsModal">
		<div class="termsModalInner">
			<div class="termsModalContent">
				<div class="modalImg">
					<img src="/wp-content/uploads/themacallanacademy_logo2.svg"/>
				</div>
				<div class="termsText">
					<p>We have updated our Privacy Policy and Terms. Please review and accept these terms to continue your learning on The Macallan Academy.</p>
					<div class="termLinks">
						<a href="/terms-of-use" target="_blank">Terms &amp; Conditions</a>
						<a href="/privacy-policy" target="_blank">Privacy Policy</a>
					</div>
					<p>By clicking the button below you acknowledge that you have read, and agree to, the terms outlined.</p>
					<button id="termsSubmit">I agree</button>
				</div>
			</div>
		</div>
	</div>
	<div class="dataModal">
		<div class="dataModalInner">
			<div class="dataModalContent">
				<div class="modalImg">
					<img src="/wp-content/uploads/themacallanacademy_logo2.svg"/>
				</div>
				<div class="dataText"><p>We noticed some information from your profile is missing. Please enter the information below to proceed. If you do not have an associated distributor please select 'None' from the dropdown.</p></div>
				<form>
					<label for="firstName">First Name</label><br/>
					<input type="text" name="firstName" id="firstName" placeholder="First Name"/>
					<label for="lastName">Last Name</label><br/>
					<input type="text" name="lastName" id="lastName" placeholder="Last Name"/>
					<label for="state">State</label><br/>
					<select id="state" name="state">
						<option value="none" selected>Select</option>
						<?php
							$states = getStates($wpdb);
							foreach($states as $state){
								echo "<option value='".$state["state_abbrev"]."' style='text-transform:capitalize;'>".$state["state_name"]."</option>";
							}
						?>
					</select><br/>
					<label for="distributor">Distributor</label><br/>
					<select id="distributor" name="distributor">
						<option value="select" selected>Select</option>
						<option value="none">None</option>
						<?php
							$distributors = getDistributors($wpdb);
							foreach($distributors as $distributor){
								echo "<option value='".$distributor["name"]."'>".$distributor["name"]."</option>";
							}
						?>
					</select>
				</form>
				<button id="dataPatchSubmit">Submit</button>
			</div>
		</div>
	</div>
	<style>
		.dataModal,
		.termsModal{
			display:none;
			height:100%;
			width:100%;
			background:rgba(255,255,255,0.8);
			position:absolute;
			top:0;
			z-index:1000;
		}
		.dataModalInner,
		.termsModalInner{
			width:50%;
			margin:0 auto;
			height:100%;
			background:#fff;
			box-sizing:border-box;
			padding:50px;
			border-left: 2px solid #000;
			border-right:2px solid #000;
			
		}
		.termsModalInner{
			padding:50px 150px;
		}
		.dataModalContent,
		.termsModalContent{
			text-align:center;
		}
		.termsModalContent{
			margin-top:25%;
			
		}
		.termLinks{
			margin-bottom:20px;
		}
		.termLinks a:first-child{
			margin-right:50px;
		}
		.dataModalContent .modalImg,
		.termsModalContent .modalImg{
			height:200px;
			width:200px;
			opacity:1;
			margin:0 auto;
		}
		.dataModalContent .dataText,
		.termsModalContent .termsText{
			text-align:center;
		}
		.dataModalContent form{
			width:50%;
			margin:0 auto;
			margin-bottom:30px;
			text-align:left;
		}
		.dataModalContent button,
		.termsModalContent button{
			text-align:center;
		}
		.dataModalContent form select,
		.dataModalContent form input{
			width:100%;
		}
		.dataModalContent select#state{
			text-transform:capitalize;
		}
		@media only screen and (max-width: 1024px){
			.dataModalContent form{
				width:80%;
			}
		}
		@media only screen and (max-width: 768px){
			.dataModalInner,
			.termsModalInner{
				width:80%;
			}
			.dataModalContent form{
				width:80%;
			}
		}
	</style>
	<style>
		.loadModal{
			display:none;
			position:fixed;
			top:0;
			bottom:0;
			height:100%;
			width:100%;
			background:rgba(255,255,255,0.8);
		}
		.loadModalInner{
			width:25%;
			margin:0 auto;
			margin-top:10%;
			padding:50px;
			border:4px solid #000;
			opacity:1;
			background:#fff;
		}
		.modalContent .modalImg{
			height:250px;
			width:250px;
			opacity:1;
			margin:0 auto;
		}
		.modalImg img{
			height:100%;
			width:100%;
		}
		.modalContent p{
			text-align:center;
		}
	</style>


	
	

	</body>
</html>
