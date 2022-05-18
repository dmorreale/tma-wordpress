<?php


class CertificateUtility
{
    public static function generate_certificate($SY, $oV, $Gl)
    {
        $pj = openssl_pkey_new();
        $zs = openssl_csr_new($SY, $pj, $oV);
        $X9 = openssl_csr_sign($zs, null, $pj, $Gl, $oV, time());
        openssl_csr_export($zs, $SJ);
        openssl_x509_export($X9, $rE);
        openssl_pkey_export($pj, $pl);
        SGE:
        if (!(($GP = openssl_error_string()) !== false)) {
            goto Yjl;
        }
        error_log("\103\145\162\x74\151\x66\151\x63\x61\164\x65\x55\x74\151\x6c\x69\164\171\72\40\x45\x72\x72\x6f\162\x20\x67\145\156\145\x72\x61\164\x69\x6e\147\40\x63\145\x72\x74\151\146\151\143\141\x74\x65\x2e\x20" . $GP);
        goto SGE;
        Yjl:
        $KC = array("\x70\x75\142\x6c\x69\x63\137\x6b\145\x79" => $rE, "\x70\162\151\x76\x61\164\145\x5f\x6b\x65\171" => $pl);
        return $KC;
    }
}
