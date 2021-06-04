<?php
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_2ac4574a1de363f3cf168ff5454",
                  "X-Auth-Token:test_223a5d327b86f8f324f264c3a70"));
$payload = Array(
    'purpose' => 'Buy Domain Name',
    'amount' => '10',
    'phone' => '9999999999',
    'buyer_name' => 'John Doe',
    'redirect_url' => 'http://localhost/instamojo_payment/redirect.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'hellytour@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$response= json_decode($response);

$_SESSION['tid']=$response->payment_request->id;
header('location:'.$response->payment_request->longurl);
die();
?>