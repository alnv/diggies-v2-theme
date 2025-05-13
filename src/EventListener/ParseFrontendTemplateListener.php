<?php

namespace App\EventListener;

use App\Helpers\StylesCombiner;
use Contao\Combiner;
use Contao\FrontendTemplate;
use Contao\System;
use Symfony\Component\HttpFoundation\Request;

class ParseFrontendTemplateListener
{

    /**
     * @param string $buffer
     * @param string $templateName
     * @param FrontendTemplate $template
     * @return string
     */
    public function __invoke(string $buffer, string $templateName, FrontendTemplate $template): string
    {

        $strIsBackend = System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''));

        if ($strIsBackend) {
            return $buffer;
        }

        global $objPage;

        if ($templateName == 'fe_page') {
            $GLOBALS['TL_CSS']['theme'] = StylesCombiner::getCombiner($objPage->rootId)->getCombinedFile();

            $objCombiner = new Combiner();
            $objCombiner->add('layout/js/main.js');
            $GLOBALS['TL_BODY'][] = '<script src="' . $objCombiner->getCombinedFile() . '"></script>';

            $objCombiner = new Combiner();
            $objCombiner->add('layout/scss/print.scss');
            $GLOBALS['TL_HEAD']['print'] = '<link rel="stylesheet" href="' . $objCombiner->getCombinedFile() . '" media="print">';

            return $buffer;
        }

        $strRoot = System::getContainer()->getParameter('kernel.project_dir');
        $strCss = 'layout/scss/modules/' . $templateName . '.scss';

        if (!file_exists($strRoot . '/' . $strCss)) {
            return $buffer;
        }

        StylesCombiner::addStyle($strCss, $objPage->rootId);

        return $buffer;
    }
}