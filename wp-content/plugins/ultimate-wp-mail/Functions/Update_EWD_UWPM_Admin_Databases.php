<?php
/* The file contains all of the functions which make changes to the WordPress tables */

function EWD_UWPM_UpdateOptions() {
	global $EWD_UWPM_Full_Version;

	if (isset($_POST['custom_css'])) {update_option('EWD_UWPM_Custom_CSS', sanitize_text_field($_POST['custom_css']));}
	if (isset($_POST['add_unsubscribe_link'])) {update_option('EWD_UWPM_Add_Unsubscribe_Link', sanitize_text_field($_POST['add_unsubscribe_link']));}
	if (isset($_POST['unsubscribe_redirect_url'])) {update_option('EWD_UWPM_Unsubscribe_Redirect_URL', sanitize_text_field($_POST['unsubscribe_redirect_url']));}
	if (isset($_POST['add_subscribe_checkbox'])) {update_option('EWD_UWPM_Add_Subscribe_Checkbox', sanitize_text_field($_POST['add_subscribe_checkbox']));}
	if (isset($_POST['add_unsubscribe_checkbox'])) {update_option('EWD_UWPM_Add_Unsubscribe_Checkbox', sanitize_text_field($_POST['add_unsubscribe_checkbox']));}
	if (isset($_POST['track_opens'])) {update_option('EWD_UWPM_Track_Opens', sanitize_text_field($_POST['track_opens']));}
	if (isset($_POST['track_clicks'])) {update_option('EWD_UWPM_Track_Clicks', sanitize_text_field($_POST['track_clicks']));}
	if (isset($_POST['woocommerce_integration'])) {update_option('EWD_UWPM_WooCommerce_Integration', sanitize_text_field($_POST['woocommerce_integration']));}
	if (isset($_POST['Options_Submit'])) {
		array_walk($_POST['display_interests'], 'sanitize_text_field');
		update_option('EWD_UWPM_Display_Interests', $_POST['display_interests']);
	}
	if (isset($_POST['display_post_interests'])) {update_option('EWD_UWPM_Display_Post_Interests', sanitize_text_field($_POST['display_post_interests']));}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_UWPM_Email_From_Name', sanitize_text_field($_POST['email_from_name']));}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_UWPM_Email_From_Email', sanitize_email($_POST['email_from_email']));}

	$Advanced_Send_Ons = array();
	$Counter = 0;
	while ($Counter < 200) {
		if (isset($_POST['Send_On_Action_Type_' . $Counter])) {

			$Advanced_Send_On['Send_On_ID'] = sanitize_text_field($_POST['Send_On_' . $Counter]);
			$Advanced_Send_On['Enabled'] = (isset($_POST['Enable_Send_On_' . $Counter]) ? sanitize_text_field($_POST['Enable_Send_On_' . $Counter]) : false);
			$Advanced_Send_On['Action_Type'] = sanitize_text_field($_POST['Send_On_Action_Type_' . $Counter]);
			$Advanced_Send_On['Includes'] = (isset($_POST['Send_On_Includes_' . $Counter]) ? sanitize_text_field($_POST['Send_On_Includes_' . $Counter]) : 'Any');
			$Advanced_Send_On['Email_ID'] = sanitize_text_field($_POST['Send_On_Email_' . $Counter]);
			$Advanced_Send_On['Interval_Count'] = (isset($_POST['Send_On_Interval_Count_' . $Counter]) ? $_POST['Send_On_Interval_Count_' . $Counter] : 1);
			$Advanced_Send_On['Interval_Unit'] = (isset($_POST['Send_On_Interval_Unit_' . $Counter]) ? $_POST['Send_On_Interval_Unit_' . $Counter] : "Minutes");

			$Advanced_Send_Ons[] = $Advanced_Send_On;
			unset($Advanced_Send_On);
		}
		$Counter++;
	}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_UWPM_Send_On_Actions', $Advanced_Send_Ons);}

	if (isset($_POST['subscribe_label']) and $EWD_UWPM_Full_Version == "Yes") {update_option('EWD_UWPM_Subscribe_Label', sanitize_text_field($_POST['subscribe_label']));}
	if (isset($_POST['unsubscribe_label']) and $EWD_UWPM_Full_Version == "Yes") {update_option('EWD_UWPM_Unsubscribe_Label', sanitize_text_field($_POST['unsubscribe_label']));}
	if (isset($_POST['login_to_select_topics_label']) and $EWD_UWPM_Full_Version == "Yes") {update_option('EWD_UWPM_Login_To_Select_Topics_Label', sanitize_text_field($_POST['login_to_select_topics_label']));}
	if (isset($_POST['select_topics_label']) and $EWD_UWPM_Full_Version == "Yes") {update_option('EWD_UWPM_Select_Topics_Label', sanitize_text_field($_POST['select_topics_label']));}
	
	$update_message = __("Options have been successfully updated.", 'ultimate-wp-mail');
	$update['Message'] = $update_message;
	$update['Message_Type'] = "Update";
	return $update;
}

function EWD_UWPM_UpdateLists() {
	$Email_Lists = array();
	$Counter = 0;
	while ($Counter < 30) {
		if (isset($_POST['Email_Lists_' . $Counter . '_List_Name'])) {
			$Prefix = 'Email_Lists_' . $Counter;

			$Email_List['ID'] = sanitize_text_field($_POST[$Prefix . '_ID']);
			$Email_List['List_Name'] = sanitize_text_field($_POST[$Prefix . '_List_Name']);
			$Email_List['Users'] = json_decode(stripslashes($_POST[$Prefix . '_List_Users']));
			$Email_List['Emails_Sent'] = json_decode(stripslashes($_POST[$Prefix . '_Emails_Sent']));
			$Email_List['Last_Email_Sent_Date'] = $_POST[$Prefix . '_Last_Email_Sent_Date'];

			if (is_array($Email_List['Users'])) {$Email_List['Number_Of_Users'] = sizeOf($Email_List['Users']);}

			$Email_Lists[] = $Email_List;
			unset($Email_List);
		}
		$Counter++;
	}
	if (isset($_POST['Lists_Submit'])) {update_option('EWD_UWPM_Email_Lists_Array', $Email_Lists);}

	$update_message = __("Lists have been successfully updated.", 'ultimate-wp-mail');
	$update['Message'] = $update_message;
	$update['Message_Type'] = "Update";
	return $update;
}

function EWD_UWPM_Unsubscribe() {
	$Unsubscribe_Redirect_URL = get_option("EWD_UWPM_Unsubscribe_Redirect_URL");

	$Email = sanitize_email($_GET['Email']);
	$User_ID = sanitize_text_field(substr($_GET['Code'], 0, strpos($_GET['Code'], 'PL')));
	
	$User = get_user_by('email', $Email);

	if ($User->ID == $User_ID) {update_user_meta($User_ID, 'EWD_UWPM_User_Unsubscribe', 'Yes');}

	if (wp_redirect($Unsubscribe_Redirect_URL)) {exit();}
}



