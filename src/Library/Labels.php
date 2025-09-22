<?php

namespace App\Library;

use App\Helpers\InsertTag;
use Contao\StringUtil;
use Contao\Database;

class Labels
{

    public static function getLabel($strKey, $strLabel = ""): string
    {

        if (!$strLabel || !$strKey) {
            return "";
        }

        $objLabel = Database::getInstance()->prepare('SELECT * FROM tl_labels WHERE `key`=?')->limit(1)->execute($strKey);
        if ($objLabel->numRows) {
            return InsertTag::parse(StringUtil::decodeEntities($objLabel->label ?: ''));
        }

        Database::getInstance()->prepare('INSERT INTO tl_labels %s')->set([
            'tstamp' => time(),
            'label' => $strLabel,
            'key' => $strKey
        ])->execute();

        return $strLabel;
    }
}