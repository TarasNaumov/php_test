<?php if (!isset($_SESSION['name'])) { ?>
    <?php setcookie('login'); ?>
    <?php header('Location: index.php'); ?>
<?php } ?>
<a href="profile.php" class="profile">
    <img src="img/<?= (file_exists("img/" . ($_SESSION['avatar'])) && isset($_SESSION['avatar'])) ? $_SESSION['avatar'] : "profile.jpg" ?>">
</a>
<?php if ($_COOKIE['login'] == '') {
    header("Location: login.php");
} ?>
<?php $_SESSION['startTime'] = time(); ?>