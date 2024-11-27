<?php 
if (!isset($_COOKIE["theme"])) {
    setcookie("theme", "dark", time() + 20000);
    header("Location: profile.php");
}
if ($_COOKIE['theme'] == "light") {
    setcookie("theme", "dark", time() + 20000);
    header("Location: profile.php");
} else {
    setcookie("theme", "light", time() + 20000);
    header("Location: profile.php");
}
?>