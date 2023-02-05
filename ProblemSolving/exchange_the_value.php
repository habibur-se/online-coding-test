<?php
// Let assume a=5 and b=10
// Exchange the value of a and value of b without using third variable


$a = 5;
$b = 10;

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

echo "a = $a \nb = $b";
?>