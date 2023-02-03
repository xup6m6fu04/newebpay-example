<?php
require __DIR__.'/../vendor/autoload.php';

use Src\Config\Config;
use Xup6m6fu04\NewebPay\NewebPay;

// 顯示錯誤訊息
ini_set('display_errors', '1');
error_reporting(E_ALL);

/**
 * 藍新交易結果返回頁
 */
header('Content-Type: application/json');

$config = Config::get();

$newebPay = new NewebPay($config);

try {
    $data = $newebPay->decodeFromRequest($_POST);
    echo json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
} catch (Exception $e) {
    echo $e->getMessage();
}



