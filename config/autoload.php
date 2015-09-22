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
 * Register the namespace
 */
ClassLoader::addNamespace('NewsCategories');

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    // Classes
    'NewsCategories\News'                          => 'system/modules/news_categories/classes/News.php',
    'NewsCategories\NewsCategories'                => 'system/modules/news_categories/classes/NewsCategories.php',

    // Content elements
    'NewsCategories\ContentNewsFilter'             => 'system/modules/news_categories/elements/ContentNewsFilter.php',

    // Models
    'NewsCategories\NewsCategoryModel'             => 'system/modules/news_categories/models/NewsCategoryModel.php',
    'NewsCategories\NewsCategoryMultilingualModel' => 'system/modules/news_categories/models/NewsCategoryMultilingualModel.php',
    'NewsCategories\NewsModel'                     => 'system/modules/news_categories/models/NewsModel.php',

    // Modules
    'NewsCategories\ModuleNewsCategories'          => 'system/modules/news_categories/modules/ModuleNewsCategories.php',
    'NewsCategories\ModuleNewsArchive'             => 'system/modules/news_categories/modules/ModuleNewsArchive.php',
    'NewsCategories\ModuleNewsList'                => 'system/modules/news_categories/modules/ModuleNewsList.php',
    'NewsCategories\ModuleNewsMenu'                => 'system/modules/news_categories/modules/ModuleNewsMenu.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    // Modules
    'mod_newscategories' => 'system/modules/news_categories/templates/modules',

    // Navigation
    'nav_newscategories' => 'system/modules/news_categories/templates/navigation',
));
