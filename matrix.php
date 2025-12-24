<?php

$bufferColumnOutput = '';
$stack = $randomStack = $summaryStack = [];
$summaryStack[0] = $summaryStack[1] = [];
$getPostfix = function($key) { return $key !== 1 ? $key !== 2 ? $key !== 3 ? 'th' : 'rd' : 'nd' : 'st';};
for ($i=1;$i<=5;$i++) {
    $stack[$i] = [];
    $summaryStack[0][$i] = 0;
    for ($j=1;$j<=7;$j++) {
        do {
            $loop = 0b1;
            $nextRandom = rand(1,1000);
            if (!array_search($nextRandom, $randomStack)) {
                $randomStack[] = $nextRandom;
                $loop = 0;
            }
        } while ($loop);
        $summaryStack[0][$i] += $stack[$i][$j] = $nextRandom;
        $summaryStack[1][$j] = ($summaryStack[1][$j] ?? 0) + $stack[$i][$j];
        if ($i === 5) {
            $bufferColumnOutput .= sprintf('a summary of the %d%s column is - %d' , $j, $getPostfix($j), $summaryStack[1][$j]) . PHP_EOL;
        }
        echo " {$stack[$i][$j]} ";
    }
    echo " - a summary of $i{$getPostfix($i)} row is -> {$summaryStack[0][$i]}" . PHP_EOL;
}

echo $bufferColumnOutput;
