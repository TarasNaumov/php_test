<?php
session_start();
require_once "functions.php";

if (isset($_FILES) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

    $ext = explode("/", $_FILES['avatar']['type'])[1];
    $fileName = $_SESSION['name'] . "." . $ext;
    $destinationPath = '../img/' . $fileName;
    $_SESSION['avatar'] = $fileName;

    $fileContent = $_FILES['avatar']['tmp_name'];

    if ($fileContent !== false) {

        $isWritten = move_uploaded_file($fileContent, $destinationPath);

        if ($isWritten) {
            $file = '../csv/users.csv';

            $usersData = readCvs($file);

            $newAvatar = $_SESSION['avatar'];
            
            foreach ($usersData as $i => $user) {
                if ($user[0] == $_SESSION['name'] && $user[2] == $_SESSION['email']) {
                    $user[4] = $newAvatar;
                    $usersData[$i] = $user;
                }
            }
            
            if (($stream = fopen($file, 'w+')) !== false) {
                foreach ($usersData as $user) {
                    fputcsv($stream, $user);
                }
                fclose($stream);
            }
            
            header("Location: ../login.php");
        }
    } else {
        header("Location: ../registration.php");
    }
} else {
    header("Location: ../login.php");
}
echo "</pre>";
