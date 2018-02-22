<?php

use Tetris\Tetromino;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Init.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$t = new Tetromino(Tetromino::TYPE_I);
print_r($t->points);
$t->moveDown();
print_r($t->points);
$t->moveRight();
print_r($t->points);
$t->moveLeft();
print_r($t->points);
$t->moveUp();
print_r($t->points);
