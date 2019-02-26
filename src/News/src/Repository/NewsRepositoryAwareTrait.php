<?php

namespace News\Repository;

/**
 * Trait NewsRepositoryAwareTrait
 *
 * @package News\Repository
 */
trait NewsRepositoryAwareTrait
{
    /** @var NewsRepositoryInterface */
    private $newsRepository;

    /**
     * @return NewsRepositoryInterface
     */
    public function getNewsRepository(): NewsRepositoryInterface
    {
        return $this->newsRepository;
    }

    /**
     * @param NewsRepositoryInterface $newsRepository
     */
    public function setNewsRepository(NewsRepositoryInterface $newsRepository): void
    {
        $this->newsRepository = $newsRepository;
    }
}
