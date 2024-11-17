<?php
session_start();
if ($_COOKIE['login'] == '') {
    header("Location: login.php");
}
if (!isset($_SESSION['name'])) {
    setcookie('registration');
    setcookie('login');
    header('Location: index.php');
}
?>