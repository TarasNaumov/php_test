<?php if (isset($_POST['name'])) { ?>
    <?php $stream = fopen("csv/users.csv", "a");?>
    <?php $_SESSION['name'] = $_POST['name']; ?>
    <?php $_SESSION['lastName'] = $_POST['lastName']; ?>
    <?php $_SESSION['email'] = $_POST['email']; ?>
    <?php $_SESSION['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]); ?>

    <?php if ($_POST['name'] != null && $_POST['lastName'] != null && $_POST['email'] != null && $_POST['password'] != null) { ?>
        <?php if (strlen($_POST['password']) >= 5 && strlen($_POST['password']) < 25) { ?>
            <?php fputcsv($stream, [$_POST['name'], $_POST["email"], $_SESSION['password']]); ?>
            <?php fclose($stream); ?>
            <?php setcookie("registration", true, time() + 26298000); ?>
            <?php header("Location: avatar.php"); ?>
        <?php } else { ?>
            <b>Пароль повинен мати літери та букви кількістю від 5 до 25 символів</b>
        <?php } ?>
    <?php } else { ?>
        <b>Ви повині вказати дані в всі текстові поля</b>
    <?php } ?>
<?php } ?>