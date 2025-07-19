<?php

namespace App\Core;

use App\Core\Core;
use Exception;

class Router
{
    private array $routes = [];

    public function get(string $path, $callback): void
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function post(string $path, $callback): void
    {
        $this->addRoute('POST', $path, $callback);
    }

    private function addRoute(string $method, string $path, $callback): void
    {
        $this->routes[$method][$path] = $callback;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $routes = $this->routes; //require ROUTES_PATH . 'Routes.php';
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $matchedUri = $this->exactMatchUriInArrayRoutes($uri, $routes[$requestMethod]);
        $params = [];
        $controller = null;

        if (empty($matchedUri)) {
            $matchedUri = $this->dinamicMatchUriInArrayRoutes($uri, $routes[$requestMethod]);
            $uri = explode('/', ltrim($uri, '/'));
            $params = $this->extractParams($uri, $matchedUri);
            $params = $this->paramsFormat($uri, $params);
        }
        if (!empty($matchedUri)) {
            $controller = Core::loadController($matchedUri, $params);
            return $controller;
        }
        throw new Exception('Algo deu errado');
    }

    /*ver para  variáveis dos parâmetros virarem atributos  */
    private function exactMatchUriInArrayRoutes($uri, $routes)
    {
        return (array_key_exists($uri, $routes)) ?
            [$uri => $routes[$uri]] :
            [];
    }

    private function dinamicMatchUriInArrayRoutes($uri, $routes)
    {
        return array_filter(
            $routes,
            function ($value) use ($uri) {
                $regex = str_replace('/', '\/', ltrim($value, '/'));
                return preg_match("/^$regex$/", ltrim($uri, '/'));
            },
            ARRAY_FILTER_USE_KEY //para retornar as chaves do routes ao invés dos valores
        );
    }

    private function extractParams($uri, $matchedUri)
    {
        if (!empty($matchedUri)) {
            $matchedToGetParams = array_keys($matchedUri)[0];
            return array_diff(
                $uri,
                explode('/', ltrim($matchedToGetParams, '/'))
            );
        }
        return [];
    }
    private function paramsFormat($uri, $params)
    {
        $paramsData = [];
        foreach ($params as $index => $param) {
            $paramsData[$uri[$index - 1]] = $param;
        }
        return $paramsData;
    }
}