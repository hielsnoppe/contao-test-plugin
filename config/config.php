<?php

/**
 * @copyright  Newsletter2Go GmbH 2015
 * @author     Niels Hoppe <hoppe@newsletter2go.com>
 * @package    Newsletter2Go
 */

/**
 * Hooks
 */

$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('Bit3\Contao\MetaPalettes\MetaPalettes', 'generatePalettes');

$GLOBALS['TL_EVENTS']['dc-general.factory.build-data-definition'][] = array(
    'Bit3\Contao\MetaPalettes\MetaPalettesBuilder::process',
    200
);

/**
 * Backwards compatibility
 */

spl_autoload_register (function ($class) {

    if ('MetaPalettes' === $class) {

        //class_alias('Bit3\Contao\MetaPalettes\MetaPalettes', 'MetaPalettes');

        return true;
    }

    return false;
});
