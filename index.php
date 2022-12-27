<?php 
declare(strict_types=1);
require_once('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$token = $_ENV['APPKEY'] ?? '';

// ===================  test sendSms() ==================
// require_once('./sendSMS/index.php');
// $msg = 'Your 2factor login OTP is 911';
// $phone =["61485872892"];
// $res = sendSms($token,$msg,$phone);
// print_r($res);
// ===================  test getSMS() ==================
// require_once('./getSMS/index.php');
// $message_id = '51947A4B-A6F9-AA7C-764B-2A97BF5DD42A';
// $res = getSms($token,$message_id);
// print_r($res);
// // ===================  test getSmsResponses() ==================
// require_once('./getSmsResponses/index.php');
// $page = 1;
// $res = getSmsResponses($token,$page);
// print_r($res);

// ===================  test getSmsResponses() ==================
// require_once('./inboundRead/index.php');
// $message_id = '51947A4B-A6F9-AA7C-764B-2A97BF5DD42A';
// $date_before = '2022-12-27 18:17:42';
// $res = setSmsInboundStatus($token,$date_before);
// print_r($res);

// ===================  test getOptoutList() ==================
require_once('./getOptout/index.php');
$res = getOptoutList($token);
print_r($res);



?>