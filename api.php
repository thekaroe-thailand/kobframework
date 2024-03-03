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
    $libPath = 'libs/' . $class . '.php';

    $arr = [$controllerPath, $modelPath, $libPath];

    for ($i = 0; $i < count($arr); $i++) {
        $item = $arr[$i];

        if (file_exists($item)) {
            include $item;
        }
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
        echo "404 - Method ".htmlentities($methodName)." Not Found";
    }
} else {
    echo "404 - Controller ".htmlentities($controllerName)." Not Found";
}
