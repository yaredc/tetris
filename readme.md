#INSTALATION
```bash
wget -q https://getcomposer.org/composer.phar -O composer.phar
php composer.phar install
```
#TESTING KEYBOARD INPUT
```bash
php tests/KeyboardInputTest.php
```
#NOTICES
This can not be run under any IDE debug/run mode normally, because they usually add some restrictions/additional layers on terminal console. Commands like `stty` and/or `tput` and streams will not work correctly.

[ASCII console escape characters](https://en.wikipedia.org/wiki/ASCII)

Usage:
```php
echo chr(8); #FOR BACKSPACE
```
