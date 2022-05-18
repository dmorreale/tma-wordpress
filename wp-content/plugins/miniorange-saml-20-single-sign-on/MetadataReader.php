<?php


include_once "\x55\x74\151\x6c\151\164\x69\145\x73\x2e\160\150\160";
class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $pe = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $Ve = Utilities::xpQuery($pe, "\x2e\57\163\141\155\154\x5f\155\145\164\x61\144\141\x74\141\x3a\105\x6e\164\151\164\x69\x65\x73\x44\145\163\x63\x72\x69\160\x74\157\x72");
        if (!empty($Ve)) {
            goto XEF;
        }
        $TC = Utilities::xpQuery($pe, "\x2e\57\x73\x61\x6d\x6c\x5f\155\145\164\x61\x64\141\x74\141\72\105\156\164\x69\x74\171\x44\x65\x73\143\x72\x69\x70\164\157\x72");
        goto qCQ;
        XEF:
        $TC = $Ve;
        qCQ:
        foreach ($TC as $Mg) {
            $QG = Utilities::xpQuery($Mg, "\56\x2f\163\141\x6d\154\x5f\155\145\164\141\144\x61\164\141\x3a\x49\x44\x50\x53\x53\117\x44\x65\163\143\x72\151\x70\x74\157\x72");
            if (!empty($QG)) {
                goto T98;
            }
            $QG = Utilities::xpQuery($Mg, "\x2e\57\111\104\x50\123\123\117\x44\145\163\143\162\151\160\164\157\x72");
            T98:
            if (!(isset($QG) && !empty($QG))) {
                goto O_j;
            }
            array_push($this->identityProviders, new IdentityProviders($Mg));
            O_j:
            q5P:
        }
        v0X:
    }
    public function getIdentityProviders()
    {
        return $this->identityProviders;
    }
    public function getServiceProviders()
    {
        return $this->serviceProviders;
    }
}
class IdentityProviders
{
    private $idpName;
    private $entityID;
    private $loginDetails;
    private $logoutDetails;
    private $signingCertificate;
    private $encryptionCertificate;
    private $signedRequest;
    private $loginBinding;
    private $logoutBinding;
    public function __construct(DOMElement $pe = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$pe->hasAttribute("\x65\x6e\x74\x69\164\x79\111\x44")) {
            goto Im6;
        }
        $this->entityID = $pe->getAttribute("\145\156\164\x69\x74\171\x49\104");
        Im6:
        if (!$pe->hasAttribute("\x57\x61\156\x74\101\165\164\150\156\122\145\x71\165\145\x73\x74\163\123\x69\x67\156\x65\x64")) {
            goto oC0;
        }
        $this->signedRequest = $pe->getAttribute("\x57\x61\x6e\164\x41\165\x74\x68\x6e\122\145\161\165\145\x73\x74\x73\x53\151\x67\156\x65\144");
        oC0:
        $QG = Utilities::xpQuery($pe, "\56\x2f\163\141\x6d\154\137\x6d\x65\x74\x61\144\141\x74\141\72\x49\104\x50\x53\x53\x4f\x44\145\x73\143\162\151\x70\164\157\x72");
        if (count($QG) > 1) {
            goto B3r;
        }
        if (empty($QG)) {
            goto sh4;
        }
        goto rpi;
        B3r:
        throw new Exception("\x4d\157\162\x65\x20\164\150\141\x6e\40\157\x6e\145\40\x3c\x49\104\120\x53\123\117\104\x65\163\143\162\x69\x70\x74\157\x72\76\40\x69\156\40\74\x45\156\164\151\164\171\104\x65\163\x63\162\x69\x70\x74\x6f\x72\x3e\x2e");
        goto rpi;
        sh4:
        throw new Exception("\115\x69\163\163\151\x6e\147\x20\x72\x65\x71\x75\x69\x72\145\144\40\74\x49\x44\120\x53\123\x4f\x44\x65\x73\143\x72\151\x70\164\157\162\76\40\x69\156\40\74\x45\x6e\164\x69\164\171\104\x65\x73\x63\x72\151\x70\164\157\x72\x3e\56");
        rpi:
        $Sz = $QG[0];
        $XN = Utilities::xpQuery($Sz, "\x2e\x2f\x73\141\155\154\137\155\145\164\x61\x64\x61\164\x61\72\x45\x78\164\145\156\x73\151\x6f\x6e\x73");
        if (!$XN) {
            goto NAc;
        }
        $this->parseInfo($XN[0]);
        NAc:
        $this->parseSSOService($Sz);
        $this->parseSLOService($Sz);
        $this->parsex509Certificate($Sz);
    }
    private function parseInfo($pe)
    {
        $TV = Utilities::xpQuery($pe, "\56\x2f\x6d\x64\165\151\72\x55\111\111\x6e\146\157\x2f\155\x64\x75\x69\x3a\104\x69\163\x70\x6c\x61\171\x4e\x61\x6d\145");
        foreach ($TV as $lw) {
            if (!($lw->hasAttribute("\x78\155\x6c\x3a\154\x61\x6e\x67") && $lw->getAttribute("\x78\155\x6c\72\154\x61\x6e\147") == "\145\x6e")) {
                goto iNj;
            }
            $this->idpName = $lw->textContent;
            iNj:
            jMQ:
        }
        UEV:
    }
    private function parseSSOService($pe)
    {
        $lg = Utilities::xpQuery($pe, "\x2e\57\x73\141\x6d\x6c\137\x6d\x65\164\x61\144\x61\164\141\x3a\x53\x69\156\147\154\x65\123\151\147\x6e\x4f\x6e\x53\x65\x72\x76\x69\x63\145");
        foreach ($lg as $ZW) {
            $GJ = str_replace("\x75\x72\x6e\x3a\x6f\141\163\x69\x73\x3a\156\141\155\x65\x73\72\164\x63\72\x53\x41\115\114\72\x32\56\60\x3a\142\x69\x6e\144\151\156\x67\x73\72", '', $ZW->getAttribute("\x42\x69\x6e\144\151\156\x67"));
            if (empty($GJ)) {
                goto ZX_;
            }
            $this->loginDetails = array_merge($this->loginDetails, array($GJ => $ZW->getAttribute("\x4c\157\x63\x61\x74\151\x6f\x6e")));
            if ($GJ == "\110\x54\x54\x50\55\x52\145\x64\151\162\x65\143\164") {
                goto Bov;
            }
            if (!($GJ == "\110\x54\124\x50\55\120\x4f\123\124")) {
                goto zA7;
            }
            $this->loginBinding = "\110\164\164\160\120\157\163\x74";
            zA7:
            goto asj;
            Bov:
            $this->loginBinding = "\x48\164\x74\160\122\145\144\151\162\x65\143\x74";
            goto ZW2;
            asj:
            ZX_:
            PHd:
        }
        ZW2:
    }
    private function parseSLOService($pe)
    {
        $dZ = Utilities::xpQuery($pe, "\56\57\163\141\x6d\x6c\137\155\x65\x74\x61\x64\141\164\141\x3a\x53\151\156\x67\x6c\x65\114\157\147\x6f\165\164\x53\145\162\x76\151\143\x65");
        foreach ($dZ as $hG) {
            $GJ = str_replace("\165\x72\x6e\x3a\x6f\141\163\151\x73\72\156\x61\x6d\145\163\72\x74\x63\x3a\123\101\x4d\x4c\x3a\62\56\60\72\x62\151\x6e\x64\x69\156\x67\163\72", '', $hG->getAttribute("\102\151\156\144\x69\156\147"));
            if (empty($GJ)) {
                goto EGf;
            }
            $this->logoutDetails = array_merge($this->logoutDetails, array($GJ => $hG->getAttribute("\x4c\x6f\x63\141\x74\151\x6f\x6e")));
            if ($GJ == "\x48\x54\x54\120\x2d\122\x65\x64\x69\x72\x65\x63\164") {
                goto hv5;
            }
            if (!($GJ == "\x48\x54\124\120\55\x50\117\x53\124")) {
                goto Tk7;
            }
            $this->logoutBinding = "\x48\x74\x74\160\120\157\x73\164";
            Tk7:
            goto y2q;
            hv5:
            $this->logoutBinding = "\x48\x74\x74\x70\x52\145\x64\151\162\x65\143\164";
            goto tCP;
            y2q:
            EGf:
            lnm:
        }
        tCP:
    }
    private function parsex509Certificate($pe)
    {
        foreach (Utilities::xpQuery($pe, "\x2e\x2f\x73\x61\x6d\154\x5f\155\x65\x74\141\x64\141\x74\141\72\113\145\x79\104\x65\x73\143\162\151\x70\164\x6f\162") as $Ki) {
            if ($Ki->hasAttribute("\x75\163\145")) {
                goto vre;
            }
            $this->parseSigningCertificate($Ki);
            goto FH5;
            vre:
            if ($Ki->getAttribute("\165\163\145") == "\145\156\143\162\171\160\x74\x69\x6f\x6e") {
                goto tc_;
            }
            $this->parseSigningCertificate($Ki);
            goto uRs;
            tc_:
            $this->parseEncryptionCertificate($Ki);
            uRs:
            FH5:
            PaW:
        }
        tw3:
    }
    private function parseSigningCertificate($pe)
    {
        $xe = Utilities::xpQuery($pe, "\x2e\57\144\163\72\x4b\x65\171\x49\156\146\x6f\57\144\x73\72\130\x35\x30\x39\x44\x61\164\141\x2f\144\x73\72\130\x35\x30\71\x43\145\x72\164\151\146\x69\x63\x61\164\x65");
        $pR = trim($xe[0]->textContent);
        $pR = str_replace(array("\15", "\12", "\x9", "\40"), '', $pR);
        if (empty($xe)) {
            goto Q4a;
        }
        array_push($this->signingCertificate, Utilities::sanitize_certificate($pR));
        Q4a:
    }
    private function parseEncryptionCertificate($pe)
    {
        $xe = Utilities::xpQuery($pe, "\56\57\144\163\x3a\x4b\145\171\111\x6e\x66\157\57\144\x73\x3a\x58\x35\x30\x39\104\141\x74\141\57\144\x73\72\130\x35\60\71\103\x65\162\x74\151\x66\x69\143\141\x74\x65");
        $pR = trim($xe[0]->textContent);
        $pR = str_replace(array("\xd", "\xa", "\x9", "\40"), '', $pR);
        if (empty($xe)) {
            goto cfU;
        }
        array_push($this->encryptionCertificate, $pR);
        cfU:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($GJ)
    {
        return array_key_exists($GJ, $this->loginDetails) ? $this->loginDetails[$GJ] : '';
    }
    public function getLogoutURL($GJ)
    {
        return array_key_exists($GJ, $this->logoutDetails) ? $this->logoutDetails[$GJ] : '';
    }
    public function getLoginDetails()
    {
        return $this->loginDetails;
    }
    public function getLogoutDetails()
    {
        return $this->logoutDetails;
    }
    public function getSigningCertificate()
    {
        return $this->signingCertificate;
    }
    public function getEncryptionCertificate()
    {
        return $this->encryptionCertificate[0];
    }
    public function isRequestSigned()
    {
        return $this->signedRequest;
    }
    public function getLoginBindingType()
    {
        return $this->loginBinding;
    }
    public function getLogoutBindingType()
    {
        return $this->logoutBinding;
    }
}
class ServiceProviders
{
}
