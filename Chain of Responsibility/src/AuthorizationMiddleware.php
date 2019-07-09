<?php
declare(strict_types=1);

namespace harelquiin\Patterns\ChainOfResponsibility;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseFactoryInterface;

/**
 * Handler (together with RequestHandler).
 * Defines default behavior for middlewares which is to delegate
 * the request handling to RequestHandler and return a Response from it.
 */
class AuthorizationMiddleware extends AbstractMiddleware
{
    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!$this->isAuthorized($request)) {
            return $this->responseFactory->createResponse(403);
        }
        return $this->handler->handle($request);
    }

    private function isAuthorized(ServerRequestInterface $request)
    {
        // process if can be authorized
    }
}
