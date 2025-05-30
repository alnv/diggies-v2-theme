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

        StylesCombiner::addStyle('layout/scss/fonts.scss', $pageModel->rootId);
        StylesCombiner::addStyle('layout/scss/normalize.scss', $pageModel->rootId);
        StylesCombiner::addStyle('layout/scss/theme.scss', $pageModel->rootId);

        $GLOBALS['TL_HEAD']['main'] = $this->getMainTheme();
    }

    protected function getMainTheme(): string
    {
        $objCombiner = new Combiner();
        $objCombiner->add('layout/scss/main.scss');

        return '<link rel="stylesheet" href="' . $objCombiner->getCombinedFile() . '">';
    }
}