<?php


function mo_lla_show_settings()
{
    if (isset($_GET["\x74\141\x62"])) {
        goto AN;
    }
    $cV = "\x64\145\146\141\165\x6c\x74";
    goto qr;
    AN:
    $cV = $_GET["\164\x61\x62"];
    qr:
    ?>
	<h2>miniOrange Limit Login Attempts</h2>
	<?php 
    if (Mo_LLA_Util::is_curl_installed()) {
        goto uD;
    }
    ?>

			<div id="help_curl_warning_title" class="mo_wpns_title_panel">
				<p><a target="_blank" style="cursor: pointer;"><font color="#FF0000">Warning: PHP cURL extension is not installed or disabled. <span style="color:blue">Click here</span> for instructions to enable it.</font></a></p>
			</div>
			<div hidden="" id="help_curl_warning_desc" class="mo_wpns_help_desc">
					<ul>
						<li>Step 1:&nbsp;&nbsp;&nbsp;&nbsp;Open php.ini file located under php installation folder.</li>
						<li>Step 2:&nbsp;&nbsp;&nbsp;&nbsp;Search for <b>extension=php_curl.dll</b> </li>
						<li>Step 3:&nbsp;&nbsp;&nbsp;&nbsp;Uncomment it by removing the semi-colon(<b>;</b>) in front of it.</li>
						<li>Step 4:&nbsp;&nbsp;&nbsp;&nbsp;Restart the Apache Server.</li>
					</ul>
					For any further queries, please <a href="mailto:info@miniorange.com">contact us</a>.
			</div>

			<?php 
    uD:
    ?>
	<div class="mo2f_container">

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php 
    echo $cV == "\x72\x65\x70\157\162\164\x73" ? "\x6e\x61\x76\55\x74\141\142\x2d\141\143\x74\151\166\x65" : '';
    ?>
" href="<?php 
    echo add_query_arg(array("\164\x61\142" => "\x72\x65\160\157\x72\164\163"), $_SERVER["\x52\x45\x51\x55\105\x53\124\137\125\122\x49"]);
    ?>
">Reports</a>
		</h2>

		<table style="width:100%;">
			<tr>
				<td style="width:75%;vertical-align:top;" id="configurationForm">
					<?php 
    mo_lla_reports();
    ?>
				</td>

			</tr>
		</table>
	</div>
	<?php 
}
function get_Random_Password()
{
    $WQ = "\141\142\143\144\145\x66\147\150\151\152\x6b\154\155\156\x6f\x70\x71\x72\163\164\x75\166\x77\170\x79\x7a\x41\102\x43\x44\x45\x46\x47\110\111\112\113\114\115\x4e\117\120\x51\122\123\x54\x55\x56\x57\130\131\x5a\x31\x32\63\64\65\x36\x37\70\71\60";
    $gL = array();
    $hk = strlen($WQ) - 1;
    $so = 0;
    jd:
    if (!($so < 7)) {
        goto SM;
    }
    $Gd = rand(0, $hk);
    $gL[] = $WQ[$Gd];
    db:
    $so++;
    goto jd;
    SM:
    return implode($gL);
}
function mo_lla_registration_page()
{
    $r5 = get_Random_Password();
    ?>

<!--Register with miniOrange-->
<form name="f" method="post" action="">
	<input type="hidden" name="option" value="mo_wpns_register_customer" />
	<div class="mo_wpns_table_layout" style="min-height: 274px;">
		<h3>miniOrange Limit Login Attempts</h3>
		<br>
		<div id="panel1">
			<table class="mo_wpns_settings_table">
				<tr>
					<td><b><font color="#FF0000">*</font>Email:</b></td>
					<td>
					<?php 
    $current_user = wp_get_current_user();
    if (get_option("\x6d\x6f\x5f\167\x70\x6e\x73\137\141\144\155\151\156\x5f\x65\x6d\x61\x69\x6c")) {
        goto zH;
    }
    $m2 = $current_user->user_email;
    goto vf;
    zH:
    $m2 = esc_html(get_option("\x6d\x6f\x5f\167\x70\156\163\x5f\x61\x64\x6d\x69\156\x5f\145\155\141\151\154"));
    vf:
    ?>
					<input class="mo_wpns_table_textbox" type="email" name="email"
						required placeholder="person@example.com"
						value="<?php 
    echo $m2;
    ?>
" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><br><input type="submit" value="Continue"
						class="button button-primary button-large" /></td>
				</tr>
			</table>
			<input class="mo_wpns_table_textbox" type="hidden" name="phone" value="" />
			<input class="mo_wpns_table_textbox" type="hidden" name="password" value="<?php 
    echo $r5;
    ?>
"  />
			<input class="mo_wpns_table_textbox" type="hidden" name="confirmPassword" value="<?php 
    echo $r5;
    ?>
" />
		</div>
	</div>
</form>
<!--<script>
	jQuery("#phone").intlTelInput();
</script> -->
<?php 
}
function mo_lla_login_page()
{
    ?>
		<!--Verify password with miniOrange-->
		<form name="f" method="post" action="">
			<input type="hidden" name="option" value="mo_wpns_verify_customer" />
			<div class="mo_wpns_table_layout">
				<h3>Login with miniOrange</h3>
				<div id="panel1">
					<table class="mo_wpns_settings_table">
						<tr>
							<td><b><font color="#FF0000">*</font>Email:</b></td>
							<td><input class="mo_wpns_table_textbox" type="email" name="email"
								required placeholder="person@example.com"
								value="<?php 
    echo esc_html(get_option("\x6d\157\137\167\160\x6e\163\x5f\141\x64\155\151\156\137\145\155\141\151\x6c"));
    ?>
" /></td>
						</tr>
						<tr>
							<td><b><font color="#FF0000">*</font>Password:</b></td>
							<td><input class="mo_wpns_table_textbox" required type="password"
								name="password" placeholder="Enter your miniOrange password" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" class="button button-primary button-large" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
								href="#cancel_link">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="#mo_wpns_forgot_password_link">Forgot
									your password?</a></td>
						</tr>
					</table>
				</div>
			</div>
		</form>
		<form id="forgot_password_form" method="post" action="">
			<input type="hidden" name="option" value="mo_wpns_user_forgot_password" />
		</form>
		<form id="cancel_form" method="post" action="">
			<input type="hidden" name="option" value="mo_wpns_cancel" />
		</form>
		<script>

			jQuery('a[href="#cancel_link"]').click(function(){
				jQuery('#cancel_form').submit();
			});

			jQuery('a[href="#mo_wpns_forgot_password_link"]').click(function(){
				jQuery('#forgot_password_form').submit();
			});
		</script>
	<?php 
}
function mo_lla_account_page()
{
    ?>

			<div style="background-color:#FFFFFF; border:1px solid #CCCCCC; padding:0px 0px 0px 10px; width:98%;height:344px">
				<div>
					<h4>Thank You for registering with miniOrange.</h4>
					<h3>Your Profile</h3>
					<table border="1" style="background-color:#FFFFFF; border:1px solid #CCCCCC; border-collapse: collapse; padding:0px 0px 0px 10px; margin:2px; width:85%">
						<tr>
							<td style="width:45%; padding: 10px;">Username/Email</td>
							<td style="width:55%; padding: 10px;"><?php 
    echo esc_html(get_option("\x6d\157\x5f\x77\x70\156\x73\x5f\x61\144\x6d\x69\x6e\137\145\x6d\x61\151\154"));
    ?>
</td>
						</tr>
						<tr>
							<td style="width:45%; padding: 10px;">Customer ID</td>
							<td style="width:55%; padding: 10px;"><?php 
    echo esc_html(get_option("\155\x6f\x5f\167\160\x6e\x73\x5f\141\144\x6d\151\x6e\137\x63\165\163\x74\x6f\x6d\x65\162\137\x6b\145\171"));
    ?>
</td>
						</tr>
						<tr>
							<td style="width:45%; padding: 10px;">API Key</td>
							<td style="width:55%; padding: 10px;"><?php 
    echo esc_html(get_option("\x6d\x6f\x5f\x77\160\x6e\x73\137\141\144\155\x69\x6e\137\x61\x70\x69\137\153\x65\x79"));
    ?>
</td>
						</tr>
						<tr>
							<td style="width:45%; padding: 10px;">Token Key</td>
							<td style="width:55%; padding: 10px;"><?php 
    echo esc_html(get_option("\x6d\157\137\167\160\x6e\x73\137\x63\x75\x73\164\x6f\155\145\162\137\x74\157\153\x65\156"));
    ?>
</td>
						</tr>
					</table>
					<br/>
					<p><a href="#mo_wpns_forgot_password_link">Click here</a> if you forgot your password to your miniOrange account.</p>
				</div>
			</div>

			<form id="forgot_password_form" method="post" action="">
				<input type="hidden" name="option" value="mo_wpns_reset_password" />
			</form>

			<script>
				jQuery('a[href="#mo_wpns_forgot_password_link"]').click(function(){
					jQuery('#forgot_password_form').submit();
				});
			</script>

			<?php 
    if (!(isset($_POST["\157\x70\x74\151\157\156"]) && ($_POST["\157\160\164\151\x6f\156"] == "\155\x6f\137\x77\x70\x6e\163\137\166\145\x72\151\x66\171\x5f\143\165\163\x74\157\155\145\162" || $_POST["\x6f\160\x74\x69\x6f\156"] == "\x6d\157\x5f\x77\160\x6e\163\x5f\x72\x65\x67\x69\163\x74\145\x72\137\x63\165\163\x74\x6f\155\x65\162"))) {
        goto aa;
    }
    ?>
				<script>
					//window.location.href = "<?php 
    echo add_query_arg(array("\164\x61\x62" => "\144\145\x66\141\165\x6c\164"), $_SERVER["\x52\x45\121\125\x45\123\124\137\125\122\x49"]);
    ?>
";
				</script>
			<?php 
    aa:
}
function mo_lla_blockedips()
{
    $mj = new Mo_LLA_Handler();
    $qT = $mj->get_blocked_ips();
    ?>
	<div class="mo_wpns_small_layout">

		<h2>Manual Block IP's</h2>
		<form name="f" method="post" action="" id="manualblockipform" >
			<input type="hidden" name="option" value="mo_wpns_manual_block_ip" />
			<table><tr><td>You can manually block an IP address here: </td>
			<td style="padding:0px 10px"><input class="mo_wpns_table_textbox" type="text" name="ip"
				required placeholder="IP address" value=""  pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}" /></td>
			<td><input type="submit" class="button button-primary button-large" value="Manual Block IP" /></td></tr></table>
		</form>
		<h2>Blocked IP's</h2>
		<table id="blockedips_table" class="display">
		<thead><tr><th width="15%">IP Address</th><th width="25%">Reason</th><th width="24%">Blocked Until</th><th width="24%">Blocked Date</th><th width="20%">Action</th></tr></thead>
		<tbody>
		<?php 
    foreach ($qT as $Zw) {
        echo "\x3c\164\162\76\x3c\x74\144\76" . $Zw->ip_address . "\74\x2f\x74\144\x3e\x3c\x74\144\x3e" . $Zw->reason . "\x3c\x2f\x74\144\76\x3c\x74\x64\76";
        if (empty($Zw->blocked_for_time)) {
            goto W9;
        }
        echo date("\x4d\x20\152\x2c\x20\x59\x2c\40\x67\72\x69\x3a\163\x20\x61", $Zw->blocked_for_time);
        goto Qn;
        W9:
        echo "\74\x73\x70\141\156\40\x63\154\x61\163\x73\75\162\145\144\x74\145\170\164\x3e\120\x65\x72\x6d\141\x6e\145\x6e\164\x6c\x79\x3c\57\163\x70\141\156\x3e";
        Qn:
        echo "\x3c\x2f\x74\x64\x3e\74\164\x64\76" . date("\115\40\x6a\x2c\40\x59\x2c\40\x67\x3a\x69\72\x73\40\141", $Zw->created_timestamp) . "\74\x2f\164\144\x3e\74\x74\144\x3e\x3c\141\x20\157\156\143\x6c\x69\143\x6b\x3d\165\x6e\x62\x6c\157\x63\153\151\x70\x28\47" . $Zw->id . "\x27\x29\76\125\156\x62\154\x6f\143\153\40\111\x50\74\x2f\x61\76\74\57\164\144\x3e\74\57\164\x72\76";
        ae:
    }
    m_:
    ?>
		</tbody>
		</table>
	</div>
	<form class="hidden" id="unblockipform" method="POST">
		<input type="hidden" name="option" value="mo_wpns_unblock_ip" />
		<input type="hidden" name="entryid" value="" id="unblockipvalue" />
	</form>

	<?php 
    $My = $mj->get_whitelisted_ips();
    ?>
	<div class="mo_wpns_small_layout">
		<h2>Whitelist IP's</h2>
		<form name="f" method="post" action="" id="whitelistipform">
			<input type="hidden" name="option" value="mo_wpns_whitelist_ip" />
			<table><tr><td>Add new IP address to whitelist : </td>
			<td style="padding:0px 10px"><input class="mo_wpns_table_textbox" type="text" name="ip"
				required placeholder="IP address" value=""  pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}" /></td>
			<td><input type="submit" class="button button-primary button-large" value="Whitelist IP" /></td></tr></table>
		</form>
		<h2>Whitelisted IP's</h2>
		<table id="whitelistedips_table" class="display">
		<thead><tr><th width="30%">IP Address</th><th width="40%">Whitelisted Date</th><th width="30%">Remove from Whitelist</th></tr></thead>
		<tbody><?php 
    foreach ($My as $w1) {
        echo "\74\x74\x72\76\x3c\x74\144\76" . $w1->ip_address . "\x3c\57\164\144\x3e\x3c\164\144\x3e" . date("\x4d\40\x6a\x2c\x20\131\54\40\147\x3a\x69\72\163\x20\141", $w1->created_timestamp) . "\x3c\57\164\x64\76\x3c\164\x64\76\x3c\x61\x20\157\x6e\143\154\x69\x63\153\75\x72\x65\x6d\x6f\x76\x65\146\x72\x6f\155\x77\x68\x69\164\145\x6c\151\163\x74\x28\47" . $w1->id . "\47\51\x3e\x52\145\155\x6f\166\x65\74\x2f\141\x3e\74\x2f\x74\144\76\74\x2f\164\162\76";
        cO:
    }
    vz:
    ?>
</tbody>
		</table>
	</div>
	<form class="hidden" id="removefromwhitelistform" method="POST">
		<input type="hidden" name="option" value="mo_wpns_remove_whitelist" />
		<input type="hidden" name="entryid" value="" id="removefromwhitelistentry" />
	</form>

	<script>
		<?php 
    if (Mo_LLA_Util::is_customer_registered()) {
        goto lW;
    }
    ?>
			jQuery( document ).ready(function() {
				jQuery("#manualblockipform :input").prop("disabled", true);
				jQuery("#manualblockipform :input[type=text]").val("");
				jQuery("#whitelistipform :input").prop("disabled", true);
				jQuery("#whitelistipform :input[type=text]").val("");
			});
		<?php 
    lW:
    ?>
		function unblockip(entryid){
			jQuery("#unblockipvalue").val(entryid);
			jQuery("#unblockipform").submit();
		}
	</script>
	<script>
		jQuery(document).ready(function() {
			jQuery('#blockedips_table').DataTable({
				"order": [[ 3, "desc" ]]
			});
		} );
	</script>
	<script>
		function removefromwhitelist(entryid){
			jQuery("#removefromwhitelistentry").val(entryid);
			jQuery("#removefromwhitelistform").submit();
		}
	</script>
	<script>
		jQuery(document).ready(function() {
			jQuery('#whitelistedips_table').DataTable({
				"order": [[ 1, "desc" ]]
			});
		} );
	</script>
	<?php 
}
function mo_lla_licencing()
{
    ?>
	<div class="mo_wpns_table_layout">
		<table class="mo_wpns_local_pricing_table">
		<h2>Licensing Plans
		<span style="float:right"><input type="button" name="ok_btn" id="ok_btn" class="button button-primary button-large" value="OK, Got It" onclick="window.location.href='admin.php?page=mo_limit_login&tab=default'" /></span>
		</h2><hr>
		<tr style="vertical-align:top;">

				<td>
				<div class="mo_wpns_local_thumbnail mo_wpns_local_pricing_paid_tab" >

				<h3 class="mo_wpns_local_pricing_header">Do it yourself</h3>
				<p></p>


				<hr>
				<p class="mo_wpns_pricing_text" >$9 / year<br>+ <br>
				<span style="font-size:12px">( Additional Discounts available for <br>multiple instances and years)</span><br></p>
				<p></p>
				<h4 class="mo_wpns_local_pricing_sub_header" style="padding-bottom:8px !important;"><a class="button button-primary button-large" onclick="upgradeform('wp_security_pro_basic_plan')" >Click here to upgrade</a> *</h4>
				<hr>
				<p class="mo_wpns_pricing_text" >
					Brute Force Protection ( Login Security and Monitoring - Limit Login Attempts and track user logins. )<br><br>
					User Registration Security - Disallow Disposable / Fake email addresses<br><br>
					IP Blocking:(manual and automatic) [Blaclisting and whitelisting included]<br><br>
					Advanced Blocking - Block users based on: IP range, Country Blocking<br><br>
					Mobile authentication based on QR code, OTP over SMS and email, Push, Soft token (15+ methods to choose from)<br>For Unlimited Users<br><br>
					Notification to admin and end users - Send Email Alerts for IP blocking and unusual activities with user account<br><br>
					Advanced activity logs	auditing and reporting<br><br>
					DOS protection - Process Delays - Delays responses in case of an attack	<br><br>
					Password protection - Enforce Strong Password : Check Password strength for all users<br><br>
					Risk based access - Contextual authentication based on device, location, time of access and user behavior<br><br>
					Icon based Authentication<br><br>
					Honeypot - Divert hackers and bots away from your assets<br><br>
					Advanced User Verification<br><br>
					Social Login Integration<br><br>
					Customized Email Templates<br><br>
					Advanced Reporting<br><br><br>
					<hr>
				</p>


				<p class="mo_wpns_pricing_text" >Basic Support by Email</p>
				</div></td>
				<td>
				<div class="mo_wpns_local_thumbnail mo_wpns_local_pricing_free_tab" >
				<h3 class="mo_wpns_local_pricing_header">Premium</h3>
				<p></p>


				<hr>
				<p class="mo_wpns_pricing_text">$9 / year + One Time Setup Fees <br>
				( $60 per hour )<br>
				<span style="font-size:12px">( Additional Discounts available for <br>multiple instances and years)</span><br></p>
				<h4 class="mo_wpns_local_pricing_sub_header" style="padding-bottom:8px !important;"><a class="button button-primary button-large" onclick="upgradeform('wp_security_pro_premium_plan')" >Click here to upgrade</a> *</h4>
				<hr>

				<p class="mo_wpns_pricing_text">
					Brute Force Protection ( Login Security and Monitoring - Limit Login Attempts and track user logins. )<br><br>
					User Registration Security - Disallow Disposable / Fake email addresses<br><br>
					IP Blocking:(manual and automatic) [Blaclisting and whitelisting included]<br><br>
					Advanced Blocking - Block users based on: IP range, Country Blocking<br><br>
					Mobile authentication based on QR code, OTP over SMS and email, Push, Soft token (15+ methods to choose from)<br>For Unlimited Users<br><br>
					Notification to admin and end users - Send Email Alerts for IP blocking and unusual activities with user account<br><br>
					Advanced activity logs	auditing and reporting<br><br>
					DOS protection - Process Delays - Delays responses in case of an attack	<br><br>
					Password protection - Enforce Strong Password : Check Password strength for all users<br><br>
					Risk based access - Contextual authentication based on device, location, time of access and user behavior<br><br>
					Icon based Authentication<br><br>
					Honeypot - Divert hackers and bots away from your assets<br><br>
					Advanced User Verification<br><br>
					Social Login Integration<br><br>
					Customized Email Templates<br><br>
					Advanced Reporting<br><br>
					End to End Integration Support<br>
					<hr>
				</p>



				<p class="mo_wpns_pricing_text">Premium Support Plans Available</p>

				</div></td>

		</tr>
		</table>
		<form style="display:none;" id="loginform" action="<?php 
    echo esc_html(get_option("\x6d\x6f\137\x77\x70\156\x73\137\150\x6f\163\x74\137\156\141\x6d\145")) . "\x2f\155\157\141\163\x2f\x6c\157\147\x69\x6e";
    ?>
"
		target="_blank" method="post">
		<input type="email" name="username" value="<?php 
    echo esc_html(get_option("\x6d\x6f\x5f\167\160\x6e\163\x5f\141\x64\155\151\x6e\137\145\x6d\141\x69\154"));
    ?>
" />
		<input type="text" name="redirectUrl" value="<?php 
    echo esc_html(get_option("\x6d\157\x5f\x77\x70\x6e\163\x5f\x68\157\163\x74\137\156\141\155\145")) . "\x2f\x6d\157\141\163\x2f\x69\156\x69\x74\x69\141\154\x69\172\x65\160\141\171\x6d\145\x6e\x74";
    ?>
" />
		<input type="text" name="requestOrigin" id="requestOrigin"  />
		</form>
		<script>
			function upgradeform(planType){
				jQuery('#requestOrigin').val(planType);
				jQuery('#loginform').submit();
			}
		</script>
		<br>
		<h3>* Steps to upgrade to premium plugin -</h3>
		<p>1. You will be redirected to miniOrange Login Console. Enter your password with which you created an account with us. After that you will be redirected to payment page.</p>
		<p>2. Enter you card details and complete the payment. On successful payment completion, you will see the link to download the premium plugin.</p>
		<p>3. Once you download the premium plugin, just unzip it and replace the folder with existing plugin. </p>
		<b>Note: Do not delete the plugin from the Wordpress Admin Panel and upload the plugin using zip. Your saved settings will get lost.</b>
		<p>4. From this point on, do not update the plugin from the Wordpress store. We will notify you when we upload a new version of the plugin.</p>

		<h3>** End to End Integration - We will setup a conference and do end to end configuration for you. We provide services to do the configuration on your behalf. </h3>

		<h3>10 Days Return Policy -</h3>
		<p>At miniOrange, we want to ensure you are 100% happy with your purchase. If you feel that the premium plugin you purchased is not the best fit for your requirements or you’ve attempted to resolve any feature issues with our support team, which couldn't get resolved. We will refund the whole amount within 10 days of the purchase. Please email us at <a href="mailto:info@miniorange.com">info@miniorange.com</a> for any queries regarding the return policy.<br><br>
If you have any doubts regarding the licensing plans, you can mail us at <a href="mailto:info@miniorange.com">info@miniorange.com</a> or submit a query using the support form.</p>
		<br>


<br><br>

		</div>
		</div>
		<form style="display:none;" id="loginform" action="<?php 
    echo esc_html(get_option("\155\157\137\x77\160\x6e\163\137\x68\157\x73\164\x5f\x6e\x61\155\145")) . "\x2f\x6d\x6f\x61\x73\x2f\154\x6f\147\x69\x6e";
    ?>
"
		target="_blank" method="post">
		<input type="email" name="username" value="<?php 
    echo esc_html(get_option("\x6d\157\137\167\160\x6e\163\137\141\144\155\151\x6e\x5f\145\155\x61\151\154"));
    ?>
" />
		<input type="text" name="redirectUrl" value="<?php 
    echo esc_html(get_option("\155\157\137\167\160\x6e\163\x5f\150\x6f\163\164\x5f\x6e\x61\155\145")) . "\x2f\x6d\157\141\163\x2f\151\156\x69\164\151\141\154\x69\x7a\145\160\x61\171\x6d\x65\x6e\x74";
    ?>
" />
		<input type="text" name="requestOrigin" id="requestOrigin"  />
		</form>
		<script>
			function upgradeform(planType){
				jQuery('#requestOrigin').val(planType);
				jQuery('#loginform').submit();
			}
		</script>
		<script>
			jQuery(document).ready(function() {
				//jQuery('.mo_wpns_support_layout').hide();
				//jQuery('#configurationForm').css("width","100%");
			});
		</script>
<?php 
}
function mo_lla_reports()
{
    $mj = new Mo_LLA_Handler();
    $WR = "\156\157\156\145";
    $Eu = "\x53\150\157\167\x20\x41\x64\x76\141\156\143\145\144\40\x53\x65\x61\x72\143\150";
    if (!get_option("\x6d\x6f\137\167\x70\156\x73\137\x61\x64\166\141\x6e\143\x65\144\137\x72\x65\160\x6f\x72\164\163")) {
        goto xM;
    }
    $WR = "\142\x6c\157\x63\153";
    $Eu = "\x48\151\144\145\40\101\144\x76\141\156\143\145\144\x20\x53\145\141\162\x63\x68";
    xM:
    if ($WR == "\156\157\156\x65") {
        goto Of;
    }
    $MH = $mj->get_all_transactions_using_advanced_search();
    goto xf;
    Of:
    $MH = $mj->get_all_transactions();
    xf:
    ?>

<div class="mo_wpns_small_layout">
	<form name="f" method="post" action="" id="manualblockipform" >
		<input type="hidden" name="option" value="mo_wpns_manual_clear" />
		<table>
            <tr>
                <td style="width: 100%">
                    <h2>
                        User Transactions Report
                    </h2>
                </td>
		        <td>
                    <input type="submit"" class="button button-primary button-large" value="Clear Reports" />
                </td>
            </tr>
        </table>
	</form>

    <form id="mo_wpns_hide_advanced_search" method="post" action="">
        <input type="hidden" name="option" value="mo_wpns_hide_advanced_search">
    </form>

    <p>
        <a id="advanced_search_settings"
           onclick="showAdvancedSearch()"
           style="font-size:13pt;cursor:pointer"><?php 
    echo $Eu;
    ?>
        </a>
    </p>
	<div class="mo_wpns_small_layout" id="mo_wpns_advanced_search_div" style="display: <?php 
    echo $WR;
    ?>
">
		<div style="float:right;margin-top:10px">
        <form id="mo_wpns_clear_advance_search" method="post" action="">
            <input type="hidden" name="option" value="mo_wpns_clear_advance_search">
            <input type="submit" name="clearsearch" style="width:100px;" value="Clear Search" class="button button-success button-large">
        </form>
		</div>
		<h3>Advanced Report</h3>

		<form id="mo_wpns_advanced_reports" method="post" action="">
			<input type="hidden" name="option" value="mo_wpns_advanced_reports">
			<table style="width:100%">
			<tr>
			<td width="33%">WordPress Username (Optional) : <input class="mo_wpns_table_textbox" type="text" id="username" name="username" placeholder="Search by username" value="<?php 
    echo get_option("\155\x6f\137\x77\x70\x6e\163\137\x61\144\166\141\156\143\x65\x64\x5f\163\145\x61\x72\x63\x68\x5f\x75\x73\x65\162\156\x61\x6d\x65");
    ?>
"></td>
			<td width="33%">IP Address (Optional) :<input class="mo_wpns_table_textbox" type="text"  id="ip" name="ip" placeholder="Search by IP" value="<?php 
    echo get_option("\x6d\x6f\137\167\160\x6e\x73\137\141\144\x76\x61\x6e\143\x65\x64\137\163\x65\141\x72\143\x68\x5f\151\x70");
    ?>
"></td>
			<td width="33%">Status :
                <select name="status" id="status" style="width:100%;">
                    <?php 
    $u9 = get_option("\x6d\x6f\x5f\167\160\x6e\x73\137\141\144\x76\141\156\143\145\144\137\x73\145\x61\x72\x63\x68\x5f\163\164\x61\164\165\x73");
    ?>
                    <option value="default" <?= $u9=="default" ? 'selected="selected"' : ''; ?>>All</option>
                    <option value="success" <?= $u9=="success" ? 'selected="selected"' : ''; ?>>Success</option>
                    <option value="failed" <?= $u9=="failed" ? 'selected="selected"' : ''; ?>>failed</option>
				</select>
			</td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
			<td width="33%">User Action :
                <select name="user_action" id="user_action" style="width:100%;">
                    <?php 
    $UF = get_option("\155\x6f\x5f\x77\x70\156\x73\137\141\144\166\141\156\x63\145\144\137\x73\x65\141\162\x63\x68\x5f\141\x63\x74\x69\x6f\156");
    ?>
                    <option value="User Login" <?= $UF=="User Login" ? 'selected="selected"' : ''; ?>>User Login</option>
                    <option value="User Registration" <?= $UF=="User Registration" ? 'selected="selected"' : ''; ?>>User Registration</option>
				</select>
			</td>
			<td width="33%">From Date (Optional) : <input class="mo_wpns_table_textbox" type="date" id="from_date" name="from_date" value="<?php 
    echo get_option("\x6d\x6f\x5f\x77\x70\x6e\163\x5f\x61\x64\166\141\156\x63\145\x64\137\163\145\141\x72\x63\x68\x5f\x66\x72\157\x6d\137\144\141\164\x65");
    ?>
"></td>
			<td width="33%">To Date (Optional) :<input class="mo_wpns_table_textbox" type="date" id="to_date" name="to_date" value="<?php 
    echo get_option("\155\157\x5f\x77\x70\x6e\163\x5f\x61\x64\x76\x61\x6e\143\145\x64\137\163\145\141\162\143\x68\x5f\x74\157\137\144\x61\164\x65");
    ?>
"></td>
			</tr>
			</table>
			<br><input type="submit" name="Search" style="width:100px;" value="Search" class="button button-primary button-large">
		</form>
		<br>
	</div>
    <hr/>
	<table id="reports_table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>IP Address</th>
				<th>Username</th>
				<th>User Action</th>
				<th>Status</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
    foreach ($MH as $Fu) {
        echo "\74\x74\x72\76\74\164\x64\76" . $Fu->ip_address . "\x3c\57\x74\x64\76\74\164\x64\x3e" . $Fu->username . "\74\x2f\164\144\76\x3c\x74\x64\x3e" . $Fu->type . "\74\57\164\144\x3e\x3c\x74\x64\76";
        if ($Fu->status == Mo_LLA_Constants::FAILED || $Fu->status == Mo_LLA_Constants::PAST_FAILED) {
            goto U5;
        }
        if ($Fu->status == Mo_LLA_Constants::SUCCESS) {
            goto Er;
        }
        echo "\116\57\x41";
        goto bd;
        Er:
        echo "\74\163\x70\141\156\40\x73\164\171\x6c\145\75\x63\x6f\x6c\x6f\162\x3a\147\162\x65\145\x6e\x3e" . Mo_LLA_Constants::SUCCESS . "\x3c\57\163\x70\x61\156\76";
        bd:
        goto g5;
        U5:
        echo "\x3c\163\160\141\156\x20\163\164\x79\x6c\x65\x3d\143\x6f\154\157\x72\72\162\x65\x64\x3e" . Mo_LLA_Constants::FAILED . "\74\57\163\x70\x61\x6e\x3e";
        g5:
        echo "\74\57\x74\x64\x3e\74\x74\144\76" . date("\x4d\x20\x6a\54\x20\131\x2c\40\x67\x3a\x69\x3a\163\40\141", $Fu->created_timestamp) . "\74\x2f\164\x64\76\74\x2f\164\162\76";
        SU:
    }
    T7:
    ?>
        </tbody>
    </table>
</div>
<script>
	jQuery(document).ready(function() {
		jQuery('#reports_table').DataTable({
			"order": [[ 4, "desc" ]]
		});
	} );
		function showAdvancedSearch(){
			var x = document.getElementById('mo_wpns_advanced_search_div');
			if (x.style.display === 'none') {
				x.style.display = 'block';
				document.getElementById('advanced_search_settings').innerHTML = "Hide Advanced Search";
			}
			else {
				x.style.display = 'none';
				document.getElementById('advanced_search_settings').innerHTML = "Show Advanced Search";
				document.getElementById('mo_wpns_hide_advanced_search').submit();
			}
		}
	</script>
<?php 
}
function mo_lla_show_otp_verification()
{
    ?>
		<div class="mo_wpns_table_layout">
			<div id="panel2">
				<table class="mo_wpns_settings_table">
		<!-- Enter otp -->
				<form name="f" id="back_registration_form" method="post" action="">
							<td>
							<input type="hidden" name="option" value="mo_wpns_registeration_back"/>
							</td>
						</tr>
					</form>
					<form name="f" method="post" id="wpns_form" action="">
						<input type="hidden" name="option" value="mo_wpns_validate_otp" />
						<h3>Verify Your Email</h3>
						<tr>
							<td><b><font color="#FF0000">*</font>Enter OTP:</b></td>
							<td colspan="2"><input class="mo_wpns_table_textbox" autofocus="true" type="text" name="otp_token" required placeholder="Enter OTP" style="width:61%;" />
							 &nbsp;&nbsp;<a style="cursor:pointer;" onclick="document.getElementById('resend_otp_form').submit();">Resend OTP over Email</a></td>
						</tr>
						<tr><td colspan="3"></td></tr>
						<tr><td></td><td>
						<a style="cursor:pointer;" onclick="document.getElementById('back_registration_form').submit();"><input type="button" value="Back" id="back_btn" class="button button-primary button-large" /></a>
						<input type="submit" value="Validate OTP" class="button button-primary button-large" />
						</td>
						</form>
						<td><form method="post" action="" id="mo_wpns_cancel_form">
							<input type="hidden" name="option" value="mo_wpns_cancel" />
						</form></td></tr>
					<form name="f" id="resend_otp_form" method="post" action="">
							<td>
							<input type="hidden" name="option" value="mo_wpns_resend_otp"/>
							</td>
						</tr>
					</form>
				</table>
				<br>
				<hr>

				<h3>I did not recieve any email with OTP . What should I do ?</h3>
				<form id="phone_verification" method="post" action="">
					<input type="hidden" name="option" value="mo_wpns_phone_verification" />
					 If you can't see the email from miniOrange in your mails, please check your <b>SPAM Folder</b>. If you don't see an email even in SPAM folder, verify your identity with our alternate method.
					 <br><br>
						<b>Enter your valid phone number here and verify your identity using one time passcode sent to your phone.</b><br><br><input class="mo_wpns_table_textbox" required="true" pattern="[\+]\d{1,3}\d{10}" autofocus="true" type="text" name="phone_number" id="phone" placeholder="Enter Phone Number" style="width:40%;" value="<?php 
    echo esc_html(get_option("\155\157\x5f\167\x70\x6e\x73\x5f\x61\144\x6d\151\156\137\160\x68\157\156\x65"));
    ?>
" title="Enter phone number without any space or dashes."/>
						<br><input type="submit" value="Send OTP" class="button button-primary button-large" />

				</form>
			</div>
		</div>
		<script>
	jQuery("#phone").intlTelInput();
	jQuery('#back_btn').click(function(){
			jQuery('#mo_wpns_cancel_form').submit();
	});

</script>
<?php 
}
function mo_lla_advanced()
{
    ?>
    <div class="mo_wpns_small_layout">
        <h3>Rename Login Page URL</h3>
        <div class="mo_wpns_subheading">
            <small>
                Rename the login URL (slug) to something different from original wp-login.php or wp-admin to prevent automated brute force attacks.
            </small>
        </div>

        <form id="mo_wpns_enable_rename_login_url_form" method="post" action="">
            <input type="hidden" name="option" value="mo_wpns_enable_rename_login_url">
            <input type="checkbox" name="enable_rename_login_url_checkbox" <?php 
    if (!get_option("\x6d\157\x5f\x77\x70\x6e\x73\137\x65\x6e\x61\142\154\145\137\162\x65\156\141\x6d\145\137\x6c\157\x67\151\156\x5f\x75\x72\154")) {
        goto yL;
    }
    echo "\x63\150\145\x63\x6b\x65\x64";
    yL:
    ?>
 onchange="document.getElementById('mo_wpns_enable_rename_login_url_form').submit();"> Enable Rename Login Page URL (<small>After enabling this you won't be able to login using <b>/wp-admin</b> or  <b>/wp-login.php</b></small>)
        </form>
        <?php 
    if (!get_option("\x6d\157\137\167\160\156\x73\137\145\x6e\141\142\x6c\x65\x5f\162\145\x6e\x61\x6d\x65\137\x6c\157\x67\x69\156\137\x75\x72\154")) {
        goto CR;
    }
    $vl = "\x6d\x79\x6c\x6f\x67\151\156";
    if (!get_option("\154\157\147\x69\156\x5f\160\x61\147\145\x5f\x75\162\154")) {
        goto Fm;
    }
    $vl = get_option("\x6c\157\147\x69\156\x5f\x70\x61\x67\145\x5f\x75\x72\x6c");
    Fm:
    ?>
            <form id="mo_wpns_enable_rename_login_url_form" method="post" action="">
                <input type="hidden" name="option" value="mo_wpns_rename_login_url_configuration">
                <table class="mo_wpns_settings_table">
                    <tr>
                        <td>Login Page URL : </td>
                        <td><?php 
    echo site_url();
    ?>
/</td>
                        <td>
                            <input class="mo_wpns_table_textbox" type="text" id="login_page_url" name="login_page_url" placeholder="Enter New Login Page URL" value="<?php 
    echo $vl;
    ?>
"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Current Login URL : </td>
                        <td colspan="2"><?php 
    echo site_url();
    ?>
/<?php 
    echo $vl;
    ?>
</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br><input type="submit" name="submit" style="width:100px;" value="Save" class="button button-primary button-large"></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        <?php 
    CR:
    ?>
    </div>

    <div class="mo_wpns_small_layout">
        <h3>Disable XML-RPC</h3>
        <div class="mo_wpns_subheading">
            <small>
                An option to simply disable XML-RPC in WordPress.
                Most of the WordPress users don’t need XML-RPC and can disable it to prevent automated brute force attacks.
            </small>
        </div>

        <form id="mo_wpns_disable_xml_rpc_form" method="post" action="">
            <input type="hidden" name="option" value="mo_wpns_disable_xml_rpc">
            <input type="checkbox" name="mo_wpns_disable_xml_rpc_checkbox" <?php 
    if (!get_option("\x6d\x6f\137\x77\x70\x6e\163\137\x64\x69\x73\141\142\x6c\145\137\x78\155\154\137\162\x70\143")) {
        goto NG;
    }
    echo "\x63\x68\x65\143\x6b\x65\x64";
    NG:
    ?>
 onchange="document.getElementById('mo_wpns_disable_xml_rpc_form').submit();"> Disable XML-RPC
        </form>
    </div>

    <div class="mo_wpns_small_layout">
        <h3>Inactive User Logout</h3>
        <div class="mo_wpns_subheading">
            <small>
                Automatic logout if the user does not perform any action for the specified amount of the time.
            </small>
        </div>

        <form id="mo_wpns_inactive_user_logout_form" method="post" action="">
            <input type="hidden" name="option" value="mo_wpns_inactive_user_logout">
            <input type="checkbox" name="mo_wpns_inactive_user_logout_checkbox" <?php 
    if (!get_option("\x6d\x6f\x5f\x77\x70\x6e\x73\x5f\x69\x6e\x61\143\x74\x69\x76\x65\x5f\x75\163\145\x72\137\154\x6f\x67\157\x75\164")) {
        goto o0;
    }
    echo "\x63\150\x65\x63\153\x65\x64";
    o0:
    ?>
 onchange="document.getElementById('mo_wpns_inactive_user_logout_form').submit();"> Enable Inactive User Logout
        </form>

        <?php 
    if (!get_option("\155\157\137\x77\x70\156\163\137\x69\156\141\143\164\151\x76\x65\x5f\x75\163\145\162\x5f\154\x6f\x67\x6f\165\164")) {
        goto PO;
    }
    ?>
            <form id="mo_wpns_inactive_user_logout_form" method="post" action="">
                <input type="hidden" name="option" value="mo_wpns_inactive_user_logout_configuration">
                <table class="mo_wpns_settings_table">
                    <tr>
                        <td style="width:40%">Inactive Logout Duration(Seconds): </td>
                        <td style="width:25%">
                            <div>
                                <input class="mo_wpns_table_textbox" type="number" id="mo_inactive_logout_duration" name="mo_inactive_logout_duration" required placeholder="30" maxlength="5" value="<?php 
    echo get_option("\155\x6f\x5f\151\x6e\x61\x63\x74\x69\x76\145\137\154\x6f\147\x6f\165\164\137\x64\x75\162\x61\x74\x69\x6f\x6e");
    ?>
" min="20"/>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Allowed in Admin session: </td>
                        <td><input type="checkbox" name="mo_inactive_allowed_admin_session" <?php 
    if (!get_option("\155\157\x5f\x69\x6e\x61\143\x74\x69\x76\x65\137\x61\154\154\x6f\167\x65\144\x5f\141\144\155\151\156\x5f\163\145\163\x73\151\157\x6e")) {
        goto co;
    }
    echo "\x63\x68\x65\x63\x6b\x65\x64";
    co:
    ?>
 ></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><br><input type="submit" name="submit" style="width:100px;" value="Save" class="button button-primary button-large"></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        <?php 
    PO:
    ?>
    </div>
	<?php 
    if (Mo_LLA_Util::is_customer_registered()) {
        goto xL;
    }
    ?>
		<script>
			jQuery( document ).ready(function() {
				jQuery(":input").prop("disabled", true);
				jQuery(":input[type=text]").val("");
			});
		</script>
	<?php 
    xL:
    ?>

<?php 
}
?>
