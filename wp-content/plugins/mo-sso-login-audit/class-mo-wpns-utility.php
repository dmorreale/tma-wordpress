<?php


class Mo_LLA_Util
{
    public static function is_customer_registered()
    {
        $cc = get_option("\155\157\x5f\x77\x70\156\163\137\x61\x64\x6d\x69\156\x5f\145\155\141\151\x6c");
        $Na = get_option("\x6d\157\x5f\167\x70\x6e\163\137\141\144\x6d\151\156\x5f\143\x75\x73\164\157\155\x65\162\x5f\153\x65\x79");
        if (!$cc || !$Na || !is_numeric(trim($Na))) {
            goto oQ;
        }
        return 1;
        goto ah;
        oQ:
        return 0;
        ah:
    }
    public static function check_empty_or_null($it)
    {
        if (!(!isset($it) || empty($it))) {
            goto rG;
        }
        return true;
        rG:
        return false;
    }
    public static function is_curl_installed()
    {
        if (in_array("\x63\x75\x72\154", get_loaded_extensions())) {
            goto M0;
        }
        return 0;
        goto F5;
        M0:
        return 1;
        F5:
    }
    public static function is_extension_installed($Wt)
    {
        if (in_array($Wt, get_loaded_extensions())) {
            goto P1;
        }
        return false;
        goto HN;
        P1:
        return true;
        HN:
    }
    public static function get_client_ip()
    {
        if (!empty($_SERVER["\110\x54\124\x50\x5f\103\x4c\x49\105\x4e\124\x5f\111\x50"])) {
            goto ZC;
        }
        if (!empty($_SERVER["\110\x54\124\x50\137\x58\137\106\117\x52\x57\x41\122\104\x45\x44\x5f\106\117\122"])) {
            goto Fl;
        }
        return $_SERVER["\x52\105\115\117\124\105\137\x41\104\104\122"];
        goto Qu;
        ZC:
        return $_SERVER["\x48\124\124\120\137\103\114\111\x45\116\x54\137\111\120"];
        goto Qu;
        Fl:
        return $_SERVER["\x48\x54\124\x50\x5f\x58\x5f\106\117\122\127\101\122\104\105\x44\137\x46\x4f\122"];
        Qu:
        return '';
    }
}
?>
