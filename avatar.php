<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/reg_log_style.css">
    <title>Add avatar</title>
</head>
<body>
    <form action="functional/avatarFunctional.php" method="post" enctype="multipart/form-data">
        <h2>Виберіть файл з своїм аватаром</h2>
        <input type="file" name="avatar">
        <a href="registration.php">registration</a>
        <input type="submit" value="Добавити аватарку">
    </form>
</body>
</html>