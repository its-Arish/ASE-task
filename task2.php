/*
2. Create a function in PHP to floor decimal numbers with any provided precision.
Example: convert(2.99999,2), convert(199.99999,4)
*/


<?php
function convert($number, $precision) {
    $number_break=explode(".", $number);
    $number_break[1]=substr_replace($number_break[1],".",$precision,0);

    $number_break[1]=floor($number_break[1]);

    $floor_number= array($number_break[0],$number_break[1]);
    return implode(".",$floor_number);
}
print convert(2.99999,2)."\r\n";
print convert(199.99999,4)."\r\n";
?>