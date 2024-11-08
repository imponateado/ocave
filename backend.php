<?php

class Routes
{
    private $routes = [];

    public function addRoute($method, $path, $handler): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function handleRequest(): mixed
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url(url: $_SERVER['REQUEST_URI'], component: PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                return $route['handler']();
            }
        }

        http_response_code(404);
        return ['error' => 'Rota não encontrada'];
    }
}

class Response {
    public static function json($data): void {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

