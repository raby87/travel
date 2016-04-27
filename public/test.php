<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$cookie = 'v_remember_encrypt=1767742%7C44781817ea00ffcfca79d1ba06571bb0; PHPSESSID=a6a57291b636bd9599c0318923784584; webuid=1767742;';
$xml_data = http_build_query(['points'=>1000]);
$headers = [
    'Cookie: ' . $cookie,
    'Content-type: application/json',
    "Content-length: ".strlen($xml_data),
];
$url = "http://www.shouxiumv.net/member/edituserinfo";
//$url = "http://run.51094.com/rest/home";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS,
//    "postvar1=value1&postvar2=value2&postvar3=value3");

// in real life you should use something like:
 curl_setopt($ch, CURLOPT_POSTFIELDS,
     $xml_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36");

array(
'webuid' => '1767742',
              'PHPSESSID'=>'a6a57291b636bd9599c0318923784584',
              'v_remember_encrypt'=>'1767742%7C44781817ea00ffcfca79d1ba06571bb0',
              );

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

echo $server_output;
// further processing ....
?>
