<?php

namespace News\Handler;

use App\Helper\UrlHelperAwareTrait;
use App\Template\TemplateAwareTrait;
use News\Form\NewsFormAwareTrait;
use News\Repository\NewsRepositoryAwareTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

/**
 * Class CreateNewsHandler
 *
 * @package News\Handler
 */
class CreateNewsHandler implements RequestHandlerInterface
{
    use NewsRepositoryAwareTrait;
    use NewsFormAwareTrait;
    use TemplateAwareTrait;
    use UrlHelperAwareTrait;

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

            $result = $this->newsRepository->createNews($nextId, $postData);

            if ($result['success'] === true) {
                return new RedirectResponse($this->urlHelper->generate('news-show', ['id' => $nextId]));
            }

            $this->newsForm->setData($postData);
            $this->newsForm->setMessages($result['errors']);
        }

        $data = [
            'newsForm' => $this->newsForm,
        ];

        return new HtmlResponse($this->template->render('news::create', $data));
    }
}
