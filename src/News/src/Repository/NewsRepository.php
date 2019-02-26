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

    /**
     * @return int
     */
    public function getNextId(): int
    {
        return count($this->data) + 1;
    }

    /**
     * @param int   $nextId
     * @param array $postData
     *
     * @return bool
     */
    public function createNews(int $nextId, array $postData): bool
    {
        $postData['date'] = date('Y-m-d');

        unset($postData['submit']);

        $this->data[$nextId] = $postData;

        $fileName = PROJECT_PATH . '/data/news/data.php';

        file_put_contents($fileName, '<?php return ' . var_export($this->data, true) . ';');

        sleep(1);

        return true;
    }
}
