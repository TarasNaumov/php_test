<?php
    session_start();
    if ($_COOKIE['registration'] == '') {
        header("Location: registration.php");
    }

    if (isset($_POST['name'])) {
        if ($_POST['name'] == $_SESSION['name'] && $_POST['password'] == $_SESSION['password']) {
            setcookie("login", true, time() + 26298000);
            header("Location: index.php");
        } else {
            echo "<b>ім'я елекртрона пошта або пароль не зівпадають з зареєстрованими даними</b>";
        }
    }
?>

<form action="login.php" method="post">
    <p><input type="text" name="name"> Ваше ім'я</p>
    <p><input type="text" name="password"> Ваш пароль</p>
    <input type="submit" value="Ввійти">
</form>