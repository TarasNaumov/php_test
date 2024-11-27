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
    
    // $file = 'csv/users.csv';

    // $usersData = [];
    // if (($stream = fopen($file, 'r')) != false) {
    //     while (($data = fgetcsv($stream)) != false) {
    //         $usersData[] = $data;
    //     }
    //     fclose($stream);
    // }

    $newScore = $_SESSION['score'];
    $newResponseRate = $_SESSION['response_rate'];
}
// echo "<pre>";
// var_dump($usersData);
// foreach ($usersData as &$user) {
//     if ($user[0] === $_SESSION['name']) {
//         $user[4] = $newScore;
//         $user[5] = $newResponseRate;
//         $user[6] = $_SESSION['date'];
//         break;
//     }
// }
// var_dump($usersData);
// die;

// if (($stream = fopen($file, 'w')) !== false) {
//     foreach ($usersData as $user) {
//         fputcsv($stream, $user);
//     }
//     fclose($stream);
// }

// $stream = fopen("csv/users.csv", "a");
// fputcsv($stream, [$_SESSION['name'], $_SESSION['email'], $_SESSION['password'], $_SESSION['avatar'], $_SESSION['score'], $_SESSION['response_rate'], $_SESSION['date']]);
// fclose($stream);

$stream = fopen("csv/" . $_SESSION['name'] . ".csv", "a");
fputcsv($stream, [$_SESSION['name'], $_SESSION['score'], $_SESSION['response_rate'], $_SESSION['date']]);
fclose($stream);
?>