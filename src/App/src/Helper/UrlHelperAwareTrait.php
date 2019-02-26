<?php

namespace App\Helper;

use Zend\Expressive\Helper\UrlHelper;

/**
 * Trait UrlHelperAwareTrait
 *
 * @package App\Helper
 */
trait UrlHelperAwareTrait
{
    /** @var UrlHelper */
    private $urlHelper;

    /**
     * @return UrlHelper
     */
    public function getUrlHelper(): UrlHelper
    {
        return $this->urlHelper;
    }

    /**
     * @param UrlHelper $urlHelper
     */
    public function setUrlHelper(UrlHelper $urlHelper): void
    {
        $this->urlHelper = $urlHelper;
    }
}
