<?php

use Tetris\Screen;
use Tetris\Tetromino;

require __DIR__ . DIRECTORY_SEPARATOR . 'Init.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

clearScreen();
$s = new Screen();
$s->addNewTetromino(new Tetromino(Tetromino::TYPE_L));

while (true) {
    $input = null;
    clearScreen();
    readStream($input);
    $s->playerMoveActiveTetromino(ord($input));
    $s->dropActiveTetromino();
    $s->recalculateAll();
    $s->redrawPlayingScreen();
    $s->showInfo();
    usleep(100000);
}
