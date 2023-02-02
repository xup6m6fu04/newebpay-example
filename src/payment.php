<?php
require __DIR__.'/../vendor/autoload.php';

use Src\Config\Config;
use Xup6m6fu04\NewebPay\NewebPay;

// 顯示錯誤訊息
ini_set('display_errors', '1');
error_reporting(E_ALL);

/**
 * 送出交易範例
 */
$config = Config::get();

$newebpay = new NewebPay($config);
// 設定訂單內容
$newebpay = $newebpay->payment(
    $_POST['MerchantOrderNo'] ?: generateRandomString(), // 訂單編號
    $_POST['Amt'] ?: random_int(10, 1000), // 訂單金額
    $_POST['ItemDesc'] ?: '測試商品 - ' . generateRandomString(6), // 商品名稱
    $_POST['Email'] ?: 'test@gmail.com' // 付款人電子信箱
);
// 要更改設定用 ->set + 屬性名稱 (ex: setReturnURL)
$newebpay->setReturnURL('https://495e-1-162-18-21.jp.ngrok.io/src/return.php');
$newebpay->setNotifyURL('https://495e-1-162-18-21.jp.ngrok.io/src/notify.php');
$newebpay->setTokenTerm($_POST['Email']);
// 送出表單
echo $newebpay->submit();

/**
 * 產生隨機字串
 *
 * @param  int  $length
 *
 * @return string
 * @throws Exception
 */
function generateRandomString(int $length = 10): string
{
    $characters
        = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}