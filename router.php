<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('CONTROLLER_FOLDER', 'controllers/');

// require all controllers
require_once CONTROLLER_FOLDER . 'listController.php';
require_once CONTROLLER_FOLDER . 'editController.php';
require_once CONTROLLER_FOLDER . 'creationController.php';
require_once CONTROLLER_FOLDER . 'deletionController.php';
require_once CONTROLLER_FOLDER . 'updateController.php';
require_once CONTROLLER_FOLDER . 'detailController.php';
require_once CONTROLLER_FOLDER . 'searchController.php';

class Router
{
    private $routes = [];

    public function addRoute($route, $controller, $method)
    {
        $this->routes[$route] = ['controller' => $controller, 'method' => $method];
    }

    // return array with [controller, method, id]
    public function route($url)
    {
        $urlParts = explode('/', $url, 2);
        $routeDestination = isset($urlParts[0]) ? $urlParts[0] : '';
        $id = isset($urlParts[1]) ? $urlParts[1] : '';

        foreach ($this->routes as $route => $action) {
            if ($routeDestination == $route) {
                if ($id != null || ($action['method'] != 'displayArticleDetail' && $action['method'] != 'editArticle')) {
                    return [$action, $id];
                }
            }
        }

        // throw 404, because resource was not found
        http_response_code(404);
        echo "404 Not Found";
    }

    public function dispatch($target)
    {
        if ($target) { // check if target is valid (not null)
            $controllerName = $target[0]['controller'];
            $controllerMethod = $target[0]['method'];
            $id = $target[1];

            $controller = new $controllerName; // instantiate appropriate controller
            call_user_func_array([$controller, $controllerMethod], [$id]); // function without parameters will ignore extras
        }
    }
}
