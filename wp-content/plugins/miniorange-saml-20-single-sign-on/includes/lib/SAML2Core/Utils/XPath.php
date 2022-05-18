<?php


namespace RobRichards\XMLSecLibs\Utils;

class XPath
{
    const ALPHANUMERIC = "\x5c\x77\134\x64";
    const NUMERIC = "\134\144";
    const LETTERS = "\x5c\167";
    const EXTENDED_ALPHANUMERIC = "\134\167\x5c\x64\134\x73\134\55\137\x3a\x5c\56";
    const SINGLE_QUOTE = "\x27";
    const DOUBLE_QUOTE = "\42";
    const ALL_QUOTES = "\x5b\47\x22\135";
    public static function filterAttrValue($bc, $iA = self::ALL_QUOTES)
    {
        return preg_replace("\43" . $iA . "\x23", '', $bc);
    }
    public static function filterAttrName($lw, $JP = self::EXTENDED_ALPHANUMERIC)
    {
        return preg_replace("\x23\x5b\136" . $JP . "\x5d\x23", '', $lw);
    }
}
