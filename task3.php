
/*
3. Write a code or function to display dates in provided format?
Example:
Input: 'Sep 20 2021' and '09092021'
Output: 2021-09-20 and 'Sep-09-2021'
*/




<?php
$date1 = 'Sep 20 2021';
$date2 = '09092021';
function dateConverter($string) {
    $arr = explode('and', $string);
    $date1 = $arr[0];
    $date2 = $arr[1];
    $date1 = date('Y-m-d', strtotime($date1));
    $date2 = date('M-d-Y', strtotime(preg_replace('/(.{2})/', '$1-',trim($date2) , 2)));
    print $date1. " and " .$date2;
}

dateConverter("Sep 20 2021 and 09092021");


  ?>