<?php
declare(strict_types=1);
require_once "vendor/autoload.php";

use harlequiin\Patterns\ChainOfResponsibility\RequestHandler;
use harlequiin\Patterns\ChainOfResponsibility\NotFoundHandler;
use harlequiin\Patterns\ChainOfResponsibility\AuthorizationMiddleware;
use harlequiin\Patterns\ChainOfResponsibility\CacheMiddleware;
use harlequiin\Patterns\ChainOfResponsibility\RouterMiddleware;
use Zend\Diactoros\ResponseFactory;

$request = ServerRequestFactory::fromGlobals();

$stack = [
    new AuthorizationMiddleware(new ResponseFactory()),
    new CacheMiddleware(),
    new RouterMiddleware()
];

$handler = new RequestHandler($stack, new NotFoundHandler(new ResponseFactory()));
$handler->handle($request);

