<?php

global $arguments;

const CONTROLLER_CONTENT_TEMPLATE = <<<PHP
<?php

final class %s extends Controller {
    // Your controller code here
}
PHP;

const CONTROLLER_REST_TEMPLATE = <<<PHP
<?php

final class %s extends Controller {
    public function index()  
    {
        // Your controller code here
    }
    
    public function create()
    {
        // Your controller code here
    }
    
    public function store()
    {
        // Your controller code here
    }
    
    public function show(\$id) 
    {
        // Your controller code here
    }
    
    public function edit(\$id)
    {
        // Your controller code here
    }
    
    public function update(\$id)
    {
        // Your controller code here
    }
    
    public function destroy(\$id)
    {
        // Your controller code here
    }
}
PHP;

if (count($arguments) < 1) {
    kob_command_info("Please provide controller name.");
    kob_command_info("Example: php kob new:controller <controller_name> [--rest|-r]");
    exit(1);
}
$controllerName = $arguments[0];
$filename = "./app/controllers/$controllerName.php";

if (file_exists($filename)) {
    kob_command_error("Controller $controllerName already exists.");
    exit(1);
}

$content = sprintf(CONTROLLER_CONTENT_TEMPLATE, $controllerName);

if (array_key_exists(1, $arguments)) {
    if ($arguments[1] === '--rest' || $arguments[1] === '-r') {
        $content = sprintf(CONTROLLER_REST_TEMPLATE, $controllerName);
    } else {
        kob_command_error("Invalid option $arguments[1]");
        kob_command_info('Available options: --rest, -r');
        exit(1);
    }
}

if (file_put_contents($filename, $content)) {
    kob_command_success("Controller $controllerName created successfully.");
} else {
    kob_command_error("Failed to create controller $controllerName.");
    exit(1);
}