<?php

/**
 * Newsletter2Go extension for Contao Open Source CMS
 *
 * Copyright (C) 2015-2015 Newsletter2Go GmbH
 *
 * @package contao-test-plugin
 * @author  Niels Hoppe <hoppe@newsletter2go.com>
 * @license All rights reserved
 */

/**
 * Extension version
 */
@define('NEWS_CATEGORIES_VERSION', '2.6');
@define('NEWS_CATEGORIES_BUILD', '1');

/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['content']['news']['tables'][] = 'tl_news_category';

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['news']['newscategories'] = 'ModuleNewsCategories';

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['includes']['newsfilter'] = 'ContentNewsFilter';

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseArticles'][] = array('News', 'addCategoriesToTemplate');

if (in_array('changelanguage', \ModuleLoader::getActive())) {
    $GLOBALS['TL_HOOKS']['translateUrlParameters'][] = array('NewsCategories', 'translateUrlParameters');
}

/**
 * Add permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'newscategories';
$GLOBALS['TL_PERMISSIONS'][] = 'newscategories_default';
