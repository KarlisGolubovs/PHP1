<?php declare(strict_types=1);

namespace App\Core;

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use function FastRoute\simpleDispatcher;

class Router
{
    public static function route()
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $r) {
            $r->addRoute('GET', '/', ['App\Controllers\CharacterController', 'characters']);
            $r->addRoute('GET', '/characters/{page}[/{name}]', ['App\Controllers\CharacterController', 'characters']);
            $r->addRoute('GET', '/episodes[/{page}]', ['App\Controllers\EpisodeController', 'episodes']);
            $r->addRoute('GET', '/locations[/{page}]', ['App\Controllers\LocationController', 'locations']);
            $r->addRoute('GET', '/character[/{page}]', ['App\Controllers\CharacterController', 'singleCharacter']);
            $r->addRoute('GET', '/episode[/{page}]', ['App\Controllers\EpisodeController', 'singleEpisode']);
            $r->addRoute('GET', '/location[/{page}]', ['App\Controllers\LocationController', 'singleLocation']);
        });

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                http_response_code(404);
                echo 'Page not found';
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                http_response_code(405);
                echo 'Method not allowed';
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                [$controller, $method] = $handler;
                echo (new $controller)->{$method}($vars);
                break;
        }
    }
}
