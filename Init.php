<?php

/*
 * GLOBAL VARIABLES
 */
define('APP_LOG', __DIR__ . 'log' . DIRECTORY_SEPARATOR . date('Y-m-d-H-i-s') . '.log');
define('APP_NAME', 'Tetris');
define('APP_SLUG', 'tetris');
define('APP_VERSION_MAJOR', 1);
define('APP_VERSION_MINOR', 0);
define('APP_COLUMNS', exec('tput cols'));
define('APP_LINES', exec('tput lines'));

/*
 * Adjust some console settings:
 * 1. Set minimum character limit for complete command (-icanon min N)
 * 2. Set no delay/timeout on any input (time 0)
 * To know more, please consult `man stty`.
 */
exec('stty -icanon min 0 time 0');

/**
 * @param string $value Variable that will contain input value.
 * @return bool
 */
function readStream(&$value): bool
{
    $read = [STDIN];
    $write = [];
    $except = [];
    $numberOfChangedStreams = stream_select($read, $write, $except, 0);
    if ($numberOfChangedStreams === false) {
        error('Could not detect number of changed streams.');
        return false;
    }
    if ($numberOfChangedStreams > 0) {
        $value = stream_get_line(STDIN, 1);
        if (strlen($value) > 0) {
            return true;
        }
    }
    return false;
}

function clearScreen()
{
    echo "\033[2J\033[;H";
}

/**
 * @param string $message Message to log.
 * @param string $type Type of message to log.
 */
function logToFile($message, $type = 'INFO')
{
    file_put_contents(APP_LOG, date('Y-m-d H:i:s') . " [$type] $message" . PHP_EOL);
}

/**
 * @param string $message
 */
function info($message)
{
    logToFile($message, 'INFO');
}

/**
 * @param string $message
 */
function error($message)
{
    logToFile($message, 'ERROR');
}
