<?php
session_start();

if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login']) {
        header('Location: profile.php');
    }
}
?>