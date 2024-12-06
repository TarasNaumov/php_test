<?php
require_once "functional/functions.php";

$file = 'csv/' . $_SESSION['name'] . '.csv';

$usersData = [];
if (file_exists("csv/" . $_SESSION['name'] . ".csv")) {

    if (($stream = fopen($file, 'r')) !== false) {
        $usersData = readCvs($file, "r");
    //     while (($data = fgetcsv($stream)) !== false) {
    //         $usersData[] = $data;
    //     }
    // fclose($stream);
    }
}

$lastUserData = null;
foreach ($usersData as $user) {
    if ($user[0] === $_SESSION['name']) {
        $lastUserData = $user;
    }
}

if ($lastUserData) {
    $_SESSION['score'] = $lastUserData[1];
    $_SESSION['response_rate'] = $lastUserData[2];
    $_SESSION['date'] = $lastUserData[3];
} else {
    $_SESSION['score'] = "немає даних";
    $_SESSION['response_rate'] = "немає даних";
    $_SESSION['date'] = "немає даних";
}

if ($_SESSION['score'] === "немає даних" && $_SESSION['response_rate'] === "немає даних" && $_SESSION['date'] === "немає даних") {
    echo "Ви повинні пройти тест, щоб отримати останні дані.";
} else { 
    ?>
    <h2>Дані про останнє проходження</h2>
    <table>
        <tr>
            <td><?php echo "Ваш результат: " . $_SESSION['score']; if ($_SESSION['score'] != "немає даних") {echo " з 5";} ?></td>
        </tr>
        <tr>
            <td><?php echo "Відсоток правильних відповідей: " . $_SESSION['response_rate']; if ($_SESSION['response_rate'] != "немає даних") {echo "% з 100%";} ?></td>
        </tr>
        <tr>
            <td><?php echo "Дата: " . $_SESSION['date'] ?></td>
        </tr>
    </table>
    <?php 
}
?>
