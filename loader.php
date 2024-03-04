<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("X-XSS-Protection: 1; mode=block"); // XSS Protection
header("X-Content-Type-Options: nosniff"); // disable sniffing

spl_autoload_register(function ($class) {
    $paths = [
        'app/controllers/',
        'app/models/',
        'libs/'
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            include $file;
            return;
        }
    }
});

$route = filter_input(INPUT_GET, 'route', FILTER_SANITIZE_URL) ?? 'index'; // basic xss protection

$routeExploded = array_filter(explode('/', trim($route, '/'))); // ex. /user/index => ['user', 'index']
$controllerName = ucfirst(array_shift($routeExploded) ?? 'Index') . 'Controller';  // ex. user => UserController
$methodName = array_shift($routeExploded) ?? 'index';

try {
    if (class_exists($controllerName)) {
        $controllerInstance = new $controllerName;

        if (method_exists($controllerInstance, $methodName)) {
            $controllerInstance->$methodName();
        } else {
            throw new Exception("Method Not Found: $methodName", 404);
        }
    } else {
        throw new Exception("Controller Not Found: $controllerName", 404);
    }
} catch (Exception $e) {
    http_response_code($e->getCode());

    if (MODE === "API") {
        echo json_encode([
            'status' => $e->getCode(),
            'message' => $e->getMessage()
        ]);
    } else {
        echo htmlspecialchars($e->getMessage());
    }
}
