<?php
require __DIR__.'/../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

// 顯示錯誤訊息
ini_set('display_errors', '1');
error_reporting(E_ALL);

/**
 * 藍新回調記錄到 Log
 */
$log = new Logger('logger');
$log->pushHandler(new StreamHandler('Log/api.log', Level::Debug));

// add records to the log
$log->debug("callback: ", $_POST);
$log->debug(file_get_contents('php://input'));

echo "SUCCESS";
