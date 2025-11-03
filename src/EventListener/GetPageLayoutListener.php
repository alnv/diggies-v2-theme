<?php

namespace App\EventListener;

use App\Helpers\StylesCombiner;
use Contao\Combiner;
use Contao\LayoutModel;
use Contao\PageModel;
use Contao\PageRegular;

class GetPageLayoutListener
{

    public function __invoke(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    {

        $objCombiner = new Combiner();
        $objCombiner->add('layout/scss/fonts.scss');
        $objCombiner->add('layout/scss/normalize.scss');
        $objCombiner->add('layout/scss/theme.scss');
        $objCombiner->add('layout/js/splide/splide.min.scss');

        $GLOBALS['TL_CSS']['base'] = $objCombiner->getCombinedFile();
        $GLOBALS['TL_HEAD']['main'] = $this->getMainTheme();
    }

    protected function getMainTheme(): string
    {
        $objCombiner = new Combiner();
        $objCombiner->add('layout/scss/main.scss');

        return '<link rel="stylesheet" href="' . $objCombiner->getCombinedFile() . '">';
    }
}