<?php

namespace News\Handler;

use News\Repository\NewsRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Helper\UrlHelper;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class ShowNewsHandler
 *
 * @package News\Handler
 */
class ShowNewsHandler implements RequestHandlerInterface
{
    /** @var TemplateRendererInterface */
    private $template;

    /** @var NewsRepositoryInterface */
    private $newsRepository;

    /** @var UrlHelper */
    private $urlHelper;

    /**
     * ShowNewsHandler constructor.
     *
     * @param TemplateRendererInterface $template
     * @param NewsRepositoryInterface   $newsRepository
     * @param UrlHelper                 $urlHelper
     */
    public function __construct(
        TemplateRendererInterface $template, NewsRepositoryInterface $newsRepository, UrlHelper $urlHelper
    ) {
        $this->template = $template;
        $this->newsRepository = $newsRepository;
        $this->urlHelper = $urlHelper;
    }

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

        $data     = [
            'news' => $news,
        ];

        return new HtmlResponse($this->template->render('news::show', $data));
    }
}
