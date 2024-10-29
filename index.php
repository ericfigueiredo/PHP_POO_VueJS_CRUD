<?php

$array = [10, 20, 30, 40];

$result = array_reduce($array, function($carry, $item) {

    return $carry + $item * 2;

}, 0);
echo $result;
?>