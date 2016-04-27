<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://www.1room.cc/member/edituserinfo");
curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS,
//    "postvar1=value1&postvar2=value2&postvar3=value3");

// in real life you should use something like:
 curl_setopt($ch, CURLOPT_POSTFIELDS,
          http_build_query(array(
              'webuid' => '1767742',
              'PHPSESSID'=>'a6a57291b636bd9599c0318923784584',
              'v_remember_encrypt'=>'1767742%7C44781817ea00ffcfca79d1ba06571bb0',
              )));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

echo $server_output;
// further processing ....
?>
