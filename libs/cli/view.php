<?php
define('HTML_BASIC', "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n    <!-- KOB PHP Framework By Tavon Seesenpila -->\n<meta charset=\"UTF-8\">\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>%s</title>\n</head>\n<body>\n    <h1>%s</h1>\n</body>\n</html>");
if (count($arguments) < 1) {
    kob_command_info("Please provide view name.");
    kob_command_info("Example: php kob new:view <view_name>");
    exit(1);
}
$viewName = $arguments[0];
$filename = "./app/views/{$viewName}.php";

if (file_exists($filename)) {
    kob_command_error("View {$viewName} already exists.");
    exit(1);
}

$content = sprintf(HTML_BASIC, $viewName, $viewName);

if (file_put_contents($filename, $content)) {
    kob_command_success("View {$viewName} created successfully.");
} else {
    kob_command_error("Failed to create view {$viewName}.");
    exit(1);
}