<?php require "functional/profilSession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профіль</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <div class="login_data">
        <h2>Дані профілю</h2>
        <a href="avatar.php" class="avatar">
        <img src="img/<?= file_exists("img/" . ($_SESSION['avatar'] ?? 'profile.jpg')) ? $_SESSION['avatar'] : "profile.jpg" ?>">
            <b>avatar</b>
        </a>
        <table>
            <tr>
                <td>Name</td>
                <td><?php echo $_SESSION['name']; ?></td>
            </tr>
            <tr>
                <td>Last name</td>
                <td><?php echo $_SESSION['lastName']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $_SESSION['email']; ?></td>
            </tr>
        </table>
        <form action="leave_login.php" method="post">
            <input type="submit" value="Вийти з акаунта">
        </form>
    </div>
    <div class="last_test">
        <?php require "functional/lastTest.php"; ?>
        <a href="index.php" class="test">Пройти тест</a>
    </div>
</body>

</html>