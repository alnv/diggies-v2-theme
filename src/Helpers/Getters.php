<?php

namespace App\Helpers;

use Alnv\ContaoCatalogManagerBundle\Views\Master;
use Contao\Database;

class Getters
{

    public function getOptions($strField): array
    {

        $arrReturn = [];
        $objField = Database::getInstance()->prepare('SELECT * FROM tl_catalog_field WHERE fieldname=?')->limit(1)->execute($strField);

        if ($objField->optionsSource != 'dbOptions') {
            return [];
        }

        $arrSettings = json_decode($objField->dbWizardFilterSettings, true);
        $strPid = $arrSettings[0]['option3'] ?? 0;
        $objOptions = Database::getInstance()->prepare('SELECT * FROM '. $objField->dbTable .' WHERE pid=? ORDER BY title')->execute($strPid);

        while ($objOptions->next()) {
            $arrReturn[$objOptions->alias] = $objOptions->title;
        }

        return $arrReturn;
    }

    public function getCatalogItemByUrlFragment($strActiveUrlFragment): array
    {

        if (!$strActiveUrlFragment) {
            return [];
        }

        $arrEntities = (new Master('cm_diggies_option_values', ['alias' => $strActiveUrlFragment, 'ignoreVisibility' => true, 'fastMode' => true]))->parse();
        $arrEntities = $arrEntities[0] ?? [];

        if (empty($arrEntities)) {
            return [];
        }

        $strAlias = $arrEntities['getParent']()['alias'] ?? '';
        if ($strAlias == 'classlevels') {
            $strAlias = 'classLevels';
        }


        $arrTags = [];
        $objTags = Database::getInstance()->prepare('SELECT * FROM cm_diggies WHERE (subjects REGEXP ? OR classLevels REGEXP ? OR types REGEXP ?) AND tstamp > 0 ORDER BY RAND()')
            ->limit(1)
            ->execute('[[:<:]]' . $arrEntities['id'] . '[[:>:]]', '[[:<:]]' . $arrEntities['id'] . '[[:>:]]', '[[:<:]]' . $arrEntities['id'] . '[[:>:]]');

        while ($objTags->next()) {
            foreach (explode(',', $objTags->tags) as $strTag) {
                $arrTags[] = $strTag;
            }
        }

        $arrTags = array_filter($arrTags);

        return [
            'headline' => [
                'value' => (($arrEntities['h1title'] ?? '') ?: $arrEntities['title']),
                'unit' => 'h1'
            ],
            'subheadline' => [
                'value' => ($arrEntities['subtitle'] ?? ''),
                'unit' => 'h2'
            ],
            'text' => ($arrEntities['content'] ?? ''),
            'icon' => ($arrEntities['icon'][0] ?? ''),
            'contents' => $arrEntities['getContentElements'](),
            'seoTitle' => ($arrEntities['seoTitle'] ?? ''),
            'seoDescription' => ($arrEntities['seoDescription'] ?? ''),
            'alias' => $strAlias,
            'tags' => $arrTags
        ];
    }

    public function getFormClassLevels(): array
    {
        if (!Database::getInstance()->tableExists('cm_options_container')) {
            return [];
        }

        $arrReturn = [];
        $objOptions = Database::getInstance()->prepare('SELECT * FROM cm_options WHERE pid=? ORDER BY sorting ASC')->execute('2');

        while ($objOptions->next()) {
            $arrReturn[$objOptions->title] = $objOptions->title;
        }

        return $arrReturn;
    }

    public function getFormSubjects(): array
    {

        if (!Database::getInstance()->tableExists('cm_options_container')) {
            return [];
        }

        $arrReturn = [];
        $objOptions = Database::getInstance()->prepare('SELECT * FROM cm_options WHERE pid=? ORDER BY sorting ASC')->execute('1');

        while ($objOptions->next()) {
            $arrReturn[$objOptions->title] = $objOptions->title;
        }

        return $arrReturn;
    }

    public function getTags(): array
    {

        $arrReturn = [];
        $objTags = Database::getInstance()->prepare('SELECT tags,published,tstamp  FROM cm_diggies WHERE published=? AND tstamp>0')->execute('1');

        while ($objTags->next()) {

            foreach (\explode(',', $objTags->tags) as $strTag) {

                if (in_array($strTag, $arrReturn)) {
                    continue;
                }

                $arrReturn[] = $strTag;
            }
        }

        sort($arrReturn);

        return $arrReturn;
    }

    public function getClassLevelsFragUrlFragment($strClassLevels): string
    {

        if (!$strClassLevels) {
            return '';
        }

        preg_match_all('!\d+!', $strClassLevels, $arrMatches);

        $intMin = $arrMatches[0][0] ?? 0;
        $intMax = $arrMatches[0][count($arrMatches[0]) - 1] ?? 0;

        return implode(',', range($intMin, $intMax));
    }
}