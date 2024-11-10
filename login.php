<?php
session_start();

if (!isset($_SESSION['name'])) {
    setcookie('registration');
    setcookie('login');
    header('Location: registration.php');
}

if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login']) {
        header('Location: index.php');
    }
}

if ($_COOKIE['registration'] == '') {
    header("Location: registration.php");
}
?>

<link rel="stylesheet" href="reg_log_style.css">
<form action="login.php" method="post">
    <h2>Log-in form</h2>
    <p><input type="text" name="name"> Ваше ім'я</p>
    <p><input type="text" name="password"> Ваш пароль</p>

    <?php
    if (isset($_POST['name'])) {
        if ($_POST['name'] == $_SESSION['name'] && $_POST['password'] == $_SESSION['password']) {
            setcookie("login", true, time() + 26298000);
            header("Location: index.php");
        } else {
            echo "<b>ім'я елекртрона пошта або пароль не зівпадають з зареєстрованими даними</b>";
        }
    }
    ?>

    <input type="submit" value="Ввійти">
</form>