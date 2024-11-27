<?php if (isset($_POST['name'])) {
    $stream = fopen("csv/users.csv", "r");

    $userData = [];
    while (($row = fgetcsv($stream)) !== false) {
        $userData[] = $row;
    }
    fclose($stream);
    // echo "<pre>";
    // var_dump($userData);
    // die;
    foreach ($userData as $user) {
        // if ($_POST['name'] == $_SESSION['name'] && password_verify($_POST['password'], $_SESSION['password'])) {
        if (($_POST['name'] == $user[0] && password_verify($_POST['password'], $user[3]))) {
            $_SESSION['name'] = $user[0];
            $_SESSION['lastName'] = $user[1];
            $_SESSION['email'] = $user[2];
            $_SESSION['password'] = $user[3];
            $_SESSION['avatar'] = $user[4];
            setcookie("login", true, time() + 26298000);
            header("Location: profile.php");
        }
    }

    echo "<b>ім'я або пароль не співпадають з зареєстрованими даними</b>";
}
