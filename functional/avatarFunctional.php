<?php
session_start();
echo "<pre>";
// var_dump($_FILES);
if (isset($_FILES) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    // echo $_SESSION['name'];
    // die;
    // $stream = fopen("../csv/users.csv", "a");
    $ext = explode("/", $_FILES['avatar']['type'])[1];
    // $_FILES['avatar']['name'] = "avatar.$ext";
    $fileName = $_SESSION['name'] . "." . $ext;
    // $destinationPath = '../img/' . $_FILES['avatar']['name'];
    $destinationPath = '../img/' . $fileName;
    $_SESSION['avatar'] = $fileName;

    $fileContent = $_FILES['avatar']['tmp_name'];
    // var_dump($fileContent);
    // die;

    if ($fileContent !== false) {
        // $isWritten = file_put_contents($destinationPath, $fileContent);
        $isWritten = move_uploaded_file($fileContent, $destinationPath);

        if ($isWritten) {
            $file = '../csv/users.csv';

            $usersData = [];
            if (($stream = fopen($file, 'r')) != false) {
                while (($data = fgetcsv($stream)) != false) {
                    $usersData[] = $data;
                }
                fclose($stream);
            }

            // echo "<pre>";
            // print_r($usersData);
            // echo "</pre>";

            $newAvatar = $_SESSION['avatar'];

            // var_dump($usersData);
            // $newUsersData = [];
            foreach ($usersData as $i => $user) {
                if ($user[0] == $_SESSION['name'] && $user[1] == $_SESSION['email']) {
                    $user[4] = $newAvatar;
                    $usersData[$i] = $user;
                    // break;
                }
            }

            // var_dump($usersData);
            // die;

            if (($stream = fopen($file, 'w+')) !== false) {
                foreach ($usersData as $user) {
                    // var_dump($user);
                    fputcsv($stream, $user);
                }
                fclose($stream);
            }
            // die;

            // echo $_SESSION['name'];

            // die;

            // echo "<pre>";
            // print_r($usersData);
            // echo "</pre>";
            // die;
            // fputcsv($stream, [$_SESSION['name'], $_SESSION['email'], $_SESSION['password'], $_SESSION['avatar']]);
            // fclose($stream);
            header("Location: ../login.php");
        }
    } else {
        header("Location: ../registration.php");
    }
} else {
    header("Location: ../login.php");
}
