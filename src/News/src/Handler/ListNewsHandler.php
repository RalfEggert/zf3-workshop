<?php

namespace News\Handler;

use News\Repository\NewsRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class ListNewsHandler
 *
 * @package News\Handler
 */
class ListNewsHandler implements RequestHandlerInterface
{
    /** @var TemplateRendererInterface */
    private $template;

    /** @var NewsRepositoryInterface */
    private $newsRepository;

    /**
     * ListNewsHandler constructor.
     *
     * @param TemplateRendererInterface $template
     * @param NewsRepositoryInterface   $newsRepository
     */
    public function __construct(TemplateRendererInterface $template, NewsRepositoryInterface $newsRepository)
    {
        $this->template       = $template;
        $this->newsRepository = $newsRepository;
    }

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
