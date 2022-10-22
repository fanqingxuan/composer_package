<?php

use think\facade\Db;

require 'vendor/autoload.php';


Db::setConfig([
    // 默认数据连接标识
    'default'     => 'mysql',
    // 数据库连接信息
    'connections' => [
        'mysql' => [
            // 数据库类型
            'type'     => 'mysql',
            // 主机地址
            'hostname' => '127.0.0.1',
            // 用户名
            'username' => 'root',
            'password'  =>  'root',
            // 数据库名
            'database' => 'demo',
            // 数据库编码默认采用utf8
            'charset'  => 'utf8',
            // 数据库表前缀
            'prefix'   => 'tbl_',
            // 数据库调试模式
            'debug'    => true,
        ],
    ],
]);


$lastInsertId = Db::name('user')->strict(false)->insertAll([
    [
        'username11'  =>  '测试333',
        'age'=>344
    ],
    [
    'username11'  =>  '测试333',
    'age'=>3
    ]
]);

var_dump($lastInsertId);