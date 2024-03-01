<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'app/models/UserModel.php';

spl_autoload_register(function ($class) {
    include 'app/controllers/' . $class . '.php';
});

$route = $_GET['route'] ?? '/';

list($controllerName, $methodName) = explode('/', trim($route, '/'));

$controllerName = ucfirst($controllerName) . 'Controller';

if (class_exists($controllerName)) {
    $controllerInstance = new $controllerName;

    if (method_exists($controllerInstance, $methodName)) {
        $controllerInstance->$methodName();
    } else {
        echo "404 - Method $methodName Not Found";
    }
} else {
    echo "404 - Controller $controllerName Not Found";
}