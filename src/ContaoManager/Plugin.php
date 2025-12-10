<?php

namespace Clickpress\ContaoUmamiBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\CoreBundle\ContaoCoreBundle;
use Clickpress\ContaoUmamiBundle\ContaoUmamiBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoUmamiBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}