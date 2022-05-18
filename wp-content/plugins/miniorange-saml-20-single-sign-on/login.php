<?php
/*
 * Plugin Name: miniOrange SAML SSO Multiple IDP
 * Plugin URI: http://miniorange.com/
 * Description: (Single Site Multiple IdP)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
 * Version: 25.0.1
 * Author: miniOrange
 * Author URI: http://miniorange.com/
 */


include_once dirname(__FILE__) . "\57\155\x6f\x5f\154\x6f\147\x69\x6e\137\x73\x61\155\154\x5f\163\163\x6f\137\x77\151\144\x67\x65\x74\x2e\x70\x68\x70";
require "\155\x6f\x2d\x73\141\155\x6c\x2d\143\x6c\141\163\x73\x2d\x63\165\x73\x74\157\x6d\145\162\56\160\150\x70";
require "\x6d\x6f\x5f\163\141\155\x6c\137\163\x65\x74\164\x69\x6e\x67\163\137\x70\141\147\145\56\160\150\x70";
require "\115\145\164\141\144\141\x74\141\122\145\141\144\145\162\56\160\x68\x70";
include_once "\x78\x6d\x6c\163\145\143\154\151\142\x73\x2e\160\x68\160";
require_once "\155\157\55\163\x61\155\x6c\x2d\160\154\x75\x67\151\156\55\166\145\x72\163\151\157\x6e\55\x75\160\x64\x61\164\x65\x2e\160\150\160";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
class Mo_SAML_Plugin
{
    function __construct()
    {
        add_action("\141\x64\x6d\151\x6e\x5f\x6d\145\156\x75", array($this, "\155\151\156\x69\157\x72\141\x6e\147\x65\x5f\163\x73\157\x5f\155\145\156\x75"));
        add_action("\141\144\x6d\151\x6e\137\x69\156\x69\x74", array($this, "\155\151\156\151\x6f\x72\141\156\147\145\x5f\154\157\x67\x69\156\x5f\x77\x69\x64\147\145\164\137\x73\x61\155\x6c\137\163\x61\x76\145\137\x73\145\164\164\151\156\147\163"));
        add_action("\x61\x64\x6d\x69\156\x5f\x65\x6e\161\165\145\165\x65\x5f\163\143\x72\151\160\164\x73", array($this, "\160\x6c\165\x67\151\156\137\x73\145\164\x74\x69\156\x67\163\137\163\164\171\x6c\145"));
        register_activation_hook(__FILE__, array($this, "\x6d\x6f\137\x73\163\157\137\163\141\155\x6c\137\141\x63\164\151\x76\141\164\145"));
        register_deactivation_hook(__FILE__, array($this, "\x6d\x6f\137\x73\163\157\x5f\163\x61\x6d\x6c\x5f\x64\145\x61\143\x74\151\166\x61\x74\145"));
        add_action("\141\144\155\151\156\x5f\x65\x6e\161\165\x65\165\145\137\x73\143\162\x69\160\164\x73", array($this, "\160\154\x75\147\151\156\x5f\x73\145\164\164\151\x6e\x67\x73\x5f\x73\143\x72\x69\x70\164"));
        remove_action("\x61\x64\x6d\x69\x6e\137\156\157\x74\x69\143\x65\x73", array($this, "\155\x6f\137\163\x61\155\x6c\137\x73\165\143\143\145\x73\x73\x5f\x6d\x65\163\163\141\x67\x65"));
        remove_action("\x61\x64\155\x69\x6e\137\x6e\157\x74\x69\143\x65\x73", array($this, "\155\157\x5f\x73\141\x6d\x6c\137\145\162\162\157\x72\x5f\x6d\x65\x73\x73\x61\x67\x65"));
        add_filter("\141\165\x74\x68\x65\x6e\x74\151\143\x61\164\x65", array($this, "\155\157\x5f\x73\141\x6d\154\x5f\x61\165\164\x68\x65\156\x74\151\143\x61\164\x65"), 30, 3);
        add_action("\167\x70\x5f\x61\x75\x74\x68\x65\156\164\x69\143\141\164\145", array($this, "\x6d\x6f\137\163\x61\155\x6c\137\x72\x65\144\151\162\145\143\164\x5f\164\x6f\137\151\144\160\137\x6c\x69\x73\x74\x5f\x70\141\x67\145\137\146\x72\157\155\x5f\x6c\x6f\x67\151\156\137\160\x61\x67\x65"));
        add_action("\x77\160", array($this, "\155\x6f\137\x73\x61\x6d\x6c\x5f\x61\165\164\x6f\x5f\162\145\x64\x69\x72\x65\143\x74"));
        $bJ = new Mo_SAML_Login_Widget();
        add_filter("\x6c\157\x67\157\x75\164\x5f\x72\145\x64\151\x72\x65\143\164", array($bJ, "\x6d\x6f\137\x73\141\x6d\154\137\x6c\x6f\x67\157\x75\164"), 10, 3);
        add_action("\x6c\157\x67\x69\156\x5f\146\157\162\x6d", array($this, "\155\157\137\x73\x61\x6d\154\x5f\155\157\144\x69\x66\171\x5f\x6c\157\x67\151\x6e\x5f\146\x6f\x72\155"), 10, 1);
        add_action("\154\157\147\x69\156\137\146\157\x72\155", array($this, "\x6d\x6f\x5f\x73\141\155\154\137\141\144\144\x5f\x6c\157\x67\x69\x6e\x5f\x6c\x69\156\x6b\163"), 15, 1);
        add_shortcode("\115\x4f\137\x53\x41\x4d\114\137\x4c\x4f\x47\111\116", array($this, "\155\x6f\x5f\x67\145\x74\137\163\141\155\154\x5f\154\x6f\147\151\156\137\x73\x68\x6f\x72\164\143\x6f\x64\145"));
        add_shortcode("\x4d\117\x5f\123\101\115\114\137\x49\x44\x50\x5f\114\111\x53\x54", array($this, "\x6d\157\x5f\x67\145\164\x5f\163\141\155\154\x5f\x69\x64\x70\x5f\154\151\163\x74\137\163\150\157\162\x74\x63\x6f\144\145"));
        add_action("\151\x6e\x69\164", array($this, "\155\157\x5f\163\x61\155\154\137\x69\x6e\x69\x74\x5f\x6c\x6f\x67\x69\x6e\137\x66\x6f\162\x6d"));
        add_action("\x6c\x6f\147\151\156\137\146\157\157\x74\x65\x72", array($this, "\x6d\x6f\x5f\x73\x61\x6d\154\137\146\x6f\157\164\x65\162\x5f\x66\157\162\x6d"));
        add_action("\x6c\157\x67\151\x6e\x5f\145\x6e\161\165\145\165\x65\137\x73\x63\162\x69\x70\164\x73", array($this, "\x6d\157\x5f\163\x61\155\x6c\137\152\x71\165\x65\162\x79\137\144\x65\x66\x61\165\154\164\137\154\x6f\x67\x69\x6e"));
        add_filter("\x63\162\157\156\x5f\x73\143\150\145\x64\165\154\145\163", array($this, "\155\171\x70\x72\x65\146\x69\x78\x5f\141\x64\144\x5f\143\x72\157\x6e\x5f\163\143\150\x65\x64\165\x6c\x65"));
        add_action("\x6d\145\164\141\144\141\164\141\x5f\163\171\x6e\143\x5f\143\x72\157\156\x5f\x61\143\x74\151\157\156", array($this, "\155\145\164\141\x64\141\x74\x61\x5f\x73\171\156\143\x5f\143\x72\x6f\x6e\137\x61\143\164\x69\157\156"), 10, 1);
        add_action("\x61\144\155\x69\x6e\x5f\151\x6e\x69\164", array($this, "\144\x65\x66\141\165\x6c\164\137\x63\x65\162\x74\151\146\151\143\x61\x74\145"));
        add_filter("\x6d\141\x6e\141\147\x65\137\x75\x73\145\x72\x73\x5f\x63\x6f\154\x75\x6d\156\163", array($this, "\x6d\x6f\x5f\x73\141\155\x6c\137\143\165\x73\x74\x6f\x6d\137\x61\164\164\x72\x5f\x63\157\154\165\x6d\156"));
        add_filter("\155\141\x6e\x61\x67\x65\x5f\165\163\145\162\x73\x5f\143\x75\163\164\x6f\x6d\x5f\x63\157\154\165\x6d\156", array($this, "\x6d\x6f\137\x73\141\155\x6c\x5f\141\164\x74\162\137\143\x6f\x6c\165\155\x6e\x5f\143\x6f\156\164\x65\x6e\x74"), 10, 3);
        add_action("\141\144\155\x69\x6e\x5f\x69\156\151\x74", "\155\x6f\137\163\x61\x6d\154\137\144\157\167\156\x6c\x6f\x61\144");
    }
    function mo_sso_saml_activate()
    {
        $this->mo_saml_sso_fetch_exisitng_configuration();
    }
    function mo_saml_sso_fetch_exisitng_configuration()
    {
        $q9 = get_option("\x73\x61\155\154\137\x69\x64\145\156\164\151\x74\x79\137\x70\x72\157\166\x69\x64\145\162\163");
        if (!(empty($q9) && !empty(get_option("\x73\141\x6d\154\137\x69\x64\x65\x6e\x74\x69\x74\171\137\156\x61\155\145")))) {
            goto wH;
        }
        $this->fetch_existing_saml_idp_config();
        wH:
    }
    function fetch_existing_saml_idp_config()
    {
        $q9 = array();
        $Gt = get_option("\163\141\x6d\154\x5f\x69\144\145\156\164\151\164\x79\x5f\156\x61\155\145");
        $kl = get_option("\163\141\155\x6c\137\154\157\x67\x69\156\x5f\165\x72\154");
        $UG = get_option("\x73\x61\155\154\x5f\x69\x73\163\165\x65\x72");
        $oy = !empty(get_option("\x6d\x6f\137\x73\141\155\x6c\137\x65\x6e\143\x6f\144\x69\156\x67\x5f\x65\x6e\141\142\x6c\145\x64")) ? get_option("\155\157\x5f\x73\x61\x6d\x6c\137\x65\156\x63\x6f\144\151\x6e\147\137\x65\156\141\142\x6c\145\x64") : "\x63\150\x65\143\153\145\144";
        $A7 = get_option("\163\x61\155\154\137\x78\x35\60\71\x5f\143\145\x72\164\151\x66\151\x63\x61\x74\145");
        $UC = get_option("\x73\141\x6d\x6c\x5f\154\x6f\147\x69\156\137\142\151\x6e\144\x69\156\x67\x5f\x74\171\x70\145");
        $XB = get_option("\x73\x61\155\x6c\137\x6c\x6f\x67\x6f\165\x74\x5f\165\162\x6c");
        $FB = get_option("\x73\x61\x6d\x6c\137\x6c\157\147\x6f\x75\164\x5f\x62\x69\x6e\x64\151\156\147\137\164\x79\160\145");
        $G3 = get_option("\x73\x61\x6d\x6c\x5f\156\141\x6d\x65\151\x64\137\146\157\x72\155\x61\164");
        $nS = !empty(get_option("\163\x61\155\154\137\162\x65\x71\x75\145\163\164\x5f\x73\x69\147\x6e\x65\x64")) ? get_option("\163\141\x6d\154\137\162\x65\x71\x75\x65\163\164\x5f\163\x69\x67\x6e\145\144") : "\x75\x6e\143\x68\145\143\153\145\144";
        $I_ = "\x59\145\163";
        $iw = "\131\x65\x73";
        $yV = get_option("\x73\x61\155\154\x5f\141\x6d\x5f\144\x65\x66\141\x75\154\164\x5f\165\163\x65\x72\137\x72\x6f\154\x65");
        $q9[$Gt] = array("\x69\x64\160\x5f\156\141\x6d\145" => $Gt, "\x69\x64\x70\x5f\145\156\164\151\x74\x79\137\x69\x64" => $UG, "\163\x73\x6f\x5f\x75\162\154" => $kl, "\x73\x73\157\137\x62\151\156\144\151\x6e\147\137\164\171\x70\145" => $UC, "\163\154\157\x5f\x75\162\154" => $XB, "\x73\x6c\x6f\137\x62\151\x6e\144\x69\x6e\147\x5f\164\x79\x70\145" => $FB, "\170\65\x30\x39\x5f\x63\x65\162\x74\151\x66\x69\143\x61\x74\145" => $A7, "\162\145\163\160\157\x6e\163\x65\137\x73\x69\x67\156\x65\144" => $I_, "\141\163\163\x65\x72\x74\151\x6f\156\137\x73\x69\x67\x6e\145\x64" => $iw, "\162\145\x71\165\x65\x73\164\137\163\x69\147\156\145\144" => $nS, "\x6e\141\x6d\x65\151\x64\x5f\x66\x6f\162\155\141\164" => $G3, "\x6d\157\137\163\141\155\x6c\x5f\145\x6e\143\x6f\x64\x69\156\x67\137\x65\156\141\x62\154\145\144" => $oy, "\x65\156\x61\142\x6c\145\137\151\144\160" => true);
        $lj[$Gt]["\x64\x65\x66\141\x75\154\164\137\162\157\154\x65"] = $yV;
        update_option("\x73\141\x6d\154\x5f\151\144\145\x6e\164\x69\x74\171\x5f\160\x72\x6f\x76\151\x64\x65\162\x73", $q9);
        update_option("\x73\x61\155\x6c\x5f\x69\x64\160\x5f\162\x6f\154\145\137\155\141\160\x70\151\x6e\147", $lj);
        update_option("\163\x61\155\x6c\x5f\144\x65\x66\141\x75\x6c\164\x5f\151\144\160", $Gt);
    }
    function default_certificate()
    {
        $CH = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\163\157\165\162\143\145\163" . DIRECTORY_SEPARATOR . "\155\151\156\x69\157\x72\x61\156\147\x65\x5f\163\160\x5f\154\x61\164\145\x73\x74\56\143\x72\x74");
        $aS = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\157\x75\162\143\x65\163" . DIRECTORY_SEPARATOR . "\x6d\151\156\x69\x6f\x72\x61\156\147\x65\x5f\x73\x70\x5f\154\141\x74\145\163\x74\137\x70\162\x69\166\56\153\x65\171");
        if (!(!get_option("\x6d\157\137\163\x61\x6d\154\x5f\143\x75\x72\162\145\x6e\164\x5f\x63\x65\162\x74") && !get_option("\x6d\x6f\x5f\163\141\155\x6c\137\x63\165\162\x72\x65\156\x74\137\x63\145\162\x74\x5f\160\162\151\166\141\x74\x65\x5f\x6b\x65\171"))) {
            goto Y3;
        }
        if (get_option("\x6d\157\137\x73\x61\155\x6c\137\143\x65\x72\x74") && get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\143\x65\162\x74\137\x70\x72\151\166\x61\164\145\137\153\x65\171")) {
            goto cj;
        }
        update_option("\155\157\137\x73\x61\x6d\x6c\x5f\x63\x75\x72\x72\x65\156\x74\137\143\x65\x72\x74", $CH);
        update_option("\x6d\x6f\137\x73\141\x6d\x6c\137\x63\165\x72\162\x65\156\x74\x5f\143\x65\162\164\137\x70\162\151\166\141\x74\x65\137\x6b\x65\171", $aS);
        goto Db;
        cj:
        update_option("\x6d\157\x5f\x73\141\x6d\154\137\x63\x75\162\x72\x65\156\x74\x5f\x63\x65\162\x74", get_option("\155\x6f\137\x73\141\x6d\x6c\x5f\x63\145\162\x74"));
        update_option("\155\157\x5f\163\x61\x6d\x6c\x5f\x63\165\x72\162\x65\x6e\164\137\x63\145\x72\164\137\x70\x72\151\x76\x61\164\145\137\153\x65\171", get_option("\155\157\137\163\x61\155\x6c\137\x63\145\x72\x74\137\160\162\x69\166\x61\x74\145\137\153\x65\x79"));
        Db:
        Y3:
    }
    function myprefix_add_cron_schedule($U7)
    {
        $U7["\x77\x65\145\153\x6c\x79"] = array("\x69\x6e\x74\145\162\x76\x61\154" => 604800, "\144\x69\x73\x70\154\x61\x79" => __("\117\x6e\x63\145\40\x57\x65\x65\153\x6c\x79"));
        $U7["\155\157\156\164\x68\154\x79"] = array("\151\156\x74\x65\x72\166\x61\x6c" => 2629746, "\144\151\x73\160\x6c\141\171" => __("\117\x6e\143\x65\x20\115\x6f\x6e\164\150\x6c\x79"));
        return $U7;
    }
    function mo_saml_custom_attr_column($dO)
    {
        $UN = get_option("\x6d\x6f\137\163\141\155\x6c\x5f\143\x75\x73\164\x6f\155\137\141\164\164\x72\163\137\x6d\141\x70\160\x69\156\147");
        $UN = maybe_unserialize($UN);
        $Ri = get_option("\x73\x61\x6d\x6c\x5f\x61\x74\164\162\163\x5f\x74\x6f\x5f\144\151\x73\160\x6c\141\x79\x5f\151\x64\x70");
        $Ba = 0;
        if (!is_array($UN)) {
            goto D2;
        }
        foreach ($UN as $nA => $bc) {
            foreach ($bc as $IP => $xI) {
                if (empty($IP)) {
                    goto TT;
                }
                if (!in_array($Ba, $Ri[$nA])) {
                    goto rw;
                }
                $dO[$IP] = $IP;
                rw:
                TT:
                $Ba++;
                YJ:
            }
            MN:
            kj:
        }
        ND:
        D2:
        return $dO;
    }
    function mo_saml_attr_column_content($Uk, $r1, $Zc)
    {
        $UN = get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\143\165\163\164\157\155\137\x61\164\164\x72\163\x5f\155\141\160\x70\x69\x6e\x67");
        if (!is_array($UN)) {
            goto Qh;
        }
        foreach ($UN as $nh => $RW) {
            foreach ($RW as $nA => $bc) {
                if (!($nA === $r1)) {
                    goto sP;
                }
                $jR = get_user_meta($Zc, $r1, false);
                if (empty($jR)) {
                    goto wz;
                }
                if (!is_array($jR[0])) {
                    goto qA;
                }
                $eb = '';
                foreach ($jR[0] as $xI) {
                    $eb = $eb . $xI;
                    if (!next($jR[0])) {
                        goto hG;
                    }
                    $eb = $eb . "\x20\x7c\x20";
                    hG:
                    j0:
                }
                R8:
                return $eb;
                goto a0;
                qA:
                return $jR[0];
                a0:
                wz:
                sP:
                hQ:
            }
            sQ:
            be:
        }
        iG:
        Qh:
        return $Uk;
    }
    function metadata_sync_cron_action($tj)
    {
        $y3 = ini_get("\155\141\170\137\x65\170\145\x63\165\x74\x69\x6f\x6e\137\x74\151\x6d\x65");
        set_time_limit(0);
        error_log("\155\151\x6e\x69\157\x72\141\x6e\x67\145\x20\72\x20\x52\x41\x4e\40\x53\x59\x4e\103\x20\x2d\40" . time() . $tj);
        $HA = get_option("\163\x61\x6d\154\x5f\155\x65\164\x61\144\141\164\141\x5f\165\x72\x6c\x5f\146\157\162\137\163\171\156\143");
        $Vm = '';
        $B_ = get_option("\x73\141\x6d\x6c\137\x64\x65\x66\x61\x75\x6c\x74\137\x69\x64\x70");
        if (!empty($HA)) {
            goto WK;
        }
        wp_unschedule_event(wp_next_scheduled("\155\x65\x74\x61\x64\x61\164\x61\137\163\171\x6e\143\x5f\143\162\157\x6e\x5f\x61\143\164\151\x6f\x6e"), "\x6d\145\164\141\144\x61\x74\x61\137\163\x79\156\x63\137\x63\162\157\156\137\x61\143\164\151\157\x6e");
        goto K3;
        WK:
        if (!is_array($HA)) {
            goto AH;
        }
        if (!array_key_exists($tj, $HA)) {
            goto Xw;
        }
        $Vm = $HA[$tj]["\155\x65\164\x61\x64\x61\x74\141\x5f\x75\162\154"];
        $this->upload_metadata(@file_get_contents($Vm));
        Xw:
        AH:
        K3:
        update_option("\163\141\155\154\137\144\145\146\141\x75\154\x74\x5f\x69\144\160", $B_);
        set_time_limit($y3);
    }
    function mo_login_widget_saml_options()
    {
        global $wpdb;
        update_option("\155\157\137\163\141\x6d\x6c\137\150\157\x73\x74\x5f\x6e\141\x6d\x65", "\x68\x74\164\x70\163\x3a\x2f\57\x6c\157\x67\151\x6e\x2e\x78\145\143\x75\162\x69\146\171\56\143\x6f\x6d");
        $CD = get_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\150\x6f\163\164\x5f\x6e\x61\155\145");
        mo_register_saml_sso();
    }
    function mo_saml_success_message()
    {
        $vp = "\x65\162\x72\x6f\162";
        $Mc = get_option("\x6d\157\x5f\x73\141\155\x6c\x5f\x6d\x65\163\x73\x61\x67\145");
        echo "\74\144\x69\166\40\143\x6c\x61\163\163\x3d\x27" . $vp . "\x27\x3e\x20\74\x70\76" . $Mc . "\x3c\57\x70\76\74\x2f\x64\151\166\x3e";
    }
    function mo_saml_error_message()
    {
        $vp = "\x75\160\x64\x61\164\x65\144";
        $Mc = get_option("\x6d\157\x5f\163\x61\x6d\x6c\137\155\x65\163\163\x61\x67\x65");
        echo "\74\144\151\x76\40\x63\154\x61\x73\x73\75\47" . $vp . "\47\76\40\74\160\76" . $Mc . "\74\x2f\x70\x3e\74\57\x64\x69\x76\76";
    }
    public function mo_sso_saml_deactivate()
    {
        if (!is_multisite()) {
            goto KP;
        }
        global $wpdb;
        $H7 = $wpdb->get_col("\x53\x45\x4c\105\103\x54\40\x62\x6c\157\147\x5f\x69\144\x20\x46\122\117\115\40{$wpdb->blogs}");
        $nL = get_current_blog_id();
        foreach ($H7 as $blog_id) {
            switch_to_blog($blog_id);
            if (!get_option("\x73\x6d\154\x5f\x6c\153")) {
                goto RV;
            }
            $o1 = new Customersaml();
            $o1->mo_saml_update_key_status($this);
            RV:
            delete_option("\155\x6f\x5f\x73\x61\155\154\x5f\156\x65\167\x5f\162\145\x67\x69\x73\164\x72\141\x74\x69\157\156");
            delete_option("\x6d\157\x5f\x73\141\x6d\x6c\137\x61\x64\x6d\x69\156\x5f\x70\x68\x6f\156\x65");
            delete_option("\155\157\137\x73\x61\155\154\137\141\144\155\151\x6e\137\160\x61\x73\163\x77\157\162\144");
            delete_option("\x6d\157\x5f\x73\141\x6d\154\137\166\145\x72\151\x66\171\137\x63\x75\x73\164\157\x6d\145\162");
            delete_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x61\x64\155\151\x6e\x5f\143\x75\x73\164\x6f\x6d\145\162\x5f\153\x65\171");
            delete_option("\155\157\x5f\x73\141\x6d\x6c\x5f\141\144\x6d\151\156\137\x61\x70\151\137\153\x65\171");
            delete_option("\x6d\157\137\x73\141\155\x6c\x5f\x63\x75\x73\x74\x6f\155\x65\162\x5f\164\x6f\153\x65\156");
            delete_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\x6d\x65\163\163\141\x67\x65");
            delete_option("\155\x6f\x5f\x73\141\155\x6c\137\162\x65\147\151\163\x74\162\141\164\x69\157\156\137\x73\164\141\164\x75\x73");
            delete_option("\x6d\157\137\x73\x61\155\x6c\137\x69\144\x70\137\143\157\156\x66\x69\x67\x5f\143\x6f\x6d\x70\154\x65\164\145");
            delete_option("\x6d\157\x5f\x73\x61\x6d\154\137\164\162\141\156\163\141\x63\164\x69\157\x6e\x49\x64");
            delete_option("\x73\x6d\154\137\154\x6b");
            delete_option("\x6e\157\137\x6f\x66\x5f\x73\x70");
            Jj:
        }
        SC:
        switch_to_blog($nL);
        goto Gb;
        KP:
        if (!get_option("\163\x6d\x6c\137\x6c\153")) {
            goto Xk;
        }
        $o1 = new Customersaml();
        $o1->mo_saml_update_key_status($this);
        Xk:
        delete_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x6e\x65\167\x5f\x72\x65\147\x69\x73\164\162\x61\x74\151\157\156");
        delete_option("\x6d\157\137\163\141\155\154\137\141\x64\155\x69\156\137\160\x68\x6f\x6e\145");
        delete_option("\155\157\137\163\x61\x6d\154\137\x61\144\155\x69\x6e\137\x70\x61\163\x73\x77\x6f\162\x64");
        delete_option("\155\157\137\163\x61\x6d\x6c\137\x76\145\162\151\x66\x79\137\x63\x75\163\x74\157\x6d\x65\162");
        delete_option("\155\157\x5f\163\x61\x6d\x6c\137\141\x64\x6d\151\x6e\x5f\143\165\x73\164\x6f\155\145\x72\x5f\x6b\x65\x79");
        delete_option("\155\x6f\137\163\141\155\154\137\141\x64\x6d\151\156\x5f\141\160\151\137\153\145\171");
        delete_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\143\165\x73\x74\157\155\x65\x72\x5f\164\157\153\x65\x6e");
        delete_option("\155\157\x5f\163\x61\155\x6c\137\x6d\145\x73\163\x61\x67\145");
        delete_option("\x6d\157\137\163\x61\x6d\154\x5f\x72\x65\x67\x69\163\x74\162\141\164\151\x6f\156\137\163\164\141\164\165\163");
        delete_option("\x6d\x6f\137\163\x61\x6d\154\137\x69\x64\160\x5f\143\157\x6e\x66\x69\x67\137\143\157\x6d\160\x6c\145\164\145");
        delete_option("\x6d\x6f\137\x73\141\x6d\x6c\137\x74\162\141\156\163\141\x63\164\151\x6f\156\x49\x64");
        delete_option("\x73\x6d\x6c\137\x6c\153");
        delete_option("\156\x6f\x5f\157\146\137\x73\160");
        Gb:
    }
    public function mo_saml_show_success_message()
    {
        remove_action("\x61\x64\x6d\151\156\x5f\x6e\x6f\164\151\x63\x65\163", array($this, "\155\157\x5f\163\x61\x6d\154\137\x73\165\143\x63\x65\163\x73\137\155\145\x73\x73\x61\x67\145"));
        add_action("\x61\x64\x6d\151\x6e\137\x6e\157\x74\x69\143\x65\163", array($this, "\x6d\x6f\x5f\163\141\155\x6c\x5f\x65\162\x72\157\x72\x5f\155\x65\x73\x73\x61\147\145"));
    }
    public function mo_saml_show_error_message()
    {
        remove_action("\x61\144\x6d\151\156\137\156\x6f\x74\x69\x63\x65\x73", array($this, "\x6d\157\137\x73\141\x6d\x6c\137\x65\x72\x72\157\162\137\x6d\x65\x73\163\x61\147\x65"));
        add_action("\x61\144\155\151\x6e\x5f\156\157\164\151\143\145\x73", array($this, "\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\163\x75\143\x63\x65\x73\163\x5f\155\145\163\x73\141\147\145"));
    }
    function plugin_settings_style($Bi)
    {
        if (!("\164\157\160\154\x65\166\145\154\x5f\160\x61\147\x65\137\155\157\x5f\163\141\x6d\x6c\137\x73\x65\x74\164\151\156\147\163" != $Bi && "\155\151\x6e\151\157\x72\141\x6e\x67\x65\x2d\x73\x61\155\154\x2d\x32\55\x30\x2d\x73\163\x6f\x5f\160\x61\x67\x65\137\155\x6f\x5f\163\141\x6d\x6c\137\x66\145\x64\x65\x72\141\x74\x69\157\156\137\x73\163\x6f" != $Bi)) {
            goto hT;
        }
        return;
        hT:
        if (isset($_REQUEST["\x74\141\142"]) && $_REQUEST["\x74\x61\142"] == "\154\151\143\x65\156\163\x69\156\x67") {
            goto hA;
        }
        wp_enqueue_style("\x6d\157\x5f\163\141\155\x6c\137\142\157\x6f\x74\163\x74\x72\141\160\137\143\x73\163", plugins_url("\x69\x6e\143\154\x75\144\145\x73\x2f\x63\163\x73\57\x62\x6f\157\x74\x73\x74\x72\141\x70\57\142\157\157\164\163\x74\x72\x61\x70\55\164\x6f\147\147\x6c\145\x2e\143\163\163", __FILE__), array(), mo_options_plugin_constants::VERSION);
        wp_enqueue_style("\155\x6f\137\x73\141\155\x6c\137\x61\x64\x6d\151\x6e\x5f\163\145\164\164\151\156\x67\x73\x5f\163\164\171\x6c\x65\x5f\164\x72\x61\x63\153\145\162", plugins_url("\151\x6e\143\154\165\144\145\163\x2f\143\163\163\x2f\x70\x72\x6f\147\162\x65\x73\x73\x2d\164\x72\141\x63\153\x65\162\56\x63\163\163", __FILE__), array(), mo_options_plugin_constants::VERSION);
        wp_enqueue_style("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\141\x64\x6d\x69\x6e\x5f\x73\x65\164\164\x69\156\x67\x73\x5f\x73\x74\x79\154\x65", plugins_url("\151\x6e\x63\x6c\165\144\145\163\x2f\143\x73\163\x2f\163\x74\x79\154\x65\137\x73\145\x74\164\151\x6e\147\x73\x2e\x6d\x69\156\x2e\143\x73\163", __FILE__), array(), mo_options_plugin_constants::VERSION);
        wp_enqueue_style("\x6d\x6f\137\163\x61\x6d\x6c\x5f\141\x64\x6d\x69\156\x5f\x73\x65\x74\164\x69\156\147\163\137\x70\x68\157\156\x65\x5f\163\x74\171\154\145", plugins_url("\x69\156\x63\154\165\x64\x65\x73\57\143\x73\x73\x2f\x70\x68\157\x6e\145\56\155\151\x6e\x2e\143\x73\x73", __FILE__), array(), mo_options_plugin_constants::VERSION);
        wp_enqueue_style("\155\x6f\x5f\163\x61\x6d\x6c\x5f\167\160\x62\55\x66\141", plugins_url("\x69\156\x63\154\x75\144\x65\163\57\143\x73\x73\57\x66\157\156\x74\x2d\x61\x77\x65\x73\157\155\x65\x2e\155\151\x6e\56\143\x73\163", __FILE__), array(), mo_options_plugin_constants::VERSION);
        goto pc;
        hA:
        wp_enqueue_style("\155\157\137\x73\x61\x6d\154\137\142\157\157\164\163\164\x72\x61\160\x5f\x63\x73\163\137\x6c\x69\143\x65\156\x73\x65", plugins_url("\151\x6e\143\154\165\x64\x65\163\57\143\163\x73\57\142\157\157\164\163\164\x72\x61\160\x2f\x62\157\157\164\163\164\162\141\x70\x2e\x6d\151\x6e\x2e\x63\x73\x73", __FILE__), array(), mo_options_plugin_constants::VERSION);
        pc:
    }
    function plugin_settings_script($Bi)
    {
        if (!("\164\x6f\x70\154\x65\x76\x65\154\137\x70\x61\147\x65\137\155\157\137\163\x61\155\x6c\137\163\x65\x74\164\151\156\147\163" != $Bi && "\155\x69\156\151\157\162\x61\x6e\147\x65\x2d\163\x61\155\x6c\x2d\x32\55\x30\x2d\x73\x73\x6f\137\x70\x61\147\145\137\155\157\137\163\141\155\154\x5f\146\x65\x64\145\x72\141\164\x69\x6f\156\x5f\163\x73\157" != $Bi)) {
            goto SB;
        }
        return;
        SB:
        if (isset($_REQUEST["\164\x61\x62"]) && $_REQUEST["\x74\141\x62"] == "\154\x69\x63\x65\156\x73\x69\x6e\x67") {
            goto wG;
        }
        wp_enqueue_script("\152\161\x75\x65\x72\171");
        wp_enqueue_script("\x6d\x6f\137\163\141\x6d\x6c\x5f\x62\157\157\x74\163\x74\162\141\160\137\x73\x63\x72\x69\x70\x74", plugins_url("\x69\156\143\x6c\165\144\145\163\57\152\163\57\x62\x6f\x6f\164\x73\x74\162\x61\x70\x2f\142\157\157\164\x73\164\162\141\x70\137\x74\x6f\x67\147\x6c\145\56\x6d\151\x6e\56\152\x73", __FILE__), array(), mo_options_plugin_constants::VERSION);
        wp_enqueue_script("\155\x6f\x5f\163\x61\155\x6c\137\x61\x64\155\151\x6e\137\163\145\164\x74\151\x6e\x67\x73\137\163\x63\162\151\x70\x74", plugins_url("\151\156\143\154\x75\x64\145\x73\57\x6a\163\57\163\145\x74\x74\151\x6e\147\x73\56\155\x69\156\56\x6a\163", __FILE__), array(), mo_options_plugin_constants::VERSION);
        wp_enqueue_script("\x6d\x6f\x5f\163\x61\x6d\154\137\141\x64\155\151\x6e\137\163\x65\164\x74\x69\x6e\147\163\137\160\150\157\x6e\145\137\163\x63\162\151\160\164", plugins_url("\151\x6e\143\x6c\165\x64\145\163\x2f\x6a\163\57\x70\x68\x6f\x6e\145\x2e\155\x69\156\56\x6a\x73", __FILE__), array(), mo_options_plugin_constants::VERSION);
        goto Qq;
        wG:
        wp_enqueue_script("\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\155\157\x64\x65\x72\x6e\x69\172\x72\137\x73\x63\162\151\160\164", plugins_url("\151\156\143\154\165\144\x65\163\x2f\152\163\x2f\x6d\157\144\x65\162\156\x69\172\162\56\152\163", __FILE__), array(), mo_options_plugin_constants::VERSION);
        wp_enqueue_script("\x6d\157\137\x73\x61\155\154\137\x70\x6f\160\x6f\166\145\162\x5f\163\x63\x72\151\x70\164", plugins_url("\151\x6e\x63\x6c\x75\x64\x65\163\57\x6a\163\57\142\157\157\x74\x73\164\x72\x61\160\x2f\x70\x6f\160\160\x65\x72\x2e\155\151\156\x2e\x6a\x73", __FILE__), array(), mo_options_plugin_constants::VERSION);
        wp_enqueue_script("\155\x6f\x5f\163\141\x6d\x6c\137\x62\157\157\164\x73\x74\x72\x61\x70\137\163\143\162\x69\160\164", plugins_url("\x69\156\143\154\x75\x64\145\163\57\x6a\163\x2f\142\157\x6f\164\163\x74\x72\141\160\x2f\x62\x6f\157\x74\163\164\x72\x61\160\56\x6d\x69\156\56\152\163", __FILE__), array(), mo_options_plugin_constants::VERSION);
        Qq:
    }
    static function mo_check_option_admin_referer($ut)
    {
        return isset($_POST["\157\160\x74\151\157\156"]) and $_POST["\x6f\x70\164\151\157\x6e"] == $ut and check_admin_referer($ut);
    }
    function miniorange_login_widget_saml_save_settings()
    {
        if (!current_user_can("\155\141\x6e\x61\x67\145\x5f\x6f\x70\x74\151\157\x6e\163")) {
            goto DY;
        }
        if (self::mo_check_option_admin_referer("\154\x6f\x67\151\156\x5f\167\151\x64\x67\x65\164\137\163\141\x6d\154\x5f\x73\x61\166\145\137\163\145\164\x74\151\156\x67\x73")) {
            goto Xe;
        }
        if (!self::mo_check_option_admin_referer("\x6d\157\x5f\163\x61\x6d\x6c\137\143\x68\x65\143\x6b\x5f\x6c\x69\x63\145\156\163\145")) {
            goto sD;
        }
        $o1 = new Customersaml();
        $jR = $o1->check_customer_ln($this);
        if ($jR) {
            goto CE;
        }
        return;
        CE:
        $jR = json_decode($jR, true);
        if (strcasecmp($jR["\x73\164\x61\164\x75\163"], "\123\x55\103\103\x45\x53\123") == 0) {
            goto w5;
        }
        $nA = get_option("\x6d\157\137\163\x61\x6d\x6c\x5f\x63\165\x73\x74\157\155\x65\162\x5f\164\x6f\x6b\x65\x6e");
        update_option("\163\x69\x74\x65\137\143\153\x5f\154", AESEncryption::encrypt_data("\146\141\x6c\163\x65", $nA));
        $Vm = add_query_arg(array("\x74\141\142" => "\x6c\151\x63\x65\156\163\x69\156\147"), $_SERVER["\x52\x45\121\x55\x45\x53\124\x5f\125\122\111"]);
        update_option("\x6d\157\x5f\x73\141\x6d\154\137\155\x65\x73\163\x61\x67\145", "\x59\x6f\165\40\150\x61\166\x65\x20\156\157\x74\40\x75\x70\147\x72\x61\x64\x65\x64\40\171\145\x74\x2e\x20" . addLink("\x43\x6c\x69\x63\153\40\x68\145\162\x65", $Vm) . "\40\x74\x6f\x20\165\x70\x67\162\141\144\x65\x20\164\157\x20\160\162\145\x6d\x69\x75\x6d\x20\166\145\162\163\x69\157\156\x2e");
        $this->mo_saml_show_error_message();
        goto UU;
        w5:
        if (array_key_exists("\154\x69\143\145\x6e\163\x65\120\154\141\x6e", $jR) && !$this->mo_saml_check_empty_or_null($jR["\154\151\143\145\x6e\163\x65\120\x6c\141\156"])) {
            goto k3;
        }
        $nA = get_option("\155\x6f\x5f\163\141\x6d\x6c\137\143\165\163\164\x6f\x6d\145\x72\x5f\x74\157\x6b\145\x6e");
        update_option("\163\x69\x74\x65\x5f\x63\153\137\154", AESEncryption::encrypt_data("\146\141\154\x73\145", $nA));
        $Vm = add_query_arg(array("\164\141\x62" => "\154\151\143\x65\156\163\151\156\147"), $_SERVER["\x52\105\121\125\105\x53\124\137\125\x52\111"]);
        update_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\155\x65\163\163\141\147\x65", "\131\x6f\165\40\150\x61\x76\145\x20\x6e\x6f\164\x20\165\160\x67\162\141\x64\145\x64\x20\171\145\164\56\x20" . addLink("\x43\154\151\143\x6b\40\150\x65\x72\145", $Vm) . "\x20\x74\157\40\x75\160\x67\x72\141\144\145\x20\164\x6f\x20\160\x72\x65\x6d\151\165\x6d\40\166\145\x72\163\151\x6f\156\x2e");
        $this->mo_saml_show_error_message();
        goto rK;
        k3:
        update_option("\x6d\157\137\163\141\155\154\x5f\154\151\143\x65\x6e\163\x65\137\156\141\x6d\x65", base64_encode($jR["\154\151\143\x65\156\x73\145\120\x6c\x61\156"]));
        $nA = get_option("\x6d\x6f\137\x73\x61\x6d\x6c\x5f\143\x75\x73\x74\157\x6d\x65\x72\x5f\x74\157\x6b\145\156");
        if (!(array_key_exists("\x6e\157\117\146\125\x73\145\x72\x73", $jR) && !$this->mo_saml_check_empty_or_null($jR["\x6e\157\117\146\x55\163\145\x72\163"]))) {
            goto d2;
        }
        update_option("\x6d\x6f\x5f\x73\x61\155\154\137\165\x73\162\x5f\154\155\x74", AESEncryption::encrypt_data($jR["\x6e\157\117\146\x55\163\x65\x72\163"], $nA));
        d2:
        if (!(array_key_exists("\154\x69\143\x65\x6e\163\x65\105\170\160\151\x72\x79", $jR) && !$this->mo_saml_check_empty_or_null($jR["\154\x69\143\x65\x6e\163\145\x45\170\160\151\x72\171"]))) {
            goto Q_;
        }
        $G0 = $this->mo_saml_parse_expiry_date($jR["\x6c\x69\143\x65\x6e\x73\145\x45\170\160\151\x72\x79"]);
        update_option("\155\157\x5f\163\x61\x6d\x6c\x5f\x6c\x69\x63\145\x6e\163\145\137\x65\x78\x70\151\162\x79\137\144\141\164\145", $G0);
        update_option("\x6d\157\137\x73\141\155\x6c\137\163\x6c\x65", $this->is_license_expired($G0));
        Q_:
        update_option("\163\x69\x74\145\137\143\x6b\137\x6c", AESEncryption::encrypt_data("\164\162\x75\x65", $nA));
        update_customer_idp_count($jR);
        $ms = plugin_dir_path(__FILE__);
        $UZ = home_url();
        $UZ = trim($UZ, "\x2f");
        if (preg_match("\43\136\x68\x74\164\160\50\x73\x29\77\72\57\57\43", $UZ)) {
            goto SY;
        }
        $UZ = "\x68\164\164\x70\72\57\x2f" . $UZ;
        SY:
        $h1 = parse_url($UZ);
        $qt = preg_replace("\x2f\x5e\x77\167\x77\x5c\56\57", '', $h1["\x68\x6f\x73\x74"]);
        $UD = wp_upload_dir();
        $rx = $qt . "\55" . $UD["\142\141\163\x65\x64\151\x72"];
        $NG = hash_hmac("\163\x68\x61\x32\x35\x36", $rx, "\x34\104\110\146\152\x67\146\152\141\163\156\x64\146\163\141\x6a\x66\110\107\x4a");
        $uP = $this->djkasjdksa();
        $Cz = round(strlen($uP) / rand(2, 20));
        $uP = substr_replace($uP, $NG, $Cz, 0);
        $po = base64_decode($uP);
        if (is_writable($ms . "\154\151\x63\145\156\x73\145")) {
            goto Jr;
        }
        $uP = str_rot13($uP);
        $G9 = base64_decode("\142\107\116\x6b\x61\155\164\x68\x63\x32\160\x6b\141\x33\116\x68\131\x32\x77\75");
        update_option($G9, $uP);
        goto Om;
        Jr:
        file_put_contents($ms . "\x6c\151\143\x65\156\163\x65", $po);
        Om:
        update_option("\154\x63\167\x72\x74\x6c\x66\x73\141\155\154", true);
        $Vm = add_query_arg(array("\x74\141\x62" => "\x67\x65\x6e\x65\162\x61\x6c"), $_SERVER["\x52\x45\x51\125\x45\x53\x54\x5f\125\122\111"]);
        update_option("\x6d\157\137\x73\x61\155\154\x5f\155\145\x73\163\141\x67\145", "\131\157\x75\x20\x68\x61\166\145\40\163\x75\x63\143\x65\x73\163\x66\x75\154\154\x79\x20\165\x70\147\162\x61\x64\x65\x64\x20\171\157\165\162\x20\154\151\143\145\x6e\x73\145\x2e");
        $this->mo_saml_show_success_message();
        rK:
        UU:
        sD:
        goto H0;
        Xe:
        if (mo_saml_is_extension_installed("\143\165\162\x6c")) {
            goto e6;
        }
        update_option("\x6d\157\137\163\141\155\x6c\137\x6d\x65\x73\163\x61\147\145", "\x45\122\x52\x4f\x52\x3a\x20\74\141\40\150\162\145\x66\75\x22\150\x74\x74\x70\72\x2f\57\x70\150\160\56\x6e\145\x74\57\155\141\156\165\141\x6c\x2f\x65\156\57\143\x75\162\x6c\x2e\x69\x6e\163\x74\141\154\x6c\x61\164\151\157\156\x2e\160\x68\160\42\x20\164\141\162\147\145\x74\75\42\137\142\154\141\156\153\x22\x3e\120\x48\x50\40\x63\x55\x52\x4c\40\145\170\x74\x65\156\x73\x69\157\x6e\x3c\x2f\141\x3e\40\151\163\x20\x6e\x6f\x74\x20\151\x6e\x73\x74\141\x6c\x6c\145\144\x20\157\x72\40\144\x69\x73\141\142\x6c\145\x64\56\x20\x53\141\166\145\40\x49\144\x65\x6e\164\151\x74\171\x20\120\x72\157\166\151\144\145\x72\x20\x43\157\156\x66\151\x67\165\x72\141\x74\x69\x6f\x6e\x20\x66\x61\151\x6c\145\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        e6:
        $T3 = $_POST["\163\141\155\x6c\137\163\x61\166\x65\x5f\163\x65\x74\x74\x69\156\147\x73\x5f\141\143\x74\x69\157\x6e"];
        $Gt = '';
        $UC = '';
        $kl = '';
        $FB = '';
        $XB = '';
        $UG = '';
        $A7 = '';
        $G3 = '';
        $I_ = "\x59\145\163";
        $iw = "\x59\145\163";
        $WF = '';
        $nS = "\165\156\143\150\145\x63\x6b\x65\x64";
        $TF = "\143\150\x65\x63\153\145\144";
        if (!isset($_POST["\163\141\x6d\x6c\x5f\x65\144\151\x74\137\151\144\x70\137\156\141\155\x65"])) {
            goto vy;
        }
        $WF = trim($_POST["\163\x61\155\154\137\145\144\151\x74\137\x69\144\160\x5f\156\x61\x6d\145"]);
        vy:
        if ($T3 != "\144\x65\154\x65\164\x65" && $T3 != "\143\165\163\164\x6f\155" && ($this->mo_saml_check_empty_or_null($_POST["\163\141\155\154\x5f\x69\x64\145\x6e\164\151\x74\x79\137\156\x61\x6d\x65"]) || $this->mo_saml_check_empty_or_null($_POST["\163\141\155\x6c\x5f\154\157\x67\x69\x6e\x5f\165\x72\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\163\141\155\x6c\x5f\x69\x73\x73\165\145\x72"]))) {
            goto LG;
        }
        if ($T3 != "\x64\x65\x6c\145\164\145" && $T3 != "\143\165\x73\x74\157\155") {
            goto mR;
        }
        goto SA;
        LG:
        update_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\x6d\x65\x73\x73\x61\x67\x65", "\101\x6c\x6c\40\x74\150\145\x20\146\151\145\x6c\x64\163\x20\x61\162\145\40\x72\x65\x71\165\x69\x72\x65\x64\56\x20\x50\x6c\145\141\x73\x65\40\x65\x6e\x74\x65\162\40\166\x61\154\x69\144\x20\145\156\164\x72\x69\x65\x73\x2e");
        $this->mo_saml_show_error_message();
        return;
        goto SA;
        mR:
        $WF = trim($_POST["\x73\141\x6d\x6c\137\x65\144\151\x74\x5f\x69\x64\160\x5f\156\141\155\145"]);
        $Gt = trim($_POST["\x73\x61\155\x6c\x5f\151\x64\x65\x6e\164\151\x74\171\x5f\x6e\x61\155\145"]);
        $kl = trim($_POST["\x73\141\x6d\154\x5f\x6c\x6f\x67\x69\x6e\137\165\x72\154"]);
        $ST = trim($_POST["\163\141\155\x6c\137\163\x70\137\145\x6e\x74\151\164\171\137\x69\144"]);
        if (!array_key_exists("\x73\x61\x6d\154\137\x6c\157\147\151\156\137\142\x69\156\x64\151\156\147\x5f\164\171\x70\145", $_POST)) {
            goto Zc;
        }
        $UC = $_POST["\163\141\x6d\x6c\137\x6c\x6f\147\151\156\x5f\142\x69\156\144\151\156\x67\137\x74\171\x70\x65"];
        Zc:
        if (!array_key_exists("\163\x61\155\154\x5f\x6c\x6f\x67\x6f\165\x74\x5f\142\151\x6e\x64\151\x6e\147\137\164\x79\160\x65", $_POST)) {
            goto p3;
        }
        $FB = $_POST["\163\x61\155\x6c\x5f\154\157\x67\157\165\164\x5f\142\151\x6e\x64\151\156\147\x5f\164\171\x70\145"];
        p3:
        $G3 = $_POST["\x73\x61\x6d\x6c\x5f\156\141\155\145\151\x64\x5f\x66\157\x72\155\141\164"];
        if (array_key_exists("\x65\x6e\141\x62\x6c\x65\x5f\x69\x63\157\156\x76", $_POST)) {
            goto D7;
        }
        $TF = '';
        goto hj;
        D7:
        $TF = "\143\150\x65\143\x6b\145\x64";
        hj:
        if (!array_key_exists("\163\x61\x6d\154\x5f\x6c\157\x67\x6f\165\x74\x5f\x75\162\x6c", $_POST)) {
            goto dk;
        }
        $XB = trim($_POST["\x73\141\x6d\x6c\x5f\154\x6f\x67\157\165\164\137\165\162\154"]);
        dk:
        $UG = trim($_POST["\163\x61\155\x6c\137\151\163\x73\x75\145\162"]);
        $A7 = $_POST["\163\141\x6d\154\x5f\x78\x35\x30\71\137\x63\x65\162\164\151\x66\x69\x63\x61\x74\145"];
        if (!isset($_POST["\163\141\155\154\137\x72\x65\163\160\x6f\x6e\163\x65\137\163\151\147\x6e\145\144"])) {
            goto nX;
        }
        $I_ = "\x63\x68\x65\x63\153\145\144";
        nX:
        if (!isset($_POST["\x73\x61\x6d\x6c\137\x61\163\x73\x65\x72\164\151\x6f\156\x5f\163\x69\x67\156\145\x64"])) {
            goto aX;
        }
        $iw = "\x63\x68\x65\143\x6b\x65\x64";
        aX:
        if (!isset($_POST["\x73\141\155\154\x5f\162\x65\161\165\x65\x73\x74\137\x73\151\x67\156\145\x64"])) {
            goto VL;
        }
        $nS = "\x63\150\x65\x63\x6b\145\144";
        VL:
        if (isset($_POST["\163\141\155\x6c\137\144\x65\146\x61\165\x6c\164\137\x69\x64\160"])) {
            goto Tj;
        }
        if (!get_option("\x73\x61\x6d\x6c\x5f\144\x65\x66\x61\x75\x6c\164\x5f\151\144\160")) {
            goto Wi;
        }
        if (!(get_option("\163\x61\155\x6c\x5f\x64\145\x66\141\x75\154\x74\137\x69\144\x70") === $WF)) {
            goto ms;
        }
        delete_option("\163\x61\x6d\x6c\137\x64\x65\x66\141\x75\154\x74\x5f\x69\144\160");
        ms:
        Wi:
        goto Y7;
        Tj:
        update_option("\163\x61\155\x6c\137\144\145\x66\x61\165\154\x74\137\x69\x64\160", $WF);
        Y7:
        SA:
        $eB = maybe_unserialize(get_option("\163\141\155\154\x5f\151\x64\145\x6e\x74\x69\x74\x79\137\x70\162\x6f\166\151\144\145\162\163"));
        if (is_array($eB)) {
            goto wF;
        }
        $eB = array();
        wF:
        if ($T3 == "\141\x64\x64" && isset($eB[$Gt])) {
            goto zY;
        }
        if ($T3 == "\145\144\x69\x74" && isset($eB[$WF]) || $T3 == "\141\x64\x64") {
            goto hd;
        }
        if ($T3 == "\143\x75\163\x74\157\x6d" && isset($eB[$WF])) {
            goto S7;
        }
        if (!($T3 == "\144\145\154\145\164\145" && isset($eB[$WF]))) {
            goto re;
        }
        unset($eB[$WF]);
        $eB = array_filter($eB, "\146\151\x6c\x74\x65\162\x5f\x65\x6d\160\x74\171\x5f\x76\141\154\x75\145\163");
        if (!(get_option("\163\141\155\154\x5f\x64\x65\146\x61\x75\154\x74\137\x69\x64\x70") == $WF)) {
            goto t5;
        }
        delete_option("\163\141\155\154\x5f\144\145\146\141\165\154\x74\137\x69\144\x70");
        t5:
        $I0 = get_option("\x73\141\x6d\x6c\x5f\x69\144\160\x5f\x72\157\x6c\145\137\x6d\x61\160\x70\151\x6e\147");
        $nV = get_option("\x73\141\155\x6c\137\151\144\160\137\141\x74\x74\x72\x69\x62\165\x74\x65\x5f\155\x61\160\x70\151\x6e\147");
        $FH = get_option("\x6d\157\x5f\163\x61\155\154\137\143\165\163\164\157\155\x5f\x61\164\x74\162\163\137\x6d\141\160\x70\x69\156\147");
        $l3 = get_option("\163\141\x6d\154\137\151\144\x70\137\x64\157\155\141\151\x6e\137\x6d\x61\x70\x70\x69\156\147");
        if (!is_array($I0)) {
            goto p0;
        }
        if (!array_key_exists($WF, $I0)) {
            goto uV;
        }
        unset($I0[$WF]);
        $I0 = array_filter($I0, "\146\x69\154\164\145\162\x5f\x65\155\160\164\x79\x5f\x76\141\154\x75\145\163");
        uV:
        p0:
        if (!is_array($nV)) {
            goto q3;
        }
        if (!array_key_exists($WF, $nV)) {
            goto Ph;
        }
        unset($nV[$WF]);
        $nV = array_filter($nV, "\x66\x69\154\164\145\162\x5f\x65\155\x70\164\171\x5f\x76\x61\x6c\165\145\163");
        Ph:
        q3:
        if (!is_array($FH)) {
            goto QG;
        }
        if (!array_key_exists($WF, $FH)) {
            goto CS;
        }
        unset($FH[$WF]);
        $FH = array_filter($FH, "\x66\151\154\x74\x65\162\137\145\x6d\160\x74\171\137\166\x61\x6c\165\145\163");
        CS:
        QG:
        if (!is_array($l3)) {
            goto sd;
        }
        if (!array_key_exists($WF, $l3)) {
            goto ew;
        }
        unset($l3[$WF]);
        $l3 = array_filter($l3, "\146\x69\x6c\x74\145\162\x5f\x65\155\160\x74\x79\137\166\x61\x6c\x75\x65\163");
        ew:
        sd:
        update_option("\x73\141\155\154\x5f\151\x64\145\156\164\x69\x74\x79\x5f\160\x72\157\166\x69\144\145\162\x73", $eB);
        update_option("\163\141\x6d\x6c\x5f\151\x64\160\137\x72\157\x6c\x65\x5f\x6d\x61\x70\x70\151\156\147", $I0);
        update_option("\163\x61\155\x6c\x5f\151\x64\x70\x5f\x61\x74\164\x72\151\142\x75\164\145\137\x6d\141\x70\x70\151\156\147", $nV);
        update_option("\x6d\x6f\137\163\x61\155\x6c\137\x63\x75\x73\164\x6f\x6d\137\141\164\164\x72\x73\137\155\141\x70\160\x69\156\x67", $FH);
        update_option("\163\141\155\154\137\151\x64\x70\x5f\144\157\155\141\151\x6e\x5f\155\141\x70\x70\x69\x6e\x67", $l3);
        update_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\x6d\x65\x73\163\x61\x67\x65", "\x3c\x65\155\76" . $WF . "\74\57\145\155\76\40\144\x65\154\x65\x74\x65\x64\40\x73\x75\x63\x63\145\x73\x73\x66\x75\154\154\171\x2e");
        $this->mo_saml_show_success_message();
        re:
        goto lI;
        S7:
        $wO = htmlspecialchars($_POST["\x6d\157\x5f\x73\141\155\154\137\143\165\163\164\157\x6d\137\x6c\157\x67\151\x6e\137\164\x65\170\x74"]);
        $nu = htmlspecialchars($_POST["\155\x6f\137\163\x61\x6d\154\x5f\x63\x75\x73\164\x6f\x6d\137\147\x72\145\145\x74\151\156\x67\x5f\x74\145\x78\164"]);
        $AY = htmlspecialchars($_POST["\155\x6f\x5f\x73\141\x6d\154\137\x67\162\x65\x65\164\x69\156\x67\137\156\x61\x6d\145"]);
        $zn = htmlspecialchars($_POST["\155\157\137\163\141\155\154\x5f\x63\x75\x73\164\x6f\x6d\137\154\157\x67\157\165\x74\137\164\145\x78\164"]);
        $DD = array("\143\165\163\164\x6f\x6d\x5f\x6c\157\x67\x69\156\x5f\x74\145\x78\x74" => $wO, "\143\x75\x73\164\x6f\155\137\x67\162\145\x65\164\151\156\x67\137\x74\x65\x78\164" => $nu, "\x67\162\145\145\164\151\x6e\147\x5f\156\141\155\x65" => $AY, "\143\165\163\164\x6f\155\x5f\x6c\157\x67\157\165\x74\x5f\164\145\170\x74" => $zn);
        $KW = isset($_POST["\155\x6f\137\163\x61\x6d\x6c\x5f\141\x70\160\x6c\171\137\x77\151\x64\x67\x65\x74\137\143\x6f\156\x66\x69\x67\x5f\x74\x6f\x5f\x61\x6c\154\x5f\x69\x64\x70\x73"]) ? "\x74\162\x75\x65" : "\146\x61\x6c\163\x65";
        if ($KW == "\164\162\165\145") {
            goto mx;
        }
        $eB[$WF] = array_merge($eB[$WF], $DD);
        goto u6;
        mx:
        $eB[$WF]["\x63\x75\163\164\x6f\x6d\x5f\154\157\x67\x69\x6e\137\x74\x65\x78\x74"] = $wO;
        foreach ($eB as $nA => $bc) {
            $eB[$nA]["\x63\165\x73\x74\157\155\137\147\162\145\x65\x74\151\x6e\147\x5f\164\145\x78\164"] = $nu;
            $eB[$nA]["\x67\162\x65\145\x74\x69\156\147\137\x6e\141\x6d\145"] = $AY;
            $eB[$nA]["\143\165\163\x74\157\155\137\154\157\147\x6f\x75\164\137\x74\x65\170\x74"] = $zn;
            Nb:
        }
        fW:
        u6:
        $eB = array_filter($eB, "\146\151\154\164\x65\162\x5f\145\x6d\x70\164\x79\x5f\166\x61\154\165\145\163");
        update_option("\x73\x61\x6d\x6c\137\151\x64\145\156\164\151\x74\171\x5f\160\x72\x6f\166\151\144\x65\162\163", $eB);
        update_option("\155\157\137\163\x61\155\x6c\137\141\160\160\154\x79\x5f\x77\151\x64\147\x65\x74\137\x63\157\156\x66\151\147\137\164\x6f\137\x61\154\154\x5f\x69\x64\x70\163", $KW);
        update_option("\x6d\x6f\137\x73\141\x6d\154\x5f\x6d\x65\163\163\141\147\x65", "\103\x75\163\164\157\x6d\40\x57\x69\144\x67\x65\164\x20\144\x65\x74\141\x69\154\163\40\x73\141\x76\145\144\40\163\x75\x63\x63\145\163\x73\x66\165\x6c\154\171\x2e");
        $this->mo_saml_show_success_message();
        lI:
        goto jC;
        hd:
        $wO = !empty($eB[$Gt]["\143\x75\163\x74\157\155\x5f\x6c\157\x67\151\156\x5f\x74\x65\170\164"]) ? $eB[$Gt]["\x63\165\163\x74\157\x6d\137\x6c\157\x67\x69\x6e\x5f\164\145\170\x74"] : '';
        $nu = !empty($eB[$Gt]["\x63\x75\163\x74\157\155\x5f\x67\x72\145\145\164\151\x6e\147\x5f\164\145\170\164"]) ? $eB[$Gt]["\143\x75\x73\x74\x6f\155\x5f\147\162\x65\x65\164\x69\x6e\147\137\x74\145\170\x74"] : '';
        $AY = !empty($eB[$Gt]["\x67\x72\145\145\x74\x69\x6e\x67\x5f\156\x61\x6d\x65"]) ? $eB[$Gt]["\147\x72\145\145\x74\x69\156\x67\x5f\x6e\141\x6d\x65"] : '';
        $zn = !empty($eB[$Gt]["\x63\165\163\x74\157\x6d\137\x6c\x6f\x67\x6f\165\x74\137\164\x65\170\x74"]) ? $eB[$Gt]["\x63\x75\163\164\x6f\155\137\154\x6f\147\x6f\x75\x74\137\x74\x65\x78\x74"] : '';
        $MY = !empty($eB[$Gt]["\x73\x61\155\x6c\137\162\x65\161\x75\145\x73\164"]) ? $eB[$Gt]["\163\x61\155\x6c\x5f\x72\145\161\165\x65\x73\164"] : '';
        $v7 = !empty($eB[$Gt]["\163\x61\x6d\154\x5f\x72\x65\163\160\x6f\156\x73\x65"]) ? $eB[$Gt]["\163\x61\x6d\x6c\x5f\162\x65\163\x70\157\x6e\x73\x65"] : '';
        $Z6 = !empty($eB[$Gt]["\164\145\163\164\x5f\x73\x74\x61\x74\x75\163"]) ? $eB[$Gt]["\x74\x65\x73\164\x5f\163\x74\141\x74\x75\x73"] : '';
        $DD = array("\143\x75\163\164\157\155\x5f\154\x6f\147\x69\156\x5f\x74\x65\x78\164" => htmlspecialchars($wO), "\143\165\x73\x74\157\x6d\x5f\x67\x72\145\145\164\151\156\147\137\x74\x65\x78\x74" => htmlspecialchars($nu), "\147\162\145\145\164\151\x6e\x67\137\x6e\x61\155\145" => htmlspecialchars($AY), "\143\165\x73\164\157\x6d\x5f\x6c\x6f\x67\x6f\x75\164\137\x74\x65\170\164" => htmlspecialchars($zn));
        $fp = array("\x73\x61\155\154\x5f\162\145\x71\x75\145\163\x74" => $MY, "\x73\141\155\x6c\137\162\145\163\160\157\x6e\163\145" => $v7, "\x74\x65\x73\164\x5f\163\164\x61\164\165\x73" => $Z6);
        unset($eB[$WF]);
        if (!is_array($A7)) {
            goto Sh;
        }
        foreach ($A7 as $nA => $bc) {
            $A7[$nA] = Utilities::sanitize_certificate($bc);
            Hi:
        }
        hp:
        Sh:
        $eB[$Gt] = array("\x69\144\160\x5f\x6e\x61\155\x65" => htmlspecialchars($Gt), "\x69\x64\x70\137\x65\x6e\x74\x69\164\171\137\151\x64" => htmlspecialchars($UG), "\x73\141\x6d\x6c\x5f\163\160\137\145\x6e\x74\151\164\x79\137\151\144" => htmlspecialchars($ST), "\163\x73\x6f\x5f\165\162\154" => htmlspecialchars($kl), "\x73\163\157\x5f\142\x69\156\144\x69\x6e\147\137\x74\x79\160\x65" => htmlspecialchars($UC), "\163\154\157\137\x75\162\154" => htmlspecialchars($XB), "\163\154\x6f\137\x62\x69\x6e\x64\151\x6e\147\x5f\164\x79\x70\145" => htmlspecialchars($FB), "\170\x35\x30\x39\137\143\x65\162\164\x69\146\x69\143\x61\164\x65" => $A7, "\x72\x65\163\x70\157\156\163\x65\137\163\151\147\156\x65\x64" => htmlspecialchars($I_), "\x61\163\x73\145\162\164\151\x6f\156\137\163\x69\147\x6e\145\144" => htmlspecialchars($iw), "\x72\x65\x71\165\x65\163\164\x5f\163\151\147\156\x65\x64" => htmlspecialchars($nS), "\156\141\x6d\x65\x69\x64\137\146\x6f\x72\x6d\141\164" => htmlspecialchars($G3), "\x6d\x6f\x5f\163\x61\155\154\x5f\x65\x6e\143\157\144\x69\x6e\x67\x5f\x65\x6e\141\x62\154\x65\x64" => htmlspecialchars($TF), "\x65\156\141\142\x6c\145\137\x69\144\x70" => true);
        $eB[$Gt] = array_merge($eB[$Gt], $DD);
        $eB[$Gt] = array_merge($eB[$Gt], $fp);
        $eB = array_filter($eB, "\146\x69\154\x74\x65\162\x5f\145\155\x70\164\171\x5f\x76\141\x6c\x75\x65\163");
        update_option("\163\x61\155\154\x5f\x69\144\145\x6e\164\x69\164\171\x5f\160\x72\157\166\x69\x64\145\x72\163", $eB);
        if (!(count($eB) == 1)) {
            goto RE;
        }
        update_option("\163\141\x6d\154\137\144\145\x66\141\x75\x6c\164\137\x69\144\x70", $Gt);
        RE:
        update_option("\155\157\137\163\x61\155\x6c\x5f\x6d\145\163\163\x61\147\145", "\x49\x64\x65\156\x74\x69\x74\x79\x20\x50\x72\157\x76\151\144\145\x72\40\x64\145\x74\x61\151\x6c\163\x20\x73\141\x76\145\144\x20\x73\165\x63\143\x65\163\163\146\165\x6c\154\x79\x2e");
        $this->mo_saml_show_success_message();
        jC:
        goto F3;
        zY:
        update_option("\155\x6f\137\163\141\155\154\x5f\x6d\x65\x73\x73\x61\x67\x65", "\111\144\145\x6e\x74\151\x74\171\x20\x50\x72\157\166\151\144\x65\162\x20\x77\151\164\x68\40\74\x65\x6d\x3e" . $Gt . "\x3c\57\x65\155\76\x20\x61\x6c\162\145\x61\x64\171\x20\x65\170\x69\x74\x73\x2e\x20\x54\x72\x79\x20\141\x6e\157\164\x68\x65\x72\40\156\141\155\x65\x2e");
        $this->mo_saml_show_error_message();
        return;
        F3:
        H0:
        if (!self::mo_check_option_admin_referer("\155\x6f\x5f\141\164\x74\162\x5f\x6d\x61\x70\160\151\x6e\x67\137\151\x64\160\x5f\156\x61\155\x65")) {
            goto Ov;
        }
        if (!isset($_REQUEST["\x61\164\x74\162\x69\142\165\164\x65\x5f\x6d\x61\160\160\151\x6e\147\137\151\x64\160\x5f\156\141\155\145"])) {
            goto QE;
        }
        $tj = $_REQUEST["\141\x74\x74\162\151\142\x75\x74\x65\137\x6d\x61\160\160\151\156\x67\137\151\144\160\x5f\156\141\155\x65"];
        update_option("\155\157\x5f\x73\x61\155\x6c\137\141\164\164\162\137\x6d\141\160\x70\x69\x6e\147\x5f\x69\144\160\137\x6e\141\x6d\x65", $tj);
        QE:
        Ov:
        if (!self::mo_check_option_admin_referer("\154\x6f\x67\x69\x6e\137\167\x69\x64\147\145\164\137\x73\x61\155\x6c\137\x64\157\155\x61\x69\x6e\x5f\155\x61\x70\x70\x69\156\x67")) {
            goto fA;
        }
        $eB = maybe_unserialize(get_option("\163\x61\155\154\137\x69\x64\x65\156\164\x69\x74\x79\137\x70\162\x6f\x76\151\x64\145\x72\x73"));
        $eB = maybe_unserialize($eB);
        $l3 = array();
        foreach ($eB as $nA => $bc) {
            $rs = "\x73\141\x6d\x6c\137\x64\x6f\155\x61\x69\156\x5f\x6d\141\160\x70\x69\x6e\x67\137" . $nA;
            $l3[$nA] = !empty($_POST[$rs]) ? stripslashes($_POST[$rs]) : '';
            BH:
        }
        Kl:
        $l3 = array_filter($l3, "\146\x69\154\x74\x65\x72\137\x65\155\x70\164\x79\137\x76\x61\x6c\x75\x65\163");
        update_option("\x73\x61\155\x6c\137\x69\144\160\137\144\157\155\x61\x69\x6e\137\155\141\x70\160\151\156\147", $l3);
        update_option("\155\157\x5f\x73\x61\x6d\154\x5f\155\x65\x73\163\x61\147\x65", "\x44\157\x6d\x61\151\156\x20\115\x61\x70\160\x69\156\147\x20\144\145\x74\x61\x69\154\x73\x20\x73\x61\166\145\x64\40\x73\x75\x63\x63\145\x73\x73\x66\x75\x6c\154\171\56");
        $this->mo_saml_show_success_message();
        fA:
        if (!self::mo_check_option_admin_referer("\x6c\157\x67\151\x6e\137\167\x69\144\x67\x65\x74\137\x73\x61\x6d\x6c\137\141\x74\164\x72\x69\142\165\164\x65\x5f\155\x61\x70\x70\x69\x6e\147")) {
            goto Je;
        }
        if (mo_saml_is_extension_installed("\143\x75\x72\154")) {
            goto MJ;
        }
        update_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\155\x65\163\x73\141\x67\x65", "\x45\x52\122\117\122\x3a\x20\74\x61\40\150\162\x65\146\75\x22\150\164\x74\160\72\57\x2f\x70\150\160\56\156\x65\x74\57\x6d\141\x6e\165\x61\154\57\x65\156\57\143\165\162\154\x2e\151\156\163\164\x61\154\154\141\164\x69\157\x6e\56\160\x68\160\42\x20\164\141\x72\x67\145\x74\x3d\42\x5f\x62\x6c\x61\x6e\x6b\x22\x3e\x50\x48\x50\40\143\x55\122\x4c\40\x65\x78\164\x65\156\x73\151\x6f\x6e\74\x2f\x61\x3e\x20\x69\163\x20\x6e\x6f\164\40\151\x6e\163\x74\141\154\154\145\x64\x20\x6f\162\x20\x64\151\163\x61\142\x6c\145\x64\56\40\x53\x61\166\145\x20\101\x74\x74\x72\151\x62\165\x74\x65\x20\115\x61\160\160\x69\x6e\147\40\146\141\151\154\145\144\56");
        $this->mo_saml_show_error_message();
        return;
        MJ:
        $eB = maybe_unserialize(get_option("\x73\x61\x6d\x6c\x5f\x69\x64\145\x6e\x74\x69\x74\x79\x5f\160\x72\x6f\x76\x69\144\145\x72\x73"));
        $eB = maybe_unserialize($eB);
        $nV = get_option("\x73\x61\x6d\x6c\x5f\151\x64\x70\x5f\x61\164\164\x72\x69\x62\165\164\145\x5f\x6d\141\x70\x70\151\156\147");
        $nV = maybe_unserialize($nV);
        $ML = get_option("\155\x6f\x5f\163\141\x6d\154\x5f\145\156\x61\x62\x6c\x65\137\144\x6f\155\x61\151\156\137\x6d\141\160\x70\151\x6e\x67");
        $tj = $_POST["\x61\x74\164\x72\151\142\165\164\x65\x5f\155\141\160\x70\151\156\x67\137\x69\x64\x70\137\156\x61\x6d\x65"];
        if ($nV) {
            goto NJ;
        }
        $nV = array();
        NJ:
        if (array_key_exists("\104\x45\106\101\125\x4c\x54", $nV)) {
            goto qL;
        }
        $nV["\x44\105\106\x41\x55\x4c\124"] = array();
        qL:
        $Pw = $nV;
        if (!(array_key_exists($tj, $eB) || $tj == "\x44\105\106\101\125\114\124")) {
            goto xj;
        }
        $nV[$tj]["\165\163\x65\x72\x6e\141\155\x65"] = stripslashes($_POST["\x73\x61\x6d\x6c\137\141\155\x5f\165\163\x65\162\x6e\141\155\x65"]);
        $nV[$tj]["\x65\155\141\x69\154"] = stripslashes($_POST["\x73\141\155\154\x5f\141\x6d\137\145\155\x61\151\154"]);
        $nV[$tj]["\146\151\162\163\164\137\156\141\x6d\145"] = stripslashes($_POST["\x73\x61\x6d\154\137\x61\x6d\x5f\146\151\x72\163\164\x5f\156\141\155\x65"]);
        $nV[$tj]["\x6c\141\x73\x74\137\x6e\141\x6d\145"] = stripslashes($_POST["\163\x61\x6d\x6c\x5f\x61\155\137\x6c\x61\x73\164\137\156\141\x6d\x65"]);
        $nV[$tj]["\x67\162\x6f\x75\160\137\x6e\x61\155\x65"] = stripslashes($_POST["\x73\x61\155\x6c\x5f\x61\x6d\137\147\162\x6f\165\160\137\x6e\x61\x6d\x65"]);
        $nV[$tj]["\x64\151\163\160\x6c\x61\171\137\156\141\x6d\x65"] = stripslashes($_POST["\163\141\x6d\154\137\x61\x6d\x5f\144\151\163\x70\x6c\x61\x79\x5f\x6e\x61\x6d\145"]);
        xj:
        if (!($tj == "\x44\x45\106\x41\125\x4c\124")) {
            goto vO;
        }
        if (!(!empty($eB) and is_array($eB))) {
            goto Q0;
        }
        foreach ($eB as $ec) {
            $nh = $ec["\151\x64\160\137\x6e\141\155\x65"];
            if (!(!array_key_exists($nh, $nV) || empty($nV[$nh]) || $nV[$nh] === $Pw["\104\x45\x46\x41\125\x4c\124"])) {
                goto lO;
            }
            $nV[$nh] = $nV["\104\x45\x46\101\125\114\x54"];
            lO:
            NC:
        }
        C2:
        Q0:
        vO:
        update_option("\x73\x61\155\x6c\x5f\x69\x64\x70\x5f\x61\164\x74\x72\x69\x62\x75\164\x65\137\x6d\141\160\160\151\156\x67", $nV);
        $df = get_option("\x6d\x6f\x5f\x73\141\155\154\x5f\143\x75\163\x74\157\x6d\x5f\x61\164\164\x72\163\x5f\155\x61\160\x70\x69\156\147");
        $df = maybe_unserialize($df);
        if ($df) {
            goto hJ;
        }
        $df = array();
        hJ:
        if (array_key_exists("\104\105\106\101\x55\x4c\124", $df)) {
            goto Vw;
        }
        $df["\104\x45\x46\x41\x55\x4c\x54"] = array();
        Vw:
        $eQ = $df;
        $UN = array();
        $ao = array();
        $RW = array();
        $EL = array();
        if (!(isset($_POST["\155\157\137\x73\x61\x6d\154\x5f\143\165\163\164\x6f\x6d\x5f\141\x74\x74\x72\x69\142\x75\x74\145\137\153\145\171\163"]) && !empty($_POST["\155\x6f\x5f\163\141\x6d\154\x5f\143\165\x73\164\157\x6d\x5f\x61\164\164\x72\151\142\x75\x74\x65\x5f\153\145\171\x73"]))) {
            goto iE;
        }
        $ao = $_POST["\x6d\x6f\x5f\x73\x61\155\x6c\137\x63\x75\x73\x74\x6f\x6d\137\x61\164\164\162\151\x62\165\x74\145\x5f\x6b\145\x79\163"];
        iE:
        if (!(isset($_POST["\155\x6f\137\x73\141\x6d\154\x5f\143\x75\163\164\157\x6d\137\141\164\x74\162\x69\142\x75\164\x65\x5f\166\141\154\165\145\x73"]) && !empty($_POST["\155\x6f\137\x73\x61\x6d\154\137\x63\x75\x73\x74\157\x6d\137\141\164\x74\x72\x69\142\165\x74\x65\137\166\x61\154\x75\145\x73"]))) {
            goto Tw;
        }
        $RW = $_POST["\155\x6f\137\x73\141\155\x6c\137\143\165\x73\164\x6f\x6d\137\x61\x74\164\162\x69\142\x75\164\x65\137\x76\141\x6c\x75\x65\163"];
        Tw:
        $kF = count($ao);
        if (!($kF > 0)) {
            goto Tq;
        }
        $ao = array_map("\150\x74\x6d\x6c\x73\x70\x65\143\151\x61\154\x63\x68\141\162\x73", $ao);
        $RW = array_map("\150\164\155\x6c\163\x70\145\143\x69\x61\154\x63\150\141\x72\163", $RW);
        $uB = 0;
        AQ:
        if (!($uB < $kF)) {
            goto rd;
        }
        if (!(isset($_POST["\155\157\137\x73\x61\x6d\154\137\144\x69\163\x70\154\x61\x79\137\141\x74\164\162\151\x62\x75\x74\x65\x5f" . $uB]) && !empty($_POST["\155\x6f\137\x73\x61\155\154\137\144\151\163\x70\154\141\x79\x5f\141\164\164\x72\x69\x62\x75\x74\145\137" . $uB]))) {
            goto uF;
        }
        array_push($EL, $uB);
        uF:
        $uB++;
        goto AQ;
        rd:
        Tq:
        $w2 = get_option("\163\141\155\x6c\137\141\x74\164\x72\x73\x5f\x74\157\x5f\144\151\163\160\154\141\171\137\151\x64\160");
        $w2 = maybe_unserialize($w2);
        if (!empty($w2)) {
            goto tq;
        }
        $w2 = array();
        tq:
        if (empty($EL)) {
            goto xm;
        }
        $w2[$tj] = $EL;
        xm:
        update_option("\163\141\155\154\x5f\x61\164\164\162\x73\137\x74\157\137\144\x69\163\x70\154\x61\171\x5f\x69\x64\x70", $w2);
        $UN = array_combine($ao, $RW);
        $UN = array_filter($UN);
        if (!empty($df)) {
            goto h5;
        }
        $df = array();
        h5:
        if (!empty($UN)) {
            goto j2;
        }
        if (empty($df[$tj])) {
            goto T6;
        }
        unset($df[$tj]);
        T6:
        goto U2;
        j2:
        $df[$tj] = $UN;
        U2:
        if (!($tj == "\104\x45\106\101\x55\x4c\x54")) {
            goto xs;
        }
        if (!(!empty($eB) and is_array($eB))) {
            goto tr;
        }
        foreach ($eB as $ec) {
            $nh = $ec["\x69\144\160\x5f\156\x61\155\145"];
            if (!(!array_key_exists($nh, $df) || empty($df[$nh]) || $df[$nh] === $eQ["\104\105\x46\x41\125\x4c\x54"])) {
                goto sw;
            }
            $df[$nh] = $df["\104\x45\x46\101\125\x4c\124"];
            sw:
            Eq:
        }
        es:
        tr:
        xs:
        update_option("\155\x6f\137\163\141\155\x6c\137\x63\165\x73\164\x6f\155\137\141\164\164\x72\x73\137\155\x61\160\160\x69\x6e\147", $df);
        $Mc = "\101\x74\164\162\x69\142\165\164\x65\40\115\141\160\160\151\156\147\x20\163\141\166\145\144\x20\x73\x75\x63\x63\145\x73\x73\x66\165\x6c\x6c\x79\x2e";
        update_option("\155\x6f\137\163\141\155\x6c\137\x6d\145\163\x73\x61\x67\x65", $Mc);
        $this->mo_saml_show_success_message();
        Je:
        if (!self::mo_check_option_admin_referer("\162\x65\163\145\164\137\141\164\x74\x72\x5f\x6d\x61\160\x70\151\x6e\147")) {
            goto et;
        }
        if (!(isset($_POST["\162\145\163\145\164\137\x69\144\160\137\156\141\155\145"]) and !empty($_POST["\162\x65\163\x65\x74\x5f\151\144\160\137\156\141\155\x65"]))) {
            goto cW;
        }
        $tj = htmlspecialchars($_POST["\x72\145\x73\145\164\x5f\x69\144\160\137\x6e\141\x6d\145"]);
        $nV = maybe_unserialize(get_option("\x73\141\x6d\x6c\x5f\x69\144\160\137\141\164\x74\x72\151\142\x75\x74\145\137\155\141\160\160\151\156\x67"));
        $FH = maybe_unserialize(get_option("\x6d\x6f\137\163\x61\x6d\154\x5f\x63\x75\163\x74\x6f\x6d\x5f\141\x74\x74\x72\x73\137\155\141\x70\x70\151\156\147"));
        if (!(is_array($nV) and isset($nV[$tj]))) {
            goto f9;
        }
        unset($nV[$tj]);
        update_option("\x73\141\x6d\154\x5f\151\144\160\x5f\x61\164\x74\162\x69\x62\165\164\145\x5f\x6d\141\x70\x70\x69\x6e\147", $nV);
        f9:
        if (!(is_array($FH) and isset($FH[$tj]))) {
            goto W0;
        }
        unset($FH[$tj]);
        update_option("\x6d\x6f\137\163\141\x6d\154\x5f\x63\x75\x73\164\x6f\x6d\137\x61\164\x74\x72\163\x5f\155\141\x70\x70\151\156\x67", $FH);
        W0:
        cW:
        et:
        if (!self::mo_check_option_admin_referer("\155\157\137\x73\141\x6d\154\x5f\x65\156\141\x62\x6c\x65\x5f\x6c\x6f\x67\x69\x6e\137\162\145\x64\x69\162\145\143\x74\x5f\157\x70\164\151\x6f\x6e")) {
            goto Zn;
        }
        if (mo_saml_is_sp_configured()) {
            goto Pz;
        }
        update_option("\155\x6f\137\163\141\155\154\137\155\145\163\163\x61\147\x65", "\120\x6c\x65\x61\163\145\40\x63\x6f\x6d\160\x6c\x65\x74\x65\x20" . addLink("\123\145\x72\166\151\143\145\x20\120\162\x6f\x76\151\x64\145\162", add_query_arg(array("\164\x61\x62" => "\163\x61\x76\145"), $_SERVER["\x52\105\x51\125\x45\x53\124\137\125\x52\111"])) . "\40\x63\x6f\156\x66\x69\147\165\162\x61\x74\x69\x6f\156\x20\146\151\162\x73\x74\x2e");
        $this->mo_saml_show_error_message();
        goto x9;
        Pz:
        if (array_key_exists("\x6d\x6f\137\x73\x61\x6d\x6c\137\145\156\141\142\x6c\145\x5f\154\157\147\151\156\x5f\x72\x65\x64\151\162\145\143\x74", $_POST)) {
            goto e3;
        }
        $K9 = "\x66\x61\154\x73\x65";
        goto zw;
        e3:
        $K9 = htmlspecialchars($_POST["\x6d\x6f\137\163\x61\155\x6c\x5f\x65\x6e\141\142\154\145\x5f\x6c\x6f\x67\151\x6e\137\x72\145\x64\x69\x72\145\143\164"]);
        zw:
        if ($K9 == "\x74\x72\165\x65") {
            goto Nd;
        }
        update_option("\x6d\x6f\137\x73\x61\155\154\137\x65\x6e\141\142\154\145\x5f\x6c\x6f\147\151\x6e\x5f\x72\x65\x64\151\x72\145\x63\x74", '');
        update_option("\x6d\157\137\x73\x61\155\x6c\137\x61\x6c\x6c\x6f\167\x5f\x77\x70\x5f\x73\x69\x67\x6e\x69\156", '');
        goto z_;
        Nd:
        update_option("\155\157\137\x73\x61\155\154\x5f\x65\156\141\x62\x6c\x65\137\154\157\147\x69\156\137\x72\x65\x64\151\x72\x65\x63\x74", "\x74\x72\165\145");
        update_option("\155\157\137\x73\141\x6d\x6c\x5f\141\x6c\154\157\167\x5f\x77\x70\x5f\x73\151\x67\x6e\x69\156", "\x74\162\x75\145");
        z_:
        update_option("\x6d\157\137\163\x61\155\x6c\137\x6d\x65\163\x73\x61\147\145", "\x53\151\147\x6e\40\x69\156\x20\x6f\x70\x74\x69\x6f\156\x73\x20\x75\160\x64\141\x74\x65\x64\x2e");
        $this->mo_saml_show_success_message();
        x9:
        Zn:
        if (!self::mo_check_option_admin_referer("\162\145\x73\x65\164\x5f\x64\157\x6d\141\151\x6e\137\162\145\163\x74\162\151\x63\x74\x69\x6f\x6e")) {
            goto D6;
        }
        if (!(isset($_POST["\162\x65\x73\145\x74\137\151\144\x70\x5f\x6e\141\x6d\145"]) and !empty($_POST["\x72\145\163\145\164\x5f\151\144\160\x5f\156\141\155\145"]))) {
            goto TG;
        }
        $tj = htmlspecialchars($_POST["\x72\x65\163\x65\164\137\151\x64\160\x5f\156\x61\x6d\x65"]);
        $hq = maybe_unserialize(get_option("\x73\141\x6d\x6c\137\144\157\x6d\141\151\156\x5f\x72\145\163\164\x72\x69\x63\164\151\157\x6e"));
        if (!(is_array($hq) and isset($hq[$tj]))) {
            goto wJ;
        }
        unset($hq[$tj]);
        update_option("\x73\141\x6d\x6c\137\x64\157\155\141\x69\x6e\137\x72\x65\163\x74\162\151\x63\x74\x69\x6f\x6e", $hq);
        wJ:
        TG:
        D6:
        if (!self::mo_check_option_admin_referer("\x72\145\x73\x65\164\137\x72\157\x6c\x65\x5f\155\x61\x70\x70\151\x6e\147")) {
            goto LC;
        }
        if (!(isset($_POST["\x72\145\163\145\164\137\x69\144\160\137\156\141\155\145"]) and !empty($_POST["\x72\145\x73\x65\x74\x5f\151\144\x70\x5f\156\x61\155\145"]))) {
            goto qH;
        }
        $tj = htmlspecialchars($_POST["\x72\x65\163\145\x74\137\x69\144\160\x5f\x6e\141\155\x65"]);
        $I0 = maybe_unserialize(get_option("\x73\141\155\154\x5f\151\x64\160\137\x72\x6f\154\145\x5f\x6d\141\x70\160\x69\x6e\x67"));
        if (!(is_array($I0) and isset($I0[$tj]))) {
            goto Dq;
        }
        unset($I0[$tj]);
        update_option("\x73\141\x6d\x6c\137\x69\x64\x70\x5f\x72\x6f\x6c\145\137\155\141\160\160\x69\156\147", $I0);
        Dq:
        qH:
        LC:
        if (!self::mo_check_option_admin_referer("\x64\x6f\x6d\141\x69\x6e\x5f\146\141\151\154")) {
            goto FH;
        }
        if (!mo_saml_is_sp_configured()) {
            goto MT;
        }
        $tP = '';
        if (!isset($_POST["\144\157\x6d\x61\151\x6e\x5f\x6c\157\147\151\156\137\x66\x61\151\x6c\145\x64\x5f\157\160\164\x69\157\x6e"])) {
            goto pg;
        }
        $tP = $_POST["\x64\157\x6d\141\151\x6e\x5f\x6c\x6f\x67\151\156\x5f\146\141\151\154\x65\x64\x5f\157\160\x74\151\x6f\156"];
        pg:
        if ($tP === "\x75\163\145\x5f\x77\x70\137\x63\x72\x65\x64\x65\156\164\151\141\x6c\163") {
            goto wL;
        }
        if (!($tP === "\x72\145\x64\x69\162\145\143\x74\x5f\164\157\x5f\x64\x65\x66\141\x75\x6c\x74\x5f\x69\x64\x70")) {
            goto X3;
        }
        $r7 = '';
        $RZ = "\x74\x72\x75\x65";
        X3:
        goto V3;
        wL:
        $r7 = "\x74\162\x75\145";
        $RZ = '';
        V3:
        $r7 = $RZ === "\x74\x72\165\x65" ? '' : $r7;
        update_option("\155\x6f\137\163\x61\x6d\154\137\x64\157\155\x61\151\156\137\x6c\x6f\147\151\x6e\137\146\141\x69\x6c", $r7);
        update_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\146\141\154\154\142\x61\143\153\137\164\157\137\144\x65\x66\x61\165\154\164", $RZ);
        update_option("\x6d\x6f\137\163\x61\155\x6c\x5f\155\145\x73\x73\x61\x67\x65", "\104\x6f\155\141\151\156\40\x4d\141\x70\160\151\156\147\x20\157\160\164\151\157\156\163\40\x75\160\x64\x61\164\145\144\x2e");
        $this->mo_saml_show_success_message();
        MT:
        FH:
        if (!self::mo_check_option_admin_referer("\x64\x6f\155\141\x69\x6e\137\x72\145\163\164\162\x69\x63\x74\x69\x6f\x6e\x5f\151\144\160")) {
            goto VZ;
        }
        if (!(isset($_POST["\144\157\155\x61\x69\x6e\x5f\x72\145\163\164\162\x69\x63\164\x69\x6f\x6e\137\151\x64\160\137\x6e\141\155\x65"]) and !empty($_POST["\x64\157\155\141\x69\x6e\x5f\162\145\x73\164\x72\x69\x63\164\151\x6f\156\137\x69\x64\x70\x5f\156\x61\155\x65"]))) {
            goto Fa;
        }
        $hq = htmlspecialchars($_POST["\x64\x6f\155\x61\x69\x6e\x5f\162\145\163\164\162\x69\143\x74\x69\x6f\156\137\x69\144\x70\137\x6e\x61\x6d\145"]);
        Fa:
        update_option("\x73\141\x6d\154\137\x64\157\155\141\x69\x6e\x5f\x72\x65\x73\x74\x72\x69\x63\x74\151\x6f\x6e\137\151\144\x70", $hq);
        VZ:
        if (!self::mo_check_option_admin_referer("\x73\x61\x6d\154\x5f\x66\x6f\162\x6d\x5f\x64\x6f\155\141\x69\156\137\162\x65\x73\x74\162\151\x63\164\151\157\156\137\157\160\x74\151\x6f\156")) {
            goto xu;
        }
        if (!(isset($_POST["\144\157\155\x61\x69\x6e\x5f\162\145\x73\x74\x72\151\x63\x74\x69\157\156\137\151\144\x70\x5f\156\x61\x6d\145"]) and !empty($_POST["\144\x6f\155\141\151\156\137\x72\145\x73\164\x72\151\x63\x74\151\x6f\156\137\x69\x64\160\137\x6e\141\x6d\x65"]))) {
            goto Uh;
        }
        $hq = htmlspecialchars($_POST["\x64\x6f\155\141\x69\156\x5f\162\145\163\164\x72\151\x63\164\x69\x6f\x6e\137\151\x64\160\x5f\156\141\x6d\x65"]);
        Uh:
        if (!empty($hq)) {
            goto l_;
        }
        $hq = "\104\x45\106\x41\x55\x4c\124";
        l_:
        $Mz = isset($_POST["\x6d\x6f\137\x73\x61\x6d\154\137\x65\156\x61\x62\154\x65\x5f\x64\157\155\x61\151\156\137\162\145\x73\x74\x72\151\x63\x74\x69\x6f\156\137\154\x6f\x67\x69\x6e"]) && !empty($_POST["\155\x6f\137\163\x61\155\154\x5f\145\x6e\141\x62\154\145\x5f\144\157\x6d\x61\x69\x6e\x5f\162\x65\163\x74\x72\151\143\164\x69\157\x6e\137\154\157\x67\x69\156"]) ? htmlspecialchars($_POST["\155\x6f\137\163\x61\155\x6c\x5f\x65\156\141\x62\154\x65\137\x64\x6f\155\x61\151\156\x5f\x72\145\163\x74\x72\x69\143\164\151\157\x6e\x5f\154\x6f\147\x69\156"]) : '';
        $p9 = isset($_POST["\x6d\157\x5f\x73\x61\155\154\137\x61\x6c\x6c\x6f\167\x5f\144\x65\x6e\x79\x5f\x75\x73\x65\x72\137\167\151\x74\150\137\x64\x6f\155\141\x69\156"]) && !empty($_POST["\155\157\x5f\163\141\x6d\x6c\137\x61\154\154\157\167\x5f\144\145\156\x79\137\x75\163\x65\x72\137\167\151\164\150\x5f\144\157\x6d\141\151\x6e"]) ? htmlspecialchars($_POST["\x6d\157\137\163\x61\x6d\x6c\x5f\x61\154\154\157\x77\137\x64\x65\x6e\171\x5f\165\x73\145\x72\137\x77\151\164\150\x5f\x64\157\155\x61\151\156"]) : "\x61\x6c\x6c\157\167";
        $io = isset($_POST["\x73\x61\x6d\154\x5f\141\x6d\x5f\145\x6d\x61\x69\154\x5f\144\157\155\141\x69\156\163"]) && !empty($_POST["\163\x61\x6d\x6c\x5f\141\x6d\137\145\155\141\x69\x6c\x5f\x64\x6f\x6d\141\151\156\x73"]) ? htmlspecialchars($_POST["\163\141\155\154\137\x61\x6d\x5f\145\x6d\x61\151\154\137\x64\157\155\x61\151\156\x73"]) : '';
        $Q_ = get_option("\163\x61\155\154\x5f\x64\x6f\155\141\x69\156\x5f\162\x65\x73\164\162\x69\x63\164\x69\157\x6e");
        $Q_ = maybe_unserialize($Q_);
        if (!empty($Q_)) {
            goto fu;
        }
        $Q_ = array();
        fu:
        $Q_[$hq] = array("\x65\x6e\x61\x62\x6c\x65\137\144\157\155\x61\151\x6e\x5f\x72\145\x73\x74\x72\x69\x63\x74\x69\157\x6e" => $Mz, "\141\x6c\154\x6f\167\137\144\145\156\171\137\x6c\157\x67\151\156" => $p9, "\145\155\x61\x69\x6c\x5f\144\x6f\155\x61\151\156\x73" => $io);
        update_option("\x73\x61\155\x6c\x5f\144\x6f\x6d\x61\x69\x6e\x5f\x72\145\163\x74\162\x69\x63\164\151\x6f\156", $Q_);
        update_option("\x73\141\x6d\154\x5f\x64\x6f\x6d\141\x69\x6e\x5f\x72\x65\163\164\162\151\x63\164\151\157\x6e\x5f\x69\144\160", $hq);
        update_option("\x6d\157\137\163\x61\x6d\x6c\x5f\x6d\x65\163\x73\x61\147\145", "\x44\x6f\x6d\x61\151\x6e\x20\122\x65\163\x74\162\151\x63\x74\x69\x6f\156\40\150\x61\163\x20\x62\x65\145\156\x20\x73\x61\x76\x65\x64\40\163\165\x63\x63\145\163\x73\x66\165\x6c\154\x79\56");
        $this->mo_saml_show_success_message();
        xu:
        if (!self::mo_check_option_admin_referer("\154\157\x67\x69\156\x5f\x77\151\144\147\x65\x74\137\x73\141\x6d\154\x5f\x72\157\154\145\137\155\x61\160\x70\x69\x6e\x67")) {
            goto Vb;
        }
        if (mo_saml_is_extension_installed("\x63\x75\162\154")) {
            goto Nl;
        }
        update_option("\155\x6f\137\x73\141\155\154\137\155\x65\163\163\141\147\145", "\105\x52\122\x4f\x52\72\40\74\x61\x20\x68\x72\145\x66\75\x22\150\164\164\x70\72\57\x2f\160\150\x70\x2e\x6e\x65\164\57\155\x61\x6e\x75\141\x6c\57\x65\156\x2f\143\x75\162\x6c\56\151\x6e\163\164\141\x6c\154\141\164\151\157\156\x2e\160\150\160\x22\40\x74\x61\162\147\145\164\75\42\x5f\x62\x6c\x61\156\x6b\42\76\120\x48\120\40\x63\125\x52\x4c\40\x65\x78\x74\x65\x6e\163\151\157\156\x3c\57\x61\x3e\x20\151\x73\x20\156\x6f\x74\40\151\x6e\163\x74\141\154\x6c\145\144\x20\157\x72\x20\x64\151\x73\x61\x62\154\145\144\56\x20\x53\141\x76\x65\40\x52\x6f\x6c\x65\40\x4d\141\x70\x70\x69\156\147\40\x66\141\151\x6c\145\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        Nl:
        $Fc = '';
        if (isset($_POST["\x6d\x6f\x5f\163\x61\x6d\154\137\144\x6f\156\164\x5f\x63\x72\x65\x61\164\x65\137\165\x73\145\x72\x5f\151\146\x5f\162\x6f\x6c\x65\137\156\157\x74\x5f\x6d\x61\x70\160\145\144"])) {
            goto Cc;
        }
        if (isset($_POST["\163\141\155\154\137\141\x6d\137\144\157\x6e\x74\137\x61\154\154\x6f\x77\x5f\165\156\x6c\151\x73\x74\x65\x64\137\165\163\145\x72\x5f\x72\157\154\x65"])) {
            goto xM;
        }
        $jf = "\165\x6e\143\x68\x65\143\x6b\145\144";
        $Fc = $_POST["\163\x61\155\154\x5f\141\155\x5f\x64\145\x66\x61\165\154\x74\x5f\x75\x73\x65\162\137\x72\x6f\x6c\145"];
        $p2 = "\165\x6e\x63\x68\145\143\x6b\x65\144";
        goto HA;
        Cc:
        $jf = "\x63\x68\145\x63\153\145\144";
        $Fc = false;
        $p2 = "\x75\x6e\x63\x68\x65\143\x6b\x65\x64";
        goto HA;
        xM:
        $jf = "\165\x6e\143\x68\x65\x63\x6b\x65\144";
        $Fc = false;
        $p2 = "\143\150\x65\x63\153\x65\144";
        HA:
        if (isset($_POST["\155\157\137\163\141\155\154\x5f\x6b\x65\145\x70\137\x65\x78\x69\x73\x74\151\x6e\147\x5f\x75\163\145\162\163\137\x72\x6f\154\x65"])) {
            goto wC;
        }
        $Xr = "\165\x6e\143\x68\145\143\x6b\145\144";
        goto QN;
        wC:
        $Xr = "\143\x68\x65\143\x6b\145\144";
        QN:
        if (isset($_POST["\155\157\137\163\x61\x6d\x6c\137\x64\x6f\x6e\164\137\x61\154\x6c\157\167\137\x75\x73\145\x72\x5f\x74\157\154\x6f\x67\x69\156\137\143\162\x65\x61\x74\x65\137\x77\x69\x74\x68\137\x67\x69\x76\x65\156\x5f\x67\x72\x6f\165\x70\x73"])) {
            goto na;
        }
        $Kk = "\x75\x6e\143\150\145\143\x6b\145\x64";
        goto zt;
        na:
        $Kk = "\x63\x68\145\x63\153\145\x64";
        zt:
        $eB = maybe_unserialize(get_option("\x73\x61\155\154\x5f\151\x64\145\x6e\x74\151\x74\x79\137\160\x72\x6f\x76\x69\144\145\162\163"));
        $eB = maybe_unserialize($eB);
        $I0 = get_option("\x73\x61\x6d\x6c\x5f\151\x64\160\137\162\157\154\145\x5f\x6d\x61\x70\160\151\156\x67");
        $I0 = maybe_unserialize($I0);
        if ($I0) {
            goto yQ;
        }
        $I0 = array();
        yQ:
        if (array_key_exists("\x44\105\106\x41\x55\114\124", $I0)) {
            goto M4;
        }
        $I0["\x44\105\x46\x41\x55\x4c\x54"] = array();
        M4:
        $xK = $I0;
        $tj = $_POST["\x72\157\x6c\145\137\x6d\141\x70\160\x69\x6e\x67\x5f\151\x64\x70\x5f\x6e\x61\x6d\x65"];
        if (!(array_key_exists($tj, $eB) || $tj == "\x44\105\x46\101\x55\x4c\124")) {
            goto wu;
        }
        if (!isset($_POST["\155\157\x5f\x73\x61\x6d\154\x5f\162\145\163\x74\162\x69\x63\x74\x5f\x75\x73\x65\162\163\x5f\167\x69\164\150\x5f\147\162\x6f\x75\x70\163"])) {
            goto o9;
        }
        if (!empty($_POST["\155\157\137\163\x61\155\154\x5f\x72\x65\163\164\x72\x69\x63\164\x5f\x75\x73\145\x72\x73\137\x77\151\x74\x68\137\x67\x72\x6f\x75\x70\x73"])) {
            goto D1;
        }
        $I0[$tj]["\155\157\137\163\x61\x6d\x6c\137\x72\x65\x73\164\162\151\x63\x74\x5f\165\x73\145\162\163\137\167\151\x74\x68\137\x67\162\x6f\x75\x70\163"] = '';
        goto sq;
        D1:
        $I0[$tj]["\x6d\157\x5f\x73\141\x6d\x6c\x5f\162\x65\163\164\x72\x69\143\x74\137\165\x73\145\x72\163\137\x77\151\164\x68\x5f\x67\x72\157\x75\160\x73"] = stripslashes($_POST["\x6d\x6f\137\163\x61\x6d\154\x5f\162\x65\163\x74\162\x69\x63\x74\137\x75\163\x65\162\x73\x5f\167\x69\164\150\x5f\x67\162\157\165\x70\163"]);
        sq:
        o9:
        $wp_roles = new WP_Roles();
        $N8 = $wp_roles->get_names();
        foreach ($N8 as $v2 => $W7) {
            $rs = "\x73\141\x6d\154\137\141\x6d\137\147\x72\x6f\x75\x70\x5f\x61\x74\164\162\137\x76\141\154\165\x65\163\137" . $v2;
            $I0[$tj][$v2] = stripslashes($_POST[$rs]);
            Ap:
        }
        pB:
        $I0[$tj]["\x64\x65\146\141\165\x6c\164\137\x72\157\154\x65"] = $Fc;
        $I0[$tj]["\144\157\x6e\x74\x5f\x63\x72\145\141\x74\x65\x5f\165\163\x65\162"] = $jf;
        $I0[$tj]["\x64\x6f\156\x74\x5f\141\x6c\154\157\167\x5f\165\x6e\x6c\x69\163\x74\x65\144\137\165\x73\x65\x72"] = $p2;
        $I0[$tj]["\x6b\x65\x65\x70\137\145\170\151\x73\164\x69\156\147\137\x75\x73\x65\x72\163\137\x72\x6f\154\145"] = $Xr;
        $I0[$tj]["\144\157\156\x74\137\x61\154\154\157\x77\x5f\x75\x73\145\162\137\164\x6f\154\157\147\151\x6e\x5f\143\162\x65\x61\x74\x65\x5f\x77\x69\164\150\137\x67\x69\166\145\156\x5f\x67\162\x6f\x75\160\163"] = $Kk;
        wu:
        $I0 = array_filter($I0, "\x66\151\154\164\x65\162\137\145\155\160\x74\171\x5f\166\x61\154\165\x65\x73");
        if (!($tj == "\x44\105\106\x41\x55\114\x54")) {
            goto tL;
        }
        if (!(!empty($eB) and is_array($eB))) {
            goto WR;
        }
        foreach ($eB as $ec) {
            $nh = $ec["\151\144\160\x5f\156\141\x6d\145"];
            if (!(!array_key_exists($nh, $I0) || empty($I0[$nh]) || $I0[$nh] === $xK["\104\x45\x46\101\x55\114\124"])) {
                goto el;
            }
            $I0[$nh] = $I0["\104\x45\x46\101\x55\114\124"];
            el:
            Lz:
        }
        a2:
        WR:
        tL:
        update_option("\163\141\155\x6c\x5f\x69\144\x70\x5f\162\157\x6c\x65\137\155\x61\160\160\x69\156\147", $I0);
        update_option("\155\x6f\x5f\x73\141\155\x6c\137\155\145\163\163\141\x67\x65", "\x52\157\154\x65\x20\115\141\x70\x70\x69\156\147\x20\x64\x65\x74\x61\151\154\x73\40\163\141\166\145\144\40\163\165\143\x63\145\163\x73\x66\165\154\x6c\x79\56");
        $this->mo_saml_show_success_message();
        Vb:
        if (!self::mo_check_option_admin_referer("\155\x6f\137\x73\141\155\154\x5f\x75\x70\x64\141\x74\145\x5f\x69\144\160\137\163\x65\164\164\151\x6e\147\163\137\x6f\x70\164\151\157\156")) {
            goto in;
        }
        if (!(isset($_POST["\155\x6f\137\163\141\x6d\x6c\x5f\163\160\x5f\142\x61\163\145\137\x75\x72\154"]) && isset($_POST["\x6d\157\137\x73\x61\x6d\x6c\137\x73\x70\x5f\x65\x6e\x74\x69\x74\171\137\x69\144"]))) {
            goto Wx;
        }
        $ag = sanitize_text_field($_POST["\155\157\x5f\x73\141\155\x6c\x5f\163\160\x5f\142\141\163\145\137\x75\x72\154"]);
        $fN = sanitize_text_field($_POST["\x6d\157\137\163\x61\x6d\154\x5f\163\x70\137\x65\x6e\x74\x69\x74\x79\x5f\x69\x64"]);
        if (!(substr($ag, -1) == "\57")) {
            goto PX;
        }
        $ag = substr($ag, 0, -1);
        PX:
        update_option("\x6d\x6f\x5f\163\141\155\154\x5f\163\x70\137\142\x61\x73\145\x5f\165\162\154", $ag);
        update_option("\155\x6f\137\163\x61\x6d\x6c\137\163\x70\137\145\156\164\x69\x74\171\137\x69\x64", $fN);
        Wx:
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\x6d\145\163\163\141\147\x65", "\123\145\164\x74\151\x6e\x67\x73\x20\x75\160\x64\141\x74\145\144\x20\x73\165\143\143\145\163\163\146\165\154\154\171\x2e");
        $this->mo_saml_show_success_message();
        in:
        if (!self::mo_check_option_admin_referer("\163\x61\x6d\x6c\x5f\165\160\x6c\157\141\x64\137\x6d\145\x74\141\144\141\x74\141")) {
            goto vk;
        }
        if (function_exists("\167\160\137\x68\x61\156\144\x6c\x65\137\165\x70\154\157\141\x64")) {
            goto b0;
        }
        require_once ABSPATH . "\x77\x70\x2d\x61\144\x6d\x69\x6e\x2f\x69\156\x63\154\x75\144\x65\x73\57\x66\x69\154\x65\56\160\150\160";
        b0:
        update_option("\143\165\x72\162\145\156\164\x5f\x69\x64\160\137\x64\145\164\141\151\x6c\x73", array());
        $y3 = ini_get("\x6d\x61\x78\x5f\x65\x78\145\x63\165\164\x69\x6f\x6e\137\164\x69\155\145");
        set_time_limit(0);
        $this->_handle_upload_metadata();
        set_time_limit($y3);
        vk:
        if (!self::mo_check_option_admin_referer("\155\160\x5f\163\141\155\x6c\x5f\x63\x65\162\x74\x5f\x69\144\160\x5f\157\x70\164\x69\x6f\156")) {
            goto N_;
        }
        if (isset($_POST["\163\141\155\x6c\137\x63\145\x72\164\x5f\x69\144\160"]) and !empty($_POST["\163\x61\x6d\154\137\x63\145\x72\164\137\x69\x64\160"])) {
            goto pL;
        }
        update_option("\155\x6f\x5f\163\141\x6d\x6c\137\143\145\x72\x74\x5f\151\144\160\x5f\156\x61\x6d\145", "\104\105\x46\x41\x55\x4c\x54");
        goto A1;
        pL:
        update_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\x63\145\x72\x74\137\x69\x64\160\x5f\156\x61\155\145", htmlspecialchars($_POST["\x73\141\x6d\x6c\x5f\x63\145\162\164\137\151\144\160"]));
        A1:
        N_:
        if (!self::mo_check_option_admin_referer("\165\x70\147\162\x61\144\145\x5f\143\x65\x72\164")) {
            goto le;
        }
        $CH = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\x73\157\165\x72\143\x65\x73" . DIRECTORY_SEPARATOR . "\155\151\x6e\151\157\162\141\156\x67\x65\x5f\x73\160\x5f\154\x61\164\145\x73\x74\56\143\162\164");
        $aS = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\163\x6f\x75\x72\143\145\163" . DIRECTORY_SEPARATOR . "\155\151\x6e\151\157\162\141\156\x67\145\137\x73\x70\137\x6c\x61\x74\x65\163\x74\x5f\x70\x72\151\x76\56\153\145\x79");
        $nh = "\x44\105\106\101\x55\x4c\124";
        if (!(isset($_POST["\151\x64\x70\x5f\x6e\141\x6d\145"]) and !empty($_POST["\x69\x64\160\x5f\x6e\141\155\145"]))) {
            goto dA;
        }
        $nh = htmlspecialchars($_POST["\151\144\x70\137\x6e\x61\x6d\145"]);
        dA:
        $q9 = maybe_unserialize(get_option("\163\x61\155\x6c\x5f\151\x64\x65\x6e\x74\x69\164\171\137\x70\162\157\x76\x69\x64\x65\162\163"));
        if ($nh == "\x44\x45\x46\x41\x55\x4c\x54") {
            goto z3;
        }
        $q9[$nh]["\x73\160\137\143\145\x72\x74"] = $CH;
        $q9[$nh]["\x73\160\x5f\160\x72\151\x76\137\x6b\x65\171"] = $aS;
        goto PG;
        z3:
        update_option("\155\157\137\x73\x61\155\x6c\x5f\143\x75\162\x72\145\156\x74\x5f\x63\145\162\x74", $CH);
        update_option("\x6d\157\x5f\x73\x61\155\154\137\143\165\162\x72\x65\156\164\137\143\x65\162\164\x5f\160\162\x69\x76\141\164\145\x5f\x6b\x65\171", $aS);
        foreach ($q9 as $ec) {
            unset($ec["\x73\160\137\x63\x65\162\x74"]);
            unset($ec["\x73\x70\137\x70\x72\151\x76\137\x6b\x65\x79"]);
            Z_:
        }
        wU:
        PG:
        update_option("\x73\141\155\x6c\137\x69\144\x65\156\x74\151\164\x79\x5f\x70\x72\x6f\166\151\x64\145\162\163", $q9);
        update_option("\x6d\x6f\137\x73\141\155\x6c\137\x6d\x65\163\163\x61\147\x65", "\103\x65\162\x74\x69\x66\x69\143\x61\164\145\x20\125\x70\147\162\x61\x64\145\x64\40\163\x75\143\143\x65\163\163\x66\165\x6c\154\171");
        $this->mo_saml_show_success_message();
        le:
        if (self::mo_check_option_admin_referer("\141\x64\x64\x5f\x63\165\x73\164\157\155\137\143\x65\162\164\x69\x66\x69\143\x61\x74\x65")) {
            goto eK;
        }
        if (!self::mo_check_option_admin_referer("\x61\144\144\137\x63\165\163\x74\x6f\x6d\x5f\x6d\145\163\x73\141\147\145\x73")) {
            goto Vi;
        }
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\141\x63\x63\157\x75\156\164\137\x63\162\x65\141\x74\151\x6f\156\x5f\x64\x69\163\141\142\x6c\x65\144\x5f\x6d\x73\147", sanitize_text_field($_POST["\155\157\x5f\x73\141\155\x6c\x5f\x61\143\143\x6f\165\x6e\x74\x5f\x63\x72\x65\141\164\151\x6f\x6e\137\144\151\163\x61\142\154\145\x64\137\155\163\147"]));
        update_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\162\x65\163\x74\162\x69\x63\164\145\x64\x5f\x64\157\155\x61\151\156\137\x65\162\x72\x6f\x72\x5f\155\163\147", sanitize_text_field($_POST["\x6d\157\x5f\163\x61\155\x6c\137\162\145\x73\164\x72\151\x63\x74\x65\x64\137\144\x6f\x6d\x61\151\156\x5f\145\x72\x72\x6f\x72\137\x6d\x73\147"]));
        update_option("\155\157\137\x73\141\155\154\137\x6d\x65\163\x73\x61\x67\x65", "\x43\157\x6e\146\x69\147\165\x72\x61\x74\151\x6f\156\40\150\141\x73\x20\x62\145\145\156\x20\163\141\x76\145\144\x20\x73\x75\x63\x63\x65\x73\x73\x66\x75\154\x6c\171\56");
        $this->mo_saml_show_success_message();
        Vi:
        goto Bb;
        eK:
        if (isset($_POST["\x73\165\x62\155\151\x74"]) and $_POST["\163\x75\142\x6d\x69\164"] == "\x55\160\154\157\x61\144") {
            goto fq;
        }
        if (!(isset($_POST["\163\165\x62\155\x69\164"]) and $_POST["\x73\x75\x62\x6d\x69\x74"] == "\122\145\163\145\x74")) {
            goto MG;
        }
        delete_option("\155\x6f\137\x73\141\155\154\137\143\165\163\164\x6f\155\x5f\143\x65\x72\164");
        delete_option("\155\157\x5f\163\141\155\x6c\137\x63\x75\163\x74\157\x6d\x5f\143\145\162\164\137\x70\162\x69\x76\141\164\x65\x5f\x6b\x65\x79");
        update_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\x63\165\x72\x72\145\x6e\164\137\143\145\x72\x74", isset($CH));
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\143\165\x72\x72\x65\x6e\164\x5f\x63\145\x72\164\137\x70\162\x69\166\x61\x74\x65\x5f\153\145\x79", isset($aS));
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\x6d\145\x73\x73\141\x67\145", "\x52\145\x73\145\164\x20\103\x65\x72\x74\151\x66\x69\143\x61\164\x65\x20\x73\165\x63\143\x65\x73\x73\x66\x75\x6c\x6c\x79\56");
        $this->mo_saml_show_success_message();
        MG:
        goto Zl;
        fq:
        if (!@openssl_x509_read($_POST["\x73\141\x6d\x6c\x5f\x70\x75\x62\154\x69\143\x5f\x78\65\x30\71\x5f\x63\145\x72\x74\x69\x66\151\143\x61\164\145"])) {
            goto iW;
        }
        if (!@openssl_x509_check_private_key($_POST["\163\141\x6d\154\137\160\x75\x62\154\151\143\x5f\x78\x35\x30\x39\137\x63\x65\162\x74\151\146\x69\x63\x61\x74\x65"], $_POST["\x73\x61\155\x6c\137\160\162\x69\166\x61\164\x65\137\170\65\60\71\137\143\x65\x72\x74\x69\146\x69\x63\x61\164\145"])) {
            goto eE;
        }
        if (openssl_x509_read($_POST["\163\x61\x6d\154\137\x70\x75\x62\154\151\143\x5f\x78\65\x30\x39\137\x63\145\x72\164\151\146\151\143\141\164\x65"]) && openssl_x509_check_private_key($_POST["\x73\141\155\x6c\137\160\x75\142\x6c\x69\x63\x5f\x78\x35\x30\x39\137\143\x65\x72\164\151\x66\151\143\141\x74\x65"], $_POST["\163\x61\155\x6c\137\160\162\x69\166\141\x74\x65\x5f\170\65\x30\71\x5f\x63\x65\162\164\151\x66\x69\x63\141\x74\x65"])) {
            goto KQ;
        }
        goto KC;
        iW:
        update_option("\155\157\137\163\141\x6d\154\137\x6d\x65\163\x73\x61\x67\x65", "\111\x6e\166\x61\x6c\x69\144\x20\x43\145\162\x74\x69\x66\151\x63\141\164\x65\40\146\x6f\x72\155\141\164\56\x20\120\154\145\141\x73\x65\x20\145\x6e\164\x65\162\40\x61\40\x76\141\154\151\144\40\143\145\162\164\151\x66\x69\143\141\164\145\56");
        $this->mo_saml_show_error_message();
        return;
        goto KC;
        eE:
        update_option("\155\x6f\x5f\163\141\155\154\x5f\x6d\145\163\x73\141\147\x65", "\x49\156\166\141\154\x69\144\40\120\162\x69\166\141\164\x65\40\113\x65\171\x2e");
        $this->mo_saml_show_error_message();
        return;
        goto KC;
        KQ:
        $rF = $_POST["\163\x61\155\x6c\137\160\x75\142\154\x69\143\x5f\170\65\x30\71\137\x63\x65\x72\164\x69\x66\151\143\141\x74\x65"];
        $r4 = $_POST["\x73\141\x6d\154\x5f\160\x72\x69\x76\141\164\145\x5f\170\x35\60\x39\137\x63\x65\x72\164\x69\146\x69\143\141\164\145"];
        update_option("\155\157\137\x73\x61\x6d\x6c\137\x63\x75\x73\164\157\155\137\x63\x65\162\164", $rF);
        update_option("\155\157\x5f\x73\x61\x6d\154\137\143\x75\163\164\157\x6d\x5f\143\145\x72\164\x5f\x70\162\x69\166\x61\164\x65\x5f\x6b\145\171", $r4);
        update_option("\155\x6f\137\x73\141\x6d\154\137\143\x75\162\162\145\156\x74\137\x63\145\x72\164", $rF);
        update_option("\155\x6f\137\163\x61\155\x6c\x5f\143\x75\162\162\145\x6e\x74\137\x63\x65\x72\164\x5f\x70\162\151\166\x61\x74\145\137\153\145\171", $r4);
        update_option("\x6d\157\137\163\x61\155\x6c\137\155\x65\x73\x73\x61\147\145", "\x43\165\163\164\x6f\155\x20\103\145\x72\164\x69\146\x69\143\141\x74\145\x20\165\x70\144\141\x74\x65\144\40\x73\165\143\x63\145\163\x73\x66\165\154\x6c\171\56");
        $this->mo_saml_show_success_message();
        KC:
        Zl:
        Bb:
        if (!self::mo_check_option_admin_referer("\155\x6f\x5f\x73\x61\155\x6c\x5f\x72\145\154\141\x79\x5f\163\164\x61\x74\x65\x5f\x6f\x70\x74\x69\x6f\156")) {
            goto SL;
        }
        $ap = sanitize_text_field($_POST["\x6d\x6f\x5f\163\x61\x6d\154\137\x72\145\154\x61\x79\137\163\x74\141\164\145"]);
        update_option("\155\x6f\x5f\x73\x61\x6d\154\137\162\145\154\x61\171\137\163\x74\141\x74\x65", $ap);
        update_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\155\145\163\163\x61\x67\x65", "\122\145\x6c\141\171\40\x53\x74\x61\164\145\x20\165\160\x64\141\x74\x65\144\40\x73\x75\143\143\145\x73\x73\146\165\154\154\x79\56");
        $this->mo_saml_show_success_message();
        SL:
        if (!self::mo_check_option_admin_referer("\x6d\x6f\137\x73\x61\155\154\137\x69\144\x70\x5f\x6c\151\163\164\137\157\160\x74\x69\157\156")) {
            goto m4;
        }
        $Nk = sanitize_text_field($_POST["\155\157\137\x73\x61\x6d\154\x5f\x69\144\x70\137\x6c\x69\163\x74\x5f\x75\162\154"]);
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\x69\144\160\x5f\154\151\163\164\137\x75\162\154", $Nk);
        update_option("\x6d\x6f\x5f\x73\x61\155\154\137\x6d\145\163\x73\x61\147\x65", "\111\104\120\40\x4c\151\163\x74\40\120\x61\x67\145\x20\x55\x72\x6c\x20\165\x70\x64\x61\x74\145\144\x20\x73\165\143\x63\x65\163\x73\x66\165\154\154\x79\x2e");
        $this->mo_saml_show_success_message();
        m4:
        if (!self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\x6d\x6c\137\x73\150\x6f\162\164\143\157\x64\x65\137\157\160\164\151\157\156")) {
            goto U4;
        }
        $Ti = sanitize_text_field($_POST["\x6d\x6f\x5f\x73\141\155\x6c\x5f\x73\150\x6f\162\164\x63\157\x64\145\137\154\x6f\x67\x69\156\137\x74\145\x78\x74"]);
        update_option("\x6d\157\x5f\163\x61\155\154\137\163\x68\x6f\162\x74\x63\157\144\145\137\154\x6f\147\151\x6e\137\164\145\x78\x74", $Ti);
        update_option("\155\157\x5f\163\x61\x6d\154\x5f\x6d\145\x73\x73\141\147\145", "\x53\150\x6f\162\164\x63\x6f\144\x65\40\114\x6f\x67\x69\x6e\40\164\x65\x78\164\40\165\160\x64\141\x74\145\x64\x20\x73\x75\143\x63\145\x73\163\146\165\x6c\154\171\x2e");
        $this->mo_saml_show_success_message();
        U4:
        if (!self::mo_check_option_admin_referer("\x73\163\x6f\x5f\x62\165\164\x74\157\x6e\x5f\157\160\x74\x69\x6f\x6e")) {
            goto o4;
        }
        if (!isset($_POST["\163\163\157\x5f\142\x75\x74\x74\157\156\x5f\151\x64\160\137\x6e\x61\155\145"])) {
            goto EI;
        }
        $Zu = htmlspecialchars($_POST["\x73\x73\x6f\x5f\x62\165\164\x74\157\x6e\x5f\x69\144\160\137\x6e\x61\x6d\145"]);
        EI:
        if (!empty($Zu)) {
            goto d8;
        }
        $Zu = "\104\105\x46\101\125\x4c\x54";
        d8:
        if (isset($_POST["\x6d\157\137\163\141\x6d\154\x5f\x61\144\144\x5f\163\163\x6f\x5f\142\165\x74\164\157\156\137\x77\x70"])) {
            goto HI;
        }
        $Tk = "\x66\141\x6c\163\145";
        goto C_;
        HI:
        $Tk = htmlspecialchars($_POST["\155\x6f\x5f\163\x61\155\154\x5f\141\x64\x64\x5f\x73\163\x6f\137\x62\165\x74\164\157\x6e\137\x77\x70"]);
        C_:
        if (isset($_POST["\x6d\157\x5f\163\x61\x6d\154\137\x75\163\x65\x5f\142\165\164\x74\x6f\x6e\x5f\141\x73\x5f\163\150\157\x72\x74\143\x6f\144\145"])) {
            goto Fn1;
        }
        $s0 = "\146\x61\154\x73\145";
        goto Sy;
        Fn1:
        $s0 = htmlspecialchars($_POST["\x6d\157\137\x73\x61\155\x6c\x5f\165\x73\145\x5f\x62\x75\164\x74\157\156\x5f\x61\x73\x5f\x73\150\157\162\x74\143\x6f\144\x65"]);
        Sy:
        if (isset($_POST["\155\157\137\x73\x61\155\x6c\x5f\165\163\x65\x5f\x62\x75\164\164\x6f\156\137\x61\x73\x5f\x77\x69\144\147\145\x74"])) {
            goto Cd;
        }
        $iY = "\146\141\x6c\163\145";
        goto X9;
        Cd:
        $iY = htmlspecialchars($_POST["\x6d\x6f\x5f\163\x61\x6d\154\x5f\x75\163\x65\137\142\x75\x74\164\157\x6e\x5f\x61\163\x5f\167\x69\144\x67\145\164"]);
        X9:
        $u3 = '';
        $py = '';
        $wV = '';
        $lz = '';
        $US = '';
        $kJ = '';
        $dN = '';
        $qQ = '';
        $as = '';
        $JR = "\x61\x62\157\166\x65";
        if (!(array_key_exists("\x6d\157\x5f\163\141\155\154\137\x62\x75\x74\164\157\x6e\x5f\163\151\x7a\x65", $_POST) && !empty($_POST["\x6d\x6f\137\x73\x61\155\154\137\x62\165\x74\164\157\x6e\137\x73\151\172\x65"]))) {
            goto Fx;
        }
        $py = htmlspecialchars($_POST["\155\x6f\x5f\163\141\155\154\x5f\142\x75\164\x74\157\156\137\163\x69\x7a\x65"]);
        Fx:
        if (!(array_key_exists("\155\157\x5f\x73\141\155\154\137\x62\165\164\164\x6f\156\x5f\167\151\x64\x74\150", $_POST) && !empty($_POST["\x6d\157\137\163\141\155\x6c\x5f\142\165\x74\164\x6f\156\x5f\x77\x69\144\164\150"]))) {
            goto Pw;
        }
        $wV = htmlspecialchars($_POST["\155\x6f\x5f\x73\141\x6d\154\x5f\x62\x75\x74\164\x6f\x6e\137\x77\151\x64\164\150"]);
        Pw:
        if (!(array_key_exists("\155\x6f\x5f\163\x61\x6d\x6c\x5f\142\165\164\164\x6f\x6e\x5f\150\x65\151\147\150\x74", $_POST) && !empty($_POST["\155\157\x5f\163\x61\x6d\154\137\142\x75\x74\164\x6f\156\137\x68\145\151\x67\150\x74"]))) {
            goto SD;
        }
        $lz = htmlspecialchars($_POST["\x6d\x6f\x5f\x73\x61\155\154\x5f\x62\x75\164\164\x6f\156\x5f\150\x65\x69\x67\150\x74"]);
        SD:
        if (!(array_key_exists("\155\157\x5f\x73\141\x6d\x6c\x5f\142\165\x74\x74\x6f\156\137\143\x75\162\166\x65", $_POST) && !empty($_POST["\155\x6f\x5f\x73\141\155\x6c\x5f\x62\165\x74\164\x6f\156\137\143\165\162\x76\x65"]))) {
            goto ZZ;
        }
        $US = htmlspecialchars($_POST["\x6d\157\137\163\x61\x6d\154\137\142\165\x74\164\x6f\156\x5f\x63\165\162\166\145"]);
        ZZ:
        if (!array_key_exists("\155\x6f\x5f\163\141\155\x6c\x5f\x62\x75\x74\x74\x6f\156\x5f\x63\x6f\x6c\x6f\162", $_POST)) {
            goto K7;
        }
        $kJ = htmlspecialchars($_POST["\155\157\x5f\x73\141\x6d\x6c\137\142\x75\x74\164\x6f\156\137\x63\157\154\157\162"]);
        K7:
        if (!array_key_exists("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x62\x75\x74\164\157\x6e\x5f\x74\150\x65\x6d\x65", $_POST)) {
            goto C3;
        }
        $u3 = htmlspecialchars($_POST["\x6d\x6f\x5f\163\x61\155\154\137\142\x75\x74\x74\x6f\156\x5f\x74\150\x65\x6d\145"]);
        C3:
        if (!array_key_exists("\x6d\157\x5f\163\x61\155\154\x5f\x62\x75\x74\164\x6f\x6e\x5f\x74\x65\170\x74", $_POST)) {
            goto k1;
        }
        $dN = htmlspecialchars($_POST["\x6d\x6f\x5f\163\141\155\x6c\137\x62\x75\x74\164\157\156\x5f\x74\145\170\164"]);
        if (!(empty($dN) || $dN == "\x4c\157\147\151\x6e")) {
            goto GK;
        }
        $dN = "\x4c\x6f\x67\x69\156";
        GK:
        $dN = str_replace("\x23\x23\x49\104\x50\x23\43", $Zu, $dN);
        k1:
        if (!array_key_exists("\155\157\x5f\x73\141\x6d\154\x5f\146\157\x6e\164\x5f\x63\157\x6c\157\162", $_POST)) {
            goto e4;
        }
        $qQ = htmlspecialchars($_POST["\x6d\x6f\137\163\141\x6d\154\x5f\x66\x6f\156\164\137\x63\157\154\x6f\162"]);
        e4:
        if (!array_key_exists("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\146\x6f\x6e\164\x5f\x73\x69\172\145", $_POST)) {
            goto bC;
        }
        $as = htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\155\154\x5f\x66\x6f\156\x74\x5f\x73\151\x7a\145"]);
        bC:
        if (!array_key_exists("\163\163\x6f\137\142\x75\x74\164\157\x6e\x5f\154\157\x67\x69\156\x5f\146\x6f\162\155\137\x70\x6f\x73\151\164\x69\157\156", $_POST)) {
            goto yK;
        }
        $JR = htmlspecialchars($_POST["\x73\163\157\137\142\x75\x74\x74\157\156\x5f\154\x6f\x67\x69\156\x5f\146\157\162\x6d\137\x70\x6f\x73\x69\x74\x69\157\156"]);
        yK:
        $rU = array("\141\x64\144\137\142\x75\164\164\157\156\137\x77\x70\137\x6c\x6f\147\x69\156" => $Tk, "\165\x73\145\x5f\142\x75\x74\164\157\156\x5f\x61\x73\x5f\x73\150\157\x72\x74\x63\x6f\x64\145" => $s0, "\x75\x73\145\x5f\x62\165\164\164\x6f\156\x5f\x61\163\x5f\x77\x69\x64\147\145\x74" => $iY, "\142\165\164\164\x6f\156\x5f\x74\171\x70\145" => $u3, "\142\165\x74\x74\x6f\x6e\x5f\x73\x69\x7a\x65" => $py, "\142\x75\164\x74\x6f\156\137\167\151\x64\164\150" => $wV, "\142\x75\x74\164\157\156\x5f\x68\145\x69\x67\x68\x74" => $lz, "\142\165\x74\x74\157\x6e\137\143\165\x72\x76\x65" => $US, "\142\165\x74\164\x6f\x6e\x5f\143\x6f\154\x6f\x72" => $kJ, "\x62\165\164\x74\x6f\x6e\137\x74\145\x78\x74" => $dN, "\146\157\x6e\164\x5f\x63\157\154\157\x72" => $qQ, "\x66\x6f\156\164\x5f\163\x69\x7a\x65" => $as, "\x62\165\164\x74\x6f\x6e\x5f\160\157\163\151\x74\x69\x6f\156" => $JR);
        $Oi = get_option("\163\x61\155\x6c\137\163\x73\157\x5f\142\x75\164\x74\157\x6e\137\x69\x64\160");
        $Oi = maybe_unserialize($Oi);
        if (!empty($Oi)) {
            goto tn;
        }
        $Oi = array();
        tn:
        $Oi[$Zu] = $rU;
        update_option("\x73\141\155\x6c\x5f\x73\x73\157\x5f\142\x75\x74\x74\x6f\x6e\137\x69\144\160", $Oi);
        update_option("\x73\141\155\x6c\x5f\x62\165\164\164\157\156\x5f\151\144\160\x5f\x6e\141\155\x65", $Zu);
        update_option("\x6d\x6f\137\163\x61\x6d\154\x5f\x6d\145\x73\163\141\x67\x65", "\x4c\157\x67\151\156\x20\x62\165\x74\x74\x6f\x6e\x20\x75\160\144\141\x74\145\144\x20\x73\x75\143\143\x65\163\x73\146\165\x6c\154\x79\56");
        $this->mo_saml_show_success_message();
        o4:
        if (!self::mo_check_option_admin_referer("\163\x73\x6f\x5f\142\x75\x74\x74\x6f\156\x5f\151\144\160\x5f\x6e\141\x6d\145\137\157\160\x74\x69\x6f\156")) {
            goto mK;
        }
        if (isset($_POST["\x73\163\157\x5f\x62\165\164\164\157\156\x5f\x69\144\160"])) {
            goto ec;
        }
        $tj = "\104\105\106\101\x55\114\x54";
        goto ZR;
        ec:
        $tj = htmlspecialchars($_POST["\163\163\x6f\x5f\x62\x75\164\x74\x6f\156\x5f\151\x64\x70"]);
        ZR:
        update_option("\x73\x61\x6d\x6c\137\142\165\164\164\x6f\156\x5f\x69\x64\x70\x5f\156\141\155\145", $tj);
        mK:
        if (!(isset($_POST["\157\160\164\x69\x6f\156"]) and $_POST["\x6f\x70\164\151\157\156"] == "\162\145\163\x65\x74\x5f\163\x73\157\x5f\x62\165\x74\164\x6f\156\x5f\x6f\x70\164\151\157\156")) {
            goto t8;
        }
        delete_option("\x73\x61\x6d\154\x5f\x73\x73\157\x5f\142\165\164\x74\x6f\156\137\151\144\x70");
        update_option("\x6d\x6f\x5f\163\141\x6d\154\137\x6d\145\x73\x73\x61\147\145", "\x4c\157\x67\151\x6e\x20\x62\x75\164\164\157\156\x20\162\145\163\145\x74\40\163\165\x63\143\x65\x73\x73\x66\165\x6c\154\x79\x2e");
        $this->mo_saml_show_success_message();
        t8:
        if (!self::mo_check_option_admin_referer("\155\x6f\x5f\163\141\155\154\x5f\x72\x65\147\x69\x73\164\x65\162\137\143\x75\163\164\157\x6d\x65\162")) {
            goto DO1;
        }
        if (mo_saml_is_extension_installed("\143\x75\x72\x6c")) {
            goto ML;
        }
        update_option("\155\157\137\163\x61\x6d\154\137\x6d\x65\x73\163\x61\147\x65", "\105\122\x52\117\122\72\x20\x3c\141\x20\150\162\x65\146\75\x22\150\x74\x74\x70\x3a\57\x2f\x70\150\x70\x2e\156\145\x74\x2f\x6d\141\x6e\165\x61\154\57\x65\x6e\57\143\165\x72\154\x2e\151\156\x73\164\141\x6c\x6c\x61\x74\x69\157\156\x2e\x70\x68\160\42\40\x74\141\162\x67\145\164\x3d\42\x5f\x62\154\141\156\153\x22\x3e\x50\x48\x50\x20\x63\125\x52\x4c\40\145\170\x74\145\x6e\163\x69\x6f\x6e\x3c\57\141\76\x20\x69\163\40\x6e\157\164\40\x69\156\163\x74\x61\154\x6c\x65\x64\x20\x6f\162\40\x64\x69\x73\x61\142\154\x65\144\x2e\40\x52\145\147\151\x73\x74\162\x61\x74\151\x6f\156\40\146\141\x69\x6c\145\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        ML:
        $MI = '';
        $Rm = '';
        $ID = '';
        $U0 = '';
        if ($this->mo_saml_check_empty_or_null($_POST["\x65\x6d\x61\x69\154"]) || $this->mo_saml_check_empty_or_null($_POST["\x70\x61\163\x73\167\157\x72\144"]) || $this->mo_saml_check_empty_or_null($_POST["\143\x6f\x6e\146\151\162\x6d\x50\x61\163\163\x77\157\162\144"])) {
            goto R0;
        }
        if (strlen($_POST["\160\141\163\x73\167\x6f\x72\x64"]) < 6 || strlen($_POST["\143\157\156\146\x69\162\155\120\141\163\163\167\157\162\x64"]) < 6) {
            goto eD;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\x70\x61\x73\163\x77\157\162\x64"]))) {
            goto cl;
        }
        $MI = sanitize_email($_POST["\145\155\141\151\x6c"]);
        $Rm = sanitize_text_field($_POST["\x70\150\x6f\156\x65"]);
        $ID = stripslashes(strip_tags($_POST["\x70\x61\x73\163\167\x6f\x72\144"]));
        $U0 = stripslashes(strip_tags($_POST["\x63\157\x6e\146\151\x72\155\x50\141\x73\163\167\157\162\x64"]));
        goto Rq;
        cl:
        update_option("\155\x6f\137\163\141\x6d\x6c\x5f\155\x65\x73\163\x61\x67\x65", "\x4d\x69\x6e\x69\x6d\x75\155\x20\x36\40\x63\x68\141\x72\141\143\164\x65\162\163\40\163\x68\x6f\165\x6c\x64\x20\x62\x65\40\x70\162\x65\x73\x65\x6e\x74\x2e\x20\115\x61\170\x69\x6d\x75\x6d\x20\61\x35\x20\x63\150\141\x72\141\x63\164\145\162\163\40\163\150\x6f\165\x6c\x64\x20\x62\145\x20\x70\x72\x65\x73\x65\x6e\x74\56\40\117\156\154\171\x20\x66\x6f\x6c\x6c\157\167\x69\x6e\147\40\x73\x79\x6d\142\x6f\154\163\40\x28\41\100\x23\56\x24\45\x5e\x26\52\55\137\x29\40\163\150\157\x75\x6c\144\40\142\145\x20\x70\x72\145\x73\x65\x6e\x74\56");
        $this->mo_saml_show_error_message();
        return;
        Rq:
        goto Dd;
        eD:
        update_option("\155\x6f\x5f\x73\141\155\x6c\x5f\155\145\163\x73\141\147\145", "\103\150\x6f\157\163\x65\40\x61\x20\160\x61\x73\x73\x77\157\162\144\40\x77\x69\x74\150\40\x6d\151\156\x69\155\165\155\x20\154\x65\156\x67\164\150\40\x36\56");
        $this->mo_saml_show_error_message();
        return;
        Dd:
        goto AZ;
        R0:
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\137\155\x65\x73\163\x61\x67\145", "\x41\x6c\154\40\164\x68\145\x20\x66\151\x65\x6c\x64\x73\x20\x61\162\145\40\x72\x65\161\165\x69\162\145\x64\56\40\x50\x6c\x65\141\x73\145\40\145\156\164\145\162\40\x76\x61\154\151\x64\40\145\x6e\164\162\x69\x65\163\x2e");
        $this->mo_saml_show_error_message();
        return;
        AZ:
        update_option("\155\157\137\163\141\x6d\x6c\137\141\x64\155\151\156\x5f\145\x6d\x61\151\x6c", $MI);
        update_option("\155\157\137\x73\141\x6d\x6c\x5f\x61\x64\x6d\151\x6e\x5f\160\150\x6f\x6e\145", $Rm);
        if (strcmp($ID, $U0) == 0) {
            goto Y4;
        }
        update_option("\155\157\137\163\x61\155\154\x5f\155\x65\x73\163\x61\x67\x65", "\x50\141\x73\163\167\x6f\162\144\x73\x20\x64\x6f\40\x6e\x6f\164\40\x6d\x61\x74\x63\150\56");
        delete_option("\x6d\x6f\137\163\141\155\154\x5f\x76\145\x72\x69\x66\171\137\x63\x75\x73\x74\x6f\155\145\162");
        $this->mo_saml_show_error_message();
        goto Mr;
        Y4:
        update_option("\155\157\x5f\x73\141\155\154\137\x61\x64\155\x69\156\137\x70\141\163\x73\x77\157\162\144", $ID);
        $MI = get_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\141\x64\x6d\x69\x6e\x5f\145\x6d\141\151\x6c");
        $o1 = new CustomerSaml();
        $hi = $o1->check_customer($this);
        if ($hi) {
            goto ol;
        }
        return;
        ol:
        $jR = json_decode($hi, true);
        if (strcasecmp($jR["\163\164\141\164\165\x73"], "\103\125\x53\x54\117\115\x45\122\x5f\116\x4f\x54\137\106\x4f\125\116\104") == 0) {
            goto ur;
        }
        $this->get_current_customer();
        goto S2;
        ur:
        $jR = json_decode($o1->send_otp_token($MI, '', TRUE, FALSE, $this), true);
        if (strcasecmp($jR["\x73\x74\141\x74\165\x73"], "\x53\x55\x43\103\x45\123\x53") == 0) {
            goto kz;
        }
        update_option("\155\157\x5f\163\x61\155\154\137\x6d\145\163\x73\x61\x67\145", "\124\150\145\162\145\40\x77\141\163\40\x61\156\40\145\x72\x72\x6f\162\40\x69\x6e\40\x73\145\x6e\x64\x69\156\147\x20\x65\155\141\151\x6c\56\40\120\x6c\145\141\163\x65\x20\166\x65\x72\x69\146\171\40\171\157\165\x72\x20\x65\x6d\141\x69\154\x20\141\156\144\x20\x74\x72\x79\x20\141\x67\141\x69\156\56");
        update_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\x72\145\147\x69\x73\164\162\141\x74\x69\157\x6e\x5f\163\x74\x61\164\165\163", "\115\117\137\x4f\124\x50\x5f\104\105\114\111\x56\x45\122\105\104\137\106\x41\x49\114\x55\x52\105\137\105\115\101\x49\114");
        $this->mo_saml_show_error_message();
        goto tY;
        kz:
        update_option("\155\x6f\137\x73\141\x6d\154\137\x6d\145\x73\x73\141\x67\145", "\x20\101\x20\x6f\156\145\x20\x74\x69\x6d\145\40\160\141\x73\163\x63\x6f\144\145\x20\x69\163\40\163\x65\156\x74\x20\x74\157\x20" . get_option("\x6d\x6f\x5f\x73\141\155\154\137\141\x64\x6d\x69\x6e\x5f\145\155\141\151\154") . "\56\40\120\x6c\x65\x61\x73\x65\x20\x65\156\164\145\162\40\x74\150\145\x20\157\x74\x70\40\x68\145\162\145\x20\164\157\40\x76\x65\x72\x69\x66\x79\40\171\157\x75\x72\40\x65\x6d\x61\x69\154\x2e");
        update_option("\x6d\157\x5f\x73\x61\x6d\154\137\x74\162\x61\x6e\x73\x61\x63\164\151\x6f\x6e\x49\144", $jR["\x74\x78\x49\x64"]);
        update_option("\155\x6f\x5f\x73\x61\155\x6c\137\x72\145\147\x69\163\164\162\141\x74\151\x6f\156\137\163\x74\x61\x74\165\x73", "\x4d\x4f\137\117\124\x50\137\104\105\x4c\x49\x56\105\122\x45\x44\137\123\125\x43\103\x45\x53\x53\137\105\x4d\x41\x49\114");
        $this->mo_saml_show_success_message();
        tY:
        S2:
        Mr:
        DO1:
        if (!self::mo_check_option_admin_referer("\x6d\157\137\x73\141\155\154\137\x76\x61\x6c\151\144\141\164\x65\x5f\157\x74\x70")) {
            goto Lc;
        }
        if (mo_saml_is_extension_installed("\143\x75\162\x6c")) {
            goto xl;
        }
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\155\x65\x73\x73\x61\147\145", "\105\122\x52\x4f\122\72\40\74\141\x20\150\162\x65\x66\75\x22\x68\164\164\160\x3a\57\x2f\x70\x68\x70\x2e\156\x65\164\x2f\155\x61\156\165\x61\x6c\57\x65\156\57\x63\165\162\154\x2e\151\156\163\164\141\x6c\x6c\141\x74\x69\157\x6e\x2e\160\150\x70\42\40\164\x61\x72\147\145\x74\x3d\x22\137\142\154\x61\x6e\153\42\x3e\x50\110\x50\x20\x63\x55\122\114\40\x65\170\x74\x65\x6e\x73\x69\x6f\x6e\x3c\x2f\x61\x3e\40\x69\163\x20\156\x6f\164\40\151\156\163\164\x61\x6c\154\145\144\x20\157\162\x20\x64\151\x73\141\142\x6c\x65\144\56\40\x56\141\x6c\x69\x64\x61\164\x65\40\117\x54\x50\x20\146\x61\x69\154\x65\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        xl:
        $Iw = '';
        if ($this->mo_saml_check_empty_or_null($_POST["\157\x74\160\x5f\164\157\x6b\x65\156"])) {
            goto xb;
        }
        $Iw = sanitize_text_field($_POST["\x6f\164\160\x5f\x74\x6f\153\x65\156"]);
        goto hv;
        xb:
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\x6d\145\163\x73\141\x67\x65", "\x50\154\145\141\x73\145\40\145\x6e\x74\x65\x72\x20\141\40\x76\x61\x6c\x75\145\x20\151\x6e\x20\157\164\160\40\146\x69\x65\x6c\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        hv:
        $o1 = new CustomerSaml();
        $jR = json_decode($o1->validate_otp_token(get_option("\155\157\x5f\x73\141\155\x6c\x5f\x74\x72\x61\156\x73\x61\x63\x74\151\x6f\x6e\111\x64"), $Iw, $this), true);
        if (strcasecmp($jR["\x73\164\141\x74\165\x73"], "\123\x55\x43\103\x45\x53\x53") == 0) {
            goto Jm;
        }
        update_option("\155\157\137\163\x61\x6d\x6c\x5f\x6d\x65\163\x73\141\x67\145", "\111\156\166\141\x6c\x69\144\x20\157\x6e\145\40\x74\x69\155\145\x20\x70\x61\x73\x73\143\x6f\x64\145\56\40\120\154\x65\x61\x73\x65\x20\145\x6e\x74\x65\162\x20\x61\40\x76\141\154\x69\x64\40\x6f\164\x70\x2e");
        $this->mo_saml_show_error_message();
        goto Hm;
        Jm:
        $this->create_customer();
        Hm:
        Lc:
        if (self::mo_check_option_admin_referer("\155\157\137\163\141\x6d\154\137\166\x65\x72\151\146\x79\x5f\x63\165\x73\x74\x6f\x6d\x65\162")) {
            goto mm;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\163\141\155\154\137\143\x6f\156\164\x61\x63\x74\x5f\x75\163\137\161\x75\x65\162\x79\x5f\157\160\164\x69\x6f\x6e")) {
            goto Ys;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\x72\145\x73\x65\x6e\x64\137\157\x74\x70\137\x65\155\141\151\x6c")) {
            goto bi;
        }
        if (isset($_POST["\157\160\x74\x69\157\x6e"]) and $_POST["\157\x70\x74\151\157\x6e"] == "\x6d\157\137\x73\x61\155\x6c\x5f\162\145\x73\145\x6e\x64\x5f\x6f\x74\x70\x5f\160\x68\157\x6e\145") {
            goto Wr;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\163\x61\x6d\x6c\137\x67\x6f\x5f\x62\141\143\x6b")) {
            goto RB;
        }
        if (self::mo_check_option_admin_referer("\143\x6c\145\141\x72\137\x61\164\164\162\x73\x5f\154\151\x73\x74")) {
            goto Hj;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\163\x61\x6d\x6c\x5f\x72\x65\147\x69\163\164\145\162\137\167\x69\164\x68\137\160\x68\157\x6e\x65\137\x6f\x70\x74\x69\x6f\x6e")) {
            goto fy;
        }
        if (isset($_POST["\155\157\x5f\x73\141\x6d\154\137\141\x75\x74\157\x5f\162\x65\x64\x69\x72\x65\143\x74"]) and $_POST["\155\157\137\x73\x61\155\154\137\x61\165\164\x6f\137\x72\x65\x64\151\162\145\x63\x74"] == "\146\141\x6c\x73\145") {
            goto bl;
        }
        if (isset($_POST["\155\157\137\x73\x61\x6d\154\x5f\141\165\164\x6f\x5f\x72\145\x64\151\162\145\x63\x74"]) and $_POST["\x6d\157\137\163\x61\x6d\154\x5f\141\x75\164\x6f\137\x72\145\144\x69\x72\x65\x63\164"] == "\144\145\x66\141\165\x6c\x74\x5f\x69\144\160") {
            goto At;
        }
        if (isset($_POST["\x6d\157\137\x73\141\x6d\x6c\x5f\141\x75\x74\x6f\x5f\162\x65\x64\x69\x72\145\143\x74"]) and $_POST["\155\x6f\x5f\x73\141\x6d\x6c\137\x61\x75\164\157\137\162\145\x64\x69\x72\x65\143\x74"] == "\x72\x65\147\151\163\164\145\x72\145\144\x5f\157\156\x6c\171") {
            goto pi;
        }
        if (isset($_POST["\x6d\x6f\x5f\x73\141\155\154\137\141\165\x74\x6f\137\162\145\144\151\162\145\x63\x74"]) and $_POST["\155\x6f\x5f\163\x61\155\154\137\141\x75\x74\x6f\137\162\x65\x64\151\162\145\x63\164"] == "\x70\x75\142\154\151\143\x5f\x70\141\x67\145") {
            goto I0;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\x73\141\x6d\x6c\x5f\x66\157\162\x63\x65\x5f\x61\x75\x74\x68\x65\156\x74\151\x63\141\x74\x69\x6f\156\x5f\x6f\x70\164\151\x6f\156")) {
            goto cI;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\x73\x61\x6d\x6c\137\145\156\x61\142\154\x65\137\144\x6f\155\141\151\156\137\x6d\x61\x70\160\x69\x6e\x67\137\x6f\160\164\x69\x6f\156")) {
            goto nx;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\x73\141\155\x6c\x5f\141\x6c\154\157\x77\137\x77\x70\x5f\x73\151\147\x6e\x69\x6e\137\x6f\160\164\151\157\x6e")) {
            goto A7;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\163\x61\x6d\x6c\137\146\157\x72\x67\x6f\164\x5f\x70\x61\x73\x73\167\157\162\x64\x5f\x66\x6f\x72\x6d\x5f\x6f\160\x74\x69\x6f\x6e")) {
            goto HY;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\163\x61\155\x6c\x5f\166\x65\162\x69\146\x79\x5f\154\151\143\x65\x6e\163\145")) {
            goto ly;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\163\x61\155\154\137\x72\x65\x6d\x6f\x76\x65\x5f\141\143\143\157\x75\x6e\164")) {
            goto q_;
        }
        if (self::mo_check_option_admin_referer("\x66\145\144\145\162\141\164\151\157\156")) {
            goto Ic;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\163\x61\x6d\x6c\137\141\144\144\x5f\146\145\x64\145\x72\141\164\x69\157\156\163")) {
            goto I8;
        }
        if (self::mo_check_option_admin_referer("\145\144\x69\164\137\x66\145\x64\145\162\x61\164\x69\157\156")) {
            goto Jt;
        }
        if (self::mo_check_option_admin_referer("\x64\x65\x6c\x65\x74\x65\x5f\x66\145\144\x65\162\x61\164\x69\157\156")) {
            goto E4;
        }
        if (!self::mo_check_option_admin_referer("\x73\x61\x76\145\x5f\x69\144\x70\x5f\154\151\163\164")) {
            goto OA;
        }
        $s_ = array();
        if (!array_key_exists("\145\156\141\142\154\145\137\151\x64\160", $_POST)) {
            goto KA;
        }
        $s_ = $_POST["\145\x6e\141\x62\x6c\145\137\x69\144\x70"];
        KA:
        $ki = get_option("\163\141\155\x6c\x5f\x73\x65\141\x72\x63\x68\x5f\151\144\x70");
        $ki = maybe_unserialize($ki);
        foreach ($ki as $tj => $nh) {
            if (in_array($tj, $s_)) {
                goto Ki;
            }
            $ki[$tj]["\145\156\141\142\154\x65\x5f\151\x64\x70"] = false;
            goto pa;
            Ki:
            $ki[$tj]["\x65\156\x61\142\x6c\x65\x5f\151\144\160"] = true;
            pa:
            mE:
        }
        up:
        $ns = maybe_unserialize(get_option("\x73\x61\155\x6c\137\x69\x64\x65\156\164\x69\x74\x79\137\160\162\157\x76\151\x64\145\x72\163"));
        $ns = array_merge($ns, $ki);
        $LO = 0;
        foreach ($ns as $ec) {
            if (!$ec["\145\x6e\x61\x62\154\x65\x5f\151\x64\160"]) {
                goto pp;
            }
            $LO++;
            pp:
            Q9:
        }
        Dl:
        if (!Utilities::mo_idp_limit_reached()) {
            goto yH;
        }
        update_option("\x6d\x6f\137\x73\141\155\x6c\x5f\x6d\x65\x73\x73\x61\x67\x65", "\x59\x6f\165\40\x68\141\166\145\x20\105\x58\103\105\105\x44\105\104\40\x79\157\x75\162\40\x49\x44\x50\40\x6c\151\155\x69\x74\56\40\131\157\x75\x20\x63\x61\156\40\x75\160\147\162\141\x64\145\x20\171\x6f\165\x72\40\x6c\x69\143\x65\x6e\163\x65\x20\157\x72\x20\144\x65\x6c\x65\x74\x65\57\x64\151\163\141\142\x6c\145\40\165\156\x75\x73\145\144\x20\x49\x44\120\x2e");
        update_option("\x73\141\x6d\154\x5f\x69\144\x65\156\x74\x69\x74\171\x5f\x70\162\x6f\x76\151\144\145\x72\163", $ns);
        $this->mo_saml_show_error_message();
        return;
        yH:
        update_option("\x73\x61\155\154\137\151\x64\x65\156\164\151\x74\x79\137\160\x72\x6f\166\151\x64\145\162\163", $ns);
        OA:
        goto OT;
        E4:
        $sl = get_option("\x6d\x6f\x5f\x73\141\155\154\x5f\146\x65\144\145\162\x61\x74\x69\x6f\x6e\x73");
        $Rf = $_POST["\x66\x65\x64\x65\x72\x61\164\151\x6f\156\x5f\x6e\x61\x6d\x65"];
        unset($sl[$Rf]);
        update_option("\x6d\157\x5f\x73\141\155\154\137\146\145\x64\x65\162\141\x74\151\x6f\156\x73", $sl);
        OT:
        goto h4;
        Jt:
        $sl = get_option("\155\157\137\163\x61\155\x6c\137\146\145\x64\x65\162\x61\x74\151\157\156\163");
        $Rf = $_POST["\146\x65\x64\145\162\x61\164\151\157\156\137\x6e\x61\x6d\145"];
        if (!array_key_exists($Rf, $sl)) {
            goto tp;
        }
        $xg = $sl[$Rf];
        $mb = $_POST["\x64\151\x73\143\157\166\x65\162\x79\x5f\165\162\x6c"];
        $xg["\144\x69\x73\x63\x6f\166\145\x72\x79\x5f\165\162\154"] = $mb;
        $Xa = $this->mo_saml_save_federation_parameters();
        if (empty($Xa)) {
            goto gf;
        }
        $xg["\x70\141\162\x61\x6d\145\x74\x65\162\163"] = $Xa;
        gf:
        $sl[$Rf] = $xg;
        update_option("\155\157\137\x73\x61\x6d\x6c\137\x66\x65\x64\145\162\x61\164\151\x6f\156\163", $sl);
        tp:
        h4:
        goto Iz;
        I8:
        $sl = get_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\x66\x65\144\x65\162\141\164\x69\x6f\156\163");
        if (!(isset($_POST["\x66\x65\x64\x65\x72\x61\164\151\157\156\x5f\156\x61\155\145"]) and $_POST["\x66\145\x64\145\x72\x61\164\151\x6f\x6e\x5f\156\x61\155\145"] !== '' and isset($_POST["\144\151\163\x63\157\x76\145\162\x79\x5f\x75\x72\154"]) and $_POST["\144\x69\163\143\157\166\x65\162\171\137\x75\x72\x6c"] !== '')) {
            goto Yh;
        }
        $Rf = $_POST["\146\145\144\145\162\141\164\151\157\x6e\x5f\x6e\141\x6d\145"];
        $mb = $_POST["\144\151\163\143\157\166\145\162\171\x5f\x75\x72\154"];
        $Xa = $this->mo_saml_save_federation_parameters();
        $sl[$Rf] = array("\146\x65\x64\x65\162\141\164\x69\157\x6e\137\x6e\x61\x6d\145" => $Rf, "\x64\x69\163\x63\x6f\x76\145\162\171\137\165\162\154" => $mb, "\x65\156\x61\x62\154\x65" => false);
        if (empty($Xa)) {
            goto Aa;
        }
        $sl[$Rf]["\160\141\162\141\155\145\164\145\x72\x73"] = $Xa;
        Aa:
        update_option("\x6d\x6f\x5f\163\141\155\154\137\146\x65\x64\145\162\x61\164\x69\157\x6e\163", $sl);
        Yh:
        Iz:
        goto LR;
        Ic:
        $sl = get_option("\x6d\157\x5f\x73\x61\155\154\x5f\x66\x65\x64\145\x72\141\x74\x69\157\156\x73");
        $ag = get_option("\x6d\x6f\137\163\141\155\154\137\x73\160\x5f\142\x61\x73\145\x5f\x75\162\x6c");
        if (!empty($ag)) {
            goto wE;
        }
        $ag = home_url();
        wE:
        $fN = get_option("\155\157\x5f\x73\x61\155\154\x5f\x73\x70\137\145\x6e\x74\x69\164\171\x5f\151\144");
        if (!empty($fN)) {
            goto Ma;
        }
        $fN = $ag . "\57\167\x70\x2d\143\157\156\164\145\156\x74\x2f\160\154\165\147\x69\156\163\57\x6d\151\x6e\151\x6f\162\x61\x6e\147\x65\x2d\x73\x61\x6d\154\x2d\x32\x30\x2d\163\x69\156\147\154\x65\x2d\163\x69\147\156\55\157\x6e\x2f";
        Ma:
        $eg = home_url() . "\x2f\77\157\160\164\x69\157\x6e\75\x73\x61\x6d\154\x5f\165\163\145\x72\137\x6c\x6f\147\151\156";
        if ($sl) {
            goto IU;
        }
        $sl["\x49\x6e\x43\x6f\x6d\x6d\157\156"] = array("\146\145\x64\145\x72\141\x74\151\157\x6e\137\x6e\x61\155\145" => "\111\156\x43\157\x6d\155\157\x6e", "\144\151\x73\x63\x6f\166\x65\162\171\x5f\x75\162\154" => "\150\164\164\160\163\x3a\x2f\x2f\x77\x61\171\146\x2e\151\156\143\x6f\155\155\x6f\x6e\x66\x65\144\x65\x72\x61\164\151\157\x6e\56\x6f\162\147\57\x44\123\57\x57\101\131\x46", "\x70\141\162\x61\155\x65\x74\x65\x72\x73" => array("\145\156\x74\151\x74\171\x49\104" => $fN, "\162\145\x74\x75\162\156" => $eg), "\145\156\x61\142\154\145" => false);
        $sl["\x48\x41\113\x41"] = array("\x66\145\144\145\x72\141\164\x69\157\x6e\x5f\x6e\x61\x6d\x65" => "\110\101\113\x41", "\144\151\x73\x63\157\166\x65\162\171\x5f\x75\x72\154" => "\x68\164\164\x70\x73\x3a\57\57\x68\141\153\x61\x2e\x66\x75\156\x65\164\56\146\151\57\163\x68\x69\x62\142\x6f\x6c\x65\164\150\x2f\x57\x41\x59\x46", "\x70\x61\162\141\x6d\145\x74\x65\162\163" => array("\x65\156\x74\151\164\x79\x49\x44" => $fN, "\x72\145\x74\x75\x72\x6e" => $eg), "\x65\x6e\141\142\x6c\x65" => false);
        $sl["\x48\113\x41\x46"] = array("\146\145\144\x65\162\141\x74\x69\157\156\137\x6e\141\155\x65" => "\x48\x4b\101\x46", "\144\151\x73\143\157\x76\145\162\171\x5f\165\x72\154" => "\150\164\164\x70\163\x3a\57\57\x64\163\56\150\x6b\x61\146\x2e\145\144\x75\56\150\153\57\x64\x69\x73\143\x6f\166\x65\x72\x79", "\x70\x61\162\141\x6d\145\164\145\162\x73" => array("\x65\156\x74\x69\164\171\111\x44" => $fN, "\x72\145\164\165\162\156" => $eg), "\145\156\141\x62\x6c\145" => false);
        IU:
        if (isset($_POST["\x65\x6e\x61\x62\x6c\145\x5f\146\x65\x64\x5f\163\163\157"])) {
            goto Or1;
        }
        foreach ($sl as $u6 => $xg) {
            $sl[$u6]["\x65\x6e\x61\142\x6c\x65"] = false;
            JE:
        }
        Fs:
        goto jw;
        Or1:
        $H9 = $_POST["\x65\156\141\x62\x6c\x65\x5f\146\x65\x64\137\163\163\157"];
        foreach ($sl as $u6 => $xg) {
            if (in_array($u6, $H9)) {
                goto nU;
            }
            $sl[$u6]["\145\156\x61\x62\154\145"] = false;
            goto EJ;
            nU:
            $sl[$u6]["\145\x6e\141\142\154\145"] = true;
            EJ:
            ZQ:
        }
        Xr:
        jw:
        update_option("\155\x6f\x5f\163\141\155\x6c\x5f\146\x65\144\145\x72\141\164\x69\x6f\x6e\163", $sl);
        update_option("\155\157\x5f\163\141\x6d\x6c\137\155\145\x73\163\141\147\145", "\x46\145\x64\x65\162\141\164\151\157\156\x20\151\156\x66\157\162\x6d\x61\164\151\x6f\156\x20\163\141\166\145\x64\40\163\x75\143\x63\x65\x73\x73\146\165\x6c\x6c\x79\x2e");
        $this->mo_saml_show_success_message();
        LR:
        goto kO;
        q_:
        $this->mo_sso_saml_deactivate();
        add_option("\155\x6f\137\x73\x61\155\154\x5f\162\145\147\x69\163\164\x72\x61\164\151\x6f\156\137\x73\164\x61\x74\165\x73", "\x72\x65\x6d\x6f\x76\145\x64\137\141\143\x63\157\x75\x6e\164");
        $Vm = add_query_arg(array("\x74\x61\x62" => "\154\x6f\147\151\156"), $_SERVER["\x52\105\121\125\105\123\x54\x5f\125\122\111"]);
        header("\x4c\157\x63\x61\x74\151\x6f\x6e\72\40" . $Vm);
        kO:
        goto hS;
        ly:
        if (!$this->mo_saml_check_empty_or_null($_POST["\x6d\157\x5f\x73\141\155\154\137\154\x69\143\145\x6e\163\145\x5f\x6b\145\x79"])) {
            goto zh;
        }
        update_option("\155\157\137\163\x61\155\154\x5f\155\145\x73\x73\x61\147\145", "\x41\154\x6c\x20\x74\150\145\x20\x66\x69\145\154\144\x73\x20\141\x72\x65\40\162\x65\x71\x75\151\x72\145\144\x2e\40\120\x6c\145\x61\x73\145\x20\145\156\x74\x65\x72\40\166\x61\154\x69\x64\40\x6c\151\x63\145\156\163\x65\40\x6b\x65\x79\56");
        $this->mo_saml_show_error_message();
        return;
        zh:
        $Uz = trim($_POST["\155\157\x5f\x73\x61\x6d\x6c\137\154\151\x63\x65\156\163\145\137\x6b\145\171"]);
        $o1 = new Customersaml();
        $z3 = $o1->mo_saml_verify_license($Uz, $this);
        if ($z3) {
            goto eU;
        }
        return;
        eU:
        $jR = json_decode($z3, true);
        $wN = $o1->check_customer_ln($this);
        if ($wN) {
            goto t6;
        }
        return;
        t6:
        $HG = json_decode($wN, true);
        if (!isset($HG["\156\x6f\117\146\123\x50"])) {
            goto wW;
        }
        $_SESSION["\156\x6f\x5f\157\x66\x5f\163\160"] = $HG["\x6e\x6f\117\146\x53\x50"];
        wW:
        if (strcasecmp($jR["\x73\164\x61\164\165\163"], "\123\x55\x43\103\105\x53\x53") == 0) {
            goto Ax;
        }
        if (strcasecmp($jR["\163\164\141\164\165\163"], "\x46\101\111\114\x45\104") == 0) {
            goto wo;
        }
        update_option("\155\x6f\x5f\x73\141\x6d\154\x5f\x6d\145\163\x73\141\x67\145", "\x41\156\40\145\162\162\157\162\40\157\x63\x63\x75\162\x65\x64\x20\167\x68\x69\154\145\x20\x70\x72\x6f\x63\x65\163\163\151\156\x67\40\x79\157\x75\162\x20\x72\145\161\x75\x65\163\164\56\x20\x50\x6c\145\x61\163\x65\x20\x54\x72\x79\40\141\x67\141\151\x6e\x2e");
        $this->mo_saml_show_error_message();
        goto BA;
        wo:
        if (strcasecmp($jR["\155\x65\x73\163\x61\x67\145"], "\103\157\144\145\x20\x68\141\x73\x20\105\170\160\x69\x72\x65\144") == 0) {
            goto QA;
        }
        update_option("\155\x6f\x5f\x73\141\155\154\x5f\x6d\145\x73\x73\x61\147\x65", "\131\x6f\x75\x20\x68\x61\x76\145\x20\145\156\164\x65\162\x65\144\x20\x61\x6e\40\151\x6e\x76\x61\154\151\x64\x20\154\x69\x63\x65\x6e\163\145\40\153\145\171\56\x20\120\x6c\x65\x61\x73\145\x20\x65\156\164\145\162\x20\x61\40\x76\x61\x6c\151\x64\x20\154\151\143\145\156\x73\x65\40\153\x65\x79\56");
        goto tE;
        QA:
        update_option("\155\157\137\163\x61\155\x6c\137\x6d\145\x73\163\141\x67\x65", "\x4c\151\143\145\x6e\163\x65\40\x6b\145\171\40\171\x6f\x75\x20\150\x61\166\x65\40\145\156\x74\145\x72\x65\144\40\x68\141\x73\40\x61\154\162\145\141\x64\171\x20\x62\145\x65\156\x20\x75\x73\x65\x64\x2e\x20\x50\x6c\145\141\163\145\x20\x65\x6e\164\x65\x72\40\141\x20\x6b\145\x79\40\167\150\151\x63\150\x20\x68\x61\x73\x20\x6e\157\164\40\x62\145\x65\156\40\165\x73\145\x64\x20\x62\x65\x66\157\162\145\40\x6f\x6e\x20\x61\156\x79\x20\157\164\150\145\x72\x20\151\156\x73\164\141\156\143\145\x20\x6f\162\x20\151\x66\40\171\x6f\165\40\150\141\166\145\40\x65\x78\x61\x75\163\x74\x65\x64\40\x61\154\154\x20\x79\157\165\x72\x20\x6b\x65\x79\x73\x20\x74\150\x65\x6e\40\143\x6f\156\164\x61\x63\164\40\x75\163\40\x74\157\40\x62\165\x79\40\x6d\157\162\145\56");
        tE:
        $this->mo_saml_show_error_message();
        BA:
        goto kn;
        Ax:
        $nA = get_option("\155\x6f\137\163\x61\155\x6c\x5f\x63\x75\x73\164\x6f\155\x65\162\x5f\x74\x6f\x6b\x65\156");
        update_option("\163\155\x6c\137\154\153", AESEncryption::encrypt_data($Uz, $nA));
        update_option("\155\157\x5f\163\x61\155\x6c\137\x6d\x65\163\x73\x61\147\x65", "\x59\157\x75\x72\x20\x6c\151\143\x65\156\163\145\40\151\x73\x20\x76\x65\162\151\146\151\x65\144\56\40\131\157\x75\40\x63\x61\156\40\x6e\x6f\x77\40\x73\145\164\165\x70\x20\164\x68\x65\x20\x70\x6c\x75\147\x69\156\x2e");
        update_customer_idp_count($HG);
        $this->mo_saml_show_success_message();
        kn:
        hS:
        goto dz;
        HY:
        if (mo_saml_is_extension_installed("\x63\x75\162\x6c")) {
            goto rD;
        }
        update_option("\155\157\137\x73\141\155\x6c\x5f\155\145\x73\163\x61\x67\145", "\x45\x52\x52\117\122\x3a\40\74\141\40\x68\x72\x65\146\x3d\42\x68\164\x74\x70\x3a\57\x2f\160\x68\x70\x2e\x6e\145\164\x2f\155\141\x6e\x75\141\x6c\x2f\x65\156\57\143\x75\x72\x6c\56\x69\x6e\163\x74\141\x6c\154\x61\164\151\x6f\x6e\x2e\160\x68\x70\x22\40\164\141\162\147\x65\x74\x3d\42\x5f\x62\x6c\141\156\153\42\76\120\110\x50\40\x63\125\122\x4c\40\x65\x78\x74\145\x6e\x73\151\x6f\x6e\74\57\141\76\x20\x69\163\x20\x6e\x6f\x74\40\151\x6e\x73\x74\x61\x6c\154\145\144\40\x6f\x72\x20\144\151\163\141\x62\x6c\145\x64\x2e\40\x52\x65\163\145\156\x64\x20\x4f\124\120\x20\146\x61\151\x6c\x65\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        rD:
        $MI = get_option("\155\x6f\x5f\163\141\155\x6c\137\x61\x64\x6d\151\x6e\x5f\x65\155\141\x69\154");
        $o1 = new Customersaml();
        $jR = json_decode($o1->mo_saml_forgot_password($MI, $this), true);
        if (strcasecmp($jR["\163\164\x61\x74\165\163"], "\x53\125\103\103\x45\x53\123") == 0) {
            goto Ip;
        }
        update_option("\x6d\157\x5f\x73\141\155\154\137\155\x65\163\163\x61\147\145", "\x41\156\40\145\162\x72\x6f\x72\40\x6f\x63\x63\165\162\145\144\40\167\150\151\154\145\40\160\x72\157\143\x65\x73\x73\x69\156\147\40\x79\157\x75\x72\40\162\145\161\x75\x65\x73\164\x2e\x20\x50\154\x65\x61\163\145\x20\124\x72\171\x20\x61\147\141\151\156\56");
        $this->mo_saml_show_error_message();
        goto FT;
        Ip:
        update_option("\155\157\x5f\163\141\x6d\154\x5f\x6d\x65\163\x73\x61\147\145", "\x59\157\x75\x72\x20\x70\x61\163\x73\x77\x6f\162\144\x20\x68\x61\x73\40\142\x65\x65\x6e\x20\x72\x65\163\x65\x74\40\163\x75\x63\x63\x65\x73\163\x66\x75\x6c\154\171\56\x20\x50\154\145\x61\x73\145\40\x65\156\x74\x65\x72\40\164\150\145\40\156\145\167\x20\160\x61\x73\163\167\x6f\162\144\40\163\x65\x6e\164\40\164\x6f\40" . $MI . "\56");
        $this->mo_saml_show_success_message();
        FT:
        dz:
        goto Em;
        A7:
        $vy = "\146\141\x6c\x73\x65";
        if (!array_key_exists("\155\157\137\163\x61\155\x6c\137\x62\141\x63\x6b\144\157\x6f\x72\137\x75\162\x6c", $_POST)) {
            goto Ks;
        }
        $vy = trim($_POST["\x6d\x6f\137\x73\141\155\154\x5f\x62\x61\143\153\x64\157\157\x72\137\x75\x72\154"]);
        Ks:
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\142\141\143\x6b\x64\x6f\x6f\162\x5f\x75\x72\x6c", $vy);
        if (array_key_exists("\155\157\x5f\x73\141\x6d\x6c\137\x61\154\x6c\157\x77\x5f\167\x70\x5f\x73\x69\x67\x6e\x69\x6e", $_POST)) {
            goto ut;
        }
        $A6 = "\146\141\154\163\x65";
        goto Mg;
        ut:
        $A6 = $_POST["\155\x6f\137\163\141\x6d\x6c\x5f\141\x6c\154\157\x77\x5f\x77\160\x5f\x73\151\x67\x6e\151\x6e"];
        Mg:
        update_option("\155\x6f\x5f\x73\141\x6d\154\137\141\154\x6c\x6f\x77\137\167\x70\x5f\163\151\147\x6e\151\x6e", $A6);
        update_option("\x6d\157\137\163\141\x6d\x6c\x5f\x6d\145\163\163\x61\x67\145", "\123\151\147\156\40\x69\x6e\x20\x6f\x70\164\151\x6f\156\163\40\165\x70\x64\141\164\145\x64\x2e");
        $this->mo_saml_show_success_message();
        Em:
        goto CI;
        nx:
        if (mo_saml_is_sp_configured()) {
            goto YO;
        }
        update_option("\155\157\137\163\141\155\154\x5f\155\x65\163\x73\x61\147\145", "\120\x6c\x65\x61\x73\145\40\143\x6f\155\160\x6c\x65\x74\x65\x20\x3c\x61\x20\150\162\145\146\75\x22" . add_query_arg(array("\x74\141\x62" => "\x73\141\x76\x65"), $_SERVER["\x52\x45\121\x55\105\x53\x54\x5f\x55\122\111"]) . "\42\x20\57\76\x53\145\162\166\x69\x63\x65\40\x50\x72\x6f\x76\151\x64\145\x72\74\x2f\x61\x3e\x20\x63\x6f\x6e\x66\x69\147\165\x72\141\164\x69\157\156\40\x66\x69\162\163\x74\x2e");
        goto RM;
        YO:
        $ML = "\x66\x61\154\163\145";
        if (array_key_exists("\x6d\x6f\137\163\141\155\154\137\145\156\141\142\154\145\x5f\x64\157\x6d\x61\x69\x6e\x5f\x6d\x61\160\160\151\x6e\x67", $_POST)) {
            goto dm;
        }
        $ML = "\146\x61\x6c\x73\x65";
        goto Bh;
        dm:
        $ML = $_POST["\155\x6f\x5f\163\141\x6d\154\x5f\145\x6e\x61\142\x6c\145\137\144\x6f\x6d\x61\151\156\137\155\141\160\160\151\x6e\x67"];
        $hh = get_option("\155\157\137\x73\141\x6d\154\x5f\x64\x6f\x6d\x61\151\x6e\137\x6c\157\x67\x69\156\137\x66\141\151\x6c");
        $iE = get_option("\x6d\157\x5f\163\141\155\x6c\x5f\146\141\x6c\154\x62\141\143\x6b\x5f\x74\x6f\x5f\x64\x65\146\x61\165\154\x74");
        if (!(!$hh && !$iE)) {
            goto pN;
        }
        update_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\x64\x6f\x6d\x61\x69\x6e\x5f\154\x6f\x67\151\156\137\x66\141\x69\154", "\x74\x72\x75\x65");
        pN:
        Bh:
        update_option("\155\157\x5f\163\x61\x6d\154\x5f\145\x6e\x61\142\154\x65\137\x64\157\155\141\x69\x6e\x5f\x6d\x61\x70\160\x69\156\147", $ML);
        update_option("\x6d\x6f\x5f\163\x61\155\154\137\x6d\145\163\163\141\x67\x65", "\123\x69\x67\156\40\x69\x6e\40\x6f\x70\164\x69\x6f\x6e\x73\x20\x75\160\144\141\x74\x65\x64\56");
        $this->mo_saml_show_success_message();
        RM:
        CI:
        goto cB;
        cI:
        if (mo_saml_is_sp_configured()) {
            goto eJ;
        }
        update_option("\x6d\157\137\163\x61\x6d\154\x5f\155\145\x73\x73\141\x67\145", "\x50\x6c\x65\141\163\145\x20\143\157\x6d\x70\154\x65\164\145\40\74\x61\x20\x68\x72\145\x66\75\42" . add_query_arg(array("\164\141\x62" => "\163\141\166\x65"), $_SERVER["\122\105\121\125\x45\123\x54\137\125\122\111"]) . "\x22\40\57\x3e\123\x65\162\x76\151\x63\x65\x20\120\x72\157\166\x69\x64\145\x72\74\x2f\x61\x3e\x20\143\x6f\x6e\x66\151\x67\x75\x72\141\x74\151\x6f\156\40\146\151\x72\163\x74\56");
        $this->mo_saml_show_error_message();
        goto A5;
        eJ:
        if (array_key_exists("\x6d\x6f\137\x73\141\x6d\154\137\x66\157\162\x63\145\137\141\x75\164\x68\145\x6e\x74\151\x63\x61\x74\x69\157\x6e", $_POST)) {
            goto O6;
        }
        $RP = "\146\141\154\163\x65";
        goto FG;
        O6:
        $RP = $_POST["\x6d\x6f\x5f\163\x61\155\154\137\146\x6f\162\143\x65\x5f\x61\x75\164\x68\145\x6e\x74\151\143\x61\164\151\157\x6e"];
        FG:
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\146\x6f\x72\x63\x65\x5f\141\165\x74\150\x65\x6e\164\x69\x63\141\164\151\x6f\x6e", $RP);
        update_option("\155\x6f\137\163\x61\155\154\x5f\x6d\x65\x73\x73\x61\147\145", "\x53\151\x67\156\x20\x69\156\40\157\160\164\151\x6f\156\x73\x20\x75\160\x64\x61\164\x65\144\x2e");
        $this->mo_saml_show_success_message();
        A5:
        cB:
        goto lq;
        I0:
        if (mo_saml_is_sp_configured()) {
            goto Sd;
        }
        update_option("\x6d\157\137\163\141\x6d\154\x5f\x6d\145\x73\x73\141\147\x65", "\x50\154\145\141\x73\x65\40\x63\157\x6d\x70\154\145\164\145\x20\x3c\x61\x20\150\x72\x65\x66\75\x22" . add_query_arg(array("\164\141\x62" => "\x73\141\166\x65"), $_SERVER["\x52\105\121\x55\x45\123\124\137\x55\x52\x49"]) . "\42\40\x2f\76\123\145\x72\x76\151\143\145\x20\x50\x72\x6f\x76\x69\x64\145\162\74\57\141\x3e\40\143\157\x6e\x66\151\x67\x75\x72\141\164\151\x6f\x6e\x20\x66\151\x72\163\164\x2e");
        $this->mo_saml_show_error_message();
        goto qe;
        Sd:
        update_option("\155\157\x5f\x73\141\155\154\x5f\156\x6f\137\x61\165\164\157\137\162\x65\144\151\x72\145\x63\x74", '');
        update_option("\x6d\x6f\137\163\141\155\x6c\x5f\x72\145\144\x69\x72\x65\x63\x74\137\x64\x65\x66\141\x75\154\164\137\x69\x64\160", '');
        update_option("\155\x6f\137\x73\141\x6d\x6c\137\162\x65\147\x69\163\164\145\162\x65\x64\x5f\x6f\x6e\154\171\x5f\141\143\143\145\x73\x73", '');
        update_option("\x6d\x6f\137\163\141\x6d\154\137\x61\x75\x74\157\137\162\145\x64\x69\x72\145\143\x74\x5f\x74\x6f\137\x70\x75\x62\154\151\x63\137\160\x61\x67\x65", "\x74\162\x75\145");
        update_option("\x6d\x6f\x5f\x73\141\155\154\137\x6d\x65\x73\163\x61\x67\x65", "\123\151\147\x6e\x20\x69\156\40\157\160\164\x69\x6f\156\163\40\165\x70\144\141\x74\145\144\x2e");
        $this->mo_saml_show_success_message();
        qe:
        lq:
        goto J2;
        pi:
        if (mo_saml_is_sp_configured()) {
            goto U3;
        }
        update_option("\155\157\137\163\141\155\154\x5f\155\x65\x73\163\x61\x67\145", "\120\154\145\x61\x73\x65\40\x63\x6f\155\160\154\x65\164\145\x20\x3c\141\x20\150\162\x65\146\x3d\42" . add_query_arg(array("\164\141\142" => "\x73\141\166\x65"), $_SERVER["\122\x45\121\125\x45\123\x54\x5f\125\x52\111"]) . "\x22\x20\57\x3e\x53\x65\x72\166\x69\143\145\40\x50\162\157\x76\151\144\145\x72\x3c\57\x61\76\40\143\157\156\x66\151\x67\x75\162\x61\164\x69\x6f\x6e\40\146\x69\x72\x73\164\x2e");
        $this->mo_saml_show_error_message();
        goto P4;
        U3:
        update_option("\155\x6f\137\163\141\155\x6c\137\156\157\137\x61\165\x74\157\137\x72\x65\144\x69\162\145\x63\164", '');
        update_option("\x6d\x6f\137\x73\141\x6d\154\137\162\x65\x64\151\x72\145\143\164\137\x64\145\x66\x61\x75\x6c\x74\137\x69\x64\x70", '');
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\162\145\x67\x69\163\164\x65\x72\145\144\137\x6f\156\154\171\137\141\143\x63\145\163\163", "\x74\x72\165\145");
        update_option("\x6d\157\137\163\x61\x6d\x6c\137\x61\165\x74\x6f\x5f\x72\x65\144\151\162\145\x63\x74\137\x74\157\137\160\165\x62\x6c\x69\143\137\x70\141\x67\x65", '');
        update_option("\155\157\137\163\x61\155\154\x5f\x6d\x65\163\163\x61\x67\145", "\x53\151\x67\x6e\x20\x69\156\x20\157\x70\164\x69\x6f\x6e\x73\40\165\160\x64\x61\x74\x65\x64\x2e");
        $this->mo_saml_show_success_message();
        P4:
        J2:
        goto v_;
        At:
        if (mo_saml_is_sp_configured()) {
            goto Zw;
        }
        update_option("\155\x6f\x5f\x73\141\x6d\154\137\x6d\x65\163\163\x61\x67\145", "\x50\x6c\145\x61\x73\x65\40\143\x6f\155\160\154\145\164\145\40" . addLink("\123\x65\x72\x76\151\x63\145\x20\x50\162\x6f\x76\151\144\x65\x72", add_query_arg(array("\x74\141\142" => "\163\x61\166\145"), $_SERVER["\122\105\121\125\x45\123\x54\x5f\125\122\x49"])) . "\x20\143\157\x6e\x66\151\x67\165\162\x61\164\x69\x6f\156\40\146\x69\162\163\164\x2e");
        $this->mo_saml_show_error_message();
        goto nA;
        Zw:
        update_option("\155\157\137\163\141\x6d\x6c\x5f\156\157\137\x61\165\164\x6f\x5f\x72\x65\x64\151\162\145\x63\164", '');
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\137\x72\x65\x64\151\x72\145\x63\164\137\x64\x65\x66\141\x75\x6c\164\137\151\144\x70", "\164\162\x75\x65");
        update_option("\x6d\157\x5f\x73\141\x6d\154\137\x72\145\147\151\x73\164\145\x72\145\144\137\157\x6e\154\171\x5f\141\x63\x63\145\x73\x73", '');
        update_option("\x6d\157\137\163\141\155\x6c\137\x61\165\164\157\x5f\162\145\144\151\x72\145\x63\164\x5f\164\157\x5f\160\x75\142\154\151\143\137\x70\141\x67\145", '');
        update_option("\155\x6f\x5f\x73\141\155\x6c\137\x6d\145\163\163\x61\147\x65", "\x53\151\x67\156\40\151\156\x20\x6f\160\x74\151\157\156\163\40\x75\x70\x64\141\x74\145\144\56");
        $this->mo_saml_show_success_message();
        nA:
        v_:
        goto ze;
        bl:
        if (mo_saml_is_sp_configured()) {
            goto B1;
        }
        update_option("\155\x6f\137\163\x61\155\x6c\x5f\x6d\x65\x73\x73\x61\x67\145", "\120\154\145\x61\163\145\40\x63\x6f\155\x70\x6c\145\164\145\40" . addLink("\123\x65\x72\x76\151\x63\x65\x20\120\162\x6f\166\151\x64\x65\162", add_query_arg(array("\164\x61\x62" => "\163\x61\x76\x65"), $_SERVER["\x52\105\x51\125\105\123\124\137\x55\122\111"])) . "\x20\x63\x6f\156\146\x69\x67\x75\162\x61\x74\x69\x6f\x6e\40\x66\151\162\163\x74\x2e");
        $this->mo_saml_show_error_message();
        goto C9;
        B1:
        update_option("\155\157\137\163\x61\x6d\x6c\137\x6e\157\137\x61\x75\x74\x6f\x5f\x72\145\x64\x69\162\145\x63\164", "\x74\162\165\x65");
        update_option("\155\x6f\x5f\163\141\x6d\x6c\137\x72\145\144\151\162\x65\143\164\x5f\144\x65\146\x61\x75\x6c\164\137\x69\x64\160", '');
        update_option("\x6d\x6f\x5f\x73\x61\155\154\137\162\x65\x67\151\163\x74\x65\162\x65\144\x5f\157\x6e\x6c\x79\x5f\x61\x63\x63\x65\163\x73", '');
        update_option("\155\x6f\137\163\x61\155\x6c\137\141\x75\x74\x6f\137\162\145\144\151\162\x65\x63\164\x5f\x74\157\137\160\x75\x62\x6c\151\x63\x5f\160\x61\x67\145", '');
        update_option("\155\157\137\163\x61\x6d\154\137\155\x65\163\163\141\147\145", "\123\x69\x67\156\x20\x69\x6e\40\x6f\160\164\x69\x6f\156\x73\x20\x75\x70\144\x61\x74\x65\144\x2e");
        $this->mo_saml_show_success_message();
        C9:
        ze:
        goto Rf;
        fy:
        if (mo_saml_is_extension_installed("\x63\165\162\154")) {
            goto Xm;
        }
        update_option("\x6d\157\137\163\x61\155\x6c\137\x6d\145\x73\x73\141\x67\x65", "\105\x52\122\x4f\x52\x3a\40\74\141\x20\x68\x72\145\146\75\42\150\x74\164\x70\72\x2f\57\x70\x68\x70\x2e\156\x65\x74\57\155\141\x6e\x75\141\x6c\x2f\145\156\x2f\x63\165\x72\x6c\x2e\151\156\163\x74\x61\x6c\154\141\x74\x69\x6f\x6e\x2e\x70\150\160\42\x20\x74\141\x72\x67\145\x74\x3d\x22\x5f\142\154\x61\156\x6b\x22\76\x50\x48\x50\x20\x63\125\122\x4c\40\145\x78\x74\x65\156\x73\x69\x6f\156\74\57\141\x3e\40\x69\x73\x20\156\x6f\x74\40\x69\x6e\163\164\141\x6c\154\145\x64\x20\x6f\162\40\x64\151\163\141\x62\x6c\145\144\56\40\x52\x65\x73\145\156\144\x20\117\124\x50\x20\146\x61\x69\154\x65\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        Xm:
        $Rm = sanitize_text_field($_POST["\x70\150\x6f\156\x65"]);
        $Rm = str_replace("\x20", '', $Rm);
        $Rm = str_replace("\55", '', $Rm);
        update_option("\x6d\157\x5f\163\141\x6d\154\x5f\141\144\155\151\x6e\x5f\160\x68\x6f\156\145", $Rm);
        $o1 = new CustomerSaml();
        $jR = json_decode($o1->send_otp_token('', $Rm, FALSE, TRUE, $this), true);
        if (strcasecmp($jR["\163\x74\141\x74\165\163"], "\123\125\x43\103\x45\x53\x53") == 0) {
            goto OL;
        }
        update_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x6d\145\x73\x73\141\147\x65", "\124\150\x65\162\145\x20\167\x61\163\40\141\156\40\x65\x72\162\x6f\162\40\151\156\40\163\145\156\144\151\x6e\147\40\x53\115\123\x2e\40\120\154\145\141\163\x65\x20\x63\x6c\x69\x63\153\40\157\x6e\40\122\145\x73\x65\x6e\x64\40\x4f\124\x50\40\x74\157\40\x74\x72\171\40\141\147\141\151\x6e\x2e");
        update_option("\x6d\157\137\x73\141\155\x6c\x5f\x72\145\147\x69\163\164\x72\141\164\151\x6f\156\137\x73\x74\x61\x74\165\x73", "\115\x4f\137\x4f\124\x50\x5f\104\x45\114\x49\126\x45\x52\x45\x44\x5f\x46\101\111\114\125\122\105\x5f\x50\x48\117\x4e\x45");
        $this->mo_saml_show_error_message();
        goto G1;
        OL:
        update_option("\x6d\157\x5f\x73\141\x6d\154\137\x6d\x65\x73\163\x61\147\145", "\40\101\x20\x6f\156\145\40\x74\x69\x6d\145\x20\x70\x61\163\x73\x63\x6f\144\x65\40\151\x73\x20\x73\x65\156\x74\x20\164\x6f\40" . get_option("\155\x6f\137\x73\141\155\154\x5f\141\144\x6d\151\x6e\137\x70\150\x6f\x6e\x65") . "\x2e\40\120\x6c\x65\141\163\145\x20\x65\156\x74\x65\x72\40\x74\150\145\40\157\164\160\40\150\x65\162\x65\40\x74\157\x20\166\145\x72\151\146\x79\40\171\157\165\x72\40\145\x6d\x61\x69\x6c\x2e");
        update_option("\155\x6f\x5f\163\141\155\x6c\137\164\162\x61\x6e\x73\x61\x63\x74\151\x6f\156\111\144", $jR["\164\x78\x49\x64"]);
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\x72\145\x67\x69\x73\x74\162\x61\164\x69\x6f\x6e\137\163\x74\x61\164\165\163", "\115\117\137\x4f\124\120\137\x44\x45\114\111\126\105\122\105\x44\x5f\x53\x55\x43\x43\105\123\x53\x5f\120\x48\117\116\x45");
        $this->mo_saml_show_success_message();
        G1:
        Rf:
        goto oU;
        Hj:
        $Oe = maybe_unserialize(get_option("\x6d\157\137\163\x61\155\154\x5f\164\145\x73\164\x5f\x63\157\x6e\x66\151\147\137\x61\x74\x74\x72\x73"));
        if (!isset($_POST["\151\144\x70\x5f\156\x61\x6d\x65"])) {
            goto TC;
        }
        $nh = htmlspecialchars($_POST["\x69\144\x70\137\156\141\x6d\145"]);
        if (!isset($Oe[$nh])) {
            goto Al;
        }
        unset($Oe[$nh]);
        Al:
        TC:
        update_option("\155\x6f\137\163\141\155\154\x5f\x74\145\163\164\x5f\x63\157\x6e\146\151\x67\137\x61\164\164\162\x73", $Oe);
        update_option("\155\x6f\x5f\163\141\155\154\x5f\155\145\163\163\x61\x67\x65", "\101\x74\164\162\151\142\x75\x74\x65\163\x20\154\151\x73\164\40\162\145\155\157\x76\x65\144\x20\163\x75\143\x63\145\163\x73\x66\x75\x6c\x6c\x79");
        $this->mo_saml_show_success_message();
        oU:
        goto tj;
        RB:
        update_option("\155\x6f\137\163\141\155\x6c\x5f\x72\x65\x67\x69\163\x74\x72\x61\164\x69\x6f\x6e\x5f\163\164\x61\x74\165\163", '');
        update_option("\155\x6f\137\163\x61\155\x6c\x5f\x76\145\162\151\x66\x79\137\143\165\163\164\x6f\155\145\x72", '');
        delete_option("\x6d\x6f\137\163\x61\x6d\154\137\x6e\x65\x77\x5f\162\x65\x67\x69\x73\x74\x72\x61\164\x69\x6f\x6e");
        delete_option("\155\x6f\x5f\163\141\155\x6c\x5f\141\x64\x6d\x69\156\x5f\x65\155\141\x69\154");
        delete_option("\155\x6f\137\163\x61\x6d\x6c\x5f\x61\144\x6d\151\x6e\137\x70\150\157\156\x65");
        tj:
        goto T9;
        Wr:
        if (mo_saml_is_extension_installed("\143\x75\162\154")) {
            goto PV;
        }
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\x6d\145\x73\163\141\x67\x65", "\105\x52\122\117\122\72\40\74\141\x20\x68\162\145\x66\x3d\42\150\164\164\160\x3a\x2f\57\160\x68\x70\56\156\145\164\57\x6d\x61\x6e\x75\x61\x6c\x2f\x65\156\x2f\143\165\162\154\x2e\151\156\x73\164\x61\154\154\141\164\151\x6f\x6e\56\x70\x68\x70\42\40\164\x61\162\147\145\x74\x3d\x22\137\142\x6c\x61\156\x6b\x22\x3e\120\x48\x50\x20\x63\x55\122\x4c\x20\x65\170\164\145\x6e\x73\x69\157\156\74\57\141\x3e\x20\151\163\x20\156\x6f\x74\x20\151\x6e\163\x74\141\154\154\145\144\x20\157\x72\x20\x64\151\163\141\x62\154\x65\x64\x2e\40\122\x65\163\x65\156\x64\x20\117\124\120\40\146\141\151\154\145\144\56");
        $this->mo_saml_show_error_message();
        return;
        PV:
        $Rm = get_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\x61\x64\x6d\x69\156\x5f\x70\150\157\x6e\x65");
        $o1 = new CustomerSaml();
        $jR = json_decode($o1->send_otp_token('', $Rm, FALSE, TRUE, $this), true);
        if (strcasecmp($jR["\x73\164\141\164\x75\x73"], "\123\x55\x43\x43\105\123\x53") == 0) {
            goto Pt;
        }
        update_option("\155\x6f\137\x73\141\x6d\154\x5f\155\x65\163\x73\141\147\x65", "\x54\x68\145\162\x65\40\x77\x61\x73\x20\x61\156\x20\x65\162\162\157\x72\40\151\x6e\40\x73\145\156\x64\x69\x6e\x67\x20\145\155\x61\x69\154\x2e\x20\x50\x6c\x65\x61\x73\145\40\143\154\151\143\x6b\40\157\x6e\x20\x52\x65\x73\145\156\x64\x20\117\124\120\x20\x74\x6f\x20\164\162\171\40\141\x67\141\x69\156\56");
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\x5f\x72\x65\147\x69\x73\x74\162\141\x74\x69\157\156\x5f\x73\x74\141\x74\165\x73", "\115\x4f\137\x4f\x54\120\x5f\x44\x45\114\x49\126\x45\122\x45\104\137\x46\101\x49\114\x55\122\105\137\x50\x48\x4f\116\105");
        $this->mo_saml_show_error_message();
        goto kX;
        Pt:
        update_option("\155\157\x5f\x73\x61\155\154\x5f\x6d\x65\x73\163\141\x67\145", "\x20\x41\x20\157\156\x65\40\164\x69\155\145\x20\160\141\163\x73\x63\157\144\145\40\x69\x73\40\x73\x65\x6e\x74\40\164\157\40" . $Rm . "\x20\x61\x67\x61\x69\x6e\x2e\40\120\x6c\145\141\x73\x65\40\143\x68\x65\143\x6b\x20\x69\x66\x20\171\x6f\165\40\x67\157\164\40\x74\150\x65\40\x6f\x74\160\x20\141\x6e\x64\x20\145\x6e\x74\145\x72\x20\x69\164\40\x68\145\x72\x65\56");
        update_option("\x6d\x6f\137\163\141\x6d\x6c\137\x74\162\x61\x6e\163\141\x63\x74\151\157\156\111\x64", $jR["\x74\x78\x49\x64"]);
        update_option("\155\157\137\x73\141\155\154\x5f\162\145\x67\151\x73\164\x72\141\x74\x69\157\156\x5f\x73\164\141\164\165\163", "\115\x4f\x5f\x4f\124\120\137\x44\x45\x4c\x49\x56\x45\122\105\x44\x5f\123\x55\x43\103\105\123\123\x5f\120\x48\x4f\x4e\105");
        $this->mo_saml_show_success_message();
        kX:
        T9:
        goto TF;
        bi:
        if (mo_saml_is_extension_installed("\143\165\162\x6c")) {
            goto t_;
        }
        update_option("\x6d\157\x5f\x73\141\x6d\154\137\x6d\x65\x73\163\141\147\145", "\105\122\x52\117\122\x3a\x20\74\x61\x20\150\x72\145\146\75\42\x68\164\x74\x70\x3a\57\x2f\x70\150\x70\56\156\145\x74\57\155\x61\156\x75\141\154\57\145\156\57\x63\165\162\x6c\x2e\151\156\163\164\141\x6c\154\141\164\x69\157\x6e\56\160\x68\160\x22\40\x74\141\162\147\x65\x74\x3d\42\137\142\154\141\156\x6b\x22\x3e\120\x48\120\40\143\125\122\x4c\x20\145\170\x74\x65\156\x73\x69\157\156\x3c\57\141\x3e\40\151\x73\40\156\x6f\164\40\151\156\x73\x74\x61\x6c\154\x65\144\x20\x6f\x72\40\144\151\163\x61\142\154\x65\144\x2e\x20\x52\145\163\x65\x6e\x64\40\117\x54\120\40\x66\141\151\x6c\145\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        t_:
        $MI = get_option("\x6d\x6f\137\x73\x61\x6d\154\x5f\x61\x64\x6d\151\x6e\137\x65\x6d\141\151\154");
        $o1 = new CustomerSaml();
        $jR = json_decode($o1->send_otp_token($MI, '', TRUE, FALSE, $this), true);
        if (strcasecmp($jR["\163\164\141\x74\165\x73"], "\123\x55\103\x43\105\123\x53") == 0) {
            goto hU;
        }
        update_option("\155\157\137\x73\x61\x6d\154\x5f\x6d\x65\163\163\x61\147\145", "\x54\150\x65\162\145\x20\x77\x61\163\40\x61\x6e\40\145\162\162\x6f\x72\x20\x69\156\x20\163\x65\156\144\x69\x6e\147\x20\x65\155\x61\151\x6c\x2e\x20\x50\x6c\145\141\163\x65\40\x63\154\151\x63\153\40\157\156\x20\122\145\163\145\156\144\40\x4f\124\120\x20\x74\x6f\40\164\162\x79\40\x61\x67\x61\x69\x6e\56");
        update_option("\155\157\137\x73\x61\155\154\137\162\x65\x67\x69\x73\x74\162\141\x74\151\x6f\x6e\137\163\x74\141\164\165\163", "\x4d\x4f\137\117\x54\120\x5f\104\x45\x4c\111\126\105\x52\x45\104\x5f\x46\x41\111\x4c\125\122\105\x5f\105\115\x41\x49\114");
        $this->mo_saml_show_error_message();
        goto RR;
        hU:
        update_option("\x6d\x6f\137\x73\141\155\154\x5f\155\x65\163\x73\x61\x67\145", "\40\101\x20\157\x6e\145\x20\x74\151\155\145\x20\x70\x61\x73\163\143\x6f\144\x65\40\x69\x73\x20\163\x65\156\164\x20\x74\157\40" . get_option("\155\157\x5f\163\141\155\x6c\x5f\x61\144\x6d\x69\x6e\137\x65\x6d\x61\x69\154") . "\x20\141\147\x61\151\156\56\40\x50\x6c\145\141\x73\145\x20\x63\x68\145\x63\x6b\40\151\x66\40\x79\x6f\165\x20\x67\x6f\x74\40\164\150\145\x20\157\164\x70\x20\141\156\x64\40\145\x6e\x74\145\x72\x20\x69\164\40\150\x65\x72\x65\x2e");
        update_option("\155\157\x5f\x73\x61\x6d\154\x5f\x74\162\141\156\x73\141\143\x74\x69\x6f\156\111\144", $jR["\x74\170\111\144"]);
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\137\x72\x65\x67\151\x73\x74\162\x61\x74\x69\x6f\156\x5f\163\x74\x61\x74\x75\x73", "\x4d\117\x5f\x4f\x54\x50\x5f\104\105\x4c\111\126\105\122\x45\x44\137\x53\x55\x43\103\105\123\123\137\105\x4d\x41\x49\114");
        $this->mo_saml_show_success_message();
        RR:
        TF:
        goto Nk;
        Ys:
        if (mo_saml_is_extension_installed("\143\165\162\x6c")) {
            goto Ze;
        }
        update_option("\x6d\x6f\137\x73\141\x6d\x6c\137\x6d\145\x73\163\x61\147\x65", "\x45\122\122\x4f\x52\72\x20\x3c\141\x20\150\x72\145\x66\x3d\42\x68\x74\x74\x70\x3a\57\x2f\x70\x68\160\x2e\156\x65\164\57\x6d\x61\156\x75\x61\154\x2f\x65\x6e\57\143\165\x72\154\x2e\x69\156\163\x74\141\x6c\154\x61\x74\x69\157\156\x2e\160\150\x70\x22\40\164\x61\162\147\x65\164\75\42\x5f\142\x6c\x61\156\153\x22\76\120\110\120\40\143\125\122\x4c\x20\x65\170\164\145\x6e\x73\x69\x6f\156\74\57\141\x3e\x20\x69\163\x20\156\157\164\40\x69\x6e\163\x74\141\154\x6c\145\x64\x20\x6f\162\40\144\x69\x73\141\x62\154\x65\144\56\x20\x51\165\145\162\171\x20\163\165\142\155\x69\164\40\x66\x61\x69\x6c\x65\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        Ze:
        $MI = $_POST["\155\157\137\x73\141\155\x6c\137\143\x6f\x6e\164\x61\143\x74\137\165\163\137\145\155\141\151\x6c"];
        $Rm = $_POST["\x6d\x6f\x5f\163\141\x6d\154\137\143\x6f\156\x74\141\x63\164\137\x75\163\137\160\x68\x6f\x6e\x65"];
        $M2 = $_POST["\155\x6f\x5f\x73\x61\x6d\x6c\x5f\143\x6f\x6e\x74\x61\143\164\137\x75\163\137\161\165\x65\x72\x79"];
        if (array_key_exists("\163\145\x6e\144\137\160\154\x75\x67\x69\x6e\137\x63\x6f\x6e\146\151\147", $_POST) === true) {
            goto Ed;
        }
        update_option("\x73\145\x6e\144\137\x70\x6c\x75\147\x69\156\x5f\143\157\x6e\146\151\147", "\157\146\x66");
        goto Fp;
        Ed:
        $Ah = miniorange_import_export(true, true);
        $M2 .= $Ah;
        delete_option("\163\x65\x6e\144\x5f\x70\x6c\165\x67\x69\156\137\143\x6f\x6e\146\151\147");
        Fp:
        $o1 = new CustomerSaml();
        if ($this->mo_saml_check_empty_or_null($MI) || $this->mo_saml_check_empty_or_null($M2)) {
            goto Ag;
        }
        $Fr = $o1->submit_contact_us($MI, $Rm, $M2, $this);
        if ($Fr == false) {
            goto EF;
        }
        update_option("\155\x6f\x5f\163\x61\x6d\154\137\x6d\x65\163\x73\141\x67\145", "\x54\150\x61\x6e\153\163\40\146\157\x72\40\x67\x65\x74\164\151\156\147\x20\x69\x6e\40\x74\157\x75\143\x68\x21\40\x57\145\40\163\x68\x61\154\x6c\x20\x67\x65\164\x20\142\x61\x63\153\40\164\x6f\40\x79\x6f\165\40\x73\150\157\x72\164\x6c\x79\x2e");
        $this->mo_saml_show_success_message();
        goto F8;
        EF:
        update_option("\x6d\x6f\137\x73\141\155\x6c\x5f\x6d\145\163\x73\141\x67\145", "\x59\x6f\x75\162\x20\x71\x75\145\162\171\x20\143\157\165\154\144\40\156\157\x74\40\142\x65\x20\163\165\142\x6d\151\x74\164\145\x64\56\40\120\154\x65\x61\x73\145\x20\x74\x72\x79\40\141\147\x61\151\156\x2e");
        $this->mo_saml_show_error_message();
        F8:
        goto YU;
        Ag:
        update_option("\155\157\x5f\x73\141\155\154\x5f\x6d\x65\163\x73\x61\x67\x65", "\x50\x6c\145\141\163\x65\40\x66\x69\x6c\154\x20\x75\x70\x20\x45\x6d\141\x69\154\40\x61\x6e\144\40\x51\165\x65\x72\x79\x20\x66\151\x65\x6c\x64\x73\x20\x74\x6f\x20\163\x75\142\x6d\151\x74\x20\171\x6f\165\162\x20\x71\x75\145\x72\x79\x2e");
        $this->mo_saml_show_error_message();
        YU:
        Nk:
        goto Ix;
        mm:
        if (mo_saml_is_extension_installed("\x63\x75\162\154")) {
            goto Wn;
        }
        update_option("\x6d\157\x5f\x73\141\x6d\154\x5f\155\145\x73\x73\141\147\x65", "\x45\x52\x52\117\122\72\x20\74\141\40\x68\162\145\x66\x3d\42\x68\164\x74\160\x3a\57\57\x70\x68\x70\56\156\x65\x74\57\x6d\141\x6e\165\x61\x6c\57\x65\156\57\143\x75\162\x6c\x2e\x69\156\163\164\141\154\x6c\141\x74\x69\157\x6e\56\x70\150\160\42\40\x74\x61\x72\147\x65\x74\75\x22\x5f\142\154\x61\x6e\x6b\42\x3e\120\110\120\x20\x63\x55\x52\x4c\x20\x65\x78\x74\x65\156\163\151\157\x6e\x3c\57\x61\76\40\x69\163\x20\x6e\157\x74\40\151\x6e\x73\164\x61\154\154\145\144\40\157\162\x20\144\151\x73\x61\x62\x6c\x65\x64\56\40\114\x6f\x67\x69\x6e\40\x66\x61\151\x6c\145\144\56");
        $this->mo_saml_show_error_message();
        return;
        Wn:
        $MI = '';
        $ID = '';
        if ($this->mo_saml_check_empty_or_null($_POST["\x65\155\x61\x69\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\x70\x61\x73\163\167\157\x72\x64"])) {
            goto uI;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\x70\141\163\x73\x77\157\162\144"]))) {
            goto Kp;
        }
        $MI = sanitize_email($_POST["\145\155\141\151\154"]);
        $ID = stripslashes(strip_tags($_POST["\160\141\163\163\167\x6f\162\x64"]));
        goto iU;
        Kp:
        update_option("\x6d\x6f\137\163\141\155\154\137\155\x65\163\163\x61\x67\x65", "\x4d\151\156\151\155\x75\x6d\x20\66\x20\143\x68\141\162\x61\143\x74\145\162\x73\40\163\x68\x6f\165\154\144\x20\x62\145\x20\x70\162\145\163\145\156\x74\56\40\115\141\170\151\155\165\x6d\x20\61\x35\40\x63\150\x61\x72\141\143\x74\145\x72\x73\x20\163\150\157\x75\x6c\x64\x20\x62\145\40\x70\x72\x65\x73\145\x6e\164\56\40\x4f\156\154\171\x20\146\157\154\154\157\167\151\156\147\x20\163\171\x6d\x62\x6f\x6c\x73\x20\x28\41\x40\x23\x2e\x24\x25\136\x26\x2a\55\137\x29\x20\x73\x68\x6f\x75\154\x64\x20\x62\x65\40\160\162\145\163\x65\156\164\56");
        $this->mo_saml_show_error_message();
        return;
        iU:
        goto V7;
        uI:
        update_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\155\145\x73\163\141\147\145", "\101\154\154\x20\x74\150\x65\40\x66\151\145\x6c\x64\163\40\x61\x72\x65\x20\162\145\x71\x75\x69\x72\x65\144\56\x20\120\x6c\145\141\163\x65\x20\145\x6e\x74\x65\x72\40\166\141\154\151\144\x20\x65\156\x74\x72\x69\x65\x73\x2e");
        $this->mo_saml_show_error_message();
        return;
        V7:
        update_option("\x6d\x6f\137\163\141\x6d\x6c\137\141\x64\155\151\x6e\137\145\x6d\141\151\154", $MI);
        update_option("\x6d\157\x5f\163\141\x6d\154\x5f\141\x64\155\151\x6e\x5f\160\141\163\163\x77\x6f\162\x64", $ID);
        $o1 = new Customersaml();
        $jR = $o1->get_customer_key($this);
        if ($jR) {
            goto fN1;
        }
        return;
        fN1:
        $nU = json_decode($jR, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto vK;
        }
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\155\x65\x73\x73\x61\x67\x65", "\x49\156\166\x61\154\x69\x64\x20\165\x73\145\162\156\141\155\x65\40\157\162\40\160\141\x73\x73\x77\x6f\x72\144\56\40\120\154\145\x61\163\145\x20\164\162\x79\x20\x61\147\141\x69\156\56");
        $this->mo_saml_show_error_message();
        goto e1;
        vK:
        update_option("\155\x6f\137\163\141\x6d\x6c\137\x61\144\155\x69\156\x5f\x63\x75\x73\x74\x6f\x6d\145\162\x5f\x6b\145\171", $nU["\151\x64"]);
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\141\144\155\151\x6e\137\141\160\151\137\153\x65\x79", $nU["\x61\x70\151\113\x65\x79"]);
        update_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\x63\165\163\x74\x6f\x6d\x65\162\137\x74\x6f\153\145\156", $nU["\x74\x6f\153\145\x6e"]);
        if (!isset($nU["\x70\x68\157\x6e\x65"])) {
            goto v5;
        }
        update_option("\155\157\137\163\x61\155\x6c\137\x61\144\x6d\x69\156\137\x70\150\x6f\156\x65", $nU["\160\150\x6f\156\x65"]);
        v5:
        update_option("\x6d\157\137\163\141\x6d\x6c\137\x61\144\x6d\151\156\x5f\160\x61\163\163\167\157\x72\144", '');
        update_option("\x6d\x6f\137\x73\141\x6d\x6c\137\155\145\x73\x73\x61\x67\145", "\103\165\163\164\x6f\155\x65\162\x20\162\x65\x74\162\x69\145\x76\145\x64\40\x73\x75\143\x63\145\163\x73\x66\x75\154\x6c\171");
        update_option("\155\x6f\137\163\x61\x6d\x6c\137\162\x65\x67\151\x73\x74\162\x61\x74\151\x6f\x6e\x5f\x73\x74\x61\164\x75\163", "\105\170\x69\x73\164\x69\156\147\40\x55\163\145\162");
        delete_option("\x6d\157\x5f\163\x61\155\x6c\137\166\145\162\151\x66\x79\137\x63\165\163\x74\157\155\145\x72");
        if (get_option("\x73\155\x6c\137\154\x6b")) {
            goto Fv;
        }
        $this->mo_saml_show_success_message();
        goto Vx;
        Fv:
        $nA = get_option("\155\x6f\x5f\163\x61\x6d\x6c\137\x63\x75\x73\x74\x6f\155\145\162\137\164\157\x6b\145\156");
        $Uz = AESEncryption::decrypt_data(get_option("\163\x6d\x6c\137\x6c\153"), $nA);
        $jR = json_decode($o1->mo_saml_verify_license($Uz, $this), true);
        if (strcasecmp($jR["\163\x74\141\164\x75\163"], "\123\125\x43\103\105\123\123") == 0) {
            goto jT;
        }
        update_option("\155\x6f\137\163\141\x6d\154\x5f\155\145\163\x73\x61\147\145", "\x4c\151\x63\145\x6e\163\145\x20\x6b\145\171\x20\146\x6f\x72\x20\x74\x68\151\x73\x20\x69\156\163\164\x61\x6e\143\145\x20\x69\x73\40\x69\156\143\x6f\x72\x72\x65\x63\x74\56\x20\115\141\x6b\145\40\163\165\x72\145\x20\x79\x6f\x75\40\150\141\x76\x65\40\x6e\x6f\x74\x20\x74\x61\x6d\160\145\162\145\x64\x20\167\151\x74\150\x20\151\164\x20\x61\x74\x20\x61\x6c\x6c\x2e\x20\120\154\145\141\163\145\x20\x65\x6e\x74\x65\x72\40\x61\x20\x76\x61\x6c\x69\144\40\154\151\143\145\156\163\x65\40\153\x65\171\x2e");
        delete_option("\x73\155\x6c\137\x6c\153");
        $this->mo_saml_show_error_message();
        goto fk;
        jT:
        $this->mo_saml_show_success_message();
        fk:
        Vx:
        e1:
        update_option("\155\157\137\x73\141\155\x6c\137\x61\144\155\151\156\x5f\160\141\x73\x73\167\157\x72\144", '');
        Ix:
        DY:
    }
    function mo_saml_save_federation_parameters()
    {
        $Xa = array();
        $MG = array();
        $E_ = array();
        $OP = array();
        $ag = get_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\x73\x70\x5f\142\141\163\x65\137\165\162\154");
        if (!empty($ag)) {
            goto hs;
        }
        $ag = home_url();
        hs:
        $fN = get_option("\155\157\137\x73\141\155\154\x5f\163\160\137\145\156\164\151\x74\x79\x5f\x69\144");
        if (!empty($fN)) {
            goto W4;
        }
        $fN = $ag . "\57\x77\x70\55\143\157\156\x74\x65\x6e\164\x2f\x70\x6c\165\x67\151\x6e\x73\57\155\151\x6e\151\x6f\x72\x61\156\147\145\x2d\163\141\155\154\55\x32\60\55\163\151\156\147\154\145\55\163\x69\147\x6e\55\157\156\x2f";
        W4:
        $eg = $ag . "\57\77\x6f\160\164\x69\x6f\156\x3d\163\x61\155\x6c\x5f\x75\163\x65\x72\137\154\x6f\x67\x69\x6e";
        if (!(isset($_POST["\144\145\x66\x61\x75\x6c\164\137\160\x61\x72\x61\x6d\145\164\x65\x72\x73"]) && !empty($_POST["\x64\x65\146\141\x75\154\164\137\x70\x61\162\x61\155\x65\164\x65\162\163"]))) {
            goto a8;
        }
        $OP = array("\145\x6e\164\x69\x74\x79\x49\104" => $fN, "\x72\x65\164\165\162\156" => $eg);
        a8:
        if (!(isset($_POST["\155\157\x5f\163\141\x6d\x6c\x5f\x70\x61\162\141\155\x65\x74\145\162\137\156\141\x6d\x65\x73"]) && !empty($_POST["\x6d\157\x5f\x73\x61\x6d\154\137\x70\141\162\141\155\x65\164\x65\162\x5f\x6e\x61\155\145\x73"]))) {
            goto Mo;
        }
        $MG = $_POST["\155\157\x5f\163\141\155\x6c\137\160\x61\x72\141\155\x65\164\145\162\x5f\x6e\141\x6d\x65\x73"];
        Mo:
        if (!(isset($_POST["\155\157\x5f\x73\x61\155\154\137\160\141\x72\141\x6d\145\164\x65\162\137\x76\x61\x6c\x75\145\x73"]) && !empty($_POST["\155\157\x5f\163\141\x6d\x6c\x5f\160\141\x72\x61\155\x65\x74\145\162\x5f\x76\x61\x6c\x75\145\x73"]))) {
            goto Q2;
        }
        $E_ = $_POST["\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\160\x61\162\141\155\145\x74\x65\162\x5f\166\x61\154\165\145\163"];
        Q2:
        $Xa = array_combine($MG, $E_);
        $Xa = array_filter($Xa);
        $Xa = array_merge($Xa, $OP);
        return $Xa;
    }
    function create_customer()
    {
        $o1 = new CustomerSaml();
        $nU = json_decode($o1->create_customer($this), true);
        if (strcasecmp($nU["\x73\164\x61\x74\x75\163"], "\103\x55\123\x54\x4f\115\x45\x52\137\x55\123\x45\122\116\101\x4d\x45\x5f\x41\x4c\x52\105\x41\104\x59\137\105\130\x49\123\x54\123") == 0) {
            goto zM;
        }
        if (!(strcasecmp($nU["\163\164\x61\x74\x75\163"], "\123\125\103\x43\105\x53\123") == 0)) {
            goto FS;
        }
        update_option("\x6d\x6f\137\163\x61\x6d\154\x5f\141\x64\155\151\156\137\x63\165\163\x74\x6f\155\x65\162\137\153\145\x79", $nU["\151\144"]);
        update_option("\x6d\157\137\163\141\155\x6c\137\141\x64\155\x69\156\x5f\141\160\x69\137\153\x65\171", $nU["\x61\160\x69\x4b\145\x79"]);
        update_option("\155\x6f\137\163\141\x6d\x6c\x5f\143\x75\x73\x74\x6f\x6d\x65\162\137\x74\x6f\153\145\x6e", $nU["\x74\157\153\145\156"]);
        update_option("\155\x6f\137\163\141\x6d\154\137\141\144\155\x69\156\x5f\160\141\x73\163\x77\157\x72\x64", '');
        update_option("\x6d\157\x5f\163\141\155\154\137\x6d\x65\163\163\x61\147\145", "\124\x68\141\x6e\153\x20\171\x6f\x75\x20\x66\x6f\162\x20\x72\x65\147\x69\x73\x74\x65\x72\151\x6e\x67\40\167\x69\x74\x68\40\x6d\151\x6e\x69\157\x72\141\x6e\x67\145\x2e");
        update_option("\x6d\157\x5f\x73\x61\x6d\154\137\162\145\x67\x69\163\164\x72\141\x74\151\157\156\x5f\x73\164\x61\x74\165\163", '');
        delete_option("\155\157\x5f\163\141\x6d\154\137\166\x65\x72\151\x66\x79\x5f\x63\x75\x73\x74\x6f\155\145\162");
        delete_option("\155\157\x5f\x73\x61\155\x6c\x5f\156\145\167\137\x72\145\147\151\163\x74\x72\141\x74\151\157\156");
        $this->mo_saml_show_success_message();
        FS:
        goto vY;
        zM:
        $this->get_current_customer();
        vY:
        update_option("\155\157\x5f\x73\x61\x6d\x6c\137\x61\x64\x6d\x69\156\x5f\160\x61\163\x73\167\x6f\x72\144", '');
    }
    function get_current_customer()
    {
        $o1 = new CustomerSaml();
        $jR = $o1->get_customer_key($this);
        if ($jR) {
            goto pV;
        }
        return;
        pV:
        $nU = json_decode($jR, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto zx;
        }
        update_option("\155\x6f\137\163\141\155\x6c\x5f\x6d\145\163\163\x61\x67\x65", "\x59\157\165\40\x61\154\x72\145\x61\x64\171\40\150\x61\166\145\40\141\156\x20\x61\x63\143\x6f\165\x6e\164\x20\167\151\x74\x68\40\x6d\151\x6e\151\x4f\162\141\x6e\147\145\56\40\x50\x6c\x65\141\x73\145\x20\145\x6e\x74\x65\162\x20\141\x20\166\x61\154\x69\x64\x20\x70\x61\x73\163\x77\x6f\162\x64\56");
        update_option("\155\x6f\x5f\x73\141\x6d\154\x5f\166\x65\162\151\146\171\x5f\143\x75\163\164\157\x6d\145\x72", "\164\162\x75\145");
        delete_option("\155\x6f\x5f\x73\x61\155\x6c\137\156\x65\x77\x5f\x72\x65\x67\x69\x73\164\162\x61\164\151\157\x6e");
        $this->mo_saml_show_error_message();
        goto jU;
        zx:
        update_option("\x6d\157\x5f\x73\141\x6d\154\x5f\141\x64\x6d\x69\x6e\x5f\x63\x75\163\164\x6f\x6d\x65\162\x5f\153\145\x79", $nU["\x69\144"]);
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\x61\144\155\x69\156\137\141\x70\151\x5f\x6b\x65\171", $nU["\x61\x70\151\x4b\145\171"]);
        update_option("\155\x6f\137\163\141\x6d\x6c\137\143\165\x73\164\157\x6d\145\162\x5f\x74\x6f\x6b\x65\x6e", $nU["\164\157\153\145\x6e"]);
        update_option("\155\157\137\x73\x61\x6d\154\x5f\x61\144\155\151\156\x5f\160\x61\x73\163\167\x6f\162\144", '');
        update_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\155\x65\163\x73\x61\x67\145", "\x59\157\x75\162\x20\x61\x63\x63\x6f\165\x6e\x74\40\x68\141\163\40\x62\145\x65\156\x20\162\x65\164\162\x69\x65\166\x65\144\x20\x73\165\143\x63\145\163\x73\x66\x75\154\x6c\171\x2e");
        delete_option("\155\x6f\137\x73\x61\155\x6c\x5f\x76\x65\x72\151\146\x79\x5f\x63\x75\163\x74\x6f\155\x65\x72");
        delete_option("\155\x6f\x5f\163\141\155\154\x5f\x6e\145\x77\x5f\x72\x65\147\151\163\164\162\x61\164\151\157\156");
        $this->mo_saml_show_success_message();
        jU:
    }
    public function mo_saml_check_empty_or_null($bc)
    {
        if (!(!isset($bc) || empty($bc))) {
            goto I9;
        }
        return true;
        I9:
        return false;
    }
    function djkasjdksa()
    {
        $QW = "\x21\176\x40\43\x24\x25\x5e\46\52\50\51\137\53\174\173\x7d\74\76\77\60\61\x32\63\64\65\66\x37\x38\71\x61\x62\143\144\x65\146\x67\150\151\x6a\x6b\154\155\156\x6f\x70\x71\162\163\164\x75\x76\x77\170\x79\x7a\x41\102\x43\104\x45\106\x47\110\x49\x4a\x4b\114\115\x4e\117\120\x51\122\x53\x54\x55\126\x57\x58\131\x5a";
        $gF = strlen($QW);
        $E8 = '';
        $Ba = 0;
        jI:
        if (!($Ba < 10000)) {
            goto nl;
        }
        $E8 .= $QW[rand(0, $gF - 1)];
        EN:
        $Ba++;
        goto jI;
        nl:
        return $E8;
    }
    function miniorange_sso_menu()
    {
        $Bi = add_menu_page("\115\x4f\x20\x53\x41\115\114\x20\x53\x65\164\164\151\x6e\x67\x73\x20" . __("\103\x6f\156\x66\151\147\x75\x72\145\40\x53\x41\x4d\x4c\40\x49\x64\x65\x6e\164\x69\164\171\x20\x50\x72\157\166\151\x64\145\x72\40\x66\157\x72\40\123\x53\x4f", "\155\157\x5f\163\x61\155\154\x5f\x73\x65\164\x74\151\x6e\x67\163"), "\155\151\x6e\x69\x4f\162\x61\156\147\145\x20\123\x41\115\x4c\40\x32\56\x30\x20\123\x53\117", "\x61\x64\x6d\x69\156\151\163\x74\162\x61\x74\157\162", "\155\x6f\x5f\163\141\155\x6c\137\x73\145\164\164\x69\x6e\x67\163", array($this, "\x6d\x6f\137\x6c\x6f\x67\x69\x6e\137\x77\x69\144\147\145\164\137\163\x61\x6d\154\x5f\x6f\x70\164\x69\x6f\x6e\163"), plugin_dir_url(__FILE__) . "\x69\x6d\141\147\145\x73\57\x6d\x69\x6e\x69\157\x72\141\x6e\147\x65\x2e\160\x6e\x67");
        if (!is_plugin_active("\x6d\x69\x6e\151\x6f\x72\x61\156\147\x65\55\146\145\144\145\x72\141\x74\x69\x6f\x6e\55\163\x73\x6f\57\x66\x65\144\x65\162\141\x74\x69\157\x6e\x2d\x73\x73\157\56\x70\x68\160")) {
            goto VR;
        }
        add_submenu_page("\155\157\137\x73\141\155\154\x5f\x73\145\164\x74\151\x6e\x67\163", "\x46\145\144\145\162\x61\x74\151\x6f\156\40\x53\x53\x4f", "\106\145\144\x65\x72\x61\164\151\157\156\x20\x53\123\x4f", "\141\x64\155\151\156\151\163\x74\162\x61\164\x6f\x72", "\x6d\x6f\137\163\141\155\154\137\146\145\144\x65\162\141\164\x69\157\x6e\137\x73\163\157", "\155\157\137\163\141\155\154\137\146\x65\144\x65\162\x61\164\x69\x6f\156\x5f\x73\163\157");
        VR:
    }
    function mo_saml_redirect_for_authentication($nh, $ap)
    {
        if (!mo_saml_is_customer_license_key_verified()) {
            goto Y9;
        }
        if (!(!empty($nh) && !is_user_logged_in())) {
            goto xV;
        }
        $ag = get_option("\x6d\157\x5f\x73\141\x6d\154\137\163\x70\137\x62\141\163\x65\137\x75\x72\154");
        if (!empty($ag)) {
            goto cN;
        }
        $ag = home_url();
        cN:
        if (!(get_option("\x6d\157\x5f\x73\x61\155\154\137\162\x65\x6c\141\x79\x5f\x73\164\x61\x74\x65") && get_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\162\145\x6c\141\x79\x5f\x73\x74\x61\x74\x65") != '')) {
            goto SF;
        }
        $ap = get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\162\145\x6c\x61\171\137\163\164\141\164\x65");
        SF:
        $cW = $nh["\x69\144\160\x5f\156\x61\155\x65"];
        $c4 = $ap;
        $ZC = parse_url($c4, PHP_URL_PATH);
        $ZC = empty($ZC) ? "\57" : $ZC;
        $Fs = parse_url($c4, PHP_URL_QUERY);
        if (!empty($Fs)) {
            goto ji;
        }
        $c4 = $ZC;
        goto Xl;
        ji:
        $c4 = $ZC . "\77" . $Fs;
        Xl:
        $xc = $nh["\163\163\x6f\x5f\x75\x72\154"];
        $eZ = $nh["\163\x73\x6f\137\142\151\156\144\x69\x6e\147\137\164\171\x70\x65"];
        $nS = $nh["\162\x65\161\x75\x65\x73\x74\137\x73\x69\x67\156\x65\x64"];
        $RP = get_option("\x6d\157\137\x73\141\155\x6c\137\x66\x6f\162\143\145\x5f\x61\x75\x74\x68\145\156\164\151\x63\141\x74\151\157\x6e");
        $qs = $ag . "\57";
        $fN = get_option("\155\157\x5f\163\x61\x6d\x6c\137\x73\x70\x5f\x65\x6e\x74\x69\x74\x79\137\x69\x64");
        $G3 = $nh["\156\141\155\x65\x69\144\137\x66\157\162\x6d\141\164"];
        if (!empty($G3)) {
            goto rV;
        }
        $G3 = "\61\56\x31\72\156\141\x6d\x65\x69\x64\55\146\x6f\162\x6d\x61\164\72\x75\156\163\160\145\143\151\x66\x69\x65\144";
        rV:
        if (!empty($fN)) {
            goto Xs;
        }
        $fN = $ag . "\57\x77\x70\55\143\x6f\x6e\x74\145\156\x74\x2f\160\x6c\x75\x67\x69\156\x73\x2f\x6d\151\156\x69\157\x72\x61\156\x67\145\x2d\x73\141\x6d\154\55\62\x30\55\163\151\156\x67\x6c\x65\55\x73\x69\x67\156\x2d\157\156\x2f";
        Xs:
        $fN = isset($nh["\163\x61\x6d\154\x5f\x73\x70\x5f\145\x6e\164\x69\x74\x79\137\x69\x64"]) ? $nh["\163\x61\155\x6c\137\163\x70\137\x65\x6e\x74\x69\x74\x79\x5f\x69\x64"] : $fN;
        if (array_key_exists("\145\x6e\x61\142\154\145\137\x69\144\160", $nh)) {
            goto Ei;
        }
        $nh["\x65\156\141\142\x6c\x65\x5f\x69\x64\160"] = false;
        Ei:
        if ($nh["\x65\156\141\142\x6c\145\x5f\x69\144\160"]) {
            goto uU;
        }
        wp_die("\x57\145\x20\x63\x6f\165\154\144\40\156\x6f\x74\40\x73\151\147\x6e\40\x79\x6f\x75\40\x69\156\x2e\x20\120\154\145\141\163\x65\40\143\157\156\164\141\x63\164\x20\x79\x6f\x75\x72\x20\x61\x64\155\151\156\x69\x73\x74\x72\141\x74\x6f\x72", "\x45\x72\162\157\x72\72\x20\x49\104\x50\40\156\x6f\x74\x20\x65\x6e\x61\x62\x6c\x65\x64");
        uU:
        $vQ = Utilities::createAuthnRequest($qs, $fN, $xc, $RP, $eZ, $G3, $nh);
        if (empty($eZ) || $eZ == "\x48\164\x74\x70\x52\x65\144\x69\162\x65\x63\164") {
            goto Yg;
        }
        if (!($nS == "\x75\156\x63\150\x65\x63\x6b\145\144")) {
            goto ej;
        }
        $RQ = base64_encode($vQ);
        Utilities::postSAMLRequest($xc, $RQ, $c4);
        die;
        ej:
        $RQ = Utilities::signXML($vQ, "\116\x61\155\145\x49\104\x50\157\154\x69\x63\171", $nh);
        Utilities::postSAMLRequest($xc, $RQ, $c4);
        goto XQ;
        Yg:
        $Ni = $xc;
        if (strpos($xc, "\x3f") !== false) {
            goto TN;
        }
        $Ni .= "\x3f";
        goto Uv;
        TN:
        $Ni .= "\x26";
        Uv:
        if (!($nS == "\x75\x6e\x63\150\x65\x63\153\x65\144")) {
            goto Kf;
        }
        $Ni .= "\x53\x41\115\114\122\145\x71\165\x65\163\164\75" . $vQ . "\46\122\x65\154\x61\171\123\x74\x61\x74\145\75" . urlencode($c4);
        header("\114\157\x63\141\164\151\x6f\x6e\72\40" . $Ni);
        die;
        Kf:
        $vQ = "\123\x41\x4d\x4c\122\145\161\165\x65\163\x74\75" . $vQ . "\x26\122\145\154\x61\x79\123\164\x61\164\x65\75" . urlencode($c4) . "\x26\123\x69\147\101\154\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Me = array("\x74\171\x70\x65" => "\x70\162\x69\x76\141\x74\145");
        $nA = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Me);
        $jW = get_option("\155\157\137\163\141\x6d\x6c\x5f\143\x75\162\162\x65\156\164\x5f\143\x65\162\164\x5f\160\162\x69\x76\141\x74\x65\x5f\x6b\145\x79");
        $nA->loadKey($jW, FALSE);
        $We = new XMLSecurityDSig();
        $mv = $nA->signData($vQ);
        $mv = base64_encode($mv);
        $Ni .= $vQ . "\46\x53\x69\147\x6e\141\164\x75\162\x65\x3d" . urlencode($mv);
        header("\114\157\x63\x61\x74\151\x6f\x6e\72\x20" . $Ni);
        die;
        XQ:
        xV:
        Y9:
    }
    function mo_saml_login_error_message($Mc)
    {
        echo "\74\x64\151\166\40\x69\144\x3d\42\x6c\x6f\x67\x69\x6e\137\x65\x72\162\157\162\x31\x22\x3e\40\74\x70\76\74\x73\164\162\x6f\156\x67\76\105\122\x52\117\x52\x3c\57\x73\164\162\157\x6e\147\x3e\x3a\40" . $_SESSION["\155\x6f\137\x73\x61\x6d\x6c"]["\154\x6f\147\151\156\x5f\x65\162\x72\157\162\137\x6d\145\x73\163\141\147\x65"] . "\x3c\x2f\x70\76\x3c\57\x64\151\166\x3e";
        unset($_SESSION["\155\x6f\x5f\163\141\x6d\x6c"]["\x6c\157\147\x69\156\137\x65\x72\x72\157\x72\x5f\155\145\x73\x73\x61\147\145"]);
    }
    function mo_saml_authenticate($user, $vr, $ID)
    {
        $fO = get_option("\155\x6f\137\x73\141\x6d\x6c\x5f\142\x61\x63\x6b\x64\157\x6f\x72\137\165\x72\154") ? get_option("\155\x6f\137\163\141\x6d\x6c\x5f\x62\141\x63\x6b\144\157\x6f\x72\137\x75\162\154") : "\146\x61\x6c\x73\145";
        if (get_option("\155\x6f\137\163\141\x6d\154\x5f\145\x6e\141\142\x6c\x65\x5f\x64\x6f\155\141\x69\156\x5f\x6d\x61\x70\160\x69\x6e\147") == "\x74\x72\x75\145" && (!isset($_REQUEST["\163\141\155\x6c\x5f\x73\x73\157"]) || isset($_REQUEST["\163\141\x6d\154\x5f\163\x73\157"]) && $_REQUEST["\x73\141\x6d\154\x5f\x73\x73\x6f"] != $fO)) {
            goto Hd;
        }
        $eb = wp_authenticate_username_password($user, $vr, $ID);
        return $eb;
        goto Dm;
        Hd:
        if (empty($vr)) {
            goto Es;
        }
        $ns = maybe_unserialize(get_option("\x73\141\x6d\x6c\137\151\x64\x65\156\x74\151\164\171\x5f\x70\162\157\166\x69\x64\x65\162\163"));
        $ns = maybe_unserialize($ns);
        $l3 = get_option("\163\x61\155\154\x5f\151\144\160\x5f\144\x6f\155\141\151\156\137\155\141\160\160\x69\x6e\147");
        $tm = '';
        if (!isset($_REQUEST["\x72\x65\x64\151\x72\145\143\164\137\x74\x6f"])) {
            goto jP;
        }
        $tm = $_REQUEST["\x72\145\x64\151\162\145\x63\x74\x5f\x74\157"];
        jP:
        if (strpos($vr, "\x40") !== false) {
            goto HE;
        }
        if (empty($ns) || empty($l3) || get_option("\x6d\157\x5f\163\x61\155\x6c\137\x61\x6c\154\157\167\x5f\x77\x70\137\x73\x69\147\156\x69\x6e") != "\x66\141\x6c\163\145" && isset($_REQUEST["\x73\x61\155\x6c\137\163\163\157"]) && $_REQUEST["\x73\x61\x6d\x6c\x5f\163\163\157"] == $fO) {
            goto ZD;
        }
        if (!empty($ID)) {
            goto FP;
        }
        $TZ = new WP_Error("\151\156\166\141\154\151\x64\x5f\145\x6d\x61\151\x6c", __("\x3c\x73\164\x72\x6f\156\x67\x3e\x45\122\122\x4f\x52\x3c\57\x73\x74\x72\157\156\147\76\x3a\40\120\x6c\x65\141\163\x65\40\145\x6e\x74\x65\162\x20\x61\x20\x76\141\x6c\x69\144\40\x65\x6d\141\151\x6c\x20\x61\144\x64\x72\x65\163\x73\x2e"), '');
        return $TZ;
        goto A4;
        HE:
        $A2 = explode("\100", $vr, 2);
        $qt = trim($A2[1]);
        $Cv = false;
        if (empty($l3)) {
            goto ex;
        }
        foreach ($l3 as $nA => $bc) {
            $gP = array_map("\164\162\151\x6d", explode("\73", $bc));
            if (!in_array($qt, $gP)) {
                goto n0;
            }
            $Oj = $ns[$nA];
            $Cv = true;
            $this->mo_saml_redirect_for_authentication($Oj, $tm);
            n0:
            iR:
        }
        q2:
        ex:
        if ($Cv) {
            goto nt;
        }
        if (!get_option("\x6d\157\137\163\141\155\x6c\x5f\146\x61\154\x6c\x62\x61\x63\x6b\x5f\x74\157\137\x64\145\x66\x61\165\x6c\x74")) {
            goto mz;
        }
        $Cc = get_option("\163\141\x6d\154\x5f\x64\x65\146\x61\165\x6c\164\x5f\151\144\160");
        if ($Cc) {
            goto Tn;
        }
        update_option("\155\157\x5f\x73\141\155\154\137\x66\141\154\154\142\141\x63\x6b\137\x74\x6f\x5f\144\145\146\141\165\154\x74", '');
        update_option("\x6d\x6f\137\163\x61\155\154\137\x64\x6f\x6d\141\151\156\x5f\154\x6f\147\x69\156\x5f\146\x61\151\154", "\164\162\x75\145");
        $ag = get_option("\x6d\x6f\x5f\x73\141\155\x6c\137\163\x70\137\142\x61\x73\145\x5f\x75\162\154");
        if (!empty($ag)) {
            goto VS;
        }
        $ag = home_url();
        VS:
        wp_die("\116\157\x20\104\x65\x66\141\165\x6c\164\40\111\x44\x50\x20\x73\x65\x6c\145\x63\x74\145\x64\x2e\x20\x54\162\171\40\x73\x69\x67\x6e\151\156\x67\40\151\156\40\165\x73\x69\156\x67\x20\x3c\x61\40\150\x72\x65\x66\75\x22" . $ag . "\57\x77\x70\55\x6c\157\147\151\x6e\x2e\x70\150\160\x22\76\40\127\x6f\162\144\x70\162\x65\163\163\40\143\162\x65\x64\x65\x6e\x74\x69\x61\x6c\163\56\x3c\x2f\141\76");
        goto bF;
        Tn:
        $this->mo_saml_redirect_for_authentication($ns[$Cc], $tm);
        bF:
        mz:
        $eb = wp_authenticate_username_password($user, $vr, $ID);
        return $eb;
        nt:
        goto A4;
        ZD:
        $eb = wp_authenticate_username_password(null, $vr, $ID);
        return $eb;
        goto A4;
        FP:
        $eb = wp_authenticate_username_password($user, $vr, $ID);
        return $eb;
        A4:
        Es:
        $TZ = new WP_Error();
        $TZ->add("\x65\x6d\x70\164\171\x5f\165\x73\x65\162\156\x61\x6d\x65", __("\x3c\163\164\x72\x6f\156\x67\x3e\105\x52\x52\x4f\x52\x3c\x2f\x73\x74\x72\x6f\x6e\x67\76\72\x20\x45\x6d\160\164\x79\x20\165\163\145\162\x6e\x61\155\x65\x2e"));
        $TZ->add("\x65\x6d\160\164\171\137\160\x61\x73\163\x77\157\162\x64", __("\74\x73\x74\162\x6f\156\x67\x3e\x45\x52\122\117\x52\x3c\57\163\x74\x72\157\156\x67\76\x3a\x20\105\x6d\x70\164\171\40\x70\x61\163\x73\x77\157\x72\144\x2e"));
        return $TZ;
        Dm:
    }
    function mo_saml_redirect_to_idp_list_page_from_login_page()
    {
        $tm = '';
        if (!isset($_REQUEST["\x72\145\x64\x69\162\x65\x63\164\x5f\164\x6f"])) {
            goto Rc;
        }
        $tm = $_REQUEST["\x72\145\144\151\162\x65\x63\164\137\x74\157"];
        Rc:
        if (!is_user_logged_in()) {
            goto ik;
        }
        if (!empty($tm)) {
            goto Wo;
        }
        header("\x4c\x6f\x63\x61\164\x69\157\156\72\x20" . home_url());
        goto bq;
        Wo:
        header("\114\157\x63\141\x74\151\x6f\x6e\72\x20" . $tm);
        bq:
        die;
        ik:
        $B_ = get_option("\x73\x61\x6d\154\x5f\x64\x65\x66\x61\x75\154\164\x5f\x69\x64\x70");
        if (!(get_option("\155\157\x5f\163\x61\x6d\x6c\x5f\145\156\141\142\x6c\x65\137\x6c\157\147\151\156\137\162\145\144\151\162\145\x63\164") == "\x74\x72\165\145" and !empty($B_))) {
            goto eh;
        }
        $fO = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\142\x61\x63\x6b\144\157\x6f\162\x5f\x75\162\x6c") ? trim(get_option("\155\157\137\x73\x61\x6d\x6c\x5f\142\141\143\153\x64\x6f\157\162\x5f\165\x72\154")) : "\x66\141\x6c\163\x65";
        if (isset($_GET["\154\157\x67\x67\145\144\x6f\x75\164"]) && $_GET["\154\x6f\x67\147\145\x64\x6f\x75\164"] == "\x74\162\x75\145") {
            goto mi;
        }
        if (get_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\141\x6c\x6c\157\x77\x5f\167\x70\137\163\151\147\156\151\156") == "\164\x72\x75\x65") {
            goto co;
        }
        goto I5;
        mi:
        header("\114\157\x63\x61\x74\x69\157\x6e\x3a\x20" . home_url());
        die;
        goto I5;
        co:
        if (isset($_GET["\163\141\155\154\137\163\x73\157"]) && $_GET["\163\141\x6d\154\137\163\163\x6f"] === $fO || isset($_POST["\163\x61\155\154\x5f\163\163\157"]) && $_POST["\x73\x61\x6d\154\137\x73\x73\157"] === $fO) {
            goto jX;
        }
        if (isset($_REQUEST["\162\145\x64\151\162\x65\143\164\137\x74\x6f"])) {
            goto MY;
        }
        goto UD;
        jX:
        return;
        goto UD;
        MY:
        $tm = htmlspecialchars($_REQUEST["\162\145\x64\151\162\145\143\x74\x5f\x74\x6f"]);
        if (!(strpos($tm, "\167\160\55\141\144\x6d\151\156") !== false && strpos($tm, "\x73\x61\x6d\154\x5f\x73\x73\x6f\75" . $fO) !== false)) {
            goto La;
        }
        return;
        La:
        UD:
        I5:
        $ns = maybe_unserialize(get_option("\163\141\x6d\x6c\x5f\151\144\145\156\164\x69\x74\171\137\160\x72\x6f\166\151\144\x65\x72\163"));
        $ec = '';
        foreach ($ns as $O4) {
            if (!($O4["\x69\x64\160\x5f\156\x61\155\145"] === $B_)) {
                goto Fu;
            }
            $ec = $O4;
            Fu:
            ds:
        }
        OY:
        $this->mo_saml_redirect_for_authentication($ec, $tm);
        eh:
        if (!(get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x61\x75\164\157\137\162\145\144\x69\162\x65\x63\x74\x5f\164\157\137\160\x75\142\154\x69\143\137\x70\x61\147\x65") == "\164\x72\165\145")) {
            goto El;
        }
        $fO = get_option("\155\x6f\137\163\x61\155\154\137\x62\141\143\153\144\157\x6f\x72\137\165\x72\x6c") ? get_option("\x6d\157\137\163\141\155\x6c\x5f\142\x61\x63\x6b\x64\x6f\x6f\162\x5f\x75\162\x6c") : "\x66\141\x6c\x73\145";
        if (isset($_GET["\x6c\157\x67\x67\x65\144\157\x75\164"]) && $_GET["\x6c\157\x67\147\145\x64\x6f\165\x74"] == "\x74\162\165\145") {
            goto cd;
        }
        if (get_option("\x6d\157\x5f\x73\141\x6d\154\x5f\141\154\x6c\157\167\x5f\167\x70\137\x73\x69\x67\x6e\x69\156") != "\x66\x61\x6c\163\145") {
            goto VG;
        }
        goto T7;
        cd:
        header("\x4c\x6f\x63\x61\x74\151\x6f\156\72\40" . home_url());
        die;
        goto T7;
        VG:
        if (isset($_GET["\x73\141\155\154\137\x73\x73\157"]) && $_GET["\163\141\x6d\x6c\137\163\x73\157"] === $fO || isset($_POST["\x73\141\155\154\x5f\163\163\157"]) && $_POST["\163\x61\155\x6c\137\x73\x73\x6f"] === $fO) {
            goto kK;
        }
        if (isset($_REQUEST["\x72\145\x64\151\x72\145\143\x74\x5f\164\157"])) {
            goto RL;
        }
        goto Rx;
        kK:
        return;
        goto Rx;
        RL:
        $tm = $_REQUEST["\x72\145\x64\x69\162\145\x63\164\137\x74\x6f"];
        if (!(strpos($tm, "\x77\160\x2d\x61\x64\x6d\x69\x6e") !== false && strpos($tm, "\x20\40\163\x61\155\154\137\163\x73\x6f\x3d" . $fO) !== false)) {
            goto dU;
        }
        return;
        dU:
        Rx:
        T7:
        $Nk = get_option("\155\157\x5f\163\x61\x6d\x6c\137\x69\144\x70\x5f\x6c\151\163\164\137\x75\162\x6c");
        $ui = (isset($_SERVER["\110\124\124\120\x53"]) ? "\x68\164\164\x70\x73" : "\150\x74\164\160") . "\72\x2f\57{$_SERVER["\110\124\x54\x50\137\110\117\123\124"]}{$_SERVER["\x52\105\121\x55\x45\x53\124\137\125\x52\111"]}";
        if (!strcmp($ui, $Nk)) {
            goto IX;
        }
        header("\x4c\157\x63\x61\x74\151\x6f\x6e\x3a\40" . $Nk);
        die;
        goto td;
        IX:
        return;
        td:
        El:
    }
    function mo_saml_auto_redirect()
    {
        if (!current_user_can("\x72\x65\x61\144")) {
            goto Ai;
        }
        return;
        Ai:
        if (!(get_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\x61\x75\x74\157\x5f\x72\x65\144\x69\162\x65\143\x74\137\x74\x6f\x5f\160\x75\x62\154\151\143\137\160\x61\147\x65") == "\x74\x72\x75\145" && !empty(get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\151\x64\x70\x5f\154\x69\x73\164\137\x75\x72\x6c")))) {
            goto YI;
        }
        $fO = get_option("\155\x6f\137\163\x61\155\x6c\137\x62\141\x63\153\x64\x6f\x6f\x72\137\165\x72\x6c") ? get_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\x62\x61\x63\x6b\x64\157\x6f\x72\x5f\165\x72\x6c") : "\146\x61\154\x73\145";
        if (isset($_GET["\154\157\x67\x67\x65\x64\157\x75\164"]) && $_GET["\x6c\157\147\147\x65\x64\157\x75\164"] == "\164\x72\x75\x65") {
            goto gx;
        }
        if (get_option("\155\x6f\137\163\x61\x6d\x6c\x5f\x61\154\154\157\167\137\167\x70\137\163\x69\147\156\151\x6e") != "\x66\x61\x6c\163\x65") {
            goto DA;
        }
        goto hI;
        gx:
        header("\114\x6f\x63\141\164\x69\x6f\x6e\x3a\40" . home_url());
        die;
        goto hI;
        DA:
        if (isset($_GET["\x73\x61\x6d\154\137\x73\163\157"]) && $_GET["\x73\141\x6d\154\137\163\x73\x6f"] === $fO || isset($_POST["\163\x61\155\154\137\x73\x73\157"]) && $_POST["\x73\x61\x6d\x6c\x5f\163\163\x6f"] === $fO) {
            goto la;
        }
        if (isset($_REQUEST["\x72\x65\144\x69\162\x65\143\164\137\164\157"])) {
            goto Rt;
        }
        goto S0;
        la:
        return;
        goto S0;
        Rt:
        $tm = $_REQUEST["\162\x65\144\x69\162\x65\143\x74\137\164\157"];
        if (!(strpos($tm, "\167\x70\x2d\141\144\x6d\x69\x6e") !== false && strpos($tm, "\40\x20\x73\141\155\154\x5f\163\x73\x6f\75" . $fO) !== false)) {
            goto of;
        }
        return;
        of:
        S0:
        hI:
        $Nk = get_option("\155\x6f\137\163\x61\x6d\x6c\137\x69\144\x70\137\x6c\151\163\x74\x5f\165\x72\154");
        $ui = (isset($_SERVER["\110\x54\x54\120\123"]) ? "\150\164\x74\160\x73" : "\x68\164\164\x70") . "\x3a\57\x2f{$_SERVER["\x48\124\124\120\x5f\110\x4f\x53\124"]}{$_SERVER["\122\105\121\x55\105\123\x54\137\x55\x52\111"]}";
        if (!strcmp($ui, $Nk)) {
            goto Yt;
        }
        header("\114\157\x63\x61\x74\x69\x6f\156\72\40" . $Nk);
        die;
        goto vS;
        Yt:
        return;
        vS:
        YI:
        if (!(get_option("\x6d\157\137\163\x61\x6d\154\x5f\162\x65\144\x69\162\145\143\x74\x5f\x64\x65\146\141\165\x6c\164\x5f\x69\144\x70") == "\x74\162\165\145")) {
            goto KK;
        }
        $B_ = get_option("\163\141\155\154\137\144\145\x66\x61\x75\154\164\137\x69\x64\160");
        $ns = maybe_unserialize(get_option("\163\x61\x6d\154\x5f\151\x64\145\156\x74\x69\x74\x79\x5f\x70\162\x6f\x76\151\144\x65\x72\163"));
        $ns = maybe_unserialize($ns);
        $ec = '';
        if (!(!empty($ns) and is_array($ns))) {
            goto gK;
        }
        foreach ($ns as $O4) {
            if (!($O4["\151\144\x70\137\x6e\141\x6d\x65"] === $B_)) {
                goto EM;
            }
            $ec = $O4;
            EM:
            RI:
        }
        tD:
        gK:
        $hZ = saml_get_current_page_url();
        $this->mo_saml_redirect_for_authentication($ec, $hZ);
        KK:
        if (!(get_option("\155\x6f\137\x73\x61\155\x6c\x5f\162\x65\x67\x69\163\x74\x65\162\145\x64\137\157\156\154\171\x5f\141\x63\x63\x65\x73\163") == "\x74\162\165\x65")) {
            goto vA;
        }
        $ns = maybe_unserialize(get_option("\163\141\155\154\137\x69\x64\145\156\164\x69\164\x79\x5f\x70\x72\157\x76\151\x64\x65\162\163"));
        $ns = maybe_unserialize($ns);
        if (!is_array($ns)) {
            goto sp;
        }
        if (sizeof($ns) === 1) {
            goto T1;
        }
        auth_redirect();
        goto G5;
        T1:
        $hZ = saml_get_current_page_url();
        $this->mo_saml_redirect_for_authentication(reset($ns), $hZ);
        G5:
        sp:
        vA:
    }
    function mo_saml_modify_login_form()
    {
        $A6 = get_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\141\154\154\157\167\137\167\160\137\163\151\x67\x6e\151\x6e");
        $fO = get_option("\x6d\x6f\x5f\163\141\155\154\x5f\x62\x61\x63\153\144\x6f\x6f\x72\x5f\x75\x72\154") ? get_option("\155\157\137\x73\x61\155\154\137\142\x61\143\x6b\x64\x6f\157\162\137\x75\x72\154") : "\x66\141\x6c\x73\x65";
        if (!(get_option("\x6d\157\x5f\163\x61\x6d\154\x5f\x61\154\154\157\167\137\x77\160\137\x73\151\x67\x6e\151\156") != "\x66\x61\154\x73\145" && (isset($_GET["\163\141\155\154\x5f\163\163\157"]) && $_GET["\163\x61\x6d\x6c\x5f\163\163\x6f"] == $fO) || isset($_POST["\163\x61\155\x6c\x5f\x73\163\157"]) && $_POST["\x73\141\155\154\137\x73\163\x6f"] == $fO)) {
            goto yv;
        }
        ?>
			<script>
				jQuery("#user_pass").removeAttr("disabled");
			</script>
			<?php
/*
 * Plugin Name: miniOrange SAML SSO Multiple IDP
 * Plugin URI: http://miniorange.com/
 * Description: (Single Site Multiple IdP)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
 * Version: 25.0.1
 * Author: miniOrange
 * Author URI: http://miniorange.com/
 */ 
        echo "\x3c\x69\156\x70\165\x74\40\164\171\x70\x65\x3d\42\x68\151\144\144\145\x6e\x22\x20\x6e\141\155\x65\75\x22\x73\141\155\154\137\x73\163\x6f\42\40\166\x61\154\165\145\75\x22" . $fO . "\x22\x3e";
        return;
        yv:
    }
    function mo_saml_add_login_links()
    {
        $this->add_federeation_link();
        $ns = maybe_unserialize(get_option("\163\x61\155\154\137\151\x64\x65\156\164\151\x74\x79\137\x70\162\x6f\x76\151\144\145\x72\x73"));
        $Oi = get_option("\x73\x61\x6d\x6c\137\163\163\x6f\137\x62\165\164\x74\x6f\156\137\151\x64\x70");
        $Oi = maybe_unserialize($Oi);
        if (!empty($Oi)) {
            goto aF;
        }
        $Oi = array();
        aF:
        if (!(!empty($ns) and is_array($ns))) {
            goto YQ;
        }
        foreach ($ns as $ec) {
            $Zu = $ec["\x69\x64\160\x5f\x6e\x61\x6d\145"];
            if (!(isset($Oi[$Zu]["\x61\144\x64\x5f\142\165\164\164\x6f\156\x5f\x77\160\x5f\154\x6f\147\x69\156"]) and $Oi[$Zu]["\141\x64\144\137\x62\x75\164\164\x6f\x6e\137\x77\160\x5f\x6c\x6f\x67\151\156"] == "\x74\162\x75\145")) {
                goto Un;
            }
            $this->mo_saml_add_sso_button($Oi, $Zu);
            Un:
            ry:
        }
        tb:
        YQ:
    }
    function mo_saml_add_sso_button($Oi, $Zu)
    {
        if (is_user_logged_in()) {
            goto Ib;
        }
        $ag = get_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\163\160\137\142\x61\163\x65\x5f\x75\x72\154");
        if (!empty($ag)) {
            goto Gs;
        }
        $ag = home_url();
        Gs:
        $P_ = get_sso_button($Oi, $Zu);
        $tm = '';
        if (!isset($_GET["\x72\x65\144\x69\162\x65\143\x74\x5f\164\157"])) {
            goto Qj;
        }
        $tm = urlencode($_GET["\162\145\x64\x69\162\x65\143\x74\137\164\x6f"]);
        Qj:
        $sh = "\74\141\40\x68\162\145\146\75\42" . $ag . "\x2f\x3f\x6f\x70\x74\151\x6f\156\x3d\163\x61\155\154\137\165\x73\x65\x72\x5f\x6c\x6f\147\151\156\x26\151\144\160\75" . $Zu . "\46\x72\x65\x64\x69\x72\145\143\164\137\164\157\x3d" . $tm . "\42\x20\163\x74\171\x6c\145\75\42\x74\x65\170\164\55\x64\x65\x63\x6f\162\x61\x74\x69\157\156\x3a\156\x6f\x6e\x65\x3b\42\x3e" . $P_ . "\x3c\57\x61\x3e";
        $sh = "\74\144\x69\x76\40\x73\x74\x79\154\145\x3d\42\160\x61\144\144\151\x6e\147\x3a\61\x30\160\x78\x3b\42\76" . $sh . "\74\57\x64\x69\x76\76";
        $sh = "\x3c\144\x69\x76\40\151\x64\75\x22\163\163\157\137\x62\x75\164\164\x6f\x6e\x22\40\163\x74\171\154\145\x3d\42\164\x65\x78\x74\x2d\x61\x6c\151\x67\x6e\72\x63\145\x6e\164\x65\162\x22\x3e" . $sh . "\x3c\57\x64\151\x76\x3e\x3c\142\162\x2f\x3e";
        echo $sh;
        Ib:
    }
    function add_federeation_link()
    {
        $sl = get_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\x66\x65\x64\x65\162\141\x74\151\157\156\163");
        if (!$sl) {
            goto FM;
        }
        foreach ($sl as $u6 => $xg) {
            if (!$xg["\145\156\x61\142\x6c\145"]) {
                goto S1;
            }
            $Vm = $xg["\144\151\x73\x63\x6f\166\x65\162\x79\x5f\165\x72\x6c"];
            if (!array_key_exists("\x70\x61\x72\141\x6d\x65\164\145\x72\163", $xg)) {
                goto u1;
            }
            if (empty($xg["\x70\141\162\141\x6d\x65\164\145\162\163"])) {
                goto aH;
            }
            $Vm = $Vm . "\x3f";
            foreach ($xg["\x70\x61\162\x61\x6d\145\x74\145\x72\163"] as $lw => $bc) {
                $Vm = $Vm . $lw . "\75" . $bc;
                if (!next($xg["\160\141\x72\x61\x6d\145\164\x65\x72\x73"])) {
                    goto If1;
                }
                $Vm = $Vm . "\x26";
                If1:
                uu:
            }
            sG:
            aH:
            u1:
            $sh = "\x3c\x62\x72\57\x3e\74\x68\x72\x3e\15\12\x9\x9\11\11\x9\74\144\x69\166\40\163\164\x79\x6c\x65\75\x22\164\x65\170\x74\55\x61\154\x69\x67\156\72\x63\145\x6e\x74\145\x72\x3b\40\160\141\144\x64\x69\156\x67\72\65\160\170\73\x22\x3e\xd\xa\x9\11\11\x9\11\11\74\x68\64\x3e\x4c\x6f\147\151\156\40\167\151\164\x68\74\x2f\x68\64\76\x3c\142\162\x2f\x3e\xd\12\x9\11\11\x9\11\11\x3c\x61\40\150\162\145\146\75\42" . $Vm . "\42\x20\163\164\x79\x6c\x65\75\x22\x74\x65\x78\164\x2d\144\x65\143\157\162\x61\x74\151\x6f\x6e\72\156\157\x6e\x65\73\42\40\164\141\162\147\145\164\x3d\42\x5f\x62\x6c\x61\x6e\x6b\x22\76\15\xa\11\x9\11\x9\11\x9\x9";
            if ($u6 == "\111\x6e\103\x6f\155\x6d\x6f\x6e") {
                goto jb;
            }
            if ($u6 == "\110\x41\113\x41") {
                goto X_;
            }
            if ($u6 == "\x48\113\101\106") {
                goto YR;
            }
            $sh = $sh . "\x3c\x69\156\x70\x75\x74\x20\164\x79\x70\145\x3d\42\x62\x75\164\164\157\x6e\42\x20\x76\141\154\x75\145\75\x22" . $u6 . "\42\xd\12\x9\11\11\x9\x9\x9\x9\11\163\164\x79\x6c\145\x3d\x22\x77\x69\x64\164\x68\72\61\x30\60\160\170\73\xd\12\x9\11\x9\11\11\11\11\11\x9\150\145\151\x67\150\x74\72\65\60\x70\170\x3b\15\xa\11\x9\11\x9\x9\11\x9\x9\x9\x62\x6f\162\144\145\x72\55\x72\141\144\x69\165\x73\x3a\x35\160\170\x3b\15\xa\x9\11\11\x9\x9\x9\11\x9\x9\x62\141\143\153\x67\x72\157\165\156\144\55\x63\157\x6c\x6f\x72\x3a\x23\x30\60\70\65\x62\141\x3b\xd\xa\x9\11\x9\11\11\x9\11\x9\x9\x62\x6f\162\x64\145\x72\x2d\x63\x6f\x6c\x6f\x72\x3a\x74\162\x61\x6e\163\160\141\x72\145\156\164\73\xd\12\x9\11\x9\x9\x9\x9\11\11\11\x63\x6f\x6c\157\x72\x3a\x23\146\x66\x66\146\x66\x66\73\xd\xa\x9\x9\11\x9\x9\11\x9\x9\x9\x66\x6f\156\x74\55\163\x69\172\x65\72\x32\60\x70\170\x3b\15\xa\11\11\x9\x9\11\x9\11\11\x9\160\x61\x64\x64\151\156\x67\72\60\x70\170\73\42\x3e";
            goto mt;
            YR:
            $sh = $sh . "\x3c\x69\155\x67\40\163\x72\x63\75\x22" . plugin_dir_url(__FILE__) . "\x69\155\141\x67\145\x73\57\150\153\141\146\x2e\x70\156\147\x22\40\x73\x74\x79\154\x65\x3d\x22\142\157\162\x64\145\162\72\x6e\x6f\x6e\145\73\x20\x77\151\x64\x74\150\72\62\60\60\160\170\x3b\40\x68\x65\x69\x67\x68\164\x3a\x36\x30\160\170\73\42\x20\141\154\164\75\42\x48\113\x41\x46\x20\166\151\x61\40\x6d\x69\156\x69\117\162\141\156\x67\145\42\x3e";
            mt:
            goto PE;
            X_:
            $sh = $sh . "\74\x69\x6d\x67\x20\163\162\143\75\42" . plugin_dir_url(__FILE__) . "\x69\155\141\x67\145\x73\57\x68\141\x6b\141\56\160\156\147\x22\x20\163\x74\171\154\x65\75\42\142\157\162\144\x65\162\72\156\x6f\156\x65\73\40\167\151\x64\x74\150\x3a\61\x35\60\x70\170\x3b\40\x68\145\x69\147\x68\164\x3a\67\x35\160\x78\73\x22\x20\x61\x6c\x74\x3d\x22\110\x61\x6b\x61\x20\x76\x69\141\40\155\151\x6e\151\117\162\x61\156\147\x65\42\76";
            PE:
            goto S6;
            jb:
            $sh = $sh . "\x3c\x69\x6d\x67\x20\163\162\143\75\x22" . plugin_dir_url(__FILE__) . "\x69\x6d\x61\147\145\163\57\x69\156\143\157\x6d\155\157\x6e\x2e\x67\x69\146\42\40\x73\x74\x79\x6c\x65\x3d\42\x62\157\x72\144\145\x72\x3a\x6e\157\156\145\x3b\40\x77\151\144\164\x68\x3a\62\x38\x30\160\170\x3b\40\x68\145\x69\147\x68\x74\x3a\66\x30\x70\170\x3b\42\x20\141\x6c\164\x3d\42\x49\156\143\157\x6d\155\157\156\x20\x76\x69\x61\40\155\x69\156\x69\117\162\141\x6e\147\145\x22\76";
            S6:
            $sh = $sh . "\15\12\x9\x9\11\x9\x9\x9\74\x2f\x61\76\15\12\x9\x9\x9\11\x9\x3c\x2f\144\x69\x76\76\15\12\x9\x9\x9\x9\11\x3c\150\162\76\x3c\142\162\57\76";
            echo $sh;
            S1:
            RW:
        }
        g0:
        FM:
    }
    function mo_saml_jquery_default_login()
    {
        wp_enqueue_script("\152\161\x75\145\x72\x79");
    }
    function mo_saml_footer_form()
    {
        $ML = get_option("\155\157\x5f\x73\141\155\x6c\137\145\156\x61\x62\154\145\x5f\x64\157\x6d\141\151\x6e\137\155\x61\160\160\x69\156\x67");
        $D_ = get_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\144\x6f\x6d\141\151\156\137\x6c\x6f\x67\x69\x6e\x5f\x66\x61\151\154");
        $ns = maybe_unserialize(get_option("\x73\141\x6d\154\137\x69\144\145\156\x74\x69\164\171\x5f\160\x72\x6f\x76\151\144\145\x72\163"));
        $gP = get_option("\163\141\155\154\137\x69\144\160\x5f\144\x6f\155\141\x69\156\x5f\155\141\x70\x70\151\156\x67");
        if ($ML == "\164\x72\165\x65" && !empty($gP) && !empty($ns)) {
            goto je;
        }
        ?>
			<script>
			
			jQuery('label[for="user_pass"]').show();
			jQuery('#user_pass').show();
			jQuery('div#login p#nav').show();
			
			jQuery('#user_pass').val("");
			
			</script>
			<?php
/*
 * Plugin Name: miniOrange SAML SSO Multiple IDP
 * Plugin URI: http://miniorange.com/
 * Description: (Single Site Multiple IdP)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
 * Version: 25.0.1
 * Author: miniOrange
 * Author URI: http://miniorange.com/
 */ 
        goto YZ;
        je:
        ?>
		<script>
			jQuery('#user_pass').attr('disabled', 'disabled');
			jQuery( "#loginform" ).submit(function( event ) {
				var username = jQuery('#user_login').val();
				if(username != ''){
					var validemail = username.indexOf("@");
					if(validemail != -1){
						var username_split = username.split('@');
						var domain = username_split[1];
						jQuery.ajax({
							url:"<?php
/*
 * Plugin Name: miniOrange SAML SSO Multiple IDP
 * Plugin URI: http://miniorange.com/
 * Description: (Single Site Multiple IdP)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
 * Version: 25.0.1
 * Author: miniOrange
 * Author URI: http://miniorange.com/
 */ 
        echo home_url() . "\77\x67\145\164\137\x64\157\155\141\151\156\x5f\155\x61\160\160\x69\156\147\75\164\x72\x75\x65";
        ?>
",
							async: false,
							success:function(data) {
								if(data === undefined || !data){
									var password = jQuery('#user_pass').val();
									if(typeof password === 'undefined' || password == ''){
										jQuery('label[for="user_pass"]').show();
										jQuery('#user_pass').show();
										jQuery('div#login p#nav').show();
										event.preventDefault();
									}
								}else{
									var domain_match = false;
									var dataObj = JSON.parse(data);
									var use_wp_credentials = "<?php
/*
 * Plugin Name: miniOrange SAML SSO Multiple IDP
 * Plugin URI: http://miniorange.com/
 * Description: (Single Site Multiple IdP)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
 * Version: 25.0.1
 * Author: miniOrange
 * Author URI: http://miniorange.com/
 */ 
        echo $D_;
        ?>
";
									

									jQuery.each (dataObj, function (key, value){
										var mapping_domains = value.split(";");
										var domain_found = jQuery.inArray(domain,mapping_domains);
										if(domain_found > -1){
											domain_match = true;
										}
									});
									if(!domain_match){
												
												if(use_wp_credentials){
													jQuery('label[for="user_pass"]').show();
													jQuery('#user_pass').show();
													jQuery('div#login p#nav').show();
													
													var password = jQuery('#user_pass').val();
													
													if(password == ''){
														event.preventDefault();
													}
													jQuery('#user_pass').removeAttr('disabled');

												}
									}
								}
							}
						});
					}
				}
			});
			
		</script>
	
	<?php
/*
 * Plugin Name: miniOrange SAML SSO Multiple IDP
 * Plugin URI: http://miniorange.com/
 * Description: (Single Site Multiple IdP)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
 * Version: 25.0.1
 * Author: miniOrange
 * Author URI: http://miniorange.com/
 */ 
        YZ:
        $this->mo_saml_modify_login_form();
    }
    function mo_saml_init_login_form()
    {
        $ns = maybe_unserialize(get_option("\x73\141\x6d\x6c\x5f\x69\144\x65\x6e\x74\x69\x74\x79\137\160\x72\x6f\166\151\x64\145\162\163"));
        $l3 = get_option("\x73\x61\x6d\x6c\x5f\x69\x64\160\x5f\144\157\155\141\x69\x6e\x5f\155\141\x70\160\151\x6e\x67");
        $fO = get_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\x62\x61\x63\153\x64\x6f\x6f\162\137\x75\x72\154") ? get_option("\x6d\x6f\137\x73\141\x6d\154\x5f\142\x61\x63\x6b\144\157\x6f\162\x5f\165\162\x6c") : "\x66\141\x6c\163\145";
        if (!(!empty($ns) && !empty($l3) && mo_saml_is_customer_registered_saml() && mo_saml_is_customer_license_key_verified())) {
            goto ZT;
        }
        $A6 = get_option("\155\x6f\137\x73\x61\x6d\154\137\x61\x6c\154\x6f\167\x5f\167\160\137\163\x69\147\156\x69\156");
        if (isset($_GET["\x67\145\164\137\144\157\x6d\x61\151\x6e\137\155\141\160\160\x69\156\147"]) && $_GET["\147\145\x74\137\x64\x6f\155\141\151\x6e\137\155\x61\160\x70\x69\156\x67"] == "\x74\162\x75\x65") {
            goto pd;
        }
        if ($A6 != "\x66\x61\154\163\x65" && (isset($_GET["\163\x61\x6d\154\137\x73\163\157"]) && $_GET["\x73\x61\x6d\154\137\x73\163\x6f"] == $fO) || isset($_POST["\x73\141\155\154\x5f\x73\163\157"]) && $_POST["\x73\141\x6d\154\x5f\163\x73\157"] == $fO) {
            goto ZS;
        }
        if (isset($_REQUEST["\x72\145\x64\x69\162\145\x63\x74\x5f\x74\x6f"])) {
            goto eP;
        }
        goto h6;
        ZS:
        return;
        goto h6;
        eP:
        $tm = $_REQUEST["\x72\145\x64\151\x72\x65\143\164\137\x74\x6f"];
        if (!(strpos($tm, "\167\160\x2d\x61\144\x6d\x69\x6e") !== false && strpos($tm, "\163\141\155\x6c\137\x73\x73\157\75\146\141\x6c\163\x65") !== false)) {
            goto Wk;
        }
        return;
        Wk:
        h6:
        goto jk;
        pd:
        echo json_encode($l3);
        die;
        jk:
        add_filter("\147\x65\x74\x74\145\170\x74", function ($kh) {
            if (!in_array($GLOBALS["\x70\141\x67\145\x6e\x6f\x77"], array("\x77\160\x2d\154\x6f\x67\151\x6e\56\160\x68\160"))) {
                goto tc;
            }
            if (!("\125\x73\x65\162\x6e\x61\155\x65" == $kh)) {
                goto N9;
            }
            return "\x45\155\x61\151\x6c";
            N9:
            tc:
            return $kh;
        }, 20);
        wp_register_style("\150\x69\144\145\x2d\154\x6f\x67\151\x6e", plugins_url("\151\156\143\x6c\165\144\x65\x73\x2f\x63\x73\163\57\150\x69\144\x65\x2d\x6c\157\x67\x69\x6e\x2e\x63\x73\163\x3f\166\x65\x72\163\151\x6f\x6e\x3d\64\x2e\61\56\63", __FILE__));
        wp_register_style("\163\150\x6f\167\55\x6c\x6f\147\x69\156", plugins_url("\x69\156\x63\x6c\165\144\x65\163\57\x63\163\x73\57\163\150\x6f\167\x2d\x6c\x6f\147\x69\x6e\56\143\x73\163\x3f\166\x65\162\163\151\x6f\156\x3d\64\56\x31\x2e\x33", __FILE__));
        wp_enqueue_style("\x73\150\157\x77\x2d\154\157\x67\x69\156");
        wp_enqueue_style("\150\x69\144\x65\x2d\x6c\x6f\x67\x69\156");
        ZT:
    }
    function mo_get_saml_login_shortcode($Rs = array())
    {
        $eB = get_site_option("\x73\x61\x6d\154\x5f\x69\x64\x65\156\164\151\164\171\137\x70\162\x6f\x76\151\x64\145\162\163");
        if (!@unserialize($eB)) {
            goto H3;
        }
        $eB = unserialize($eB);
        H3:
        if (!empty($eB)) {
            goto BT;
        }
        return "\x4e\157\x20\x49\104\120\40\103\157\x6e\x66\151\147\165\162\145\144";
        BT:
        $ZL = false;
        if (!(isset($eB) && !empty($eB))) {
            goto Ku;
        }
        foreach ($eB as $ec) {
            $tj = $ec["\x69\x64\160\x5f\x6e\141\155\x65"];
            if (!($tj == $Rs["\x69\x64\x70"])) {
                goto qm;
            }
            $ZL = true;
            goto Yl;
            qm:
            Bu:
        }
        Yl:
        Ku:
        if ($ZL) {
            goto nr;
        }
        return "\x54\150\x69\x73\40\111\x44\x50\x20\156\x6f\x74\x20\146\x6f\165\x6e\x64\40\x69\156\40\x74\150\x65\40\x6c\x69\163\x74";
        goto yA;
        nr:
        $Mc = get_site_option("\x6d\157\137\163\141\155\x6c\x5f\163\x68\x6f\162\164\x63\x6f\x64\145\x5f\155\145\x73\163\x61\x67\x65");
        $sh = "\74\x73\x74\171\x6c\x65\x3e\56\x69\x73\141\x5f\145\162\x72\157\x72\40\173\xd\12\x20\40\x20\x20\40\x20\40\x20\x20\x20\40\x20\x20\x20\x20\40\40\x20\40\40\40\x20\x20\x20\143\157\154\x6f\162\x3a\40\x23\104\x38\x30\60\60\103\x3b\xd\xa\x20\x20\40\x20\40\x20\40\40\40\x20\x20\x20\x20\x20\x20\x20\40\40\40\40\40\40\x20\x20\x62\141\143\x6b\x67\162\x6f\x75\156\144\55\143\x6f\154\157\x72\72\40\x23\106\x46\104\62\x44\x32\73\xd\12\40\x20\x20\x20\40\x20\40\40\40\40\40\x20\40\40\40\x20\40\x20\40\x20\175\xd\12\40\40\x20\x20\x20\x20\40\x20\40\40\40\x20\x20\40\40\40\40\x20\x20\x20\56\x69\x73\x61\x5f\145\x72\162\x6f\162\x20\x69\40\173\15\12\x20\x20\x20\40\x20\x20\40\40\40\x20\40\40\40\x20\x20\x20\40\40\x20\40\x20\40\x20\40\x20\x20\x20\x20\x6d\141\162\x67\151\156\72\61\60\160\170\x20\x32\62\160\x78\73\xd\12\40\40\40\x20\40\x20\x20\x20\x20\40\40\x20\40\x20\40\x20\40\x20\40\x20\x20\x20\40\40\x20\40\x20\40\146\x6f\156\164\x2d\163\151\172\145\72\62\x65\155\73\xd\12\x20\40\x20\x20\40\40\40\x20\x20\40\40\40\x20\40\40\x20\40\x20\x20\x20\40\40\40\40\x20\x20\x20\40\166\145\x72\164\151\x63\141\154\55\x61\x6c\151\x67\156\72\x6d\x69\144\144\154\145\x3b\xd\12\x20\40\x20\x20\40\40\40\40\x20\40\x20\40\40\x20\40\x20\x20\40\x20\40\40\x20\x20\x20\175\xd\xa\x20\40\x20\x20\40\40\x20\40\x20\40\x20\40\x20\40\40\x20\x20\40\x20\40\x20\40\x20\x20\56\x69\163\x61\137\x65\x72\x72\x6f\x72\40\x7b\15\xa\x20\x20\x20\x20\x20\x20\x20\40\40\40\40\x20\40\40\x20\40\x20\x20\x20\40\40\x20\x20\x20\155\141\x72\147\151\x6e\72\40\x31\x30\160\170\40\60\x70\170\73\15\xa\x20\40\x20\40\40\40\x20\40\x20\40\x20\40\40\x20\40\x20\x20\40\40\40\40\40\x20\40\160\x61\x64\x64\151\x6e\x67\72\61\x32\x70\x78\x3b\xd\12\40\x20\40\40\x20\40\40\40\40\40\x20\x20\x20\x20\x20\x20\40\x20\x20\40\40\x20\40\40\40\xd\xa\40\40\x20\40\40\x20\40\40\x20\40\40\40\x20\40\40\40\40\40\x20\x20\x20\40\x20\x20\175\15\xa\x20\x20\x20\40\x20\x20\x20\40\40\40\x20\x20\x20\40\x20\40\x20\x20\40\40\x3c\x2f\x73\164\171\x6c\145\76\15\xa\x20\x20\x20\40\40\40\x20\40\x20\40\40\x20\x3c\146\157\x72\x6d\40\x61\143\164\x69\x6f\156\75\42\x22\40\156\141\x6d\145\75\x22\163\x61\155\x6c\x5f\x72\x65\161\x75\145\163\x74\x5f\x77\x69\x74\150\x5f\x65\x6d\x61\x69\154\x22\40\155\x65\164\x68\x6f\144\75\x22\x70\x6f\163\164\42\x3e\xd\12\40\40\40\40\15\12\40\x20\40\40\40\x20\40\40\x20\40\x20\40\x3c\144\x69\166\40\143\154\141\163\x73\x3d\42\143\x6f\156\164\141\x69\156\145\x72\42\x3e";
        if (!$Mc) {
            goto CQ;
        }
        $sh .= "\x3c\144\x69\166\40\143\154\x61\x73\163\75\x22\x69\x73\x61\x5f\x65\162\162\x6f\162\x22\x3e" . $Mc . "\74\57\144\151\166\76";
        CQ:
        $sh .= "\74\154\141\x62\145\154\40\x66\x6f\162\75\42\165\x6e\141\155\145\x22\76\x3c\x62\76\x55\163\x65\162\x6e\141\x6d\145\74\x2f\142\76\x3c\x2f\154\141\x62\145\x6c\76\15\12\40\40\x20\40\40\x20\x20\40\x20\40\40\40\74\x69\x6e\x70\165\x74\40\x74\171\160\145\75\x22\x74\145\170\x74\x22\x20\160\154\x61\143\145\x68\x6f\154\144\145\x72\75\42\x45\x6e\164\145\162\x20\125\x73\145\x72\156\141\x6d\145\42\40\156\x61\155\145\x3d\x22\x75\x6e\141\155\x65\137\145\x6d\x61\151\x6c\42\40\x72\145\x71\x75\151\162\145\x64\x3e\15\xa\x20\40\x20\x20\x20\40\40\40\40\40\40\40\x3c\x69\x6e\x70\x75\x74\x20\x74\171\160\145\75\x22\x68\151\144\x64\145\156\42\x20\156\141\x6d\145\75\42\x6f\160\164\x69\157\156\x22\x20\x76\x61\154\x75\x65\75\42\163\x61\155\154\x5f\x75\x73\145\162\137\x6c\157\x67\x69\x6e\42\x2f\76\xd\xa\x20\40\40\40\40\40\x20\40\40\40\40\40\x3c\x69\156\x70\165\x74\40\164\x79\x70\x65\x3d\x22\150\151\x64\144\145\x6e\x22\x20\156\x61\155\145\75\x22\x6f\x70\164\x69\x6f\156\156\42\40\x76\141\154\x75\x65\x3d\42\155\x6f\x5f\x73\x61\x6d\154\x5f\162\145\161\165\145\x73\x74\x5f\167\x69\x74\x68\x5f\x65\155\x61\151\154\42\x2f\76\xd\12\40\40\x20\x20\40\x20\x20\x20\40\x20\x20\40\x3c\x69\x6e\160\x75\x74\40\x74\x79\x70\x65\x3d\x22\x68\x69\144\x64\145\156\x22\40\156\141\155\145\75\x22\151\144\160\x22\x20\166\x61\x6c\x75\x65\x3d\42" . $Rs["\151\x64\x70"] . "\42\76\15\12\x20\40\40\x20\x20\40\40\40\40\x20\40\40\x3c\142\x75\164\x74\x6f\x6e\x20\164\x79\160\x65\75\42\x73\x75\142\x6d\x69\164\42\x20\143\154\141\163\163\x3d\42\x62\x75\x74\164\157\156\40\x62\165\164\x74\x6f\x6e\55\x70\x72\151\x6d\141\162\x79\x20\x62\165\x74\x74\x6f\x6e\x2d\x6c\141\x72\x67\145\42\x20\76\114\x6f\x67\151\x6e\74\57\142\165\x74\x74\x6f\x6e\76\xd\12\40\x20\40\40\40\40\x20\x20\40\40\40\x20\74\57\144\x69\x76\x3e\xd\xa\40\x20\40\40\40\x20\x20\x20\x20\40\x20\x20\40\74\x2f\x66\157\162\x6d\76";
        delete_site_option("\x6d\157\137\x73\141\x6d\x6c\x5f\x73\150\x6f\162\164\143\157\x64\145\137\155\x65\163\163\141\147\145");
        return $sh;
        yA:
    }
    function mo_get_saml_idp_list_shortcode()
    {
        $sh = '';
        if (!is_user_logged_in()) {
            goto LH;
        }
        $current_user = wp_get_current_user();
        $ns = maybe_unserialize(get_option("\x73\x61\x6d\x6c\x5f\x69\x64\145\156\x74\151\x74\x79\137\160\x72\157\166\151\144\x65\x72\163"));
        $Pb = get_user_meta($current_user->ID, "\x6d\x6f\137\163\x61\x6d\x6c\x5f\154\x6f\147\x67\145\144\x5f\x69\x6e\x5f\167\x69\x74\150\x5f\151\144\x70", true);
        $kA = $ns[$Pb];
        $nu = "\x48\145\x6c\x6c\157\x2c";
        if (empty($sg["\x63\x75\163\x74\x6f\155\137\x67\x72\145\x65\164\x69\x6e\x67\x5f\x74\x65\170\164"])) {
            goto HW;
        }
        $nu = $sg["\x63\165\163\164\157\155\x5f\x67\x72\145\145\x74\x69\156\x67\x5f\164\x65\170\x74"];
        HW:
        $Ie = '';
        if (empty($sg["\147\x72\x65\x65\164\151\x6e\147\x5f\156\141\155\x65"])) {
            goto wy;
        }
        switch ($sg["\147\x72\145\145\x74\151\156\147\x5f\x6e\x61\155\145"]) {
            case "\125\x53\x45\x52\x4e\x41\x4d\105":
                $Ie = $current_user->user_login;
                goto n7;
            case "\105\x4d\101\x49\x4c":
                $Ie = $current_user->user_email;
                goto n7;
            case "\x46\116\x41\115\x45":
                $Ie = $current_user->user_firstname;
                goto n7;
            case "\x4c\x4e\x41\x4d\105":
                $Ie = $current_user->user_lastname;
                goto n7;
            case "\x46\x4e\101\x4d\105\x5f\114\x4e\101\115\x45":
                $Ie = $current_user->user_firstname . "\x20" . $current_user->user_lastname;
                goto n7;
            case "\114\x4e\x41\115\x45\137\106\x4e\101\115\x45":
                $Ie = $current_user->user_lastname . "\x20" . $current_user->user_firstname;
                goto n7;
            default:
                $Ie = $current_user->user_login;
        }
        Fg:
        n7:
        wy:
        if (!empty(trim($Ie))) {
            goto Gh;
        }
        $Ie = $current_user->user_login;
        Gh:
        $f1 = $nu . "\40" . $Ie;
        $Wu = "\114\x6f\147\157\x75\x74";
        if (empty($sg["\143\x75\163\164\x6f\155\137\x6c\157\x67\157\165\164\x5f\x74\x65\x78\164"])) {
            goto k9;
        }
        $Wu = $sg["\x63\x75\x73\x74\x6f\x6d\x5f\154\157\147\157\165\x74\137\x74\x65\170\x74"];
        k9:
        $sh = $f1 . "\x20\174\x20\x3c\x61\40\150\x72\145\x66\x3d\x22" . wp_logout_url(saml_get_current_page_url()) . "\42\x20\164\x69\x74\x6c\145\x3d\42\154\157\147\x6f\x75\164\42\40\76" . $Wu . "\74\x2f\141\76\74\57\154\151\x3e";
        $Vm = saml_get_current_page_url();
        update_option("\154\157\x67\x6f\x75\164\137\162\x65\144\x69\x72\145\143\164\x5f\x75\162\x6c", $Vm);
        goto XT;
        LH:
        if (mo_saml_is_sp_configured() && mo_saml_is_customer_license_key_verified()) {
            goto F_;
        }
        $sh = "\x50\154\x65\x61\163\x65\x20\x63\x6f\x6e\146\151\147\x75\x72\145\40\164\x68\145\40\155\151\x6e\x69\x4f\x72\x61\156\x67\145\40\123\x41\x4d\114\40\x50\154\165\147\151\156\x20\x66\x69\x72\x73\x74\x2e";
        goto T2;
        F_:
        $tm = urlencode(saml_get_current_page_url());
        $ns = maybe_unserialize(get_option("\163\x61\x6d\154\137\x69\144\x65\x6e\x74\151\x74\x79\137\x70\162\157\x76\151\x64\145\x72\163"));
        $kX = get_option("\x6d\157\137\x73\141\x6d\154\137\163\150\157\x72\164\x63\x6f\x64\145\137\x6c\x6f\x67\151\x6e\137\x74\x65\170\x74");
        if ($kX) {
            goto cq;
        }
        $kX = '';
        cq:
        $sh = $kX . "\x20\40";
        $sh = $sh . "\74\x73\145\x6c\145\143\x74\x20\x6f\156\x63\x68\141\156\147\x65\x3d\x22\162\145\x64\151\162\x65\143\164\124\x6f\111\x44\x50\50\164\x68\151\163\56\x76\141\154\165\145\x29\42\76\xd\12\11\11\11\x9\x9\74\157\160\164\151\x6f\156\40\144\151\x73\141\x62\x6c\145\144\x20\x73\145\154\x65\143\x74\145\144\x3e\x2d\55\x53\145\154\x65\x63\164\40\171\x6f\165\162\40\111\144\x50\55\55\74\57\x6f\x70\x74\x69\157\x6e\76";
        $T1 = '';
        foreach ($ns as $nA => $bc) {
            if (!(isset($bc["\145\x6e\141\x62\x6c\145\x5f\151\x64\160"]) && $bc["\145\156\141\142\154\x65\137\x69\x64\x70"] == false)) {
                goto S5;
            }
            goto G8;
            S5:
            $yB = !empty($bc["\143\165\x73\x74\x6f\x6d\137\x6c\157\x67\151\x6e\x5f\x74\x65\x78\164"]) ? $bc["\143\165\x73\164\157\x6d\137\154\x6f\147\151\x6e\137\164\x65\x78\164"] : $nA;
            $T1 = $T1 . "\74\157\160\x74\151\157\156\x20\166\141\x6c\x75\145\x3d\42" . home_url() . "\57\x3f\x6f\160\164\151\x6f\x6e\75\x73\141\155\x6c\137\165\163\145\x72\137\x6c\157\x67\151\156\46\151\x64\x70\x3d" . $nA . "\46\x72\x65\x64\151\162\145\143\164\x5f\164\157\x3d" . $tm . "\x22\x3e" . $yB . "\x3c\57\157\x70\x74\151\x6f\x6e\76";
            G8:
        }
        aG:
        $sh = $sh . $T1 . "\x3c\57\x73\x65\154\x65\x63\x74\x3e\15\xa\11\x9\11\x9\11\74\163\x63\162\151\x70\164\76\15\12\11\x9\11\11\11\146\165\x6e\143\x74\x69\x6f\x6e\x20\x72\x65\x64\151\x72\x65\143\164\124\x6f\x49\104\120\50\165\162\x6c\x29\x7b\15\12\x9\11\x9\x9\11\x9\154\x6f\x63\x61\x74\x69\157\156\40\75\40\165\162\x6c\73\xd\12\11\x9\11\x9\x9\x7d\15\12\x9\11\x9\x9\x9\x3c\x2f\163\x63\162\151\x70\164\76\xd\12\x9\x9\11\11\x9";
        T2:
        XT:
        return $sh;
    }
    function _handle_upload_metadata()
    {
        if (!(isset($_FILES["\x6d\145\164\x61\x64\141\164\141\x5f\x66\151\x6c\145"]) || isset($_POST["\155\145\x74\141\x64\141\164\141\x5f\x75\x72\154"]))) {
            goto NX;
        }
        if (!empty($_FILES["\x6d\145\164\141\144\x61\x74\141\137\x66\x69\154\145"]["\x74\155\x70\x5f\156\141\155\x65"])) {
            goto xN;
        }
        if (mo_saml_is_extension_installed("\x63\165\162\x6c")) {
            goto Cy;
        }
        update_option("\x6d\157\137\x73\141\x6d\x6c\x5f\155\x65\163\x73\141\147\x65", "\x50\110\120\40\x63\x55\x52\x4c\40\x65\x78\x74\145\x6e\x73\151\x6f\x6e\40\151\163\40\x6e\157\x74\40\x69\x6e\163\164\141\x6c\x6c\x65\x64\x20\157\x72\40\144\151\163\x61\142\154\x65\144\x2e\40\x43\x61\156\x6e\x6f\x74\x20\146\145\x74\x63\x68\x20\155\145\x74\x61\144\141\x74\141\40\x66\x72\x6f\155\40\x55\x52\x4c\x2e");
        $this->mo_saml_show_error_message();
        return;
        Cy:
        $Vm = filter_var(htmlspecialchars($_POST["\155\145\x74\x61\x64\141\164\141\x5f\x75\162\x6c"]), FILTER_SANITIZE_URL);
        $SE = Utilities::mo_saml_wp_remote_call($Vm, array("\x73\163\x6c\166\145\x72\x69\146\171" => false), true, $this);
        if ($SE) {
            goto vj;
        }
        update_option("\x6d\x6f\137\x73\141\x6d\154\x5f\x6d\145\x73\x73\141\147\145", "\120\154\145\141\x73\145\x20\160\x72\x6f\166\151\144\x65\x20\141\x20\166\x61\154\151\x64\x20\155\x65\x74\141\x64\141\x74\x61\40\125\122\x4c\x2e");
        return;
        vj:
        if (!is_null($SE)) {
            goto Jz;
        }
        $d1 = null;
        goto ee;
        Jz:
        $d1 = $SE;
        ee:
        goto Bp;
        xN:
        $d1 = @file_get_contents($_FILES["\155\x65\x74\141\144\141\x74\x61\x5f\x66\151\154\145"]["\164\155\160\x5f\x6e\141\155\x65"]);
        Bp:
        if (isset($_POST["\x73\x79\156\x63\x5f\x6d\145\x74\141\x64\141\164\141"])) {
            goto ny;
        }
        delete_option("\163\141\x6d\x6c\x5f\155\145\x74\x61\x64\141\x74\x61\137\165\162\154\x5f\146\x6f\162\x5f\x73\x79\x6e\143");
        delete_option("\163\x61\x6d\x6c\x5f\155\145\164\141\x64\141\x74\x61\x5f\x75\x72\x6c\137\146\157\x72\137\x73\171\x6e\143\x5f\x6d\165\x6c\164\151\x70\154\x65\x5f\x69\144\160");
        delete_option("\163\x61\155\x6c\x5f\x6d\145\x74\141\144\141\x74\x61\x5f\x73\171\156\x63\137\151\x6e\164\145\162\166\141\x6c");
        wp_unschedule_event(wp_next_scheduled("\155\145\164\141\144\141\x74\141\x5f\163\x79\x6e\143\137\143\162\x6f\156\x5f\x61\x63\x74\x69\x6f\156"), "\x6d\145\x74\x61\144\141\164\141\137\x73\171\x6e\143\x5f\x63\x72\x6f\x6e\x5f\x61\143\164\151\x6f\156");
        goto ey;
        ny:
        $bc = array();
        $bc["\x6d\x65\164\x61\x64\x61\164\x61\x5f\165\162\154"] = $_POST["\x6d\x65\x74\141\144\141\164\141\x5f\165\x72\x6c"];
        $bc["\x73\171\x6e\x63\x5f\151\x6e\164\145\x72\166\x61\154"] = $_POST["\163\171\156\143\137\151\156\164\145\162\166\141\154"];
        if (!(isset($_POST["\163\141\155\154\x5f\151\x64\x65\x6e\164\x69\164\171\137\x6d\x65\164\x61\144\141\x74\x61\x5f\160\x72\157\166\x69\x64\x65\x72"]) && !empty($_POST["\x73\x61\155\x6c\137\151\144\145\156\x74\x69\164\x79\x5f\155\x65\164\141\x64\x61\x74\x61\x5f\160\162\x6f\x76\x69\144\x65\162"]))) {
            goto XR;
        }
        $nA = $_POST["\163\x61\155\x6c\x5f\151\144\x65\156\164\x69\164\171\x5f\x6d\145\164\x61\x64\x61\x74\141\x5f\x70\x72\x6f\x76\151\144\x65\x72"];
        XR:
        $HA = get_option("\163\x61\155\154\137\x6d\145\x74\x61\144\141\164\141\x5f\x75\162\154\x5f\x66\157\162\x5f\163\x79\156\143");
        if (!empty($HA)) {
            goto af;
        }
        $HA = array();
        af:
        $HA[$nA] = $bc;
        update_option("\x73\x61\x6d\x6c\x5f\x6d\145\164\141\144\141\164\x61\x5f\x75\x72\154\x5f\x66\157\162\x5f\163\x79\156\x63", $HA);
        if (wp_next_scheduled("\155\145\164\x61\144\141\164\141\x5f\x73\x79\156\x63\137\x63\x72\157\x6e\137\141\x63\164\151\157\156")) {
            goto Du;
        }
        wp_schedule_event(time(), $_POST["\x73\x79\156\x63\137\x69\156\x74\145\162\x76\x61\x6c"], "\155\x65\164\141\x64\x61\x74\141\137\x73\171\x6e\x63\x5f\x63\162\x6f\156\x5f\x61\143\164\151\x6f\156", array($nA));
        Du:
        ey:
        $this->upload_metadata($d1);
        NX:
    }
    function sync_upload_metadata($d1, $tj)
    {
        $O3 = set_error_handler(array($this, "\x68\141\x6e\144\154\145\130\x6d\154\105\162\162\157\162"));
        $YQ = new DOMDocument();
        $YQ->loadXML($d1);
        restore_error_handler();
        $Fp = $YQ->firstChild;
        $HA = get_option("\x73\141\x6d\154\137\155\145\x74\141\x64\141\164\x61\x5f\x75\162\x6c\137\146\x6f\x72\137\x73\171\156\143");
        if (empty($Fp)) {
            goto TR;
        }
        $cd = new IDPMetadataReader($YQ);
        $ns = $cd->getIdentityProviders();
        $q9 = maybe_unserialize(get_option("\x73\141\155\x6c\x5f\x69\x64\145\x6e\x74\151\164\x79\137\x70\162\157\166\151\x64\x65\162\163"));
        foreach ($ns as $nA => $nh) {
            $A7 = $nh->getSigningCertificate();
            $r3 = maybe_unserialize($A7);
            yp:
        }
        zL:
        if (!($tj === "\43\x23\155\165\x6c\164\x69\x70\154\145\43\x23")) {
            goto xt;
        }
        $this->readMultipleIDPs($ns);
        xt:
        if ($q9 && array_key_exists($tj, $q9)) {
            goto cF;
        }
        unset($HA[$tj]);
        goto jE;
        cF:
        $q9[$tj]["\170\65\60\71\137\x63\145\162\x74\x69\146\151\x63\141\x74\x65"] = $r3;
        update_option("\163\141\x6d\x6c\137\x69\144\145\156\x74\x69\164\x79\137\160\162\x6f\166\x69\144\145\162\163", $q9);
        jE:
        update_option("\x6d\157\137\x73\141\x6d\x6c\137\x6d\145\163\x73\141\x67\145", "\111\x64\145\x6e\x74\151\x74\x79\x20\120\x72\x6f\x76\151\144\x65\162\40\x64\145\x74\x61\151\154\163\40\x72\145\164\x72\x69\x65\166\145\x64\40\x73\165\x63\x63\x65\x73\163\146\165\x6c\154\171\x2e");
        $this->mo_saml_show_success_message();
        TR:
    }
    function upload_metadata($d1)
    {
        $O3 = set_error_handler(array($this, "\150\141\x6e\144\x6c\x65\130\x6d\154\105\162\x72\x6f\x72"));
        $YQ = new DOMDocument();
        $YQ->loadXML($d1);
        restore_error_handler();
        $Fp = $YQ->firstChild;
        if (!empty($Fp)) {
            goto rO;
        }
        if (!empty($_FILES["\155\x65\164\x61\x64\141\164\141\x5f\146\x69\154\x65"]["\164\155\160\137\156\x61\155\x65"])) {
            goto E3;
        }
        if (!empty($_POST["\155\145\x74\141\x64\x61\164\141\137\x75\x72\154"])) {
            goto vd;
        }
        if (!empty($Ub)) {
            goto im;
        }
        update_option("\155\157\x5f\163\141\155\x6c\137\155\x65\163\163\141\x67\x65", "\120\154\x65\141\x73\145\x20\x70\162\157\166\x69\x64\x65\x20\141\40\x76\141\x6c\151\144\40\155\145\164\141\x64\x61\164\x61\x20\146\151\154\x65\x20\x6f\x72\40\x61\40\166\141\x6c\x69\x64\x20\125\x52\114\56");
        $this->mo_saml_show_error_message();
        return;
        goto KJ;
        im:
        update_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\155\x65\163\x73\141\x67\x65", "\x55\x6e\x61\x62\154\x65\40\164\157\x20\x66\x65\164\x63\x68\x20\x4d\x65\x74\x61\144\x61\x74\141\x2e\x20\120\154\145\141\x73\145\40\143\150\145\x63\x6b\40\171\157\165\x72\x20\111\x44\120\x20\143\x6f\x6e\146\x69\147\x75\x72\x61\164\151\x6f\x6e\x20\141\147\141\151\156\x2e");
        $this->mo_saml_show_error_message();
        KJ:
        goto JT;
        vd:
        update_option("\155\x6f\137\163\x61\x6d\x6c\137\155\x65\x73\x73\x61\147\145", "\120\154\x65\x61\163\x65\x20\160\162\x6f\x76\x69\144\145\40\141\40\x76\x61\154\x69\144\40\x6d\145\164\x61\144\x61\164\141\40\x55\x52\x4c\56");
        $this->mo_saml_show_error_message();
        JT:
        goto mb;
        E3:
        update_option("\155\x6f\137\x73\141\x6d\154\137\x6d\145\x73\163\141\x67\145", "\120\x6c\x65\x61\x73\145\x20\160\162\157\x76\151\144\x65\40\x61\x20\x76\x61\x6c\x69\x64\40\155\145\x74\141\144\141\x74\141\x20\146\151\x6c\145\x2e");
        $this->mo_saml_show_error_message();
        mb:
        goto hE;
        rO:
        $cd = new IDPMetadataReader($YQ);
        $ns = $cd->getIdentityProviders();
        if (!empty($ns)) {
            goto Xb;
        }
        if (!empty($Ub)) {
            goto YM;
        }
        if (!(empty($_FILES["\x6d\x65\164\x61\144\141\x74\x61\137\x66\151\154\145"]) && ($T3 = "\x55\x70\x6c\157\141\x64"))) {
            goto SK;
        }
        update_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\x6d\145\x73\x73\141\147\145", "\120\154\145\141\163\145\x20\160\162\157\166\x69\x64\x65\40\141\x20\x76\141\154\x69\x64\40\x6d\x65\164\x61\144\141\x74\x61\40\x66\151\154\x65\x2e");
        $this->mo_saml_show_error_message();
        return;
        SK:
        goto fO;
        YM:
        update_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\x6d\x65\x73\163\x61\x67\x65", "\x55\x6e\x61\142\x6c\x65\x20\164\x6f\40\146\x65\164\143\x68\x20\115\145\x74\x61\x64\141\164\x61\x2e\40\x50\154\145\141\163\x65\40\143\150\x65\x63\x6b\40\171\157\165\162\40\x49\104\x50\40\x63\x6f\156\x66\151\x67\165\162\x61\164\151\x6f\x6e\x20\141\x67\141\x69\x6e\x2e");
        $this->mo_saml_show_error_message();
        return;
        fO:
        Xb:
        $bl = maybe_unserialize(get_option("\x73\141\x6d\x6c\137\151\x64\x65\x6e\164\x69\x74\x79\137\x70\162\157\x76\x69\x64\145\162\x73"));
        foreach ($ns as $nA => $nh) {
            $wO = '';
            $nu = '';
            $AY = '';
            $zn = '';
            $MY = '';
            $v7 = '';
            $Z6 = '';
            $DD = array("\x63\165\x73\x74\157\155\x5f\154\x6f\147\x69\156\137\x74\145\x78\164" => $wO, "\143\x75\x73\x74\x6f\155\x5f\x67\162\145\145\164\x69\156\147\137\164\x65\170\x74" => $nu, "\x67\162\145\145\164\151\x6e\147\137\156\x61\155\x65" => $AY, "\x63\165\x73\164\x6f\155\x5f\x6c\x6f\x67\157\x75\x74\137\164\x65\x78\x74" => $zn);
            $fp = array("\x73\141\155\154\x5f\x72\x65\x71\165\x65\163\164" => $MY, "\163\x61\x6d\x6c\x5f\162\x65\163\x70\x6f\156\x73\145" => $v7, "\164\145\x73\x74\x5f\163\x74\x61\x74\165\163" => $Z6);
            $Gt = $nh->getIdpName();
            if (!empty($Gt)) {
                goto h1;
            }
            if (!empty($tj)) {
                goto DJ;
            }
            $Gt = $_POST["\x73\141\155\154\137\151\x64\x65\156\x74\x69\164\171\x5f\155\x65\164\x61\x64\x61\164\x61\137\x70\x72\157\166\151\x64\145\162"];
            goto uc;
            DJ:
            $Gt = $tj;
            uc:
            h1:
            $Gt = str_replace("\x20", "\137", $Gt);
            $UC = $nh->getLoginBindingType();
            $kl = $nh->getLoginURL(mo_saml_binding_type($UC));
            $FB = $nh->getLogoutBindingType();
            $XB = '';
            if (!$nh->getLogoutDetails()) {
                goto eq;
            }
            $XB = $nh->getLogoutURL(mo_saml_binding_type($FB));
            eq:
            $UG = $nh->getEntityID();
            $A7 = $nh->getSigningCertificate();
            if (!is_array($A7)) {
                goto Xa;
            }
            foreach ($A7 as $nA => $bc) {
                $A7[$nA] = Utilities::sanitize_certificate($bc);
                xP:
            }
            i6:
            Xa:
            $r3 = array("\x69\x64\160\137\156\x61\x6d\145" => $Gt, "\163\x73\x6f\137\142\x69\x6e\144\x69\156\x67\x5f\x74\x79\x70\145" => $UC, "\x73\163\x6f\x5f\165\162\x6c" => $kl, "\163\x6c\157\x5f\x62\x69\x6e\x64\x69\x6e\147\x5f\x74\x79\x70\x65" => $FB, "\x73\154\157\x5f\x75\162\x6c" => $XB, "\151\144\160\137\145\x6e\x74\x69\164\x79\137\151\144" => $UG, "\x6e\x61\155\145\151\144\137\x66\157\x72\155\x61\x74" => "\x31\56\x31\72\x6e\x61\155\145\x69\x64\55\x66\x6f\x72\x6d\x61\164\x3a\165\156\163\x70\145\143\x69\x66\151\145\x64", "\170\65\60\71\137\143\145\162\x74\x69\x66\151\x63\x61\164\145" => $A7, "\x72\145\163\160\x6f\x6e\163\145\137\x73\151\147\156\x65\x64" => "\x63\x68\x65\143\153\145\x64", "\141\163\x73\145\x72\x74\x69\157\156\x5f\x73\151\x67\x6e\145\144" => "\x63\150\x65\x63\x6b\145\144", "\x72\145\x71\x75\145\163\x74\x5f\x73\151\x67\x6e\x65\x64" => "\x75\156\143\x68\145\143\153\145\x64", "\x6d\x6f\x5f\163\x61\x6d\154\x5f\145\x6e\x63\157\144\x69\x6e\147\137\x65\x6e\x61\142\154\x65\x64" => "\143\150\145\x63\x6b\145\144", "\x65\x6e\141\142\154\x65\x5f\x69\144\x70" => true);
            $r3 = array_merge($r3, $DD);
            $r3 = array_merge($r3, $fp);
            $eB = maybe_unserialize(get_option("\x73\x61\155\x6c\x5f\151\x64\145\156\164\x69\164\x79\x5f\x70\x72\x6f\x76\151\x64\145\x72\x73"));
            if ($eB) {
                goto x_;
            }
            $eB = array();
            x_:
            if (!array_key_exists($Gt, $eB)) {
                goto tv;
            }
            $r3 = array_merge($eB[$Gt], $r3);
            tv:
            $eB[$Gt] = $r3;
            update_option("\x73\141\x6d\154\x5f\151\x64\x65\x6e\x74\151\164\171\x5f\160\162\x6f\166\x69\144\145\x72\163", $eB);
            E_:
        }
        tt:
        $eB = maybe_unserialize(get_option("\163\141\x6d\x6c\x5f\151\x64\145\x6e\164\151\x74\x79\137\160\162\x6f\x76\x69\144\x65\x72\x73"));
        update_option("\155\x6f\x5f\x73\141\x6d\154\x5f\155\x65\163\163\141\x67\145", "\111\x64\x65\x6e\164\x69\164\171\x20\120\162\x6f\x76\151\144\x65\x72\x20\x64\x65\x74\141\151\154\163\x20\162\x65\164\162\151\145\166\145\144\x20\163\x75\x63\x63\145\163\x73\x66\x75\154\154\171\x2e");
        $this->mo_saml_show_success_message();
        hE:
    }
    function handleXmlError($h3, $OW, $Qk, $RO)
    {
        if ($h3 == E_WARNING && substr_count($OW, "\x44\x4f\115\x44\x6f\143\165\x6d\x65\x6e\x74\x3a\x3a\154\157\x61\x64\130\x4d\114\x28\51") > 0) {
            goto oI;
        }
        return false;
        goto pE;
        oI:
        return;
        pE:
    }
    function checkPasswordPattern($ID)
    {
        $Ms = "\x2f\136\x5b\x28\x5c\167\51\52\x28\134\41\134\x40\134\x23\x5c\x24\134\x25\134\x5e\134\x26\x5c\x2a\134\56\x5c\x2d\134\x5f\51\52\135\53\x24\57";
        return !preg_match($Ms, $ID);
    }
    function mo_saml_parse_expiry_date($xx)
    {
        $aG = new DateTime($xx);
        $sP = $aG->getTimestamp();
        return date("\x46\x20\x6a\54\40\131", $sP);
    }
    function is_license_expired($hu)
    {
        $aG = new DateTime($hu);
        $AI = new DateTime();
        if ($AI > $aG) {
            goto W6;
        }
        return false;
        goto IR;
        W6:
        return true;
        IR:
    }
}
function mo_saml_binding_type($GJ)
{
    if ($GJ == "\x48\164\x74\160\x52\145\x64\151\162\x65\x63\x74") {
        goto KM;
    }
    return "\x48\124\124\x50\55\120\117\x53\124";
    goto br;
    KM:
    return "\x48\124\x54\x50\x2d\122\x65\144\x69\x72\x65\x63\x74";
    br:
}
new Mo_SAML_Plugin();
