<?php

/**
 * Newsletter2Go extension for Contao Open Source CMS
 *
 * Copyright (C) 2015-2015 Newsletter2Go GmbH
 *
 * @package newsletter2go
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
    'NewsCategories\News'                          => 'system/modules/newsletter2go/classes/News.php',
    'NewsCategories\NewsCategories'                => 'system/modules/newsletter2go/classes/NewsCategories.php',

    // Content elements
    'NewsCategories\ContentNewsFilter'             => 'system/modules/newsletter2go/elements/ContentNewsFilter.php',

    // Models
    'NewsCategories\NewsCategoryModel'             => 'system/modules/newsletter2go/models/NewsCategoryModel.php',
    'NewsCategories\NewsCategoryMultilingualModel' => 'system/modules/newsletter2go/models/NewsCategoryMultilingualModel.php',
    'NewsCategories\NewsModel'                     => 'system/modules/newsletter2go/models/NewsModel.php',

    // Modules
    'NewsCategories\ModuleNewsCategories'          => 'system/modules/newsletter2go/modules/ModuleNewsCategories.php',
    'NewsCategories\ModuleNewsArchive'             => 'system/modules/newsletter2go/modules/ModuleNewsArchive.php',
    'NewsCategories\ModuleNewsList'                => 'system/modules/newsletter2go/modules/ModuleNewsList.php',
    'NewsCategories\ModuleNewsMenu'                => 'system/modules/newsletter2go/modules/ModuleNewsMenu.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    // Modules
    'mod_newscategories' => 'system/modules/newsletter2go/templates/modules',

    // Navigation
    'nav_newscategories' => 'system/modules/newsletter2go/templates/navigation',
));
