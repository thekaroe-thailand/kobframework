<?php
define('CONTROLLER_CONTENT', "<?php\n\nclass %s extends Controller\n{\n    // Your controller code here\n}\n");
define('CONTROLLER_REST', "<?php\n\nclass %s extends Controller\n{\n    public function index()\n    {\n        // Your controller code here\n    }\n\n    public function create()\n    {\n        // Your controller code here\n    }\n\n    public function store()\n    {\n        // Your controller code here\n    }\n\n    public function show(\$id)\n    {\n        // Your controller code here\n    }\n\n    public function edit(\$id)\n    {\n        // Your controller code here\n    }\n\n    public function update(\$id)\n    {\n        // Your controller code here\n    }\n\n    public function destroy(\$id)\n    {\n        // Your controller code here\n    }\n}\n");

if (count($arguments) < 1) {
    kob_command_info("Please provide controller name.");
    kob_command_info("Example: php kob new:controller <controller_name> [--rest|-r]");
    exit(1);
}
$controllerName = $arguments[0];
$filename = "./app/controllers/{$controllerName}.php";

if (file_exists($filename)) {
    kob_command_error("Controller {$controllerName} already exists.");
    exit(1);
}

$content = sprintf(CONTROLLER_CONTENT, $controllerName);

if (array_key_exists(1, $arguments)) {
    if ($arguments[1] === '--rest' || $arguments[1] === '-r') {
        $content = sprintf(CONTROLLER_REST, $controllerName);
    } else {
        kob_command_error("Invalid option {$arguments[1]}");
        kob_command_info('Available options: --rest, -r');
        exit(1);
    }
}

if (file_put_contents($filename, $content)) {
    kob_command_success("Controller {$controllerName} created successfully.");
} else {
    kob_command_error("Failed to create controller {$controllerName}.");
    exit(1);
}