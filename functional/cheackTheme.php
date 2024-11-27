<?php
if (isset($_COOKIE['theme'])) {
    if ($_COOKIE['theme'] == "light") {
        echo '<link rel="stylesheet" href="style/profile.css">';
    } else {
        echo '<link rel="stylesheet" href="style/theme.css">';
    }
} else {
    echo '<link rel="stylesheet" href="style/theme.css">';
}
?>