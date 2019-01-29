<?php 
$consumerKey='IzTVqAJvjdwqsh4YhAAdFYukO9jsCq6b';
$consumerSecret='pj8JOPEsopmKC3Mx';

/*$headers=['Content-Type:application/json;charset:utf8'];

$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$curl=curl_init($url);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

curl_setopt($curl, CURLOPT_HEADER, FALSE);

curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);

$result=curl_exec($curl);
$status=curl_getinfo($curl,CURLINFO_HTTP_CODE);
$result=json_decode($result);

$access_token=$result;

echo $access_token;

curl_close($curl);

*/

$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
$credentials = base64_encode('IzTVqAJvjdwqsh4YhAAdFYukO9jsCq6b:pj8JOPEsopmKC3Mx');



curl_setopt($curl, CURLOPT_RETURNTRANSFER, FALSE);


curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header

curl_setopt($curl, CURLOPT_HEADER, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$result=curl_exec($curl);


echo json_decode($result);



curl_close($curl);

/*
// Sets our destination URL
$endpoint_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$credentials = base64_encode('IzTVqAJvjdwqsh4YhAAdFYukO9jsCq6b:pj8JOPEsopmKC3Mx');

// Sets our options array so we can assign them all at once
$options = [
  	CURLOPT_URL        => $endpoint_url,
  	CURLOPT_RETURNTRANSFER => TRUE,
  	CURLOPT_HTTPHEADER     => array('Authorization: Basic '.$credentials),
  	CURLOPT_HEADER => FALSE,
  	CURLOPT_SSL_VERIFYPEER => FALSE,
  	
	
];

// Initiates the cURL object
$curl = curl_init();

// Assigns our options
curl_setopt_array($curl, $options);

// Executes the cURL POST
$results = curl_exec($curl);

// Be kind, tidy up!
curl_close($curl);

$result = json_decode($results,true);

echo $result['access_token'];
*/

?>