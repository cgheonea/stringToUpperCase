<?php
echo "<pre>";

//Interacting with the user to input the amount to withdraw
if(isset($_GET['i']) && !empty($_GET['i'])){
    $withdraw = $_GET['i'];
}else{
    //if no input, withdraw 200
    $withdraw = 200;
}

//user's debit amount
$debitAmount = 508;

//calculating the tax to apply for the withdraw by 0.5%, minimum 1 USD.
if ($withdraw > 200) {
    $tax = ($withdraw * 0.5) / 100;
} else {
    $tax = 1;
}

//Calculating the amount to withdraw + tax;
$finalWithdraw = $withdraw + $tax;

//Checking if the final amount is higher than the user's debit amount. If yes, withdraw, else let the user know.
if ($debitAmount > $finalWithdraw) {
$remainDebit = $debitAmount - $finalWithdraw;
echo "Debit available: {$debitAmount}$\nAmount to withdraw: {$withdraw}\nThis transaction will cost you {$tax}$\nYour remaining debit will be {$remainDebit}$\nOperation: Approved!";
} else {
    echo "Debit available: {$debitAmount}\nThis transaction would deduct {$finalWithdraw}$ from your account\nYou don't have enough debit to withdraw {$withdraw}$!\n";
}

echo "</pre>";
