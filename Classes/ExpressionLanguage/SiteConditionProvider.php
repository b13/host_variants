<?php
declare(strict_types = 1);
namespace B13\HostVariants\ExpressionLanguage;

/*
 * This file is part of TYPO3 CMS-based extension host_variants by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\ExpressionLanguage\AbstractProvider;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class SiteConditionProvider extends AbstractProvider
{
    public function __construct()
    {
        if (Environment::isCli()) {
            return;
        }

        // We make the host available in conditions for site configs base variants
        // to enable base URL switches depending on the domain.
        // e.g. host == 'www.host.tld'
        $this->expressionLanguageVariables = [
            'host' => GeneralUtility::getIndpEnv('HTTP_HOST'),
        ];
    }
}
