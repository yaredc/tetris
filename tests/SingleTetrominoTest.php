<?php

use Tetris\Tetromino;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Init.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$t = new Tetromino(Tetromino::TYPE_T);
$t->rotateClockwise();
