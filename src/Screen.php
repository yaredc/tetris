<?php

namespace Tetris;

final class Screen
{
	/**
	 * @var Tetromino[] List af all Tetrominos currently on screen.
	 */
	private $tetrominos = [];
	/**
	 * @var int Index of Tetromino that is currently controlled by user.
	 */
	private $activeTetromino = 0;

	/**
	 * Loop through all Tetrominos and redraw them in playing screen.
	 */
	public function redrawPlayingScreen()
	{
		foreach ($this->tetrominos as $index => $t) {
			for ($sy = 0; $sy < APP_SCREEN_LINES; $sy++) {
				for ($sx = 0; $sx < APP_SCREEN_COLUMNS; $sx++) {
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
				echo '|' . PHP_EOL;
			}
		}
	}

	/**
	 * Drop currently active Tetromino.
	 * @param int $places
	 */
	public function dropActiveTetromino($places = 1)
	{
		if (!empty($this->tetrominos[$this->activeTetromino])) {
			$this->tetrominos[$this->activeTetromino]->moveDown($places);
		}
	}

	/**
	 * @param int $key
	 * @param int $places
	 */
	public function playerMoveActiveTetromino(int $key, $places = 1)
	{
		if (!empty($this->tetrominos[$this->activeTetromino])) {
			switch ($key) {
				case 115: //s
					$this->tetrominos[$this->activeTetromino]->moveDown($places);
					break;
				case 97: //a
					$this->tetrominos[$this->activeTetromino]->moveLeft($places);
					break;
				case 100: //d
					$this->tetrominos[$this->activeTetromino]->moveRight($places);
					break;
			}
		}
	}

	/**
	 * Add new Tetormino to Screen and sets it as currently active Tetromino.
	 * @param Tetromino $t
	 */
	public
	function addNewTetromino(Tetromino $t)
	{
		$this->tetrominos[] = $t;
		end($this->tetrominos);
		$this->activeTetromino = key($this->tetrominos);
		reset($this->tetrominos);
	}

	/**
	 * Show some info.
	 */
	public
	function showInfo()
	{
		echo str_repeat('=', APP_SCREEN_COLUMNS) . PHP_EOL;
		echo 'USAGE: ' . getMemoryUsage() . PHP_EOL;
		echo ' REAL: ' . getMemoryUsage(true) . PHP_EOL;
	}
}
