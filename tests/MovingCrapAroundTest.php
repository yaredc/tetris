<?php

use Tetris\Tetromino;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Init.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$t = new Tetromino(Tetromino::TYPE_I);
clearScreen();
while (true) {
    $input = null;
    clearScreen();
    readStream($input);
    switch (ord($input)) {
        case 119: //w
            $t->moveUp();
            break;
        case 115: //s
            $t->moveDown();
            break;
        case 97: //a
            $t->moveLeft();
            break;
        case 100: //d
            $t->moveRight();
            break;
    }
    for ($sy = 0; $sy < APP_SCREEN_LINES; $sy++) {
        for ($sx = 0; $sx < APP_SCREEN_COLUMNS; $sx++) {
            foreach ($t->points as $row) {
                foreach ($row as $point) {
                    if (($sx + 1) === $point[0] && ($sy + 1) === $point[1]) {
                        echo $point[0];
                    }
                }
            }
            echo ' ';
        }
        echo PHP_EOL;
    }
    echo str_repeat('=', APP_SCREEN_COLUMNS) . PHP_EOL;
    usleep(100000);
}
