<?php

require_once "functions.php";
// $stream = fopen("csv/" . $_SESSION['name'] . ".csv", "r");
// $userResults = [];
$userResults = readCvs("csv/". $_SESSION['name'] .".csv", "r");
// while (($row = fgetcsv($stream)) !== false) {
//     $userResults[] = $row;
// }
// fclose($stream);
$results = [];
foreach ($userResults as $result) {
    $results[] = $result[1];
}
$maxResult = max($results);
?>