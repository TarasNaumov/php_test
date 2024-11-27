<?php
echo "<link rel='stylesheet' href='view_user.css'>";
if (isset($_GET)) {
    $userName = $_GET['user'];
    $filePath = "csv/{$userName}.csv";
    if (file_exists($filePath)) {
        $stream = fopen($filePath, "r");
        echo "<div class='user_all_result'><h2>Результати користувача з ім'ям $userName</h2>";
        echo "<table>";
        while (($row = fgetcsv($stream)) !== false) {
            echo "<tr>";
            echo "<td> Ім'я: ". $row[0] ."</td>";
            echo "<td> Результат: ". $row[1] ." з 5</td>";
            echo "<td> Результат в відсотках: ". $row[2] ."% з 100%</td>";
            echo "<td> Дата: ". $row[3] ."</td>";
            echo "</tr>";
        }
        echo "</table><a href='profile.php'>Повернтись в профіль</a></div>";
        fclose($stream);
    } else {
        echo "Файл з результатами для користувача {$userName} не знайдено.";
    }
} else {
    echo "Не передано ім'я користувача.";
}
?>