<?php require "functional/regFunctional.php";?>
<link rel="stylesheet" href="style/reg_log_style.css">
<form action="registration.php" method="post">
    <h2>Registration form</h2>
    <p><input type="text" id="name" value="<?= $_POST['name'] ?? '' ?>" name="name"><label for="name">Ваше ім'я</label></p>
    <p><input type="text" id="lastName" value="<?= $_POST['lastName'] ?? '' ?>" name="lastName"><label for="lastName">Ваша фамілія</label></p>
    <p><input type="email" id="email" value="<?= $_POST['email'] ?? '' ?>" name="email"><label for="email">Електрона пошта</label></p>
    <p><input type="password" id="password" name="password"><label for="password"> Пароль</label></p>
    <p><?= $errorReg ?? '' ?></p>
    <a href="login.php">Log in</a>

    <input type="submit" value="Перевірити">
</form>