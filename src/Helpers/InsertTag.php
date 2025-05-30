<?php

namespace App\Helpers;

use Contao\System;

class InsertTag
{
    public static function parse($strBuffer)
    {

        $parser = System::getContainer()->get('contao.insert_tag.parser');

        return $parser->replaceInline((string)$strBuffer);
    }
}