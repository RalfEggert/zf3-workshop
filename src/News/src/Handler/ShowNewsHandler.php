<?php

namespace News\Handler;

use App\Helper\UrlHelperAwareTrait;
use App\Template\TemplateAwareTrait;
use News\Repository\NewsRepositoryAwareTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

/**
 * Class ShowNewsHandler
 *
 * @package News\Handler
 */
class ShowNewsHandler implements RequestHandlerInterface
{
    use NewsRepositoryAwareTrait;
    use TemplateAwareTrait;
    use UrlHelperAwareTrait;

    /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');

        if ($id === null) {
            return new RedirectResponse($this->urlHelper->generate('news-list'));
        }

        $news = $this->newsRepository->getNewsById($id);

        if ($news === null) {
            return new RedirectResponse($this->urlHelper->generate('news-list'));
        }

        $data = [
            'news' => $news,
        ];

        return new HtmlResponse($this->template->render('news::show', $data));
    }
}
