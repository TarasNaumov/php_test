<?php

session_start();
require 'questions.php';


$_SESSION['score'] = 0;
$max_score = 5;
$maxBal = 5;

if (isset($_POST['answers'])) {
    foreach ($_POST['answers'] as $index => $answer) {
        $questionIndex = str_replace('question_', '', $index);

        if ($quiz[$questionIndex]['correct_answer'] == $answer) {
            $_SESSION['score']++;
        }
    }
    
    $_SESSION['response_rate'] = ($_SESSION['score'] / $max_score) * 100;

    $newScore = $_SESSION['score'];
    $newResponseRate = $_SESSION['response_rate'];
}

$stream = fopen("csv/" . $_SESSION['name'] . ".csv", "a");
fputcsv($stream, [$_SESSION['name'], $_SESSION['score'], $_SESSION['response_rate'], $_SESSION['date']]);
fclose($stream);
?>