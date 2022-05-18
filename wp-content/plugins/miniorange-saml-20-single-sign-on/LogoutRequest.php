<?php


include_once "\125\164\151\x6c\x69\x74\151\145\x73\x2e\160\x68\x70";
include_once "\170\155\x6c\x73\145\x63\x6c\x69\x62\163\56\x70\150\x70";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
class SAML2_LogoutRequest
{
    private $tagName;
    private $id;
    private $issuer;
    private $destination;
    private $issueInstant;
    private $certificates;
    private $validators;
    private $notOnOrAfter;
    private $encryptedNameId;
    private $nameId;
    private $sessionIndexes;
    public function __construct(DOMElement $pe = NULL)
    {
        $this->tagName = "\114\157\147\x6f\165\164\x52\145\161\165\x65\x73\164";
        $this->id = Utilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($pe === NULL)) {
            goto IS;
        }
        return;
        IS:
        if ($pe->hasAttribute("\111\104")) {
            goto CJ;
        }
        throw new Exception("\x4d\x69\163\x73\x69\x6e\147\40\x49\x44\x20\141\164\164\x72\x69\142\165\x74\145\40\157\156\x20\x53\x41\115\114\x20\x6d\x65\163\x73\141\147\145\x2e");
        CJ:
        $this->id = $pe->getAttribute("\111\x44");
        if (!($pe->getAttribute("\x56\145\162\x73\x69\157\156") !== "\62\56\60")) {
            goto P1;
        }
        throw new Exception("\125\x6e\x73\165\160\160\x6f\x72\x74\145\144\x20\166\x65\162\x73\151\157\156\72\x20" . $pe->getAttribute("\126\x65\162\163\151\x6f\156"));
        P1:
        $this->issueInstant = Utilities::xsDateTimeToTimestamp($pe->getAttribute("\x49\x73\x73\x75\145\111\x6e\163\164\141\156\164"));
        if (!$pe->hasAttribute("\104\145\163\164\151\x6e\x61\164\151\x6f\156")) {
            goto iv;
        }
        $this->destination = $pe->getAttribute("\104\145\x73\x74\151\156\x61\164\x69\x6f\156");
        iv:
        $jj = Utilities::xpQuery($pe, "\x2e\x2f\163\141\x6d\x6c\x5f\x61\163\x73\x65\x72\164\x69\157\x6e\x3a\x49\163\163\165\x65\162");
        if (empty($jj)) {
            goto qG;
        }
        $this->issuer = trim($jj[0]->textContent);
        qG:
        try {
            $Ar = Utilities::validateElement($pe);
            if (!($Ar !== FALSE)) {
                goto Sb;
            }
            $this->certificates = $Ar["\103\x65\162\164\x69\146\x69\x63\x61\x74\x65\x73"];
            $this->validators[] = array("\106\165\156\x63\164\x69\157\x6e" => array("\125\164\x69\154\151\x74\x69\145\x73", "\166\x61\154\x69\x64\x61\x74\145\123\x69\x67\156\141\164\165\x72\145"), "\104\141\x74\141" => $Ar);
            Sb:
        } catch (Exception $GP) {
        }
        $this->sessionIndexes = array();
        if (!$pe->hasAttribute("\116\x6f\164\117\156\x4f\162\x41\x66\164\x65\x72")) {
            goto oV;
        }
        $this->notOnOrAfter = Utilities::xsDateTimeToTimestamp($pe->getAttribute("\116\x6f\164\x4f\156\x4f\162\101\x66\164\x65\x72"));
        oV:
        $KB = Utilities::xpQuery($pe, "\56\57\x73\141\x6d\x6c\137\141\x73\x73\x65\162\x74\x69\157\156\x3a\x4e\x61\x6d\145\x49\104\x20\x7c\x20\56\x2f\x73\141\155\154\x5f\141\163\163\145\162\164\x69\x6f\156\72\x45\x6e\x63\x72\171\x70\x74\145\144\x49\x44\x2f\x78\145\x6e\x63\72\105\156\143\162\x79\x70\x74\x65\144\104\141\164\x61");
        if (empty($KB)) {
            goto Hx;
        }
        if (count($KB) > 1) {
            goto ia;
        }
        goto ng;
        Hx:
        throw new Exception("\x4d\151\163\163\151\x6e\147\40\x3c\x73\x61\155\154\x3a\x4e\141\155\145\x49\104\x3e\40\x6f\x72\x20\74\163\x61\x6d\x6c\x3a\x45\156\143\162\x79\x70\x74\x65\144\x49\104\76\x20\151\156\x20\74\x73\x61\155\154\x70\72\x4c\x6f\147\157\165\x74\x52\145\x71\165\x65\x73\164\76\x2e");
        goto ng;
        ia:
        throw new Exception("\x4d\157\162\145\40\x74\150\141\156\40\157\x6e\145\x20\x3c\163\x61\x6d\x6c\x3a\x4e\x61\x6d\145\x49\104\76\40\157\162\40\74\x73\141\x6d\154\72\105\156\x63\162\x79\x70\164\x65\144\x44\x3e\40\x69\x6e\x20\74\163\141\155\x6c\160\x3a\x4c\157\x67\x6f\x75\164\x52\x65\161\165\x65\x73\x74\x3e\56");
        ng:
        $KB = $KB[0];
        if ($KB->localName === "\105\156\143\x72\x79\160\164\145\144\x44\141\x74\141") {
            goto b4;
        }
        $this->nameId = Utilities::parseNameId($KB);
        goto ka;
        b4:
        $this->encryptedNameId = $KB;
        ka:
        $Ts = Utilities::xpQuery($pe, "\56\x2f\163\141\155\x6c\x5f\x70\x72\x6f\x74\157\143\x6f\154\x3a\x53\145\x73\x73\151\157\156\111\x6e\x64\x65\x78");
        foreach ($Ts as $oz) {
            $this->sessionIndexes[] = trim($oz->textContent);
            Zh:
        }
        dp:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($Sq)
    {
        $this->notOnOrAfter = $Sq;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto dW;
        }
        return TRUE;
        dW:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $nA)
    {
        $dK = new DOMDocument();
        $Jy = $dK->createElement("\x72\157\157\x74");
        $dK->appendChild($Jy);
        SAML2_Utils::addNameId($Jy, $this->nameId);
        $KB = $Jy->firstChild;
        SAML2_Utils::getContainer()->debugMessage($KB, "\x65\x6e\x63\x72\x79\x70\164");
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
            goto XN;
        }
        return;
        XN:
        $KB = SAML2_Utils::decryptElement($this->encryptedNameId, $nA, $Y9);
        SAML2_Utils::getContainer()->debugMessage($KB, "\x64\x65\x63\x72\171\x70\164");
        $this->nameId = SAML2_Utils::parseNameId($KB);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto DT;
        }
        throw new Exception("\101\164\x74\x65\155\160\164\145\x64\40\164\157\x20\162\x65\x74\162\151\145\x76\145\40\x65\156\x63\x72\x79\x70\164\145\x64\x20\116\141\x6d\145\x49\x44\x20\167\151\x74\x68\x6f\x75\x74\x20\x64\145\143\162\171\x70\164\151\156\147\40\x69\164\x20\x66\151\162\x73\164\56");
        DT:
        return $this->nameId;
    }
    public function setNameId($KB)
    {
        $this->nameId = $KB;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $Ts)
    {
        $this->sessionIndexes = $Ts;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto bE;
        }
        return NULL;
        bE:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($oz)
    {
        if (is_null($oz)) {
            goto BE;
        }
        $this->sessionIndexes = array($oz);
        goto SW;
        BE:
        $this->sessionIndexes = array();
        SW:
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
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($nc)
    {
        $this->destination = $nc;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($jj)
    {
        $this->issuer = $jj;
    }
}
