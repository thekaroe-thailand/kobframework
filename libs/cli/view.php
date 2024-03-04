<?php

global $arguments;

const HTML_BASIC_TEMPLATE = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- KOB PHP Framework By Tavon Seesenpila -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>%s</title>
</head>
<body>
    <h1>%s</h1>
</body>
</html>
HTML;

if (count($arguments) < 1) {
    kob_command_info("Please provide view name.");
    kob_command_info("Example: php kob new:view <view_name>");
    exit(1);
}

$viewName = $arguments[0];
$filename = "./app/views/$viewName.php";

if (file_exists($filename)) {
    kob_command_error("View $viewName already exists.");
    exit(1);
}

$content = sprintf(HTML_BASIC_TEMPLATE, $viewName, $viewName);

if (file_put_contents($filename, $content)) {
    kob_command_success("View $viewName created successfully.");
} else {
    kob_command_error("Failed to create view $viewName.");
    exit(1);
}
