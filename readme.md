# REQUIREMENTS

- PHP7
- Bash
- wget
- Probably some permissions

# INSTALATION

```bash
wget -q https://getcomposer.org/composer.phar -O composer.phar
php composer.phar install
```

# TESTING KEYBOARD INPUT

```bash
php tests/KeyboardInputTest.php
```

# DEBUGGING

Set some breakpoints in your IDE, and run following from `bash`:

```bash
php -dxdebug.remote_enable=1 -dxdebug.remote_mode=req -dxdebug.remote_port=9000 -dxdebug.remote_host=127.0.0.1 Tetris.php
```

# NOTICES

This can not be run under any IDE debug/run mode normally, because they usually add some restrictions/additional layers on terminal console. Commands like `stty` and/or `tput` and streams will not work correctly. Also, you must use `bash`.

[ASCII console escape characters](https://en.wikipedia.org/wiki/ASCII)

[Bash prompt, moving cursor around](http://www.tldp.org/HOWTO/Bash-Prompt-HOWTO/x361.html)
