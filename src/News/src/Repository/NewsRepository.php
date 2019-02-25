<?php

namespace News\Repository;

/**
 * Class NewsRepository
 *
 * @package News\Repository
 */
class NewsRepository implements NewsRepositoryInterface
{
    /** @var array */
    private $data = [];

    /**
     * NewsRepository constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getNewsList(): array
    {
        return $this->data;
    }

    /**
     * @param int $id
     *
     * @return array|null
     */
    public function getNewsById(int $id): ?array
    {
        if (!isset($this->data[$id])) {
            return null;
        }

        return $this->data[$id];
    }
}
