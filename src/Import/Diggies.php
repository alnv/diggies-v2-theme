<?php

namespace App\Import;

use Ausi\SlugGenerator\SlugGenerator;
use Ausi\SlugGenerator\SlugOptions;
use Contao\Database;
use Contao\Database\Result;
use Contao\Dbafs;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\System;
use GuzzleHttp\Client;

class Diggies
{

    protected Result $objImportSettings;

    public function __construct($strPimImportId)
    {
        $this->objImportSettings = Database::getInstance()->prepare('SELECT * FROM tl_diggies_api_import WHERE id=?')->limit(1)->execute($strPimImportId);
    }

    public function getAlias($strAlias, $strInternalId, $strUniqueID)
    {

        $objAlias = Database::getInstance()
            ->prepare('SELECT alias, id, internal_id FROM ' . $this->objImportSettings->destTable . ' WHERE internal_id!=? AND alias=?')
            ->execute($strInternalId, $strAlias);

        if (!$objAlias->numRows) {
            return $strAlias;
        }

        if ($objAlias->numRows) {
            $strAlias = $strAlias . '-' . $strUniqueID;
        }

        return $strAlias;
    }

    public function getObjectsById(): void
    {

        if (!$this->objImportSettings->url) {
            return;
        }

        if (!$this->objImportSettings->destTable || !Database::getInstance()->tableExists($this->objImportSettings->destTable)) {
            return;
        }

        $arrParams = [];
        foreach (StringUtil::deserialize($this->objImportSettings->params, true) as $arrParam) {
            $arrParams[$arrParam['key']] = $arrParam['value'];
        }

        $strParams = http_build_query($arrParams, '', '&');
        $arrResults = $this->getResults($this->objImportSettings->baseUrl . $this->objImportSettings->url . '?' . $strParams . '&sort_field=publishDate', $arrResults);

        Database::getInstance()->prepare('UPDATE ' . $this->objImportSettings->destTable . ' %s')->set(['published' => ''])->execute();

        foreach ($this->iterateKeyValueArray($arrResults) as $intIndex => $arrData) {

            $objGenerator = new SlugGenerator((new SlugOptions())
                ->setValidChars('a-z0-9')
                ->setLocale('de')
                ->setDelimiter('-')
            );

            $intMin = $intIndex + 1;
            $objEntity = Database::getInstance()
                ->prepare('SELECT alias, id, internal_id FROM ' . $this->objImportSettings->destTable . ' WHERE internal_id=?')
                ->limit(1)
                ->execute($arrData['id']);

            $strAlias = $objGenerator->generate($arrData['name']);
            $strAlias = $this->getAlias($strAlias, $arrData['id'], ($objEntity?->id ?: substr($arrData['id'], 0, 8)));

            $strPreviewUrl = $this->getPreviewUrl($arrData['id']);

            $arrSet = [
                'tstamp' => \strtotime('+' . $intMin . 'minutes', time()),
                'name' => $arrData['name'],
                'published' => '1',
                'alias' => $strAlias,
                'previewMode' => $strPreviewUrl ? '1' : '',
                'previewUrl' => $strPreviewUrl
            ];

            if ($objEntity->alias !== $strAlias) {
                $arrSet['origin_alias'] = $objEntity->alias;
            }

            $arrFieldsMapping = [
                'type' => 'types'
            ];

            foreach ($this->iterateKeyValueArray($arrData) as $strField => $varValue) {

                $strFieldname = $arrFieldsMapping[$strField] ?? $strField;
                if (!Database::getInstance()->fieldExists($strFieldname, $this->objImportSettings->destTable)) {
                    continue;
                }

                switch ($strField) {
                    case 'id':
                        $arrSet['internal_id'] = $varValue;
                        break;
                    case 'tags':
                        $varValue = \is_array($varValue) ? \implode(',', $varValue) : '';
                        break;
                    case 'images':
                        $arrImages = [];
                        foreach ($varValue as $arrImage) {
                            if ($strImageUuid = $this->getAsset($arrImage)) {
                                $arrImages[] = $strImageUuid;
                            }
                        }
                        $varValue = \serialize($arrImages);
                        break;
                    case 'subjects':
                        $arrReturn = [];
                        if (is_array($varValue) && !empty($varValue)) {
                            foreach ($varValue as $strValue) {
                                $arrReturn[] = $this->addOption('1', $strValue);
                            }
                        }
                        $varValue = \serialize($arrReturn);
                        break;
                    case 'type':
                        $varValue = $this->addOption('4', $varValue);
                        break;
                    case 'features':
                        $arrReturn = [];
                        if (is_array($varValue) && !empty($varValue)) {
                            foreach ($varValue as $strValue) {
                                $arrReturn[] = $this->addOption('5', $strValue);
                            }
                        }
                        $varValue = \serialize($arrReturn);
                        break;
                    case 'classLevels':
                        $arrReturn = [];
                        if (is_array($varValue) && !empty($varValue)) {
                            $strLabel = 'Klassenstufe ' . ($varValue[0] ?? '') . (($varValue[count($varValue) - 1] ?? '') ? '-' . ($varValue[count($varValue) - 1] ?? '') : '');
                            $arrReturn[] = $this->addOption('2', $strLabel);
                        }
                        $arrSet['classLevelsAll'] = \serialize($varValue);
                        $varValue = \serialize($arrReturn);
                        break;
                }

                $arrSet[$strFieldname] = $varValue;
            }

            unset($arrSet['id']);

            try {
                if ($objEntity->numRows) {
                    Database::getInstance()->prepare('UPDATE ' . $this->objImportSettings->destTable . ' %s WHERE id=?')->limit(1)->set($arrSet)->execute($objEntity->id);
                } else {
                    Database::getInstance()->prepare('INSERT INTO ' . $this->objImportSettings->destTable . ' %s')->set($arrSet)->execute();
                }
            } catch (\Exception $objError) {
                //
            }
        }
    }

    protected function addOption($strFieldId, $strValue)
    {

        $strLabel = $strValue;
        $objGenerator = new SlugGenerator((new SlugOptions())
            ->setValidChars('a-z0-9')
            ->setLocale('de')
            ->setDelimiter('-')
        );
        $strValue = $objGenerator->generate($strValue);
        $objOption = Database::getInstance()->prepare('SELECT * FROM cm_diggies_option_values WHERE `pid`=? AND `alias`=?')->limit(1)->execute($strFieldId, $strValue);

        if ($objOption->numRows) {
            return $objOption->id;
        }

        $objInsert = Database::getInstance()->prepare('INSERT INTO cm_diggies_option_values %s')->set([
            'tstamp' => time(),
            'sorting' => 0,
            'pid' => $strFieldId,
            'title' => $strLabel,
            'alias' => $strValue
        ])->execute();

        return $objInsert->insertId;
    }

    protected function getResults($strUrl, &$arrResults = [])
    {

        $objClient = new Client();
        $objResponse = $objClient->get($strUrl, [
            'auth' => []
        ]);

        $arrData = \json_decode($objResponse->getBody()->getContents(), true);

        if (isset($arrData['content']) && \is_array($arrData['content'])) {
            foreach ($arrData['content'] as $arrObj) {
                $arrResults[] = $arrObj;
            }
        }

        unset($arrData);

        return $arrResults;
    }

    protected function getPreviewUrl($strId): string
    {

        $strPreviewUrl = "https://api.diggies.de/api/v3/diggies/marketing/link/" . $strId;

        $objClient = new Client();
        $objResponse = $objClient->get($strPreviewUrl);
        $arrData = \json_decode($objResponse->getBody()->getContents(), true);

        return $arrData['previewUrl'] ?? '';
    }

    protected function getAsset($arrImage): string
    {

        if ($arrImage['type'] != 'IMAGE') {
            return '';
        }

        $strRootDir = System::getContainer()->getParameter('kernel.project_dir');
        $strImageName = \basename($arrImage['name']);
        $strFolderPath = 'files/diggies/' . substr($strImageName, 0, 1);

        if (!\file_exists($strRootDir . '/' . $strFolderPath . '/' . $strImageName)) {

            if (!\file_exists($strRootDir . '/' . $strFolderPath)) {
                \mkdir($strRootDir . '/' . $strFolderPath);
                Dbafs::addResource($strFolderPath);
            }

            file_put_contents($strRootDir . '/' . $strFolderPath . '/' . $strImageName, $this->fileGetContent(($arrImage['url'] ?? '')));
            $objFile = Dbafs::addResource($strFolderPath . '/' . $strImageName);
            return $objFile->uuid;
        }

        if ($objFile = FilesModel::findByPath($strFolderPath . '/' . $strImageName)) {
            return $objFile->uuid;
        }

        return '';
    }

    public function fileGetContent($strUrl): string
    {
        try {

            $strUrl = str_replace('%2F', '/', $strUrl);
            $objClient = new Client();
            $objResponse = $objClient->get($strUrl);
            return $objResponse->getBody()->getContents();

        } catch (\Exception $objError) {
            return '';
        }
    }

    public function iterateKeyValueArray(array $arrData): \Iterator
    {
        foreach ($arrData as $strKey => $varRow) {
            yield $strKey => $varRow;
        }
    }
}