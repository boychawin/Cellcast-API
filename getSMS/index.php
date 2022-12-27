<?php

function getSms($token,$message_id) {
    try {
        $url = 'https://cellcast.com.au/api/v3/get-sms?message_id='.$message_id; //API URL

        $headers = array(
            'APPKEY:'.$token,
            'Accept: application/json',
            'Content-Type: application/json',
        );

        $ch = curl_init(); //open connection
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        if (!$result = curl_exec($ch)) {
            $response_error = json_decode(curl_error($ch));
            return json_encode(array("status" => 400, "msg" => "Something went to wrong, please try again", "result" => $response_error));
        }
        curl_close($ch);
        return json_encode(array("status" => 200, "msg" => "Successfully received", "result" => json_decode($result)));

    } catch (\Exception $e) {
        return json_encode(array("status" => 400, "msg" => "Something went to wrong, please try again.", "result" => array()));
    }
}
  

?>