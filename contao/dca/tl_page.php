<?php
use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_page']['fields']['umami_id'] = [
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'maxlength' => 255],
    'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_page']['fields']['umami_url'] = [
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'maxlength' => 255],
    'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
];

PaletteManipulator::create()
    ->addLegend('umami_legend', 'website_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('umami_id', 'umami_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('umami_url', 'umami_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('root', 'tl_page')
    ->applyToPalette('rootfallback', 'tl_page')
;
