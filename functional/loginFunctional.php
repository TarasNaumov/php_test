<?php 

require_once "functional/functions.php";

$errorLog = '';
if (isset($_POST['name'])) {
    $userData = readCvs("csv/users.csv");

    try {

        foreach ($userData as $user) {
            if (($_POST['name'] == $user[0] && password_verify($_POST['password'], $user[3]))) {
                $_SESSION['name'] = $user[0];
                $_SESSION['lastName'] = $user[1];
                $_SESSION['email'] = $user[2];
                $_SESSION['password'] = $user[3];
                $_SESSION['avatar'] = $user[4];
                setcookie("login", true, time() + 26298000);
                header("Location: profile.php");
            }
        }
        
        throw new Exception("<b>ім'я або пароль не співпадають з зареєстрованими даними</b>");
    } catch (Exception $e) {
        $errorLog = $e -> getMessage();
    }
}
