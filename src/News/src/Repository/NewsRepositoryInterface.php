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

    /**
     * @param int $id
     *
     * @return array
     */
    public function getNewsById(int $id): ?array;

    /**
     * @return int
     */
    public function getNextId(): int;

    /**
     * @param int   $nextId
     * @param array $unfilteredData
     *
     * @return array
     */
    public function createNews(int $nextId, array $unfilteredData): array;
}
