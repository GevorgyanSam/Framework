<?php

namespace App\Kernel\Core\Router;

use App\Http\Middleware\Kernel;
use App\Kernel\Contract\Router\RouteInterface;

class Route implements RouteInterface
{
    protected static array $bindings = [];

    protected static function add(string $uri, array $handler, string $method): self
    {
        self::$bindings[] = [
            'uri' => $uri,
            'handler' => $handler,
            'method' => $method,
            'middleware' => []
        ];
        return new self();
    }

    public static function get(string $uri, array $handler): self
    {
        return self::add($uri, $handler, "GET");
    }

    public static function post(string $uri, array $handler): self
    {
        return self::add($uri, $handler, "POST");
    }

    public static function put(string $uri, array $handler): self
    {
        return self::add($uri, $handler, "PUT");
    }

    public static function patch(string $uri, array $handler): self
    {
        return self::add($uri, $handler, "PATCH");
    }

    public static function delete(string $uri, array $handler): self
    {
        return self::add($uri, $handler, "DELETE");
    }

    public static function load(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
        $filtered = array_filter(self::$bindings, function ($item) use ($uri, $method) {
            return ($item['uri'] === $uri && $item['method'] === strtoupper($method));
        });
        empty($filtered) ? abort(404) : self::handle(end($filtered));
    }

    protected static function handle(array $route): void
    {
        self::checkMiddleware($route);
        $controller = $route['handler'][0];
        $method = $route['handler'][1];
        if (!class_exists($controller)) {
            throw new \Exception("Controller class '{$controller}' not found");
        }
        if (!method_exists($controller, $method)) {
            throw new \BadMethodCallException("Method '{$method}' not found in controller '{$controller}'");
        }
        (new $controller)->$method();
    }

    protected static function checkMiddleware(array $route): void
    {
        if (!empty($route['middleware'])) {
            foreach ($route['middleware'] as $alias) {
                Kernel::handle($alias);
            }
        }
    }

    public static function middleware(string|array $middleware): self
    {
        if (is_string($middleware)) {
            self::$bindings[count(self::$bindings) - 1]['middleware'][] = $middleware;
        }
        if (is_array($middleware)) {
            foreach ($middleware as $alias) {
                self::$bindings[count(self::$bindings) - 1]['middleware'][] = $alias;
            }
        }
        return new self();
    }
}
