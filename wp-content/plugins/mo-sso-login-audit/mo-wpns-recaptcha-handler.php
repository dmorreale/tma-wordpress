<?php


class Mo_LLA_Recaptcha_Handler
{
    function verify()
    {
        $Ga = false;
        if (!isset($_POST["\147\x2d\x72\145\x63\141\x70\164\143\x68\x61\55\162\x65\163\160\x6f\156\x73\x65"])) {
            goto Zz;
        }
        $kj = Mo_LLA_Util::get_client_ip();
        $OP = "\150\164\x74\160\x73\72\x2f\57\167\167\x77\x2e\x67\157\157\x67\154\145\x2e\143\157\x6d\57\162\x65\x63\141\160\164\143\150\141\x2f\x61\160\x69\x2f\x73\151\164\x65\x76\x65\162\151\146\x79";
        $rh = array("\x72\145\163\160\157\x6e\163\145" => urlencode($_POST["\147\55\x72\145\143\x61\x70\164\x63\x68\141\x2d\x72\145\163\160\157\x6e\163\x65"]), "\x73\145\x63\162\x65\x74" => get_option("\155\157\x5f\167\160\156\x73\137\162\145\x63\x61\x70\164\143\150\141\x5f\x73\x65\x63\x72\x65\x74\x5f\153\145\x79"), "\x72\x65\155\157\164\145\x69\160" => $kj);
        $F1 = '';
        foreach ($rh as $ce => $it) {
            $F1 .= $ce . "\75" . $it . "\x26";
            Y5:
        }
        xx:
        rtrim($F1, "\x26");
        $NA = curl_init();
        curl_setopt($NA, CURLOPT_URL, $OP);
        curl_setopt($NA, CURLOPT_POST, count($rh));
        curl_setopt($NA, CURLOPT_POSTFIELDS, $F1);
        curl_setopt($NA, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($NA, CURLOPT_RETURNTRANSFER, true);
        $co = curl_exec($NA);
        curl_close($NA);
        if (empty($co)) {
            goto LT;
        }
        $DN = json_decode($co, true);
        if (!(isset($DN["\163\165\x63\143\145\163\x73"]) && $DN["\163\x75\143\143\x65\x73\163"] == 1)) {
            goto PI;
        }
        $Ga = true;
        PI:
        LT:
        Zz:
        return $Ga;
    }
    function test_configuration()
    {
        if (!isset($_POST["\x67\x2d\x72\145\x63\x61\x70\x74\143\150\x61\55\162\145\163\x70\157\156\x73\145"])) {
            goto ni;
        }
        $kj = Mo_LLA_Util::get_client_ip();
        $OP = "\x68\x74\x74\160\x73\x3a\x2f\57\167\167\167\x2e\147\x6f\157\x67\x6c\x65\x2e\143\157\x6d\57\162\x65\x63\141\160\164\143\x68\x61\x2f\141\160\151\57\x73\151\164\x65\166\x65\162\151\146\x79";
        $rh = array("\162\145\163\160\x6f\156\x73\145" => urlencode($_POST["\x67\x2d\162\145\x63\x61\x70\x74\x63\150\x61\55\162\145\x73\x70\157\156\x73\145"]), "\x73\145\143\162\x65\x74" => get_option("\155\157\137\167\x70\x6e\x73\137\162\145\143\x61\x70\x74\143\150\141\137\x73\x65\143\162\x65\x74\x5f\x6b\145\x79"), "\162\145\155\157\x74\x65\151\160" => $kj);
        $F1 = '';
        foreach ($rh as $ce => $it) {
            $F1 .= $ce . "\75" . $it . "\46";
            cK:
        }
        cI:
        rtrim($F1, "\x26");
        $NA = curl_init();
        curl_setopt($NA, CURLOPT_URL, $OP);
        curl_setopt($NA, CURLOPT_POST, count($rh));
        curl_setopt($NA, CURLOPT_POSTFIELDS, $F1);
        curl_setopt($NA, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($NA, CURLOPT_RETURNTRANSFER, true);
        $co = curl_exec($NA);
        curl_close($NA);
        if (empty($co)) {
            goto ar;
        }
        $DN = json_decode($co, true);
        if (isset($DN["\145\162\162\157\162\55\x63\157\144\145\x73"]) && in_array("\x69\x6e\166\x61\154\151\144\55\151\156\x70\x75\164\x2d\163\145\x63\x72\145\164", $DN["\x65\162\x72\157\162\55\x63\157\x64\x65\163"])) {
            goto Vx;
        }
        if (isset($DN["\x73\x75\x63\x63\x65\163\x73"]) && $DN["\163\x75\143\x63\145\163\163"] == 1) {
            goto ia;
        }
        echo "\74\x62\x72\76\x3c\x62\162\76\x3c\x68\62\x20\x73\164\171\x6c\x65\75\143\157\x6c\157\162\x3a\162\145\x64\73\x74\145\170\164\55\x61\x6c\151\147\x6e\x3a\143\145\156\x74\145\162\x3e\111\x6e\166\x61\154\x69\144\40\143\x61\x70\164\x63\x68\x61\x2e\40\120\x6c\x65\x61\x73\145\x20\x74\162\171\40\141\147\x61\x69\x6e\56\74\57\x68\x32\x3e";
        goto nj;
        ia:
        echo "\74\142\162\x3e\74\x62\162\76\x3c\x68\62\40\x73\x74\x79\154\x65\75\143\x6f\x6c\157\x72\x3a\147\x72\x65\145\156\73\164\145\x78\164\55\x61\x6c\x69\x67\156\72\x63\x65\156\164\x65\162\76\124\x65\163\164\40\167\141\x73\40\x73\x75\x63\x63\145\163\x73\x66\165\154\40\141\x6e\144\40\143\x61\160\164\x63\150\x61\x20\x76\x65\162\151\146\151\x65\144\x2e\74\57\150\x32\76";
        nj:
        goto Pl;
        Vx:
        echo "\74\142\x72\76\x3c\142\162\76\x3c\150\x32\x20\x73\164\x79\154\x65\75\x63\157\x6c\x6f\x72\72\x72\145\x64\73\x74\145\x78\x74\55\141\154\x69\147\x6e\72\143\x65\156\164\145\x72\76\111\x6e\166\x61\x6c\x69\144\40\x53\x65\x63\x72\145\x74\40\113\145\171\56\x3c\57\150\62\x3e";
        Pl:
        ar:
        ni:
        ?>
			<script src='https://www.google.com/recaptcha/api.js'></script>
			<div style="margin:0px auto;width:350px">
				<br><br><h2>Test google reCAPTCHA keys</h2>
				<form method="post">
					<div class="g-recaptcha" data-sitekey="<?php 
        echo get_option("\155\157\137\167\x70\156\163\137\162\145\x63\x61\x70\164\x63\150\141\137\163\x69\164\x65\137\x6b\145\171");
        ?>
"></div>
					<br><input type="submit" value="Test Keys" class="button button-primary button-large">
				</form>
			</div>
			<?php 
        die;
    }
}
