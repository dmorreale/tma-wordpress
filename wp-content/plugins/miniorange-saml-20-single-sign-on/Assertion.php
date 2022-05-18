<?php


include_once "\125\164\x69\x6c\151\x74\151\x65\x73\56\x70\150\x70";
include_once "\x78\x6d\154\x73\145\143\154\151\142\x73\x2e\x70\150\x70";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
class SAML2_Assertion
{
    private $id;
    private $issueInstant;
    private $issuer;
    private $nameId;
    private $encryptedNameId;
    private $encryptedAttribute;
    private $encryptionKey;
    private $notBefore;
    private $notOnOrAfter;
    private $validAudiences;
    private $sessionNotOnOrAfter;
    private $sessionIndex;
    private $authnInstant;
    private $authnContextClassRef;
    private $authnContextDecl;
    private $authnContextDeclRef;
    private $AuthenticatingAuthority;
    private $attributes;
    private $nameFormat;
    private $signatureKey;
    private $certificates;
    private $signatureData;
    private $requiredEncAttributes;
    private $SubjectConfirmation;
    private $privateKeyUrl;
    protected $wasSignedAtConstruction = FALSE;
    public function __construct(DOMElement $pe = NULL, $Qn)
    {
        $this->id = Utilities::generateId();
        $this->issueInstant = Utilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = Utilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\165\x72\156\72\157\141\163\151\x73\72\x6e\141\x6d\x65\x73\x3a\x74\x63\x3a\123\x41\x4d\114\x3a\x31\x2e\x31\72\156\x61\155\145\x69\x64\x2d\146\x6f\x72\x6d\x61\x74\72\x75\156\163\160\145\x63\151\x66\x69\x65\x64";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($pe === NULL)) {
            goto dc;
        }
        return;
        dc:
        if (!($pe->localName === "\x45\x6e\143\162\171\x70\x74\145\144\x41\163\x73\x65\162\x74\x69\x6f\x6e")) {
            goto Zz;
        }
        $lE = Utilities::xpQuery($pe, "\56\57\170\x65\x6e\x63\72\105\156\x63\x72\171\x70\164\145\144\104\x61\x74\x61");
        $vO = Utilities::xpQuery($pe, "\57\57\x2a\133\x6c\157\x63\141\x6c\x2d\x6e\x61\155\x65\x28\x29\x3d\x27\x45\156\143\162\171\160\164\145\x64\x4b\x65\171\x27\x5d\57\x2a\x5b\x6c\157\143\141\154\55\156\141\x6d\145\x28\51\x3d\47\x45\156\x63\x72\x79\x70\164\151\157\156\115\x65\x74\x68\157\144\47\135\x2f\100\x41\154\147\x6f\x72\x69\164\x68\x6d");
        $L_ = $vO[0]->value;
        $Eo = Utilities::getEncryptionAlgorithm($L_);
        if (count($lE) === 0) {
            goto PL;
        }
        if (count($lE) > 1) {
            goto ra;
        }
        goto A3;
        PL:
        throw new Exception("\115\x69\x73\x73\x69\156\x67\40\x65\x6e\143\162\171\x70\x74\x65\x64\40\x64\141\164\x61\40\151\156\x20\74\163\141\155\x6c\72\x45\x6e\x63\x72\171\160\164\145\x64\101\163\x73\x65\x72\164\151\157\156\x3e\56");
        goto A3;
        ra:
        throw new Exception("\x4d\x6f\162\x65\x20\164\150\141\x6e\x20\157\x6e\x65\40\145\156\x63\162\x79\160\x74\x65\144\40\x64\x61\x74\x61\x20\145\x6c\145\155\145\x6e\164\x20\x69\x6e\x20\74\x73\x61\x6d\x6c\x3a\x45\x6e\x63\x72\171\x70\x74\x65\144\101\163\163\145\x72\x74\x69\157\x6e\76\56");
        A3:
        $nA = new XMLSecurityKey($Eo, array("\x74\x79\160\x65" => "\x70\162\x69\166\141\x74\145"));
        $nA->loadKey($Qn, FALSE);
        $Y9 = array();
        $pe = Utilities::decryptElement($lE[0], $nA, $Y9);
        Zz:
        if ($pe->hasAttribute("\x49\104")) {
            goto Hb;
        }
        throw new Exception("\x4d\151\x73\163\151\x6e\x67\x20\111\104\x20\x61\164\x74\x72\151\x62\165\x74\x65\x20\157\156\x20\x53\x41\x4d\114\x20\141\x73\163\145\x72\x74\151\157\156\56");
        Hb:
        $this->id = $pe->getAttribute("\111\x44");
        if (!($pe->getAttribute("\126\x65\x72\163\151\x6f\156") !== "\62\56\x30")) {
            goto jA;
        }
        throw new Exception("\x55\x6e\163\165\x70\x70\157\x72\x74\x65\x64\x20\166\145\162\163\151\157\x6e\x3a\40" . $pe->getAttribute("\126\x65\162\163\151\157\156"));
        jA:
        $this->issueInstant = Utilities::xsDateTimeToTimestamp($pe->getAttribute("\111\163\x73\x75\145\111\156\163\164\141\156\x74"));
        $jj = Utilities::xpQuery($pe, "\x2e\57\163\141\155\x6c\137\x61\x73\x73\x65\x72\164\151\157\156\x3a\x49\163\x73\x75\x65\162");
        if (!empty($jj)) {
            goto BM;
        }
        throw new Exception("\x4d\x69\x73\163\151\x6e\147\40\74\163\141\x6d\x6c\x3a\x49\x73\163\165\145\162\x3e\x20\151\156\40\x61\x73\163\x65\x72\164\151\x6f\x6e\x2e");
        BM:
        $this->issuer = trim($jj[0]->textContent);
        $this->parseConditions($pe);
        $this->parseAuthnStatement($pe);
        $this->parseAttributes($pe);
        $this->parseEncryptedAttributes($pe);
        $this->parseSignature($pe);
        $this->parseSubject($pe);
    }
    private function parseSubject(DOMElement $pe)
    {
        $Jf = Utilities::xpQuery($pe, "\56\57\163\141\x6d\154\137\141\163\163\x65\162\164\x69\x6f\x6e\x3a\123\x75\x62\152\145\x63\164");
        if (empty($Jf)) {
            goto Lw;
        }
        if (count($Jf) > 1) {
            goto H_;
        }
        goto XM;
        Lw:
        return;
        goto XM;
        H_:
        throw new Exception("\115\x6f\162\x65\x20\x74\150\141\x6e\x20\x6f\156\x65\40\74\163\141\155\x6c\72\x53\x75\142\x6a\x65\143\164\x3e\x20\x69\x6e\x20\x3c\163\x61\x6d\154\x3a\x41\x73\x73\145\x72\x74\151\x6f\156\x3e\56");
        XM:
        $Jf = $Jf[0];
        $KB = Utilities::xpQuery($Jf, "\x2e\x2f\x73\x61\x6d\154\x5f\141\163\x73\x65\x72\164\x69\157\156\x3a\x4e\x61\x6d\145\x49\x44\40\174\x20\x2e\x2f\x73\x61\155\154\137\x61\x73\163\x65\162\164\x69\x6f\156\72\105\x6e\143\162\x79\x70\164\x65\x64\x49\x44\57\170\x65\156\x63\x3a\x45\156\x63\x72\171\160\164\145\144\x44\141\164\x61");
        if (empty($KB)) {
            goto Uf;
        }
        if (count($KB) > 1) {
            goto H1;
        }
        goto Nt;
        Uf:
        throw new Exception("\115\x69\x73\163\151\x6e\147\40\74\163\141\155\154\72\116\x61\x6d\145\x49\x44\x3e\x20\157\162\40\x3c\163\141\155\x6c\72\105\156\143\162\x79\160\164\x65\144\x49\104\76\x20\x69\156\40\74\x73\x61\155\154\72\x53\x75\142\152\x65\x63\x74\x3e\x2e");
        goto Nt;
        H1:
        throw new Exception("\115\157\x72\x65\40\x74\x68\141\156\x20\157\x6e\x65\40\74\x73\x61\x6d\154\x3a\116\141\x6d\145\111\x44\76\40\x6f\162\x20\x3c\x73\141\155\x6c\72\105\x6e\143\x72\171\160\x74\145\144\104\76\x20\151\x6e\x20\74\163\x61\155\154\72\x53\x75\142\x6a\145\x63\x74\x3e\x2e");
        Nt:
        $KB = $KB[0];
        if ($KB->localName === "\105\156\143\x72\x79\x70\x74\x65\x64\x44\141\x74\141") {
            goto zj;
        }
        $this->nameId = Utilities::parseNameId($KB);
        goto iN;
        zj:
        $this->encryptedNameId = $KB;
        iN:
    }
    private function parseConditions(DOMElement $pe)
    {
        $Aj = Utilities::xpQuery($pe, "\x2e\x2f\163\x61\155\154\x5f\x61\163\163\145\162\x74\x69\x6f\156\x3a\x43\157\156\x64\151\164\x69\157\x6e\163");
        if (empty($Aj)) {
            goto a1;
        }
        if (count($Aj) > 1) {
            goto mC;
        }
        goto Dt;
        a1:
        return;
        goto Dt;
        mC:
        throw new Exception("\115\x6f\162\145\x20\164\150\x61\x6e\x20\157\156\145\x20\x3c\x73\x61\155\x6c\x3a\x43\157\x6e\144\x69\164\151\157\x6e\163\x3e\x20\x69\156\40\x3c\x73\141\x6d\154\x3a\x41\x73\163\x65\162\164\151\x6f\x6e\x3e\56");
        Dt:
        $Aj = $Aj[0];
        if (!$Aj->hasAttribute("\x4e\157\164\x42\x65\x66\x6f\x72\x65")) {
            goto Sp;
        }
        $VJ = Utilities::xsDateTimeToTimestamp($Aj->getAttribute("\116\x6f\164\102\145\146\x6f\x72\x65"));
        if (!($this->notBefore === NULL || $this->notBefore < $VJ)) {
            goto f0;
        }
        $this->notBefore = $VJ;
        f0:
        Sp:
        if (!$Aj->hasAttribute("\116\157\164\117\x6e\x4f\x72\x41\146\164\x65\x72")) {
            goto p2;
        }
        $Sq = Utilities::xsDateTimeToTimestamp($Aj->getAttribute("\x4e\157\164\117\156\117\162\x41\x66\x74\145\162"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $Sq)) {
            goto TO;
        }
        $this->notOnOrAfter = $Sq;
        TO:
        p2:
        $m0 = $Aj->firstChild;
        Tv:
        if (!($m0 !== NULL)) {
            goto NI;
        }
        if (!$m0 instanceof DOMText) {
            goto VK;
        }
        goto E0;
        VK:
        if (!($m0->namespaceURI !== "\x75\162\x6e\x3a\157\141\x73\x69\x73\72\x6e\x61\155\145\x73\72\164\143\72\x53\x41\115\114\x3a\62\56\x30\72\x61\163\163\145\x72\164\151\157\156")) {
            goto vN;
        }
        throw new Exception("\x55\x6e\x6b\x6e\x6f\x77\156\40\x6e\141\155\x65\163\160\x61\143\145\x20\x6f\x66\x20\143\157\156\144\x69\164\x69\x6f\156\x3a\40" . var_export($m0->namespaceURI, TRUE));
        vN:
        switch ($m0->localName) {
            case "\101\x75\144\151\x65\156\x63\145\122\145\x73\164\x72\151\143\x74\151\157\156":
                $Ig = Utilities::extractStrings($m0, "\165\x72\156\72\157\141\163\x69\x73\72\156\141\x6d\145\163\x3a\164\x63\x3a\x53\101\115\114\72\62\56\x30\x3a\141\x73\163\x65\162\164\151\157\x6e", "\101\x75\x64\x69\145\156\x63\x65");
                if ($this->validAudiences === NULL) {
                    goto Ro;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $Ig);
                goto qT;
                Ro:
                $this->validAudiences = $Ig;
                qT:
                goto jd;
            case "\x4f\x6e\x65\x54\x69\x6d\x65\125\163\145":
                goto jd;
            case "\x50\162\x6f\170\x79\x52\145\163\164\162\151\143\x74\151\157\x6e":
                goto jd;
            default:
                throw new Exception("\x55\156\x6b\x6e\x6f\167\x6e\40\143\x6f\x6e\144\151\164\151\157\156\x3a\x20" . var_export($m0->localName, TRUE));
        }
        wh:
        jd:
        E0:
        $m0 = $m0->nextSibling;
        goto Tv;
        NI:
    }
    private function parseAuthnStatement(DOMElement $pe)
    {
        $vv = Utilities::xpQuery($pe, "\x2e\57\x73\x61\155\154\137\x61\163\x73\x65\x72\x74\x69\x6f\156\x3a\x41\x75\164\150\156\123\x74\x61\164\145\x6d\145\156\164");
        if (empty($vv)) {
            goto r6;
        }
        if (count($vv) > 1) {
            goto h3;
        }
        goto qd;
        r6:
        $this->authnInstant = NULL;
        return;
        goto qd;
        h3:
        throw new Exception("\x4d\x6f\162\145\x20\164\150\x61\x74\x20\x6f\156\x65\x20\74\163\141\x6d\x6c\x3a\x41\x75\x74\150\x6e\123\164\141\x74\145\x6d\145\156\x74\76\x20\x69\156\40\x3c\x73\x61\x6d\x6c\72\101\163\x73\x65\x72\x74\151\x6f\156\76\40\x6e\157\x74\40\163\x75\160\x70\x6f\162\x74\x65\144\x2e");
        qd:
        $YC = $vv[0];
        if ($YC->hasAttribute("\x41\x75\x74\x68\156\x49\x6e\163\164\x61\156\x74")) {
            goto nQ;
        }
        throw new Exception("\x4d\x69\x73\163\151\x6e\147\40\x72\x65\x71\x75\151\162\x65\x64\40\x41\x75\164\x68\x6e\111\156\x73\164\x61\156\x74\40\141\x74\x74\x72\151\142\165\x74\145\40\x6f\x6e\40\74\x73\x61\155\x6c\72\101\165\x74\x68\156\x53\164\141\164\x65\x6d\145\x6e\x74\76\x2e");
        nQ:
        $this->authnInstant = Utilities::xsDateTimeToTimestamp($YC->getAttribute("\x41\x75\164\x68\156\111\156\163\164\141\156\164"));
        if (!$YC->hasAttribute("\x53\145\x73\x73\x69\157\x6e\x4e\x6f\x74\x4f\x6e\117\162\101\146\164\145\x72")) {
            goto pA;
        }
        $this->sessionNotOnOrAfter = Utilities::xsDateTimeToTimestamp($YC->getAttribute("\x53\x65\163\163\x69\157\156\x4e\x6f\x74\x4f\156\x4f\162\101\x66\164\x65\x72"));
        pA:
        if (!$YC->hasAttribute("\x53\145\163\163\151\x6f\156\111\x6e\144\145\170")) {
            goto me;
        }
        $this->sessionIndex = $YC->getAttribute("\x53\x65\163\163\151\157\156\x49\x6e\x64\145\170");
        me:
        $this->parseAuthnContext($YC);
    }
    private function parseAuthnContext(DOMElement $Ov)
    {
        $o8 = Utilities::xpQuery($Ov, "\x2e\x2f\x73\x61\x6d\154\137\x61\x73\x73\x65\162\x74\151\x6f\x6e\72\101\165\164\x68\156\103\x6f\156\x74\x65\170\164");
        if (count($o8) > 1) {
            goto D_;
        }
        if (empty($o8)) {
            goto i4;
        }
        goto aE;
        D_:
        throw new Exception("\x4d\157\x72\x65\40\x74\x68\x61\x6e\40\157\x6e\145\40\x3c\x73\x61\155\154\x3a\101\x75\164\x68\x6e\x43\x6f\156\x74\x65\x78\x74\x3e\x20\x69\x6e\40\74\x73\x61\x6d\154\x3a\101\x75\164\x68\156\x53\164\141\x74\x65\155\145\156\x74\76\x2e");
        goto aE;
        i4:
        throw new Exception("\x4d\151\163\x73\151\156\x67\x20\162\145\x71\x75\151\x72\x65\x64\40\x3c\x73\x61\x6d\x6c\x3a\101\x75\164\150\x6e\x43\x6f\x6e\164\145\170\x74\76\40\151\x6e\40\74\163\141\155\154\72\101\165\164\150\x6e\x53\164\x61\x74\145\155\145\156\164\x3e\56");
        aE:
        $mR = $o8[0];
        $FT = Utilities::xpQuery($mR, "\x2e\57\163\x61\x6d\154\137\x61\163\x73\145\x72\x74\x69\157\x6e\x3a\x41\x75\164\150\156\103\x6f\x6e\x74\x65\x78\164\104\145\143\x6c\122\x65\146");
        if (count($FT) > 1) {
            goto d_;
        }
        if (count($FT) === 1) {
            goto mk;
        }
        goto c8;
        d_:
        throw new Exception("\x4d\x6f\x72\145\x20\x74\x68\x61\x6e\40\x6f\156\x65\40\74\163\141\x6d\x6c\x3a\x41\165\164\150\156\103\x6f\x6e\164\145\x78\x74\104\145\143\154\122\x65\x66\76\x20\x66\157\x75\156\x64\x3f");
        goto c8;
        mk:
        $this->setAuthnContextDeclRef(trim($FT[0]->textContent));
        c8:
        $fr = Utilities::xpQuery($mR, "\x2e\x2f\163\x61\155\154\x5f\x61\x73\x73\145\x72\164\151\157\x6e\x3a\x41\165\x74\x68\156\x43\157\156\164\145\x78\x74\104\145\143\x6c");
        if (count($fr) > 1) {
            goto Td;
        }
        if (count($fr) === 1) {
            goto O7;
        }
        goto Fm;
        Td:
        throw new Exception("\115\x6f\x72\145\x20\164\150\141\156\40\x6f\x6e\145\x20\x3c\163\141\155\x6c\72\x41\165\164\x68\x6e\x43\157\x6e\164\x65\170\164\104\x65\x63\x6c\x3e\40\x66\x6f\x75\x6e\x64\x3f");
        goto Fm;
        O7:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($fr[0]));
        Fm:
        $pO = Utilities::xpQuery($mR, "\56\57\x73\x61\x6d\x6c\137\141\x73\163\x65\162\164\x69\157\x6e\72\x41\165\x74\150\x6e\103\x6f\x6e\164\145\x78\164\103\x6c\x61\163\x73\122\x65\x66");
        if (count($pO) > 1) {
            goto sT;
        }
        if (count($pO) === 1) {
            goto JV;
        }
        goto SG;
        sT:
        throw new Exception("\x4d\157\162\145\x20\x74\x68\141\156\x20\157\x6e\145\x20\74\163\x61\x6d\154\72\x41\165\x74\150\x6e\x43\x6f\156\164\145\170\x74\103\154\141\163\163\122\x65\146\76\40\x69\x6e\x20\x3c\163\141\x6d\x6c\72\101\165\164\x68\156\103\157\x6e\x74\145\x78\164\x3e\56");
        goto SG;
        JV:
        $this->setAuthnContextClassRef(trim($pO[0]->textContent));
        SG:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto CA;
        }
        throw new Exception("\x4d\151\x73\163\x69\x6e\147\40\x65\x69\x74\x68\x65\x72\40\x3c\x73\x61\155\154\x3a\101\165\164\150\x6e\103\157\156\164\x65\170\x74\x43\154\141\x73\x73\x52\x65\x66\76\40\157\x72\40\74\x73\x61\x6d\154\x3a\101\x75\x74\150\156\x43\x6f\156\164\x65\x78\x74\104\x65\x63\154\x52\x65\x66\x3e\40\157\x72\40\74\163\x61\x6d\154\x3a\101\x75\x74\150\156\x43\157\x6e\x74\145\x78\x74\x44\145\143\x6c\x3e");
        CA:
        $this->AuthenticatingAuthority = Utilities::extractStrings($mR, "\165\x72\x6e\72\157\x61\x73\x69\163\72\x6e\141\155\145\163\72\164\x63\72\x53\x41\x4d\x4c\x3a\x32\x2e\60\72\141\163\163\x65\x72\164\151\x6f\x6e", "\101\165\x74\x68\145\x6e\164\151\143\141\x74\x69\156\x67\x41\x75\x74\x68\157\x72\x69\164\x79");
    }
    private function parseAttributes(DOMElement $pe)
    {
        $oY = TRUE;
        $Lq = Utilities::xpQuery($pe, "\x2e\x2f\x73\141\x6d\x6c\137\141\163\x73\x65\162\x74\151\157\x6e\72\101\x74\x74\x72\x69\x62\165\164\x65\123\164\x61\164\145\x6d\145\x6e\x74\x2f\163\x61\155\154\x5f\x61\x73\163\145\x72\x74\x69\x6f\x6e\x3a\101\164\164\x72\x69\x62\x75\x74\x65");
        foreach ($Lq as $YF) {
            if ($YF->hasAttribute("\116\141\x6d\145")) {
                goto Bz;
            }
            throw new Exception("\115\151\x73\163\151\x6e\x67\x20\x6e\141\155\145\x20\x6f\x6e\40\74\x73\141\155\x6c\72\x41\x74\164\162\151\142\165\x74\145\x3e\x20\x65\154\145\155\x65\x6e\x74\x2e");
            Bz:
            $lw = $YF->getAttribute("\x4e\x61\x6d\145");
            if ($YF->hasAttribute("\x4e\141\155\x65\106\157\x72\x6d\141\x74")) {
                goto AS1;
            }
            $hr = "\x75\x72\x6e\72\157\x61\x73\151\x73\72\156\141\155\x65\x73\x3a\x74\143\x3a\123\101\115\114\72\x31\x2e\x31\x3a\156\141\x6d\x65\151\x64\x2d\x66\x6f\x72\x6d\141\x74\x3a\x75\156\x73\160\145\x63\x69\x66\151\145\144";
            goto Se;
            AS1:
            $hr = $YF->getAttribute("\116\141\x6d\145\106\157\162\x6d\x61\x74");
            Se:
            if ($oY) {
                goto Pc;
            }
            if (!($this->nameFormat !== $hr)) {
                goto fc;
            }
            $this->nameFormat = "\165\x72\156\x3a\157\141\x73\x69\x73\72\x6e\x61\155\x65\x73\72\x74\143\x3a\x53\101\x4d\x4c\72\x31\56\61\x3a\x6e\141\155\145\x69\144\55\146\x6f\162\155\x61\164\72\165\x6e\163\x70\145\143\151\x66\x69\145\x64";
            fc:
            goto rv;
            Pc:
            $this->nameFormat = $hr;
            $oY = FALSE;
            rv:
            if (array_key_exists($lw, $this->attributes)) {
                goto Ql;
            }
            $this->attributes[$lw] = array();
            Ql:
            $RW = Utilities::xpQuery($YF, "\x2e\x2f\x73\141\x6d\154\x5f\x61\x73\x73\x65\162\x74\x69\x6f\156\72\x41\x74\x74\162\151\142\165\164\x65\x56\141\x6c\x75\145");
            foreach ($RW as $bc) {
                $this->attributes[$lw][] = trim($bc->textContent);
                Cl:
            }
            BV:
            nD:
        }
        e8:
    }
    private function parseEncryptedAttributes(DOMElement $pe)
    {
        $this->encryptedAttribute = Utilities::xpQuery($pe, "\56\x2f\x73\x61\155\154\137\x61\163\163\145\162\164\151\x6f\x6e\72\101\x74\x74\x72\x69\x62\x75\164\x65\123\x74\x61\164\x65\155\145\156\164\x2f\163\141\x6d\154\x5f\x61\163\163\x65\x72\164\x69\x6f\x6e\72\105\x6e\x63\x72\171\x70\164\145\x64\101\x74\x74\162\151\x62\165\x74\x65");
    }
    private function parseSignature(DOMElement $pe)
    {
        $Ar = Utilities::validateElement($pe);
        if (!($Ar !== FALSE)) {
            goto v7;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $Ar["\x43\145\x72\164\x69\x66\151\x63\141\164\145\163"];
        $this->signatureData = $Ar;
        v7:
    }
    public function validate(XMLSecurityKey $nA)
    {
        if (!($this->signatureData === NULL)) {
            goto cY;
        }
        return FALSE;
        cY:
        Utilities::validateSignature($this->signatureData, $nA);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($lZ)
    {
        $this->id = $lZ;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($Kz)
    {
        $this->issueInstant = $Kz;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($jj)
    {
        $this->issuer = $jj;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto fV;
        }
        throw new Exception("\x41\x74\164\145\155\x70\164\x65\144\x20\x74\157\40\162\x65\164\x72\x69\145\x76\x65\x20\145\156\x63\x72\x79\160\164\x65\144\x20\x4e\x61\155\145\111\x44\x20\x77\151\164\x68\157\165\164\40\144\145\143\x72\171\x70\164\x69\156\147\x20\x69\164\x20\146\151\162\163\164\56");
        fV:
        return $this->nameId;
    }
    public function setNameId($KB)
    {
        $this->nameId = $KB;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto sX;
        }
        return TRUE;
        sX:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $nA)
    {
        $dK = new DOMDocument();
        $Jy = $dK->createElement("\x72\157\157\164");
        $dK->appendChild($Jy);
        Utilities::addNameId($Jy, $this->nameId);
        $KB = $Jy->firstChild;
        Utilities::getContainer()->debugMessage($KB, "\x65\156\x63\x72\171\x70\x74");
        $uK = new XMLSecEnc();
        $uK->setNode($KB);
        $uK->type = XMLSecEnc::Element;
        $ou = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $ou->generateSessionKey();
        $uK->encryptKey($nA, $ou);
        $this->encryptedNameId = $uK->encryptNode($ou);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $nA, array $Y9 = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto bX;
        }
        return;
        bX:
        $KB = Utilities::decryptElement($this->encryptedNameId, $nA, $Y9);
        Utilities::getContainer()->debugMessage($KB, "\144\145\x63\162\x79\160\x74");
        $this->nameId = Utilities::parseNameId($KB);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $nA, array $Y9 = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto GT;
        }
        return;
        GT:
        $oY = TRUE;
        $Lq = $this->encryptedAttribute;
        foreach ($Lq as $eq) {
            $YF = Utilities::decryptElement($eq->getElementsByTagName("\x45\156\x63\162\171\x70\x74\145\144\x44\141\164\141")->item(0), $nA, $Y9);
            if ($YF->hasAttribute("\x4e\141\x6d\145")) {
                goto Dr;
            }
            throw new Exception("\115\151\x73\x73\151\156\147\x20\156\x61\x6d\x65\40\x6f\x6e\x20\x3c\163\x61\x6d\154\x3a\x41\164\164\162\x69\x62\165\x74\x65\76\40\145\x6c\x65\155\145\156\164\x2e");
            Dr:
            $lw = $YF->getAttribute("\x4e\141\x6d\145");
            if ($YF->hasAttribute("\116\x61\x6d\x65\x46\x6f\x72\x6d\141\x74")) {
                goto Io;
            }
            $hr = "\165\x72\x6e\72\157\x61\163\x69\163\72\x6e\141\155\145\x73\x3a\164\143\x3a\123\x41\115\x4c\x3a\62\56\x30\72\141\x74\x74\162\x6e\x61\x6d\145\x2d\x66\157\162\155\141\x74\72\x75\x6e\163\160\145\x63\151\146\151\145\x64";
            goto N4;
            Io:
            $hr = $YF->getAttribute("\116\x61\x6d\145\x46\157\162\x6d\x61\x74");
            N4:
            if ($oY) {
                goto eA;
            }
            if (!($this->nameFormat !== $hr)) {
                goto zr;
            }
            $this->nameFormat = "\x75\x72\156\72\x6f\x61\163\x69\163\72\x6e\x61\x6d\x65\x73\72\164\143\x3a\x53\101\115\114\72\x32\x2e\60\72\x61\164\164\162\156\141\x6d\145\55\x66\157\162\155\x61\164\72\165\156\x73\160\x65\143\x69\146\x69\145\x64";
            zr:
            goto Mj;
            eA:
            $this->nameFormat = $hr;
            $oY = FALSE;
            Mj:
            if (array_key_exists($lw, $this->attributes)) {
                goto Hh;
            }
            $this->attributes[$lw] = array();
            Hh:
            $RW = Utilities::xpQuery($YF, "\56\x2f\x73\141\155\154\137\141\163\x73\x65\x72\x74\x69\x6f\x6e\72\101\x74\x74\162\x69\142\165\x74\145\x56\x61\x6c\165\145");
            foreach ($RW as $bc) {
                $this->attributes[$lw][] = trim($bc->textContent);
                Va:
            }
            uZ:
            Lr:
        }
        NA:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($VJ)
    {
        $this->notBefore = $VJ;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($Sq)
    {
        $this->notOnOrAfter = $Sq;
    }
    public function setEncryptedAttributes($ZX)
    {
        $this->requiredEncAttributes = $ZX;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $M1 = NULL)
    {
        $this->validAudiences = $M1;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($g8)
    {
        $this->authnInstant = $g8;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($HW)
    {
        $this->sessionNotOnOrAfter = $HW;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($oz)
    {
        $this->sessionIndex = $oz;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto HV;
        }
        return $this->authnContextClassRef;
        HV:
        if (empty($this->authnContextDeclRef)) {
            goto sl;
        }
        return $this->authnContextDeclRef;
        sl:
        return NULL;
    }
    public function setAuthnContext($Mm)
    {
        $this->setAuthnContextClassRef($Mm);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($QX)
    {
        $this->authnContextClassRef = $QX;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $ek)
    {
        if (empty($this->authnContextDeclRef)) {
            goto o2;
        }
        throw new Exception("\x41\x75\x74\x68\156\x43\x6f\156\164\x65\x78\x74\x44\x65\x63\154\122\145\x66\40\151\x73\40\141\x6c\162\x65\141\144\171\x20\162\x65\x67\151\x73\164\145\162\145\144\41\40\115\x61\171\x20\157\x6e\154\171\x20\150\x61\166\x65\x20\145\x69\x74\150\x65\162\40\x61\x20\104\x65\x63\x6c\x20\157\x72\x20\x61\40\x44\145\143\x6c\x52\x65\x66\x2c\x20\156\x6f\x74\x20\x62\x6f\x74\x68\41");
        o2:
        $this->authnContextDecl = $ek;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($sS)
    {
        if (empty($this->authnContextDecl)) {
            goto CY;
        }
        throw new Exception("\x41\x75\164\150\x6e\x43\157\156\164\x65\170\164\104\x65\x63\154\40\x69\x73\40\x61\154\162\x65\141\144\171\40\x72\x65\x67\x69\x73\x74\145\162\145\x64\x21\x20\115\x61\171\40\x6f\x6e\154\171\40\150\x61\166\145\40\x65\151\x74\x68\145\x72\40\x61\40\x44\x65\143\154\40\157\162\x20\141\40\x44\145\143\x6c\122\145\146\54\x20\156\157\x74\40\x62\157\164\150\x21");
        CY:
        $this->authnContextDeclRef = $sS;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($tW)
    {
        $this->AuthenticatingAuthority = $tW;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $Lq)
    {
        $this->attributes = $Lq;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($hr)
    {
        $this->nameFormat = $hr;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $ne)
    {
        $this->SubjectConfirmation = $ne;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $Hg = NULL)
    {
        $this->signatureKey = $Hg;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $TK = NULL)
    {
        $this->encryptionKey = $TK;
    }
    public function setCertificates(array $KC)
    {
        $this->certificates = $KC;
    }
    public function getCertificates()
    {
        return $this->certificates;
    }
    public function getSignatureData()
    {
        return $this->signatureData;
    }
    public function getWasSignedAtConstruction()
    {
        return $this->wasSignedAtConstruction;
    }
    public function toXML(DOMNode $Z3 = NULL)
    {
        if ($Z3 === NULL) {
            goto GP;
        }
        $YQ = $Z3->ownerDocument;
        goto nN;
        GP:
        $YQ = new DOMDocument();
        $Z3 = $YQ;
        nN:
        $Jy = $YQ->createElementNS("\165\x72\156\x3a\157\x61\x73\151\x73\72\x6e\x61\155\x65\163\72\x74\143\x3a\x53\x41\115\114\x3a\x32\56\x30\x3a\141\163\x73\x65\162\x74\x69\x6f\156", "\163\141\155\x6c\72" . "\101\x73\x73\145\162\164\x69\x6f\x6e");
        $Z3->appendChild($Jy);
        $Jy->setAttributeNS("\x75\x72\156\72\x6f\x61\x73\151\x73\x3a\x6e\141\155\x65\x73\x3a\164\143\72\x53\101\115\x4c\72\x32\x2e\60\72\160\x72\x6f\x74\157\143\157\154", "\x73\x61\155\x6c\x70\72\x74\155\x70", "\x74\x6d\160");
        $Jy->removeAttributeNS("\x75\162\x6e\x3a\x6f\x61\x73\151\163\72\156\141\x6d\x65\163\72\164\x63\72\123\x41\115\114\x3a\62\56\60\72\x70\x72\157\164\x6f\143\x6f\154", "\x74\x6d\x70");
        $Jy->setAttributeNS("\x68\x74\164\160\x3a\x2f\x2f\x77\x77\167\56\x77\x33\56\157\162\x67\x2f\62\x30\60\x31\57\130\115\114\x53\x63\x68\145\x6d\x61\55\151\x6e\163\164\x61\156\x63\x65", "\170\163\x69\72\x74\155\x70", "\x74\155\160");
        $Jy->removeAttributeNS("\x68\x74\164\x70\x3a\x2f\x2f\x77\167\167\56\x77\63\x2e\157\162\x67\x2f\62\60\60\x31\57\130\x4d\114\x53\x63\150\145\x6d\141\x2d\151\x6e\163\x74\141\156\143\x65", "\x74\155\x70");
        $Jy->setAttributeNS("\x68\x74\x74\x70\72\57\x2f\x77\x77\x77\56\167\x33\56\157\162\x67\x2f\62\x30\60\61\x2f\130\x4d\114\123\x63\x68\145\155\x61", "\x78\x73\x3a\164\x6d\160", "\x74\155\160");
        $Jy->removeAttributeNS("\150\x74\164\160\x3a\57\57\x77\x77\x77\x2e\167\x33\x2e\x6f\162\147\57\x32\x30\x30\x31\57\x58\115\x4c\x53\x63\150\145\155\x61", "\x74\x6d\x70");
        $Jy->setAttribute("\111\104", $this->id);
        $Jy->setAttribute("\x56\x65\162\163\151\x6f\x6e", "\x32\x2e\60");
        $Jy->setAttribute("\111\163\x73\x75\x65\111\156\163\164\x61\x6e\164", gmdate("\x59\55\x6d\x2d\144\x5c\124\110\72\x69\72\163\134\132", $this->issueInstant));
        $jj = Utilities::addString($Jy, "\165\162\156\x3a\x6f\x61\x73\151\163\72\x6e\141\x6d\x65\x73\x3a\164\x63\x3a\x53\101\115\x4c\x3a\x32\56\x30\x3a\x61\x73\x73\145\162\x74\151\x6f\156", "\163\141\155\154\72\111\x73\163\x75\145\162", $this->issuer);
        $this->addSubject($Jy);
        $this->addConditions($Jy);
        $this->addAuthnStatement($Jy);
        if ($this->requiredEncAttributes == FALSE) {
            goto Cs;
        }
        $this->addEncryptedAttributeStatement($Jy);
        goto PH;
        Cs:
        $this->addAttributeStatement($Jy);
        PH:
        if (!($this->signatureKey !== NULL)) {
            goto Xo;
        }
        Utilities::insertSignature($this->signatureKey, $this->certificates, $Jy, $jj->nextSibling);
        Xo:
        return $Jy;
    }
    private function addSubject(DOMElement $Jy)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto xc;
        }
        return;
        xc:
        $Jf = $Jy->ownerDocument->createElementNS("\x75\162\156\72\157\141\x73\x69\x73\x3a\x6e\x61\x6d\145\x73\x3a\164\x63\72\x53\x41\115\x4c\72\x32\56\x30\72\x61\163\x73\145\x72\x74\151\157\156", "\163\141\x6d\154\x3a\x53\x75\x62\x6a\x65\x63\164");
        $Jy->appendChild($Jf);
        if ($this->encryptedNameId === NULL) {
            goto wA;
        }
        $Bl = $Jf->ownerDocument->createElementNS("\x75\162\156\x3a\x6f\141\163\x69\x73\72\156\x61\155\145\x73\72\164\x63\72\x53\101\x4d\x4c\x3a\62\x2e\60\x3a\x61\x73\x73\145\x72\164\151\157\x6e", "\163\141\155\x6c\72" . "\x45\x6e\x63\162\171\160\164\x65\144\111\104");
        $Jf->appendChild($Bl);
        $Bl->appendChild($Jf->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto qW;
        wA:
        Utilities::addNameId($Jf, $this->nameId);
        qW:
        foreach ($this->SubjectConfirmation as $aK) {
            $aK->toXML($Jf);
            w9:
        }
        z2:
    }
    private function addConditions(DOMElement $Jy)
    {
        $YQ = $Jy->ownerDocument;
        $Aj = $YQ->createElementNS("\x75\162\x6e\72\x6f\x61\163\x69\x73\x3a\156\x61\155\x65\163\x3a\x74\143\x3a\123\x41\x4d\x4c\x3a\62\x2e\x30\x3a\x61\x73\x73\x65\x72\x74\151\x6f\x6e", "\x73\x61\x6d\x6c\72\103\x6f\156\x64\x69\164\x69\x6f\x6e\163");
        $Jy->appendChild($Aj);
        if (!($this->notBefore !== NULL)) {
            goto yf;
        }
        $Aj->setAttribute("\x4e\x6f\164\x42\x65\146\x6f\x72\145", gmdate("\x59\55\155\x2d\144\x5c\124\110\72\x69\x3a\x73\x5c\x5a", $this->notBefore));
        yf:
        if (!($this->notOnOrAfter !== NULL)) {
            goto Qx;
        }
        $Aj->setAttribute("\116\157\x74\x4f\156\117\x72\101\146\x74\x65\x72", gmdate("\x59\x2d\x6d\55\x64\x5c\124\110\x3a\x69\x3a\163\134\x5a", $this->notOnOrAfter));
        Qx:
        if (!($this->validAudiences !== NULL)) {
            goto yM;
        }
        $sQ = $YQ->createElementNS("\x75\x72\156\x3a\x6f\141\163\x69\163\x3a\156\141\x6d\145\x73\72\164\x63\x3a\x53\101\x4d\x4c\x3a\62\x2e\60\x3a\141\163\x73\145\x72\x74\x69\157\156", "\x73\141\x6d\x6c\72\x41\x75\144\151\x65\156\x63\x65\x52\145\163\x74\x72\151\143\x74\x69\x6f\156");
        $Aj->appendChild($sQ);
        Utilities::addStrings($sQ, "\165\162\156\x3a\157\141\x73\x69\163\x3a\156\x61\x6d\145\163\72\x74\x63\72\x53\101\115\x4c\72\62\56\x30\x3a\141\163\x73\x65\x72\x74\x69\157\156", "\163\141\x6d\x6c\72\101\165\x64\x69\x65\x6e\143\145", FALSE, $this->validAudiences);
        yM:
    }
    private function addAuthnStatement(DOMElement $Jy)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto vt;
        }
        return;
        vt:
        $YQ = $Jy->ownerDocument;
        $Ov = $YQ->createElementNS("\x75\162\156\72\x6f\x61\x73\x69\x73\x3a\x6e\x61\155\x65\x73\x3a\164\143\x3a\123\101\115\114\x3a\62\x2e\x30\x3a\x61\163\x73\x65\x72\x74\151\157\x6e", "\163\x61\x6d\154\x3a\101\165\164\150\x6e\x53\164\x61\x74\145\x6d\145\x6e\x74");
        $Jy->appendChild($Ov);
        $Ov->setAttribute("\101\165\164\150\156\x49\x6e\x73\164\x61\156\164", gmdate("\131\55\155\x2d\144\x5c\x54\110\x3a\151\72\163\x5c\132", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto Bq;
        }
        $Ov->setAttribute("\x53\x65\x73\x73\x69\157\x6e\116\157\164\117\x6e\117\x72\101\x66\164\145\x72", gmdate("\x59\x2d\155\55\x64\134\124\110\72\151\x3a\x73\134\x5a", $this->sessionNotOnOrAfter));
        Bq:
        if (!($this->sessionIndex !== NULL)) {
            goto O3;
        }
        $Ov->setAttribute("\123\x65\x73\x73\x69\x6f\x6e\x49\156\144\145\x78", $this->sessionIndex);
        O3:
        $mR = $YQ->createElementNS("\x75\162\x6e\x3a\x6f\141\163\x69\163\72\x6e\x61\155\x65\163\x3a\x74\x63\72\123\101\x4d\x4c\72\x32\x2e\x30\x3a\141\163\x73\x65\x72\x74\151\x6f\x6e", "\x73\141\155\154\x3a\x41\165\164\150\156\x43\157\x6e\x74\145\170\164");
        $Ov->appendChild($mR);
        if (empty($this->authnContextClassRef)) {
            goto OJ;
        }
        Utilities::addString($mR, "\x75\162\x6e\x3a\x6f\141\163\151\x73\72\x6e\141\x6d\145\163\x3a\164\x63\72\123\x41\115\114\x3a\62\56\x30\x3a\141\163\x73\x65\162\x74\x69\157\x6e", "\163\x61\x6d\x6c\x3a\x41\165\164\150\x6e\x43\157\156\x74\x65\170\164\103\154\x61\163\x73\122\145\146", $this->authnContextClassRef);
        OJ:
        if (empty($this->authnContextDecl)) {
            goto cQ;
        }
        $this->authnContextDecl->toXML($mR);
        cQ:
        if (empty($this->authnContextDeclRef)) {
            goto YT;
        }
        Utilities::addString($mR, "\165\162\156\x3a\157\141\163\x69\163\x3a\x6e\141\155\145\163\72\x74\x63\72\123\101\x4d\x4c\72\62\x2e\x30\x3a\141\x73\163\x65\162\164\x69\157\156", "\163\x61\155\154\72\x41\165\164\x68\156\x43\x6f\x6e\x74\145\170\164\104\145\x63\154\x52\145\146", $this->authnContextDeclRef);
        YT:
        Utilities::addStrings($mR, "\165\162\x6e\x3a\x6f\141\163\x69\163\72\156\141\155\x65\x73\72\164\x63\72\x53\101\x4d\x4c\72\62\56\x30\x3a\x61\163\163\x65\x72\164\x69\157\156", "\163\x61\x6d\x6c\72\x41\165\164\150\145\156\x74\x69\x63\141\164\151\x6e\147\x41\165\164\150\x6f\x72\x69\164\x79", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $Jy)
    {
        if (!empty($this->attributes)) {
            goto JU;
        }
        return;
        JU:
        $YQ = $Jy->ownerDocument;
        $Yl = $YQ->createElementNS("\165\162\156\72\x6f\x61\x73\x69\x73\72\156\141\155\x65\163\x3a\x74\143\x3a\123\x41\115\114\x3a\62\x2e\60\x3a\x61\x73\x73\x65\162\x74\x69\157\x6e", "\163\141\x6d\x6c\72\x41\x74\x74\162\151\142\165\164\145\x53\164\x61\x74\145\155\x65\x6e\164");
        $Jy->appendChild($Yl);
        foreach ($this->attributes as $lw => $RW) {
            $YF = $YQ->createElementNS("\165\x72\156\72\x6f\x61\163\151\x73\72\156\x61\155\x65\x73\x3a\x74\143\72\x53\101\x4d\114\x3a\62\56\60\x3a\x61\163\x73\145\x72\164\151\x6f\156", "\163\141\155\154\72\x41\x74\164\x72\151\x62\x75\x74\x65");
            $Yl->appendChild($YF);
            $YF->setAttribute("\116\141\x6d\x65", $lw);
            if (!($this->nameFormat !== "\165\162\156\x3a\x6f\x61\163\x69\163\x3a\x6e\141\155\x65\x73\72\x74\x63\72\123\101\115\x4c\x3a\62\56\60\72\141\164\x74\162\156\141\x6d\x65\x2d\146\157\162\155\x61\164\72\x75\x6e\163\x70\145\x63\x69\x66\151\145\144")) {
                goto gm;
            }
            $YF->setAttribute("\x4e\141\x6d\x65\106\157\x72\155\x61\x74", $this->nameFormat);
            gm:
            foreach ($RW as $bc) {
                if (is_string($bc)) {
                    goto yo;
                }
                if (is_int($bc)) {
                    goto pv;
                }
                $Cq = NULL;
                goto VH;
                yo:
                $Cq = "\x78\x73\72\163\164\x72\x69\156\147";
                goto VH;
                pv:
                $Cq = "\170\163\72\151\156\x74\145\147\145\x72";
                VH:
                $YD = $YQ->createElementNS("\165\x72\x6e\x3a\157\141\163\151\x73\x3a\x6e\x61\155\145\163\72\164\x63\x3a\x53\x41\x4d\x4c\x3a\62\56\60\x3a\141\x73\x73\x65\162\x74\x69\157\156", "\x73\141\x6d\154\72\x41\164\164\x72\x69\142\x75\x74\145\126\x61\x6c\165\x65");
                $YF->appendChild($YD);
                if (!($Cq !== NULL)) {
                    goto pz;
                }
                $YD->setAttributeNS("\150\x74\x74\x70\72\57\x2f\167\x77\x77\x2e\x77\x33\56\157\162\147\x2f\62\60\60\x31\57\130\115\x4c\x53\143\150\145\155\141\x2d\151\156\163\x74\141\156\143\x65", "\170\163\x69\x3a\x74\x79\x70\x65", $Cq);
                pz:
                if (!is_null($bc)) {
                    goto tB;
                }
                $YD->setAttributeNS("\150\x74\x74\x70\72\x2f\57\x77\x77\x77\x2e\x77\63\56\x6f\162\147\57\x32\60\x30\61\57\x58\x4d\x4c\123\x63\x68\x65\155\141\x2d\x69\x6e\163\x74\141\x6e\143\145", "\170\x73\151\x3a\x6e\x69\x6c", "\164\162\x75\x65");
                tB:
                if ($bc instanceof DOMNodeList) {
                    goto hb;
                }
                $YD->appendChild($YQ->createTextNode($bc));
                goto pl;
                hb:
                $Ba = 0;
                FL:
                if (!($Ba < $bc->length)) {
                    goto s4;
                }
                $m0 = $YQ->importNode($bc->item($Ba), TRUE);
                $YD->appendChild($m0);
                XC:
                $Ba++;
                goto FL;
                s4:
                pl:
                M5:
            }
            VC:
            Kw:
        }
        fE:
    }
    private function addEncryptedAttributeStatement(DOMElement $Jy)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto m5;
        }
        return;
        m5:
        $YQ = $Jy->ownerDocument;
        $Yl = $YQ->createElementNS("\165\162\x6e\x3a\x6f\x61\x73\x69\x73\72\156\x61\x6d\145\163\x3a\x74\x63\72\123\x41\115\114\x3a\x32\56\x30\72\x61\x73\163\x65\162\164\151\x6f\x6e", "\x73\141\x6d\154\72\101\164\x74\162\151\x62\165\x74\145\123\x74\141\164\x65\155\145\x6e\x74");
        $Jy->appendChild($Yl);
        foreach ($this->attributes as $lw => $RW) {
            $pM = new DOMDocument();
            $YF = $pM->createElementNS("\x75\x72\156\x3a\157\x61\x73\x69\163\x3a\156\141\x6d\x65\x73\x3a\164\143\72\x53\x41\x4d\x4c\72\62\56\60\72\141\x73\163\x65\x72\x74\x69\x6f\156", "\x73\141\x6d\154\72\101\164\x74\x72\151\142\165\164\x65");
            $YF->setAttribute("\x4e\141\x6d\x65", $lw);
            $pM->appendChild($YF);
            if (!($this->nameFormat !== "\165\x72\156\72\157\141\163\x69\x73\x3a\x6e\141\x6d\x65\x73\72\x74\x63\x3a\x53\101\115\x4c\x3a\62\56\60\72\x61\164\x74\x72\156\x61\x6d\145\55\146\x6f\162\x6d\x61\164\72\165\x6e\x73\160\x65\143\x69\146\x69\x65\144")) {
                goto p4;
            }
            $YF->setAttribute("\116\x61\155\x65\106\157\162\x6d\x61\x74", $this->nameFormat);
            p4:
            foreach ($RW as $bc) {
                if (is_string($bc)) {
                    goto V_;
                }
                if (is_int($bc)) {
                    goto rS;
                }
                $Cq = NULL;
                goto s9;
                V_:
                $Cq = "\170\163\72\163\x74\x72\151\156\x67";
                goto s9;
                rS:
                $Cq = "\x78\x73\x3a\151\x6e\x74\145\147\x65\162";
                s9:
                $YD = $pM->createElementNS("\x75\x72\156\x3a\x6f\141\x73\151\x73\x3a\156\141\155\x65\x73\x3a\164\143\72\x53\101\115\x4c\72\x32\56\60\x3a\141\x73\x73\x65\x72\164\151\157\156", "\163\141\155\154\x3a\101\x74\164\x72\151\142\165\x74\x65\x56\x61\x6c\165\x65");
                $YF->appendChild($YD);
                if (!($Cq !== NULL)) {
                    goto RJ;
                }
                $YD->setAttributeNS("\x68\164\164\x70\72\x2f\x2f\167\x77\167\x2e\x77\63\x2e\157\x72\147\57\62\x30\60\61\x2f\130\115\x4c\x53\x63\150\145\x6d\141\x2d\151\x6e\x73\164\x61\x6e\143\x65", "\170\163\151\72\x74\171\x70\x65", $Cq);
                RJ:
                if ($bc instanceof DOMNodeList) {
                    goto FB;
                }
                $YD->appendChild($pM->createTextNode($bc));
                goto Ck;
                FB:
                $Ba = 0;
                NH:
                if (!($Ba < $bc->length)) {
                    goto l5;
                }
                $m0 = $pM->importNode($bc->item($Ba), TRUE);
                $YD->appendChild($m0);
                pb:
                $Ba++;
                goto NH;
                l5:
                Ck:
                QB:
            }
            rN:
            $rT = new XMLSecEnc();
            $rT->setNode($pM->documentElement);
            $rT->type = "\150\x74\x74\x70\72\57\x2f\167\167\167\56\167\63\x2e\157\x72\147\x2f\x32\60\x30\x31\57\x30\x34\57\x78\x6d\x6c\x65\156\143\43\x45\x6c\145\155\145\156\164";
            $ou = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $ou->generateSessionKey();
            $rT->encryptKey($this->encryptionKey, $ou);
            $Dc = $rT->encryptNode($ou);
            $bA = $YQ->createElementNS("\165\162\156\x3a\x6f\x61\163\151\x73\x3a\156\x61\155\145\x73\72\164\143\x3a\123\101\x4d\x4c\72\x32\x2e\60\x3a\141\x73\163\145\162\164\151\157\x6e", "\163\x61\x6d\x6c\72\105\x6e\143\x72\171\x70\x74\x65\144\101\x74\164\x72\151\x62\x75\x74\x65");
            $Yl->appendChild($bA);
            $kP = $YQ->importNode($Dc, TRUE);
            $bA->appendChild($kP);
            lD:
        }
        jj:
    }
}
