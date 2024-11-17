<?php
session_start();
echo "<pre>";
var_dump($_FILES);
if (isset($_FILES) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $ext = explode("/", $_FILES['avatar']['type'])[1];
    // $_FILES['avatar']['name'] = "avatar.$ext";
    $fileName = $_SESSION['name']. "." .$ext;
    // $destinationPath = '../img/' . $_FILES['avatar']['name'];
    $destinationPath = '../img/' . $fileName;
    $_SESSION['avatar'] = $fileName;

    $fileContent = file_get_contents($_FILES['avatar']['tmp_name']);
    
    if ($fileContent !== false) {
        // $isWritten = file_put_contents($destinationPath, $fileContent);
        $isWritten = move_uploaded_file($_FILES['avatar']['tmp_name'], $destinationPath);
        
        if ($isWritten != false) {
            header("Location: ../login.php");
        }
    } else {
        header("Location: ../registration.php");
    }
}
?>