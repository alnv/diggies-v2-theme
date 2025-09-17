<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()->addField('text', 'cmHide')->applyToPalette('listview', 'tl_content');

$GLOBALS['TL_DCA']['tl_content']['fields']['text']['eval']['tl_class'] = 'clr';