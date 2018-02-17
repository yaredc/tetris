<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Init.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

echo <<<TEXT
This is a test script which shows ASCII number of key pressed.
To exit, press Ctrl + C.

TEXT;

while (true) {
    $key = '';
    if (readStream($key)) {
        echo chr(13);
        echo "Key pressed is \"{$key}\", ASCII value is: " . ord($key) . chr(127);
        echo chr(8);
    }
}
