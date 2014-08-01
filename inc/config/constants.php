<?php

define('APP_BASE_URL', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('APP_BASE_PATH', realpath(__DIR__ . DIRECTORY_SEPARATOR . '../../'));