<?php

namespace News\Handler;

use App\Template\TemplateAwareTrait;
use News\Repository\NewsRepositoryAwareTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;

/**
 * Class ListNewsHandler
 *
 * @package News\Handler
 */
class ListNewsHandler implements RequestHandlerInterface
{
    use NewsRepositoryAwareTrait;
    use TemplateAwareTrait;

    /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = [
            'newsList' => $this->newsRepository->getNewsList(),
        ];

        return new HtmlResponse($this->template->render('news::list', $data));
    }
}
