<?php
namespace app\router    ;

class Router {
    private $routes = [];

    public function setRoutes($routes)
    {
        $this->routes = $routes;
    }

    // Méthode pour obtenir la route correspondante à la méthode et à l'URI
    public function getRoute($method, $uri)
    {
        // Nettoyer l'URI en supprimant les barres obliques au début et à la fin
        $uri = trim($uri, '/');

        // Vérifier si la méthode et l'URI existent dans les routes définies
        if (array_key_exists($method, $this->routes) && array_key_exists($uri, $this->routes[$method])) {
            // Retourner la route correspondante au methode
            return $this->routes[$method][$uri];
        }

        return []; // La route n'a pas été trouvée
    }
}
