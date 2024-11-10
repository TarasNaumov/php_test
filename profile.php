<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if ($_COOKIE['login'] == '') {
            header("Location: login.php");
        }
        if (!isset($_SESSION['name'])) {
            setcookie('registration');
            setcookie('login');
            header('Location: index.php');
        }
    ?>
    <title>Профіль</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <div class="login_data">
        <h2>Дані профілю</h2>
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
        <?php if (!isset($_SESSION['score']) || !isset($_SESSION['response_rate']) || !isset($_SESSION['date'])) {
            echo "Ви повині пройти тест щоб отримати остані дані.";
        } else { ?>
            <h2>Дані про останє проходження</h2>
            <table>
                <tr>
                    <td><?php echo "Ваш результат: " . $_SESSION['score'] . " з 5"; ?></td>
                </tr>
                <tr>
                    <td><?php echo "Відсоток правильних відповідей: " . $_SESSION['response_rate'] . "% з 100%" ?></td>
                </tr>
                <tr>
                    <td><?php echo "Дата: " . $_SESSION['date'] ?></td>
                </tr>
            </table>
        <?php } ?>
        <a href="index.php">Повернутись до тесту</a>
    </div>
</body>

</html>