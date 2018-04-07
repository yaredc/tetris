<?php

namespace Tetris;

use Exception;

final class Tetromino
{
	/**
	 * @var string Character that will represent current Tetromino on Screen.
	 */
	public $char = '#';

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

	/**
	 * @param int $places
	 */
	public function moveLeft($places = 1)
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
	public function moveRight($places = 1)
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
	public function moveDown($places = 1)
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
	public function moveUp($places = 1)
	{
		foreach ($this->points as &$row) {
			foreach ($row as &$point) {
				$point[1] -= $places;
			}
		}
	}
}
