<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
   include "TypingDNAVerifyClien.php";
   include "verify/credentials.php";

   $typingDNAVerifyClient = new TypingDNAVerifyClient($client_id, $application_id, $secret);

   $typingDNADataAttributes = $typingDNAVerifyClient->getDataAttributes([
        "email" => "asher.shores5@gmail.com",
        "phoneNumber" => "",
        "language" => "EN",
        "flow" => "STANDARD"
   ]);
?>

<html>
   <script src="https://cdn.typingdna.com/verify/typingdna-verify.js"></script>
   <script>
       function callbackFn(payload)
       {
           window.location.href = "verify_otp.php?otp=".concat(payload["otp"]);
       }
   </script>
   <head>
   </head>
   <body>
       <h1> TypingDNA Verify </h1>
       <button
           class = "typingdna-verify"
           data-typingdna-client-id=<?php echo $typingDNADataAttributes["clientId"]?>
           data-typingdna-application-id=<?php echo $typingDNADataAttributes["applicationId"] ?> 
           data-typingdna-payload=<?php echo $typingDNADataAttributes["payload"]?> 
           data-typingdna-callback-fn= "callbackFn"
           >Verify with Typingdna
       </button>
   </body>
</html>