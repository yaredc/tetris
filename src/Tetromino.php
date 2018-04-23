<?php declare(strict_types=1);

namespace Tetris;

use Exception;

final class Tetromino
{
    /**
     * @param int $type
     * @throws Exception
     */
    public function __construct(int $type = self::TYPE_I)
    {
        $this->type = $type;
        $this->points = self::$types[$this->type];
        $this->setWidthAndHeight();
    }

    public const TYPE_I = 0;
    public const TYPE_O = 1;
    public const TYPE_T = 2;
    public const TYPE_S = 3;
    public const TYPE_Z = 4;
    public const TYPE_J = 5;
    public const TYPE_L = 6;
    /**
     * @var array
     */
    static public $types = [
        self::TYPE_I => [
            [[0, 0]],
            [[0, 1]],
            [[0, 2]],
            [[0, 3]],
        ],
        self::TYPE_O => [
            [[0, 0], [1, 0]],
            [[0, 1], [1, 1]],
        ],
        self::TYPE_T => [
            [[0, 0], [1, 0], [2, 0]],
            [[1, 1]],
        ],
        self::TYPE_S => [
            [[1, 0], [2, 0]],
            [[0, 1], [1, 1]],
        ],
        self::TYPE_Z => [
            [[0, 0], [1, 0]],
            [[1, 1], [2, 1]],
        ],
        self::TYPE_J => [
            [[1, 0]],
            [[1, 1]],
            [[0, 2], [1, 2]],
        ],
        self::TYPE_L => [
            [[0, 0]],
            [[0, 1]],
            [[0, 2], [1, 2]],
        ],
    ];
    /**
     * @var string Character that will represent current Tetromino on Screen.
     */
    public $char = '#';
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
    private $type;

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * Set internal width and height of Tetromino.
     */
    public function setWidthAndHeight(): void
    {
        foreach (self::$types[$this->type] as $line) {
            $this->width = max($this->width, \count($line));
            $this->height++;
        }
    }

    /**
     * @param int $places
     */
    public function moveLeft(int $places = 1): void
    {
        foreach ($this->points as &$row) {
            foreach ($row as &$point) {
                $point[0] -= $places;
            }
        }
    }

    /**
     * @param int $places
     */
    public function moveRight(int $places = 1): void
    {
        foreach ($this->points as &$row) {
            foreach ($row as &$point) {
                $point[0] += $places;
            }
        }
    }

    /**
     * @param int $places
     */
    public function moveDown(int $places = 1): void
    {
        foreach ($this->points as &$row) {
            foreach ($row as &$point) {
                $point[1] += $places;
            }
        }
    }

    /**
     * @param int $places
     */
    public function moveUp(int $places = 1): void
    {
        foreach ($this->points as &$row) {
            foreach ($row as &$point) {
                $point[1] -= $places;
            }
        }
    }

    public function rotateClockwise(): void
    {
        $rotated = [];
        for ($i = 0; $i < $this->width; $i++) {
            for ($j = 0; $j < $this->height; $j++) {
                $this->points[$i][$j];
            }
        }
        $this->points = $rotated;
    }
}
