<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Init.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

clearScreen();
$fc = 0;
while (true) {
    clearScreen();
    for ($l = 0; $l < APP_SCREEN_LINES; $l++) {
        echo str_pad("L{$l}FC{$fc}", APP_SCREEN_COLUMNS, '#') . PHP_EOL;
    }
    $fc++;
    sleep(1);
}
