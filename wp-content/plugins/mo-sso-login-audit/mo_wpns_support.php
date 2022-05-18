<?php


function mo_lla_support()
{
    $current_user = wp_get_current_user();
    if (get_option("\x6d\x6f\137\x77\160\x6e\163\137\141\x64\x6d\151\x6e\137\x65\x6d\141\x69\x6c")) {
        goto Jl;
    }
    $m2 = $current_user->user_email;
    goto gV;
    Jl:
    $m2 = get_option("\x6d\x6f\x5f\167\x70\156\163\x5f\x61\x64\x6d\151\156\137\145\x6d\x61\151\154");
    gV:
    ?>
	<div class="mo_wpns_support_layout">
		<h3>Support</h3>
			<form name="f" method="post" action="">
				<div>Need any help? Just send us a query so we can help you.<br /><br /></div>
				<div>
					<table class="mo_wpns_settings_table">
						<tr><td>
							<input type="email" class="mo_wpns_table_textbox" id="query_email" name="query_email" value="<?php 
    echo $m2;
    ?>
" placeholder="Enter your email" required />
							</td>
						</tr>
						<tr><td>
							<input type="text" class="mo_wpns_table_textbox" name="query_phone" id="query_phone" value="<?php 
    echo get_option("\x6d\157\x5f\x77\160\x6e\x73\x5f\141\144\x6d\x69\x6e\137\160\150\x6f\156\x65");
    ?>
" placeholder="Enter your phone"/>
							</td>
						</tr>
						<tr>
							<td>
								<textarea id="query" name="query" class="mo_wpns_settings_textarea" style="border-radius:4px;resize: vertical;width:100%" cols="52" rows="7" onkeyup="mo_wpns_valid(this)" onblur="mo_wpns_valid(this)" onkeypress="mo_wpns_valid(this)" placeholder="Write your query here"></textarea>
							</td>
						</tr>
					</table>
				</div>
				<input type="hidden" name="option" value="mo_wpns_send_query"/>
				<input type="submit" name="send_query" id="send_query" value="Submit Query" style="margin-bottom:3%;" class="button button-primary button-large" />
			</form>
			<br />			
	</div>
	<script>
		jQuery("#query_phone").intlTelInput();
		function mo_wpns_valid(f) {
			!(/^[a-zA-Z?,.\(\)\/@ 0-9]*$/).test(f.value) ? f.value = f.value.replace(/[^a-zA-Z?,.\(\)\/@ 0-9]/, '') : null;
		}
	</script>
<?php 
}
?>
