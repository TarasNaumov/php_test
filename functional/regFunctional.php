 
 <?php
    require_once "functional/functions.php";
    $errorReg = '';
    if (isset($_POST['name'])) {

        $_SESSION['name'] = $_POST['name'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);

        try {

            if ($_POST['name'] != null && $_POST['lastName'] != null && $_POST['email'] != null && $_POST['password'] != null) {

                if (strlen($_POST['password']) >= 5 && strlen($_POST['password']) < 25) {

                        // if (($stream = fopen("csv/users.csv", 'w+')) != false) {
                            $usersData = readCvs("csv/users.csv", "w+");

                        //     $usersData = [];
                        //     while (($data = fgetcsv($stream)) != false) {
                        //         $usersData[] = $data[0];
                        //     }
                        //     fclose($stream);
                        // }

                    if (!in_array($_POST['name'], $usersData)) {

                        // $stream = fopen("csv/users.csv", "a");
                        // fputcsv($stream, [$_POST['name'], $_POST['lastName'], $_POST["email"], $_SESSION['password']]);
                        writeCvs("csv/users.csv", [$_POST['name'], $_POST['lastName'], $_POST["email"], $_SESSION['password']]);
                        // fclose($stream);
                        header("Location: login.php");
                    } else {
                        throw new Exception("<b>Таке ім'я вже зайняте</b>");
                    }
                } else {
                    throw new Exception("<b>Пароль повинен мати літери та букви кількістю від 5 до 25 символів</b>");
                }
            } else {
                throw new Exception("<b>Ви повині вказати дані в всі текстові поля</b>");
            }
        } catch (Exception $e) {
            $errorReg = $e->getMessage();
            // echo $e->getMessage();
        }
    }

    ?>