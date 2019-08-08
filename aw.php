<?php

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
echo "Please wait for the money! This transaction will cost you USD {$tax}. Your remaining debit will be USD {$remainDebit}.";
} else {
    echo "You don't have enough debit to withdraw USD {$withdraw}! Your current debit is USD {$debitAmount}.";
}