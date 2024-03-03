<?php
function kob_command_success($message)
{
    echo "\e[44m KobFramework By Tavon Seesenpila\e[0m\n";
    echo "\e[42mSuccess\e[0m \e[32m : $message\e[39m\n";
}
function kob_command_error($message)
{
    echo "\e[44m KobFramework By Tavon Seesenpila\e[0m\n";
    echo "\e[41mError\e[0m \e[31m : $message\e[39m\n";
}
function kob_command_info($message)
{
    echo "\e[44mInfo\e[0m \e[34m : $message\e[39m\n";
}
function kob_command_warning($message)
{
    echo "\e[43mWarning\e[0m \e[33m : $message\e[39m\n";
}

function kob_command_not_found()
{
    echo "\e[44m KobFramework By Tavon Seesenpila\e[0m\n";
    kob_command_warning('Command not found');
    kob_command_info('you can use the following commands:');
    kob_command_info('new:controller');
    kob_command_info('new:view');
    kob_command_info('Example: php kob new:controller <controller_name>');
    exit;
}