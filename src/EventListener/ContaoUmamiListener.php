<?php

declare(strict_types=1);

namespace Clickpress\ContaoUmamiBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Routing\ResponseContext\Csp\CspHandler;
use Contao\CoreBundle\Routing\ResponseContext\ResponseContextAccessor;
use Contao\PageModel;

#[AsHook('modifyFrontendPage')]
class ContaoUmamiListener
{
    public function __construct(private readonly ResponseContextAccessor $responseContextAccessor)
    {
    }

    public function __invoke(string $buffer, string $templateName): string
    {
        if (!str_starts_with($templateName, 'fe_')) {
            return $buffer;
        }

        global $objPage;
        $objRootPage = PageModel::findByPk($objPage->rootId);

        // check if null, to prevent that the bar is loaded, even if the checkbox 'activate clickskeks' is not checked
        if (null === $objRootPage || null === $objRootPage->umami_id || null === $objRootPage->umami_url) {
            return $buffer;
        }

        if (!str_starts_with($objRootPage->umami_url, 'http')) {
            $objRootPage->umami_url = 'https://' . $objRootPage->umami_url;
        }

        $responseContext = $this->responseContextAccessor->getResponseContext();

        if ($responseContext?->has(CspHandler::class)) {
            /** @var CspHandler $csp */
            $cspHandler = $responseContext->get(CspHandler::class);

            $cspHandler->addSource('script-src', $objRootPage->umami_url);
        }

        $html = sprintf(
            '<script defer src="%s/script.js" data-website-id="%s"></script>',
            $objRootPage->umami_url,
            $objRootPage->umami_id
        );

        return preg_replace('/(<head>)/s', "$1\n$html", $buffer);
    }
}
