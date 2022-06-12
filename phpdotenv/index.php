<?php 

require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
//$dotenv->safeLoad();// .env文件不存在，不会抛出异常
$dotenv->load();
print_r($_ENV);