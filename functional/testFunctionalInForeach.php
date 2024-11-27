<?php
$question = $quiz[$index];
$shuffledOptions = $question['options'];
$shuffledKeys = array_keys($shuffledOptions);
shuffle($shuffledKeys);

$shuffledOptionsOrdered = [];
foreach ($shuffledKeys as $key) {
    $shuffledOptionsOrdered[$key] = $shuffledOptions[$key];
}
?>