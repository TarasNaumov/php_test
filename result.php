<?php

session_start();
require 'questions.php';

$_SESSION['passingTime'] = time() - $_SESSION['startTime'];


$score = 0;
$max_score = 5;
$maxBal = 5;

foreach ($_POST as $index => $answer) {
    $questionIndex = str_replace('question_', '', $index);

    if ($quiz[$questionIndex]['correct_answer'] == $answer) {
        $score++;
    }
}

echo "Ваш результат: ". $score  . " з $maxBal";
echo "<br>";
echo "Відсоток правильних відповідей: ". ($score / $max_score) * 100 . "% з 100";
echo "<br>";
echo "Час проходження: " . $_SESSION['passingTime'] . "секунд";
echo "<br>";
echo "Дата: " . $_SESSION['date'];
?>