<?php


abstract class BasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto AYW;
        }
        self::$constCacheArray = array();
        AYW:
        $sR = get_called_class();
        if (array_key_exists($sR, self::$constCacheArray)) {
            goto SMp;
        }
        $N3 = new ReflectionClass($sR);
        self::$constCacheArray[$sR] = $N3->getConstants();
        SMp:
        return self::$constCacheArray[$sR];
    }
    public static function isValidName($lw, $Du = false)
    {
        $EI = self::getConstants();
        if (!$Du) {
            goto qmC;
        }
        return array_key_exists($lw, $EI);
        qmC:
        $ao = array_map("\163\164\162\x74\x6f\154\157\x77\145\162", array_keys($EI));
        return in_array(strtolower($lw), $ao);
    }
    public static function isValidValue($bc, $Du = true)
    {
        $RW = array_values(self::getConstants());
        return in_array($bc, $RW, $Du);
    }
}
