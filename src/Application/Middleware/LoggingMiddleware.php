<?php


namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Log\LoggerInterface;

class LoggingMiddleware implements Middleware
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function process(Request $request, RequestHandler $handler): Response
    {

        $routeData = $request->getMethod() . ":" . $request->getAttribute('route', 'Unknown');
        $requestLogMessage = "Request Started: " . $routeData;
        $responseLogMessage = "Request Ended: " . $routeData;
        $this->logger->info("$requestLogMessage");
        $response = $handler->handle($request);
        $this->logger->info("$responseLogMessage");

        return $response;
    }
}