<link rel="stylesheet" href="profile.css">
<?php

session_start();
require 'questions.php';


$_SESSION['score'] = 0;
$max_score = 5;
$maxBal = 5;

foreach ($_POST as $index => $answer) {
    $questionIndex = str_replace('question_', '', $index);
    
    if ($quiz[$questionIndex]['correct_answer'] == $answer) {
        $_SESSION['score']++;
    }
}


$_SESSION['response_rate'] = ($_SESSION['score'] / $max_score) * 100;

echo '<div class="result">';
echo "Ваш результат: ". $_SESSION['score']  . " з $maxBal";
echo "<br>";
echo "Відсоток правильних відповідей: ". ($_SESSION['score'] / $max_score) * 100 . "% з 100";
echo "<br>";
echo "Дата: " . $_SESSION['date'];
echo "<br>";
echo '<a href="index.php">Повернутись до тесту</a>';
echo '</div>';
?>