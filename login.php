<?php require "functional/loginSession.php";?>

<link rel="stylesheet" href="style/reg_log_style.css">
<form action="login.php" method="post">
    <h2>Log-in form</h2>
    <p><input type="text" value="<?= $_POST['name'] ?? '' ?>" name="name"><label>Ваше ім'я</label></p>
    <p><input type="password" name="password"><label>Ваш пароль</label></p>

    <?php require "functional/loginFunctional.php";?>
    <a href="registration.php">Registration</a>

    <input type="submit" value="Ввійти">
</form>