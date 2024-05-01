<?php

namespace App\SuperGlobal;

class Router {

    private array $routes;

    public function register(string $route, callable $action): self
    {
        $this->routes[$route] = $action;

        return $this;
    }

    public function resolve(string $requestURI):void
    {
        $path = array_reverse(explode('/', $requestURI))[0];

        $path = '/' . $path;
        $path = $path === '/index.php' ? '/': $path;

        if(in_array($path, array_keys($this->routes))) {
            call_user_func($this->routes[$path]);
        } else {
            echo 'Route not found';
        }
    }
}
