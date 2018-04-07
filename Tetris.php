<?php

require __DIR__ . DIRECTORY_SEPARATOR . 'Init.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$break = false;
while (!$break) {
	$key = '';
	if (readStream($key)) {
		echo "$key " . "ORD: " . ord($key) . PHP_EOL;
		$code = 0;
		switch ($code) {
			/*
			 * ESC, Q
			 */
			case 27:
			case 113:
				$break = true;
				break;
			/*
			 * W
			 */
			case 119:
				break;
			/*
			 * S
			 */
			case 115:
				break;
			/*
			 * A
			 */
			case 97:
				break;
			/*
			 * D
			 */
			case 100:
				break;
			default:
				break;
		}
		if ($break) {
			break;
		}
	}
	usleep(20000);
}
