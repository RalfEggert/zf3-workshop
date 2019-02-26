<?php

namespace News\Form;

/**
 * Trait NewsFormAwareTrait
 *
 * @package News\Form
 */
trait NewsFormAwareTrait
{
    /** @var NewsForm */
    private $newsForm;

    /**
     * @return NewsForm
     */
    public function getNewsForm(): NewsForm
    {
        return $this->newsForm;
    }

    /**
     * @param NewsForm $newsForm
     */
    public function setNewsForm(NewsForm $newsForm): void
    {
        $this->newsForm = $newsForm;
    }
}

