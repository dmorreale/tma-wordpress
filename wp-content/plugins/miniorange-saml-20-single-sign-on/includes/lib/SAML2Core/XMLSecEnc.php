<?php


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath;
class XMLSecEnc
{
    const template = "\x3c\x78\145\x6e\143\x3a\x45\156\x63\x72\x79\160\164\145\x64\x44\141\x74\141\40\170\155\x6c\156\x73\72\170\x65\x6e\x63\75\x27\150\x74\x74\160\72\57\57\167\167\x77\56\167\x33\56\157\162\x67\x2f\62\60\x30\61\x2f\x30\64\x2f\x78\x6d\x6c\x65\156\x63\43\47\x3e\xd\12\x20\40\x20\x3c\x78\x65\x6e\143\x3a\103\x69\x70\x68\145\162\104\x61\x74\141\76\15\xa\40\x20\x20\x20\40\40\74\x78\145\x6e\x63\72\x43\151\x70\150\145\x72\126\141\x6c\165\145\76\74\x2f\170\145\x6e\143\x3a\103\x69\160\x68\145\x72\x56\x61\x6c\165\x65\x3e\15\xa\40\40\x20\x3c\x2f\x78\x65\x6e\143\x3a\x43\151\x70\x68\x65\162\104\141\164\141\x3e\15\12\x3c\57\170\145\156\x63\x3a\x45\156\143\162\171\x70\x74\x65\144\104\x61\x74\141\x3e";
    const Element = "\150\x74\164\x70\x3a\57\x2f\167\167\x77\x2e\x77\63\x2e\157\162\x67\57\x32\x30\60\61\x2f\x30\x34\57\x78\x6d\154\x65\156\143\43\x45\154\x65\x6d\x65\x6e\164";
    const Content = "\150\x74\164\x70\72\57\57\x77\167\167\56\167\63\x2e\x6f\162\147\57\62\x30\60\x31\57\60\x34\x2f\x78\155\x6c\145\x6e\x63\x23\x43\157\x6e\x74\145\156\164";
    const URI = 3;
    const XMLENCNS = "\x68\x74\x74\x70\x3a\57\x2f\167\x77\167\56\167\63\x2e\157\x72\147\x2f\x32\x30\x30\61\57\x30\x34\57\x78\155\154\x65\156\x63\x23";
    private $encdoc = null;
    private $rawNode = null;
    public $type = null;
    public $encKey = null;
    private $references = array();
    public function __construct()
    {
        $this->_resetTemplate();
    }
    private function _resetTemplate()
    {
        $this->encdoc = new DOMDocument();
        $this->encdoc->loadXML(self::template);
    }
    public function addReference($lw, $m0, $Cq)
    {
        if ($m0 instanceof DOMNode) {
            goto qVQ;
        }
        throw new Exception("\x24\x6e\157\x64\x65\x20\x69\x73\x20\156\x6f\x74\x20\x6f\146\40\x74\171\x70\145\x20\x44\x4f\115\x4e\157\x64\145");
        qVQ:
        $GA = $this->encdoc;
        $this->_resetTemplate();
        $XJ = $this->encdoc;
        $this->encdoc = $GA;
        $Vc = XMLSecurityDSig::generateGUID();
        $Qp = $XJ->documentElement;
        $Qp->setAttribute("\111\144", $Vc);
        $this->references[$lw] = array("\x6e\x6f\x64\x65" => $m0, "\164\x79\x70\145" => $Cq, "\145\x6e\143\x6e\x6f\x64\x65" => $XJ, "\162\x65\146\x75\162\151" => $Vc);
    }
    public function setNode($m0)
    {
        $this->rawNode = $m0;
    }
    public function encryptNode($bD, $Mu = true)
    {
        $lE = '';
        if (!empty($this->rawNode)) {
            goto j2v;
        }
        throw new Exception("\x4e\157\144\x65\x20\x74\x6f\x20\145\x6e\x63\x72\x79\x70\x74\40\150\141\x73\40\156\157\164\x20\142\145\145\156\x20\163\145\x74");
        j2v:
        if ($bD instanceof XMLSecurityKey) {
            goto Pxm;
        }
        throw new Exception("\x49\156\x76\141\x6c\x69\x64\x20\113\x65\171");
        Pxm:
        $dK = $this->rawNode->ownerDocument;
        $dJ = new DOMXPath($this->encdoc);
        $EG = $dJ->query("\x2f\x78\x65\x6e\x63\72\x45\156\x63\162\x79\160\164\x65\144\104\x61\164\x61\x2f\170\x65\156\143\72\103\x69\x70\x68\145\162\x44\141\x74\x61\57\170\x65\156\x63\72\103\151\x70\x68\145\162\126\141\x6c\x75\145");
        $T4 = $EG->item(0);
        if (!($T4 == null)) {
            goto zKL;
        }
        throw new Exception("\x45\x72\162\x6f\162\x20\x6c\157\x63\141\x74\151\156\x67\x20\103\151\160\x68\145\x72\x56\x61\x6c\x75\145\40\145\154\145\155\x65\156\x74\40\167\151\x74\x68\151\156\x20\x74\145\x6d\160\154\141\164\145");
        zKL:
        switch ($this->type) {
            case self::Element:
                $lE = $dK->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute("\x54\x79\x70\x65", self::Element);
                goto S42;
            case self::Content:
                $ze = $this->rawNode->childNodes;
                foreach ($ze as $ZB) {
                    $lE .= $dK->saveXML($ZB);
                    WCY:
                }
                n0j:
                $this->encdoc->documentElement->setAttribute("\x54\x79\160\x65", self::Content);
                goto S42;
            default:
                throw new Exception("\124\x79\x70\x65\40\151\x73\x20\x63\165\162\162\x65\x6e\164\x6c\171\x20\156\x6f\x74\40\x73\x75\x70\160\x6f\x72\x74\145\144");
        }
        y4H:
        S42:
        $LI = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\143\72\x45\x6e\x63\x72\171\160\x74\x69\x6f\x6e\x4d\145\x74\x68\x6f\144"));
        $LI->setAttribute("\x41\x6c\x67\x6f\162\x69\164\150\155", $bD->getAlgorithm());
        $T4->parentNode->parentNode->insertBefore($LI, $T4->parentNode->parentNode->firstChild);
        $gG = base64_encode($bD->encryptData($lE));
        $bc = $this->encdoc->createTextNode($gG);
        $T4->appendChild($bc);
        if ($Mu) {
            goto Lfs;
        }
        return $this->encdoc->documentElement;
        goto zhI;
        Lfs:
        switch ($this->type) {
            case self::Element:
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto pK5;
                }
                return $this->encdoc;
                pK5:
                $sj = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                $this->rawNode->parentNode->replaceChild($sj, $this->rawNode);
                return $sj;
            case self::Content:
                $sj = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                M9d:
                if (!$this->rawNode->firstChild) {
                    goto hvq;
                }
                $this->rawNode->removeChild($this->rawNode->firstChild);
                goto M9d;
                hvq:
                $this->rawNode->appendChild($sj);
                return $sj;
        }
        Xkc:
        mg0:
        zhI:
    }
    public function encryptReferences($bD)
    {
        $Hj = $this->rawNode;
        $yO = $this->type;
        foreach ($this->references as $lw => $O2) {
            $this->encdoc = $O2["\x65\x6e\143\x6e\157\x64\x65"];
            $this->rawNode = $O2["\x6e\x6f\144\x65"];
            $this->type = $O2["\164\171\x70\145"];
            try {
                $B9 = $this->encryptNode($bD);
                $this->references[$lw]["\x65\x6e\143\x6e\x6f\144\x65"] = $B9;
            } catch (Exception $GP) {
                $this->rawNode = $Hj;
                $this->type = $yO;
                throw $GP;
            }
            xE4:
        }
        k2W:
        $this->rawNode = $Hj;
        $this->type = $yO;
    }
    public function getCipherValue()
    {
        if (!empty($this->rawNode)) {
            goto rY4;
        }
        throw new Exception("\116\157\144\x65\40\164\x6f\x20\x64\x65\143\162\171\160\164\40\x68\x61\163\40\156\157\x74\40\142\x65\145\x6e\x20\x73\x65\x74");
        rY4:
        $dK = $this->rawNode->ownerDocument;
        $dJ = new DOMXPath($dK);
        $dJ->registerNamespace("\170\155\x6c\x65\156\x63\x72", self::XMLENCNS);
        $M2 = "\56\x2f\170\x6d\x6c\145\x6e\143\162\72\103\151\160\x68\x65\162\104\141\x74\x61\x2f\x78\155\x6c\145\156\x63\162\72\x43\151\x70\x68\x65\162\x56\141\x6c\x75\145";
        $Hz = $dJ->query($M2, $this->rawNode);
        $m0 = $Hz->item(0);
        if ($m0) {
            goto An3;
        }
        return null;
        An3:
        return base64_decode($m0->nodeValue);
    }
    public function decryptNode($bD, $Mu = true)
    {
        if ($bD instanceof XMLSecurityKey) {
            goto QuL;
        }
        throw new Exception("\111\156\x76\x61\x6c\151\144\x20\x4b\145\x79");
        QuL:
        $hS = $this->getCipherValue();
        if ($hS) {
            goto ic6;
        }
        throw new Exception("\x43\141\156\156\x6f\164\x20\x6c\157\143\x61\164\145\40\x65\156\x63\162\171\160\164\145\144\x20\144\141\x74\x61");
        goto ojJ;
        ic6:
        $xo = $bD->decryptData($hS);
        if ($Mu) {
            goto Chz;
        }
        return $xo;
        goto QHA;
        Chz:
        switch ($this->type) {
            case self::Element:
                $ky = new DOMDocument();
                $ky->loadXML($xo);
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto bi0;
                }
                return $ky;
                bi0:
                $sj = $this->rawNode->ownerDocument->importNode($ky->documentElement, true);
                $this->rawNode->parentNode->replaceChild($sj, $this->rawNode);
                return $sj;
            case self::Content:
                if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                    goto sKQ;
                }
                $dK = $this->rawNode->ownerDocument;
                goto kPi;
                sKQ:
                $dK = $this->rawNode;
                kPi:
                $iB = $dK->createDocumentFragment();
                $iB->appendXML($xo);
                $UX = $this->rawNode->parentNode;
                $UX->replaceChild($iB, $this->rawNode);
                return $UX;
            default:
                return $xo;
        }
        IWz:
        b2Z:
        QHA:
        ojJ:
    }
    public function encryptKey($fd, $pt, $e7 = true)
    {
        if (!(!$fd instanceof XMLSecurityKey || !$pt instanceof XMLSecurityKey)) {
            goto dCv;
        }
        throw new Exception("\111\x6e\166\x61\154\151\144\40\x4b\145\x79");
        dCv:
        $dr = base64_encode($fd->encryptData($pt->key));
        $Jy = $this->encdoc->documentElement;
        $pF = $this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\x63\x3a\105\x6e\x63\162\x79\160\x74\145\x64\113\145\171");
        if ($e7) {
            goto iHC;
        }
        $this->encKey = $pF;
        goto cqY;
        iHC:
        $m8 = $Jy->insertBefore($this->encdoc->createElementNS("\150\x74\x74\x70\72\x2f\57\x77\x77\x77\56\167\x33\x2e\x6f\162\147\57\62\60\x30\x30\x2f\60\71\57\x78\155\x6c\144\163\x69\147\43", "\x64\163\x69\147\72\113\x65\x79\111\x6e\146\x6f"), $Jy->firstChild);
        $m8->appendChild($pF);
        cqY:
        $LI = $pF->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\x63\x3a\105\156\143\x72\171\160\x74\151\x6f\156\x4d\145\164\150\157\x64"));
        $LI->setAttribute("\x41\x6c\147\157\x72\x69\164\150\x6d", $fd->getAlgorith());
        if (empty($fd->name)) {
            goto zy7;
        }
        $m8 = $pF->appendChild($this->encdoc->createElementNS("\x68\164\164\160\x3a\x2f\x2f\x77\167\167\56\167\63\x2e\157\162\x67\x2f\x32\x30\60\x30\57\x30\x39\57\170\155\154\144\x73\x69\x67\43", "\x64\163\x69\147\72\x4b\x65\x79\111\x6e\x66\157"));
        $m8->appendChild($this->encdoc->createElementNS("\150\x74\164\x70\x3a\57\57\167\167\x77\x2e\x77\63\x2e\157\x72\147\x2f\62\x30\x30\x30\57\60\71\x2f\x78\x6d\x6c\x64\163\x69\147\x23", "\x64\x73\151\x67\x3a\x4b\145\171\116\x61\155\x65", $fd->name));
        zy7:
        $II = $pF->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\x63\72\x43\151\160\x68\145\162\x44\x61\164\x61"));
        $II->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\x6e\x63\x3a\103\x69\160\150\145\162\126\x61\154\165\x65", $dr));
        if (!(is_array($this->references) && count($this->references) > 0)) {
            goto upr;
        }
        $ju = $pF->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\143\x3a\x52\145\x66\145\162\145\x6e\143\x65\x4c\x69\163\164"));
        foreach ($this->references as $lw => $O2) {
            $Vc = $O2["\162\x65\146\x75\x72\x69"];
            $qx = $ju->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\x63\72\104\141\164\141\x52\x65\146\145\162\145\156\143\x65"));
            $qx->setAttribute("\x55\122\111", "\x23" . $Vc);
            p5A:
        }
        iO9:
        upr:
        return;
    }
    public function decryptKey($pF)
    {
        if ($pF->isEncrypted) {
            goto hzi;
        }
        throw new Exception("\113\145\171\40\151\x73\40\156\157\164\x20\105\x6e\x63\x72\x79\160\164\145\144");
        hzi:
        if (!empty($pF->key)) {
            goto ksM;
        }
        throw new Exception("\x4b\145\x79\40\x69\163\x20\x6d\151\x73\163\151\x6e\x67\x20\144\141\x74\x61\40\164\157\40\160\x65\162\146\157\x72\155\x20\x74\150\145\40\x64\x65\x63\x72\x79\160\164\x69\x6f\x6e");
        ksM:
        return $this->decryptNode($pF, false);
    }
    public function locateEncryptedData($Qp)
    {
        if ($Qp instanceof DOMDocument) {
            goto WeJ;
        }
        $dK = $Qp->ownerDocument;
        goto p6L;
        WeJ:
        $dK = $Qp;
        p6L:
        if (!$dK) {
            goto Pvm;
        }
        $L9 = new DOMXPath($dK);
        $M2 = "\57\57\52\133\154\x6f\x63\141\x6c\x2d\156\141\155\145\x28\51\x3d\x27\x45\156\x63\162\171\x70\164\145\144\x44\x61\164\x61\x27\x20\x61\x6e\144\x20\x6e\x61\155\x65\x73\x70\141\143\x65\55\165\x72\151\x28\51\x3d\x27" . self::XMLENCNS . "\47\x5d";
        $Hz = $L9->query($M2);
        return $Hz->item(0);
        Pvm:
        return null;
    }
    public function locateKey($m0 = null)
    {
        if (!empty($m0)) {
            goto shj;
        }
        $m0 = $this->rawNode;
        shj:
        if ($m0 instanceof DOMNode) {
            goto DfU;
        }
        return null;
        DfU:
        if (!($dK = $m0->ownerDocument)) {
            goto qhL;
        }
        $L9 = new DOMXPath($dK);
        $L9->registerNamespace("\170\155\x6c\163\x65\x63\145\x6e\x63", self::XMLENCNS);
        $M2 = "\x2e\x2f\57\x78\x6d\x6c\163\145\143\x65\x6e\143\72\105\156\143\x72\x79\160\x74\151\157\x6e\115\145\x74\x68\157\x64";
        $Hz = $L9->query($M2, $m0);
        if (!($P3 = $Hz->item(0))) {
            goto MyE;
        }
        $pP = $P3->getAttribute("\x41\154\x67\x6f\162\x69\x74\150\x6d");
        try {
            $bD = new XMLSecurityKey($pP, array("\164\x79\x70\145" => "\x70\162\151\166\x61\x74\145"));
        } catch (Exception $GP) {
            return null;
        }
        return $bD;
        MyE:
        qhL:
        return null;
    }
    public static function staticLocateKeyInfo($oU = null, $m0 = null)
    {
        if (!(empty($m0) || !$m0 instanceof DOMNode)) {
            goto yMx;
        }
        return null;
        yMx:
        $dK = $m0->ownerDocument;
        if ($dK) {
            goto fKz;
        }
        return null;
        fKz:
        $L9 = new DOMXPath($dK);
        $L9->registerNamespace("\170\x6d\x6c\x73\x65\143\x65\x6e\143", self::XMLENCNS);
        $L9->registerNamespace("\170\x6d\154\x73\x65\143\x64\x73\151\x67", XMLSecurityDSig::XMLDSIGNS);
        $M2 = "\56\x2f\x78\x6d\154\x73\145\143\144\163\151\147\x3a\113\145\x79\x49\x6e\146\157";
        $Hz = $L9->query($M2, $m0);
        $P3 = $Hz->item(0);
        if ($P3) {
            goto WrO;
        }
        return $oU;
        WrO:
        foreach ($P3->childNodes as $ZB) {
            switch ($ZB->localName) {
                case "\113\x65\171\x4e\x61\x6d\145":
                    if (empty($oU)) {
                        goto xF1;
                    }
                    $oU->name = $ZB->nodeValue;
                    xF1:
                    goto lw_;
                case "\x4b\x65\171\x56\141\154\165\x65":
                    foreach ($ZB->childNodes as $W8) {
                        switch ($W8->localName) {
                            case "\x44\x53\x41\x4b\x65\171\x56\141\154\165\145":
                                throw new Exception("\x44\x53\101\x4b\145\171\126\141\x6c\165\x65\x20\x63\x75\162\162\145\x6e\x74\154\171\x20\x6e\157\x74\x20\x73\x75\160\160\157\x72\164\x65\x64");
                            case "\x52\x53\101\x4b\x65\171\126\x61\154\x75\x65":
                                $Kf = null;
                                $wf = null;
                                if (!($qb = $W8->getElementsByTagName("\115\157\144\x75\154\165\x73")->item(0))) {
                                    goto qJR;
                                }
                                $Kf = base64_decode($qb->nodeValue);
                                qJR:
                                if (!($bu = $W8->getElementsByTagName("\105\x78\x70\157\156\x65\156\x74")->item(0))) {
                                    goto lmz;
                                }
                                $wf = base64_decode($bu->nodeValue);
                                lmz:
                                if (!(empty($Kf) || empty($wf))) {
                                    goto e1F;
                                }
                                throw new Exception("\x4d\x69\163\163\151\x6e\147\40\x4d\157\x64\x75\x6c\165\163\40\157\162\40\x45\170\x70\x6f\x6e\145\156\x74");
                                e1F:
                                $kT = XMLSecurityKey::convertRSA($Kf, $wf);
                                $oU->loadKey($kT);
                                goto hXQ;
                        }
                        bG8:
                        hXQ:
                        DuU:
                    }
                    uhb:
                    goto lw_;
                case "\122\145\164\162\x69\145\166\x61\x6c\x4d\145\164\x68\157\x64":
                    $Cq = $ZB->getAttribute("\124\x79\x70\x65");
                    if (!($Cq !== "\150\164\x74\160\72\57\x2f\x77\167\x77\x2e\x77\63\x2e\157\162\147\x2f\x32\x30\x30\x31\57\60\64\57\170\155\154\145\156\x63\x23\x45\x6e\143\162\x79\160\164\x65\144\x4b\x65\171")) {
                        goto Js8;
                    }
                    goto lw_;
                    Js8:
                    $jU = $ZB->getAttribute("\125\x52\111");
                    if (!($jU[0] !== "\x23")) {
                        goto ATZ;
                    }
                    goto lw_;
                    ATZ:
                    $lZ = substr($jU, 1);
                    $M2 = "\x2f\57\170\155\x6c\163\x65\x63\x65\156\143\x3a\105\x6e\143\162\x79\x70\x74\x65\144\x4b\145\171\x5b\x40\x49\x64\x3d\42" . XPath::filterAttrValue($lZ, XPath::DOUBLE_QUOTE) . "\x22\135";
                    $k7 = $L9->query($M2)->item(0);
                    if ($k7) {
                        goto fQE;
                    }
                    throw new Exception("\125\156\x61\x62\x6c\145\40\x74\x6f\40\154\x6f\x63\141\x74\145\40\x45\x6e\x63\x72\x79\160\x74\x65\x64\113\x65\x79\x20\x77\x69\164\150\40\x40\x49\x64\75\x27{$lZ}\x27\56");
                    fQE:
                    return XMLSecurityKey::fromEncryptedKeyElement($k7);
                case "\x45\x6e\143\x72\x79\x70\164\x65\144\113\x65\171":
                    return XMLSecurityKey::fromEncryptedKeyElement($ZB);
                case "\130\65\60\x39\x44\141\164\141":
                    if (!($s8 = $ZB->getElementsByTagName("\130\x35\60\x39\x43\145\162\164\151\x66\x69\143\x61\x74\x65"))) {
                        goto b9g;
                    }
                    if (!($s8->length > 0)) {
                        goto qAr;
                    }
                    $b2 = $s8->item(0)->textContent;
                    $b2 = str_replace(array("\xd", "\12", "\x20"), '', $b2);
                    $b2 = "\55\55\55\x2d\55\102\x45\x47\x49\x4e\x20\x43\105\x52\x54\111\106\111\x43\x41\x54\x45\55\x2d\x2d\x2d\55\xa" . chunk_split($b2, 64, "\xa") . "\x2d\55\x2d\x2d\55\x45\116\104\x20\103\105\122\124\111\x46\x49\x43\101\x54\x45\x2d\55\x2d\x2d\x2d\xa";
                    $oU->loadKey($b2, false, true);
                    qAr:
                    b9g:
                    goto lw_;
            }
            wKt:
            lw_:
            Rll:
        }
        hMH:
        return $oU;
    }
    public function locateKeyInfo($oU = null, $m0 = null)
    {
        if (!empty($m0)) {
            goto gZ0;
        }
        $m0 = $this->rawNode;
        gZ0:
        return self::staticLocateKeyInfo($oU, $m0);
    }
}
