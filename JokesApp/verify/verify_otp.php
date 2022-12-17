<?php

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    include 'credentials.php';
    include 'TypingDNAVerifyClient.php';
    $typingDNAVerifyClient = new TypingDNAVerifyClient($client_id, $application_id, $secret);

    $response = $typingDNAVerifyClient->validateOTP([
        "email" => "asher.shores5@gmail.com",
        "phoneNumber" => "",
    ], $_GET['otp']);

    print_r($response);
?>