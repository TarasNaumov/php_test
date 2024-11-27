<?php require "functional/profilSession.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профіль</title>
    <link rel="stylesheet" href="style/profile.css">
    <?php require "functional/cheackTheme.php"; ?>
</head>

<body>
    <form action="theme.php" method="POST" class="theme">
        <button type="submit">
            <?php if (isset($_COOKIE['theme']) && $_COOKIE['theme'] == "dark") {
                echo '<img src="img/darkTheme.png">';
            } else {
                echo '<img src="img/lightTheme.png">';
            } ?>
        </button>
    </form>
    <div class="flex">
        <div class="login_data">
            <h2>Дані профілю</h2>
            <a href="avatar.php" class="avatar">
                <img src="img/<?= (file_exists("img/" . ($_SESSION['avatar'])) && isset($_SESSION['avatar'])) ? $_SESSION['avatar'] : "profile.jpg" ?>">
                <b>avatar</b>
            </a>
            <table>
                <tr>
                    <td>Name</td>
                    <td><?= $_SESSION['name']; ?></td>
                </tr>
                <tr>
                    <td>Last name</td>
                    <td><?= $_SESSION['lastName']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $_SESSION['email']; ?></td>
                </tr>
            </table>
            <form action="leave_login.php" method="post">
                <input type="submit" value="Вийти з акаунта">
            </form>
        </div>
        <?php if ($_SESSION['name'] == "Admin") { ?>
            <div class="all_user">
                <?php require "functional/printAllUserInProfile.php"; ?>
            </div>
        <?php } else { ?>
            <?php if (file_exists("csv/" . $_SESSION['name'] . ".csv")) { ?>
                <div class="all_result">
                    <h2>Всі рeзультати користувача</h2>
                    <div class="table">
                        <table>
                            <?php require "functional/profile.php"; ?>
                            <?php foreach ($userResults as $result) { ?>
                                <tr <?php if ($result[1] == $maxResult) {
                                        echo "class='maxResult'";
                                    } ?>>
                                    <td>Ризультат: <?= $result[1] ?> з 5</td>
                                    <td>Ризультат в відсотках: <?= $result[2] ?>%</td>
                                    <td>Дата: <?= $result[3] ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <?php if ($_SESSION['name'] != "Admin") { ?>
        <div class="last_test">
            <?php require "functional/lastTest.php"; ?>
            <a href="index.php" class="test goToTest">Пройти тест</a>
        </div>
    <?php } ?>
</body>

</html>