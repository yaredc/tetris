<?php

namespace Tetris;

use Exception;

class Tetromino
{
    /**
     * @param int $type
     * @throws Exception
     */
    public function __construct($type = self::TYPE_I)
    {
        $this->type = $type;
        $this->points = self::$types[$this->type];
        $this->setWidthAndHeight();
    }

    const TYPE_I = 0;
    const TYPE_O = 1;
    const TYPE_T = 2;
    const TYPE_S = 3;
    const TYPE_Z = 4;
    const TYPE_J = 5;
    const TYPE_L = 6;
    /**
     * @var array
     */
    static public $types = [
        self::TYPE_I => [
            [[1, 1]],
            [[1, 2]],
            [[1, 3]],
            [[1, 4]],
        ],
        self::TYPE_O => [
            [[1, 1], [2, 1]],
            [[1, 2], [2, 2]],
        ],
        self::TYPE_T => [
            [[1, 1], [1, 2], [1, 3]],
            [[2, 2]],
        ],
        self::TYPE_S => [
            [[1, 2], [1, 3]],
            [[2, 1], [2, 2]],
        ],
        self::TYPE_Z => [
            [[1, 1], [1, 2]],
            [[2, 2], [2, 3]],
        ],
        self::TYPE_J => [
            [[1, 2]],
            [[2, 2]],
            [[1, 3], [2, 3]],
        ],
        self::TYPE_L => [
            [[1, 1]],
            [[1, 2]],
            [[1, 3], [2, 3]],
        ],
    ];
    /**
     * @var int
     */
    public $width = 0;
    /**
     * @var int
     */
    public $height = 0;
    /**
     * @var array
     */
    public $points = [];
    /**
     * @var int
     */
    private $type = self::TYPE_I;

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    public function setWidthAndHeight()
    {
        foreach (self::$types[$this->type] as $line) {
            $this->width = max($this->width, count($line));
            $this->height++;
        }
    }

    public function moveLeft()
    {
        foreach ($this->points as &$row) {
            foreach ($row as &$point) {
                $point[0]--;
            }
        }
    }

    public function moveRight()
    {
        foreach ($this->points as &$row) {
            foreach ($row as &$point) {
                $point[0]++;
            }
        }
    }

    public function moveDown()
    {
        foreach ($this->points as &$row) {
            foreach ($row as &$point) {
                $point[1]++;
            }
        }
    }

    public function moveUp()
    {
        foreach ($this->points as &$row) {
            foreach ($row as &$point) {
                $point[1]--;
            }
        }
    }
}
