<?php

namespace News\Handler;

use News\Form\NewsForm;
use News\Repository\NewsRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Helper\UrlHelper;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class CreateNewsHandler
 *
 * @package News\Handler
 */
class CreateNewsHandler implements RequestHandlerInterface
{
    /** @var NewsForm */
    private $newsForm;

    /** @var NewsRepositoryInterface */
    private $newsRepository;

    /** @var TemplateRendererInterface */
    private $template;

    /** @var UrlHelper */
    private $urlHelper;

    /**
     * CreateNewsHandler constructor.
     *
     * @param NewsForm                  $newsForm
     * @param NewsRepositoryInterface   $newsRepository
     * @param TemplateRendererInterface $template
     * @param UrlHelper                 $urlHelper
     */
    public function __construct(
        NewsForm $newsForm, NewsRepositoryInterface $newsRepository, TemplateRendererInterface $template,
        UrlHelper $urlHelper
    ) {
        $this->newsForm       = $newsForm;
        $this->newsRepository = $newsRepository;
        $this->template       = $template;
        $this->urlHelper      = $urlHelper;
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if ($request->getMethod() === 'POST') {
            $postData = $request->getParsedBody();

            $nextId = $this->newsRepository->getNextId();

            if ($this->newsRepository->createNews($nextId, $postData)) {
                return new RedirectResponse($this->urlHelper->generate('news-show', ['id' => $nextId]));
            }
        }

        $data = [
            'newsForm' => $this->newsForm,
        ];

        return new HtmlResponse($this->template->render('news::create', $data));
    }
}
