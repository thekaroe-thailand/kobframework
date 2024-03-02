<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kob Framework is PHP Framework for MVC Simple easy to use.">
    <title>Kob PHP Framework : Simple Framework for PHP Developer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

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
            echo "404 - Method $methodName Not Found";
        }
    } else {
        echo "404 - Controller $controllerName Not Found";
    }
    ?>
</body>

</html>