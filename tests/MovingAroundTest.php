<?php

use Tetris\Tetromino;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Init.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$t = new Tetromino(Tetromino::TYPE_T);
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
    for ($sy = 0; $sy < APP_PLAYING_SCREEN_LINES; $sy++) {
        for ($sx = 0; $sx < APP_PLAYING_SCREEN_COLUMNS; $sx++) {
            $hit = false;
            foreach ($t->points as $row) {
                foreach ($row as $point) {
                    if ($sx === $point[0] && $sy === $point[1]) {
                        $hit = true;
                        echo $t->char;
                    }
                }
            }
            if (!$hit) {
                echo ' ';
            }
        }
        echo APP_VERTICAL_WALL . PHP_EOL;
    }
    echo str_repeat(APP_HORIZONTAL_WALL, APP_PLAYING_SCREEN_COLUMNS) . PHP_EOL;
    usleep(100000);
}
