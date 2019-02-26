<?php

namespace App\Template;

use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Trait TemplateAwareTrait
 *
 * @package App\Template
 */
trait TemplateAwareTrait
{
    /** @var TemplateRendererInterface */
    private $template;

    /**
     * @return TemplateRendererInterface
     */
    public function getTemplate(): TemplateRendererInterface
    {
        return $this->template;
    }

    /**
     * @param TemplateRendererInterface $template
     */
    public function setTemplate(TemplateRendererInterface $template): void
    {
        $this->template = $template;
    }
}
