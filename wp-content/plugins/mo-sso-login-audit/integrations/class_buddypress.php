<?php


class Mo_BuddyPress
{
    public static function signup_errors()
    {
        if (isset($_POST["\163\151\147\156\165\160\x5f\165\163\x65\162\x6e\141\x6d\x65"])) {
            goto V3;
        }
        return;
        V3:
        $bf = $_POST["\163\x69\x67\156\x75\160\137\165\x73\145\x72\x6e\141\x6d\145"];
        $tq = '';
        global $bp;
        if (!(!function_exists("\x62\x70\x5f\151\x73\x5f\143\x75\x72\x72\x65\156\164\137\143\x6f\x6d\x70\157\156\x65\156\164") || !bp_is_current_component("\x72\145\147\x69\x73\x74\x65\162"))) {
            goto T8;
        }
        return;
        T8:
        if (!get_option("\x6d\157\x5f\167\160\156\163\x5f\x65\x6e\x61\x62\154\145\137\142\162\165\x74\145\x5f\146\x6f\162\x63\145")) {
            goto vU;
        }
        $S7 = Mo_LLA_Util::get_client_ip();
        $xv = new Mo_LLA_Handler();
        $xv->add_transactions($S7, $bf, Mo_LLA_Constants::REGISTRATION_TRANSACTION, Mo_LLA_Constants::FAILED);
        $h7 = $xv->is_whitelisted($S7);
        if ($h7) {
            goto i0;
        }
        $Vx = $xv->get_failed_attempts_count($S7);
        if (!get_option("\x6d\x6f\x5f\167\160\x6e\163\137\163\154\x6f\x77\x5f\144\157\x77\x6e\137\x61\x74\164\x61\x63\153\163")) {
            goto ks;
        }
        session_start();
        if (isset($_SESSION["\155\157\137\x77\160\x6e\163\x5f\146\x61\151\154\145\144\137\141\164\164\x65\160\155\x74\163"]) && is_numeric($_SESSION["\x6d\157\x5f\x77\160\156\163\x5f\x66\141\x69\154\x65\x64\x5f\141\x74\x74\x65\160\x6d\164\x73"])) {
            goto ro;
        }
        $_SESSION["\155\x6f\x5f\x77\x70\x6e\x73\137\x66\x61\x69\x6c\x65\x64\x5f\x61\164\x74\x65\x70\155\164\163"] = 1;
        goto yf;
        ro:
        $_SESSION["\x6d\x6f\x5f\x77\x70\156\x73\137\x66\x61\x69\x6c\x65\144\x5f\141\x74\164\145\x70\x6d\164\x73"] += 1;
        yf:
        $GD = 2;
        if (!get_option("\155\157\137\167\x70\156\x73\137\163\x6c\x6f\x77\137\144\157\167\156\x5f\x61\x74\164\141\143\153\163\137\144\145\x6c\141\171")) {
            goto gF;
        }
        $GD = get_option("\155\157\137\x77\x70\156\163\x5f\163\154\x6f\167\137\x64\157\167\x6e\x5f\x61\164\x74\141\x63\x6b\x73\x5f\144\145\x6c\141\x79");
        gF:
        sleep($_SESSION["\155\x6f\x5f\167\x70\156\x73\137\x66\141\151\154\x65\x64\137\x61\x74\x74\x65\x70\155\164\163"] * $GD);
        ks:
        $G8 = 5;
        if (!get_option("\x6d\157\x5f\167\x70\x6e\163\137\x61\154\154\x77\145\144\137\154\x6f\x67\151\x6e\x5f\x61\164\x74\145\155\160\x74\163")) {
            goto AE;
        }
        $G8 = get_option("\x6d\157\137\167\160\156\x73\137\141\x6c\x6c\167\145\144\137\x6c\x6f\x67\x69\x6e\137\x61\x74\x74\x65\x6d\160\164\x73");
        AE:
        if (!get_option("\x6d\157\137\x77\160\156\163\137\145\x6e\141\142\x6c\x65\137\x75\x6e\x75\163\x75\x61\x6c\137\x61\143\x74\x69\166\151\x74\171\137\x65\x6d\x61\x69\x6c\137\x74\x6f\x5f\165\163\x65\x72")) {
            goto tT;
        }
        $xv->sendNotificationToUserForUnusualActivities($bf, $S7, Mo_LLA_Messages::FAILED_REGISTRATION_ATTEMPTS_FROM_NEW_IP);
        tT:
        if ($G8 - $Vx <= 0) {
            goto iL;
        }
        if (!get_option("\x6d\x6f\x5f\167\x70\156\x73\x5f\x73\x68\x6f\167\x5f\162\x65\155\x61\x69\156\151\x6e\x67\137\x61\164\x74\x65\x6d\x70\x74\163")) {
            goto Ga;
        }
        $NK = $G8 - $Vx;
        $tq = "\74\142\x72\x3e\x59\157\x75\40\x68\x61\166\145\x20\x3c\x62\76" . $NK . "\x3c\57\142\76\x20\141\164\164\x65\x6d\x70\x74\x73\40\162\145\x6d\x61\x69\156\x69\x6e\x67\56";
        Ga:
        goto b3;
        iL:
        $xv->block_ip($S7, Mo_LLA_Messages::LOGIN_ATTEMPTS_EXCEEDED, false);
        if (!get_option("\155\157\137\x77\160\156\x73\137\145\156\x61\142\154\145\x5f\x69\x70\137\142\x6c\x6f\143\x6b\x65\144\137\x65\x6d\x61\x69\x6c\x5f\164\x6f\137\x61\144\x6d\x69\x6e")) {
            goto Q2;
        }
        $xv->sendIpBlockedNotification($S7, Mo_LLA_Messages::LOGIN_ATTEMPTS_EXCEEDED);
        Q2:
        require_once "\x2e\56\x2f\x74\145\155\x70\154\141\x74\145\163\57\64\x30\63\56\160\150\160";
        die;
        b3:
        i0:
        vU:
        if (get_option("\155\x6f\x5f\167\160\156\163\x5f\x61\x63\x74\x69\166\141\x74\x65\x5f\x72\x65\x63\141\160\164\143\150\141\137\146\157\x72\x5f\142\165\x64\x64\171\x70\162\x65\163\x73\x5f\162\145\x67\151\163\x74\x72\x61\x74\x69\x6f\x6e")) {
            goto HJ;
        }
        bp_core_add_message($tq, "\x65\162\x72\x6f\162");
        goto wB;
        HJ:
        $SK = new Mo_LLA_Recaptcha_Handler();
        if (!$SK->verify()) {
            goto YJ;
        }
        bp_core_add_message($tq, "\145\162\162\157\x72");
        goto FX;
        YJ:
        if (isset($bp->signup->errors)) {
            goto Bh;
        }
        $bp->signup->errors = array();
        Bh:
        $Eu = "\x49\x6e\x76\x61\x6c\151\144\x20\x63\141\x70\164\x63\x68\x61\x2e\40\x50\x6c\x65\x61\163\x65\x20\166\145\x72\x69\146\171\x20\x63\141\160\164\x63\x68\141\40\x61\x67\x61\151\156\x2e\12{$tq}";
        $bp->signup->errors["\162\x65\x63\141\x70\x74\143\150\141\137\x65\162\162\157\x72"] = __("\x49\156\x76\141\154\x69\144\x20\143\x61\160\164\x63\x68\141\56\x20\120\154\145\x61\163\145\x20\x76\145\x72\151\x66\171\40\143\141\x70\x74\x63\150\141\x20\141\x67\x61\151\156\56");
        bp_core_add_message($Eu, "\x65\162\162\157\x72");
        FX:
        wB:
    }
}
?>
