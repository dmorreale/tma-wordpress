<?php


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath;
class XMLSecurityDSig
{
    const XMLDSIGNS = "\150\x74\x74\160\72\x2f\57\x77\x77\x77\56\167\x33\56\157\x72\x67\57\x32\x30\60\60\57\60\x39\57\170\155\x6c\144\163\151\147\x23";
    const SHA1 = "\150\x74\164\160\72\x2f\57\167\x77\167\x2e\x77\63\x2e\157\x72\147\x2f\62\60\x30\60\x2f\60\x39\57\170\x6d\x6c\144\163\151\x67\x23\x73\150\x61\61";
    const SHA256 = "\150\164\164\x70\x3a\57\x2f\x77\x77\x77\56\167\63\56\x6f\x72\147\x2f\x32\x30\x30\61\x2f\60\x34\x2f\170\155\154\x65\156\143\x23\x73\150\141\x32\x35\x36";
    const SHA384 = "\x68\x74\164\x70\x3a\x2f\57\x77\167\x77\56\167\63\x2e\x6f\x72\147\57\x32\60\x30\x31\x2f\60\64\x2f\170\x6d\154\144\163\151\x67\x2d\155\x6f\162\x65\43\163\150\141\63\x38\x34";
    const SHA512 = "\x68\x74\164\x70\72\57\x2f\167\167\167\x2e\167\x33\56\157\x72\147\57\x32\60\x30\61\x2f\60\x34\57\x78\x6d\154\x65\156\143\43\163\x68\141\x35\x31\62";
    const RIPEMD160 = "\x68\x74\x74\160\72\57\57\x77\x77\167\56\167\x33\x2e\x6f\162\147\57\x32\60\x30\x31\x2f\x30\x34\x2f\170\x6d\154\x65\156\x63\43\x72\151\160\145\155\144\61\66\x30";
    const C14N = "\150\x74\164\x70\x3a\57\x2f\x77\x77\x77\56\167\63\56\x6f\x72\x67\x2f\124\x52\x2f\x32\60\60\x31\x2f\x52\105\103\x2d\170\155\154\55\143\x31\64\156\55\62\x30\x30\x31\x30\63\x31\x35";
    const C14N_COMMENTS = "\x68\x74\x74\160\x3a\x2f\x2f\167\x77\x77\x2e\167\x33\56\157\x72\147\57\x54\122\x2f\x32\60\x30\x31\57\x52\105\103\55\170\x6d\154\x2d\143\x31\64\156\x2d\62\x30\x30\61\60\x33\61\x35\43\127\151\164\x68\x43\157\x6d\155\x65\x6e\x74\x73";
    const EXC_C14N = "\150\164\164\x70\x3a\57\x2f\167\167\x77\56\167\63\x2e\x6f\x72\x67\x2f\x32\x30\60\61\x2f\x31\x30\x2f\170\x6d\154\x2d\x65\170\143\x2d\143\x31\64\156\43";
    const EXC_C14N_COMMENTS = "\150\x74\x74\x70\x3a\57\x2f\x77\x77\x77\x2e\167\x33\x2e\157\162\147\x2f\62\60\x30\x31\57\x31\x30\x2f\x78\x6d\x6c\55\x65\x78\x63\x2d\143\61\x34\156\x23\x57\x69\164\150\x43\157\155\155\145\x6e\164\x73";
    const template = "\x3c\144\163\72\x53\151\x67\156\x61\164\x75\162\x65\x20\x78\155\154\156\x73\x3a\144\x73\x3d\42\x68\x74\164\x70\72\57\x2f\x77\x77\167\x2e\167\x33\56\x6f\162\x67\57\x32\x30\60\60\x2f\x30\71\57\x78\x6d\154\x64\x73\151\147\43\42\76\15\12\40\x20\x3c\x64\163\x3a\x53\151\147\156\145\x64\111\156\x66\x6f\x3e\xd\xa\40\40\x20\40\74\x64\x73\72\x53\151\147\156\141\164\x75\162\145\x4d\x65\164\150\x6f\x64\x20\x2f\76\15\xa\40\x20\74\x2f\144\x73\72\123\x69\x67\156\145\144\x49\x6e\146\x6f\x3e\xd\12\x3c\x2f\144\x73\72\x53\x69\147\156\141\164\165\162\x65\x3e";
    const BASE_TEMPLATE = "\x3c\x53\x69\x67\x6e\141\164\165\x72\x65\x20\x78\155\x6c\x6e\x73\75\42\150\164\x74\160\x3a\x2f\x2f\x77\x77\x77\56\167\63\x2e\x6f\162\147\57\x32\x30\60\x30\x2f\60\71\x2f\170\x6d\154\x64\x73\151\x67\x23\x22\x3e\15\12\x20\40\74\123\x69\x67\x6e\x65\144\x49\156\146\157\76\xd\12\40\x20\x20\40\x3c\x53\x69\x67\156\141\164\165\162\x65\x4d\145\x74\150\157\144\x20\x2f\x3e\xd\xa\x20\x20\74\x2f\123\151\x67\x6e\145\x64\x49\x6e\146\157\76\15\xa\74\57\123\151\147\156\x61\x74\165\162\x65\76";
    public $sigNode = null;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = null;
    private $xPathCtx = null;
    private $canonicalMethod = null;
    private $prefix = '';
    private $searchpfx = "\x73\x65\x63\x64\x73\151\147";
    private $validatedNodes = null;
    public function __construct($Co = "\144\x73")
    {
        $eE = self::BASE_TEMPLATE;
        if (empty($Co)) {
            goto P2w;
        }
        $this->prefix = $Co . "\72";
        $mw = array("\x3c\x53", "\74\57\123", "\x78\155\x6c\x6e\163\75");
        $Mu = array("\x3c{$Co}\x3a\x53", "\x3c\57{$Co}\x3a\x53", "\170\x6d\154\156\163\72{$Co}\75");
        $eE = str_replace($mw, $Mu, $eE);
        P2w:
        $Q1 = new DOMDocument();
        $Q1->loadXML($eE);
        $this->sigNode = $Q1->documentElement;
    }
    private function resetXPathObj()
    {
        $this->xPathCtx = null;
    }
    private function getXPathObj()
    {
        if (!(empty($this->xPathCtx) && !empty($this->sigNode))) {
            goto Bc2;
        }
        $L9 = new DOMXPath($this->sigNode->ownerDocument);
        $L9->registerNamespace("\x73\145\143\x64\x73\x69\147", self::XMLDSIGNS);
        $this->xPathCtx = $L9;
        Bc2:
        return $this->xPathCtx;
    }
    public static function generateGUID($Co = "\x70\146\170")
    {
        $v6 = md5(uniqid(mt_rand(), true));
        $FF = $Co . substr($v6, 0, 8) . "\x2d" . substr($v6, 8, 4) . "\55" . substr($v6, 12, 4) . "\55" . substr($v6, 16, 4) . "\x2d" . substr($v6, 20, 12);
        return $FF;
    }
    public static function generate_GUID($Co = "\160\x66\170")
    {
        return self::generateGUID($Co);
    }
    public function locateSignature($C0, $yh = 0)
    {
        if ($C0 instanceof DOMDocument) {
            goto ppy;
        }
        $dK = $C0->ownerDocument;
        goto lnE;
        ppy:
        $dK = $C0;
        lnE:
        if (!$dK) {
            goto QKg;
        }
        $L9 = new DOMXPath($dK);
        $L9->registerNamespace("\163\145\143\x64\163\x69\147", self::XMLDSIGNS);
        $M2 = "\x2e\57\x2f\x73\x65\143\x64\163\151\x67\x3a\x53\x69\x67\x6e\x61\x74\x75\x72\x65";
        $Hz = $L9->query($M2, $C0);
        $this->sigNode = $Hz->item($yh);
        return $this->sigNode;
        QKg:
        return null;
    }
    public function createNewSignNode($lw, $bc = null)
    {
        $dK = $this->sigNode->ownerDocument;
        if (!is_null($bc)) {
            goto sDs;
        }
        $m0 = $dK->createElementNS(self::XMLDSIGNS, $this->prefix . $lw);
        goto s31;
        sDs:
        $m0 = $dK->createElementNS(self::XMLDSIGNS, $this->prefix . $lw, $bc);
        s31:
        return $m0;
    }
    public function setCanonicalMethod($L_)
    {
        switch ($L_) {
            case "\150\164\164\160\x3a\57\x2f\x77\167\x77\x2e\x77\63\56\157\x72\147\57\124\x52\x2f\x32\x30\x30\61\57\x52\x45\103\x2d\x78\155\154\x2d\143\x31\64\x6e\x2d\62\x30\60\x31\60\x33\x31\x35":
            case "\150\164\164\160\x3a\x2f\x2f\x77\x77\x77\56\167\63\56\x6f\162\147\x2f\124\122\x2f\x32\x30\60\61\57\122\105\103\55\170\155\x6c\x2d\x63\61\x34\156\55\x32\60\x30\61\x30\x33\61\x35\43\127\x69\x74\150\x43\x6f\x6d\x6d\x65\156\x74\x73":
            case "\150\x74\x74\160\x3a\x2f\x2f\167\167\x77\56\167\x33\56\x6f\162\147\x2f\62\60\x30\61\57\61\60\57\170\155\x6c\55\145\170\x63\x2d\143\61\64\x6e\x23":
            case "\x68\164\164\x70\72\x2f\x2f\167\167\167\x2e\x77\63\56\157\162\x67\x2f\62\60\x30\61\x2f\61\60\x2f\170\x6d\x6c\x2d\145\170\143\55\143\61\x34\156\x23\127\x69\x74\150\x43\157\155\x6d\x65\x6e\164\x73":
                $this->canonicalMethod = $L_;
                goto Lii;
            default:
                throw new Exception("\x49\156\166\141\154\x69\144\40\103\141\156\x6f\156\151\143\x61\154\40\x4d\x65\164\150\x6f\x64");
        }
        VOX:
        Lii:
        if (!($L9 = $this->getXPathObj())) {
            goto SpH;
        }
        $M2 = "\56\x2f" . $this->searchpfx . "\72\123\x69\x67\156\145\x64\x49\x6e\146\x6f";
        $Hz = $L9->query($M2, $this->sigNode);
        if (!($C_ = $Hz->item(0))) {
            goto WI7;
        }
        $M2 = "\56\x2f" . $this->searchpfx . "\x43\141\x6e\x6f\156\151\143\x61\x6c\151\172\x61\x74\x69\157\x6e\115\x65\x74\x68\157\144";
        $Hz = $L9->query($M2, $C_);
        if ($Et = $Hz->item(0)) {
            goto Z7j;
        }
        $Et = $this->createNewSignNode("\x43\141\156\x6f\156\151\x63\x61\x6c\151\172\x61\x74\151\157\x6e\115\145\x74\x68\157\x64");
        $C_->insertBefore($Et, $C_->firstChild);
        Z7j:
        $Et->setAttribute("\x41\x6c\147\157\162\151\164\x68\155", $this->canonicalMethod);
        WI7:
        SpH:
    }
    private function canonicalizeData($m0, $Xj, $dh = null, $VV = null)
    {
        $wT = false;
        $M8 = false;
        switch ($Xj) {
            case "\x68\164\164\x70\x3a\x2f\57\167\x77\x77\x2e\167\63\56\157\x72\147\57\124\x52\x2f\62\60\x30\x31\57\x52\105\x43\55\x78\x6d\154\x2d\143\61\64\156\x2d\62\x30\x30\61\x30\63\61\65":
                $wT = false;
                $M8 = false;
                goto JtA;
            case "\150\164\x74\x70\72\x2f\57\167\x77\x77\x2e\167\63\56\157\x72\147\x2f\124\122\57\x32\x30\60\x31\57\x52\105\103\55\170\155\x6c\55\x63\61\64\156\x2d\62\x30\x30\x31\x30\x33\x31\x35\x23\x57\x69\164\150\x43\157\155\x6d\145\156\x74\x73":
                $M8 = true;
                goto JtA;
            case "\x68\164\x74\160\x3a\x2f\x2f\167\167\x77\56\x77\63\x2e\157\x72\147\x2f\62\60\x30\61\x2f\x31\60\x2f\x78\x6d\154\x2d\x65\170\143\x2d\143\61\64\x6e\43":
                $wT = true;
                goto JtA;
            case "\x68\164\164\160\x3a\x2f\57\x77\167\167\x2e\x77\x33\x2e\157\x72\x67\57\x32\60\60\x31\x2f\x31\x30\57\170\155\154\x2d\x65\x78\x63\x2d\x63\x31\x34\x6e\43\127\x69\x74\150\103\x6f\155\x6d\145\x6e\x74\x73":
                $wT = true;
                $M8 = true;
                goto JtA;
        }
        sHp:
        JtA:
        if (!(is_null($dh) && $m0 instanceof DOMNode && $m0->ownerDocument !== null && $m0->isSameNode($m0->ownerDocument->documentElement))) {
            goto AfQ;
        }
        $Qp = $m0;
        IEI:
        if (!($Bc = $Qp->previousSibling)) {
            goto AhL;
        }
        if (!($Bc->nodeType == XML_PI_NODE || $Bc->nodeType == XML_COMMENT_NODE && $M8)) {
            goto IPh;
        }
        goto AhL;
        IPh:
        $Qp = $Bc;
        goto IEI;
        AhL:
        if (!($Bc == null)) {
            goto zDJ;
        }
        $m0 = $m0->ownerDocument;
        zDJ:
        AfQ:
        return $m0->C14N($wT, $M8, $dh, $VV);
    }
    public function canonicalizeSignedInfo()
    {
        $dK = $this->sigNode->ownerDocument;
        $Xj = null;
        if (!$dK) {
            goto oYy;
        }
        $L9 = $this->getXPathObj();
        $M2 = "\56\57\x73\x65\143\144\x73\x69\147\72\x53\x69\x67\156\145\144\x49\156\146\157";
        $Hz = $L9->query($M2, $this->sigNode);
        if (!($Fy = $Hz->item(0))) {
            goto T55;
        }
        $M2 = "\x2e\57\x73\145\x63\x64\163\151\147\72\x43\141\x6e\x6f\x6e\x69\x63\141\x6c\x69\x7a\141\164\x69\x6f\156\x4d\145\164\150\157\144";
        $Hz = $L9->query($M2, $Fy);
        if (!($Et = $Hz->item(0))) {
            goto a84;
        }
        $Xj = $Et->getAttribute("\x41\x6c\147\x6f\162\151\x74\x68\155");
        a84:
        $this->signedInfo = $this->canonicalizeData($Fy, $Xj);
        return $this->signedInfo;
        T55:
        oYy:
        return null;
    }
    public function calculateDigest($CM, $lE, $bd = true)
    {
        switch ($CM) {
            case self::SHA1:
                $ON = "\163\150\x61\x31";
                goto oNq;
            case self::SHA256:
                $ON = "\x73\150\141\62\65\x36";
                goto oNq;
            case self::SHA384:
                $ON = "\163\150\x61\x33\x38\64";
                goto oNq;
            case self::SHA512:
                $ON = "\163\x68\x61\65\61\62";
                goto oNq;
            case self::RIPEMD160:
                $ON = "\x72\151\x70\145\155\144\x31\x36\60";
                goto oNq;
            default:
                throw new Exception("\x43\141\156\156\157\164\x20\166\141\x6c\151\144\x61\x74\x65\40\144\151\x67\x65\x73\x74\72\x20\125\x6e\163\x75\160\x70\x6f\x72\164\145\144\x20\101\x6c\147\157\x72\x69\164\x68\155\x20\74{$CM}\76");
        }
        Rdk:
        oNq:
        $ic = hash($ON, $lE, true);
        if (!$bd) {
            goto v4P;
        }
        $ic = base64_encode($ic);
        v4P:
        return $ic;
    }
    public function validateDigest($KK, $lE)
    {
        $L9 = new DOMXPath($KK->ownerDocument);
        $L9->registerNamespace("\x73\x65\x63\x64\163\151\147", self::XMLDSIGNS);
        $M2 = "\x73\x74\x72\x69\156\147\x28\56\57\163\145\x63\x64\163\x69\x67\72\x44\151\147\x65\x73\164\x4d\x65\164\150\x6f\144\57\x40\x41\x6c\147\157\162\x69\x74\150\155\x29";
        $CM = $L9->evaluate($M2, $KK);
        $gI = $this->calculateDigest($CM, $lE, false);
        $M2 = "\163\164\162\x69\x6e\x67\x28\56\x2f\163\145\x63\144\x73\x69\147\72\x44\x69\x67\x65\x73\164\126\141\154\x75\x65\51";
        $xD = $L9->evaluate($M2, $KK);
        return $gI === base64_decode($xD);
    }
    public function processTransforms($KK, $e2, $wl = true)
    {
        $lE = $e2;
        $L9 = new DOMXPath($KK->ownerDocument);
        $L9->registerNamespace("\x73\145\143\144\x73\151\147", self::XMLDSIGNS);
        $M2 = "\x2e\x2f\x73\145\x63\144\x73\x69\x67\72\x54\162\141\x6e\163\146\x6f\162\155\163\x2f\163\145\x63\144\x73\x69\x67\x3a\x54\x72\141\156\163\x66\x6f\162\x6d";
        $E0 = $L9->query($M2, $KK);
        $LX = "\x68\164\164\x70\72\57\x2f\167\167\x77\x2e\167\63\x2e\x6f\x72\147\x2f\x54\122\x2f\x32\60\60\x31\57\122\x45\103\x2d\x78\x6d\154\x2d\x63\61\x34\156\55\x32\60\x30\61\x30\x33\61\x35";
        $dh = null;
        $VV = null;
        foreach ($E0 as $BR) {
            $wh = $BR->getAttribute("\x41\154\x67\x6f\162\x69\164\x68\x6d");
            switch ($wh) {
                case "\150\164\x74\160\72\x2f\57\167\167\x77\56\x77\x33\x2e\x6f\162\147\x2f\x32\x30\x30\x31\x2f\x31\x30\x2f\x78\x6d\x6c\55\145\x78\x63\x2d\143\x31\64\x6e\43":
                case "\x68\164\x74\160\72\57\57\167\167\167\x2e\167\63\x2e\157\x72\147\x2f\62\x30\60\x31\x2f\61\60\x2f\170\x6d\x6c\x2d\x65\170\143\55\143\x31\x34\156\43\x57\x69\x74\150\x43\x6f\x6d\x6d\x65\x6e\x74\x73":
                    if (!$wl) {
                        goto JwC;
                    }
                    $LX = $wh;
                    goto rAw;
                    JwC:
                    $LX = "\150\164\x74\160\72\x2f\x2f\x77\x77\167\x2e\x77\x33\x2e\157\162\147\x2f\62\x30\x30\x31\x2f\x31\60\x2f\x78\x6d\154\55\145\x78\143\x2d\x63\x31\64\156\x23";
                    rAw:
                    $m0 = $BR->firstChild;
                    p0o:
                    if (!$m0) {
                        goto YXQ;
                    }
                    if (!($m0->localName == "\111\x6e\143\154\x75\163\x69\x76\145\x4e\141\155\x65\x73\x70\141\143\145\163")) {
                        goto VOJ;
                    }
                    if (!($yn = $m0->getAttribute("\x50\162\145\146\x69\x78\x4c\151\163\164"))) {
                        goto cXv;
                    }
                    $wz = array();
                    $lN = explode("\x20", $yn);
                    foreach ($lN as $yn) {
                        $S9 = trim($yn);
                        if (empty($S9)) {
                            goto SJF;
                        }
                        $wz[] = $S9;
                        SJF:
                        RMt:
                    }
                    aU0:
                    if (!(count($wz) > 0)) {
                        goto kYn;
                    }
                    $VV = $wz;
                    kYn:
                    cXv:
                    goto YXQ;
                    VOJ:
                    $m0 = $m0->nextSibling;
                    goto p0o;
                    YXQ:
                    goto qSd;
                case "\x68\x74\164\160\x3a\x2f\57\167\x77\167\56\x77\x33\x2e\157\162\147\57\x54\x52\x2f\x32\x30\60\61\57\122\105\103\x2d\x78\x6d\x6c\55\x63\61\64\x6e\55\62\60\x30\x31\60\x33\61\65":
                case "\150\164\164\160\x3a\57\x2f\x77\167\167\x2e\x77\63\x2e\x6f\162\147\57\124\122\57\x32\x30\x30\61\57\122\x45\x43\x2d\170\155\154\55\x63\x31\x34\x6e\55\62\60\60\x31\x30\x33\x31\65\x23\x57\x69\164\150\x43\157\155\155\x65\x6e\164\163":
                    if (!$wl) {
                        goto oAQ;
                    }
                    $LX = $wh;
                    goto w1o;
                    oAQ:
                    $LX = "\x68\164\164\160\x3a\57\57\x77\167\167\56\x77\63\x2e\157\162\x67\x2f\124\122\57\x32\x30\x30\61\x2f\x52\105\103\x2d\x78\155\154\x2d\x63\x31\64\x6e\x2d\62\x30\x30\61\60\63\x31\x35";
                    w1o:
                    goto qSd;
                case "\150\x74\164\x70\72\57\57\167\167\167\56\x77\63\x2e\x6f\162\x67\x2f\x54\122\x2f\61\x39\71\x39\57\x52\x45\x43\55\x78\x70\141\x74\x68\x2d\61\x39\x39\x39\x31\61\61\66":
                    $m0 = $BR->firstChild;
                    xZt:
                    if (!$m0) {
                        goto oBg;
                    }
                    if (!($m0->localName == "\130\120\x61\x74\x68")) {
                        goto yOg;
                    }
                    $dh = array();
                    $dh["\161\165\145\x72\171"] = "\50\x2e\x2f\57\x2e\40\174\40\x2e\57\57\100\x2a\x20\174\40\x2e\x2f\x2f\156\141\155\x65\x73\160\141\x63\145\x3a\x3a\52\x29\x5b" . $m0->nodeValue . "\135";
                    $DT["\x6e\141\155\x65\163\x70\x61\x63\145\x73"] = array();
                    $c8 = $L9->query("\x2e\57\x6e\141\x6d\x65\163\x70\141\143\145\72\x3a\x2a", $m0);
                    foreach ($c8 as $j2) {
                        if (!($j2->localName != "\170\155\x6c")) {
                            goto b4Q;
                        }
                        $dh["\x6e\x61\x6d\x65\163\160\x61\x63\145\163"][$j2->localName] = $j2->nodeValue;
                        b4Q:
                        bzI:
                    }
                    MGR:
                    goto oBg;
                    yOg:
                    $m0 = $m0->nextSibling;
                    goto xZt;
                    oBg:
                    goto qSd;
            }
            y1b:
            qSd:
            xY_:
        }
        BL0:
        if (!$lE instanceof DOMNode) {
            goto Oh1;
        }
        $lE = $this->canonicalizeData($e2, $LX, $dh, $VV);
        Oh1:
        return $lE;
    }
    public function processRefNode($KK)
    {
        $T9 = null;
        $wl = true;
        if ($jU = $KK->getAttribute("\x55\x52\x49")) {
            goto AW0;
        }
        $wl = false;
        $T9 = $KK->ownerDocument;
        goto qOg;
        AW0:
        $lQ = parse_url($jU);
        if (!empty($lQ["\160\141\x74\x68"])) {
            goto FxT;
        }
        if ($EJ = $lQ["\146\x72\141\x67\x6d\145\x6e\x74"]) {
            goto VrK;
        }
        $T9 = $KK->ownerDocument;
        goto dIv;
        VrK:
        $wl = false;
        $dJ = new DOMXPath($KK->ownerDocument);
        if (!($this->idNS && is_array($this->idNS))) {
            goto OQT;
        }
        foreach ($this->idNS as $cE => $qP) {
            $dJ->registerNamespace($cE, $qP);
            ju6:
        }
        zXs:
        OQT:
        $VD = "\100\111\144\x3d\42" . XPath::filterAttrValue($EJ, XPath::DOUBLE_QUOTE) . "\x22";
        if (!is_array($this->idKeys)) {
            goto Sjn;
        }
        foreach ($this->idKeys as $wg) {
            $VD .= "\40\x6f\162\40\x40" . XPath::filterAttrName($wg) . "\x3d\x22" . XPath::filterAttrValue($EJ, XPath::DOUBLE_QUOTE) . "\42";
            WhC:
        }
        OTQ:
        Sjn:
        $M2 = "\57\x2f\x2a\x5b" . $VD . "\135";
        $T9 = $dJ->query($M2)->item(0);
        dIv:
        FxT:
        qOg:
        $lE = $this->processTransforms($KK, $T9, $wl);
        if ($this->validateDigest($KK, $lE)) {
            goto FO_;
        }
        return false;
        FO_:
        if (!$T9 instanceof DOMNode) {
            goto DWV;
        }
        if (!empty($EJ)) {
            goto NDI;
        }
        $this->validatedNodes[] = $T9;
        goto qsf;
        NDI:
        $this->validatedNodes[$EJ] = $T9;
        qsf:
        DWV:
        return true;
    }
    public function getRefNodeID($KK)
    {
        if (!($jU = $KK->getAttribute("\x55\122\111"))) {
            goto FP3;
        }
        $lQ = parse_url($jU);
        if (!empty($lQ["\x70\141\164\150"])) {
            goto r73;
        }
        if (!($EJ = $lQ["\x66\x72\141\x67\155\x65\156\164"])) {
            goto eHf;
        }
        return $EJ;
        eHf:
        r73:
        FP3:
        return null;
    }
    public function getRefIDs()
    {
        $zL = array();
        $L9 = $this->getXPathObj();
        $M2 = "\x2e\x2f\163\x65\x63\x64\x73\x69\147\72\x53\151\147\156\145\x64\x49\x6e\x66\157\57\163\x65\143\x64\163\151\x67\72\122\145\146\145\x72\145\156\x63\x65";
        $Hz = $L9->query($M2, $this->sigNode);
        if (!($Hz->length == 0)) {
            goto gJm;
        }
        throw new Exception("\122\145\146\x65\162\x65\156\x63\145\40\156\x6f\x64\x65\163\40\156\x6f\x74\x20\x66\x6f\x75\156\144");
        gJm:
        foreach ($Hz as $KK) {
            $zL[] = $this->getRefNodeID($KK);
            Dpk:
        }
        xvv:
        return $zL;
    }
    public function validateReference()
    {
        $qH = $this->sigNode->ownerDocument->documentElement;
        if ($qH->isSameNode($this->sigNode)) {
            goto ZWa;
        }
        if (!($this->sigNode->parentNode != null)) {
            goto MtF;
        }
        $this->sigNode->parentNode->removeChild($this->sigNode);
        MtF:
        ZWa:
        $L9 = $this->getXPathObj();
        $M2 = "\x2e\57\163\x65\x63\x64\163\151\147\x3a\x53\151\x67\156\x65\x64\x49\156\146\x6f\57\x73\145\x63\144\163\x69\x67\x3a\122\x65\x66\x65\x72\x65\156\143\x65";
        $Hz = $L9->query($M2, $this->sigNode);
        if (!($Hz->length == 0)) {
            goto qiN;
        }
        throw new Exception("\122\145\146\x65\x72\145\156\x63\145\x20\156\157\x64\145\163\x20\x6e\157\164\40\146\157\x75\156\x64");
        qiN:
        $this->validatedNodes = array();
        foreach ($Hz as $KK) {
            if ($this->processRefNode($KK)) {
                goto pgN;
            }
            $this->validatedNodes = null;
            throw new Exception("\x52\x65\x66\x65\x72\145\156\143\x65\40\x76\x61\154\151\x64\141\x74\151\x6f\156\40\x66\141\x69\x6c\145\x64");
            pgN:
            e9Q:
        }
        L0w:
        return true;
    }
    private function addRefInternal($AE, $m0, $wh, $sc = null, $p0 = null)
    {
        $Co = null;
        $D1 = null;
        $ej = "\x49\x64";
        $he = true;
        $rV = false;
        if (!is_array($p0)) {
            goto Nbj;
        }
        $Co = empty($p0["\160\162\145\x66\151\x78"]) ? null : $p0["\x70\162\145\x66\x69\x78"];
        $D1 = empty($p0["\160\162\x65\x66\x69\170\x5f\x6e\x73"]) ? null : $p0["\x70\162\x65\146\151\170\137\156\x73"];
        $ej = empty($p0["\151\144\137\156\141\x6d\145"]) ? "\111\144" : $p0["\151\144\x5f\x6e\x61\155\x65"];
        $he = !isset($p0["\x6f\166\145\162\167\162\x69\x74\x65"]) ? true : (bool) $p0["\x6f\x76\145\162\167\162\x69\x74\x65"];
        $rV = !isset($p0["\146\157\162\143\x65\x5f\x75\162\x69"]) ? false : (bool) $p0["\x66\157\x72\143\x65\137\165\162\151"];
        Nbj:
        $YP = $ej;
        if (empty($Co)) {
            goto N4r;
        }
        $YP = $Co . "\x3a" . $YP;
        N4r:
        $KK = $this->createNewSignNode("\122\145\x66\x65\x72\145\x6e\x63\x65");
        $AE->appendChild($KK);
        if (!$m0 instanceof DOMDocument) {
            goto VU3;
        }
        if ($rV) {
            goto jap;
        }
        goto Kt5;
        VU3:
        $jU = null;
        if ($he) {
            goto mLg;
        }
        $jU = $D1 ? $m0->getAttributeNS($D1, $ej) : $m0->getAttribute($ej);
        mLg:
        if (!empty($jU)) {
            goto UhL;
        }
        $jU = self::generateGUID();
        $m0->setAttributeNS($D1, $YP, $jU);
        UhL:
        $KK->setAttribute("\x55\x52\111", "\x23" . $jU);
        goto Kt5;
        jap:
        $KK->setAttribute("\x55\x52\x49", '');
        Kt5:
        $QC = $this->createNewSignNode("\124\x72\141\156\x73\146\157\x72\x6d\x73");
        $KK->appendChild($QC);
        if (is_array($sc)) {
            goto VE3;
        }
        if (!empty($this->canonicalMethod)) {
            goto OQg;
        }
        goto qh9;
        VE3:
        foreach ($sc as $BR) {
            $R3 = $this->createNewSignNode("\x54\x72\x61\x6e\x73\146\157\162\155");
            $QC->appendChild($R3);
            if (is_array($BR) && !empty($BR["\x68\x74\x74\x70\72\x2f\x2f\167\167\167\56\x77\x33\x2e\157\x72\147\x2f\124\122\57\x31\71\x39\71\x2f\122\105\x43\x2d\x78\x70\x61\164\x68\55\61\x39\71\71\61\61\61\x36"]) && !empty($BR["\x68\x74\164\160\72\57\57\167\x77\x77\x2e\167\x33\56\157\162\147\57\124\122\57\x31\71\71\71\57\122\x45\103\x2d\170\x70\141\x74\150\55\61\71\71\x39\61\x31\61\66"]["\161\x75\x65\x72\171"])) {
                goto Xlr;
            }
            $R3->setAttribute("\101\x6c\147\x6f\162\x69\164\x68\x6d", $BR);
            goto jIv;
            Xlr:
            $R3->setAttribute("\x41\x6c\147\x6f\x72\151\164\150\155", "\x68\164\x74\160\72\x2f\x2f\167\x77\167\56\x77\63\56\157\x72\147\57\124\x52\x2f\61\71\x39\71\x2f\x52\x45\103\x2d\170\160\x61\164\x68\x2d\x31\x39\x39\71\61\61\x31\x36");
            $zW = $this->createNewSignNode("\x58\x50\141\x74\150", $BR["\150\164\x74\x70\72\57\57\x77\x77\167\x2e\167\63\x2e\157\162\147\57\124\122\x2f\61\x39\71\x39\57\x52\x45\103\55\x78\160\141\164\150\55\61\71\x39\71\x31\x31\x31\x36"]["\x71\x75\x65\x72\171"]);
            $R3->appendChild($zW);
            if (empty($BR["\150\x74\164\160\72\x2f\57\x77\x77\167\x2e\167\63\x2e\157\162\x67\57\x54\x52\x2f\61\x39\71\x39\57\x52\105\x43\55\x78\160\x61\x74\x68\55\61\x39\x39\x39\x31\61\61\66"]["\156\x61\x6d\145\163\x70\141\x63\145\163"])) {
                goto p_s;
            }
            foreach ($BR["\x68\x74\x74\x70\x3a\57\57\167\167\x77\x2e\167\x33\56\x6f\x72\x67\x2f\124\x52\x2f\x31\x39\71\71\57\122\x45\103\x2d\x78\x70\x61\164\x68\55\x31\71\x39\x39\61\61\x31\66"]["\x6e\x61\155\x65\163\x70\x61\143\x65\x73"] as $Co => $Ld) {
                $zW->setAttributeNS("\x68\164\x74\160\x3a\x2f\x2f\167\x77\x77\56\167\63\x2e\157\162\147\x2f\62\60\60\x30\57\170\x6d\x6c\x6e\163\x2f", "\x78\155\154\156\x73\72{$Co}", $Ld);
                KuX:
            }
            BJQ:
            p_s:
            jIv:
            kR3:
        }
        JIw:
        goto qh9;
        OQg:
        $R3 = $this->createNewSignNode("\124\x72\x61\x6e\163\x66\157\162\155");
        $QC->appendChild($R3);
        $R3->setAttribute("\x41\154\147\x6f\162\x69\164\150\x6d", $this->canonicalMethod);
        qh9:
        $tL = $this->processTransforms($KK, $m0);
        $gI = $this->calculateDigest($wh, $tL);
        $By = $this->createNewSignNode("\104\x69\x67\145\163\164\x4d\x65\x74\150\157\144");
        $KK->appendChild($By);
        $By->setAttribute("\101\x6c\147\x6f\162\151\x74\x68\155", $wh);
        $xD = $this->createNewSignNode("\104\151\x67\x65\x73\x74\126\x61\x6c\165\x65", $gI);
        $KK->appendChild($xD);
    }
    public function addReference($m0, $wh, $sc = null, $p0 = null)
    {
        if (!($L9 = $this->getXPathObj())) {
            goto Yei;
        }
        $M2 = "\x2e\x2f\x73\145\143\144\x73\151\x67\x3a\123\151\147\156\145\144\111\x6e\146\x6f";
        $Hz = $L9->query($M2, $this->sigNode);
        if (!($m7 = $Hz->item(0))) {
            goto I4G;
        }
        $this->addRefInternal($m7, $m0, $wh, $sc, $p0);
        I4G:
        Yei:
    }
    public function addReferenceList($oC, $wh, $sc = null, $p0 = null)
    {
        if (!($L9 = $this->getXPathObj())) {
            goto gtS;
        }
        $M2 = "\56\57\x73\x65\x63\x64\163\x69\147\x3a\123\151\147\x6e\145\x64\x49\x6e\146\x6f";
        $Hz = $L9->query($M2, $this->sigNode);
        if (!($m7 = $Hz->item(0))) {
            goto Mq3;
        }
        foreach ($oC as $m0) {
            $this->addRefInternal($m7, $m0, $wh, $sc, $p0);
            PoZ:
        }
        XnC:
        Mq3:
        gtS:
    }
    public function addObject($lE, $pn = null, $Q5 = null)
    {
        $X4 = $this->createNewSignNode("\x4f\142\152\145\x63\164");
        $this->sigNode->appendChild($X4);
        if (empty($pn)) {
            goto gkm;
        }
        $X4->setAttribute("\x4d\x69\x6d\145\124\x79\160\145", $pn);
        gkm:
        if (empty($Q5)) {
            goto XzY;
        }
        $X4->setAttribute("\105\156\x63\157\144\x69\x6e\x67", $Q5);
        XzY:
        if ($lE instanceof DOMElement) {
            goto CuO;
        }
        $tB = $this->sigNode->ownerDocument->createTextNode($lE);
        goto b48;
        CuO:
        $tB = $this->sigNode->ownerDocument->importNode($lE, true);
        b48:
        $X4->appendChild($tB);
        return $X4;
    }
    public function locateKey($m0 = null)
    {
        if (!empty($m0)) {
            goto eYG;
        }
        $m0 = $this->sigNode;
        eYG:
        if ($m0 instanceof DOMNode) {
            goto SMV;
        }
        return null;
        SMV:
        if (!($dK = $m0->ownerDocument)) {
            goto Z__;
        }
        $L9 = new DOMXPath($dK);
        $L9->registerNamespace("\x73\145\x63\144\x73\151\x67", self::XMLDSIGNS);
        $M2 = "\163\x74\162\x69\x6e\x67\50\x2e\x2f\x73\145\x63\x64\x73\x69\147\x3a\x53\151\147\x6e\145\144\x49\156\146\x6f\57\163\145\143\x64\x73\151\x67\72\x53\x69\147\156\141\164\x75\162\x65\115\145\164\150\157\144\57\100\x41\x6c\147\157\x72\x69\164\150\155\x29";
        $wh = $L9->evaluate($M2, $m0);
        if (!$wh) {
            goto qIC;
        }
        try {
            $bD = new XMLSecurityKey($wh, array("\164\171\160\145" => "\x70\x75\142\x6c\x69\143"));
        } catch (Exception $GP) {
            return null;
        }
        return $bD;
        qIC:
        Z__:
        return null;
    }
    public function verify($bD)
    {
        $dK = $this->sigNode->ownerDocument;
        $L9 = new DOMXPath($dK);
        $L9->registerNamespace("\x73\145\x63\144\x73\x69\147", self::XMLDSIGNS);
        $M2 = "\x73\x74\162\x69\156\x67\x28\56\x2f\x73\145\143\144\163\x69\147\72\x53\151\x67\156\x61\164\x75\x72\145\x56\141\x6c\x75\145\x29";
        $je = $L9->evaluate($M2, $this->sigNode);
        if (!empty($je)) {
            goto Cfo;
        }
        throw new Exception("\125\x6e\x61\142\154\x65\x20\x74\157\x20\154\x6f\x63\x61\164\145\x20\123\151\x67\156\x61\164\165\162\x65\126\x61\154\x75\x65");
        Cfo:
        return $bD->verifySignature($this->signedInfo, base64_decode($je));
    }
    public function signData($bD, $lE)
    {
        return $bD->signData($lE);
    }
    public function sign($bD, $wD = null)
    {
        if (!($wD != null)) {
            goto KCa;
        }
        $this->resetXPathObj();
        $this->appendSignature($wD);
        $this->sigNode = $wD->lastChild;
        KCa:
        if (!($L9 = $this->getXPathObj())) {
            goto d4v;
        }
        $M2 = "\56\57\163\145\x63\144\163\151\x67\72\x53\151\x67\156\145\144\x49\156\x66\157";
        $Hz = $L9->query($M2, $this->sigNode);
        if (!($m7 = $Hz->item(0))) {
            goto GTn;
        }
        $M2 = "\56\x2f\x73\145\143\144\x73\x69\x67\x3a\x53\151\x67\156\141\x74\165\x72\145\115\x65\x74\150\x6f\x64";
        $Hz = $L9->query($M2, $m7);
        $vn = $Hz->item(0);
        $vn->setAttribute("\101\154\x67\157\x72\151\x74\x68\x6d", $bD->type);
        $lE = $this->canonicalizeData($m7, $this->canonicalMethod);
        $je = base64_encode($this->signData($bD, $lE));
        $KM = $this->createNewSignNode("\123\x69\x67\x6e\x61\x74\x75\162\145\x56\141\154\x75\145", $je);
        if ($Dw = $m7->nextSibling) {
            goto o22;
        }
        $this->sigNode->appendChild($KM);
        goto VJv;
        o22:
        $Dw->parentNode->insertBefore($KM, $Dw);
        VJv:
        GTn:
        d4v:
    }
    public function appendCert()
    {
    }
    public function appendKey($bD, $UX = null)
    {
        $bD->serializeKey($UX);
    }
    public function insertSignature($m0, $ZM = null)
    {
        $YQ = $m0->ownerDocument;
        $KV = $YQ->importNode($this->sigNode, true);
        if ($ZM == null) {
            goto WLS;
        }
        return $m0->insertBefore($KV, $ZM);
        goto uHn;
        WLS:
        return $m0->insertBefore($KV);
        uHn:
    }
    public function appendSignature($N2, $Nh = false)
    {
        $ZM = $Nh ? $N2->firstChild : null;
        return $this->insertSignature($N2, $ZM);
    }
    public static function get509XCert($CH, $Sl = true)
    {
        $Xo = self::staticGet509XCerts($CH, $Sl);
        if (empty($Xo)) {
            goto fcN;
        }
        return $Xo[0];
        fcN:
        return '';
    }
    public static function staticGet509XCerts($Xo, $Sl = true)
    {
        if ($Sl) {
            goto OGz;
        }
        return array($Xo);
        goto UJR;
        OGz:
        $lE = '';
        $ts = array();
        $RG = explode("\xa", $Xo);
        $E9 = false;
        foreach ($RG as $Oh) {
            if (!$E9) {
                goto URx;
            }
            if (!(strncmp($Oh, "\x2d\55\x2d\55\55\105\116\104\40\103\x45\x52\x54\111\106\111\x43\x41\x54\x45", 20) == 0)) {
                goto WqY;
            }
            $E9 = false;
            $ts[] = $lE;
            $lE = '';
            goto D87;
            WqY:
            $lE .= trim($Oh);
            goto EG7;
            URx:
            if (!(strncmp($Oh, "\x2d\x2d\55\55\55\x42\105\107\x49\x4e\40\103\105\122\x54\x49\x46\x49\103\x41\124\x45", 22) == 0)) {
                goto ZmF;
            }
            $E9 = true;
            ZmF:
            EG7:
            D87:
        }
        ozn:
        return $ts;
        UJR:
    }
    public static function staticAdd509Cert($lu, $CH, $Sl = true, $XD = false, $L9 = null, $p0 = null)
    {
        if (!$XD) {
            goto Chp;
        }
        $CH = file_get_contents($CH);
        Chp:
        if ($lu instanceof DOMElement) {
            goto Yc6;
        }
        throw new Exception("\111\156\166\x61\154\151\144\40\160\x61\x72\x65\156\164\40\116\157\x64\145\40\x70\x61\162\x61\155\145\x74\x65\x72");
        Yc6:
        $V8 = $lu->ownerDocument;
        if (!empty($L9)) {
            goto qlh;
        }
        $L9 = new DOMXPath($lu->ownerDocument);
        $L9->registerNamespace("\163\145\x63\144\x73\151\x67", self::XMLDSIGNS);
        qlh:
        $M2 = "\56\57\x73\x65\143\144\163\151\147\x3a\x4b\x65\x79\x49\156\x66\x6f";
        $Hz = $L9->query($M2, $lu);
        $m8 = $Hz->item(0);
        $iV = '';
        if (!$m8) {
            goto cJM;
        }
        $yn = $m8->lookupPrefix(self::XMLDSIGNS);
        if (empty($yn)) {
            goto Trp;
        }
        $iV = $yn . "\72";
        Trp:
        goto ra6;
        cJM:
        $yn = $lu->lookupPrefix(self::XMLDSIGNS);
        if (empty($yn)) {
            goto Ag1;
        }
        $iV = $yn . "\72";
        Ag1:
        $yr = false;
        $m8 = $V8->createElementNS(self::XMLDSIGNS, $iV . "\x4b\145\x79\x49\156\146\x6f");
        $M2 = "\x2e\x2f\163\145\x63\x64\163\151\x67\72\117\x62\152\x65\x63\164";
        $Hz = $L9->query($M2, $lu);
        if (!($PJ = $Hz->item(0))) {
            goto Ksp;
        }
        $PJ->parentNode->insertBefore($m8, $PJ);
        $yr = true;
        Ksp:
        if ($yr) {
            goto LJb;
        }
        $lu->appendChild($m8);
        LJb:
        ra6:
        $Xo = self::staticGet509XCerts($CH, $Sl);
        $tv = $V8->createElementNS(self::XMLDSIGNS, $iV . "\x58\x35\x30\x39\x44\x61\x74\141");
        $m8->appendChild($tv);
        $a0 = false;
        $Q2 = false;
        if (!is_array($p0)) {
            goto EbC;
        }
        if (empty($p0["\151\163\x73\x75\x65\162\123\x65\162\x69\141\154"])) {
            goto Wln;
        }
        $a0 = true;
        Wln:
        if (empty($p0["\163\165\142\x6a\145\x63\164\x4e\141\155\145"])) {
            goto PDd;
        }
        $Q2 = true;
        PDd:
        EbC:
        foreach ($Xo as $g_) {
            if (!($a0 || $Q2)) {
                goto VV3;
            }
            if (!($pR = openssl_x509_parse("\x2d\x2d\55\55\55\102\105\107\111\x4e\x20\x43\x45\122\x54\111\x46\x49\103\x41\124\x45\55\x2d\55\x2d\x2d\xa" . chunk_split($g_, 64, "\xa") . "\x2d\55\x2d\x2d\x2d\105\116\x44\x20\103\x45\122\124\111\106\x49\x43\x41\124\x45\x2d\55\55\55\55\xa"))) {
                goto bBT;
            }
            if (!($Q2 && !empty($pR["\x73\x75\x62\x6a\x65\x63\164"]))) {
                goto qjK;
            }
            if (is_array($pR["\163\165\142\152\x65\143\164"])) {
                goto hPq;
            }
            $Ka = $pR["\151\163\163\x75\145\x72"];
            goto Zgo;
            hPq:
            $jE = array();
            foreach ($pR["\163\x75\142\x6a\145\143\x74"] as $nA => $bc) {
                if (is_array($bc)) {
                    goto V1j;
                }
                array_unshift($jE, "{$nA}\x3d{$bc}");
                goto A4E;
                V1j:
                foreach ($bc as $yP) {
                    array_unshift($jE, "{$nA}\75{$yP}");
                    wbk:
                }
                PWm:
                A4E:
                KwD:
            }
            K6b:
            $Ka = implode("\x2c", $jE);
            Zgo:
            $I6 = $V8->createElementNS(self::XMLDSIGNS, $iV . "\130\x35\x30\71\x53\165\142\x6a\x65\143\164\116\x61\x6d\x65", $Ka);
            $tv->appendChild($I6);
            qjK:
            if (!($a0 && !empty($pR["\x69\163\163\165\145\162"]) && !empty($pR["\x73\145\x72\x69\x61\x6c\116\x75\x6d\142\x65\x72"]))) {
                goto VnK;
            }
            if (is_array($pR["\x69\163\x73\165\x65\162"])) {
                goto xAY;
            }
            $uy = $pR["\x69\x73\163\165\145\162"];
            goto Cua;
            xAY:
            $jE = array();
            foreach ($pR["\x69\x73\x73\x75\x65\162"] as $nA => $bc) {
                array_unshift($jE, "{$nA}\x3d{$bc}");
                wio:
            }
            QI6:
            $uy = implode("\x2c", $jE);
            Cua:
            $mz = $V8->createElementNS(self::XMLDSIGNS, $iV . "\130\65\60\71\111\163\x73\x75\145\x72\x53\x65\x72\x69\141\x6c");
            $tv->appendChild($mz);
            $LU = $V8->createElementNS(self::XMLDSIGNS, $iV . "\x58\x35\60\x39\x49\163\x73\165\145\x72\x4e\141\155\x65", $uy);
            $mz->appendChild($LU);
            $LU = $V8->createElementNS(self::XMLDSIGNS, $iV . "\130\x35\x30\71\x53\145\162\151\141\154\x4e\165\155\x62\x65\162", $pR["\163\x65\x72\x69\x61\154\x4e\x75\155\x62\145\x72"]);
            $mz->appendChild($LU);
            VnK:
            bBT:
            VV3:
            $wZ = $V8->createElementNS(self::XMLDSIGNS, $iV . "\130\65\x30\x39\103\x65\162\x74\x69\x66\x69\143\141\164\145", $g_);
            $tv->appendChild($wZ);
            Dha:
        }
        Z7H:
    }
    public function add509Cert($CH, $Sl = true, $XD = false, $p0 = null)
    {
        if (!($L9 = $this->getXPathObj())) {
            goto wht;
        }
        self::staticAdd509Cert($this->sigNode, $CH, $Sl, $XD, $L9, $p0);
        wht:
    }
    public function appendToKeyInfo($m0)
    {
        $lu = $this->sigNode;
        $V8 = $lu->ownerDocument;
        $L9 = $this->getXPathObj();
        if (!empty($L9)) {
            goto J1U;
        }
        $L9 = new DOMXPath($lu->ownerDocument);
        $L9->registerNamespace("\x73\145\143\x64\x73\x69\147", self::XMLDSIGNS);
        J1U:
        $M2 = "\56\57\163\x65\143\144\163\x69\147\x3a\x4b\145\171\x49\156\146\x6f";
        $Hz = $L9->query($M2, $lu);
        $m8 = $Hz->item(0);
        if ($m8) {
            goto tEs;
        }
        $iV = '';
        $yn = $lu->lookupPrefix(self::XMLDSIGNS);
        if (empty($yn)) {
            goto cb3;
        }
        $iV = $yn . "\72";
        cb3:
        $yr = false;
        $m8 = $V8->createElementNS(self::XMLDSIGNS, $iV . "\x4b\x65\171\111\x6e\146\x6f");
        $M2 = "\56\57\x73\145\x63\x64\x73\x69\x67\72\x4f\x62\x6a\x65\143\x74";
        $Hz = $L9->query($M2, $lu);
        if (!($PJ = $Hz->item(0))) {
            goto yTc;
        }
        $PJ->parentNode->insertBefore($m8, $PJ);
        $yr = true;
        yTc:
        if ($yr) {
            goto VE0;
        }
        $lu->appendChild($m8);
        VE0:
        tEs:
        $m8->appendChild($m0);
        return $m8;
    }
    public function getValidatedNodes()
    {
        return $this->validatedNodes;
    }
}
