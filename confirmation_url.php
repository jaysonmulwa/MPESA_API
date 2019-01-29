<?php


header ("Content-Type:application/json");

$response='{
		"ResultCode"=0,

		"ResultDesc"="Confirmation Received Succesfully",



}';

//0-accepted

//DATA
$mpesaResponse=file_get_contents('php://input');

//LOG

$logFile="mpesaResponse.txt";

$jsonMpesaResponse=json_decode($mpesaResponse,true);

//write to log file

$log=fopen($logFile,"a");

fwrite($log, $mpesaResponse);

fclose($log);


echo $response;

?>