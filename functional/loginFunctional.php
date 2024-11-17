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
    if ($_POST['name'] == $_SESSION['name'] && password_verify($_POST['password'], $_SESSION['password'])) {
        setcookie("login", true, time() + 26298000);
        header("Location: profile.php");
    } else {
        echo "<b>ім'я або пароль не співпадають з зареєстрованими даними</b>";
    } 

} ?>