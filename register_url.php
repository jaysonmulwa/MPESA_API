<?php

// Sets our destination URL
$endpoint_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

//$credentials = base64_encode('m0eGuBu3sGKOjcHpn9rC0ZEg2ivyI2qE:BcI6nnaJAYcTsc8X');

//$credentials = base64_encode('IzTVqAJvjdwqsh4YhAAdFYukO9jsCq6b:pj8JOPEsopmKC3Mx');

$credentials = base64_encode('ls2oRnxQvBYy2exGvza1SGHkomAJGMOF:LxPDDPhkFaSoHoNq');

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

$tokn = $result['access_token'];

echo $tokn;




$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$tokn)); //setting custom header


$curl_post_data = array(
  //Fill in the request parameters with valid values
  'ShortCode' => '174379',
  'ResponseType' => 'Confirmed',
  'ConfirmationURL' => 'http://crm.wavuh.co.ke/mpesa_test/confirmation_url.php',
  'ValidationURL' => 'http://crm.wavuh.co.ke/mpesa_test/validation.php'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);


print_r($curl_response);

echo $curl_response;
?>