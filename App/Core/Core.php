<?php

namespace App\Core;

use Exception;

abstract class Core
{
    public static function loadController($matchedUri, $params)
    {
        list($controller, $method) = explode('@', array_values($matchedUri)[0]);
        $controllerWithNamespace = CONTROLLER_PATH . $controller . 'Controller';

        if (!class_exists($controllerWithNamespace)) {
            throw new Exception("Controller {$controller} não existe");
        }
        $controllerInstance = new $controllerWithNamespace;

        if (!method_exists($controllerInstance, $method)) {
            throw new Exception("O Método {$method} não existe");
        }
        $controller = $controllerInstance->$method($params);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            die();
        }

        return $controller;
    }
}