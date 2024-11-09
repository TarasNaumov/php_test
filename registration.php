<?php 
    session_start();

    if (isset($_POST['name'])) {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];

        if ($_POST['name'] != null && $_POST['lastName'] != null && $_POST['email'] != null && $_POST['password'] != null) {
            if (strlen($_POST['password']) > 5 && strlen($_POST['password']) < 25) {
                setcookie("registration", true, time() + 26298000);
                header("Location: login.php");
            } else {
                echo "Пароль повинен мати літери та букви кількістю від 5 до 25 символів";
            }
        } else {
            echo "<b>Ви повині вказати дані в всі текстові поля</b>";
        }
    }

?>
<form action="registration.php" method="post">
    <h2>Registration form</h2>
    <p><label><input type="text" name="name"> Ваше ім'я</label></p>
    <p><label><input type="text" name="lastName"> Ваша фамілія</label></p>
    <p><label><input type="text" name="email"> Електрона пошта</label></p>
    <p><label><input type="text" name="password"> Пароль</label></p>
    <input type="submit" value="Перевірити">
</form>