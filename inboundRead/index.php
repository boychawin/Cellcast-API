<?php 


function setSmsInboundStatus($token,$date_before) {
    try {
        $url = 'https://cellcast.com.au/api/v3/inbound-read'; //API URL
        // $fields = array(
        //     'message_id' => $message_id, //here goes your inbound message ID
        // );

        // If you want to mark all inbound message as read optionally before a certain date.
        $fields = array(
        //    'date_before' => $date_before, //here goes your inbound message ID
        );

        $headers = array(
            'APPKEY: '.$token.'',
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
        return json_encode(array("status" => 200, "msg" => "Successfully set status", "result" => json_decode($result)));
    } catch (\Exception $e) {
        return json_encode(array("status" => 400, "msg" => "Something went to wrong, please try again.", "result" => array()));
    }
}
      
      
      
      ?>