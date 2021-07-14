<?php 
$consumerKey='';
$consumerSecret='';

$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
$credentials = base64_encode($credential);



curl_setopt($curl, CURLOPT_RETURNTRANSFER, FALSE);


curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header

curl_setopt($curl, CURLOPT_HEADER, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$result=curl_exec($curl);


curl_close($curl);

?>
