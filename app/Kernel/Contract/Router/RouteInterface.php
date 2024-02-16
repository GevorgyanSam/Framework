<?php

namespace App\Kernel\Contract\Router;

interface RouteInterface
{
    /**
     * Bind the route to route bindings using the GET method.
     * 
     * @param string $uri
     * @param array $handler
     * @return self
     */
    public static function get(string $uri, array $handler): self;

    /**
     * Bind the route to route bindings using the POST method.
     * 
     * @param string $uri
     * @param array $handler
     * @return self
     */
    public static function post(string $uri, array $handler): self;

    /**
     * Bind the route to route bindings using the PUT method.
     * 
     * @param string $uri
     * @param array $handler
     * @return self
     */
    public static function put(string $uri, array $handler): self;

    /**
     * Bind the route to route bindings using the PATCH method.
     * 
     * @param string $uri
     * @param array $handler
     * @return self
     */
    public static function patch(string $uri, array $handler): self;

    /**
     * Bind the route to route bindings using the DELETE method.
     * 
     * @param string $uri
     * @param array $handler
     * @return self
     */
    public static function delete(string $uri, array $handler): self;

    /**
     * Load routes from route bindings or an HTTP 404 abort script.
     * 
     * @return void
     */
    public static function load(): void;

    /**
     * Add middleware to the last route.
     *
     * @param string|array $middleware
     * @return self
     */
    public static function middleware(string|array $middleware): self;
}
