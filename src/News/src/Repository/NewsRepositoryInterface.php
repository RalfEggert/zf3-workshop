<?php

namespace News\Repository;

/**
 * Interface NewsRepositoryInterface
 *
 * @package News\Repository
 */
interface NewsRepositoryInterface
{
    /**
     * @return array
     */
    public function getNewsList(): array;
}
