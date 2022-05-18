<?php


include_once dirname(__FILE__) . "\57\x55\x74\x69\154\x69\x74\151\145\163\56\160\x68\160";
include_once dirname(__FILE__) . "\x2f\122\145\x73\x70\157\x6e\163\145\x2e\x70\150\160";
include_once dirname(__FILE__) . "\x2f\114\157\147\157\x75\x74\122\x65\x71\x75\x65\163\164\x2e\160\150\x70";
require_once dirname(__FILE__) . "\x2f\151\156\143\x6c\165\x64\x65\163\57\x6c\151\x62\57\145\x6e\x63\162\171\160\x74\151\157\x6e\56\160\x68\160";
include_once "\x78\155\154\x73\x65\x63\x6c\x69\142\163\x2e\160\150\160";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
class Mo_SAML_Login_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct("\123\x61\155\154\137\114\157\147\151\156\x5f\x57\x69\144\147\x65\x74", "\114\x6f\x67\151\x6e", array("\x64\145\163\143\x72\151\160\164\x69\157\x6e" => __("\124\x68\151\163\40\x69\163\x20\x61\40\x6d\151\156\x69\x4f\x72\x61\156\x67\x65\40\123\x41\x4d\x4c\x20\x6c\x6f\x67\151\x6e\x20\167\x69\x64\147\145\164\56", "\155\157\x73\141\x6d\154")));
    }
    public function widget($Mr, $px)
    {
        extract($Mr);
        $YS = apply_filters("\167\151\x64\147\x65\x74\x5f\164\x69\164\x6c\x65", $px["\x77\x69\144\137\x74\151\x74\x6c\x65"]);
        echo $Mr["\142\x65\146\157\x72\x65\137\167\151\144\x67\145\164"];
        if (empty($YS)) {
            goto Ni;
        }
        echo $Mr["\142\x65\146\x6f\162\145\x5f\x74\151\164\x6c\145"] . $YS . $Mr["\x61\146\164\145\x72\137\164\151\x74\154\145"];
        Ni:
        $this->loginForm();
        echo $Mr["\141\x66\x74\145\162\x5f\167\151\x64\147\145\x74"];
    }
    public function update($dQ, $ZR)
    {
        $px = array();
        $px["\x77\x69\144\137\164\151\164\x6c\145"] = strip_tags($dQ["\167\x69\144\137\x74\151\x74\x6c\x65"]);
        return $px;
    }
    public function form($px)
    {
        $YS = '';
        if (!array_key_exists("\167\x69\144\137\x74\151\x74\x6c\145", $px)) {
            goto YA;
        }
        $YS = $px["\167\x69\x64\x5f\164\151\164\154\145"];
        YA:
        echo "\xd\12\11\x9\74\x70\x3e\x3c\x6c\x61\x62\x65\154\40\146\157\162\x3d\42" . $this->get_field_id("\x77\151\144\x5f\164\x69\x74\x6c\145") . "\x20\x22\x3e" . _e("\124\151\164\x6c\x65\x3a") . "\40\x3c\x2f\x6c\x61\142\145\154\x3e\15\12\x9\x9\x3c\x69\156\160\x75\164\x20\143\154\141\163\x73\x3d\42\167\151\144\145\146\x61\164\42\40\151\x64\75\42" . $this->get_field_id("\x77\x69\144\137\164\x69\x74\154\x65") . "\x22\x20\x6e\141\x6d\x65\x3d\x22" . $this->get_field_name("\x77\151\144\x5f\164\151\x74\154\145") . "\42\40\x74\171\160\145\x3d\42\x74\x65\x78\x74\x22\40\x76\x61\x6c\165\145\75\x22" . $YS . "\x22\40\x2f\x3e\15\xa\11\x9\x3c\57\160\x3e";
    }
    public function loginForm()
    {
        global $post;
        if (!is_user_logged_in()) {
            goto bt;
        }
        $current_user = wp_get_current_user();
        $ns = get_option("\x73\141\155\154\x5f\151\144\145\x6e\x74\151\164\x79\137\x70\x72\157\166\151\x64\x65\162\163");
        $ns = maybe_unserialize($ns);
        $ec = get_user_meta($current_user->ID, "\x6d\157\x5f\x73\x61\155\x6c\137\154\x6f\147\147\145\144\x5f\151\x6e\137\167\x69\x74\150\137\151\144\160", true);
        if (!empty($ec)) {
            goto kV;
        }
        $kA = "\x44\x45\x46\x41\x55\114\x54";
        goto Jd;
        kV:
        $kA = $ns[$ec];
        Jd:
        $nu = "\110\145\x6c\154\157\54";
        if (empty($kA["\x63\165\163\x74\x6f\155\x5f\147\x72\145\x65\x74\151\156\147\137\x74\145\170\x74"])) {
            goto yX;
        }
        $nu = $kA["\x63\165\x73\164\157\155\137\147\x72\145\145\x74\151\x6e\147\x5f\164\x65\170\164"];
        yX:
        $Ie = '';
        if (empty($kA["\x67\162\145\x65\164\x69\156\147\137\x6e\141\155\x65"])) {
            goto gr;
        }
        switch ($kA["\x67\162\145\x65\x74\x69\156\147\137\x6e\141\x6d\x65"]) {
            case "\x55\x53\105\122\116\101\x4d\x45":
                $Ie = $current_user->user_login;
                goto N1;
            case "\x45\x4d\101\x49\114":
                $Ie = $current_user->user_email;
                goto N1;
            case "\106\x4e\x41\115\105":
                $Ie = $current_user->user_firstname;
                goto N1;
            case "\x4c\116\101\x4d\x45":
                $Ie = $current_user->user_lastname;
                goto N1;
            case "\106\x4e\101\x4d\105\137\x4c\116\101\x4d\x45":
                $Ie = $current_user->user_firstname . "\x20" . $current_user->user_lastname;
                goto N1;
            case "\x4c\x4e\x41\x4d\105\x5f\x46\116\x41\x4d\105":
                $Ie = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto N1;
            default:
                $Ie = $current_user->user_login;
        }
        rF:
        N1:
        gr:
        if (!empty(trim($Ie))) {
            goto Eu;
        }
        $Ie = $current_user->user_login;
        Eu:
        $f1 = $nu . "\40" . $Ie;
        $Wu = "\x4c\157\147\157\x75\x74";
        if (empty($kA["\143\165\163\x74\157\x6d\x5f\x6c\x6f\147\x6f\x75\164\x5f\164\x65\170\x74"])) {
            goto Nj;
        }
        $Wu = $kA["\143\165\x73\164\x6f\155\x5f\154\157\x67\x6f\165\x74\137\164\145\170\164"];
        Nj:
        echo $f1 . "\x20\174\40\74\141\x20\x68\162\145\146\x3d\x22" . wp_logout_url(home_url()) . "\x22\40\x74\x69\164\x6c\x65\x3d\42\154\x6f\147\x6f\x75\164\42\x20\76" . $Wu . "\x3c\x2f\x61\76\74\57\154\x69\x3e";
        $Vm = saml_get_current_page_url();
        update_option("\154\157\x67\157\x75\164\x5f\x72\145\x64\151\x72\x65\143\164\x5f\x75\162\154", $Vm);
        goto FA;
        bt:
        $tm = saml_get_current_page_url();
        $eB = maybe_unserialize(get_option("\x73\141\155\x6c\137\151\144\145\x6e\x74\x69\x74\x79\137\160\162\x6f\x76\x69\144\x65\162\x73"));
        if (!empty($eB)) {
            goto j5;
        }
        echo "\x50\x6c\x65\141\163\x65\x20\143\157\156\x66\151\147\x75\162\x65\40\164\x68\145\40\155\151\156\151\117\162\x61\156\x67\x65\40\123\x41\x4d\114\x20\x50\154\165\147\151\x6e\x20\x66\x69\x72\163\x74\56";
        goto Yc;
        j5:
        foreach ($eB as $ec) {
            if (!(isset($ec["\x65\x6e\141\x62\x6c\145\x5f\x69\x64\160"]) && $ec["\145\156\141\x62\154\145\x5f\x69\x64\x70"] == false)) {
                goto l8;
            }
            goto Zj;
            l8:
            if (!empty($ec["\x69\x64\x70\137\156\141\155\145"])) {
                goto Vu;
            }
            echo "\x50\x6c\145\x61\163\145\40\143\157\x6e\x66\151\x67\x75\x72\x65\40\164\150\x65\x20\155\x69\x6e\x69\117\162\141\x6e\147\145\40\x53\x41\115\x4c\40\120\x6c\x75\147\151\156\x20\146\151\162\x73\x74\x2e";
            goto l2;
            Vu:
            $oe = "\x6c\157\x67\x69\x6e\137" . $ec["\151\x64\160\x5f\156\141\x6d\x65"];
            $C5 = "\155\x6f\x73\x75\x62\x6d\x69\164\x73\141\155\x6c\146\157\x72\x6d\x5f" . $ec["\151\144\160\x5f\x6e\x61\x6d\x65"];
            echo "\x3c\x73\143\x72\151\160\x74\76\xd\xa\x20\40\40\x20\11\11\11\x9\11\152\x51\165\145\162\x79\50\x20\x64\157\x63\x75\x6d\145\x6e\x74\40\x29\x2e\x72\145\x61\x64\x79\x28\x66\165\x6e\143\164\x69\157\156\x28\51\x20\173\15\12\11\x9\11\x9\11\11\x20\x20\40\40\x6a\x51\165\x65\x72\x79\50\x22\43" . $C5 . "\x22\x29\x2e\143\154\151\143\x6b\x28\146\x75\156\143\164\151\157\x6e\x28\x65\x29\x20\x7b\15\12\x9\x9\11\x9\11\x20\x20\40\40\x9\11\x65\x2e\x70\162\145\166\x65\x6e\164\104\x65\x66\141\x75\154\164\50\x29\73\xd\xa\11\11\x9\11\40\x20\40\x20\x9\11\11\x6a\x51\165\x65\162\x79\x28\x22\43" . $oe . "\42\51\56\x73\x75\142\155\x69\x74\50\x29\x3b\15\xa\x9\11\11\x20\x20\x20\x20\11\11\x9\x7d\x29\73\xd\12\11\11\x20\x20\x20\x20\x9\11\11\x7d\51\x3b\15\12\x9\x20\40\40\40\11\11\x9\x9\74\57\163\143\162\x69\x70\164\x3e\xd\12\40\x20\40\x20\11\11\x9\11\x9\74\146\157\162\155\40\x6e\141\155\x65\x3d\x22" . $oe . "\42\40\151\x64\x3d\42" . $oe . "\x22\40\155\x65\x74\x68\157\144\75\x22\x70\157\163\x74\x22\40\x61\x63\164\151\x6f\156\x3d\42\x22\76\15\12\40\x20\40\40\x20\x20\x20\x20\40\x20\40\40\x20\40\40\x20\40\x20\40\40\40\40\40\40\x20\x20\40\x20\x20\x20\40\40\x3c\x69\156\160\165\164\40\x74\171\x70\x65\75\x22\150\x69\144\x64\x65\x6e\x22\x20\x6e\141\x6d\145\x3d\x22\157\x70\x74\151\157\156\42\40\x76\141\x6c\165\x65\75\42\163\141\155\154\137\165\x73\x65\162\137\154\157\x67\x69\156\42\x20\57\76\15\xa\11\11\11\x9\x9\11\40\x20\x20\40\11\74\151\156\160\x75\x74\40\x74\x79\160\145\x3d\x22\150\151\144\144\145\x6e\42\40\156\x61\155\x65\x3d\x22\162\x65\x64\151\x72\x65\143\x74\x5f\x74\x6f\x22\x20\166\x61\154\x75\x65\75\x22" . $tm . "\x22\x20\x2f\76\15\12\x9\11\x9\11\x9\x20\40\x20\x20\11\11\74\x69\156\160\165\x74\x20\x74\171\x70\145\x3d\x22\x68\x69\144\x64\145\156\42\40\156\141\155\145\x3d\x22\x69\144\160\42\x20\x76\x61\154\165\145\x3d\x22" . $ec["\151\144\x70\137\156\x61\x6d\145"] . "\x22\40\57\76\xd\12\11\11\x9\x9\x20\40\40\x20\x9\x9\x9\74\x66\x6f\x6e\164\40\x73\151\172\145\x3d\42\53\x31\x22\x20\x73\164\x79\x6c\x65\x3d\42\166\x65\162\164\151\x63\x61\x6c\x2d\141\x6c\x69\147\156\x3a\x74\x6f\x70\x3b\x22\x3e\40\x3c\x2f\x66\157\156\x74\76";
            $kX = !empty($ec["\143\165\x73\x74\x6f\155\137\154\157\x67\x69\156\137\164\145\170\x74"]) ? $ec["\x63\x75\163\164\157\155\137\x6c\157\147\151\156\137\x74\x65\x78\164"] : "\x4c\x6f\147\x69\156\x20\x77\151\164\150\40" . $ec["\151\x64\160\x5f\x6e\x61\155\145"];
            echo "\x3c\141\x20\150\x72\x65\x66\x3d\42\x23\42\40\x69\x64\x3d\42" . $C5 . "\42\76" . $kX . "\74\57\x61\x3e\74\x2f\146\x6f\x72\x6d\76";
            l2:
            Zj:
        }
        bf:
        Yc:
        FA:
    }
    public function mo_saml_check_empty_or_null_val($bc)
    {
        if (!(!isset($bc) || empty($bc))) {
            goto rP;
        }
        return true;
        rP:
        return false;
    }
    function mo_saml_logout($tm, $Jc, $user)
    {
        $current_user = $user;
        if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
            goto Yb;
        }
        session_start();
        Yb:
        $Oj = array();
        $tj = isset($_SESSION["\155\x6f\x5f\163\x61\x6d\154"]["\154\157\147\147\145\x64\x5f\151\x6e\137\x77\x69\164\x68\x5f\x69\x64\x70"]) ? $_SESSION["\155\157\x5f\163\x61\x6d\154"]["\154\157\x67\x67\145\144\137\x69\156\x5f\167\x69\164\x68\137\151\144\x70"] : '';
        $tj = get_user_meta($current_user->ID, "\155\157\x5f\163\x61\155\x6c\137\x6c\157\147\x67\145\144\x5f\x69\156\137\x77\151\164\x68\x5f\x69\x64\x70", true);
        $qh = wp_get_referer();
        if (!empty($qh)) {
            goto vL;
        }
        $qh = !empty(get_option("\x6d\157\137\x73\141\x6d\154\x5f\163\x70\137\142\141\163\145\137\x75\162\154")) ? get_option("\155\157\137\x73\141\x6d\154\137\x73\x70\x5f\142\x61\163\145\x5f\x75\162\x6c") : home_url();
        vL:
        $ns = get_option("\x73\x61\x6d\154\137\x69\144\145\156\164\151\x74\x79\137\160\162\x6f\166\151\144\145\x72\163");
        if (!@unserialize($ns)) {
            goto qw;
        }
        $ns = unserialize($ns);
        qw:
        if (!array_key_exists($tj, $ns)) {
            goto dh;
        }
        $Oj = $ns[$tj];
        dh:
        if (!empty($Oj)) {
            goto nf;
        }
        wp_redirect($qh);
        die;
        goto Zt;
        nf:
        $nq = $Oj["\x73\154\x6f\137\165\162\154"];
        $Zy = $Oj["\163\154\157\137\x62\x69\x6e\144\x69\x6e\x67\x5f\x74\x79\160\x65"];
        $nS = $Oj["\x72\x65\161\165\145\x73\x74\x5f\163\151\147\x6e\x65\144"];
        if (!empty($nq)) {
            goto NN;
        }
        wp_redirect($qh);
        die;
        goto Zm;
        NN:
        if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
            goto PD;
        }
        session_start();
        PD:
        if (isset($_SESSION["\155\157\137\163\141\x6d\154\x5f\x6c\157\147\x6f\x75\x74\x5f\162\145\161\x75\x65\163\164"])) {
            goto VU;
        }
        if (isset($_SESSION["\155\157\x5f\x73\141\x6d\x6c"]["\x6c\157\x67\147\145\x64\x5f\x69\156\137\167\x69\164\x68\x5f\151\144\x70"])) {
            goto g2;
        }
        goto FZ;
        VU:
        self::createLogoutResponseAndRedirect($nq, $Zy, $Oj);
        die;
        goto FZ;
        g2:
        unset($_SESSION["\155\157\x5f\163\x61\x6d\x6c"]);
        $KB = get_user_meta($current_user->ID, "\155\157\x5f\163\x61\x6d\154\x5f\156\x61\155\145\137\151\144");
        $oz = get_user_meta($current_user->ID, "\155\x6f\x5f\x73\x61\155\154\x5f\163\x65\x73\163\151\x6f\156\137\151\156\x64\145\x78");
        $ag = get_option("\x6d\157\x5f\163\141\155\x6c\137\163\x70\x5f\x62\141\x73\x65\137\x75\162\154");
        if (!empty($ag)) {
            goto wn;
        }
        $ag = network_home_url();
        wn:
        if (!(substr($ag, -1) == "\x2f")) {
            goto Cm;
        }
        $ag = substr($ag, 0, -1);
        Cm:
        $jj = get_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x73\160\x5f\x65\x6e\x74\x69\x74\171\x5f\x69\144");
        if (!empty($jj)) {
            goto Os;
        }
        $jj = $ag . "\57\x77\160\x2d\x63\x6f\156\164\145\x6e\x74\57\x70\x6c\x75\147\x69\x6e\x73\57\155\151\x6e\151\157\162\x61\x6e\147\x65\55\x73\141\155\x6c\55\x32\60\x2d\x73\151\x6e\x67\x6c\145\x2d\x73\x69\147\156\x2d\x6f\x6e\x2f";
        Os:
        $jj = isset($Oj["\x73\141\155\x6c\137\163\160\x5f\x65\x6e\164\x69\164\171\x5f\x69\144"]) ? $Oj["\x73\141\155\154\137\x73\160\137\x65\156\x74\151\x74\x79\137\x69\144"] : $jj;
        $nc = $nq;
        $c4 = $qh;
        $c4 = parse_url($c4, PHP_URL_PATH);
        $c4 = empty($c4) ? "\57" : $c4;
        $vQ = Utilities::createLogoutRequest($KB, $oz, $jj, $nc, $Zy);
        if (empty($Zy) || $Zy == "\x48\x74\164\x70\x52\x65\x64\151\x72\x65\x63\164") {
            goto Wq;
        }
        if (!($nS == "\165\x6e\x63\x68\145\143\153\x65\x64")) {
            goto VB;
        }
        $RQ = base64_encode($vQ);
        Utilities::postSAMLRequest($nq, $RQ, $c4);
        die;
        VB:
        $RQ = Utilities::signXML($vQ, "\116\141\155\145\x49\104", $Oj);
        Utilities::postSAMLRequest($nq, $RQ, $Oj, $c4);
        goto s_;
        Wq:
        $Ni = $nq;
        if (strpos($nq, "\x3f") !== false) {
            goto qi;
        }
        $Ni .= "\x3f";
        goto Ja;
        qi:
        $Ni .= "\46";
        Ja:
        if (!($nS == "\x75\156\143\x68\x65\143\153\x65\x64")) {
            goto QR;
        }
        $Ni .= "\x53\101\115\114\x52\x65\161\x75\x65\163\164\x3d" . $vQ . "\x26\x52\x65\154\141\x79\123\x74\141\x74\145\75" . urlencode($c4);
        header("\114\157\x63\x61\x74\x69\157\x6e\72\x20" . $Ni);
        die;
        QR:
        $vQ = "\123\101\115\114\122\x65\x71\165\145\163\x74\75" . $vQ . "\46\x52\x65\154\141\x79\x53\164\141\x74\x65\x3d" . urlencode($c4) . "\x26\x53\x69\x67\101\x6c\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Me = array("\164\x79\x70\145" => "\160\162\x69\x76\141\x74\145");
        $nA = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Me);
        $jW = mo_saml_get_sp_private_key_for_idp($Oj);
        $nA->loadKey($jW, FALSE);
        $We = new XMLSecurityDSig();
        $mv = $nA->signData($vQ);
        $mv = base64_encode($mv);
        $Ni .= $vQ . "\46\123\151\147\x6e\141\164\165\x72\x65\75" . urlencode($mv);
        header("\114\x6f\x63\141\x74\x69\157\156\72\x20" . $Ni);
        die;
        s_:
        FZ:
        Zm:
        Zt:
    }
    function createLogoutResponseAndRedirect($nq, $Zy, $Oj)
    {
        $ag = get_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\x73\160\137\142\x61\x73\x65\137\x75\x72\x6c");
        if (!empty($ag)) {
            goto KE;
        }
        $ag = home_url();
        KE:
        $Wt = $_SESSION["\155\x6f\x5f\x73\x61\155\x6c\x5f\x6c\157\147\x6f\165\x74\137\x72\145\161\x75\145\163\x74"];
        $ap = $_SESSION["\155\x6f\137\163\x61\x6d\154\137\154\157\x67\x6f\x75\x74\137\x72\x65\154\141\171\137\163\x74\x61\x74\x65"];
        $nS = $Oj["\x72\145\x71\165\145\x73\164\x5f\163\x69\x67\156\145\x64"];
        if (!empty($hZ)) {
            goto jY;
        }
        wp_redirect($ag);
        goto OQ;
        jY:
        if (filter_var($hZ, FILTER_VALIDATE_URL)) {
            goto EL;
        }
        if (parse_url(home_url(), PHP_URL_HOST) === parse_url($hZ, PHP_URL_HOST)) {
            goto cP;
        }
        wp_redirect($ag);
        goto yT;
        cP:
        wp_redirect($hZ);
        yT:
        goto OV;
        EL:
        wp_redirect($hZ);
        OV:
        OQ:
        unset($_SESSION["\155\157\x5f\x73\141\x6d\x6c\137\154\x6f\147\x6f\165\x74\x5f\162\145\161\x75\145\163\164"]);
        unset($_SESSION["\x6d\157\137\x73\x61\155\154\137\x6c\x6f\x67\157\x75\x74\137\162\145\x6c\x61\171\x5f\x73\164\141\164\x65"]);
        $YQ = new DOMDocument();
        $YQ->loadXML($Wt);
        $Wt = $YQ->firstChild;
        if (!($Wt->localName == "\x4c\157\147\157\x75\x74\x52\x65\x71\x75\x65\x73\x74")) {
            goto WH;
        }
        $cp = new SAML2_LogoutRequest($Wt);
        $fN = get_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\x73\160\137\145\156\x74\151\x74\x79\137\x69\144");
        if (!empty($fN)) {
            goto HU;
        }
        $fN = $ag . "\x2f\x77\160\55\143\x6f\156\164\x65\x6e\164\57\x70\x6c\165\x67\151\156\163\x2f\155\x69\x6e\x69\157\162\141\x6e\147\x65\x2d\163\141\155\154\x2d\62\60\55\x73\x69\x6e\x67\x6c\x65\x2d\163\x69\x67\x6e\x2d\157\x6e\x2f";
        HU:
        $fN = isset($Oj["\163\x61\x6d\x6c\137\163\x70\x5f\x65\x6e\x74\151\x74\x79\137\151\144"]) ? $Oj["\x73\x61\x6d\154\x5f\163\x70\137\145\156\x74\151\x74\x79\x5f\x69\144"] : $fN;
        $nc = $nq;
        $IT = Utilities::createLogoutResponse($cp->getId(), $fN, $nc, $Zy);
        if (empty($Zy) || $Zy == "\x48\164\x74\x70\122\145\x64\151\162\x65\143\164") {
            goto Cj;
        }
        if (!($nS == "\165\x6e\x63\150\145\x63\x6b\145\x64")) {
            goto x0;
        }
        $RQ = base64_encode($IT);
        Utilities::postSAMLResponse($nq, $RQ, $ap);
        die;
        x0:
        $RQ = Utilities::signXML($IT, "\123\x74\x61\x74\x75\x73", $Oj);
        Utilities::postSAMLResponse($nq, $RQ, $ap);
        goto bh;
        Cj:
        $Ni = $nq;
        if (strpos($nq, "\77") !== false) {
            goto xd;
        }
        $Ni .= "\77";
        goto iX;
        xd:
        $Ni .= "\x26";
        iX:
        if (!($nS == "\x75\156\x63\150\x65\x63\153\x65\x64")) {
            goto aB;
        }
        $Ni .= "\x53\x41\x4d\x4c\122\x65\x73\160\157\x6e\163\145\75" . $IT . "\x26\122\x65\x6c\141\x79\123\x74\141\164\145\75" . urlencode($ap);
        header("\x4c\157\143\141\164\x69\x6f\156\72\40" . $Ni);
        die;
        aB:
        $Ni .= "\123\x41\x4d\x4c\x52\145\x73\x70\157\x6e\x73\x65\x3d" . $IT . "\x26\122\x65\154\x61\171\x53\x74\x61\x74\145\75" . urlencode($ap);
        header("\x4c\x6f\143\x61\164\x69\x6f\x6e\x3a\40" . $Ni);
        die;
        bh:
        WH:
    }
}
function plugin_settings_script_widget()
{
    wp_enqueue_script("\x6a\161\x75\145\x72\171");
    wp_enqueue_script("\155\157\137\x73\x61\x6d\154\x5f\141\144\155\151\x6e\137\163\145\164\164\x69\x6e\147\163\137\163\143\162\151\160\164\137\x77\x69\144\147\145\164", plugins_url("\x69\156\x63\x6c\x75\x64\145\163\x2f\152\x73\x2f\x73\145\164\x74\151\x6e\x67\163\56\152\163", __FILE__));
}
function plugin_settings_style_widget()
{
    wp_enqueue_style("\x6d\157\137\163\141\155\x6c\137\x61\x64\x6d\x69\x6e\137\x73\x65\164\x74\151\x6e\147\x73\x5f\x73\164\171\154\x65", plugins_url("\151\x6e\143\x6c\x75\x64\145\x73\x2f\143\x73\x73\57\x6a\161\x75\145\x72\171\56\x75\151\x2e\143\x73\x73", __FILE__));
}
function mo_login_validate()
{
    if (!(isset($_REQUEST["\x6f\x70\164\151\157\156"]) && $_REQUEST["\x6f\x70\164\151\x6f\156"] == "\x6d\x6f\163\x61\x6d\x6c\x5f\155\145\x74\x61\x64\141\x74\141")) {
        goto jQ;
    }
    miniorange_generate_metadata();
    jQ:
    if (!(isset($_REQUEST["\157\160\x74\x69\x6f\156"]) && $_REQUEST["\157\160\x74\151\x6f\156"] == "\x65\x78\160\x6f\x72\x74\137\x63\157\156\x66\151\147\165\162\141\x74\x69\x6f\156" and check_admin_referer("\x65\x78\x70\x6f\x72\164\137\x43\x6f\156\146\151\147\165\162\141\164\151\x6f\156"))) {
        goto AY;
    }
    if (!current_user_can("\x6d\x61\x6e\141\147\145\x5f\157\x70\x74\x69\x6f\156\x73")) {
        goto dB;
    }
    miniorange_import_export(true);
    dB:
    die;
    AY:
    $eB = get_option("\x73\141\155\154\x5f\x69\144\x65\x6e\x74\151\164\171\x5f\x70\x72\x6f\166\x69\x64\x65\x72\163");
    $eB = maybe_unserialize($eB);
    if (is_array($eB)) {
        goto Mk;
    }
    $ns = array();
    goto XH;
    Mk:
    $ns = array_change_key_case($eB, CASE_LOWER);
    XH:
    if (isset($_REQUEST["\151\x64\160"])) {
        goto VX;
    }
    if (!empty(get_option("\x73\x61\x6d\x6c\137\144\x65\x66\x61\165\x6c\x74\137\151\x64\x70"))) {
        goto m3;
    }
    goto bV;
    VX:
    $l2 = strtolower($_REQUEST["\x69\x64\x70"]);
    goto bV;
    m3:
    $l2 = strtolower(get_option("\163\x61\x6d\154\137\144\145\146\141\x75\x6c\x74\x5f\x69\144\160"));
    bV:
    if (!(!empty($eB) && (isset($_REQUEST["\x6f\160\164\151\157\156"]) && $_REQUEST["\x6f\x70\x74\x69\x6f\x6e"] == "\163\x61\x6d\x6c\137\165\163\x65\162\137\154\157\x67\x69\156" || isset($_REQUEST["\x6f\160\x74\151\157\x6e"]) && $_REQUEST["\x6f\160\x74\151\157\x6e"] == "\164\x65\x73\164\103\157\x6e\x66\x69\147") && (!empty($l2) && array_key_exists($l2, $ns) || isset($_REQUEST["\x65\156\164\x69\x74\x79\x49\x44"])))) {
        goto Ft;
    }
    if (!(is_user_logged_in() && $_REQUEST["\x6f\x70\x74\151\157\156"] != "\164\x65\x73\x74\x43\157\x6e\146\151\x67")) {
        goto cO;
    }
    return;
    cO:
    if (!mo_saml_is_sp_configured()) {
        goto KF;
    }
    $ag = get_option("\155\157\x5f\x73\141\x6d\x6c\137\163\x70\137\x62\x61\x73\145\x5f\x75\162\154");
    if (empty($l2)) {
        goto fe;
    }
    $ec = $ns[$l2];
    fe:
    if (!isset($_REQUEST["\145\x6e\x74\151\164\171\111\104"])) {
        goto B5;
    }
    $tj = getIdpNameFromEntityId($eB, $_REQUEST["\145\156\164\151\164\171\111\x44"]);
    if ($tj) {
        goto TQ;
    }
    wp_die("\x57\145\x20\143\x6f\x75\x6c\x64\x20\x6e\157\164\40\x73\x69\x67\156\x20\171\157\165\40\151\156\x2e\x20\x50\154\x65\141\163\x65\x20\x63\x6f\x6e\164\141\x63\x74\x20\171\x6f\165\162\x20\x61\x64\155\x69\156\x69\163\164\x72\141\164\x6f\162", "\x45\162\x72\x6f\162\72\40\116\x6f\x20\x73\165\x63\150\x20\111\144\145\x6e\164\151\x74\171\40\120\162\x6f\x76\151\144\x65\162\40\151\163\40\x63\157\x75\x6e\146\151\x67\x75\x72\x65\144\x20\x61\164\x20\171\x6f\x75\x72\x20\123\120");
    TQ:
    $ec = $eB[$tj];
    B5:
    if (array_key_exists("\x65\x6e\x61\x62\x6c\145\x5f\x69\x64\160", $ec)) {
        goto R5;
    }
    $ec["\x65\156\x61\142\154\x65\137\x69\144\x70"] = false;
    R5:
    if ($ec["\145\156\x61\142\154\x65\x5f\x69\x64\x70"]) {
        goto OW;
    }
    wp_die("\127\x65\40\143\157\x75\154\x64\40\156\x6f\164\x20\x73\151\147\x6e\40\x79\x6f\165\40\151\156\x2e\40\x50\x6c\145\x61\x73\x65\x20\143\157\156\164\x61\x63\164\40\171\x6f\x75\162\40\x61\144\x6d\151\156\x69\163\164\x72\141\x74\x6f\x72", "\x45\x72\162\x6f\x72\72\40\x49\104\120\x20\156\157\x74\40\x65\x6e\x61\142\154\x65\144");
    OW:
    if (!empty($ag)) {
        goto Ez;
    }
    $ag = home_url();
    Ez:
    if ($_REQUEST["\x6f\x70\x74\x69\x6f\x6e"] == "\164\x65\x73\164\103\157\156\146\x69\147" and array_key_exists("\x6e\145\x77\143\x65\x72\164", $_REQUEST)) {
        goto D5;
    }
    if ($_REQUEST["\157\x70\x74\x69\x6f\x6e"] == "\x74\x65\x73\x74\103\x6f\156\146\x69\147") {
        goto v8;
    }
    if (get_option("\x6d\x6f\137\163\x61\155\154\137\162\145\x6c\x61\x79\137\163\x74\141\x74\x65") && get_option("\155\157\x5f\x73\x61\155\154\137\162\145\x6c\141\x79\x5f\x73\x74\x61\164\x65") != '') {
        goto C1;
    }
    if (isset($_REQUEST["\x72\145\144\151\x72\x65\143\164\137\164\x6f"])) {
        goto Ko;
    }
    $c4 = saml_get_current_page_url();
    goto SJ;
    Ko:
    $c4 = $_REQUEST["\162\145\144\x69\x72\x65\x63\x74\137\164\157"];
    SJ:
    goto Im;
    C1:
    $c4 = get_option("\x6d\157\137\163\x61\x6d\x6c\x5f\x72\x65\154\141\171\x5f\163\x74\141\164\145");
    Im:
    goto kd;
    v8:
    $c4 = "\164\145\x73\164\x56\141\154\151\x64\x61\x74\x65";
    kd:
    goto KN;
    D5:
    $c4 = "\x74\x65\163\164\x4e\145\167\103\x65\x72\x74\x69\x66\151\x63\141\164\145";
    KN:
    $ZC = parse_url($c4, PHP_URL_PATH);
    $ZC = empty($ZC) ? "\57" : $ZC;
    $Fs = parse_url($c4, PHP_URL_QUERY);
    if (!empty($Fs)) {
        goto ux;
    }
    $c4 = $ZC;
    goto cu;
    ux:
    $c4 = $ZC . "\77" . $Fs;
    cu:
    $xc = $ec["\x73\x73\x6f\137\165\x72\x6c"];
    $nS = $ec["\x72\x65\x71\x75\x65\163\x74\x5f\x73\151\x67\x6e\x65\x64"];
    $eZ = $ec["\x73\x73\x6f\137\142\x69\156\144\151\x6e\147\x5f\x74\171\160\145"];
    $RP = get_option("\x6d\157\137\163\141\x6d\154\137\146\x6f\x72\143\145\137\141\x75\x74\150\x65\x6e\164\151\x63\141\x74\x69\x6f\156");
    $qs = $ag . "\57";
    $fN = get_option("\155\157\137\x73\x61\x6d\154\137\163\160\x5f\145\156\x74\x69\x74\171\137\151\144");
    $G3 = $ec["\156\x61\155\x65\x69\144\x5f\x66\x6f\x72\x6d\141\x74"];
    if (!empty($G3)) {
        goto SO;
    }
    $G3 = "\61\x2e\x31\72\x6e\141\x6d\x65\151\x64\x2d\x66\x6f\162\155\141\x74\x3a\165\x6e\x73\160\145\143\x69\x66\151\x65\x64";
    SO:
    if (!empty($fN)) {
        goto UV;
    }
    $fN = $ag . "\x2f\167\160\55\x63\x6f\x6e\164\x65\156\x74\x2f\x70\x6c\165\x67\151\156\163\57\x6d\151\156\x69\157\162\141\x6e\147\x65\55\163\141\155\x6c\x2d\62\60\55\163\151\x6e\x67\154\x65\x2d\163\151\147\156\x2d\157\156\x2f";
    UV:
    $fN = isset($ec["\163\141\155\154\x5f\163\160\137\x65\156\x74\151\164\x79\137\151\144"]) ? $ec["\x73\x61\x6d\x6c\137\x73\160\137\145\156\x74\x69\164\171\x5f\151\x64"] : $fN;
    $U5 = isset($_POST["\x75\x6e\141\155\145\137\145\x6d\x61\x69\x6c"]) ? $_POST["\165\156\x61\155\x65\x5f\x65\155\x61\x69\154"] : false;
    if (!$U5) {
        goto BR;
    }
    $Zc = email_exists($U5);
    if (!($Zc == false)) {
        goto V0;
    }
    $U5 = false;
    update_site_option("\x6d\157\x5f\x73\141\155\x6c\x5f\x73\150\x6f\162\164\143\157\x64\145\137\x6d\145\x73\163\141\147\145", "\125\x73\145\162\x20\144\157\145\x73\x20\x6e\157\x74\x20\105\x78\x69\164\163");
    return;
    V0:
    BR:
    $vQ = Utilities::createAuthnRequest($qs, $fN, $xc, $RP, $eZ, $G3, $ec);
    if (empty($eZ) || $eZ == "\x48\164\x74\160\x52\x65\144\151\162\x65\x63\164") {
        goto Z6;
    }
    if (!($nS == "\x75\x6e\143\150\x65\x63\153\x65\x64")) {
        goto fM;
    }
    $RQ = base64_encode($vQ);
    Utilities::postSAMLRequest($xc, $RQ, $c4, $U5);
    die;
    fM:
    if ($_REQUEST["\157\160\164\151\x6f\x6e"] == "\x74\x65\163\x74\x69\x64\x70\143\157\156\146\x69\147" && $_REQUEST["\x6e\145\167\143\145\x72\164"] == true) {
        goto Xn;
    }
    $RQ = Utilities::signXML($vQ, "\x4e\x61\155\x65\111\x44\120\x6f\154\151\143\171", $ec);
    goto C8;
    Xn:
    $RQ = Utilities::signXML($vQ, "\116\x61\x6d\145\111\104\x50\157\154\x69\143\171", $ec, true);
    C8:
    Utilities::postSAMLRequest($xc, $RQ, $c4, $U5);
    goto Pb;
    Z6:
    $Ni = $xc;
    if (strpos($xc, "\77") !== false) {
        goto Nz;
    }
    $Ni .= "\77";
    goto ud;
    Nz:
    $Ni .= "\x26";
    ud:
    if (!($nS == "\165\156\143\x68\145\143\x6b\145\x64")) {
        goto oq;
    }
    $Ni .= "\x53\x41\x4d\114\x52\145\x71\165\145\163\164\75" . $vQ . "\46\122\145\154\141\171\123\x74\141\164\x65\75" . urlencode($c4);
    if (!$U5) {
        goto uW;
    }
    $Ni .= "\x26\x45\155\x61\x69\154\75" . urlencode($U5);
    uW:
    header("\114\x6f\x63\141\164\151\157\x6e\x3a\x20" . $Ni);
    die;
    oq:
    $vQ = "\x53\x41\x4d\x4c\x52\x65\161\x75\x65\163\164\75" . $vQ . "\x26\x52\145\x6c\141\x79\x53\164\141\x74\x65\75" . urlencode($c4) . "\46\x53\151\x67\x41\154\147\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $Me = array("\164\x79\160\x65" => "\x70\162\x69\x76\141\x74\x65");
    $nA = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Me);
    if ($_REQUEST["\157\160\x74\x69\x6f\x6e"] == "\x74\145\163\164\151\x64\x70\x63\157\156\146\x69\147" && $_REQUEST["\156\145\x77\x63\145\x72\164"] == true) {
        goto uB;
    }
    $jW = mo_saml_get_sp_private_key_for_idp($ec);
    goto Jh;
    uB:
    $jW = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\x6f\x75\x72\x63\145\163" . DIRECTORY_SEPARATOR . "\155\151\x6e\x69\x6f\162\x61\x6e\x67\145\x5f\x73\160\x5f\154\141\164\145\163\164\x5f\x70\162\151\x76\x2e\153\145\x79");
    Jh:
    $nA->loadKey($jW, FALSE);
    $We = new XMLSecurityDSig();
    $mv = $nA->signData($vQ);
    $mv = base64_encode($mv);
    $Ni .= $vQ . "\x26\123\x69\x67\156\141\x74\x75\162\x65\x3d" . urlencode($mv);
    if (!$U5) {
        goto bc;
    }
    $Ni .= "\46\105\x6d\141\x69\154\x3d" . urlencode($U5);
    bc:
    header("\x4c\x6f\143\141\x74\151\x6f\x6e\72\40" . $Ni);
    die;
    Pb:
    KF:
    Ft:
    if (!(array_key_exists("\x53\x41\x4d\114\122\145\x73\x70\x6f\156\x73\x65", $_REQUEST) && !empty($_REQUEST["\x53\x41\x4d\114\x52\x65\163\x70\x6f\x6e\x73\x65"]))) {
        goto Qok;
    }
    $ag = get_option("\155\x6f\x5f\x73\141\155\x6c\x5f\x73\160\137\x62\141\163\x65\137\165\162\x6c");
    if (!empty($ag)) {
        goto QW;
    }
    $ag = home_url();
    QW:
    $Mi = $_REQUEST["\x53\x41\x4d\114\x52\x65\163\160\x6f\x6e\x73\145"];
    $Mi = base64_decode($Mi);
    if (!(array_key_exists("\123\x41\115\x4c\x52\x65\x73\160\157\x6e\x73\145", $_GET) && !empty($_GET["\x53\101\x4d\114\x52\145\163\160\157\x6e\x73\x65"]))) {
        goto Rl;
    }
    $Mi = gzinflate($Mi);
    Rl:
    $YQ = new DOMDocument();
    $YQ->loadXML($Mi);
    $g4 = $YQ->firstChild;
    $dK = $YQ->documentElement;
    $L9 = new DOMXpath($YQ);
    $L9->registerNamespace("\163\x61\x6d\x6c\160", "\x75\x72\x6e\x3a\x6f\141\163\x69\163\x3a\x6e\141\155\145\163\x3a\x74\x63\x3a\x53\101\x4d\114\x3a\x32\56\60\72\160\162\x6f\x74\157\x63\157\x6c");
    $L9->registerNamespace("\163\x61\155\154", "\x75\162\156\x3a\157\141\x73\x69\163\x3a\156\x61\155\145\x73\x3a\x74\x63\x3a\123\x41\x4d\x4c\72\x32\x2e\60\72\x61\x73\163\145\x72\164\x69\x6f\156");
    if ($g4->localName == "\114\157\147\x6f\165\164\122\145\x73\x70\x6f\156\163\x65") {
        goto v4y;
    }
    $uI = $L9->query("\57\163\141\155\154\x70\72\122\x65\x73\160\157\156\x73\x65\57\163\x61\155\154\160\72\x53\x74\141\x74\165\163\x2f\x73\x61\x6d\x6c\160\x3a\123\x74\x61\x74\165\x73\x43\x6f\144\x65", $dK);
    $Ow = isset($uI) ? $uI->item(0)->getAttribute("\x56\x61\x6c\x75\x65") : '';
    $lA = explode("\72", $Ow);
    if (!array_key_exists(7, $lA)) {
        goto VQ;
    }
    $uI = $lA[7];
    VQ:
    $uQ = $L9->query("\57\163\141\155\x6c\160\x3a\122\x65\x73\160\x6f\x6e\163\145\57\x73\x61\x6d\154\160\72\123\164\141\x74\165\163\x2f\x73\x61\155\154\x70\72\123\164\141\x74\x75\163\115\x65\163\x73\141\x67\x65", $dK);
    $cA = isset($uQ) ? $uQ->item(0) : '';
    if (empty($cA)) {
        goto yS;
    }
    $cA = $cA->nodeValue;
    yS:
    $ns = get_option("\163\141\155\x6c\x5f\151\144\145\x6e\164\151\x74\171\x5f\160\x72\x6f\166\x69\144\145\162\x73");
    $ns = maybe_unserialize($ns);
    if (array_key_exists("\122\145\x6c\141\x79\123\164\141\x74\x65", $_POST) && !empty($_POST["\x52\x65\154\x61\x79\x53\164\x61\x74\x65"]) && $_POST["\x52\x65\x6c\x61\x79\123\164\141\x74\x65"] != "\x2f") {
        goto QH;
    }
    $hZ = saml_get_current_page_url();
    goto Ir;
    QH:
    $hZ = $_POST["\x52\x65\x6c\x61\171\123\x74\141\164\x65"];
    Ir:
    if (!($uI != "\x53\165\x63\x63\x65\x73\163")) {
        goto Fb;
    }
    show_status_error($uI, $hZ, $cA);
    Fb:
    $oF = array("\x73\x61\155\x6c\137\x72\x65\163\160\157\x6e\163\145" => base64_encode($Mi));
    $Mi = new SAML2_Response($g4);
    $ib = $Mi->getIssuer();
    $nh = NULL;
    foreach ($ns as $nA => $bc) {
        if (!($bc["\x69\x64\x70\x5f\x65\x6e\x74\151\x74\x79\x5f\151\144"] == $ib)) {
            goto R1;
        }
        $nh = $ns[$nA];
        goto Gm;
        R1:
        WB:
    }
    Gm:
    $tj = '';
    if ($hZ == "\x74\145\x73\x74\x4e\145\167\x43\145\x72\164\x69\146\151\x63\x61\164\145") {
        goto wr;
    }
    $Qn = mo_saml_get_sp_private_key_for_idp($nh);
    goto kP;
    wr:
    $Qn = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\163\x6f\165\162\143\145\163" . DIRECTORY_SEPARATOR . "\155\151\156\151\x6f\162\x61\x6e\x67\x65\137\x73\x70\137\154\x61\164\145\x73\164\137\160\x72\151\x76\x2e\x6b\x65\x79");
    kP:
    $Mi->parseAssertions($g4, $Qn);
    $Ap = $Mi->getSignatureData();
    $Ch = current($Mi->getAssertions())->getSignatureData();
    $jj = current($Mi->getAssertions())->getIssuer();
    if (is_null($nh)) {
        goto mo;
    }
    $tj = $nh["\151\144\x70\137\x6e\x61\x6d\x65"];
    $ns[$tj] = array_merge($ns[$tj], $oF);
    $ns = array_filter($ns, "\146\x69\x6c\164\x65\x72\x5f\x65\x6d\160\164\x79\x5f\166\x61\154\x75\145\163");
    update_option("\x73\141\x6d\x6c\x5f\151\144\145\156\x74\x69\164\171\137\x70\x72\157\x76\151\144\145\x72\x73", $ns);
    mo:
    if (!(empty($Ch) && empty($Ap))) {
        goto cGm;
    }
    if ($hZ == "\x74\x65\x73\x74\x56\141\154\x69\144\141\x74\x65" or $hZ == "\164\x65\x73\x74\116\x65\x77\x43\145\162\164\x69\x66\151\x63\x61\164\145") {
        goto du;
    }
    wp_die("\x57\145\x20\x63\157\x75\154\x64\40\x6e\157\164\40\163\151\x67\156\40\x79\x6f\x75\x20\151\156\56\40\x50\154\x65\x61\x73\145\40\x63\157\x6e\x74\141\x63\x74\x20\x61\x64\155\151\x6e\x69\163\x74\x72\x61\164\157\x72", "\105\x72\162\157\162\72\40\111\x6e\166\x61\x6c\151\144\x20\x53\x41\x4d\114\40\122\145\x73\160\x6f\156\163\x65");
    goto q0;
    du:
    $T6 = mo_options_error_constants::Error_no_certificate;
    $Qo = mo_options_error_constants::Cause_no_certificate;
    echo "\x3c\x64\x69\x76\x20\163\x74\171\154\x65\x3d\42\x66\157\156\164\55\x66\x61\155\x69\154\x79\72\x43\141\154\x69\142\x72\151\73\160\x61\x64\x64\x69\x6e\x67\x3a\x30\40\63\45\73\42\x3e\15\12\40\40\40\x20\40\40\40\x20\x20\x20\40\x20\40\40\x20\40\x20\40\x20\x20\74\144\x69\x76\x20\163\164\x79\154\x65\75\42\x63\x6f\x6c\157\162\x3a\x20\43\141\71\x34\64\64\x32\x3b\142\141\143\x6b\x67\162\x6f\165\x6e\144\x2d\143\x6f\154\x6f\162\72\40\43\x66\62\144\145\144\145\73\160\141\144\144\x69\156\147\x3a\40\61\65\160\x78\73\x6d\141\x72\147\151\x6e\x2d\x62\157\164\164\157\x6d\x3a\x20\x32\60\x70\170\x3b\x74\x65\x78\164\55\141\x6c\151\147\x6e\x3a\143\145\x6e\164\x65\162\73\x62\x6f\x72\x64\x65\162\x3a\x31\160\x78\40\x73\x6f\x6c\151\x64\x20\x23\105\66\x42\63\102\x32\x3b\146\157\x6e\x74\x2d\163\151\172\x65\72\x31\x38\x70\164\73\42\x3e\40\x45\x52\122\x4f\x52\74\x2f\144\151\x76\76\15\xa\40\40\x20\40\x20\40\40\x20\x20\x20\x20\x20\40\x20\x20\x20\40\x20\x20\40\x3c\x64\151\166\40\163\x74\171\x6c\145\75\x22\x63\157\x6c\x6f\162\72\x20\x23\x61\71\64\x34\64\x32\x3b\x66\x6f\156\164\x2d\x73\x69\x7a\145\x3a\61\64\x70\164\x3b\40\x6d\141\x72\147\151\156\55\x62\157\x74\x74\x6f\155\x3a\x32\x30\x70\170\x3b\x22\76\x3c\160\76\74\x73\x74\162\x6f\156\x67\x3e\x45\162\x72\x6f\x72\40\x20\72" . $T6 . "\40\x3c\x2f\163\x74\162\157\156\147\76\74\x2f\x70\x3e\xd\12\x20\40\40\x20\40\40\x20\x20\40\x20\40\x20\x20\40\x20\x20\x20\x20\x20\40\xd\xa\x20\x20\x20\40\x20\40\x20\x20\x20\x20\x20\40\x20\40\x20\40\40\40\40\40\x3c\x70\x3e\74\x73\164\162\x6f\156\x67\76\120\x6f\163\163\x69\x62\x6c\145\40\x43\x61\x75\163\145\x3a\40" . $Qo . "\74\57\163\164\x72\157\156\147\x3e\x3c\x2f\160\x3e\xd\12\x20\x20\40\40\40\40\40\x20\x20\40\40\x20\x20\40\40\x20\40\x20\40\x20\xd\12\x20\x20\40\40\x20\40\40\40\x20\40\40\x20\x20\40\x20\40\x20\x20\40\x20\74\57\x64\x69\166\x3e\x3c\x2f\144\x69\x76\76";
    mo_saml_download_logs($T6, $Qo, $tj);
    die;
    q0:
    cGm:
    if (!($nh === null)) {
        goto bwm;
    }
    $T6 = mo_options_error_constants::Error_issuer_not_verfied;
    $Qo = mo_options_error_constants::Cause_issuer_not_verfied;
    echo "\x3c\x64\x69\166\40\163\x74\171\154\145\75\x22\x66\x6f\x6e\x74\55\x66\x61\x6d\x69\x6c\171\x3a\x43\x61\x6c\151\142\x72\151\x3b\x70\141\x64\x64\x69\x6e\147\x3a\60\40\x33\45\x3b\x22\76";
    echo "\x3c\144\151\x76\40\163\x74\x79\154\145\75\x22\x63\157\x6c\x6f\162\x3a\x20\x23\141\71\x34\64\64\62\73\142\141\x63\153\147\x72\x6f\165\156\144\x2d\143\157\x6c\157\162\x3a\x20\43\146\x32\144\145\144\145\x3b\x70\x61\144\x64\x69\x6e\147\72\x20\61\x35\x70\x78\73\x6d\x61\162\x67\x69\x6e\55\x62\x6f\x74\x74\157\x6d\72\x20\62\x30\160\x78\73\x74\145\x78\x74\x2d\x61\x6c\151\147\156\72\x63\145\156\164\145\x72\73\x62\x6f\162\144\145\162\72\x31\x70\x78\x20\163\x6f\154\x69\144\40\43\105\x36\x42\x33\x42\x32\x3b\146\157\156\164\55\x73\x69\x7a\145\72\x31\70\x70\x74\73\42\x3e\40\x45\x52\x52\117\x52\x3c\57\x64\x69\x76\76\xd\xa\x9\11\x9\x3c\x64\x69\x76\x20\x73\164\x79\x6c\145\75\42\143\157\x6c\x6f\162\x3a\x20\43\x61\71\x34\x34\x34\x32\73\146\x6f\x6e\x74\x2d\163\151\172\x65\x3a\61\64\160\164\73\x20\x6d\x61\162\x67\x69\x6e\55\142\x6f\164\x74\157\x6d\x3a\x32\60\x70\170\73\42\76\74\160\x3e\x3c\x73\164\162\157\x6e\147\76\105\x72\x72\157\x72\72\x20\x3c\57\163\164\162\157\x6e\147\x3e\125\156\x61\x62\154\x65\x20\x74\157\40\146\x69\x6e\144\40\141\40\111\x44\x50\40\105\156\x74\x69\164\171\x20\x49\104\x20\x6d\x61\164\143\x68\151\156\x67\40\164\x68\145\40\143\157\156\x66\151\147\x75\x72\145\x64\40\146\x69\x6e\x67\145\x72\x70\162\x69\156\x74\x2e\x3c\x2f\x70\76\15\12\x9\x9\11\x3c\x70\x3e\x50\x6c\x65\x61\163\x65\40\x63\x6f\x6e\164\x61\143\x74\40\171\x6f\x75\162\40\141\x64\155\151\x6e\x69\x73\x74\x72\141\164\x6f\162\x20\x61\156\x64\40\162\145\160\157\x72\x74\40\164\150\x65\40\x66\157\154\x6c\157\x77\x69\156\147\x20\x65\162\x72\x6f\162\x3a\x3c\x2f\160\x3e\xd\xa\x9\x9\x9\x3c\160\76\x3c\163\164\162\x6f\156\x67\76\x50\157\x73\x73\151\x62\x6c\145\x20\x43\141\165\163\x65\72\40\74\57\163\164\162\157\156\147\76\47\111\104\120\x20\105\x6e\164\x69\164\171\x20\111\104\47\x20\x66\x69\145\154\144\40\151\156\40\160\154\165\147\151\x6e\40\144\157\x65\x73\40\x6e\157\164\x20\155\141\x74\143\x68\x20\x74\x68\145\40\157\156\145\40\146\x6f\165\156\x64\x20\151\156\40\123\101\115\x4c\40\x52\x65\163\160\157\x6e\163\x65\56\74\57\160\x3e\xd\xa\x9\11\11\x3c\160\x3e\74\x73\x74\162\157\x6e\147\x3e\x45\156\x74\x69\164\x79\40\x49\104\x20\x66\157\165\x6e\x64\x20\x69\156\40\x53\x41\x4d\114\x20\x52\145\x73\x70\157\156\163\x65\72\x20\x3c\57\163\x74\x72\x6f\156\x67\76\x3c\x66\157\x6e\x74\x20\x66\141\x63\x65\75\42\103\x6f\165\x72\x69\x65\162\x20\116\145\167\x22\73\x66\157\x6e\164\x2d\x73\151\x7a\x65\72\61\x30\160\x74\x3e\x3c\142\x72\x3e\x3c\142\x72\x3e" . $jj . "\x3c\57\x70\76\x3c\57\x66\157\x6e\x74\76\15\12\x20\x20\40\40\x20\40\x20\40\x20\40\x20\40\74\x70\76\74\163\164\162\157\x6e\x67\x3e\123\x6f\154\165\x74\151\x6f\x6e\x3a\74\57\163\x74\x72\x6f\156\x67\76\x3c\57\160\76\xd\12\x20\x20\40\x20\40\40\40\x20\x20\x20\x20\40\x3c\157\x6c\x3e\xd\xa\x20\x20\x20\x20\x20\x20\x20\40\40\x20\40\40\40\x20\40\x20\74\x6c\x69\x3e\x43\157\160\171\x20\x74\150\145\x20\105\156\164\x69\x74\x79\40\x49\x44\40\157\146\40\123\x41\115\x4c\x20\x52\145\163\160\x6f\156\163\x65\40\146\x72\x6f\x6d\x20\x61\142\157\x76\x65\x20\141\x6e\144\40\160\x61\163\164\145\40\151\164\40\x69\x6e\x20\105\x6e\164\x69\164\x79\40\111\104\40\x6f\x72\40\x49\x73\x73\x75\145\x72\x20\x66\x69\x65\154\144\x20\165\x6e\x64\145\162\x20\x53\145\162\166\151\143\145\x20\120\x72\157\166\x69\144\145\x72\40\x53\145\164\x75\x70\40\164\141\142\x2e\74\x2f\x6c\x69\x3e\xd\12\x20\x20\40\40\40\40\40\40\x20\x20\x20\40\x3c\57\157\154\x3e\40\40\40\40\x20\40\x20\40\15\12\x20\x20\40\x20\40\40\40\40\40\40\x20\x20\x3c\57\144\151\166\76\15\12\11\x9\11\11\11\x3c\x64\x69\x76\x20\163\x74\171\x6c\x65\x3d\x22\155\141\162\147\151\156\x3a\63\45\x3b\144\x69\163\160\154\141\x79\x3a\142\x6c\x6f\143\x6b\x3b\x74\145\170\164\55\141\x6c\151\x67\156\72\x63\x65\156\x74\145\x72\73\42\76\xd\xa\11\x9\x9\x9\11\x3c\x64\151\166\x20\x73\164\171\x6c\x65\75\42\x6d\141\162\147\151\156\72\63\45\x3b\x64\151\163\160\154\141\171\72\x62\x6c\x6f\x63\153\73\x74\145\170\x74\55\141\154\151\147\156\x3a\x63\145\x6e\164\x65\162\73\x22\x3e\74\x69\x6e\x70\x75\164\x20\163\x74\x79\x6c\145\x3d\x22\160\x61\144\144\x69\x6e\x67\72\61\x25\x3b\167\x69\x64\x74\150\72\61\60\60\x70\170\73\142\x61\x63\153\x67\162\x6f\x75\156\144\x3a\40\x23\x30\x30\71\61\x43\x44\40\x6e\157\156\x65\40\162\x65\x70\x65\141\164\40\x73\x63\162\157\154\154\x20\x30\x25\x20\x30\x25\73\x63\x75\x72\163\x6f\162\x3a\x20\x70\x6f\x69\x6e\x74\145\162\73\146\x6f\x6e\x74\55\163\x69\172\145\x3a\61\65\160\170\73\142\157\162\144\145\162\x2d\x77\x69\144\164\x68\x3a\x20\x31\x70\x78\x3b\142\157\x72\x64\145\162\55\163\x74\x79\x6c\145\x3a\x20\163\x6f\154\x69\144\x3b\142\157\162\x64\x65\x72\55\162\x61\144\151\165\x73\x3a\x20\63\160\x78\x3b\x77\x68\x69\164\x65\55\x73\160\x61\143\145\72\x20\156\x6f\x77\162\141\x70\x3b\142\x6f\x78\55\x73\151\172\151\156\x67\72\40\142\x6f\x72\144\x65\x72\55\142\x6f\170\x3b\142\x6f\162\144\x65\162\x2d\143\x6f\154\157\x72\72\x20\43\60\x30\x37\63\101\x41\73\142\x6f\x78\55\163\150\141\144\157\167\x3a\x20\60\160\x78\x20\61\x70\170\40\60\x70\x78\40\162\x67\142\141\x28\61\62\x30\x2c\x20\62\60\x30\x2c\40\x32\63\x30\x2c\x20\60\x2e\66\x29\40\x69\156\x73\x65\x74\x3b\143\x6f\154\x6f\162\72\x20\x23\x46\x46\106\73\42\x74\x79\x70\x65\75\42\x62\165\x74\164\x6f\x6e\x22\x20\166\141\154\x75\x65\75\x22\x44\157\x6e\145\x22\40\157\x6e\x43\x6c\x69\143\153\75\x22\x73\x65\154\146\56\143\154\157\163\145\50\51\73\42\76\x3c\x2f\x64\x69\166\x3e";
    mo_saml_download_logs($T6, $Qo);
    die;
    bwm:
    $z0 = maybe_unserialize($nh["\x78\x35\60\x39\137\x63\x65\162\x74\x69\x66\x69\143\141\164\145"]);
    $qs = $ag . "\57";
    if (is_array($z0)) {
        goto Agl;
    }
    $zo = XMLSecurityKey::getRawThumbprint($z0);
    $zo = mo_saml_convert_to_windows_iconv($zo, $nh);
    $zo = preg_replace("\x2f\134\163\53\x2f", '', $zo);
    if (empty($Ap)) {
        goto jIz;
    }
    $B8 = Utilities::processResponse($qs, $zo, $Ap, $Mi, $z0, $hZ);
    jIz:
    if (empty($Ch)) {
        goto Cwe;
    }
    $B8 = Utilities::processResponse($qs, $zo, $Ch, $Mi, $z0, $hZ);
    Cwe:
    goto iUH;
    Agl:
    foreach ($z0 as $aA => $CH) {
        $zo = XMLSecurityKey::getRawThumbprint(Utilities::sanitize_certificate($CH));
        $zo = mo_saml_convert_to_windows_iconv($zo, $nh);
        $zo = preg_replace("\x2f\x5c\x73\x2b\57", '', $zo);
        if (empty($Ap)) {
            goto FVq;
        }
        $B8 = Utilities::processResponse($qs, $zo, $Ap, $Mi, $CH, $hZ);
        FVq:
        if (empty($Ch)) {
            goto U8S;
        }
        $B8 = Utilities::processResponse($qs, $zo, $Ch, $Mi, $CH, $hZ);
        U8S:
        if (!$B8) {
            goto q_B;
        }
        goto tu7;
        q_B:
        D6W:
    }
    tu7:
    iUH:
    if (!(empty($Ch) && empty($Ap))) {
        goto lhg;
    }
    echo "\116\157\x20\x73\x69\x67\x6e\x61\x74\x75\x72\x65\x20\x66\157\165\156\144\x20\151\156\40\x53\x41\x4d\x4c\x20\x52\x65\x73\160\x6f\156\x73\145\x20\157\162\x20\101\x73\163\x65\x72\x74\x69\157\x6e\x2e\40\120\x6c\145\141\x73\x65\x20\x73\x69\x67\x6e\40\x61\164\40\154\x65\141\163\x74\x20\157\156\145\40\x6f\146\40\164\150\x65\x6d\56";
    die;
    lhg:
    if ($Ap) {
        goto vli;
    }
    if ($Ch) {
        goto vlu;
    }
    goto pX0;
    vli:
    if (!(count($Ap["\103\145\162\164\151\146\x69\143\x61\164\x65\x73"]) > 0)) {
        goto Jk5;
    }
    $Ya = $Ap["\x43\145\x72\x74\x69\x66\151\143\141\164\145\x73"][0];
    Jk5:
    goto pX0;
    vlu:
    if (!(count($Ch["\103\145\162\x74\151\x66\151\143\141\x74\x65\163"]) > 0)) {
        goto oNe;
    }
    $Ya = $Ch["\103\x65\x72\x74\151\x66\x69\143\x61\x74\x65\x73"][0];
    oNe:
    pX0:
    if ($B8) {
        goto WOA;
    }
    if ($hZ == "\x74\x65\163\x74\x56\x61\154\x69\x64\x61\164\x65" or $hZ == "\164\x65\x73\x74\116\x65\167\103\x65\162\x74\151\x66\151\143\x61\x74\145") {
        goto olb;
    }
    wp_die("\x57\145\x20\x63\157\x75\154\144\x20\156\x6f\x74\40\x73\x69\147\156\x20\x79\157\x75\x20\151\156\56\40\120\154\x65\x61\x73\145\x20\x63\x6f\156\164\141\143\164\x20\x61\144\155\151\156\x69\x73\x74\162\x61\x74\157\162", "\x45\162\x72\x6f\x72\x3a\40\x49\x6e\166\141\154\x69\x64\40\x53\x41\x4d\x4c\40\x52\x65\163\x70\x6f\156\x73\145");
    goto k0_;
    olb:
    $T6 = mo_options_error_constants::Error_wrong_certificate;
    $Qo = mo_options_error_constants::Cause_wrong_certificate;
    $sH = "\x2d\55\x2d\55\x2d\102\105\x47\111\x4e\40\103\x45\x52\x54\111\x46\x49\x43\101\124\105\x2d\x2d\x2d\x2d\55\x3c\142\162\x3e" . chunk_split($Ya, 64) . "\x3c\x62\x72\x3e\55\x2d\x2d\x2d\55\105\x4e\x44\x20\x43\105\x52\x54\x49\x46\111\x43\101\124\105\x2d\55\55\55\55";
    echo "\x3c\x64\x69\x76\40\x73\x74\171\154\145\75\x22\x66\157\156\164\55\x66\141\155\x69\154\171\72\x43\141\x6c\x69\142\x72\x69\73\160\x61\x64\x64\x69\156\147\72\x30\40\x33\x25\73\42\76";
    echo "\x3c\x64\x69\166\x20\x73\164\x79\x6c\x65\x3d\42\x63\x6f\154\x6f\162\72\40\x23\141\x39\x34\x34\64\x32\x3b\x62\x61\143\153\147\162\157\165\156\x64\55\x63\x6f\154\157\x72\72\40\43\146\62\x64\145\x64\x65\x3b\x70\141\x64\x64\151\x6e\147\x3a\40\61\x35\160\x78\x3b\155\x61\x72\147\x69\x6e\55\x62\x6f\164\x74\157\x6d\72\x20\x32\x30\x70\170\73\x74\145\170\x74\55\141\x6c\151\x67\x6e\72\143\x65\x6e\x74\145\x72\73\x62\x6f\162\144\x65\x72\72\61\160\170\40\x73\x6f\x6c\x69\x64\x20\43\105\x36\102\x33\x42\62\73\146\x6f\x6e\164\55\x73\151\172\x65\72\x31\70\160\x74\x3b\42\x3e\40\105\122\x52\117\122\74\x2f\x64\151\166\76\xd\12\x9\11\11\x3c\144\x69\x76\x20\163\x74\171\x6c\x65\x3d\42\x63\x6f\154\157\162\x3a\40\43\x61\71\64\x34\64\62\x3b\146\157\x6e\x74\55\x73\151\172\145\72\x31\x34\160\x74\x3b\x20\x6d\x61\162\x67\151\156\55\142\x6f\164\x74\x6f\x6d\72\x32\x30\x70\170\x3b\42\76\x3c\x70\76\74\163\164\162\157\156\147\x3e\105\x72\162\157\x72\72\40\x3c\x2f\163\164\x72\157\x6e\x67\x3e\125\156\x61\142\154\x65\40\164\157\x20\x66\151\x6e\144\40\141\x20\x63\x65\x72\x74\x69\x66\x69\143\141\x74\145\40\x6d\x61\164\143\150\x69\x6e\147\x20\164\150\145\x20\x63\x6f\156\x66\151\x67\x75\x72\145\144\x20\146\x69\x6e\x67\x65\162\160\162\x69\x6e\164\56\x3c\57\160\x3e\xd\12\x9\11\x9\x3c\160\76\120\154\x65\x61\163\x65\x20\143\157\x6e\x74\x61\143\164\x20\171\157\165\x72\x20\x61\x64\155\x69\x6e\x69\x73\164\x72\141\164\157\x72\x20\141\x6e\144\40\x72\x65\160\157\x72\164\x20\x74\150\x65\x20\146\x6f\154\x6c\x6f\x77\151\156\147\40\145\x72\x72\157\162\x3a\x3c\57\x70\x3e\15\xa\11\x9\11\x3c\x70\x3e\74\x73\164\162\x6f\156\x67\76\120\x6f\x73\x73\x69\142\x6c\145\x20\103\x61\x75\x73\x65\72\x20\74\57\163\x74\x72\157\156\147\x3e\x27\130\x2e\x35\60\71\40\103\x65\162\164\151\x66\151\143\x61\x74\x65\x27\40\x66\x69\x65\x6c\144\40\151\x6e\40\x70\154\x75\147\x69\x6e\x20\144\x6f\145\163\40\156\157\x74\40\155\x61\x74\143\x68\x20\164\x68\x65\x20\143\145\x72\x74\x69\x66\151\x63\141\x74\x65\x20\146\x6f\165\156\x64\40\151\156\x20\123\101\115\114\x20\x52\145\163\x70\157\x6e\x73\145\56\74\57\x70\76\15\xa\11\11\11\x3c\x70\76\x3c\x73\164\x72\x6f\x6e\147\76\x43\145\x72\x74\151\x66\151\143\141\164\x65\x20\x66\x6f\165\156\x64\40\x69\x6e\x20\x53\x41\115\114\x20\122\145\x73\160\x6f\156\163\x65\72\x20\74\57\163\164\x72\x6f\x6e\147\76\x3c\x66\x6f\156\164\x20\146\141\x63\x65\x3d\42\x43\157\165\162\151\145\x72\x20\x4e\x65\x77\42\73\146\x6f\156\164\55\x73\x69\x7a\x65\72\x31\60\x70\164\x3e\x3c\x62\x72\76\x3c\142\x72\76" . $sH . "\74\x2f\x70\x3e\x3c\57\146\157\156\164\76\xd\xa\x20\x20\x20\40\40\x20\x20\x20\40\x20\x20\x20\74\x70\x3e\x3c\163\164\162\157\x6e\x67\x3e\123\157\154\x75\x74\151\x6f\156\x3a\x20\x3c\57\x73\x74\x72\x6f\156\147\x3e\74\57\160\x3e\15\xa\x9\11\x9\x20\74\157\154\x3e\15\12\40\40\x20\40\40\x20\40\40\40\x20\40\x20\40\x20\x20\x20\x3c\154\x69\76\103\157\x70\x79\x20\x70\x61\x73\x74\x65\40\164\x68\145\x20\143\x65\x72\x74\x69\x66\x69\x63\141\164\145\40\160\162\157\x76\151\x64\x65\x64\40\x61\142\157\166\145\x20\151\156\40\130\x35\x30\71\x20\103\145\x72\164\x69\146\151\x63\x61\164\x65\40\165\156\x64\145\x72\40\123\145\x72\166\x69\x63\x65\x20\120\162\x6f\x76\151\x64\145\162\40\x53\145\164\165\160\40\x74\x61\142\56\x3c\57\154\x69\76\15\xa\x20\x20\x20\x20\40\40\x20\x20\40\40\40\x20\40\x20\40\x20\74\x6c\x69\76\111\146\40\x69\163\x73\x75\x65\x20\160\145\x72\163\x69\x73\x74\163\40\x64\x69\163\x61\x62\x6c\145\x20\x3c\142\76\x43\150\x61\162\141\x63\164\145\162\x20\x65\x6e\x63\157\x64\151\156\x67\74\x2f\x62\76\40\x75\156\x64\x65\162\40\123\145\x72\x76\x69\x63\145\40\x50\x72\157\x76\144\145\x72\40\x53\x65\164\165\160\x20\x74\141\142\56\x3c\x2f\154\x69\x3e\15\12\x20\40\x20\40\40\x20\x20\x20\x20\x20\40\40\40\74\57\x6f\x6c\x3e\x20\40\x20\x20\40\x20\40\40\x20\15\xa\40\40\40\40\x20\40\40\40\40\x20\40\40\x3c\x2f\144\x69\x76\76\15\xa\11\11\x9\11\x9\x3c\x64\151\166\40\163\x74\171\x6c\145\75\x22\155\141\162\147\151\x6e\72\63\x25\x3b\x64\151\163\160\154\141\x79\x3a\x62\x6c\x6f\x63\x6b\73\164\145\170\164\x2d\x61\154\x69\147\x6e\x3a\143\x65\156\164\145\x72\x3b\42\x3e\xd\12\11\x9\11\x9\11\x3c\x64\x69\166\x20\163\164\x79\154\x65\75\42\155\x61\162\147\151\x6e\x3a\x33\x25\73\144\x69\163\160\x6c\x61\171\72\142\x6c\157\x63\153\x3b\x74\x65\x78\x74\55\x61\x6c\151\147\x6e\x3a\143\x65\x6e\x74\145\x72\x3b\x22\x3e\74\x69\x6e\x70\165\x74\x20\163\164\171\x6c\x65\75\x22\160\x61\x64\144\x69\156\147\x3a\61\45\x3b\x77\x69\144\x74\150\x3a\x31\x30\60\x70\170\73\x62\141\143\153\x67\x72\157\x75\156\144\72\40\x23\x30\x30\71\x31\103\x44\40\x6e\x6f\156\145\40\162\x65\160\x65\141\x74\40\x73\x63\162\x6f\154\x6c\x20\60\45\x20\x30\45\x3b\x63\165\162\x73\x6f\162\x3a\x20\160\157\151\x6e\x74\145\162\73\146\157\156\x74\55\163\151\x7a\x65\x3a\61\x35\160\170\73\x62\157\x72\x64\x65\x72\x2d\167\151\144\164\x68\x3a\x20\61\x70\170\73\142\x6f\x72\x64\x65\162\x2d\163\x74\171\154\x65\x3a\x20\163\157\x6c\x69\144\x3b\142\x6f\162\144\x65\x72\55\x72\x61\x64\x69\x75\x73\72\x20\x33\160\170\x3b\167\x68\x69\x74\x65\55\163\160\x61\x63\x65\72\x20\x6e\157\x77\x72\141\160\x3b\142\x6f\170\55\x73\151\x7a\x69\x6e\147\x3a\40\x62\x6f\162\144\x65\x72\55\x62\157\x78\x3b\x62\157\162\x64\145\x72\55\x63\157\x6c\x6f\x72\72\x20\x23\x30\x30\x37\x33\x41\101\73\142\x6f\x78\55\x73\150\x61\x64\157\x77\72\40\60\160\170\x20\x31\x70\x78\x20\x30\160\x78\x20\x72\147\142\x61\x28\x31\62\x30\54\x20\x32\x30\60\x2c\x20\62\x33\x30\x2c\40\x30\x2e\x36\x29\x20\151\x6e\x73\x65\164\x3b\143\x6f\x6c\157\x72\x3a\40\x23\106\x46\x46\73\x22\164\x79\x70\x65\75\x22\142\165\164\164\x6f\156\42\40\166\141\x6c\165\x65\75\x22\x44\x6f\156\145\x22\x20\157\156\x43\x6c\151\143\153\x3d\42\163\145\x6c\x66\x2e\143\154\x6f\163\x65\50\x29\73\42\x3e\74\57\144\151\x76\76";
    mo_saml_download_logs($T6, $Qo, $tj);
    die;
    k0_:
    WOA:
    $fN = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\163\x70\137\x65\x6e\164\x69\x74\171\x5f\x69\x64");
    if (!empty($fN)) {
        goto x8Z;
    }
    $fN = $ag . "\x2f\167\160\55\143\x6f\156\164\x65\156\164\57\160\154\x75\147\x69\156\x73\x2f\155\151\156\x69\x6f\162\x61\x6e\147\x65\x2d\x73\141\x6d\154\x2d\62\x30\55\x73\151\x6e\x67\154\x65\55\163\151\147\x6e\55\157\x6e\57";
    x8Z:
    $fN = isset($nh["\163\x61\x6d\154\137\x73\x70\137\145\x6e\x74\x69\164\x79\137\151\x64"]) ? $nh["\163\x61\x6d\154\x5f\x73\160\x5f\145\x6e\164\x69\x74\x79\137\x69\x64"] : $fN;
    Utilities::validateIssuerAndAudience($Mi, $fN, $jj, $hZ, $tj);
    $GR = current(current($Mi->getAssertions())->getNameId());
    $Fi = current($Mi->getAssertions())->getAttributes();
    $Fi["\116\x61\155\x65\x49\104"] = array("\x30" => $GR);
    $oz = current($Mi->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($nh, $Fi, $hZ, $oz);
    goto di0;
    v4y:
    if (!isset($_REQUEST["\x52\x65\x6c\x61\171\x53\164\141\x74\145"])) {
        goto R2;
    }
    $ap = $_REQUEST["\122\x65\x6c\x61\171\x53\x74\x61\164\145"];
    R2:
    wp_logout();
    if (!empty($ap)) {
        goto zs;
    }
    $ap = home_url();
    zs:
    header("\x4c\x6f\143\141\164\x69\x6f\x6e\72\x20" . $ap);
    die;
    di0:
    Qok:
    if (!(array_key_exists("\123\101\115\x4c\x52\x65\x71\165\x65\163\x74", $_REQUEST) && !empty($_REQUEST["\123\101\x4d\x4c\122\145\x71\x75\x65\x73\x74"]))) {
        goto xJ5;
    }
    $vQ = $_REQUEST["\123\x41\115\x4c\x52\145\x71\165\145\163\164"];
    $hZ = "\57";
    if (!array_key_exists("\x52\x65\x6c\141\171\x53\x74\141\x74\145", $_REQUEST)) {
        goto Ba0;
    }
    $hZ = $_REQUEST["\x52\x65\154\x61\171\x53\x74\x61\x74\x65"];
    Ba0:
    $vQ = base64_decode($vQ);
    if (!(array_key_exists("\x53\101\x4d\x4c\x52\x65\x71\x75\x65\x73\x74", $_GET) && !empty($_GET["\x53\101\115\x4c\122\145\161\x75\x65\163\164"]))) {
        goto qC9;
    }
    $vQ = gzinflate($vQ);
    qC9:
    $YQ = new DOMDocument();
    $YQ->loadXML($vQ);
    $E6 = $YQ->firstChild;
    if (!($E6->localName == "\114\157\x67\x6f\x75\164\x52\145\x71\165\x65\163\x74")) {
        goto xJB;
    }
    $cp = new SAML2_LogoutRequest($E6);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto urj;
    }
    session_start();
    urj:
    $_SESSION["\x6d\157\137\163\141\x6d\x6c\x5f\x6c\157\x67\157\165\x74\137\x72\x65\161\165\145\x73\164"] = $vQ;
    $_SESSION["\155\x6f\137\163\x61\x6d\x6c\x5f\x6c\157\147\x6f\165\x74\137\162\x65\x6c\141\171\137\x73\x74\x61\164\x65"] = $hZ;
    wp_logout();
    xJB:
    xJ5:
}
function getIdpNameFromEntityId($ns, $Ro)
{
    if (!(!empty($ns) and is_array($ns))) {
        goto gyD;
    }
    foreach ($ns as $ec) {
        if (!($ec["\151\x64\160\137\x65\156\164\151\x74\x79\x5f\x69\144"] == $Ro)) {
            goto urn;
        }
        return $ec["\151\x64\160\137\x6e\141\x6d\145"];
        urn:
        F1x:
    }
    rT6:
    gyD:
    return false;
}
function mo_saml_checkMapping($nh, $Fi, $hZ, $oz)
{
    try {
        $nV = get_option("\x73\141\155\154\x5f\x69\144\160\137\x61\x74\x74\162\x69\x62\x75\164\x65\137\155\x61\160\x70\x69\x6e\147");
        $nV = maybe_unserialize($nV);
        $I0 = get_option("\163\141\x6d\x6c\x5f\x69\144\x70\137\162\x6f\154\145\x5f\x6d\x61\x70\160\151\x6e\147");
        $I0 = maybe_unserialize($I0);
        $iF = "\x4e\x61\155\x65\111\x44";
        $Rn = "\x4e\141\x6d\x65\x49\x44";
        $mJ = '';
        $Cf = check_if_default_mapping_required(true, $nh["\151\144\x70\137\156\x61\x6d\x65"]);
        if ($Cf) {
            goto tBF;
        }
        $tj = $nh["\x69\x64\x70\137\x6e\141\x6d\x65"];
        goto unV;
        tBF:
        $tj = "\x44\x45\x46\x41\x55\x4c\x54";
        unV:
        if (!(!empty($nV) && array_key_exists($tj, $nV))) {
            goto Syy;
        }
        if (empty($nV[$tj])) {
            goto SsI;
        }
        $iF = $nV[$tj]["\145\x6d\x61\151\x6c"];
        $Rn = $nV[$tj]["\x75\163\x65\x72\x6e\x61\x6d\x65"];
        $TJ = $nV[$tj]["\x66\x69\162\163\x74\x5f\x6e\141\x6d\x65"];
        $Wm = $nV[$tj]["\x6c\141\163\x74\137\156\x61\x6d\145"];
        $zF = $nV[$tj]["\147\162\157\x75\160\137\x6e\x61\155\x65"];
        $mJ = $nV[$tj]["\144\151\x73\x70\x6c\141\x79\x5f\x6e\x61\155\x65"];
        if (!array_key_exists("\x73\x61\155\x6c\x5f\141\155\137\141\143\143\157\x75\156\x74\x5f\x6d\x61\164\x63\x68\x65\162", $nV[$tj])) {
            goto qbt;
        }
        $t9 = $nV[$tj]["\163\x61\155\154\x5f\x61\155\x5f\x61\143\143\x6f\x75\156\164\137\155\x61\x74\143\x68\x65\x72"];
        qbt:
        SsI:
        Syy:
        $za = '';
        $eP = '';
        if (empty($Fi)) {
            goto FTZ;
        }
        if (!empty($TJ) && array_key_exists($TJ, $Fi)) {
            goto VQq;
        }
        $TJ = '';
        goto RoV;
        VQq:
        $TJ = $Fi[$TJ][0];
        RoV:
        if (!empty($Wm) && array_key_exists($Wm, $Fi)) {
            goto Bgd;
        }
        $Wm = '';
        goto p1U;
        Bgd:
        $Wm = $Fi[$Wm][0];
        p1U:
        if (!empty($Rn) && array_key_exists($Rn, $Fi)) {
            goto cGd;
        }
        $eP = $Fi["\116\x61\155\145\x49\104"][0];
        goto HaF;
        cGd:
        $eP = $Fi[$Rn][0];
        HaF:
        if (!empty($iF) && array_key_exists($iF, $Fi)) {
            goto Afr;
        }
        $za = $Fi["\x4e\141\x6d\145\x49\x44"][0];
        goto gkN;
        Afr:
        $za = $Fi[$iF][0];
        gkN:
        if (!empty($zF) && array_key_exists($zF, $Fi)) {
            goto Z1J;
        }
        $zF = array();
        goto GGl;
        Z1J:
        $zF = $Fi[$zF];
        GGl:
        if (!empty($t9)) {
            goto CP5;
        }
        $t9 = "\x65\155\141\x69\x6c";
        CP5:
        FTZ:
        if ($hZ == "\x74\145\163\x74\x56\141\x6c\x69\x64\x61\x74\x65" || $hZ == "\x74\145\x73\164\116\145\167\103\x65\x72\164\x69\x66\x69\x63\x61\164\145") {
            goto uYT;
        }
        mo_saml_login_user($za, $TJ, $Wm, $eP, $zF, $hZ, $t9, $nh, $oz, $Fi["\116\141\x6d\x65\x49\104"][0], $mJ, $Fi);
        goto aoR;
        uYT:
        $ns = get_option("\163\x61\155\x6c\x5f\x69\144\x65\x6e\x74\151\x74\x79\137\x70\x72\x6f\x76\x69\144\x65\162\x73");
        $ns = maybe_unserialize($ns);
        $cW = $nh["\151\x64\x70\137\156\141\155\x65"];
        $oF = array("\164\x65\163\164\x5f\x73\x74\x61\164\x75\x73" => "\x54\145\163\x74\x20\163\165\x63\x63\145\163\163\146\165\x6c");
        if (empty($cW)) {
            goto j0x;
        }
        $ns[$cW] = array_merge($ns[$cW], $oF);
        $ns = array_filter($ns, "\x66\x69\154\x74\x65\x72\x5f\x65\x6d\160\x74\x79\x5f\x76\x61\x6c\x75\x65\x73");
        update_option("\x73\141\x6d\154\x5f\151\x64\x65\156\x74\x69\x74\171\137\x70\x72\x6f\166\151\x64\145\x72\x73", $ns);
        j0x:
        mo_saml_show_test_result($TJ, $Wm, $za, $zF, $Fi, $nh);
        aoR:
    } catch (Exception $GP) {
        echo sprintf("\101\x6e\x20\x65\x72\162\157\x72\x20\157\143\x63\x75\162\162\x65\x64\40\x77\150\151\x6c\x65\x20\x70\162\x6f\x63\x65\163\163\151\156\x67\40\164\x68\x65\40\123\101\115\114\x20\x52\x65\x73\160\x6f\156\x73\145\x2e");
        die;
    }
}
function check_if_default_mapping_required($XX, $tj)
{
    $nV = get_option("\x73\141\x6d\x6c\137\151\144\160\x5f\141\x74\164\162\x69\142\165\x74\145\137\155\x61\160\x70\151\x6e\x67");
    $nV = maybe_unserialize($nV);
    if (!empty($nV)) {
        goto qff;
    }
    $nV = array();
    qff:
    $I0 = get_option("\163\141\155\x6c\x5f\151\144\x70\137\x72\x6f\154\145\x5f\x6d\x61\160\x70\151\156\x67");
    $I0 = maybe_unserialize($I0);
    if (!empty($I0)) {
        goto kBv;
    }
    $I0 = array();
    kBv:
    if ($XX) {
        goto RDx;
    }
    if (array_key_exists($tj, $I0)) {
        goto ov1;
    }
    return true;
    goto XZP;
    ov1:
    $i_ = $I0[$tj];
    XZP:
    foreach ($i_ as $nA => $bc) {
        if (!($nA == "\x64\145\x66\141\x75\154\164\137\162\x6f\x6c\x65")) {
            goto CaX;
        }
        if ($bc != "\163\x75\142\x73\143\162\151\142\145\162") {
            goto YAH;
        }
        goto Zo4;
        goto k5f;
        YAH:
        return false;
        k5f:
        CaX:
        if (!($nA == "\x64\157\156\164\137\143\162\145\x61\164\145\x5f\165\163\145\x72" || $nA == "\x64\157\156\x74\137\x61\x6c\x6c\x6f\x77\137\x75\x6e\x6c\151\x73\x74\145\x64\x5f\165\163\145\x72" || $nA == "\153\x65\x65\160\x5f\145\x78\x69\x73\x74\x69\156\x67\x5f\165\x73\x65\162\163\x5f\162\157\x6c\145" || $nA == "\144\157\x6e\164\x5f\141\154\154\x6f\167\137\165\163\x65\162\x5f\164\x6f\154\x6f\x67\x69\156\x5f\143\162\x65\141\164\x65\137\x77\x69\164\150\x5f\147\x69\166\145\156\x5f\x67\162\x6f\165\160\x73")) {
            goto Iid;
        }
        if ($bc != "\x75\x6e\x63\150\x65\x63\153\x65\144") {
            goto GX6;
        }
        goto Zo4;
        goto UDz;
        GX6:
        return false;
        UDz:
        Iid:
        if (empty($bc)) {
            goto Ge5;
        }
        return false;
        Ge5:
        Zo4:
    }
    kIO:
    return true;
    goto dn5;
    RDx:
    if (array_key_exists($tj, $nV)) {
        goto GGE;
    }
    return true;
    goto f5M;
    GGE:
    $XM = $nV[$tj];
    f5M:
    $UN = get_option("\155\x6f\137\163\x61\155\154\x5f\x63\x75\x73\164\157\155\137\141\x74\164\162\163\x5f\155\x61\160\x70\151\156\147");
    $UN = maybe_unserialize($UN);
    $df = array();
    if (!array_key_exists($tj, $UN)) {
        goto aVH;
    }
    $df = $UN[$tj];
    aVH:
    if (empty($df)) {
        goto uCi;
    }
    $XM = array_merge($XM, $df);
    uCi:
    foreach ($XM as $nA => $bc) {
        if (!($nA == "\x75\x73\x65\162\x6e\141\155\145" || $nA == "\x65\155\141\151\x6c")) {
            goto SKB;
        }
        if ($bc != "\x4e\x61\155\x65\111\104") {
            goto T67;
        }
        goto YQ3;
        goto vrL;
        T67:
        return false;
        vrL:
        SKB:
        if (!($nA == "\x64\151\x73\160\154\141\171\x5f\x6e\141\155\x65")) {
            goto lKz;
        }
        if ($bc != "\125\x53\x45\122\x4e\x41\115\105") {
            goto R3k;
        }
        goto YQ3;
        goto oX3;
        R3k:
        return false;
        oX3:
        lKz:
        if (empty($bc)) {
            goto Dek;
        }
        return false;
        Dek:
        YQ3:
    }
    pN1:
    return true;
    dn5:
}
function mo_saml_show_test_result($TJ, $Wm, $za, $zF, $Fi, $nh)
{
    ob_end_clean();
    echo "\74\144\x69\166\40\163\x74\x79\x6c\145\75\x22\146\x6f\156\164\x2d\x66\141\x6d\151\154\171\72\x43\x61\x6c\151\142\x72\x69\73\x70\141\x64\144\151\x6e\147\72\60\x20\x33\x25\73\42\x3e";
    $cW = $nh["\151\x64\160\137\156\141\x6d\145"];
    if (!empty($za)) {
        goto Q7i;
    }
    echo "\x3c\x64\151\166\40\163\x74\x79\x6c\x65\x3d\x22\143\x6f\154\x6f\x72\72\40\43\141\x39\64\x34\x34\62\73\x62\x61\143\153\147\162\157\165\x6e\x64\55\x63\x6f\154\x6f\x72\x3a\40\43\x66\62\x64\x65\144\145\x3b\160\141\x64\144\x69\x6e\147\72\40\61\x35\x70\x78\73\x6d\x61\x72\x67\x69\156\55\x62\x6f\164\x74\x6f\x6d\x3a\x20\x32\60\160\170\x3b\x74\x65\x78\164\x2d\141\x6c\x69\147\156\x3a\x63\145\156\x74\x65\162\73\142\157\162\144\145\x72\72\61\x70\170\x20\163\x6f\x6c\151\x64\40\43\x45\66\102\x33\x42\62\x3b\x66\157\x6e\x74\55\x73\151\x7a\x65\72\61\70\x70\x74\x3b\42\76\x54\x45\123\124\40\x46\101\x49\x4c\105\104\x3c\57\144\151\166\76\xd\xa\11\11\11\x9\74\144\151\x76\40\163\x74\x79\154\x65\x3d\x22\x63\x6f\x6c\x6f\162\72\x20\x23\141\71\64\64\64\x32\x3b\146\157\x6e\x74\x2d\163\151\172\x65\x3a\61\x34\x70\x74\73\x20\x6d\141\162\x67\x69\x6e\x2d\142\x6f\x74\x74\x6f\155\72\62\x30\160\170\73\x22\x3e\x57\x41\x52\x4e\111\116\x47\x3a\40\x53\157\155\145\x20\101\x74\164\x72\151\142\165\x74\x65\x73\x20\x44\x69\x64\x20\116\157\x74\40\x4d\141\x74\143\x68\56\74\x2f\144\151\166\x3e\xd\12\11\x9\x9\11\x3c\144\x69\166\x20\x73\x74\x79\x6c\145\x3d\42\x64\151\x73\160\x6c\141\171\72\x62\154\157\143\x6b\x3b\164\x65\170\x74\x2d\141\154\151\147\x6e\x3a\143\x65\156\164\145\162\73\155\x61\162\147\x69\156\55\x62\x6f\x74\x74\x6f\x6d\72\x34\45\73\42\76\74\x69\155\x67\40\163\x74\171\154\145\x3d\x22\167\x69\x64\164\x68\x3a\61\x35\45\73\x22\163\x72\x63\x3d\x22" . plugin_dir_url(__FILE__) . "\151\x6d\x61\147\145\163\x2f\167\162\157\156\x67\56\160\x6e\x67\42\76\74\x2f\x64\x69\166\76";
    goto PzO;
    Q7i:
    $U1 = maybe_unserialize(get_option("\x6d\157\137\163\x61\x6d\x6c\x5f\164\145\x73\164\137\x63\157\x6e\146\151\x67\x5f\x61\164\164\162\x73"));
    if (!empty($U1)) {
        goto G_W;
    }
    $U1 = array();
    G_W:
    if (empty($nh)) {
        goto Ciq;
    }
    $Oe = array($cW => $Fi);
    $U1 = array_merge($U1, $Oe);
    update_option("\155\x6f\137\x73\141\155\x6c\137\x74\145\163\x74\x5f\143\157\156\x66\151\x67\x5f\x61\x74\164\162\x73", $U1);
    Ciq:
    echo "\74\144\151\x76\40\163\x74\171\x6c\145\x3d\42\x63\157\x6c\157\x72\x3a\40\x23\63\x63\x37\x36\x33\144\73\xd\xa\x20\40\x20\40\40\40\x20\x20\40\40\x20\40\40\x20\x20\x20\x62\x61\143\x6b\x67\162\157\165\x6e\144\x2d\x63\157\x6c\157\x72\72\x20\x23\x64\146\146\x30\x64\70\x3b\40\160\141\x64\144\151\156\x67\72\x32\45\73\x6d\141\x72\x67\151\156\55\x62\157\x74\x74\x6f\155\72\62\x30\160\170\73\164\x65\x78\x74\55\x61\x6c\x69\x67\x6e\72\x63\145\x6e\x74\145\162\x3b\40\142\x6f\x72\144\145\x72\72\61\x70\170\40\163\x6f\x6c\x69\x64\40\43\x41\105\104\x42\71\101\x3b\40\146\x6f\x6e\164\55\163\x69\172\x65\72\61\x38\x70\x74\73\42\76\x54\x45\123\124\x20\x53\125\x43\x43\105\x53\123\106\125\x4c\x3c\x2f\x64\151\x76\x3e";
    if (!array_key_exists("\x4e\x61\x6d\x65\x49\x44", $Fi)) {
        goto vtI;
    }
    if (!(strlen($Fi["\x4e\141\155\x65\x49\x44"][0]) > 60)) {
        goto uwq;
    }
    echo "\74\144\151\166\40\163\164\x79\154\x65\x3d\42\x64\151\163\x70\x6c\141\x79\x3a\40\142\x6c\x6f\x63\153\x3b\143\157\x6c\x6f\x72\72\40\43\145\71\62\x62\x31\x34\x3b\142\141\143\153\147\162\157\165\156\x64\x2d\x63\x6f\x6c\157\162\72\x20\43\146\x63\x66\70\145\x33\x3b\160\x61\x64\x64\x69\x6e\147\x3a\x20\61\x30\160\170\x3b\142\x6f\162\x64\x65\x72\x3a\x20\163\x6f\x6c\x69\144\x20\x31\x70\170\40\x23\146\x61\145\142\x63\143\73\167\151\144\164\x68\72\x39\66\45\x3b\x22\76\xd\xa\x20\x20\x20\x20\40\40\x20\40\x20\x20\x20\x20\40\x20\x20\40\74\x73\x70\x61\156\76\x3c\142\x3e\116\117\x54\x45\40\x3a\x3c\x2f\x62\x3e\x20\116\141\155\x65\x49\104\40\151\x73\x20\147\x72\145\x61\x74\145\162\x20\x74\150\x61\156\x20\66\60\x20\x63\x68\x61\162\141\x63\164\145\162\163\x20\x6c\x6f\x6e\x67\x2e\40\x55\x73\x65\162\40\143\141\x6e\x6e\157\x74\40\x62\x65\40\x63\162\x65\x61\164\145\x64\x20\167\151\x74\x68\40\x74\150\151\163\40\x4e\141\x6d\145\111\104\40\141\x73\40\x55\x73\145\x72\156\141\x6d\145\56\74\x2f\163\160\x61\x6e\x3e\x3c\x2f\144\x69\166\x3e\x3c\142\162\x2f\76";
    uwq:
    vtI:
    echo "\x3c\144\151\166\x20\x73\x74\x79\154\x65\x3d\42\144\151\x73\x70\x6c\x61\171\72\142\x6c\x6f\143\153\73\x74\x65\x78\x74\55\x61\154\x69\x67\156\72\143\145\156\x74\x65\162\x3b\155\x61\x72\x67\151\156\55\x62\x6f\164\x74\x6f\x6d\x3a\x34\x25\73\42\x3e\x3c\151\x6d\x67\40\163\164\x79\154\145\75\x22\x77\x69\144\164\x68\72\61\65\45\73\42\x73\x72\x63\75\42" . plugin_dir_url(__FILE__) . "\151\155\141\x67\x65\x73\57\147\x72\x65\145\x6e\x5f\x63\150\145\143\153\56\160\x6e\x67\42\76\74\x2f\x64\x69\x76\x3e";
    PzO:
    $Q_ = get_option("\163\x61\x6d\x6c\x5f\144\157\x6d\x61\x69\156\137\162\x65\163\x74\162\151\x63\x74\x69\x6f\156");
    if (!empty($Q_)) {
        goto oAT;
    }
    $Q_ = array();
    oAT:
    $Q_ = maybe_unserialize($Q_);
    $rO = $cW;
    if (array_key_exists($rO, $Q_)) {
        goto UYK;
    }
    $rO = "\104\105\x46\x41\125\114\x54";
    UYK:
    if (!isset($Q_[$rO])) {
        goto Y09;
    }
    $Mz = $Q_[$rO]["\x65\x6e\141\x62\x6c\145\x5f\x64\157\155\141\151\156\x5f\x72\x65\163\164\x72\x69\x63\x74\151\157\x6e"];
    Y09:
    if (empty($Mz)) {
        goto kql;
    }
    $p9 = $Q_[$rO]["\141\154\154\157\167\137\x64\145\x6e\x79\137\154\x6f\x67\x69\156"];
    if (!empty($p9) && $p9 == "\144\145\x6e\x79") {
        goto ruF;
    }
    $io = $Q_[$rO]["\145\x6d\x61\x69\x6c\137\x64\157\x6d\x61\x69\156\163"];
    $Q7 = explode("\73", $io);
    $Gh = explode("\100", $za);
    $Vk = array_key_exists("\61", $Gh) ? $Gh[1] : '';
    if (in_array($Vk, $Q7)) {
        goto CsL;
    }
    echo "\74\160\x20\x73\164\x79\x6c\145\x3d\x22\143\157\154\157\162\72\x72\x65\x64\x3b\x22\76\124\x68\x69\x73\40\x75\163\145\x72\40\167\x69\154\x6c\40\156\157\164\x20\142\145\x20\x61\154\x6c\x6f\x77\145\144\40\164\x6f\x20\154\157\x67\x69\x6e\40\141\163\40\x74\x68\145\x20\x64\x6f\155\141\151\x6e\40\157\x66\40\x74\x68\x65\40\x65\x6d\x61\151\154\40\x69\x73\x20\x6e\157\x74\x20\151\156\143\x6c\x75\x64\x65\144\40\151\x6e\40\x74\150\145\x20\141\x6c\x6c\x6f\167\x65\144\x20\154\151\163\164\x20\x6f\x66\x20\104\157\155\x61\x69\156\x20\122\x65\x73\x74\x72\x69\x63\164\151\x6f\156\x2e\x3c\x2f\160\x3e";
    CsL:
    goto Qry;
    ruF:
    $io = $Q_[$rO]["\145\155\141\x69\x6c\137\144\157\155\x61\x69\156\163"];
    $Q7 = explode("\73", $io);
    $Gh = explode("\100", $za);
    $Vk = array_key_exists("\61", $Gh) ? $Gh[1] : '';
    if (!in_array($Vk, $Q7)) {
        goto sU2;
    }
    echo "\x3c\160\x20\x73\x74\171\154\x65\75\42\143\157\x6c\x6f\162\x3a\162\x65\144\x3b\x22\76\x54\150\151\x73\40\x75\163\145\162\40\167\x69\154\154\x20\156\157\164\40\142\x65\x20\141\x6c\x6c\x6f\167\145\144\40\x74\x6f\40\154\x6f\147\x69\x6e\40\141\163\x20\164\150\x65\x20\x64\157\155\x61\x69\156\x20\x6f\146\x20\x74\x68\145\x20\x65\155\141\151\x6c\x20\x69\163\x20\x69\x6e\143\154\165\144\145\x64\40\151\x6e\40\x74\150\x65\40\x64\145\156\151\145\144\x20\154\151\163\x74\x20\x6f\x66\40\x44\x6f\x6d\141\x69\x6e\40\x52\145\x73\164\x72\x69\x63\164\151\157\156\x2e\x3c\x2f\x70\x3e";
    sU2:
    Qry:
    kql:
    echo "\74\163\x70\x61\x6e\x20\x73\x74\171\154\x65\x3d\x22\146\x6f\156\x74\x2d\x73\151\172\x65\72\x31\64\160\164\x3b\42\x3e\x3c\142\76\110\x65\x6c\x6c\x6f\74\57\142\76\x2c\x20" . $za . "\74\x2f\x73\x70\141\156\x3e\74\x62\x72\57\76\74\x70\40\x73\164\x79\x6c\145\x3d\x22\x66\x6f\x6e\164\x2d\167\x65\151\147\x68\164\x3a\142\157\x6c\144\x3b\146\157\156\x74\55\163\151\172\145\72\x31\64\x70\164\73\155\x61\x72\x67\x69\156\55\154\x65\146\x74\72\61\x25\x3b\42\76\x41\124\x54\x52\111\x42\x55\124\x45\123\40\122\105\x43\x45\111\126\105\x44\72\x3c\57\160\76\xd\xa\11\x9\11\11\x3c\164\141\x62\x6c\x65\x20\x73\x74\x79\154\145\75\42\142\x6f\x72\x64\x65\162\55\143\x6f\154\154\141\x70\163\x65\x3a\143\x6f\154\x6c\x61\x70\163\145\73\142\157\x72\144\145\162\55\x73\x70\141\x63\x69\x6e\x67\72\x30\73\x20\x77\x69\144\x74\x68\72\x31\x30\60\45\73\40\x66\157\x6e\164\x2d\163\x69\172\x65\72\x31\x34\x70\x74\x3b\142\x61\143\x6b\147\x72\157\x75\156\x64\x2d\x63\157\x6c\157\x72\72\43\105\x44\x45\104\x45\104\73\42\x3e\xd\12\x9\x9\x9\11\74\x74\x72\x20\x73\164\x79\154\x65\x3d\x22\164\145\x78\164\55\141\x6c\151\147\x6e\72\143\145\156\x74\145\x72\73\42\x3e\x3c\x74\144\x20\x73\164\x79\x6c\145\x3d\42\146\x6f\156\164\55\x77\x65\151\147\x68\x74\72\x62\157\x6c\x64\73\x62\x6f\x72\x64\145\x72\x3a\x32\x70\170\40\163\x6f\154\151\144\40\43\71\64\71\x30\x39\x30\73\x70\141\144\144\151\x6e\x67\x3a\x32\45\73\42\76\101\x54\124\x52\x49\x42\x55\x54\105\x20\x4e\x41\x4d\x45\x3c\57\x74\x64\x3e\74\164\144\40\163\164\x79\x6c\x65\75\42\x66\x6f\156\164\55\x77\145\x69\x67\150\x74\72\x62\x6f\154\x64\73\160\141\144\x64\x69\156\147\72\x32\45\x3b\x62\x6f\x72\144\x65\162\x3a\62\160\170\40\x73\157\154\x69\x64\40\43\71\64\71\60\x39\x30\x3b\40\x77\x6f\x72\144\x2d\167\162\x61\160\x3a\142\162\145\141\153\55\167\x6f\x72\x64\73\42\76\x41\124\124\x52\x49\x42\125\x54\105\40\126\101\114\x55\x45\74\x2f\164\x64\x3e\74\x2f\164\162\x3e";
    if (!empty($Fi)) {
        goto t_C;
    }
    echo "\116\157\40\101\164\164\162\x69\x62\x75\164\145\x73\x20\122\145\x63\x65\x69\166\145\x64\x2e";
    goto SHt;
    t_C:
    foreach ($Fi as $nA => $bc) {
        echo "\74\x74\162\76\74\164\144\40\x73\x74\171\154\145\x3d\x27\x66\157\x6e\164\x2d\x77\145\x69\x67\x68\x74\72\x62\157\x6c\x64\x3b\x62\x6f\162\144\145\162\72\x32\160\170\40\163\x6f\154\151\144\x20\x23\x39\64\x39\x30\x39\x30\73\x70\x61\x64\144\151\156\147\72\62\x25\x3b\167\157\162\144\x2d\x77\162\141\160\72\142\162\x65\141\153\x2d\167\157\162\x64\x3b\x27\76" . $nA . "\x3c\57\x74\x64\x3e\74\164\144\x20\163\164\x79\x6c\145\x3d\47\x70\141\144\144\x69\x6e\x67\x3a\x32\x25\x3b\x62\x6f\x72\144\145\x72\72\62\x70\x78\40\163\x6f\154\151\x64\x20\x23\71\64\x39\60\71\x30\x3b\40\x77\x6f\162\x64\55\167\x72\x61\160\72\x62\162\x65\x61\153\55\167\x6f\162\x64\x3b\47\x3e" . implode("\x3c\150\x72\x2f\76", $bc) . "\x3c\x2f\164\x64\x3e\x3c\57\x74\162\x3e";
        Z39:
    }
    LDL:
    SHt:
    echo "\74\57\164\x61\x62\154\145\x3e\74\57\144\151\x76\76";
    echo "\74\144\x69\x76\40\x73\x74\171\x6c\145\x3d\42\x6d\141\162\x67\151\x6e\x3a\x33\x25\73\x64\151\163\x70\154\141\171\x3a\x62\154\x6f\x63\x6b\x3b\164\145\x78\164\55\141\154\x69\147\156\x3a\x63\145\156\x74\145\162\x3b\42\76\74\x69\156\160\165\164\40\x73\164\171\x6c\x65\x3d\42\x70\141\144\144\151\156\147\x3a\x31\45\73\167\x69\144\164\x68\x3a\x31\60\60\160\170\x3b\x62\x61\x63\x6b\147\x72\157\x75\x6e\x64\x3a\x20\x23\60\60\71\x31\x43\x44\x20\x6e\157\156\x65\x20\162\145\160\x65\141\x74\40\x73\x63\162\x6f\154\154\40\x30\45\40\60\x25\73\x63\x75\162\163\157\162\x3a\x20\160\157\151\x6e\164\145\162\x3b\146\157\x6e\164\x2d\163\151\x7a\145\x3a\61\65\160\x78\73\x62\157\162\x64\145\162\x2d\167\151\x64\x74\150\x3a\x20\x31\160\170\x3b\x62\x6f\162\x64\145\x72\55\163\x74\171\154\145\x3a\x20\x73\157\x6c\x69\144\x3b\x62\157\x72\144\145\162\x2d\x72\141\144\x69\x75\163\x3a\40\x33\160\170\x3b\167\x68\151\x74\145\x2d\x73\160\141\x63\145\72\40\x6e\x6f\167\x72\141\160\x3b\x62\157\170\55\x73\151\172\151\x6e\147\72\40\142\x6f\x72\x64\x65\x72\x2d\142\x6f\x78\73\x62\x6f\162\144\145\x72\x2d\x63\157\x6c\157\162\x3a\x20\x23\x30\x30\x37\63\101\101\x3b\x62\x6f\x78\x2d\163\x68\141\144\157\167\72\40\x30\160\x78\x20\x31\160\170\40\x30\160\x78\40\x72\x67\x62\141\50\x31\62\x30\x2c\x20\x32\60\x30\x2c\40\x32\63\x30\54\40\x30\56\66\51\40\x69\x6e\x73\x65\x74\73\143\x6f\154\157\162\72\x20\x23\x46\106\x46\73\x22\x74\x79\x70\145\x3d\42\142\165\x74\164\157\156\42\x20\166\141\154\x75\145\x3d\42\104\x6f\156\x65\42\x20\x6f\x6e\x43\x6c\151\143\153\75\42\163\x65\x6c\146\x2e\143\x6c\x6f\163\x65\x28\x29\x3b\x22\x3e\74\57\144\x69\166\x3e";
    die;
}
function mo_saml_convert_to_windows_iconv($zo, $nh)
{
    $ns = get_option("\x73\141\155\x6c\137\151\x64\x65\x6e\x74\x69\164\171\137\160\162\157\x76\x69\144\x65\162\163");
    $ns = maybe_unserialize($ns);
    $cW = $nh["\x69\144\x70\137\x6e\x61\x6d\x65"];
    if (!(!empty($cW) and isset($ns[$cW]))) {
        goto uZC;
    }
    $lJ = $ns[$cW]["\x6d\157\137\163\x61\155\x6c\137\x65\156\x63\157\144\151\x6e\147\x5f\x65\156\141\142\154\x65\144"];
    if (!($lJ === '')) {
        goto D6O;
    }
    return $zo;
    D6O:
    uZC:
    return iconv("\125\124\106\x2d\x38", "\103\x50\x31\x32\x35\62\57\x2f\x49\107\116\x4f\x52\x45", $zo);
}
function mo_saml_login_user($za, $TJ, $Wm, $eP, $zF, $hZ, $t9, $ec = NULL, $oz = '', $KB = '', $Pn = '', $Fi = null)
{
    $M_ = Utilities::mo_idp_limit_reached();
    if (!$M_) {
        goto ehM;
    }
    wp_die("\x57\x65\40\x63\x6f\165\x6c\x64\x20\x6e\x6f\x74\x20\163\151\147\x6e\x20\x79\157\x75\40\151\156\x2e\x20\120\x6c\x65\x61\163\145\40\143\157\156\x74\141\143\164\x20\171\157\165\162\x20\x61\144\x6d\151\x6e\151\163\164\162\141\164\157\x72\56", "\x49\104\120\x20\114\151\x6d\x69\164\x20\x52\145\x61\x63\x68\145\144");
    ehM:
    $F_ = sanitize_user($eP, true);
    $lt = apply_filters("\x70\162\145\137\x75\163\145\x72\137\154\157\x67\151\156", $F_);
    $eP = trim($lt);
    $tj = $ec["\151\x64\x70\137\156\x61\155\145"];
    $Wz = $tj;
    if (!array_key_exists("\145\156\141\x62\x6c\145\137\151\144\160", $ec)) {
        goto qYG;
    }
    if ($ec["\x65\x6e\141\142\154\x65\x5f\151\x64\x70"]) {
        goto JqZ;
    }
    wp_die("\127\145\40\x63\157\x75\154\144\x20\x6e\x6f\164\40\163\x69\147\156\x20\x79\157\165\x20\151\x6e\56\x20\120\154\145\141\x73\145\x20\x63\157\x6e\x74\x61\143\164\40\171\x6f\x75\162\40\141\144\x6d\151\156\151\x73\164\x72\141\164\157\x72\56", "\111\104\120\40\x44\151\163\141\x62\154\145\x64");
    JqZ:
    qYG:
    do_action("\155\157\x5f\x61\x62\x72\x5f\146\x69\154\x74\x65\x72\137\x6c\157\x67\151\x6e", $Fi);
    check_if_user_allowed_to_login_due_to_role_restriction($zF, $tj);
    $ag = get_option("\155\x6f\x5f\x73\x61\155\154\x5f\163\x70\x5f\142\141\x73\145\137\165\162\154");
    if (!empty($ag)) {
        goto v88;
    }
    $ag = home_url();
    v88:
    $Q_ = get_option("\x73\x61\x6d\x6c\x5f\x64\x6f\x6d\x61\x69\x6e\x5f\162\145\163\x74\x72\151\143\164\x69\157\x6e");
    if (!empty($Q_)) {
        goto L4h;
    }
    $Q_ = array();
    L4h:
    $Q_ = maybe_unserialize($Q_);
    $rO = $tj;
    if (array_key_exists($rO, $Q_)) {
        goto ai8;
    }
    $rO = "\104\x45\106\x41\125\x4c\124";
    ai8:
    if (!isset($Q_[$rO])) {
        goto Jbx;
    }
    $Mz = isset($Q_[$rO]["\x65\156\x61\142\x6c\145\137\144\157\155\141\151\x6e\x5f\162\145\163\164\162\x69\x63\x74\x69\157\x6e"]) ? $Q_[$rO]["\145\156\141\142\154\145\x5f\144\157\155\141\151\156\x5f\x72\x65\x73\x74\162\151\x63\x74\x69\157\156"] : false;
    Jbx:
    if (empty($Mz)) {
        goto u5a;
    }
    $io = $Q_[$rO]["\145\x6d\x61\151\x6c\x5f\144\157\x6d\141\x69\x6e\163"];
    $Q7 = explode("\x3b", $io);
    $Gh = explode("\100", $za);
    $Vk = array_key_exists("\61", $Gh) ? $Gh[1] : '';
    $p9 = $Q_[$rO]["\x61\154\x6c\x6f\167\137\144\145\x6e\171\x5f\154\x6f\x67\151\156"];
    $vB = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\x72\x65\163\x74\162\151\143\x74\x65\144\x5f\144\157\x6d\141\151\156\137\145\x72\x72\157\x72\137\x6d\x73\147");
    if (!empty($vB)) {
        goto pCg;
    }
    $vB = "\131\x6f\x75\40\141\162\x65\x20\156\157\x74\40\x61\154\x6c\x6f\167\x65\144\40\x74\x6f\x20\x6c\x6f\x67\x69\156\x2e\40\120\154\x65\x61\163\145\x20\143\157\156\164\x61\x63\164\40\x79\157\165\162\40\x41\x64\x6d\151\156\x69\163\164\162\141\x74\x6f\x72\56";
    pCg:
    if (!empty($p9) && $p9 == "\144\x65\x6e\171") {
        goto n5S;
    }
    if (in_array($Vk, $Q7)) {
        goto r5k;
    }
    wp_die($vB, "\120\145\162\155\151\x73\x73\x69\x6f\156\x20\104\145\x6e\x69\x65\144\40\72\40\x4e\x6f\x74\40\x61\x20\x57\150\151\x74\x65\x6c\151\x73\164\145\x64\x20\x75\x73\145\162\x2e");
    r5k:
    goto wf3;
    n5S:
    if (!in_array($Vk, $Q7)) {
        goto BoW;
    }
    wp_die($vB, "\x50\x65\162\155\x69\x73\163\151\157\156\x20\104\145\x6e\x69\145\144\x20\x3a\x20\x42\x6c\x61\x63\153\x6c\151\163\164\x65\x64\40\165\163\145\162\56");
    BoW:
    wf3:
    u5a:
    $te = false;
    $HB = null;
    if (!is_multisite()) {
        goto iHo;
    }
    if (!username_exists($eP)) {
        goto zTb;
    }
    $user = get_user_by("\x6c\x6f\147\x69\x6e", $eP);
    zTb:
    if (!email_exists($za)) {
        goto ICo;
    }
    $user = get_user_by("\145\x6d\x61\151\154", $za);
    ICo:
    if (empty($user)) {
        goto Z3o;
    }
    $HB = $user;
    $Zc = $user->ID;
    $blog_id = get_current_blog_id();
    if (is_user_member_of_blog($Zc, $blog_id)) {
        goto xda;
    }
    $te = true;
    xda:
    Z3o:
    iHo:
    if ($t9 == "\165\x73\x65\162\156\x61\x6d\145" && username_exists($eP) || username_exists($eP) and !$te) {
        goto z_z;
    }
    if (email_exists($za) and !$te) {
        goto u8C;
    }
    if (!username_exists($eP) && !email_exists($za) || $te) {
        goto Rno;
    }
    goto Lw9;
    u8C:
    $user = get_user_by("\x65\155\141\x69\154", $za);
    $Zc = $user->ID;
    if (empty($TJ)) {
        goto dYB;
    }
    wp_update_user(array("\111\104" => $Zc, "\x66\x69\x72\163\164\137\x6e\x61\x6d\x65" => $TJ));
    dYB:
    if (empty($Wm)) {
        goto mls;
    }
    wp_update_user(array("\111\x44" => $Zc, "\x6c\141\163\x74\x5f\x6e\141\x6d\x65" => $Wm));
    mls:
    if (is_null($Fi)) {
        goto kcn;
    }
    update_user_meta($Zc, "\155\157\137\163\141\x6d\x6c\137\165\x73\145\x72\137\141\x74\164\162\x69\x62\x75\x74\x65\x73", $Fi);
    if (empty($Pn)) {
        goto ttF;
    }
    if (strcmp($Pn, "\x55\x53\x45\x52\116\x41\x4d\x45") == 0) {
        goto Vdp;
    }
    if (strcmp($Pn, "\106\x4e\x41\x4d\x45") == 0 && !empty($TJ)) {
        goto GFL;
    }
    if (strcmp($Pn, "\x4c\x4e\101\115\105") == 0 && !empty($Wm)) {
        goto F85;
    }
    if (strcmp($Pn, "\106\x4e\101\115\105\137\114\x4e\101\x4d\x45") == 0 && !empty($Wm) && !empty($TJ)) {
        goto AMC;
    }
    if (!(strcmp($Pn, "\114\116\101\115\105\137\106\116\x41\x4d\105") == 0 && !empty($Wm) && !empty($TJ))) {
        goto fyp;
    }
    wp_update_user(array("\x49\x44" => $Zc, "\144\x69\163\x70\154\x61\x79\137\156\141\x6d\145" => $Wm . "\x20" . $TJ));
    fyp:
    goto uF_;
    AMC:
    wp_update_user(array("\x49\x44" => $Zc, "\x64\151\163\160\154\x61\x79\137\156\141\155\145" => $TJ . "\40" . $Wm));
    uF_:
    goto kIB;
    F85:
    wp_update_user(array("\x49\x44" => $Zc, "\x64\x69\x73\160\154\x61\171\137\x6e\x61\x6d\x65" => $Wm));
    kIB:
    goto FRk;
    GFL:
    wp_update_user(array("\111\104" => $Zc, "\x64\x69\163\160\154\141\x79\137\156\141\155\x65" => $TJ));
    FRk:
    goto y3L;
    Vdp:
    wp_update_user(array("\x49\104" => $Zc, "\144\x69\163\x70\154\141\171\x5f\156\x61\x6d\145" => $user->user_login));
    y3L:
    ttF:
    $tj = $ec["\151\144\160\x5f\x6e\141\x6d\145"];
    if (!get_option("\155\157\137\163\x61\155\154\137\143\x75\163\x74\157\x6d\137\141\164\x74\x72\163\x5f\155\141\x70\x70\151\x6e\x67")) {
        goto aPT;
    }
    $UN = get_option("\155\157\137\163\x61\x6d\154\x5f\143\x75\x73\x74\x6f\x6d\x5f\141\164\x74\x72\x73\x5f\155\141\160\x70\151\156\147");
    $UN = maybe_unserialize($UN);
    if (empty($UN)) {
        goto SdQ;
    }
    $Cf = check_if_default_mapping_required(true, $tj);
    if (!$Cf) {
        goto k8K;
    }
    $tj = "\x44\x45\106\101\125\x4c\x54";
    k8K:
    if (!array_key_exists($tj, $UN)) {
        goto n7S;
    }
    foreach ($UN[$tj] as $nA => $bc) {
        if (!array_key_exists($bc, $Fi)) {
            goto qZA;
        }
        $s9 = false;
        if (!(count($Fi[$bc]) == 1)) {
            goto PB2;
        }
        $s9 = true;
        PB2:
        if (!$s9) {
            goto gjl;
        }
        update_user_meta($Zc, $nA, $Fi[$bc][0]);
        goto rPw;
        gjl:
        $xI = array();
        foreach ($Fi[$bc] as $eh) {
            array_push($xI, $eh);
            W_6:
        }
        bbQ:
        update_user_meta($Zc, $nA, $xI);
        rPw:
        qZA:
        gFV:
    }
    HLl:
    n7S:
    SdQ:
    aPT:
    kcn:
    $I0 = get_option("\163\x61\x6d\154\137\151\x64\x70\x5f\x72\x6f\154\145\137\x6d\141\x70\x70\x69\156\x67");
    $I0 = maybe_unserialize($I0);
    $yl = '';
    $jO = get_option("\x6d\157\137\x73\x61\x6d\154\137\x72\145\154\141\x79\137\x73\x74\141\164\x65");
    if (!empty($jO)) {
        goto ZNG;
    }
    if (!empty($hZ)) {
        goto TXW;
    }
    $yl = $ag;
    goto FZT;
    TXW:
    if (!filter_var($hZ, FILTER_VALIDATE_URL)) {
        goto bQl;
    }
    if (parse_url(home_url(), PHP_URL_HOST) === parse_url($hZ, PHP_URL_HOST)) {
        goto RQ5;
    }
    $yl = $ag;
    goto sB2;
    RQ5:
    $yl = $hZ;
    sB2:
    goto vlC;
    bQl:
    $yl = $hZ;
    vlC:
    FZT:
    goto hfh;
    ZNG:
    $yl = $jO;
    hfh:
    do_action("\155\151\156\151\x6f\162\x61\156\147\145\137\x70\157\163\x74\137\141\x75\164\x68\x65\x6e\164\x69\143\141\x74\145\x5f\x75\163\x65\162\137\154\157\x67\x69\x6e", $user, null, $yl);
    $tj = $ec["\x69\x64\160\x5f\x6e\x61\x6d\145"];
    $cZ = $tj;
    $Cf = check_if_default_mapping_required(false, $tj);
    if (!$Cf) {
        goto B0W;
    }
    $tj = "\104\x45\x46\101\125\114\124";
    B0W:
    if (!(!empty($I0) && !empty($I0[$tj]))) {
        goto oWb;
    }
    $vE = $I0[$tj]["\x64\x6f\156\x74\137\x61\x6c\154\x6f\x77\137\x75\156\x6c\151\x73\x74\145\144\x5f\165\x73\145\162"];
    $Sa = $I0[$tj]["\144\x65\146\141\165\154\164\137\162\x6f\x6c\x65"];
    $vf = $I0[$tj]["\x64\157\156\164\x5f\143\162\145\141\x74\x65\x5f\x75\x73\x65\162"];
    $Xr = $I0[$tj]["\x6b\x65\145\x70\137\x65\x78\x69\163\x74\x69\x6e\147\137\x75\163\145\162\163\137\162\157\x6c\145"];
    oWb:
    if (isset($Xr) && $Xr == "\143\x68\145\x63\153\x65\x64") {
        goto CgQ;
    }
    $b0 = assign_roles_to_user($user, $I0, $tj, $zF);
    goto Gsq;
    CgQ:
    $b0 = false;
    Gsq:
    if (is_administrator_user($user)) {
        goto HCS;
    }
    if ($b0 !== true && !empty($Xr) && $Xr == "\143\150\145\143\x6b\x65\x64") {
        goto Tb9;
    }
    if ($b0 !== true && !empty($vE) && $vE == "\143\150\x65\x63\153\x65\144") {
        goto MxH;
    }
    if ($b0 !== true && !empty($Sa)) {
        goto Vwp;
    }
    if ($b0 !== true) {
        goto tZZ;
    }
    goto IXs;
    Tb9:
    wp_update_user(array("\111\x44" => $Zc));
    goto IXs;
    MxH:
    wp_update_user(array("\x49\x44" => $Zc, "\162\157\154\145" => false));
    goto IXs;
    Vwp:
    wp_update_user(array("\111\104" => $Zc, "\162\157\x6c\145" => $Sa));
    goto IXs;
    tZZ:
    $U3 = get_option("\x64\145\x66\141\x75\x6c\164\137\162\157\154\x65");
    wp_update_user(array("\111\104" => $Zc, "\x72\x6f\x6c\145" => $U3));
    IXs:
    HCS:
    wp_set_current_user($Zc);
    $R4 = false;
    $R4 = apply_filters("\155\157\137\x72\145\x6d\145\155\142\145\x72\137\155\145", $R4);
    wp_set_auth_cookie($Zc, $R4);
    $user = get_user_by("\151\144", $Zc);
    do_action("\x77\x70\x5f\x6c\157\x67\151\x6e", $user->user_login, $user);
    if (empty($cZ)) {
        goto d0o;
    }
    update_user_meta($Zc, "\155\157\x5f\163\141\x6d\x6c\x5f\154\x6f\x67\x67\x65\144\137\151\x6e\137\x77\151\164\150\x5f\x69\x64\160", $cZ);
    d0o:
    if (empty($oz)) {
        goto mFY;
    }
    update_user_meta($Zc, "\x6d\157\x5f\x73\141\x6d\x6c\137\163\x65\x73\163\151\x6f\156\137\x69\x6e\x64\145\x78", $oz);
    mFY:
    if (empty($KB)) {
        goto f3_;
    }
    update_user_meta($Zc, "\x6d\157\137\163\141\x6d\x6c\x5f\x6e\141\x6d\x65\x5f\x69\144", $KB);
    f3_:
    do_action("\x6d\x6f\x5f\163\141\155\x6c\137\x61\164\164\162\x69\142\x75\164\x65\x73", $eP, $za, $TJ, $Wm, $zF, $Wz);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto roI;
    }
    session_start();
    roI:
    $_SESSION["\155\x6f\137\163\x61\x6d\x6c"]["\x6c\x6f\147\x67\x65\144\x5f\x69\156\x5f\x77\151\164\150\x5f\x69\144\160"] = $cZ;
    if (empty($oz)) {
        goto YVd;
    }
    $_SESSION["\x6d\x6f\x5f\x73\x61\155\154"]["\x73\x65\163\163\x69\157\156\x49\156\144\x65\x78"] = $oz;
    YVd:
    if (empty($KB)) {
        goto yUc;
    }
    $_SESSION["\155\x6f\137\x73\141\x6d\154"]["\156\x61\155\x65\x49\144"] = $KB;
    yUc:
    wp_redirect($yl);
    die;
    goto Lw9;
    Rno:
    $I0 = get_option("\x73\141\155\154\x5f\151\144\160\137\x72\x6f\x6c\x65\137\155\141\x70\x70\x69\x6e\x67");
    $I0 = maybe_unserialize($I0);
    $tj = $ec["\x69\144\160\137\156\x61\155\145"];
    $cZ = $tj;
    $Cf = check_if_default_mapping_required(false, $tj);
    if (!$Cf) {
        goto Ra6;
    }
    $tj = "\104\105\106\x41\125\x4c\124";
    Ra6:
    $SH = true;
    if (!(!empty($I0) && !empty($I0[$tj]))) {
        goto onj;
    }
    $vE = $I0[$tj]["\144\x6f\156\164\137\x61\x6c\x6c\x6f\167\x5f\165\156\154\x69\x73\164\145\144\x5f\x75\163\x65\x72"];
    $Sa = $I0[$tj]["\x64\x65\146\x61\165\x6c\164\x5f\162\x6f\154\145"];
    $vf = $I0[$tj]["\x64\x6f\x6e\x74\x5f\x63\162\x65\x61\x74\145\137\x75\163\x65\162"];
    onj:
    $el = get_saml_roles_to_assign($I0, $tj, $zF);
    if (!(empty($el) && !empty($vf) && strcmp($vf, "\x63\150\145\143\x6b\145\144") == 0)) {
        goto ljP;
    }
    $SH = FALSE;
    ljP:
    $Zc = NULL;
    if ($SH) {
        goto QB6;
    }
    $vB = get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x61\x63\143\157\165\156\x74\137\x63\162\x65\x61\x74\151\x6f\x6e\x5f\x64\x69\163\x61\x62\x6c\x65\x64\137\x6d\x73\x67");
    if (!empty($vB)) {
        goto U18;
    }
    $vB = "\x57\145\40\143\157\165\x6c\144\40\x6e\157\x74\x20\163\151\147\156\x20\x79\x6f\x75\x20\x69\x6e\x2e\x20\120\x6c\145\x61\163\145\x20\143\157\x6e\164\x61\x63\x74\40\171\x6f\165\x72\x20\101\x64\155\x69\156\151\x73\164\162\141\164\157\162\x2e";
    U18:
    wp_die($vB, "\x45\x72\x72\x6f\162\x3a\x20\x4e\x6f\x74\40\x61\x20\127\x6f\162\144\120\162\x65\163\x73\x20\115\x65\x6d\x62\145\x72");
    die;
    goto cFd;
    QB6:
    $rK = wp_generate_password(10, false);
    if (!$te) {
        goto l01;
    }
    $Zc = $HB->ID;
    goto Xi6;
    l01:
    if (!empty($eP)) {
        goto BOs;
    }
    $Zc = wp_create_user($za, $rK, $za);
    goto Kzi;
    BOs:
    if (!(strlen($eP) > 60)) {
        goto GGw;
    }
    wp_die("\127\x65\x20\143\157\x75\x6c\x64\x6e\47\x74\x20\x73\151\x67\x6e\40\171\x6f\x75\40\x69\x6e\x2e\40\x50\x6c\145\141\163\145\x20\143\157\156\164\x61\143\164\x20\171\x6f\165\162\x20\141\144\x6d\x69\156\x69\163\164\162\141\x74\x6f\162", "\125\x73\x65\x72\156\x61\x6d\x65\40\154\x65\x6e\147\x74\x68\x20\154\151\155\x69\164\40\162\145\x61\143\x68\x65\144");
    GGw:
    $Zc = wp_create_user($eP, $rK, $za);
    Kzi:
    if (!is_wp_error($Zc)) {
        goto Zgn;
    }
    wp_die($Zc->get_error_message() . "\74\x62\162\76\120\154\x65\141\163\x65\x20\143\157\156\x74\x61\143\x74\x20\171\157\x75\x72\40\101\144\155\x69\x6e\x69\x73\x74\162\141\164\x6f\162\56\74\x62\162\76\x3c\142\76\125\x73\145\x72\156\141\x6d\145\74\x2f\142\x3e\72\40" . $za, "\105\162\162\x6f\x72\x3a\40\103\157\165\x6c\x64\x6e\47\164\40\x63\x72\145\x61\164\x65\x20\165\163\145\162");
    Zgn:
    Xi6:
    $user = get_user_by("\x69\144", $Zc);
    if (isset($Xr) and $Xr == "\x63\150\x65\143\x6b\145\144") {
        goto liC;
    }
    $b0 = assign_roles_to_user($user, $I0, $tj, $zF);
    goto F9u;
    liC:
    $b0 = false;
    F9u:
    if ($b0 !== true && !empty($Xr) && $Xr == "\x63\150\145\x63\x6b\x65\x64") {
        goto saa;
    }
    if ($b0 !== true && !empty($vE) && $vE == "\143\x68\x65\143\153\x65\x64") {
        goto Crb;
    }
    if ($b0 !== true && !empty($Sa)) {
        goto gSP;
    }
    if ($b0 !== true) {
        goto hm3;
    }
    goto GrA;
    saa:
    wp_update_user(array("\x49\x44" => $Zc));
    goto GrA;
    Crb:
    wp_update_user(array("\x49\x44" => $Zc, "\x72\157\x6c\x65" => false));
    goto GrA;
    gSP:
    wp_update_user(array("\x49\104" => $Zc, "\x72\x6f\154\x65" => $Sa));
    goto GrA;
    hm3:
    $U3 = get_option("\144\145\x66\141\165\154\164\x5f\162\157\x6c\x65");
    wp_update_user(array("\x49\104" => $Zc, "\162\157\x6c\x65" => $U3));
    GrA:
    if (empty($TJ)) {
        goto YnM;
    }
    wp_update_user(array("\x49\104" => $Zc, "\x66\151\162\163\164\x5f\x6e\141\x6d\x65" => $TJ));
    YnM:
    if (empty($Wm)) {
        goto zAt;
    }
    wp_update_user(array("\111\104" => $Zc, "\154\x61\x73\x74\137\x6e\x61\x6d\x65" => $Wm));
    zAt:
    if (is_null($Fi)) {
        goto EQy;
    }
    update_user_meta($Zc, "\x6d\157\x5f\163\141\155\x6c\137\x75\x73\x65\162\x5f\x61\x74\164\162\151\142\x75\164\x65\x73", $Fi);
    if (empty($Pn)) {
        goto c5A;
    }
    if (strcmp($Pn, "\x55\123\x45\122\116\101\115\105") == 0) {
        goto lt5;
    }
    if (strcmp($Pn, "\x46\116\101\115\x45") == 0 && !empty($TJ)) {
        goto F0S;
    }
    if (strcmp($Pn, "\x4c\116\101\x4d\x45") == 0 && !empty($Wm)) {
        goto WGo;
    }
    if (strcmp($Pn, "\106\116\x41\115\105\x5f\114\116\101\x4d\x45") == 0 && !empty($Wm) && !empty($TJ)) {
        goto fG1;
    }
    if (!(strcmp($Pn, "\x4c\x4e\101\x4d\105\137\x46\116\101\115\105") == 0 && !empty($Wm) && !empty($TJ))) {
        goto mzS;
    }
    wp_update_user(array("\x49\104" => $Zc, "\144\x69\x73\x70\x6c\141\171\137\x6e\x61\x6d\x65" => $Wm . "\x20" . $TJ));
    mzS:
    goto ku_;
    fG1:
    wp_update_user(array("\111\x44" => $Zc, "\144\151\163\x70\154\x61\x79\137\x6e\141\155\x65" => $TJ . "\40" . $Wm));
    ku_:
    goto ReK;
    WGo:
    wp_update_user(array("\111\x44" => $Zc, "\x64\151\x73\160\x6c\x61\x79\137\x6e\x61\155\x65" => $Wm));
    ReK:
    goto OAx;
    F0S:
    wp_update_user(array("\111\x44" => $Zc, "\144\151\x73\160\154\x61\x79\137\156\141\155\145" => $TJ));
    OAx:
    goto mWe;
    lt5:
    wp_update_user(array("\111\x44" => $Zc, "\144\x69\x73\x70\x6c\x61\x79\137\x6e\141\x6d\145" => $user->user_login));
    mWe:
    c5A:
    if (!get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\143\x75\163\x74\x6f\x6d\x5f\x61\164\x74\x72\x73\x5f\x6d\141\x70\160\151\x6e\x67")) {
        goto EHx;
    }
    $UN = get_option("\x6d\157\137\163\141\155\154\x5f\x63\x75\x73\x74\157\155\137\x61\164\164\x72\163\x5f\x6d\141\x70\x70\151\x6e\x67");
    $UN = maybe_unserialize($UN);
    if (empty($UN)) {
        goto Hvj;
    }
    $Cf = check_if_default_mapping_required(true, $tj);
    if (!$Cf) {
        goto CQV;
    }
    $tj = "\x44\105\x46\101\x55\114\x54";
    CQV:
    if (!array_key_exists($tj, $UN)) {
        goto Fl3;
    }
    foreach ($UN[$tj] as $nA => $bc) {
        if (!array_key_exists($bc, $Fi)) {
            goto iTP;
        }
        $s9 = false;
        if (!(count($Fi[$bc]) == 1)) {
            goto RrG;
        }
        $s9 = true;
        RrG:
        if (!$s9) {
            goto io1;
        }
        update_user_meta($Zc, $nA, $Fi[$bc][0]);
        goto iQt;
        io1:
        $xI = array();
        foreach ($Fi[$bc] as $eh) {
            array_push($xI, $eh);
            Vvs:
        }
        W1v:
        update_user_meta($Zc, $nA, $xI);
        iQt:
        iTP:
        jnB:
    }
    KmK:
    Fl3:
    Hvj:
    EHx:
    EQy:
    cFd:
    $user = get_user_by("\151\x64", $Zc);
    if ($user) {
        goto KM2;
    }
    if (!empty($hZ)) {
        goto POf;
    }
    wp_redirect(network_home_url());
    goto Xom;
    POf:
    wp_redirect($hZ);
    Xom:
    die;
    KM2:
    $jO = get_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\162\x65\154\x61\x79\x5f\x73\164\141\x74\145");
    if (!empty($jO)) {
        goto FK6;
    }
    if (!empty($hZ)) {
        goto GGZ;
    }
    $yl = $ag;
    goto ph2;
    GGZ:
    if (!filter_var($hZ, FILTER_VALIDATE_URL)) {
        goto Nx7;
    }
    if (parse_url(home_url(), PHP_URL_HOST) === parse_url($hZ, PHP_URL_HOST)) {
        goto RvB;
    }
    $yl = $ag;
    goto l4I;
    RvB:
    $yl = $hZ;
    l4I:
    goto txo;
    Nx7:
    $yl = $hZ;
    txo:
    ph2:
    goto hEf;
    FK6:
    $yl = $jO;
    hEf:
    do_action("\155\151\x6e\x69\157\162\x61\156\147\145\x5f\x70\157\x73\164\137\x61\x75\x74\150\145\x6e\164\x69\143\x61\x74\145\137\165\x73\145\x72\137\154\x6f\x67\x69\x6e", $user, null, $yl, true);
    wp_set_current_user($user->ID);
    $R4 = false;
    $R4 = apply_filters("\155\157\x5f\162\x65\x6d\145\155\142\x65\162\x5f\x6d\145", $R4);
    wp_set_auth_cookie($user->ID, $R4);
    do_action("\x77\160\x5f\x6c\157\147\151\156", $user->user_login, $user);
    if (empty($cZ)) {
        goto hGh;
    }
    update_user_meta($Zc, "\155\x6f\137\163\141\155\154\137\154\157\x67\x67\145\x64\x5f\151\156\x5f\167\151\164\150\x5f\151\144\160", $cZ);
    hGh:
    if (empty($oz)) {
        goto SAC;
    }
    update_user_meta($Zc, "\155\157\x5f\x73\141\155\x6c\x5f\163\145\163\163\x69\157\x6e\x5f\x69\156\144\145\x78", $oz);
    SAC:
    if (empty($KB)) {
        goto rk5;
    }
    update_user_meta($Zc, "\155\157\137\x73\x61\155\154\137\x6e\141\155\x65\x5f\x69\x64", $KB);
    rk5:
    do_action("\155\x6f\137\x73\x61\x6d\x6c\x5f\x61\x74\164\x72\151\x62\x75\x74\145\163", $eP, $za, $TJ, $Wm, $zF, $Wz, true);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto qMD;
    }
    session_start();
    qMD:
    $_SESSION["\155\x6f\x5f\x73\141\x6d\154"]["\154\157\147\x67\x65\x64\137\151\156\137\x77\151\164\150\137\x69\144\x70"] = $cZ;
    if (empty($oz)) {
        goto eCP;
    }
    $_SESSION["\x6d\x6f\x5f\x73\141\x6d\154"]["\x73\x65\163\163\x69\x6f\x6e\x49\156\x64\x65\x78"] = $oz;
    eCP:
    if (empty($KB)) {
        goto d2B;
    }
    $_SESSION["\155\x6f\137\163\x61\x6d\x6c"]["\156\141\x6d\x65\x49\x64"] = $KB;
    d2B:
    wp_redirect($yl);
    die;
    Lw9:
    goto WGl;
    z_z:
    if (!(strlen($eP) > 60)) {
        goto Lt7;
    }
    wp_die("\127\145\40\143\x6f\x75\154\x64\x6e\x27\x74\x20\x73\151\147\x6e\x20\171\x6f\x75\40\151\x6e\x2e\x20\120\x6c\145\141\163\x65\40\x63\x6f\x6e\164\141\143\x74\40\x79\157\x75\162\40\141\x64\155\x69\156\x69\x73\x74\162\141\x74\x6f\x72", "\125\163\145\162\x6e\x61\x6d\x65\x20\154\145\x6e\147\x74\150\40\154\151\x6d\x69\x74\x20\x72\145\141\x63\x68\x65\144");
    Lt7:
    $user = get_user_by("\154\157\x67\151\x6e", $eP);
    $Zc = $user->ID;
    if (empty($TJ)) {
        goto V59;
    }
    wp_update_user(array("\x49\x44" => $Zc, "\x66\151\162\x73\164\x5f\156\141\155\145" => $TJ));
    V59:
    if (empty($Wm)) {
        goto VHF;
    }
    wp_update_user(array("\x49\x44" => $Zc, "\x6c\141\163\x74\x5f\156\141\x6d\145" => $Wm));
    VHF:
    if (empty($za)) {
        goto kPg;
    }
    wp_update_user(array("\x49\x44" => $Zc, "\x75\x73\x65\162\x5f\145\x6d\x61\151\154" => $za));
    kPg:
    if (!get_option("\x6d\x6f\137\x73\x61\x6d\154\137\x63\x75\163\164\157\x6d\x5f\141\164\x74\162\x73\137\155\x61\160\x70\x69\x6e\x67")) {
        goto r1c;
    }
    $UN = get_option("\155\157\137\x73\141\x6d\x6c\x5f\143\165\x73\164\157\155\137\x61\x74\164\x72\163\137\x6d\x61\160\x70\x69\156\x67");
    $UN = maybe_unserialize($UN);
    if (empty($UN)) {
        goto hzX;
    }
    $Cf = check_if_default_mapping_required(true, $tj);
    if (!$Cf) {
        goto BNI;
    }
    $tj = "\x44\105\106\x41\x55\114\x54";
    BNI:
    if (!array_key_exists($tj, $UN)) {
        goto fdt;
    }
    foreach ($UN[$tj] as $nA => $bc) {
        if (!array_key_exists($bc, $Fi)) {
            goto JOU;
        }
        $s9 = false;
        if (!(count($Fi[$bc]) == 1)) {
            goto ZEg;
        }
        $s9 = true;
        ZEg:
        if (!$s9) {
            goto UL3;
        }
        update_user_meta($Zc, $nA, $Fi[$bc][0]);
        goto L6l;
        UL3:
        $xI = array();
        foreach ($Fi[$bc] as $eh) {
            array_push($xI, $eh);
            kNQ:
        }
        Y71:
        update_user_meta($Zc, $nA, $xI);
        L6l:
        JOU:
        tm9:
    }
    Jyn:
    fdt:
    hzX:
    r1c:
    global $wpdb;
    $I0 = get_option("\x73\x61\155\x6c\137\151\144\x70\x5f\162\x6f\x6c\145\x5f\155\x61\160\160\151\156\147");
    $I0 = maybe_unserialize($I0);
    $tj = $ec["\151\x64\160\137\156\141\x6d\145"];
    $cZ = $tj;
    $Cf = check_if_default_mapping_required(false, $tj);
    if (!$Cf) {
        goto xHx;
    }
    $tj = "\x44\105\x46\x41\x55\x4c\x54";
    xHx:
    if (!(!empty($I0) && !empty($I0[$tj]))) {
        goto Sx2;
    }
    $vE = $I0[$tj]["\144\157\156\164\137\141\x6c\154\157\167\137\165\x6e\154\151\163\x74\145\144\137\165\x73\x65\x72"];
    $Sa = $I0[$tj]["\x64\x65\x66\141\165\x6c\164\137\162\157\154\145"];
    $vf = $I0[$tj]["\144\157\x6e\x74\x5f\x63\162\x65\141\x74\145\x5f\165\163\145\x72"];
    $Xr = $I0[$tj]["\153\x65\145\160\137\x65\170\x69\x73\x74\151\x6e\x67\137\x75\163\x65\162\x73\x5f\162\157\x6c\x65"];
    Sx2:
    if (isset($Xr) && $Xr == "\x63\150\145\x63\153\145\144") {
        goto Dtw;
    }
    $b0 = assign_roles_to_user($user, $I0, $tj, $zF);
    goto Dhi;
    Dtw:
    $b0 = false;
    Dhi:
    if (is_administrator_user($user)) {
        goto Zqe;
    }
    if ($b0 !== true && !empty($Xr) && $Xr == "\143\150\145\143\x6b\x65\144") {
        goto Vo6;
    }
    if ($b0 !== true && !empty($vE) && $vE == "\x63\x68\145\x63\153\x65\x64") {
        goto rb4;
    }
    if ($b0 !== true && !empty($Sa)) {
        goto ege;
    }
    if ($b0 !== true) {
        goto bxK;
    }
    goto QPE;
    Vo6:
    wp_update_user(array("\x49\104" => $Zc));
    goto QPE;
    rb4:
    wp_update_user(array("\x49\x44" => $Zc, "\162\157\154\145" => false));
    goto QPE;
    ege:
    wp_update_user(array("\111\104" => $Zc, "\162\157\154\x65" => $Sa));
    goto QPE;
    bxK:
    $U3 = get_option("\x64\145\x66\x61\x75\x6c\x74\137\x72\157\154\145");
    wp_update_user(array("\111\104" => $Zc, "\162\x6f\154\145" => $U3));
    QPE:
    Zqe:
    if (is_null($Fi)) {
        goto YFc;
    }
    update_user_meta($Zc, "\x6d\x6f\137\163\141\x6d\x6c\137\165\x73\x65\x72\137\141\164\x74\x72\x69\x62\165\164\x65\x73", $Fi);
    if (empty($Pn)) {
        goto oDR;
    }
    if (strcmp($Pn, "\x55\x53\x45\122\116\x41\115\x45") == 0) {
        goto g3T;
    }
    if (strcmp($Pn, "\106\116\x41\x4d\105") == 0 && !empty($TJ)) {
        goto y36;
    }
    if (strcmp($Pn, "\x4c\x4e\x41\115\105") == 0 && !empty($Wm)) {
        goto dMb;
    }
    if (strcmp($Pn, "\x46\116\101\115\105\137\x4c\116\x41\115\x45") == 0 && !empty($Wm) && !empty($TJ)) {
        goto cno;
    }
    if (!(strcmp($Pn, "\114\116\x41\115\105\137\106\116\101\x4d\105") == 0 && !empty($Wm) && !empty($TJ))) {
        goto mJ5;
    }
    wp_update_user(array("\x49\104" => $Zc, "\x64\151\x73\x70\154\x61\171\x5f\156\x61\155\145" => $Wm . "\x20" . $TJ));
    mJ5:
    goto GnR;
    cno:
    wp_update_user(array("\111\104" => $Zc, "\x64\151\x73\x70\154\141\x79\x5f\x6e\141\x6d\145" => $TJ . "\x20" . $Wm));
    GnR:
    goto oaV;
    dMb:
    wp_update_user(array("\x49\104" => $Zc, "\144\x69\163\x70\154\141\171\x5f\x6e\141\x6d\145" => $Wm));
    oaV:
    goto UK2;
    y36:
    wp_update_user(array("\111\x44" => $Zc, "\x64\x69\x73\160\x6c\x61\171\x5f\156\141\x6d\145" => $TJ));
    UK2:
    goto DGA;
    g3T:
    wp_update_user(array("\111\x44" => $Zc, "\144\151\163\x70\154\141\x79\137\x6e\141\155\x65" => $user->user_login));
    DGA:
    oDR:
    YFc:
    $yl = '';
    $jO = get_option("\155\157\x5f\163\141\155\x6c\x5f\162\x65\154\x61\x79\137\x73\x74\141\164\x65");
    if (!empty($jO)) {
        goto eKP;
    }
    if (!empty($hZ)) {
        goto Yw1;
    }
    $yl = $ag;
    goto bOx;
    Yw1:
    if (!filter_var($hZ, FILTER_VALIDATE_URL)) {
        goto HN9;
    }
    if (parse_url(home_url(), PHP_URL_HOST) === parse_url($hZ, PHP_URL_HOST)) {
        goto DnM;
    }
    $yl = $ag;
    goto kFE;
    DnM:
    $yl = $hZ;
    kFE:
    goto Zc1;
    HN9:
    $yl = $hZ;
    Zc1:
    bOx:
    goto nU3;
    eKP:
    $yl = $jO;
    nU3:
    do_action("\x6d\151\x6e\151\x6f\x72\141\156\x67\x65\137\x70\157\163\x74\x5f\141\165\x74\150\145\156\x74\151\143\x61\164\x65\137\165\163\145\162\x5f\154\x6f\x67\x69\x6e", $user, null, $yl, true);
    wp_set_current_user($Zc);
    $R4 = false;
    $R4 = apply_filters("\x6d\x6f\x5f\162\145\x6d\145\x6d\142\x65\162\137\x6d\x65", $R4);
    wp_set_auth_cookie($Zc, $R4);
    $user = get_user_by("\151\144", $Zc);
    do_action("\x77\x70\x5f\x6c\x6f\147\x69\156", $user->user_login, $user);
    if (empty($cZ)) {
        goto t9U;
    }
    update_user_meta($Zc, "\155\157\x5f\x73\x61\x6d\x6c\x5f\154\x6f\147\x67\x65\144\x5f\x69\x6e\x5f\167\151\x74\150\x5f\151\x64\160", $cZ);
    t9U:
    if (empty($oz)) {
        goto Cni;
    }
    update_user_meta($Zc, "\x6d\x6f\x5f\x73\141\x6d\x6c\137\163\145\x73\x73\151\x6f\156\137\151\156\x64\x65\x78", $oz);
    Cni:
    if (empty($KB)) {
        goto Bbn;
    }
    update_user_meta($Zc, "\x6d\x6f\x5f\163\141\155\x6c\137\156\141\155\x65\137\x69\x64", $KB);
    Bbn:
    do_action("\x6d\x6f\137\163\141\155\x6c\x5f\141\x74\x74\x72\x69\142\165\164\145\163", $eP, $za, $TJ, $Wm, $zF, $Wz);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto H2S;
    }
    session_start();
    H2S:
    $_SESSION["\x6d\x6f\137\x73\x61\x6d\154"]["\154\157\x67\147\145\x64\137\x69\x6e\137\x77\151\164\150\137\x69\x64\x70"] = $cZ;
    if (empty($oz)) {
        goto tAJ;
    }
    $_SESSION["\x6d\x6f\x5f\163\141\x6d\154"]["\163\x65\163\x73\151\x6f\156\x49\156\144\145\170"] = $oz;
    tAJ:
    if (empty($KB)) {
        goto idH;
    }
    $_SESSION["\155\157\x5f\163\x61\155\x6c"]["\x6e\141\155\x65\111\x64"] = $KB;
    idH:
    wp_redirect($yl);
    die;
    WGl:
}
function check_if_user_allowed_to_login_due_to_role_restriction($zF, $tj)
{
    $I0 = get_option("\163\x61\155\x6c\137\x69\144\160\x5f\x72\157\154\x65\x5f\x6d\141\160\160\151\x6e\x67");
    $I0 = maybe_unserialize($I0);
    $Cf = check_if_default_mapping_required(false, $tj);
    if (!$Cf) {
        goto YTs;
    }
    $tj = "\104\105\106\101\125\x4c\x54";
    YTs:
    if (!(!empty($I0) && array_key_exists($tj, $I0))) {
        goto wV_;
    }
    $u2 = $I0[$tj]["\144\157\x6e\x74\x5f\x61\x6c\x6c\x6f\x77\137\165\x73\x65\x72\x5f\x74\x6f\x6c\x6f\x67\x69\x6e\137\x63\x72\x65\141\164\x65\137\x77\x69\164\x68\137\x67\x69\166\145\x6e\137\147\x72\x6f\165\x70\x73"];
    if (!($u2 == "\143\x68\145\143\x6b\x65\144")) {
        goto Da6;
    }
    if (empty($zF)) {
        goto Z6j;
    }
    $Zp = $I0[$tj]["\155\157\x5f\x73\141\x6d\154\137\162\x65\x73\x74\162\151\143\x74\x5f\165\x73\x65\x72\x73\137\x77\x69\x74\150\x5f\x67\162\x6f\165\160\163"];
    $x5 = explode("\73", $Zp);
    foreach ($x5 as $yt) {
        foreach ($zF as $NV) {
            $NV = trim($NV);
            if (!(!empty($NV) && $NV == $yt)) {
                goto l7H;
            }
            wp_die("\x59\157\x75\x20\x61\162\x65\40\x6e\x6f\164\40\x61\x75\x74\x68\x6f\x72\x69\172\x65\144\40\164\x6f\40\154\x6f\147\x69\156\56\40\120\x6c\145\141\163\145\x20\143\x6f\156\x74\141\143\x74\40\x79\157\x75\162\40\141\144\x6d\x69\156\151\x73\x74\x72\x61\164\x6f\x72\x2e", "\105\x72\162\x6f\x72");
            l7H:
            rKk:
        }
        WsA:
        Kzq:
    }
    jL2:
    Z6j:
    Da6:
    wV_:
}
function assign_roles_to_user($user, $I0, $tj, $zF)
{
    $b0 = false;
    if (!(!empty($zF) && !empty($I0) && !is_administrator_user($user) && !empty($I0[$tj]))) {
        goto ef6;
    }
    $user->set_role(false);
    $QV = '';
    $z4 = false;
    $mA = $I0[$tj];
    unset($mA["\x64\x65\146\141\165\154\x74\x5f\x72\x6f\x6c\x65"]);
    unset($mA["\x64\157\x6e\164\x5f\143\x72\145\x61\x74\x65\137\165\x73\145\162"]);
    unset($mA["\144\157\x6e\164\x5f\141\x6c\x6c\157\x77\x5f\165\x6e\154\151\x73\164\145\x64\x5f\x75\x73\x65\x72"]);
    unset($mA["\155\x6f\x5f\x73\x61\155\154\137\162\x65\163\164\162\x69\143\164\x5f\165\x73\x65\162\163\x5f\167\151\x74\x68\137\x67\162\x6f\x75\x70\163"]);
    unset($mA["\153\x65\x65\160\137\145\170\151\x73\x74\151\x6e\x67\137\165\163\x65\x72\163\137\x72\x6f\154\145"]);
    unset($mA["\144\157\156\x74\137\141\154\x6c\157\x77\137\165\x73\x65\162\x5f\164\157\154\157\147\151\x6e\137\x63\x72\x65\141\164\145\x5f\167\x69\164\x68\x5f\x67\x69\x76\145\156\137\147\162\x6f\165\x70\x73"]);
    foreach ($mA as $v2 => $Ds) {
        $x5 = explode("\73", $Ds);
        foreach ($x5 as $yt) {
            if (!(!empty($yt) and in_array($yt, $zF))) {
                goto D4w;
            }
            $b0 = true;
            $user->add_role($v2);
            D4w:
            bt3:
        }
        orl:
        QuV:
    }
    LuI:
    ef6:
    return $b0;
}
function get_saml_roles_to_assign($I0, $tj, $zF)
{
    $el = array();
    if (!(!empty($zF) && !empty($I0) && !empty($I0[$tj]))) {
        goto hlT;
    }
    unset($I0[$tj]["\x64\x65\146\x61\x75\x6c\x74\x5f\x72\x6f\x6c\x65"]);
    unset($I0[$tj]["\144\157\x6e\164\137\143\x72\x65\x61\164\x65\x5f\165\x73\145\162"]);
    unset($I0[$tj]["\x64\x6f\156\x74\137\x61\154\x6c\x6f\x77\137\165\x6e\x6c\x69\163\x74\145\144\x5f\165\163\145\x72"]);
    unset($I0[$tj]["\x6d\157\137\x73\x61\x6d\x6c\x5f\x72\145\x73\164\162\x69\143\x74\137\x75\163\145\162\163\137\167\151\x74\x68\137\x67\x72\157\165\160\163"]);
    unset($I0[$tj]["\153\145\x65\160\137\x65\x78\x69\x73\164\151\156\x67\137\165\x73\x65\x72\x73\137\x72\x6f\x6c\x65"]);
    unset($I0[$tj]["\x64\157\x6e\164\x5f\x61\154\x6c\157\167\x5f\x75\163\145\162\x5f\164\157\x6c\x6f\147\x69\x6e\x5f\x63\162\x65\x61\164\145\137\167\151\164\150\137\x67\x69\x76\x65\x6e\x5f\147\x72\157\x75\x70\x73"]);
    foreach ($I0[$tj] as $v2 => $Ds) {
        $x5 = explode("\x3b", $Ds);
        foreach ($x5 as $yt) {
            if (!(!empty($yt) and in_array($yt, $zF))) {
                goto FAG;
            }
            array_push($el, $v2);
            FAG:
            fvJ:
        }
        Dc8:
        cBH:
    }
    eJr:
    hlT:
    return $el;
}
function show_status_error($G4, $hZ)
{
    if ($hZ == "\164\x65\163\164\126\141\154\151\x64\141\x74\x65") {
        goto jj4;
    }
    wp_die("\127\145\40\x63\x6f\x75\x6c\144\40\x6e\x6f\164\40\163\x69\x67\x6e\40\171\x6f\x75\40\151\156\x2e\40\x50\154\145\x61\x73\x65\40\x63\x6f\x6e\x74\141\143\164\40\x79\157\165\x72\x20\x41\x64\x6d\151\x6e\151\x73\164\x72\x61\164\157\x72\x2e", "\105\162\162\157\162\x3a\40\111\x6e\x76\x61\x6c\x69\144\x20\x53\x41\x4d\x4c\x20\122\145\163\160\157\156\163\145\40\123\x74\x61\x74\165\163");
    goto x2N;
    jj4:
    echo "\74\x64\x69\x76\x20\163\164\x79\154\145\75\42\x66\x6f\x6e\x74\55\x66\x61\155\151\x6c\x79\x3a\x43\x61\x6c\151\142\162\151\x3b\160\141\144\x64\151\x6e\x67\x3a\x30\x20\x33\45\73\42\x3e";
    echo "\x3c\144\x69\x76\x20\163\x74\x79\154\145\x3d\x22\143\157\154\157\162\72\40\x23\141\71\64\x34\x34\62\73\x62\x61\143\153\x67\x72\157\165\x6e\144\55\x63\x6f\x6c\157\162\72\40\x23\x66\x32\x64\x65\x64\x65\x3b\x70\x61\x64\x64\151\x6e\147\72\x20\61\65\160\170\x3b\x6d\x61\162\147\151\156\x2d\142\157\164\164\157\155\x3a\40\x32\60\x70\170\73\x74\x65\x78\x74\55\141\x6c\151\147\156\x3a\143\x65\156\164\145\x72\73\x62\157\162\x64\x65\x72\x3a\61\x70\x78\40\x73\157\154\x69\x64\x20\43\105\x36\102\63\x42\62\73\x66\157\156\x74\x2d\163\x69\x7a\145\72\61\x38\160\x74\73\x22\x3e\40\105\122\122\117\x52\x3c\x2f\x64\151\x76\x3e\15\xa\x20\x20\40\40\x20\40\x20\x20\74\x64\151\x76\x20\163\x74\x79\x6c\x65\x3d\x22\143\157\154\157\162\72\x20\x23\141\x39\x34\x34\64\62\73\146\157\x6e\164\x2d\x73\x69\172\145\x3a\61\x34\x70\x74\73\x20\x6d\x61\x72\x67\x69\x6e\55\x62\x6f\x74\x74\157\x6d\72\x32\60\160\x78\x3b\x22\76\x3c\160\76\x3c\x73\x74\x72\x6f\x6e\147\x3e\105\x72\162\157\x72\72\40\74\57\x73\164\x72\x6f\156\147\x3e\x20\111\156\x76\x61\x6c\x69\x64\40\x53\x41\x4d\114\x20\x52\145\163\160\x6f\x6e\x73\145\40\123\164\141\x74\165\x73\x2e\x3c\57\x70\x3e\xd\xa\x20\40\40\x20\40\x20\40\x20\40\x20\40\40\74\x70\76\x3c\x73\x74\x72\x6f\156\x67\x3e\x43\141\x75\x73\x65\x73\x3c\x2f\x73\x74\162\157\156\147\76\x3a\40\111\144\145\156\164\x69\x74\171\x20\x50\162\157\x76\x69\x64\x65\162\40\150\141\163\x20\x73\145\156\164\40\47" . $G4 . "\47\40\163\x74\141\x74\x75\x73\40\143\x6f\x64\x65\40\151\x6e\x20\123\x41\x4d\114\40\x52\145\x73\x70\157\x6e\x73\x65\56\x20\74\57\160\76\15\12\x20\40\x20\x20\40\40\x20\x20\40\x20\40\x20\x3c\160\x3e\74\163\x74\162\157\156\x67\76\122\145\x61\163\157\x6e\x3c\x2f\x73\164\x72\x6f\156\147\76\x3a\40" . get_status_message($G4) . "\x3c\x2f\x70\x3e\x3c\x62\x72\76";
    if (empty($RH)) {
        goto XkR;
    }
    echo "\x3c\x70\76\74\x73\164\162\x6f\156\x67\76\123\x74\141\164\165\x73\x20\x4d\145\x73\163\x61\147\x65\x20\x69\156\40\x74\x68\x65\x20\x53\x41\x4d\114\x20\x52\145\x73\160\157\156\163\x65\x3a\x3c\x2f\163\164\162\x6f\x6e\x67\x3e\x20\x3c\142\162\x2f\76" . $RH . "\74\57\160\76\74\x62\162\x3e";
    XkR:
    echo "\xd\12\x20\40\40\x20\x20\x20\x20\40\x3c\57\x64\151\x76\76\15\xa\15\xa\x20\x20\x20\40\x20\x20\x20\40\74\144\151\x76\x20\x73\164\x79\x6c\145\75\x22\155\x61\x72\147\151\x6e\72\x33\x25\73\144\x69\x73\160\x6c\141\171\x3a\142\x6c\157\x63\x6b\73\x74\x65\x78\164\55\141\x6c\x69\147\x6e\x3a\143\x65\x6e\x74\x65\162\x3b\x22\76\xd\xa\40\40\40\x20\40\40\x20\x20\x20\x20\40\40\74\x64\x69\x76\40\x73\164\171\154\145\x3d\x22\x6d\x61\x72\147\x69\x6e\72\x33\x25\x3b\144\x69\x73\x70\x6c\x61\171\x3a\142\154\157\143\153\x3b\164\x65\x78\164\x2d\141\154\151\147\x6e\x3a\x63\x65\x6e\x74\145\x72\73\x22\x3e\74\x69\x6e\160\x75\x74\40\163\x74\x79\154\x65\x3d\x22\x70\x61\x64\x64\151\x6e\147\x3a\x31\x25\73\x77\151\x64\164\x68\72\61\x30\60\x70\170\x3b\142\x61\x63\x6b\x67\162\157\165\156\x64\x3a\40\43\x30\x30\71\61\103\x44\x20\x6e\157\156\145\40\x72\x65\x70\145\x61\164\40\163\143\x72\x6f\x6c\154\x20\60\x25\x20\60\45\x3b\143\x75\162\x73\157\x72\x3a\40\160\157\151\x6e\x74\145\162\73\146\157\156\x74\x2d\163\151\x7a\x65\72\x31\x35\160\x78\x3b\x62\157\x72\144\x65\x72\x2d\x77\151\x64\x74\x68\72\40\61\160\170\73\x62\x6f\162\144\145\x72\x2d\x73\164\171\x6c\145\72\40\163\157\154\x69\144\73\142\157\162\x64\145\x72\55\162\x61\x64\151\165\163\x3a\x20\63\x70\170\x3b\167\x68\151\164\x65\55\163\160\x61\143\145\x3a\x20\156\157\167\x72\141\160\x3b\142\x6f\x78\55\x73\x69\172\151\x6e\147\72\x20\142\157\162\x64\x65\x72\x2d\142\x6f\170\x3b\142\157\x72\144\x65\x72\x2d\143\x6f\154\x6f\x72\72\40\43\60\x30\x37\x33\101\101\73\x62\x6f\170\x2d\x73\x68\x61\144\157\167\72\x20\x30\x70\170\x20\61\x70\x78\x20\60\160\170\40\162\x67\142\141\50\61\62\60\54\40\62\60\x30\x2c\40\x32\63\x30\54\40\60\x2e\x36\51\x20\151\x6e\163\x65\164\x3b\x63\x6f\x6c\x6f\x72\x3a\x20\x23\x46\x46\106\73\42\x74\171\x70\x65\75\x22\x62\165\164\x74\157\x6e\42\x20\x76\x61\154\x75\145\75\x22\104\x6f\156\x65\x22\40\157\156\x43\x6c\x69\x63\153\x3d\42\163\x65\154\146\x2e\x63\154\x6f\x73\145\x28\51\x3b\x22\x3e\x3c\57\144\x69\x76\x3e";
    die;
    x2N:
}
function addLink($j1, $zx)
{
    $sh = "\74\x61\x20\x68\162\x65\x66\x3d\42" . $zx . "\x22\76" . $j1 . "\74\x2f\141\76";
    return $sh;
}
function get_status_message($G4)
{
    switch ($G4) {
        case "\122\145\161\x75\x65\163\x74\x65\x72":
            return "\124\150\145\40\x72\145\161\165\145\x73\164\40\x63\157\x75\154\144\40\x6e\x6f\x74\x20\x62\145\x20\x70\x65\162\x66\157\x72\x6d\x65\144\x20\x64\x75\145\x20\164\x6f\x20\x61\x6e\x20\x65\x72\162\x6f\x72\40\x6f\x6e\x20\164\150\145\x20\x70\x61\162\164\x20\x6f\146\x20\164\x68\x65\x20\162\145\x71\x75\x65\163\164\145\x72\56";
            goto w0N;
        case "\122\x65\x73\x70\157\156\x64\x65\162":
            return "\x54\150\145\40\162\145\x71\165\x65\163\164\40\x63\157\x75\x6c\x64\x20\156\x6f\164\x20\x62\x65\x20\160\x65\162\146\157\162\155\145\x64\40\x64\165\x65\x20\164\x6f\40\141\156\x20\145\x72\x72\x6f\162\40\x6f\156\x20\x74\150\x65\40\x70\141\x72\x74\x20\157\146\40\x74\x68\145\x20\x53\x41\x4d\x4c\40\x72\145\x73\x70\x6f\x6e\144\x65\x72\40\157\162\40\123\101\x4d\x4c\40\x61\x75\x74\150\x6f\x72\151\x74\171\56";
            goto w0N;
        case "\x56\145\x72\163\x69\157\156\x4d\151\x73\x6d\x61\164\143\x68":
            return "\x54\150\145\x20\123\x41\115\x4c\x20\162\145\x73\x70\x6f\156\x64\x65\162\x20\143\157\x75\154\144\x20\156\157\164\x20\160\x72\x6f\143\x65\x73\x73\x20\164\x68\145\40\x72\145\161\165\145\x73\x74\40\142\145\x63\x61\165\163\145\x20\x74\x68\145\x20\x76\145\x72\x73\151\x6f\156\x20\x6f\x66\40\164\150\x65\x20\x72\x65\x71\165\145\163\164\40\155\x65\x73\163\x61\147\145\40\x77\141\x73\40\151\156\x63\x6f\x72\162\x65\x63\164\x2e";
            goto w0N;
        default:
            return "\125\156\x6b\156\157\x77\x6e";
    }
    GyU:
    w0N:
}
function is_administrator_user($user)
{
    $P5 = $user->roles;
    if (!is_null($P5) && in_array("\x61\144\x6d\151\x6e\x69\163\164\162\141\164\157\x72", $P5)) {
        goto G5T;
    }
    return false;
    goto RWE;
    G5T:
    return true;
    RWE:
}
function mo_saml_is_customer_registered()
{
    $MI = get_option("\155\157\137\x73\x61\x6d\154\137\x61\144\x6d\x69\x6e\x5f\145\x6d\x61\x69\x6c");
    $nU = get_option("\x6d\157\137\163\141\x6d\154\x5f\x61\144\155\x69\x6e\x5f\143\x75\x73\164\157\x6d\145\162\x5f\x6b\145\x79");
    if (!$MI || !$nU || !is_numeric(trim($nU))) {
        goto Aha;
    }
    return 1;
    goto UIz;
    Aha:
    return 0;
    UIz:
}
function saml_get_current_page_url()
{
    $e5 = $_SERVER["\x48\x54\124\x50\137\110\117\x53\124"];
    if (!(substr($e5, -1) == "\57")) {
        goto sqm;
    }
    $e5 = substr($e5, 0, -1);
    sqm:
    $Au = $_SERVER["\122\x45\121\x55\x45\x53\x54\x5f\125\x52\x49"];
    if (!(substr($Au, 0, 1) == "\57")) {
        goto djS;
    }
    $Au = substr($Au, 1);
    djS:
    $d7 = isset($_SERVER["\x48\124\124\x50\x53"]) && strcasecmp($_SERVER["\110\124\124\120\x53"], "\157\x6e") == 0;
    $ap = "\150\x74\x74\x70" . ($d7 ? "\163" : '') . "\72\57\x2f" . $e5 . "\x2f" . $Au;
    return $ap;
}
add_action("\x77\151\144\x67\145\164\163\137\151\x6e\x69\x74", function () {
    register_widget("\x4d\x6f\137\123\x41\115\x4c\137\114\x6f\x67\x69\156\137\127\151\x64\x67\x65\164");
});
add_action("\x77\x70\137\145\x6e\161\165\145\165\x65\x5f\x73\143\162\x69\x70\x74\x73", "\160\154\165\147\151\156\x5f\163\145\164\x74\x69\x6e\147\x73\x5f\163\x74\171\x6c\x65\x5f\167\x69\x64\x67\x65\x74");
add_action("\x77\x70\137\145\x6e\161\x75\145\165\x65\x5f\163\x63\162\x69\160\164\163", "\x70\154\165\147\151\156\137\x73\145\x74\x74\151\x6e\x67\x73\x5f\x73\x63\162\x69\160\164\x5f\167\151\144\147\145\x74");
add_action("\x69\x6e\151\164", "\155\157\x5f\x6c\157\x67\x69\x6e\137\166\141\154\151\144\141\x74\145");
?>
