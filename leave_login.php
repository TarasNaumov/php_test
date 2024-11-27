<?php 
if (isset($_POST)) {
    setcookie('login');
    setcookie('theme');
    header('Location: index.php');
}
?>