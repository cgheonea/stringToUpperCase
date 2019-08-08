<?php

if(isset($_GET['i']) && !empty($_GET['i'])){
    $stringToAnalyze = $_GET['i'];
}else{
    //Initialization of the string to be analyzed
    $stringToAnalyze = "Hello World! Your planet name is HW131";
}
echo '<pre>';
//Loading Ascii Table
$asciiCode = json_decode(file_get_contents('ascii.json'),TRUE);



//Printing the value of $stringToAnalyze
echo "String to analyze is: {$stringToAnalyze}\n";


//Splitting the string in characters as array
$chars = str_split($stringToAnalyze);

//setting up the integer which is going to help to iterate in the array as we search for characters to replace if lowercase
$i = 0;

//starting iterration
foreach ($chars as $char){

    //searching in array for the current character
    $asciiId = array_search($char,array_column($asciiCode,'Char'), TRUE);

    //checking if the char ascii id is lower case (in range of 96 - 122)
    if($asciiId >= 96 && $asciiId <= 122){

        //if yes, then we set the id coresponding to the uppercase ascii id
        $asciiNewId = $asciiId - 32;

        //Replacing the current character in $chars with an uppercase character
        $chars[$i] = $asciiCode[$asciiNewId]['Char'];
    }

    //adding 1 to iterator as we advance.
    $i++;
}

//regrouping the array and preparing to show it converted to uppercase
$convertedString = implode($chars);

//showing out to the user the converted string to upper case
print_r("String To UpperCase: {$convertedString}");

echo '</pre>';