<?php

/*
 * GLOBAL VARIABLES
 */
define('LOG_FILE', __DIR__ . 'log' . DIRECTORY_SEPARATOR . date('Y-m-d-H-i-s') . '.log');

/*
 * Adjust some console settings:
 * 1. Set minimum character limit for complete command (-icanon min N)
 * 2. Set no delay/timeout on any input (time 0)
 */
exec('stty -icanon min 0 time 0');

/**
 * @param string $value Variable that will contain input value.
 * @return bool
 * @throws Exception
 */
function readStream(&$value)
{
    $read = [STDIN];
    $write = [];
    $except = [];
    $numberOfChangedStreams = stream_select($read, $write, $except, 0);
    if ($numberOfChangedStreams === false) {
        throw new Exception('Could not detect number of changed streams.');
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
    file_put_contents(LOG_FILE, date('Y-m-d H:i:s') . " [$type] $message" . PHP_EOL);
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
