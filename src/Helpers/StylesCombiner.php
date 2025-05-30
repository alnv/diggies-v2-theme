<?php

namespace App\Helpers;

use Contao\Combiner;

class StylesCombiner
{

    /**
     * @var array
     */
    protected static array $arrStyles = [];

    /**
     * @param $strStyle
     * @param $strRootId
     * @return void
     */
    public static function addStyle($strStyle, $strRootId): void
    {

        if (!isset(static::$arrStyles[$strRootId])) {
            static::$arrStyles[$strRootId] = [];
        }

        if (!in_array($strStyle, static::$arrStyles)) {
            static::$arrStyles[$strRootId][] = $strStyle;
        }
    }

    /**
     * @param $strRootId
     * @return Combiner
     */
    public static function getCombiner($strRootId): Combiner
    {

        $objCombiner = new Combiner();
        foreach (static::$arrStyles[$strRootId] as $strStyle) {
            $objCombiner->add($strStyle);
        }

        return $objCombiner;
    }
}