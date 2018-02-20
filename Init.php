<?php

/*
 * GLOBAL VARIABLES
 */
define('APP_LOG', __DIR__ . 'log' . DIRECTORY_SEPARATOR . date('Y-m-d-H-i-s') . '.log');
define('APP_NAME', 'Tetris');
define('APP_SLUG', 'tetris');
define('APP_VERSION_MAJOR', 1);
define('APP_VERSION_MINOR', 0);
define('APP_COLUMNS', (int)exec('tput cols'));
define('APP_LINES', (int)exec('tput lines'));
define('APP_SCREEN_COLUMNS', 10);
define('APP_SCREEN_LINES', 24);

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

/**
 * Tries to clear the whole screen. No matter what.
 * http://www.tldp.org/HOWTO/Bash-Prompt-HOWTO/x361.html
 */
function clearScreen()
{
    for ($i = 0; $i < APP_LINES; $i++) {
        /*
         * \r      RETURN TO BEGINNING OF LINE
         * \033[K  ERASE TO THE END OF LINE
         * \033[1A MOVE UP ONE LINE
         * \r      RETURN TO BEGINNING OF LINE
         * \033[K  ERASE TO THE END OF LINE
         * \r      RETURN TO BEGINNING OF LINE
         */
        echo "\r\033[K\033[1A\r\033[K\r";
    }
}
