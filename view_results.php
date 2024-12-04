<?php
echo "<link rel='stylesheet' href='style/view_user.css'>";
require "functional/cheackTheme.php";
try {

    if (isset($_GET)) {
        $userName = $_GET['user'];
        $filePath = "csv/{$userName}.csv";
        if (file_exists($filePath)) {
            $stream = fopen($filePath, "r");
            $results = [];

            $userData = [];
            while (($row = fgetcsv($stream)) !== false) {
                $userData[] = $row;
                $results[] = $row[1];
            }
            $maxResult = max($results);

            echo "<div class='user_all_result'><h2>Результати користувача з ім'ям $userName</h2>";
            echo "<table>";
            
            foreach ($userData as $user) {
                if ($user[1] == $maxResult) {
                    echo "<tr class='maxResult'>";
                    echo "<td> Ім'я: ". $user[0] ."</td>";
                    echo "<td> Результат: ". $user[1] ." з 5</td>";
                    echo "<td> Результат в відсотках: ". $user[2] ."% з 100%</td>";
                    echo "<td> Дата: ". $user[3] ."</td>";
                    echo "</tr>";
                } else {
                    echo "<tr>";
                    echo "<td> Ім'я: ". $user[0] ."</td>";
                    echo "<td> Результат: ". $user[1] ." з 5</td>";
                    echo "<td> Результат в відсотках: ". $user[2] ."% з 100%</td>";
                    echo "<td> Дата: ". $user[3] ."</td>";
                    echo "</tr>";
                }
            }
            
            echo "</table><a href='profile.php'>Повернтись в профіль</a></div>";
            fclose($stream);
        } else {
            throw new Exception("Файл з результатами для користувача {$userName} не знайдено.");
        }
    } else {
        throw new Exception("Не передано ім'я користувача.");
    }
} catch (Exception $e) {
    echo "<div class='user_all_result'>";
    echo $e -> getMessage();
    echo "</div>";
}
?>