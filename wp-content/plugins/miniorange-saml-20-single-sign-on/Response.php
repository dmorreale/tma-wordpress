<?php


include "\x41\x73\x73\145\x72\164\151\x6f\156\56\x70\x68\x70";
class SAML2_Response
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    private $issuer;
    public function __construct(DOMElement $pe = NULL)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($pe === NULL)) {
            goto RP;
        }
        return;
        RP:
        $Ar = Utilities::validateElement($pe);
        if (!($Ar !== FALSE)) {
            goto rf;
        }
        $this->certificates = $Ar["\103\x65\162\x74\151\x66\x69\143\x61\164\x65\x73"];
        $this->signatureData = $Ar;
        rf:
        if (!$pe->hasAttribute("\x44\x65\x73\x74\151\156\x61\x74\x69\157\x6e")) {
            goto o5;
        }
        $this->destination = $pe->getAttribute("\104\x65\x73\x74\x69\156\x61\164\x69\x6f\x6e");
        o5:
        $jj = Utilities::xpQuery($pe, "\x2e\x2f\x73\141\x6d\x6c\137\141\163\x73\x65\162\164\x69\x6f\x6e\72\x49\x73\x73\x75\x65\162");
        $this->issuer = trim($jj[0]->textContent);
    }
    public function parseAssertions($pe, $Qn)
    {
        if (!($pe === NULL)) {
            goto t3;
        }
        return;
        t3:
        $m0 = $pe->firstChild;
        Fj:
        if (!($m0 !== NULL)) {
            goto c0;
        }
        if (!($m0->namespaceURI !== "\x75\x72\156\72\x6f\x61\163\x69\x73\72\x6e\x61\x6d\145\x73\72\164\143\72\x53\101\115\114\72\62\x2e\60\x3a\141\163\x73\145\x72\x74\151\x6f\156")) {
            goto Bd;
        }
        goto hl;
        Bd:
        if (!($m0->localName === "\x41\x73\163\x65\x72\x74\x69\x6f\156" || $m0->localName === "\105\156\143\162\171\160\164\x65\144\101\163\x73\145\162\164\151\x6f\x6e")) {
            goto mX;
        }
        $this->assertions[] = new SAML2_Assertion($m0, $Qn);
        mX:
        hl:
        $m0 = $m0->nextSibling;
        goto Fj;
        c0:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $b4)
    {
        $this->assertions = $b4;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function getCertificates()
    {
        return $this->certificates;
    }
    public function getSignatureData()
    {
        return $this->signatureData;
    }
}
