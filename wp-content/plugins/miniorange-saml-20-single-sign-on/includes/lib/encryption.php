<?php


class AESEncryption
{
    public static function encrypt_data($lE, $nA)
    {
        $nA = openssl_digest($nA, "\x73\x68\x61\62\65\66");
        $L_ = "\141\x65\163\55\x31\62\70\x2d\145\143\x62";
        $an = openssl_encrypt($lE, $L_, $nA, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING);
        return base64_encode($an);
    }
    public static function decrypt_data($lE, $nA)
    {
        $n0 = base64_decode($lE);
        $nA = openssl_digest($nA, "\x73\150\141\x32\65\66");
        $L_ = "\101\x45\123\x2d\61\x32\x38\x2d\x45\x43\102";
        $mL = openssl_cipher_iv_length($L_);
        $pI = substr($n0, 0, $mL);
        $lE = substr($n0, $mL);
        $xd = openssl_decrypt($lE, $L_, $nA, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $pI);
        return $xd;
    }
}
?>
