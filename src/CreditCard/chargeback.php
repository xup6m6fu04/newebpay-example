<?php
require __DIR__.'/../../vendor/autoload.php';

use Src\Config\Config;
use Xup6m6fu04\NewebPay\NewebPay;

// 顯示錯誤訊息
ini_set('display_errors', '1');
error_reporting(E_ALL);

// 設定回傳標頭
header('Content-Type: application/json');

// 載入設定檔案
$config = Config::get();

/**
 * 送出信用卡請款範例
 */
$newebpay = new NewebPay($config);
$result = $newebpay->creditCardChargeback($_POST['MerchantOrderNo'], $_POST['Amt'])->submit();

echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);