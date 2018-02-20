#INSTALATION
```bash
wget -q https://getcomposer.org/composer.phar -O composer.phar
php composer.phar install
```
##TESTING KEYBOARD INPUT
```bash
php tests/KeyboardInputTest.php
```
##TESTING SCREEN
```bash
php tests/ScreenTest.php
```
#NOTICES
This can not be run under any IDE debug/run mode normally, because they usually add some restrictions/additional layers on terminal console. Commands like `stty` and/or `tput` and streams will not work correctly. Also, you must use `bash`.

[ASCII console escape characters](https://en.wikipedia.org/wiki/ASCII)

[Bash prompt movin cursor](http://www.tldp.org/HOWTO/Bash-Prompt-HOWTO/x361.html)
