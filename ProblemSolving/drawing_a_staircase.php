<?php
// Draw a staircase of length N in php

function staircase($length) {
  for ($row = 1; $row <= $length; $row++) {
    for ($col = 1; $col <= $length - $row; $col++) {
      echo " ";
    }
    for ($col = 1; $col <= $row; $col++) {
      echo "#";
    }
    echo "\n";
  }
}

$n = 5;
staircase($n);
?>
