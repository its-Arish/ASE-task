
/* 1. Write a code, using listed PHP functions, with example
a. is_int()
b. is_numeric()
c. is_integer()
*/


<?php

function checkint($x) {
    if (is_int($x)) {
        print $x . " is an int \r\n";
    } else {
        print $x . " is not an int \r\n";
    }
}

checkint(46);
checkint(69.99);

function checknumeric($x) {
    if (is_numeric($x)) {
        print $x . " is numeric \r\n";
    } else {
        print $x . " is not numeric \r\n";
    }
}

checknumeric(42);
checknumeric(42.8);
checknumeric("821");

function checkinteger($x) {
    if (is_integer($x)) {
        print $x . " is an integer \r\n";
    } else {
        print $x . " is not an integer \r\n";
    }
}

checkinteger(10);
checkinteger(10.321);





?>