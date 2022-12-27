<?php


function sendSms($token,$text, $phone_number) {
    try {
        $url = 'https://cellcast.com.au/api/v3/send-sms'; //API URL
        $fields = array(
            'sms_text' => $text, //here goes your SMS text
            'numbers' => $phone_number // Your numbers array goes here
        );
        $headers = array(
            'APPKEY:'.$token,
            'Accept: application/json',
            'Content-Type: application/json',
        );

        $ch = curl_init(); //open connection
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (!$result = curl_exec($ch)) {
            $response_error = json_decode(curl_error($ch));
            return json_encode(array("status" => 400, "msg" => "Something went to wrong, please try again", "result" => $response_error));
        }
        curl_close($ch);
        return json_encode(array("status" => 200, "msg" => "SMS sent successfully", "result" => json_decode($result)));
    } catch (\Exception $e) {
        return json_encode(array("status" => 400, "msg" => "Something went to wrong, please try again.", "result" => array()));
    }
}


?>