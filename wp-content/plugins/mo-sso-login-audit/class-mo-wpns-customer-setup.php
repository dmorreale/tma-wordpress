<?php


class Mo_LLA_Customer
{
    public $email;
    public $phone;
    public $customerKey;
    public $transactionId;
    private $defaultCustomerKey = "\61\66\x35\x35\65";
    private $defaultApiKey = "\146\106\144\62\x58\143\166\124\107\104\x65\x6d\132\x76\x62\x77\x31\x62\x63\125\145\163\x4e\112\127\105\x71\x4b\142\x62\125\x71";
    function create_customer()
    {
        if (Mo_LLA_Util::is_curl_installed()) {
            goto gp;
        }
        return json_encode(array("\x73\164\x61\x74\x75\163\x43\x6f\x64\145" => "\x45\122\122\x4f\122", "\163\x74\x61\x74\165\x73\x4d\x65\163\x73\141\147\145" => $tq . "\56\x20\120\154\145\141\x73\x65\x20\143\x68\x65\x63\153\x20\x79\157\x75\x72\40\x63\157\156\x66\151\x67\165\x72\141\x74\151\157\156\x2e\40\101\x6c\163\157\40\x63\x68\145\x63\x6b\x20\x74\162\x6f\x75\142\x6c\x65\x73\x68\x6f\157\x74\x69\x6e\147\40\x73\145\x63\x74\x69\157\x6e\56"));
        gp:
        $OP = get_option("\155\x6f\x5f\x77\160\x6e\x73\x5f\150\x6f\163\x74\x5f\156\141\x6d\145") . "\57\x6d\x6f\x61\163\57\x72\145\163\164\57\x63\x75\x73\164\157\155\x65\162\x2f\141\144\x64";
        $NA = curl_init($OP);
        global $current_user;
        get_currentuserinfo();
        $this->email = get_option("\x6d\x6f\137\x77\x70\x6e\x73\x5f\x61\x64\x6d\151\x6e\x5f\x65\x6d\x61\151\154");
        $this->phone = get_option("\x6d\x6f\x5f\x77\160\x6e\163\x5f\141\x64\155\151\156\x5f\x70\x68\x6f\x6e\x65");
        $tY = get_option("\155\x6f\x5f\x77\160\x6e\x73\x5f\160\141\163\163\x77\x6f\x72\x64");
        $rh = array("\x63\x6f\155\160\141\x6e\171\116\141\x6d\x65" => $_SERVER["\x53\x45\x52\126\x45\122\x5f\x4e\101\115\x45"], "\x61\x72\x65\141\117\146\x49\156\x74\x65\162\145\163\164" => "\x57\x50\40\x4c\151\155\x69\164\x20\x4c\157\147\151\x6e\x20\101\164\x74\x65\x6d\160\164\163", "\x66\151\162\163\164\156\141\155\145" => $current_user->user_firstname, "\x6c\141\163\x74\x6e\x61\155\x65" => $current_user->user_lastname, "\x65\155\x61\x69\154" => $this->email, "\x70\150\x6f\x6e\145" => $this->phone, "\160\x61\163\x73\167\157\x72\144" => $tY);
        $f9 = json_encode($rh);
        curl_setopt($NA, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($NA, CURLOPT_ENCODING, '');
        curl_setopt($NA, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($NA, CURLOPT_AUTOREFERER, true);
        curl_setopt($NA, CURLOPT_MAXREDIRS, 10);
        curl_setopt($NA, CURLOPT_HTTPHEADER, array("\103\x6f\x6e\164\145\x6e\x74\55\124\x79\160\145\72\40\x61\160\x70\x6c\x69\x63\x61\x74\151\x6f\x6e\x2f\x6a\163\x6f\156", "\143\150\141\162\163\145\164\72\x20\x55\124\x46\40\x2d\40\x38", "\x41\x75\164\150\157\162\x69\172\141\164\x69\x6f\156\72\x20\x42\x61\163\x69\143"));
        curl_setopt($NA, CURLOPT_POST, true);
        curl_setopt($NA, CURLOPT_POSTFIELDS, $f9);
        $DN = curl_exec($NA);
        if (!curl_errno($NA)) {
            goto l3;
        }
        echo "\122\x65\161\165\x65\x73\x74\x20\105\162\162\x6f\x72\72" . curl_error($NA);
        die;
        l3:
        curl_close($NA);
        return $DN;
    }
    function get_customer_key()
    {
        if (Mo_LLA_Util::is_curl_installed()) {
            goto OK;
        }
        return json_encode(array("\141\160\151\113\145\x79" => "\x43\x55\122\x4c\x5f\x45\122\122\117\x52", "\164\x6f\153\x65\x6e" => "\74\141\x20\x68\162\145\146\x3d\x22\150\164\164\x70\x3a\57\57\160\x68\160\x2e\x6e\x65\x74\x2f\x6d\141\x6e\165\141\154\x2f\145\156\57\143\165\x72\x6c\x2e\151\x6e\x73\x74\141\x6c\154\141\164\x69\157\x6e\x2e\160\x68\x70\42\x3e\120\110\120\x20\x63\125\x52\x4c\40\145\170\x74\x65\x6e\x73\151\157\x6e\74\x2f\141\76\40\151\x73\x20\156\157\x74\x20\x69\x6e\163\164\x61\x6c\x6c\145\x64\40\157\x72\x20\144\x69\x73\141\142\x6c\x65\x64\56"));
        OK:
        $OP = get_option("\x6d\x6f\137\167\x70\x6e\x73\x5f\x68\x6f\x73\x74\x5f\x6e\141\155\145") . "\x2f\x6d\x6f\141\163\x2f\x72\145\x73\x74\57\x63\x75\x73\x74\x6f\x6d\145\162\x2f\153\x65\x79";
        $NA = curl_init($OP);
        $cc = get_option("\155\157\137\x77\x70\156\163\137\141\144\155\x69\156\137\x65\x6d\x61\x69\154");
        $tY = get_option("\155\x6f\x5f\x77\x70\x6e\x73\x5f\x70\141\163\x73\167\157\x72\144");
        $rh = array("\145\155\141\x69\154" => $cc, "\x70\141\163\x73\x77\x6f\162\x64" => $tY);
        $f9 = json_encode($rh);
        curl_setopt($NA, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($NA, CURLOPT_ENCODING, '');
        curl_setopt($NA, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($NA, CURLOPT_AUTOREFERER, true);
        curl_setopt($NA, CURLOPT_MAXREDIRS, 10);
        curl_setopt($NA, CURLOPT_HTTPHEADER, array("\x43\157\156\x74\145\x6e\164\x2d\x54\x79\160\145\72\x20\x61\160\x70\x6c\151\143\141\164\151\157\156\57\152\163\x6f\x6e", "\x63\150\141\162\x73\x65\164\x3a\x20\125\x54\x46\40\x2d\40\70", "\x41\165\x74\150\157\162\x69\172\x61\164\x69\157\156\72\40\102\x61\x73\151\143"));
        curl_setopt($NA, CURLOPT_POST, true);
        curl_setopt($NA, CURLOPT_POSTFIELDS, $f9);
        $DN = curl_exec($NA);
        if (!curl_errno($NA)) {
            goto mF;
        }
        echo "\x52\x65\x71\165\x65\x73\164\40\x45\x72\162\157\162\x3a" . curl_error($NA);
        die;
        mF:
        curl_close($NA);
        return $DN;
    }
    function submit_contact_us($q7, $rY, $MJ)
    {
        if (Mo_LLA_Util::is_curl_installed()) {
            goto Iy;
        }
        return json_encode(array("\163\164\141\164\165\163" => "\x43\x55\x52\x4c\x5f\105\x52\x52\117\x52", "\x73\x74\141\x74\x75\163\115\145\x73\163\141\x67\x65" => "\x3c\141\x20\x68\x72\x65\x66\75\42\150\164\x74\x70\x3a\x2f\57\x70\150\160\56\x6e\145\x74\57\x6d\141\x6e\x75\141\154\x2f\x65\156\x2f\143\165\x72\x6c\x2e\151\156\163\x74\x61\x6c\154\x61\x74\x69\x6f\x6e\56\x70\150\x70\x22\76\120\110\x50\x20\143\125\x52\x4c\x20\x65\x78\164\145\x6e\x73\151\x6f\156\74\57\141\x3e\x20\151\x73\x20\156\x6f\x74\x20\151\156\163\x74\x61\x6c\x6c\x65\x64\40\x6f\162\40\144\151\x73\x61\142\x6c\x65\144\56"));
        Iy:
        $OP = get_option("\x6d\157\x5f\167\160\156\163\x5f\x68\x6f\163\164\x5f\156\x61\155\145") . "\57\155\x6f\141\x73\x2f\x72\x65\163\x74\x2f\x63\x75\163\164\157\155\145\x72\57\x63\x6f\156\164\x61\143\x74\x2d\165\163";
        $NA = curl_init($OP);
        global $current_user;
        get_currentuserinfo();
        $MJ = "\133\127\x50\40\114\151\x6d\x69\164\x20\x4c\x6f\147\x69\x6e\40\x41\164\164\145\155\160\164\163\x5d\x3a\x20" . $MJ;
        $rh = array("\146\151\162\163\164\x4e\141\155\x65" => $current_user->user_firstname, "\x6c\x61\163\x74\116\x61\x6d\145" => $current_user->user_lastname, "\x63\157\155\x70\141\156\171" => $_SERVER["\123\105\122\126\x45\x52\x5f\116\101\115\105"], "\145\x6d\141\x69\154" => $q7, "\x70\x68\157\156\145" => $rY, "\161\x75\x65\x72\x79" => $MJ);
        $f9 = json_encode($rh);
        curl_setopt($NA, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($NA, CURLOPT_ENCODING, '');
        curl_setopt($NA, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($NA, CURLOPT_AUTOREFERER, true);
        curl_setopt($NA, CURLOPT_MAXREDIRS, 10);
        curl_setopt($NA, CURLOPT_HTTPHEADER, array("\103\157\156\x74\145\x6e\x74\55\x54\x79\x70\145\x3a\x20\141\x70\160\154\x69\x63\141\164\x69\157\x6e\57\x6a\163\x6f\156", "\143\x68\141\162\x73\x65\x74\x3a\40\x55\124\106\55\x38", "\x41\165\x74\x68\x6f\x72\151\x7a\141\x74\151\x6f\x6e\x3a\40\x42\141\163\x69\143"));
        curl_setopt($NA, CURLOPT_POST, true);
        curl_setopt($NA, CURLOPT_POSTFIELDS, $f9);
        $DN = curl_exec($NA);
        if (!curl_errno($NA)) {
            goto cL;
        }
        echo "\122\x65\x71\x75\145\163\164\40\x45\162\162\x6f\x72\72" . curl_error($NA);
        return false;
        cL:
        curl_close($NA);
        return true;
    }
    function send_otp_token($Fh, $Aw)
    {
        if (Mo_LLA_Util::is_curl_installed()) {
            goto TB;
        }
        return json_encode(array("\163\164\141\x74\x75\x73" => "\103\125\x52\114\137\105\122\122\x4f\x52", "\163\x74\x61\164\x75\x73\115\145\x73\163\x61\x67\145" => "\74\141\x20\x68\x72\x65\x66\x3d\42\150\x74\x74\160\x3a\57\x2f\x70\x68\160\56\x6e\145\164\57\155\141\156\x75\x61\154\x2f\145\156\57\x63\x75\x72\x6c\x2e\151\x6e\x73\x74\x61\x6c\x6c\141\164\x69\157\x6e\56\160\150\x70\42\x3e\x50\110\120\x20\x63\125\x52\x4c\40\x65\x78\x74\x65\x6e\x73\x69\157\x6e\x3c\x2f\x61\76\40\151\x73\x20\156\157\164\x20\x69\156\x73\x74\141\x6c\154\x65\x64\40\x6f\162\x20\x64\151\x73\x61\x62\154\x65\x64\56"));
        TB:
        $OP = get_option("\155\157\137\x77\x70\156\x73\x5f\x68\x6f\x73\164\x5f\x6e\x61\155\x65") . "\57\155\157\141\x73\57\x61\160\x69\x2f\x61\x75\x74\x68\57\x63\150\x61\154\x6c\145\x6e\x67\145";
        $NA = curl_init($OP);
        $Na = $this->defaultCustomerKey;
        $GU = $this->defaultApiKey;
        $XL = get_option("\x6d\x6f\x5f\167\x70\x6e\163\x5f\141\x64\x6d\151\x6e\x5f\x65\x6d\x61\151\x6c");
        $hc = round(microtime(true) * 1000);
        $JG = $Na . number_format($hc, 0, '', '') . $GU;
        $c5 = hash("\x73\x68\x61\x35\61\x32", $JG);
        $Mn = "\103\x75\x73\164\157\x6d\x65\x72\55\113\145\171\x3a\x20" . $Na;
        $rg = "\124\x69\x6d\145\163\164\141\x6d\x70\72\40" . number_format($hc, 0, '', '');
        $XM = "\101\165\x74\x68\x6f\162\x69\172\x61\x74\151\x6f\x6e\72\40" . $c5;
        $rh = array("\x63\165\163\x74\x6f\155\x65\162\113\x65\171" => $this->defaultCustomerKey, "\x65\155\141\x69\154" => $XL, "\x70\150\157\156\145" => $Aw, "\141\x75\x74\x68\124\171\x70\x65" => $Fh, "\x74\x72\141\156\163\x61\x63\x74\x69\157\x6e\x4e\x61\x6d\x65" => "\127\120\40\114\151\x6d\x69\x74\x20\114\x6f\147\x69\156\40\101\164\164\145\155\160\164\163");
        $f9 = json_encode($rh);
        curl_setopt($NA, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($NA, CURLOPT_ENCODING, '');
        curl_setopt($NA, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($NA, CURLOPT_AUTOREFERER, true);
        curl_setopt($NA, CURLOPT_MAXREDIRS, 10);
        curl_setopt($NA, CURLOPT_HTTPHEADER, array("\103\x6f\x6e\164\x65\156\164\x2d\124\171\x70\x65\72\x20\x61\x70\x70\154\x69\143\x61\x74\151\x6f\x6e\57\x6a\163\x6f\156", $Mn, $rg, $XM));
        curl_setopt($NA, CURLOPT_POST, true);
        curl_setopt($NA, CURLOPT_POSTFIELDS, $f9);
        $DN = curl_exec($NA);
        if (!curl_errno($NA)) {
            goto Gs;
        }
        echo "\x52\x65\x71\x75\145\163\x74\x20\105\162\162\x6f\162\72" . curl_error($NA);
        die;
        Gs:
        curl_close($NA);
        return $DN;
    }
    function validate_otp_token($gf, $zq)
    {
        if (Mo_LLA_Util::is_curl_installed()) {
            goto eS;
        }
        return json_encode(array("\x73\164\x61\164\165\163" => "\x43\125\x52\114\137\x45\x52\x52\117\122", "\163\x74\141\x74\165\163\x4d\x65\x73\x73\x61\x67\x65" => "\74\x61\40\150\162\145\146\75\x22\x68\164\164\x70\72\57\x2f\x70\150\x70\x2e\156\145\x74\57\x6d\x61\156\165\x61\x6c\57\145\156\57\143\x75\162\x6c\56\x69\156\x73\x74\141\x6c\154\141\x74\x69\x6f\x6e\x2e\x70\x68\160\x22\x3e\120\x48\x50\40\x63\x55\122\x4c\x20\145\x78\x74\x65\x6e\x73\x69\x6f\156\x3c\x2f\x61\x3e\40\151\x73\40\x6e\157\164\40\x69\x6e\x73\x74\x61\x6c\154\145\x64\x20\x6f\162\40\144\151\x73\141\142\x6c\145\144\x2e"));
        eS:
        $OP = get_option("\155\157\x5f\167\160\x6e\x73\x5f\150\157\163\164\x5f\x6e\141\x6d\x65") . "\57\155\157\x61\163\x2f\x61\x70\151\57\x61\x75\164\x68\x2f\166\x61\154\x69\x64\x61\x74\145";
        $NA = curl_init($OP);
        $Na = $this->defaultCustomerKey;
        $GU = $this->defaultApiKey;
        $XL = get_option("\155\157\137\167\x70\156\163\137\141\144\x6d\151\156\137\x65\155\141\151\x6c");
        $hc = round(microtime(true) * 1000);
        $JG = $Na . number_format($hc, 0, '', '') . $GU;
        $c5 = hash("\x73\x68\141\65\61\62", $JG);
        $Mn = "\x43\165\x73\164\157\x6d\145\162\x2d\113\145\x79\72\x20" . $Na;
        $rg = "\124\x69\155\145\x73\164\x61\x6d\x70\72\40" . number_format($hc, 0, '', '');
        $XM = "\101\x75\x74\150\x6f\x72\151\172\141\164\151\157\156\72\40" . $c5;
        $rh = '';
        $rh = array("\164\170\x49\x64" => $gf, "\164\x6f\x6b\x65\156" => $zq);
        $f9 = json_encode($rh);
        curl_setopt($NA, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($NA, CURLOPT_ENCODING, '');
        curl_setopt($NA, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($NA, CURLOPT_AUTOREFERER, true);
        curl_setopt($NA, CURLOPT_MAXREDIRS, 10);
        curl_setopt($NA, CURLOPT_HTTPHEADER, array("\103\x6f\x6e\164\x65\156\x74\x2d\124\171\x70\x65\72\40\141\160\x70\x6c\151\143\141\x74\151\157\x6e\57\152\163\x6f\156", $Mn, $rg, $XM));
        curl_setopt($NA, CURLOPT_POST, true);
        curl_setopt($NA, CURLOPT_POSTFIELDS, $f9);
        $DN = curl_exec($NA);
        if (!curl_errno($NA)) {
            goto Kl;
        }
        echo "\x52\x65\x71\x75\145\x73\164\40\105\162\162\x6f\x72\x3a" . curl_error($NA);
        die;
        Kl:
        curl_close($NA);
        return $DN;
    }
    function check_customer()
    {
        if (Mo_LLA_Util::is_curl_installed()) {
            goto I0;
        }
        return json_encode(array("\x73\x74\x61\164\x75\163" => "\103\x55\122\x4c\x5f\x45\122\x52\117\122", "\x73\164\x61\164\x75\x73\115\145\163\x73\141\x67\145" => "\74\x61\x20\x68\x72\145\x66\x3d\42\150\164\164\160\x3a\57\x2f\x70\x68\x70\x2e\156\x65\164\57\155\x61\156\165\x61\x6c\57\145\156\x2f\x63\165\162\154\56\151\x6e\x73\x74\x61\154\x6c\141\164\151\x6f\x6e\x2e\160\150\160\42\76\120\x48\120\x20\143\125\x52\114\x20\145\x78\164\x65\156\x73\151\157\156\x3c\57\x61\76\x20\x69\x73\x20\x6e\x6f\164\40\151\x6e\163\x74\x61\154\x6c\x65\144\40\157\x72\40\144\x69\163\x61\x62\154\145\144\56"));
        I0:
        $OP = get_option("\155\157\x5f\167\x70\156\x73\x5f\x68\x6f\x73\164\137\x6e\x61\x6d\145") . "\57\x6d\x6f\x61\163\57\162\x65\x73\164\x2f\143\165\x73\x74\x6f\x6d\x65\162\x2f\143\x68\x65\x63\153\x2d\x69\x66\x2d\145\170\x69\x73\x74\x73";
        $NA = curl_init($OP);
        $cc = get_option("\155\x6f\137\x77\x70\156\163\137\x61\x64\x6d\151\156\x5f\x65\x6d\141\x69\154");
        $rh = array("\x65\155\141\151\154" => $cc);
        $f9 = json_encode($rh);
        curl_setopt($NA, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($NA, CURLOPT_ENCODING, '');
        curl_setopt($NA, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($NA, CURLOPT_AUTOREFERER, true);
        curl_setopt($NA, CURLOPT_MAXREDIRS, 10);
        curl_setopt($NA, CURLOPT_HTTPHEADER, array("\x43\157\156\x74\x65\156\x74\55\124\x79\x70\x65\72\40\141\160\x70\x6c\151\143\141\x74\151\157\x6e\57\152\x73\157\x6e", "\143\x68\141\162\163\x65\164\72\x20\x55\x54\106\x20\55\x20\70", "\x41\x75\x74\x68\157\x72\151\172\141\164\x69\x6f\x6e\x3a\x20\x42\141\x73\151\x63"));
        curl_setopt($NA, CURLOPT_POST, true);
        curl_setopt($NA, CURLOPT_POSTFIELDS, $f9);
        $DN = curl_exec($NA);
        if (!curl_errno($NA)) {
            goto su;
        }
        echo "\122\x65\161\x75\145\163\x74\x20\105\162\x72\x6f\x72\x3a" . curl_error($NA);
        die;
        su:
        curl_close($NA);
        return $DN;
    }
    function mo_wpns_forgot_password($cc)
    {
        $OP = get_option("\155\x6f\x5f\x77\160\x6e\163\x5f\150\157\x73\164\x5f\156\x61\x6d\145") . "\x2f\155\x6f\x61\x73\x2f\162\x65\163\164\57\x63\165\x73\x74\x6f\x6d\145\162\x2f\160\141\163\x73\x77\x6f\162\x64\x2d\162\x65\163\x65\164";
        $NA = curl_init($OP);
        $Na = get_option("\x6d\157\x5f\167\x70\156\x73\137\x61\144\155\151\x6e\x5f\143\165\163\x74\x6f\155\145\162\x5f\153\x65\171");
        $GU = get_option("\x6d\x6f\x5f\x77\160\156\x73\x5f\x61\x64\155\151\x6e\x5f\141\x70\x69\137\153\x65\171");
        $hc = round(microtime(true) * 1000);
        $JG = $Na . number_format($hc, 0, '', '') . $GU;
        $c5 = hash("\x73\x68\x61\65\61\x32", $JG);
        $Mn = "\x43\x75\163\x74\x6f\155\145\x72\55\x4b\x65\x79\x3a\40" . $Na;
        $rg = "\x54\151\x6d\145\163\x74\x61\x6d\160\x3a\40" . number_format($hc, 0, '', '');
        $XM = "\101\165\x74\150\157\162\151\172\x61\x74\x69\x6f\156\72\x20" . $c5;
        $rh = '';
        $rh = array("\145\155\141\151\154" => $cc);
        $f9 = json_encode($rh);
        curl_setopt($NA, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($NA, CURLOPT_ENCODING, '');
        curl_setopt($NA, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($NA, CURLOPT_AUTOREFERER, true);
        curl_setopt($NA, CURLOPT_MAXREDIRS, 10);
        curl_setopt($NA, CURLOPT_HTTPHEADER, array("\103\x6f\x6e\x74\145\x6e\164\55\124\x79\x70\145\72\40\x61\x70\160\x6c\x69\143\141\164\151\x6f\156\x2f\x6a\163\157\x6e", $Mn, $rg, $XM));
        curl_setopt($NA, CURLOPT_POST, true);
        curl_setopt($NA, CURLOPT_POSTFIELDS, $f9);
        curl_setopt($NA, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($NA, CURLOPT_TIMEOUT, 20);
        $DN = curl_exec($NA);
        if (!curl_errno($NA)) {
            goto hR;
        }
        echo "\x52\145\x71\x75\x65\x73\x74\x20\105\x72\x72\x6f\162\72" . curl_error($NA);
        die;
        hR:
        curl_close($NA);
        return $DN;
    }
}
?>
