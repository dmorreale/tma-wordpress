<?php


namespace RobRichards\XMLSecLibs;

use DOMElement;
use Exception;
class XMLSecurityKey
{
    const TRIPLEDES_CBC = "\150\164\164\x70\x3a\57\57\x77\167\167\56\167\63\x2e\157\x72\x67\57\62\x30\x30\61\x2f\60\64\57\170\x6d\x6c\x65\156\x63\x23\x74\162\x69\x70\154\145\x64\145\163\x2d\x63\x62\x63";
    const AES128_CBC = "\x68\x74\x74\x70\x3a\57\x2f\167\167\167\x2e\167\63\56\157\162\147\57\x32\60\x30\61\x2f\60\64\x2f\x78\155\x6c\145\156\143\43\x61\145\163\61\x32\x38\x2d\143\x62\143";
    const AES192_CBC = "\150\x74\164\160\x3a\x2f\x2f\167\x77\167\56\167\63\56\157\x72\x67\x2f\62\x30\60\x31\57\60\64\57\170\155\154\x65\x6e\x63\x23\x61\x65\163\61\x39\62\55\143\142\143";
    const AES256_CBC = "\150\164\164\160\x3a\x2f\57\x77\x77\x77\56\167\63\56\157\x72\x67\x2f\62\x30\x30\61\57\60\x34\x2f\x78\155\x6c\145\156\x63\43\141\x65\x73\62\x35\x36\x2d\143\142\143";
    const RSA_1_5 = "\150\x74\164\x70\72\x2f\57\167\167\167\x2e\167\x33\56\x6f\x72\x67\x2f\62\60\60\61\x2f\x30\64\x2f\170\155\154\145\156\143\43\162\163\141\55\x31\137\x35";
    const RSA_OAEP_MGF1P = "\150\164\x74\x70\72\57\57\167\x77\x77\56\167\x33\x2e\x6f\x72\x67\57\x32\x30\60\61\57\60\x34\x2f\x78\x6d\x6c\x65\156\x63\x23\162\163\141\x2d\157\x61\145\160\55\x6d\x67\146\61\x70";
    const DSA_SHA1 = "\150\164\x74\160\x3a\57\57\167\x77\x77\56\x77\x33\56\x6f\162\x67\57\62\x30\x30\60\x2f\x30\x39\57\x78\x6d\x6c\144\x73\x69\x67\43\144\163\x61\x2d\163\x68\x61\x31";
    const RSA_SHA1 = "\150\164\x74\x70\72\x2f\57\167\x77\167\x2e\167\63\56\x6f\162\x67\57\x32\x30\x30\60\x2f\x30\x39\57\x78\155\x6c\144\x73\151\x67\x23\162\163\x61\x2d\163\x68\141\x31";
    const RSA_SHA256 = "\x68\x74\x74\x70\72\x2f\57\167\167\x77\x2e\x77\63\56\x6f\x72\x67\57\62\x30\60\x31\57\60\64\x2f\x78\155\154\x64\x73\x69\147\x2d\155\157\x72\145\43\162\x73\141\x2d\163\x68\141\x32\65\x36";
    const RSA_SHA384 = "\x68\x74\164\160\x3a\x2f\x2f\x77\167\167\x2e\167\63\56\157\x72\147\x2f\62\60\x30\x31\57\x30\x34\x2f\x78\155\x6c\144\163\151\147\x2d\x6d\x6f\x72\145\x23\x72\163\x61\x2d\x73\x68\141\63\x38\x34";
    const RSA_SHA512 = "\150\x74\164\160\72\x2f\x2f\167\167\x77\56\167\x33\x2e\157\162\x67\57\62\x30\60\x31\57\x30\64\x2f\x78\155\x6c\x64\x73\x69\147\55\x6d\157\x72\x65\43\x72\x73\141\55\163\x68\141\65\61\62";
    const HMAC_SHA1 = "\150\x74\x74\160\x3a\57\57\167\x77\167\56\167\63\x2e\157\162\x67\x2f\x32\60\x30\x30\x2f\60\71\x2f\x78\x6d\154\x64\x73\151\147\43\150\x6d\x61\x63\55\163\150\141\x31";
    private $cryptParams = array();
    public $type = 0;
    public $key = null;
    public $passphrase = '';
    public $iv = null;
    public $name = null;
    public $keyChain = null;
    public $isEncrypted = false;
    public $encryptedCtx = null;
    public $guid = null;
    private $x509Certificate = null;
    private $X509Thumbprint = null;
    public function __construct($Cq, $Tj = null)
    {
        switch ($Cq) {
            case self::TRIPLEDES_CBC:
                $this->cryptParams["\x6c\151\x62\162\x61\x72\171"] = "\157\160\145\x6e\163\163\154";
                $this->cryptParams["\x63\151\x70\x68\x65\162"] = "\x64\x65\x73\x2d\145\x64\x65\63\55\143\x62\143";
                $this->cryptParams["\x74\x79\160\145"] = "\x73\x79\155\155\145\x74\x72\151\x63";
                $this->cryptParams["\x6d\x65\x74\x68\x6f\144"] = "\x68\164\164\160\72\x2f\x2f\167\167\x77\56\167\x33\x2e\157\x72\x67\x2f\62\60\x30\x31\x2f\x30\64\57\x78\x6d\x6c\145\156\x63\x23\x74\x72\151\160\x6c\x65\x64\145\163\55\x63\142\143";
                $this->cryptParams["\x6b\x65\x79\163\151\172\x65"] = 24;
                $this->cryptParams["\x62\154\x6f\x63\x6b\x73\x69\x7a\145"] = 8;
                goto GCy;
            case self::AES128_CBC:
                $this->cryptParams["\154\x69\x62\x72\141\162\171"] = "\x6f\x70\x65\156\x73\x73\154";
                $this->cryptParams["\143\151\x70\x68\x65\x72"] = "\141\x65\163\55\x31\x32\x38\55\x63\x62\x63";
                $this->cryptParams["\x74\171\160\145"] = "\x73\171\x6d\x6d\145\164\x72\151\x63";
                $this->cryptParams["\x6d\145\x74\150\x6f\x64"] = "\x68\164\164\160\x3a\57\x2f\167\x77\x77\x2e\x77\63\56\157\162\x67\x2f\x32\x30\60\x31\x2f\x30\x34\x2f\x78\x6d\154\145\156\x63\x23\x61\x65\x73\x31\x32\x38\x2d\x63\142\x63";
                $this->cryptParams["\x6b\145\171\x73\x69\x7a\145"] = 16;
                $this->cryptParams["\142\154\x6f\x63\153\163\151\x7a\145"] = 16;
                goto GCy;
            case self::AES192_CBC:
                $this->cryptParams["\x6c\151\142\162\141\162\x79"] = "\x6f\x70\x65\x6e\x73\163\154";
                $this->cryptParams["\143\x69\x70\150\x65\x72"] = "\141\145\x73\x2d\x31\x39\x32\x2d\143\142\143";
                $this->cryptParams["\x74\171\160\145"] = "\x73\171\155\x6d\145\x74\162\x69\143";
                $this->cryptParams["\155\145\x74\150\157\x64"] = "\150\164\164\160\72\57\57\x77\167\167\56\167\63\x2e\x6f\162\147\57\62\60\60\61\57\x30\64\57\170\155\154\x65\x6e\143\43\x61\x65\163\61\71\62\55\x63\142\x63";
                $this->cryptParams["\153\x65\171\163\x69\x7a\145"] = 24;
                $this->cryptParams["\142\154\157\143\153\163\x69\172\x65"] = 16;
                goto GCy;
            case self::AES256_CBC:
                $this->cryptParams["\154\151\142\x72\x61\162\x79"] = "\x6f\x70\145\156\163\x73\x6c";
                $this->cryptParams["\143\151\x70\150\145\x72"] = "\141\145\163\55\x32\x35\x36\x2d\143\x62\143";
                $this->cryptParams["\164\x79\x70\145"] = "\163\171\x6d\x6d\145\x74\162\151\x63";
                $this->cryptParams["\x6d\145\164\150\x6f\144"] = "\150\164\x74\x70\72\x2f\57\x77\167\x77\56\167\x33\56\157\x72\x67\57\x32\x30\x30\61\x2f\x30\x34\x2f\170\x6d\154\145\156\143\43\141\x65\163\62\65\66\55\x63\x62\143";
                $this->cryptParams["\x6b\x65\171\163\151\172\x65"] = 32;
                $this->cryptParams["\142\154\x6f\x63\153\x73\x69\172\x65"] = 16;
                goto GCy;
            case self::RSA_1_5:
                $this->cryptParams["\154\151\x62\x72\x61\162\x79"] = "\157\x70\145\156\x73\163\x6c";
                $this->cryptParams["\x70\141\x64\x64\x69\156\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x6d\x65\164\x68\x6f\x64"] = "\150\x74\x74\160\x3a\x2f\57\x77\x77\x77\x2e\167\x33\x2e\157\x72\147\57\x32\60\60\61\x2f\x30\x34\57\170\155\x6c\145\156\143\43\x72\x73\141\x2d\61\x5f\x35";
                if (!(is_array($Tj) && !empty($Tj["\x74\171\x70\145"]))) {
                    goto fAS;
                }
                if (!($Tj["\164\171\x70\x65"] == "\x70\165\x62\154\x69\143" || $Tj["\x74\171\x70\x65"] == "\x70\x72\151\x76\x61\x74\145")) {
                    goto J2b;
                }
                $this->cryptParams["\164\x79\160\145"] = $Tj["\x74\x79\160\145"];
                goto GCy;
                J2b:
                fAS:
                throw new Exception("\x43\x65\x72\x74\151\146\x69\143\x61\164\x65\40\42\x74\x79\x70\x65\42\40\50\x70\x72\x69\x76\x61\x74\x65\x2f\x70\165\142\154\151\143\x29\x20\x6d\x75\163\164\40\x62\x65\40\160\x61\163\163\x65\144\40\166\x69\141\40\x70\141\x72\x61\x6d\145\x74\x65\x72\163");
            case self::RSA_OAEP_MGF1P:
                $this->cryptParams["\154\151\142\x72\x61\162\171"] = "\x6f\x70\145\x6e\163\163\x6c";
                $this->cryptParams["\x70\141\144\x64\x69\156\147"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\x6d\x65\x74\150\157\x64"] = "\150\x74\164\x70\72\57\57\167\167\x77\x2e\x77\x33\56\x6f\162\x67\57\x32\60\x30\61\x2f\x30\x34\57\x78\155\x6c\x65\156\x63\x23\x72\x73\141\x2d\157\x61\x65\160\x2d\x6d\147\x66\x31\160";
                $this->cryptParams["\150\141\x73\150"] = null;
                if (!(is_array($Tj) && !empty($Tj["\164\171\x70\x65"]))) {
                    goto uP1;
                }
                if (!($Tj["\164\171\x70\x65"] == "\x70\x75\x62\x6c\151\x63" || $Tj["\164\171\160\145"] == "\x70\x72\x69\x76\141\164\x65")) {
                    goto XOn;
                }
                $this->cryptParams["\164\171\160\145"] = $Tj["\x74\171\160\x65"];
                goto GCy;
                XOn:
                uP1:
                throw new Exception("\x43\x65\x72\164\151\x66\151\143\x61\x74\145\x20\42\164\171\x70\x65\x22\40\50\x70\x72\151\x76\141\x74\145\57\160\165\x62\154\x69\x63\51\40\x6d\165\163\x74\40\x62\x65\40\x70\x61\x73\163\x65\144\40\x76\151\141\x20\160\x61\162\141\155\145\x74\x65\x72\x73");
            case self::RSA_SHA1:
                $this->cryptParams["\154\x69\x62\162\x61\162\x79"] = "\157\x70\x65\156\163\163\154";
                $this->cryptParams["\155\145\x74\x68\157\144"] = "\150\164\x74\x70\72\57\57\x77\x77\x77\56\x77\63\56\x6f\x72\x67\57\62\60\60\x30\57\60\71\x2f\170\x6d\154\144\x73\151\147\43\162\x73\141\55\x73\150\x61\61";
                $this->cryptParams["\x70\141\x64\144\x69\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                if (!(is_array($Tj) && !empty($Tj["\164\171\160\x65"]))) {
                    goto YFe;
                }
                if (!($Tj["\x74\x79\160\145"] == "\x70\x75\x62\154\151\143" || $Tj["\164\171\x70\145"] == "\160\162\151\x76\141\164\145")) {
                    goto sTk;
                }
                $this->cryptParams["\164\171\160\x65"] = $Tj["\164\171\x70\x65"];
                goto GCy;
                sTk:
                YFe:
                throw new Exception("\103\145\x72\x74\x69\146\x69\143\141\164\x65\x20\x22\x74\x79\x70\x65\42\40\x28\160\162\x69\166\x61\164\145\x2f\160\x75\x62\154\x69\x63\51\40\155\165\x73\164\x20\x62\x65\x20\160\x61\163\x73\145\x64\x20\166\151\141\x20\160\141\x72\141\155\145\164\145\x72\x73");
            case self::RSA_SHA256:
                $this->cryptParams["\154\151\142\162\x61\162\x79"] = "\x6f\160\145\x6e\x73\163\x6c";
                $this->cryptParams["\155\145\164\x68\157\x64"] = "\x68\x74\x74\160\72\x2f\x2f\167\x77\167\56\167\63\56\157\162\147\x2f\62\x30\x30\x31\x2f\60\64\x2f\x78\155\154\x64\163\x69\147\x2d\x6d\x6f\162\145\x23\x72\163\x61\55\x73\150\x61\x32\x35\66";
                $this->cryptParams["\160\141\144\144\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\151\x67\x65\163\164"] = "\123\x48\101\x32\x35\x36";
                if (!(is_array($Tj) && !empty($Tj["\164\171\160\145"]))) {
                    goto Npe;
                }
                if (!($Tj["\x74\171\160\145"] == "\x70\x75\x62\x6c\151\143" || $Tj["\x74\171\160\145"] == "\x70\162\x69\166\141\164\x65")) {
                    goto h9c;
                }
                $this->cryptParams["\x74\x79\160\145"] = $Tj["\x74\x79\x70\x65"];
                goto GCy;
                h9c:
                Npe:
                throw new Exception("\103\x65\x72\164\151\146\x69\143\141\164\x65\40\42\164\171\160\x65\42\40\50\x70\162\151\x76\141\164\145\x2f\x70\165\x62\x6c\x69\143\51\x20\155\x75\x73\x74\x20\142\x65\40\160\x61\x73\x73\145\x64\40\x76\151\141\x20\160\x61\x72\141\155\x65\164\x65\162\163");
            case self::RSA_SHA384:
                $this->cryptParams["\x6c\151\142\162\141\162\171"] = "\157\x70\145\x6e\163\163\154";
                $this->cryptParams["\x6d\145\164\x68\x6f\x64"] = "\x68\164\x74\x70\72\57\57\x77\x77\x77\x2e\x77\63\x2e\x6f\x72\x67\x2f\x32\x30\x30\x31\x2f\60\x34\57\170\155\154\144\163\x69\147\x2d\x6d\x6f\162\145\43\x72\163\x61\x2d\163\150\x61\x33\x38\x34";
                $this->cryptParams["\x70\141\144\x64\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\151\147\x65\163\x74"] = "\x53\110\101\63\70\64";
                if (!(is_array($Tj) && !empty($Tj["\x74\x79\160\145"]))) {
                    goto ZtE;
                }
                if (!($Tj["\164\x79\x70\x65"] == "\160\165\142\x6c\x69\x63" || $Tj["\164\x79\160\145"] == "\160\x72\151\x76\141\164\x65")) {
                    goto YxC;
                }
                $this->cryptParams["\x74\171\x70\145"] = $Tj["\x74\x79\160\145"];
                goto GCy;
                YxC:
                ZtE:
                throw new Exception("\103\x65\x72\164\x69\x66\x69\x63\141\x74\x65\x20\x22\164\171\160\x65\42\40\50\160\162\x69\166\141\x74\x65\x2f\160\x75\x62\154\151\x63\51\40\x6d\x75\x73\164\40\x62\x65\x20\x70\141\x73\163\x65\x64\40\x76\x69\141\40\x70\x61\x72\x61\x6d\x65\164\145\162\163");
            case self::RSA_SHA512:
                $this->cryptParams["\x6c\151\142\162\141\x72\x79"] = "\x6f\160\x65\156\163\x73\x6c";
                $this->cryptParams["\x6d\145\164\x68\x6f\144"] = "\150\164\164\x70\x3a\x2f\57\x77\x77\x77\56\x77\63\56\x6f\162\x67\x2f\x32\x30\x30\x31\57\60\64\57\170\155\x6c\144\x73\x69\147\x2d\x6d\157\162\x65\x23\x72\x73\x61\x2d\163\150\x61\65\x31\62";
                $this->cryptParams["\160\141\x64\144\151\156\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\151\x67\145\163\x74"] = "\x53\x48\101\65\x31\62";
                if (!(is_array($Tj) && !empty($Tj["\x74\171\x70\x65"]))) {
                    goto rK6;
                }
                if (!($Tj["\164\171\x70\145"] == "\160\165\142\154\151\x63" || $Tj["\164\x79\x70\x65"] == "\160\x72\x69\x76\141\x74\145")) {
                    goto KmJ;
                }
                $this->cryptParams["\x74\x79\160\x65"] = $Tj["\x74\171\x70\145"];
                goto GCy;
                KmJ:
                rK6:
                throw new Exception("\103\145\162\x74\151\146\x69\143\141\x74\x65\x20\x22\x74\x79\x70\x65\x22\x20\x28\x70\162\151\166\141\x74\x65\x2f\160\165\142\x6c\x69\x63\51\40\155\165\x73\x74\40\x62\145\x20\x70\x61\x73\x73\145\x64\40\x76\151\141\x20\x70\141\162\x61\155\x65\x74\x65\x72\x73");
            case self::HMAC_SHA1:
                $this->cryptParams["\154\x69\142\x72\x61\x72\x79"] = $Cq;
                $this->cryptParams["\155\x65\x74\x68\x6f\144"] = "\150\164\164\x70\72\x2f\57\x77\x77\167\x2e\167\63\56\157\x72\147\57\62\60\60\60\x2f\x30\x39\57\x78\x6d\x6c\x64\x73\x69\x67\x23\x68\155\x61\x63\55\163\x68\x61\61";
                goto GCy;
            default:
                throw new Exception("\x49\156\x76\x61\154\151\x64\x20\113\x65\171\x20\x54\171\160\145");
        }
        ADZ:
        GCy:
        $this->type = $Cq;
    }
    public function getSymmetricKeySize()
    {
        if (isset($this->cryptParams["\x6b\145\171\163\x69\x7a\145"])) {
            goto vuJ;
        }
        return null;
        vuJ:
        return $this->cryptParams["\x6b\145\x79\x73\151\x7a\145"];
    }
    public function generateSessionKey()
    {
        if (isset($this->cryptParams["\x6b\145\171\163\x69\x7a\145"])) {
            goto kgp;
        }
        throw new Exception("\x55\x6e\153\x6e\157\167\156\40\x6b\x65\171\40\163\x69\172\145\x20\x66\x6f\x72\40\x74\171\160\145\x20\x22" . $this->type . "\x22\x2e");
        kgp:
        $fM = $this->cryptParams["\x6b\145\171\x73\x69\172\x65"];
        $nA = openssl_random_pseudo_bytes($fM);
        if (!($this->type === self::TRIPLEDES_CBC)) {
            goto ADn;
        }
        $Ba = 0;
        DmD:
        if (!($Ba < strlen($nA))) {
            goto DDq;
        }
        $Ej = ord($nA[$Ba]) & 254;
        $Ko = 1;
        $AK = 1;
        gXu:
        if (!($AK < 8)) {
            goto QnP;
        }
        $Ko ^= $Ej >> $AK & 1;
        HZF:
        $AK++;
        goto gXu;
        QnP:
        $Ej |= $Ko;
        $nA[$Ba] = chr($Ej);
        hV9:
        $Ba++;
        goto DmD;
        DDq:
        ADn:
        $this->key = $nA;
        return $nA;
    }
    public static function getRawThumbprint($CH)
    {
        $RG = explode("\xa", $CH);
        $lE = '';
        $E9 = false;
        foreach ($RG as $Oh) {
            if (!$E9) {
                goto IEQ;
            }
            if (!(strncmp($Oh, "\x2d\x2d\55\x2d\55\x45\x4e\104\40\103\x45\x52\124\111\106\x49\x43\x41\x54\x45", 20) == 0)) {
                goto z68;
            }
            goto yjr;
            z68:
            $lE .= trim($Oh);
            goto oaL;
            IEQ:
            if (!(strncmp($Oh, "\x2d\x2d\x2d\x2d\55\x42\x45\107\111\116\40\x43\x45\x52\124\x49\x46\x49\x43\101\x54\105", 22) == 0)) {
                goto tHa;
            }
            $E9 = true;
            tHa:
            oaL:
            Wdj:
        }
        yjr:
        if (empty($lE)) {
            goto M5H;
        }
        return strtolower(sha1(base64_decode($lE)));
        M5H:
        return null;
    }
    public function loadKey($nA, $w6 = false, $fv = false)
    {
        if ($w6) {
            goto xY5;
        }
        $this->key = $nA;
        goto I0k;
        xY5:
        $this->key = file_get_contents($nA);
        I0k:
        if ($fv) {
            goto Esh;
        }
        $this->x509Certificate = null;
        goto a1_;
        Esh:
        $this->key = openssl_x509_read($this->key);
        openssl_x509_export($this->key, $Nq);
        $this->x509Certificate = $Nq;
        $this->key = $Nq;
        a1_:
        if (!($this->cryptParams["\x6c\151\142\162\141\162\171"] == "\157\160\x65\x6e\x73\x73\154")) {
            goto CzK;
        }
        switch ($this->cryptParams["\x74\171\160\145"]) {
            case "\x70\165\142\x6c\x69\143":
                if (!$fv) {
                    goto OOn;
                }
                $this->X509Thumbprint = self::getRawThumbprint($this->key);
                OOn:
                $this->key = openssl_get_publickey($this->key);
                if ($this->key) {
                    goto XAi;
                }
                throw new Exception("\x55\x6e\141\x62\154\145\x20\164\157\x20\145\170\x74\162\x61\x63\x74\40\160\165\142\x6c\151\x63\40\153\145\x79");
                XAi:
                goto NPd;
            case "\160\162\x69\166\141\164\145":
                $this->key = openssl_get_privatekey($this->key, $this->passphrase);
                goto NPd;
            case "\x73\x79\155\155\x65\164\162\151\143":
                if (!(strlen($this->key) < $this->cryptParams["\153\145\171\x73\x69\x7a\145"])) {
                    goto otO;
                }
                throw new Exception("\113\145\171\x20\x6d\165\x73\164\40\143\x6f\x6e\x74\x61\x69\156\x20\x61\164\40\x6c\x65\x61\163\x74\x20\x32\x35\x20\x63\x68\141\x72\141\x63\164\x65\x72\x73\40\146\x6f\x72\40\x74\150\151\163\x20\143\151\x70\150\145\162");
                otO:
                goto NPd;
            default:
                throw new Exception("\125\156\153\156\157\x77\156\x20\164\171\160\x65");
        }
        XwT:
        NPd:
        CzK:
    }
    private function padISO10126($lE, $i5)
    {
        if (!($i5 > 256)) {
            goto kOV;
        }
        throw new Exception("\x42\154\157\x63\153\x20\x73\151\172\145\x20\150\x69\147\150\145\162\x20\x74\x68\x61\x6e\x20\x32\65\66\40\156\157\x74\40\x61\x6c\154\157\x77\145\x64");
        kOV:
        $TQ = $i5 - strlen($lE) % $i5;
        $Ms = chr($TQ);
        return $lE . str_repeat($Ms, $TQ);
    }
    private function unpadISO10126($lE)
    {
        $TQ = substr($lE, -1);
        $Kt = ord($TQ);
        return substr($lE, 0, -$Kt);
    }
    private function encryptSymmetric($lE)
    {
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cryptParams["\x63\x69\160\x68\x65\162"]));
        $lE = $this->padISO10126($lE, $this->cryptParams["\x62\154\x6f\143\x6b\163\151\x7a\x65"]);
        $Hy = openssl_encrypt($lE, $this->cryptParams["\x63\151\x70\x68\145\162"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        if (!(false === $Hy)) {
            goto Klf;
        }
        throw new Exception("\x46\141\151\x6c\165\x72\145\40\x65\156\x63\x72\x79\160\164\x69\x6e\x67\x20\104\141\164\141\40\x28\x6f\x70\145\x6e\x73\x73\x6c\40\x73\x79\155\x6d\x65\164\x72\151\143\51\40\x2d\40" . openssl_error_string());
        Klf:
        return $this->iv . $Hy;
    }
    private function decryptSymmetric($lE)
    {
        $PH = openssl_cipher_iv_length($this->cryptParams["\143\151\160\150\x65\162"]);
        $this->iv = substr($lE, 0, $PH);
        $lE = substr($lE, $PH);
        $xo = openssl_decrypt($lE, $this->cryptParams["\143\151\x70\x68\x65\162"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        if (!(false === $xo)) {
            goto emR;
        }
        throw new Exception("\x46\x61\151\x6c\x75\162\145\x20\x64\x65\143\x72\171\x70\x74\151\x6e\147\x20\x44\141\164\x61\40\x28\x6f\x70\145\x6e\x73\x73\x6c\40\163\x79\x6d\155\145\x74\162\x69\x63\51\40\x2d\40" . openssl_error_string());
        emR:
        return $this->unpadISO10126($xo);
    }
    private function encryptPublic($lE)
    {
        if (openssl_public_encrypt($lE, $Hy, $this->key, $this->cryptParams["\x70\x61\x64\144\x69\156\147"])) {
            goto e6T;
        }
        throw new Exception("\x46\141\x69\154\165\162\x65\40\145\156\143\x72\171\160\x74\151\156\x67\x20\x44\x61\x74\x61\x20\x28\157\x70\x65\x6e\x73\x73\154\40\160\165\x62\154\151\143\51\40\x2d\x20" . openssl_error_string());
        e6T:
        return $Hy;
    }
    private function decryptPublic($lE)
    {
        if (openssl_public_decrypt($lE, $xo, $this->key, $this->cryptParams["\x70\x61\144\144\x69\156\x67"])) {
            goto Afv;
        }
        throw new Exception("\106\141\151\154\165\162\145\40\x64\145\143\x72\171\160\164\151\156\x67\x20\x44\x61\164\141\40\x28\x6f\160\145\156\163\x73\x6c\x20\160\x75\142\x6c\151\143\51\x20\x2d\x20" . openssl_error_string());
        Afv:
        return $xo;
    }
    private function encryptPrivate($lE)
    {
        if (openssl_private_encrypt($lE, $Hy, $this->key, $this->cryptParams["\x70\x61\x64\144\151\156\147"])) {
            goto jmr;
        }
        throw new Exception("\106\141\x69\154\165\162\145\x20\145\x6e\x63\162\x79\160\164\x69\x6e\147\40\104\141\x74\141\x20\x28\x6f\x70\x65\x6e\x73\x73\154\x20\x70\x72\x69\x76\x61\164\x65\51\40\x2d\x20" . openssl_error_string());
        jmr:
        return $Hy;
    }
    private function decryptPrivate($lE)
    {
        if (openssl_private_decrypt($lE, $xo, $this->key, $this->cryptParams["\x70\141\x64\144\151\x6e\147"])) {
            goto u0s;
        }
        throw new Exception("\x46\x61\x69\x6c\165\x72\145\40\144\x65\143\162\171\160\x74\x69\x6e\x67\40\104\141\x74\x61\x20\50\157\160\145\x6e\x73\x73\154\40\x70\162\x69\166\x61\x74\x65\x29\40\x2d\40" . openssl_error_string());
        u0s:
        return $xo;
    }
    private function signOpenSSL($lE)
    {
        $Eo = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\x69\147\x65\x73\164"])) {
            goto Mcy;
        }
        $Eo = $this->cryptParams["\144\151\x67\x65\163\x74"];
        Mcy:
        if (openssl_sign($lE, $mv, $this->key, $Eo)) {
            goto VTm;
        }
        throw new Exception("\x46\141\151\154\x75\162\x65\x20\x53\x69\147\156\x69\156\x67\40\x44\141\x74\141\72\x20" . openssl_error_string() . "\x20\x2d\40" . $Eo);
        VTm:
        return $mv;
    }
    private function verifyOpenSSL($lE, $mv)
    {
        $Eo = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\x69\x67\145\x73\164"])) {
            goto lDC;
        }
        $Eo = $this->cryptParams["\x64\151\x67\145\163\x74"];
        lDC:
        return openssl_verify($lE, $mv, $this->key, $Eo);
    }
    public function encryptData($lE)
    {
        if (!($this->cryptParams["\154\151\142\162\x61\162\x79"] === "\157\160\x65\x6e\163\x73\154")) {
            goto iwq;
        }
        switch ($this->cryptParams["\x74\171\x70\145"]) {
            case "\163\171\155\155\x65\x74\162\x69\x63":
                return $this->encryptSymmetric($lE);
            case "\x70\165\142\154\151\x63":
                return $this->encryptPublic($lE);
            case "\x70\x72\x69\166\x61\x74\x65":
                return $this->encryptPrivate($lE);
        }
        PIf:
        MqT:
        iwq:
    }
    public function decryptData($lE)
    {
        if (!($this->cryptParams["\x6c\x69\142\162\141\162\171"] === "\x6f\160\145\x6e\x73\163\x6c")) {
            goto Yz3;
        }
        switch ($this->cryptParams["\164\171\160\145"]) {
            case "\x73\x79\155\155\x65\x74\x72\151\x63":
                return $this->decryptSymmetric($lE);
            case "\160\x75\x62\x6c\x69\x63":
                return $this->decryptPublic($lE);
            case "\x70\x72\x69\166\x61\164\x65":
                return $this->decryptPrivate($lE);
        }
        AcO:
        pJ7:
        Yz3:
    }
    public function signData($lE)
    {
        switch ($this->cryptParams["\154\x69\142\162\141\162\171"]) {
            case "\157\160\145\156\x73\163\x6c":
                return $this->signOpenSSL($lE);
            case self::HMAC_SHA1:
                return hash_hmac("\163\150\x61\61", $lE, $this->key, true);
        }
        CVs:
        Q3g:
    }
    public function verifySignature($lE, $mv)
    {
        switch ($this->cryptParams["\x6c\x69\x62\162\141\x72\x79"]) {
            case "\157\160\145\x6e\163\x73\154":
                return $this->verifyOpenSSL($lE, $mv);
            case self::HMAC_SHA1:
                $ra = hash_hmac("\x73\150\141\x31", $lE, $this->key, true);
                return strcmp($mv, $ra) == 0;
        }
        rLn:
        u1d:
    }
    public function getAlgorith()
    {
        return $this->getAlgorithm();
    }
    public function getAlgorithm()
    {
        return $this->cryptParams["\x6d\x65\164\150\157\x64"];
    }
    public static function makeAsnSegment($Cq, $Ss)
    {
        switch ($Cq) {
            case 2:
                if (!(ord($Ss) > 127)) {
                    goto Ec2;
                }
                $Ss = chr(0) . $Ss;
                Ec2:
                goto Ze2;
            case 3:
                $Ss = chr(0) . $Ss;
                goto Ze2;
        }
        JpK:
        Ze2:
        $jl = strlen($Ss);
        if ($jl < 128) {
            goto Y1u;
        }
        if ($jl < 256) {
            goto m12;
        }
        if ($jl < 65536) {
            goto njy;
        }
        $Uk = null;
        goto XnF;
        njy:
        $Uk = sprintf("\x25\x63\x25\143\45\x63\45\x63\x25\x73", $Cq, 130, $jl / 256, $jl % 256, $Ss);
        XnF:
        goto QMl;
        m12:
        $Uk = sprintf("\x25\143\45\x63\45\143\x25\x73", $Cq, 129, $jl, $Ss);
        QMl:
        goto prh;
        Y1u:
        $Uk = sprintf("\45\143\45\x63\45\163", $Cq, $jl, $Ss);
        prh:
        return $Uk;
    }
    public static function convertRSA($Kf, $wf)
    {
        $C8 = self::makeAsnSegment(2, $wf);
        $lV = self::makeAsnSegment(2, $Kf);
        $Qx = self::makeAsnSegment(48, $lV . $C8);
        $Wp = self::makeAsnSegment(3, $Qx);
        $nt = pack("\110\x2a", "\x33\x30\60\104\60\66\60\x39\62\101\x38\66\64\x38\70\66\106\x37\x30\x44\x30\x31\60\x31\60\x31\60\x35\x30\x30");
        $f6 = self::makeAsnSegment(48, $nt . $Wp);
        $tk = base64_encode($f6);
        $Q5 = "\x2d\55\x2d\55\x2d\102\105\x47\x49\x4e\40\120\x55\102\x4c\111\x43\x20\113\105\x59\x2d\55\55\x2d\x2d\xa";
        $y5 = 0;
        DTp:
        if (!($aV = substr($tk, $y5, 64))) {
            goto Rop;
        }
        $Q5 = $Q5 . $aV . "\xa";
        $y5 += 64;
        goto DTp;
        Rop:
        return $Q5 . "\x2d\55\x2d\x2d\55\x45\x4e\x44\x20\x50\x55\x42\x4c\111\103\x20\113\x45\131\55\x2d\x2d\55\x2d\xa";
    }
    public function serializeKey($UX)
    {
    }
    public function getX509Certificate()
    {
        return $this->x509Certificate;
    }
    public function getX509Thumbprint()
    {
        return $this->X509Thumbprint;
    }
    public static function fromEncryptedKeyElement(DOMElement $Qp)
    {
        $WS = new XMLSecEnc();
        $WS->setNode($Qp);
        if ($bD = $WS->locateKey()) {
            goto T69;
        }
        throw new Exception("\125\x6e\141\x62\x6c\145\x20\164\x6f\40\154\x6f\x63\x61\x74\x65\40\x61\154\147\157\162\151\164\x68\x6d\x20\x66\157\x72\40\164\150\x69\163\x20\105\x6e\143\x72\171\x70\x74\145\144\40\113\145\171");
        T69:
        $bD->isEncrypted = true;
        $bD->encryptedCtx = $WS;
        XMLSecEnc::staticLocateKeyInfo($bD, $Qp);
        return $bD;
    }
}
