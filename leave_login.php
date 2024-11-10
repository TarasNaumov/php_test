<?php 
if (isset($_POST)) {
    setcookie('login');
    header('Location: index.php');
}
?>