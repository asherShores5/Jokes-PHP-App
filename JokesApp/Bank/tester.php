<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

function killUpdate() {
exit("Update Transaction Failed");
}

$val = 1;

require_once "CheckAccountDataService.php";
require_once "SavingAccountDataService.php";

$checkbalance = getCBalance();
$savingbalance = getSBalance();

echo "Current Values:<br>";
echo "Checking Balance: " . $checkbalance . "<br>";
echo "Savings Balance: " . $savingbalance . "<br>";

echo "<br>Take $100 from Checking to Savings <br><br>";
$val = updateCBalance($checkbalance - 100);
//echo "Kill Value = $val <br>";
if ($val == 0) {
    killUpdate();
}
updateCBalance($checkbalance - 100);


$val = updateSBalance($checkbalance - 100);
if ($val == 0) {
    killUpdate();
}
updateSBalance($savingbalance + 100);


$checkbalance = getCBalance();
$savingbalance = getSBalance();

echo "Current Values<br>";
echo "New Checking Balance: " . $checkbalance . "<br>";
echo "New Savings Balance: " . $savingbalance . "<br>";


?>