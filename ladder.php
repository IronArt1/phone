<?php

$length = 100;
$counter = 1;
$buffer = [];
for ($i=1;$i<=$length;$i++) {
     $buffer[] = $i;
     // use the following IF statement must be used, if there is a need to see digits from 92 to 100 that are NOT
     // suitable for a proper "ladder" requirement...
     // if (count($buffer) % $counter === 0 || $length === $i) {
     if (count($buffer) % $counter === 0) {
         echo implode(',', $buffer) . PHP_EOL;
         $buffer = [];
         ++$counter;
     }
}
