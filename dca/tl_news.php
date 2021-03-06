<?php

/**
 * newsletter2go extension for Contao Open Source CMS
 *
 * Copyright (C) 2011-2014 Codefog
 *
 * @package newsletter2go
 * @author  Webcontext <http://webcontext.com>
 * @author  Codefog <info@codefog.pl>
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */

/**
 * Register the global save and delete callbacks
 */
$GLOBALS['TL_DCA']['tl_news']['config']['onload_callback'][] = array('tl_newsletter2go', 'setAllowedCategories');
$GLOBALS['TL_DCA']['tl_news']['config']['onsubmit_callback'][] = array('tl_newsletter2go', 'updateCategories');
$GLOBALS['TL_DCA']['tl_news']['config']['ondelete_callback'][] = array('tl_newsletter2go', 'deleteCategories');

/**
 * Extend a tl_news palette
 */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace('{date_legend}', '{category_legend},categories;{date_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);

/**
 * Add a new field to tl_news
 */
$GLOBALS['TL_DCA']['tl_news']['fields']['categories'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_news']['categories'],
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'treePicker',
    'foreignKey'              => 'tl_news_category.title',
    'eval'                    => array('multiple'=>true, 'fieldType'=>'checkbox', 'foreignTable'=>'tl_news_category', 'titleField'=>'title', 'searchField'=>'title', 'managerHref'=>'do=news&table=tl_news_category'),
    'sql'                     => "blob NULL"
);

class tl_newsletter2go extends Backend
{

    /**
     * Set the allowed categories
     * @param DataContainer
     */
    public function setAllowedCategories($dc=null)
    {
        if (!$dc->id) {
            return;
        }

        $objArchive = $this->Database->prepare("SELECT categories FROM tl_news_archive WHERE limitCategories=1 AND id=(SELECT pid FROM tl_news WHERE id=?)")
                                     ->limit(1)
                                     ->execute($dc->id);

        if (!$objArchive->numRows) {
            return;
        }

        $arrCategories = deserialize($objArchive->categories, true);

        if (empty($arrCategories)) {
            return;
        }

        $GLOBALS['TL_DCA']['tl_news']['fields']['categories']['rootNodes'] = $arrCategories;
    }

    /**
     * Update the category relations
     * @param DataContainer
     */
    public function updateCategories(DataContainer $dc)
    {
        $this->import('BackendUser', 'User');
        $arrCategories = deserialize($dc->activeRecord->categories);

        // Use the default categories if the user is not allowed to edit the field directly
        if (!$this->User->isAdmin && !in_array('tl_news::categories', $this->User->alexf)) {

            // Return if the record is not new
            if ($dc->activeRecord->tstamp) {
                return;
            }

            $arrCategories = $this->User->newscategories_default;
        }

        $this->deleteCategories($dc);

        if (is_array($arrCategories) && !empty($arrCategories)) {
            foreach ($arrCategories as $intCategory) {
                $this->Database->prepare("INSERT INTO tl_newsletter2go (category_id, news_id) VALUES (?, ?)")
                               ->execute($intCategory, $dc->id);
            }

            $this->Database->prepare("UPDATE tl_news SET categories=? WHERE id=?")
                           ->execute(serialize($arrCategories), $dc->id);
        }
    }

    /**
     * Delete the category relations
     * @param DataContainer
     */
    public function deleteCategories(DataContainer $dc)
    {
        $this->Database->prepare("DELETE FROM tl_newsletter2go WHERE news_id=?")
                       ->execute($dc->id);
    }
}
