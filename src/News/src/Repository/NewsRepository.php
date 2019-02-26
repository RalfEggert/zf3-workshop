<?php

namespace News\Repository;

use News\InputFilter\NewsInputFilter;

/**
 * Class NewsRepository
 *
 * @package News\Repository
 */
class NewsRepository implements NewsRepositoryInterface
{
    /** @var array */
    private $data = [];

    /** @var NewsInputFilter */
    private $newsInputFilter;

    /**
     * NewsRepository constructor.
     *
     * @param array           $data
     * @param NewsInputFilter $newsInputFilter
     */
    public function __construct(array $data, NewsInputFilter $newsInputFilter)
    {
        $this->data            = $data;
        $this->newsInputFilter = $newsInputFilter;
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
     * @param array $unfilteredData
     *
     * @return array
     */
    public function createNews(int $nextId, array $unfilteredData): array
    {
        $this->newsInputFilter->setData($unfilteredData);

        if (false === $this->newsInputFilter->isValid()) {
            return [
                'success' => false,
                'errors'  => $this->newsInputFilter->getMessages(),
            ];
        }

        $filteredData = $this->newsInputFilter->getValues();

        $filteredData['date'] = date('Y-m-d');

        $this->data[$nextId] = $filteredData;

        $fileName = PROJECT_PATH . '/data/news/data.php';

        file_put_contents($fileName, '<?php return ' . var_export($this->data, true) . ';');

        sleep(3);

        return [
            'success' => true,
        ];
    }
}
