<?php
// 应用入口文件


// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./jzw/');

// 定义默认模块
define('BIND_MODULE','Home');
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
