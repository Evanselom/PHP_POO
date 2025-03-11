<?php

class Router
{
    private $routes = [];

    // Enregistrer une route
    public function addRoute($uri, $controller, $method)
    {
        $this->routes[$uri] = ['controller' => $controller, 'method' => $method];
    }

    // Exécuter une route basée sur l'URI demandée
    public function execute($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            $route = $this->routes[$uri];
            $controllerName = $route['controller'];
            $methodName = $route['method'];

            // Inclure le contrôleur
            require_once "app/controllers/{$controllerName}.php";
            $controller = new $controllerName();

            // Appeler la méthode du contrôleur
            $controller->$methodName();
        } else {
            echo "Page non trouvée";
        }
    }
}
?>
