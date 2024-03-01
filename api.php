<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

spl_autoload_register(function ($class) {
    $controllerPath = 'app/controllers/' . $class . '.php';
    $modelPath = 'app/models/' . $class . '.php';

    if (file_exists($controllerPath)) {
        include $controllerPath;
    }

    if (file_exists($modelPath)) {
        include $modelPath;
    }
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