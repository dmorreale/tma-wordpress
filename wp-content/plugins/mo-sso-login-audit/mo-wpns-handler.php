<?php


class Mo_LLA_Handler
{
    function create_db()
    {
        global $wpdb;
        $Hd = $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE;
        if (!($wpdb->get_var("\x73\x68\x6f\167\x20\x74\x61\142\x6c\145\163\40\x6c\151\x6b\145\40\47{$Hd}\x27") != $Hd)) {
            goto vc;
        }
        $MQ = "\x43\122\105\x41\x54\x45\x20\x54\x41\x42\x4c\105\x20" . $Hd . "\x20\x28\xa\11\11\x9\x60\151\144\x60\x20\x62\x69\147\151\156\x74\x20\116\x4f\124\40\116\x55\114\114\40\x41\125\x54\117\137\111\116\x43\x52\105\115\105\116\124\54\x20\140\151\160\137\141\144\x64\162\145\163\x73\x60\x20\155\145\x64\x69\x75\x6d\164\x65\x78\x74\40\x4e\x4f\124\40\x4e\x55\114\114\40\54\x20\40\140\165\163\x65\x72\x6e\141\155\145\x60\x20\x6d\x65\x64\x69\x75\x6d\x74\x65\x78\x74\x20\x4e\117\x54\40\116\125\x4c\114\x20\54\12\x9\x9\x9\x60\164\x79\160\145\140\40\155\x65\x64\x69\x75\x6d\x74\145\170\164\40\116\x4f\x54\x20\116\x55\x4c\x4c\40\54\x20\x60\x75\162\154\x60\40\x6d\145\x64\151\165\x6d\x74\145\170\x74\x20\x4e\117\x54\x20\116\x55\x4c\x4c\x20\x2c\40\140\163\164\x61\x74\165\163\x60\x20\x6d\x65\144\x69\x75\155\164\145\x78\x74\40\x4e\x4f\x54\40\x4e\125\x4c\x4c\40\x2c\x20\x60\x63\x72\x65\141\164\145\144\137\x74\151\155\x65\163\164\141\155\160\x60\40\x69\156\164\54\x20\125\116\x49\x51\125\x45\40\x4b\105\131\40\x69\x64\x20\x28\151\144\x29\40\x29\x3b";
        require_once ABSPATH . "\167\x70\x2d\x61\x64\x6d\x69\156\57\151\156\x63\154\x75\x64\x65\163\57\x75\x70\147\162\x61\144\x65\x2e\160\150\x70";
        dbDelta($MQ);
        vc:
        $Hd = $wpdb->prefix . Mo_LLA_Constants::BLOCKED_IPS_TABLE;
        if (!($wpdb->get_var("\163\x68\x6f\x77\x20\x74\141\x62\x6c\145\163\40\154\x69\153\x65\x20\47{$Hd}\x27") != $Hd)) {
            goto h3;
        }
        $MQ = "\x43\122\105\101\124\x45\x20\x54\x41\x42\114\x45\40" . $Hd . "\40\x28\xa\x9\11\11\140\x69\x64\x60\x20\x69\156\164\40\x4e\117\124\40\116\125\x4c\x4c\x20\101\125\x54\x4f\x5f\111\116\x43\122\x45\x4d\x45\x4e\124\x2c\x20\x60\x69\160\137\x61\x64\x64\x72\x65\163\x73\x60\x20\155\145\144\x69\x75\x6d\x74\x65\x78\164\x20\x4e\x4f\124\40\116\125\114\x4c\40\x2c\x20\140\x72\145\141\163\157\156\140\x20\155\145\144\x69\165\155\164\x65\170\164\54\x20\140\142\154\157\143\153\x65\x64\137\146\157\x72\x5f\x74\x69\x6d\145\x60\40\151\x6e\164\x2c\12\11\11\x9\140\143\162\x65\141\164\145\144\137\x74\x69\155\145\163\x74\x61\155\160\x60\40\151\156\164\54\40\125\x4e\x49\121\x55\x45\40\x4b\105\131\40\151\144\40\x28\151\144\x29\x20\51\73";
        require_once ABSPATH . "\x77\x70\55\141\144\155\151\156\57\151\156\x63\154\165\144\x65\x73\x2f\x75\160\x67\162\141\144\145\56\160\150\x70";
        dbDelta($MQ);
        h3:
        $Hd = $wpdb->prefix . Mo_LLA_Constants::WHITELISTED_IPS_TABLE;
        if (!($wpdb->get_var("\163\x68\157\x77\40\164\141\x62\154\x65\x73\40\154\151\153\145\x20\x27{$Hd}\x27") != $Hd)) {
            goto Zw;
        }
        $MQ = "\103\x52\105\101\x54\105\x20\x54\x41\102\x4c\x45\40" . $Hd . "\40\x28\12\x9\x9\x9\140\151\144\x60\40\151\x6e\x74\x20\x4e\117\124\x20\x4e\x55\114\114\40\x41\125\x54\x4f\137\111\x4e\103\x52\x45\x4d\105\x4e\124\54\x20\x60\x69\160\137\141\x64\x64\162\x65\x73\x73\140\x20\155\x65\144\x69\x75\155\164\x65\x78\164\40\116\117\x54\40\116\x55\114\114\40\54\40\140\x63\162\x65\x61\164\145\x64\x5f\x74\x69\x6d\145\163\x74\141\155\x70\140\40\151\156\164\x2c\x20\x55\116\111\x51\x55\x45\40\x4b\x45\131\x20\x69\x64\x20\50\x69\144\51\x20\x29\x3b";
        require_once ABSPATH . "\167\160\55\x61\x64\x6d\151\156\57\x69\x6e\143\x6c\165\144\x65\x73\x2f\x75\x70\147\162\x61\144\145\x2e\x70\150\160";
        dbDelta($MQ);
        Zw:
        $Hd = $wpdb->prefix . Mo_LLA_Constants::EMAIL_SENT_AUDIT;
        if (!($wpdb->get_var("\x73\150\x6f\167\x20\164\141\x62\154\145\163\x20\x6c\151\153\145\40\x27{$Hd}\x27") != $Hd)) {
            goto ZS;
        }
        $MQ = "\x43\x52\x45\x41\124\105\x20\124\x41\102\x4c\x45\x20" . $Hd . "\40\x28\12\11\11\11\140\x69\144\x60\x20\x69\156\x74\x20\116\x4f\124\40\116\125\114\x4c\x20\x41\125\x54\117\137\x49\116\x43\122\105\x4d\x45\116\x54\x2c\40\140\x69\160\137\x61\144\x64\162\145\163\x73\x60\40\x6d\145\144\x69\x75\155\x74\145\170\x74\40\x4e\x4f\124\40\x4e\x55\114\114\x20\x2c\x20\x60\x75\x73\x65\162\x6e\141\x6d\145\x60\40\155\x65\x64\x69\165\155\x74\x65\x78\164\x20\116\117\124\x20\x4e\125\x4c\114\54\x20\x60\162\145\141\x73\x6f\156\140\x20\155\145\144\151\x75\155\164\x65\170\x74\x2c\40\x60\x63\162\145\x61\x74\x65\x64\137\x74\151\155\145\163\164\x61\155\160\140\x20\x69\156\x74\x2c\x20\125\x4e\111\x51\x55\105\x20\113\x45\x59\40\x69\144\40\50\x69\x64\x29\40\51\x3b";
        require_once ABSPATH . "\x77\x70\55\141\x64\x6d\151\x6e\57\x69\156\143\x6c\x75\x64\145\x73\x2f\x75\x70\147\x72\x61\144\x65\56\160\x68\160";
        dbDelta($MQ);
        ZS:
    }
    function is_ip_blocked($fp)
    {
        if (!empty($fp)) {
            goto dn;
        }
        return false;
        dn:
        global $wpdb;
        $Ic = $wpdb->get_results("\x53\x45\114\x45\x43\x54\40\x2a\x20\x46\122\x4f\x4d\40" . $wpdb->prefix . Mo_LLA_Constants::BLOCKED_IPS_TABLE . "\40\167\x68\145\x72\x65\40\x69\x70\137\141\144\x64\x72\145\x73\x73\40\x3d\x20\47" . $fp . "\47");
        if (!$Ic) {
            goto kU;
        }
        if (!(count($Ic) > 0)) {
            goto Wv;
        }
        $Ts = $Ic[0]->blocked_for_time;
        $cQ = current_time("\164\151\x6d\x65\x73\x74\141\155\x70");
        if ($cQ < $Ts) {
            goto uv;
        }
        $wpdb->query("\104\105\x4c\x45\x54\105\40\106\122\117\115\40" . $wpdb->prefix . Mo_LLA_Constants::BLOCKED_IPS_TABLE . "\x20\127\x48\x45\x52\x45\40\x69\x70\x5f\x61\144\144\162\x65\163\x73\40\75\x20\47" . $fp . "\47");
        $wpdb->query("\x55\x50\x44\x41\124\105\x20" . $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE . "\x20\123\105\x54\40\x73\x74\x61\164\x75\x73\x3d\x27" . Mo_LLA_Constants::PAST_FAILED . "\47\40\127\x48\105\122\x45\x20\x69\x70\x5f\141\144\x64\162\145\163\x73\40\x3d\x20\47" . $fp . "\x27\x20\101\x4e\x44\40\x73\164\141\x74\165\163\75\x27" . Mo_LLA_Constants::FAILED . "\x27");
        goto Rd;
        uv:
        return true;
        Rd:
        Wv:
        kU:
        return false;
    }
    function block_ip($fp, $PI, $CV)
    {
        if (!empty($fp)) {
            goto Ou;
        }
        return;
        Ou:
        if (!$this->is_ip_blocked($fp)) {
            goto Bb;
        }
        return;
        Bb:
        $h9 = null;
        $Q8 = get_option("\155\157\137\x77\x70\x6e\163\137\x74\x69\x6d\145\x5f\157\146\x5f\142\x6c\x6f\x63\153\151\156\147\x5f\x74\171\160\145");
        $to = 3;
        if (!get_option("\155\157\137\167\160\156\x73\x5f\164\151\155\145\137\x6f\x66\x5f\142\x6c\x6f\143\153\x69\x6e\x67\137\x76\141\154")) {
            goto bS;
        }
        $to = get_option("\155\x6f\137\167\160\x6e\163\x5f\164\151\x6d\145\137\157\146\137\142\154\157\143\x6b\x69\x6e\147\x5f\x76\141\154");
        bS:
        if ($Q8 == "\x6d\157\156\x74\150\x73") {
            goto j3;
        }
        if ($Q8 == "\x64\141\x79\x73") {
            goto Tu;
        }
        if ($Q8 == "\150\157\x75\162\163") {
            goto T5;
        }
        if ($Q8 == "\x6d\151\x6e\165\164\145\163") {
            goto a4;
        }
        $h9 = current_time("\164\x69\x6d\x65\163\x74\x61\155\x70") + $to * 365 * 24 * 60 * 60;
        goto Fo;
        a4:
        $h9 = current_time("\x74\151\155\x65\163\x74\x61\155\160") + $to * 60;
        Fo:
        goto qO;
        T5:
        $h9 = current_time("\x74\x69\155\x65\x73\164\x61\155\160") + $to * 60 * 60;
        qO:
        goto ZA;
        Tu:
        $h9 = current_time("\x74\x69\155\x65\163\164\x61\155\x70") + $to * 24 * 60 * 60;
        ZA:
        goto XI;
        j3:
        $h9 = current_time("\164\x69\x6d\x65\163\x74\141\x6d\160") + $to * 30 * 24 * 60 * 60;
        XI:
        if (!get_option("\155\157\x5f\x77\x70\x6e\x73\x5f\145\x6e\141\142\154\145\137\150\x74\x61\x63\x63\145\x73\163\137\x62\154\x6f\143\153\151\156\147")) {
            goto da;
        }
        $R9 = dirname(dirname(dirname(dirname(__FILE__))));
        $Jb = fopen($R9 . DIRECTORY_SEPARATOR . "\x2e\150\164\141\143\143\x65\x73\163", "\141");
        fwrite($Jb, "\xa\x64\145\x6e\171\40\146\162\x6f\x6d\40" . trim($fp));
        fclose($Jb);
        da:
        global $wpdb;
        $wpdb->insert($wpdb->prefix . Mo_LLA_Constants::BLOCKED_IPS_TABLE, array("\x69\x70\137\x61\144\x64\162\145\x73\163" => $fp, "\x72\145\141\x73\x6f\156" => $PI, "\x62\154\x6f\143\x6b\145\144\x5f\x66\157\x72\x5f\x74\x69\x6d\145" => $h9, "\x63\x72\x65\141\x74\145\144\137\164\x69\x6d\x65\x73\164\x61\x6d\x70" => current_time("\x74\x69\x6d\x65\163\164\x61\x6d\x70")));
    }
    function unblock_ip_entry($j2)
    {
        global $wpdb;
        $Ic = $wpdb->get_results("\123\x45\x4c\x45\x43\x54\x20\151\160\x5f\141\x64\144\x72\x65\163\163\x20\x46\x52\117\115\40" . $wpdb->prefix . Mo_LLA_Constants::BLOCKED_IPS_TABLE . "\40\x77\x68\145\x72\x65\40\x69\x64\75" . $j2);
        if (!(count($Ic) > 0)) {
            goto Oa;
        }
        if (!get_option("\155\157\137\x77\160\156\163\x5f\145\x6e\x61\142\154\145\137\150\164\141\x63\x63\x65\x73\163\137\142\x6c\x6f\x63\153\x69\156\x67")) {
            goto bW;
        }
        $bQ = $Ic[0]->ip_address;
        $R9 = dirname(dirname(dirname(dirname(__FILE__))));
        $W_ = $R9 . DIRECTORY_SEPARATOR . "\56\150\x74\x61\143\x63\x65\x73\x73";
        $oy = file_get_contents($W_);
        if (!(strpos($oy, "\xa\x64\145\x6e\x79\40\146\x72\x6f\155\x20" . trim($bQ)) !== false)) {
            goto OZ;
        }
        $oy = str_replace("\xa\x64\x65\156\171\x20\x66\162\157\155\x20" . trim($bQ), '', $oy);
        file_put_contents($W_, $oy);
        OZ:
        bW:
        Oa:
        $wpdb->query("\x44\105\114\x45\124\x45\40\106\122\117\x4d\x20" . $wpdb->prefix . Mo_LLA_Constants::BLOCKED_IPS_TABLE . "\xa\11\11\11\x20\127\x48\105\x52\105\x20\x69\x64\40\75\40" . $j2);
    }
    function remove_htaccess_ips()
    {
        global $wpdb;
        $Ic = $wpdb->get_results("\123\105\x4c\105\103\124\x20\151\160\137\141\x64\144\162\145\x73\163\40\x46\122\x4f\115\x20" . $wpdb->prefix . Mo_LLA_Constants::BLOCKED_IPS_TABLE);
        $R9 = dirname(dirname(dirname(dirname(__FILE__))));
        $W_ = $R9 . DIRECTORY_SEPARATOR . "\56\x68\x74\141\143\143\145\163\163";
        $oy = file_get_contents($W_);
        $YR = 0;
        foreach ($Ic as $BJ) {
            $bQ = $BJ->ip_address;
            if (!(strpos($oy, "\xa\144\145\x6e\171\40\x66\162\157\x6d\40" . trim($bQ)) !== false)) {
                goto Uw;
            }
            $oy = str_replace("\12\x64\145\x6e\171\40\x66\162\x6f\x6d\40" . trim($bQ), '', $oy);
            $YR = 1;
            Uw:
            uk:
        }
        z5:
        if (!($YR == 1)) {
            goto Fa;
        }
        file_put_contents($W_, $oy);
        Fa:
    }
    function add_htaccess_ips()
    {
        global $wpdb;
        $Ic = $wpdb->get_results("\123\105\x4c\105\x43\124\x20\151\160\x5f\x61\x64\x64\x72\145\163\163\40\x46\122\x4f\x4d\x20" . $wpdb->prefix . Mo_LLA_Constants::BLOCKED_IPS_TABLE);
        $R9 = dirname(dirname(dirname(dirname(__FILE__))));
        $W_ = $R9 . DIRECTORY_SEPARATOR . "\56\150\164\141\x63\x63\x65\163\163";
        $oy = file_get_contents($W_);
        $Jb = fopen($W_, "\x61");
        foreach ($Ic as $BJ) {
            $bQ = $BJ->ip_address;
            if (strpos($oy, "\xa\x64\145\156\x79\40\x66\162\x6f\x6d\40" . trim($bQ)) !== false) {
                goto lw;
            }
            fwrite($Jb, "\xa\144\145\x6e\171\40\x66\x72\x6f\155\40" . trim($bQ));
            goto qW;
            lw:
            qW:
            QL:
        }
        II:
        fclose($Jb);
    }
    function get_blocked_ips()
    {
        global $wpdb;
        $Ic = $wpdb->get_results("\x53\105\x4c\105\103\124\x20\151\x64\54\40\x69\x70\x5f\141\x64\x64\x72\145\x73\163\54\x20\x72\145\141\163\x6f\x6e\54\x20\x62\154\x6f\143\x6b\145\144\137\146\x6f\162\x5f\164\x69\x6d\x65\54\40\143\x72\145\x61\164\x65\144\x5f\x74\x69\x6d\145\x73\x74\x61\155\160\40\x46\x52\117\x4d\x20" . $wpdb->prefix . Mo_LLA_Constants::BLOCKED_IPS_TABLE);
        return $Ic;
    }
    function is_whitelisted($fp)
    {
        if (!empty($fp)) {
            goto az;
        }
        return false;
        az:
        global $wpdb;
        $kM = $wpdb->get_var("\123\x45\x4c\105\x43\x54\x20\103\x4f\125\x4e\x54\50\52\x29\40\x46\x52\x4f\x4d\40" . $wpdb->prefix . Mo_LLA_Constants::WHITELISTED_IPS_TABLE . "\x20\167\x68\x65\162\145\x20\x69\x70\137\x61\144\x64\x72\145\163\163\x20\x3d\40\x27" . $fp . "\47");
        if (!$kM) {
            goto xA;
        }
        $kM = intval($kM);
        xA:
        if (!($kM > 0)) {
            goto P6;
        }
        return true;
        P6:
        return false;
    }
    function whitelist_ip($fp)
    {
        if (!get_option("\x6d\x6f\137\x77\x70\x6e\x73\x5f\x65\156\141\142\154\145\x5f\x68\164\x61\143\143\145\x73\163\137\x62\154\157\143\x6b\x69\156\x67")) {
            goto pq;
        }
        $R9 = dirname(dirname(dirname(dirname(__FILE__))));
        $W_ = $R9 . DIRECTORY_SEPARATOR . "\x2e\x68\164\141\x63\143\145\x73\163";
        $oy = file_get_contents($W_);
        if (!(strpos($oy, "\12\144\x65\x6e\x79\x20\146\162\x6f\155\40" . trim($fp)) !== false)) {
            goto is;
        }
        $oy = str_replace("\12\x64\x65\x6e\x79\40\x66\162\x6f\155\x20" . trim($fp), '', $oy);
        file_put_contents($W_, $oy);
        is:
        pq:
        if (!empty($fp)) {
            goto OG;
        }
        return;
        OG:
        if (!$this->is_whitelisted($fp)) {
            goto jP;
        }
        return;
        jP:
        global $wpdb;
        $wpdb->insert($wpdb->prefix . Mo_LLA_Constants::WHITELISTED_IPS_TABLE, array("\x69\x70\137\x61\x64\x64\162\145\163\x73" => $fp, "\143\162\145\141\164\145\144\137\164\x69\155\x65\163\x74\141\155\160" => current_time("\164\x69\x6d\145\163\x74\141\x6d\160")));
    }
    function remove_whitelist_entry($j2)
    {
        global $wpdb;
        $wpdb->query("\x44\x45\114\x45\x54\105\x20\106\x52\117\x4d\40" . $wpdb->prefix . Mo_LLA_Constants::WHITELISTED_IPS_TABLE . "\12\11\11\x9\x20\x57\x48\x45\x52\x45\x20\x69\144\40\x3d\x20" . $j2);
    }
    function get_whitelisted_ips()
    {
        global $wpdb;
        $Ic = $wpdb->get_results("\123\105\x4c\x45\103\x54\40\151\144\x2c\x20\151\160\x5f\x61\x64\144\162\145\163\163\54\40\143\162\145\x61\164\x65\x64\x5f\164\151\155\x65\163\164\x61\x6d\x70\x20\106\122\117\x4d\40" . $wpdb->prefix . Mo_LLA_Constants::WHITELISTED_IPS_TABLE);
        return $Ic;
    }
    function is_email_sent_to_user($XL, $fp)
    {
        if (!empty($fp)) {
            goto Cf;
        }
        return false;
        Cf:
        global $wpdb;
        $ym = $wpdb->get_var("\x53\x45\x4c\x45\x43\124\x20\103\117\x55\116\x54\50\52\x29\x20\x46\122\x4f\115\x20" . $wpdb->prefix . Mo_LLA_Constants::EMAIL_SENT_AUDIT . "\x20\x77\150\145\162\145\x20\151\160\137\141\x64\144\162\x65\x73\x73\x20\x3d\x20\x27" . $fp . "\47\40\101\116\x44\x20\xa\11\11\x75\163\x65\162\x6e\x61\155\145\75\47" . $XL . "\47");
        if (!$ym) {
            goto Sj;
        }
        $ym = intval($ym);
        Sj:
        if (!($ym > 0)) {
            goto M_;
        }
        return true;
        M_:
        return false;
    }
    function audit_email_notification_sent_to_user($XL, $fp, $PI)
    {
        if (!(empty($fp) || empty($XL))) {
            goto VV;
        }
        return;
        VV:
        global $wpdb;
        $wpdb->insert($wpdb->prefix . Mo_LLA_Constants::EMAIL_SENT_AUDIT, array("\151\160\x5f\141\144\144\x72\x65\x73\x73" => $fp, "\165\x73\145\162\156\x61\x6d\x65" => $XL, "\x72\145\x61\163\x6f\x6e" => $PI, "\143\162\x65\141\x74\145\144\x5f\x74\x69\x6d\145\x73\x74\x61\x6d\x70" => current_time("\164\151\155\145\x73\164\x61\155\x70")));
    }
    function add_transactions($fp, $XL, $UF, $u9)
    {
        global $wpdb;
        if (!($XL == '')) {
            goto jN;
        }
        $XL = "\x2d";
        jN:
        $wpdb->insert($wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE, array("\x69\160\x5f\141\144\144\x72\145\x73\163" => $fp, "\x75\x73\145\x72\x6e\x61\155\145" => $XL, "\164\x79\160\145" => $UF, "\163\x74\x61\164\165\163" => $u9, "\x63\162\145\141\164\145\x64\x5f\164\x69\155\x65\163\164\x61\155\x70" => current_time("\x74\151\155\x65\163\x74\141\x6d\160")));
    }
    function get_all_transactions()
    {
        global $wpdb;
        $Ic = $wpdb->get_results("\x53\x45\114\105\x43\x54\40\151\160\x5f\141\x64\x64\162\145\x73\163\54\40\x75\x73\x65\162\x6e\x61\155\145\x2c\x20\164\x79\x70\145\x2c\40\163\164\141\164\x75\163\54\40\x63\162\x65\x61\164\x65\x64\137\x74\x69\x6d\145\163\x74\x61\155\x70\40\x46\122\117\115\x20" . $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE . "\40\157\162\x64\x65\x72\x20\x62\171\x20\x69\x64\40\x64\x65\163\143\x20\154\151\x6d\151\164\40\x35\60\60\x30");
        return $Ic;
    }
    function get_all_transactions_using_advanced_search()
    {
        global $wpdb;
        $Ic = '';
        if (get_option("\155\157\x5f\167\160\x6e\x73\x5f\141\x64\166\141\x6e\143\145\144\137\x72\145\x70\x6f\162\x74\x73")) {
            goto Ol;
        }
        $Ic = $wpdb->get_results("\x53\x45\114\x45\103\124\40\151\160\137\141\x64\144\x72\x65\163\163\x2c\x20\165\163\145\x72\156\141\x6d\145\x2c\40\164\x79\x70\145\x2c\x20\163\164\x61\164\x75\x73\x2c\40\143\162\145\x61\164\x65\x64\x5f\x74\x69\155\x65\163\x74\141\x6d\160\x20\x46\x52\x4f\x4d\40" . $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE . "\40\x6f\x72\x64\x65\x72\x20\142\171\x20\x69\144\x20\144\x65\x73\x63\x20\x6c\151\x6d\x69\x74\x20\x35\60\x30\x30");
        goto k2;
        Ol:
        $XL = get_option("\x6d\x6f\x5f\x77\160\156\163\137\141\x64\x76\141\156\143\145\144\137\163\145\141\x72\143\x68\137\165\163\x65\162\x6e\141\155\145");
        $kj = get_option("\155\157\x5f\x77\160\x6e\163\x5f\x61\144\x76\141\156\143\145\144\137\x73\x65\x61\162\x63\150\x5f\x69\160");
        $u9 = get_option("\155\x6f\137\x77\x70\x6e\x73\x5f\141\144\166\x61\x6e\x63\x65\144\x5f\x73\x65\x61\162\143\x68\x5f\163\164\141\164\x75\x73");
        $zG = get_option("\x6d\157\x5f\x77\x70\156\163\137\x61\x64\x76\141\156\x63\x65\x64\137\163\145\x61\162\x63\x68\x5f\141\143\164\151\157\156");
        $NM = get_option("\x6d\x6f\137\x77\160\156\x73\137\x61\144\x76\x61\x6e\x63\145\144\x5f\x73\x65\x61\x72\143\150\x5f\146\162\x6f\x6d\x5f\x64\x61\x74\x65");
        $Ac = get_option("\x6d\x6f\137\167\160\156\163\x5f\141\x64\x76\x61\x6e\143\145\x64\137\x73\145\x61\162\143\x68\x5f\x74\x6f\x5f\144\141\x74\x65");
        $LH = "\x20\167\150\x65\x72\x65\x20";
        $fk = false;
        if (!$XL) {
            goto CK;
        }
        $LH .= "\x20\165\x73\145\x72\x6e\141\155\x65\x20\114\x49\x4b\x45\x20\x27" . $XL . "\x25\x27";
        $fk = true;
        CK:
        if (!$kj) {
            goto ir;
        }
        if ($fk) {
            goto Sx;
        }
        $LH .= "\x20\151\x70\x5f\141\144\x64\162\145\163\163\40\75\x20\x27" . $kj . "\x27";
        $fk = true;
        goto q6;
        Sx:
        $LH .= "\40\101\x4e\x44\x20\x69\x70\137\x61\x64\144\162\x65\163\163\x20\x3d\40\x27" . $kj . "\47";
        q6:
        ir:
        if (!($u9 && $u9 != "\144\145\146\141\x75\154\x74")) {
            goto aN;
        }
        if ($fk) {
            goto Lg;
        }
        if ($u9 == "\146\x61\151\x6c\145\144") {
            goto As1;
        }
        $LH .= "\40\x73\164\141\x74\x75\x73\x20\x3d\x20\47" . $u9 . "\47";
        goto eZ;
        As1:
        $LH .= "\x20\x73\x74\141\x74\x75\163\40\41\x3d\40\x27\x73\165\x63\x63\x65\x73\x73\x27";
        eZ:
        $fk = true;
        goto nk;
        Lg:
        if ($u9 == "\x66\141\151\154\x65\144") {
            goto b4;
        }
        $LH .= "\40\101\116\x44\x20\163\x74\141\x74\x75\x73\x20\75\40\47" . $u9 . "\47";
        goto VO;
        b4:
        $LH .= "\40\101\x4e\104\40\163\164\x61\x74\x75\x73\40\x21\x3d\40\47\163\x75\x63\143\x65\163\163\47";
        VO:
        nk:
        aN:
        if (!$zG) {
            goto cz;
        }
        if ($fk) {
            goto TG;
        }
        $LH .= "\40\164\171\x70\145\x20\x3d\x20\x27" . $zG . "\x27";
        $fk = true;
        goto wI;
        TG:
        $LH .= "\x20\x41\x4e\104\40\x74\171\160\x65\x20\x3d\40\47" . $zG . "\47";
        wI:
        cz:
        $BW = false;
        if ($NM && $Ac && $NM != $Ac) {
            goto cV;
        }
        if (!($NM || $Ac)) {
            goto CG;
        }
        $zk = $NM ? $NM : $Ac;
        $zk = DateTime::createFromFormat("\x59\55\x6d\x2d\x64", $zk);
        $Q0 = $zk->getTimestamp();
        $Nz = strtotime("\x6d\151\x64\156\x69\147\x68\164", $Q0);
        $jO = strtotime("\164\x6f\155\x6f\162\x72\157\167", $Nz) - 1;
        $LH .= "\x20\x41\116\104\x20\x63\x72\x65\x61\164\145\x64\137\164\x69\155\145\x73\164\141\155\x70\40\x3e\75\40" . $Nz . "\x20\x41\116\104\x20\143\x72\x65\141\x74\x65\144\137\x74\x69\x6d\145\163\164\141\155\x70\40\x3c\75\40" . $jO;
        CG:
        goto xc;
        cV:
        $NM = DateTime::createFromFormat("\131\x2d\x6d\x2d\x64", $NM);
        $Ac = DateTime::createFromFormat("\x59\x2d\x6d\x2d\144", $Ac);
        if ($NM->getTimestamp() > $Ac->getTimestamp()) {
            goto iD;
        }
        $LH .= "\40\101\x4e\x44\40\143\x72\x65\141\x74\x65\144\x5f\164\x69\x6d\145\163\164\141\x6d\160\40\76\75\40" . $NM->getTimestamp() . "\x20\x41\116\x44\40\143\x72\x65\141\164\145\144\137\x74\x69\x6d\x65\x73\164\141\155\x70\x20\74\x3d\40" . $Ac->getTimestamp();
        goto VC;
        iD:
        update_option("\155\x6f\137\x77\x70\x6e\163\x5f\x6d\145\x73\163\x61\147\145", "\x49\156\x76\x61\154\x69\144\40\163\145\x6c\145\143\164\151\x6f\156\x20\144\141\164\x65\40\x69\x6e\x74\145\x72\166\141\x6c");
        $BW = true;
        VC:
        xc:
        if ($BW) {
            goto ix;
        }
        $Ic = $wpdb->get_results("\123\105\x4c\x45\x43\x54\x20\151\160\137\x61\x64\144\162\x65\x73\x73\x2c\x20\165\163\145\x72\x6e\x61\x6d\145\x2c\40\164\171\x70\x65\54\x20\x73\164\x61\x74\x75\163\54\40\143\162\145\141\x74\145\x64\x5f\x74\x69\155\x65\163\164\x61\x6d\160\x20\106\122\x4f\115\x20" . $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE . $LH);
        goto N3;
        ix:
        add_action("\x61\x64\x6d\x69\156\137\156\x6f\x74\151\143\145\x73", array($this, "\145\162\x72\x6f\162\137\x6d\x65\163\163\x61\x67\145"));
        $this->error_message();
        $Ic = $wpdb->get_results("\x53\x45\x4c\x45\103\x54\40\x69\x70\x5f\x61\144\144\x72\145\x73\163\x2c\40\165\163\x65\162\x6e\141\x6d\145\x2c\x20\164\171\160\x65\x2c\x20\x73\164\141\x74\165\x73\x2c\40\x63\162\145\141\164\145\x64\137\x74\151\155\145\163\x74\x61\x6d\160\x20\106\122\117\115\x20" . $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE . "\40\x6f\x72\144\x65\162\x20\142\171\40\x69\x64\x20\x64\145\x73\x63\40\x6c\x69\155\151\164\x20\x35\60\x30\x30");
        N3:
        k2:
        return $Ic;
    }
    function error_message()
    {
        $Ue = "\x65\x72\x72\x6f\x72";
        $Eu = get_option("\155\x6f\137\x77\x70\x6e\x73\x5f\155\145\163\x73\x61\147\145");
        echo "\x3c\x64\x69\166\x20\143\154\x61\163\163\75\47" . $Ue . "\x27\x3e\x3c\x70\x3e" . $Eu . "\74\x2f\160\x3e\x3c\57\x64\x69\x76\x3e";
    }
    function move_failed_transactions_to_past_failed($fp)
    {
        global $wpdb;
        $wpdb->query("\x55\x50\104\x41\x54\x45\40" . $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE . "\40\123\x45\x54\x20\x73\164\x61\x74\165\163\75\x27" . Mo_LLA_Constants::PAST_FAILED . "\x27\12\x9\x9\x9\127\x48\x45\122\105\40\151\160\x5f\141\x64\x64\162\145\163\x73\40\x3d\40\47" . $fp . "\x27\40\101\116\104\x20\163\x74\x61\x74\x75\x73\x3d\47" . Mo_LLA_Constants::FAILED . "\x27");
    }
    function remove_failed_transactions($fp)
    {
        global $wpdb;
        $wpdb->query("\104\x45\x4c\105\124\x45\x20\106\122\x4f\115\40" . $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE . "\40\12\x9\x9\11\127\110\x45\x52\x45\40\x69\x70\x5f\x61\144\144\x72\x65\163\163\40\75\x20\x27" . $fp . "\x27\40\101\x4e\104\40\x73\164\x61\164\165\163\x3d\47" . Mo_LLA_Constants::FAILED . "\47");
    }
    function delete_last_transaction($fp, $XL, $UF, $u9)
    {
        global $wpdb;
        $wpdb->query("\x44\105\114\105\124\105\x20\x46\x52\x4f\115\x20" . $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE . "\40\xa\x9\11\11\127\x48\x45\122\105\40\151\x70\137\x61\144\x64\x72\x65\163\163\x20\75\x20\47" . $fp . "\47\x20\101\116\104\x20\163\164\x61\x74\165\x73\x3d\x27" . $u9 . "\47\40\101\116\x44\x20\x75\163\x65\162\x6e\x61\x6d\145\x3d\47" . $XL . "\47\x20\101\x4e\104\40\x74\171\160\145\x3d\47" . $UF . "\47\40\x6f\x72\x64\x65\162\40\142\x79\40\x63\162\x65\x61\164\x65\x64\137\164\x69\x6d\x65\x73\x74\x61\x6d\x70\40\144\x65\x73\143\x20\x6c\151\x6d\151\164\x20\x31");
    }
    function get_failed_attempts_count($fp)
    {
        global $wpdb;
        $kM = $wpdb->get_var("\123\105\x4c\105\x43\x54\x20\103\x4f\x55\116\x54\x28\52\51\x20\x46\122\117\x4d\40" . $wpdb->prefix . Mo_LLA_Constants::USER_TRANSCATIONS_TABLE . "\40\167\150\x65\x72\145\x20\151\160\137\141\144\x64\x72\145\x73\x73\x20\75\x20\x27" . $fp . "\x27\12\x9\11\x41\116\x44\x20\x73\x74\141\164\165\x73\x20\x3d\x20\47" . Mo_LLA_Constants::FAILED . "\47");
        if (!$kM) {
            goto p2;
        }
        $kM = intval($kM);
        return $kM;
        p2:
        return 0;
    }
    function sendIpBlockedNotification($fp, $PI)
    {
    }
    function sendNotificationToUserForUnusualActivities($XL, $fp, $PI)
    {
    }
}
?>
