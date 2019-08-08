<?php

echo '<pre>';

if(isset($_GET['i']) && !empty($_GET['i'])){
    $sDigits = $_GET['i'];
}else{
    $sDigits = '0184362648267154383812737';
}

echo "the numbers are: {$sDigits}\n";

$aDigits = str_split($sDigits);
$duplicateDigits = [];

foreach ($aDigits as $xDigit){
    foreach ($aDigits as $yDigit){
        if($xDigit == $yDigit && array_key_exists($xDigit, $duplicateDigits)){
            $duplicateDigits[$xDigit]++;
        }
        if($xDigit == $yDigit && !array_key_exists($xDigit, $duplicateDigits)){
            $duplicateDigits[$xDigit] = 1;
        }
    }
    if(array_key_exists($xDigit, $duplicateDigits)){
        foreach($aDigits as $key => $value){
            if($value == $xDigit){
                unset($aDigits[$key]);
            }
        }
    }
}


echo "We found the following duplicates and unique digits in the given string: \n";
foreach($duplicateDigits AS $key => $value){
    if($value === 1){
        $color = '#0000FF';
        $times = 'time';
    }else{
        $color = '#FF0000';
        $times = 'times';
    }
    echo "<span style=\"color:{$color};text-align:center;\">{$key}, {$value} {$times}</span>\n";
}
echo '</pre>';
