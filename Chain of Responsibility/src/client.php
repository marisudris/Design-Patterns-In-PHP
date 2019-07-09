<?php
declare(strict_types=1);

namespace harlequiin\Patters\ChainOfResponsibility;

use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\ResponseFactory;
use harelquiin\Patterns\ChainOfResponsibility\RequestHandler;
use harelquiin\Patterns\ChainOfResponsibility\AuthorizationMiddleware;
use harelquiin\Patterns\ChainOfResponsibility\CacheMiddleware;

function client(RequestHandlerInterface $handler)
{
    $request = ServerRequestFactory::fromGlobals();
    $handler->handle($request);
}

$stack = [
    new AuthorizationMiddleware(new ResponseFactory()),
    new CacheMiddleware()
];
$handler = new RequestHandler($stack);

client($handler);
