<?php 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://cs89.salesforce.com/services/oauth2/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "grant_type=password&client_id=3MVG9sSN_PMn8tjSKLKXBo7Mbm8Eqp56ENpidLlflWJBIFzLRBuzXme4xtUxMrqmtpqk5XYxXIZ5YC3.cPiJZ&client_secret=EFC538A316D225A04D802EF39566765A998C575E2719FD56CCE9CC7A53723DC0&username=ronald@digital-transformation.institute.bvsandbox&password=PHFSup4VD874Yohq",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded"
    //"postman-token: b0057aab-2aa8-99f7-29ca-7f6502c4159d"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
   $parameter = json_decode($response, true); 
}

?>