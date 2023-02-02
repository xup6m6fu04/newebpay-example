<?php
require __DIR__.'/../../vendor/autoload.php';

use Src\Config\Config;
use Xup6m6fu04\NewebPay\NewebPay;

ini_set('display_errors', '1');
error_reporting(E_ALL);

/**
 * 送出查詢範例
 */
header('Content-Type: application/json');

$config = Config::get();

$newebpay = new NewebPay($config);
$result = $newebpay->query($_POST['MerchantOrderNo'], $_POST['Amt'])->submit();

echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);