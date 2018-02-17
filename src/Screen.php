<?php

namespace Tetris;

class Screen
{
    /**
     * @var int Width of the screen.
     */
    private $width = 10;
    /**
     * @var int Height of the screen.
     */
    private $height = 24;

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }
}
