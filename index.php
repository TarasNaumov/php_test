<?php session_start(); ?>
<?php require 'questions.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="result.php" method="post">
        <div class="wrapper">
            <?php if (!isset($_SESSION['name'])) {?>
                <?php setcookie('registration'); ?>
                <?php setcookie('login'); ?>
                <?php header('Location: index.php'); ?>
            <?php } ?>
            <a href="profile.php" class="profile"><img src="img/profile.jpg"></a>
            <?php if ($_COOKIE['registration'] == '') {
                header("Location: registration.php");
            } ?>
            <?php if ($_COOKIE['login'] == '') {
                header("Location: login.php");
            } ?>
            <?php $_SESSION['startTime'] = time(); ?>
            <?php foreach ($randomQuestions as $index) {
                $question = $quiz[$index] ?>
                <div>
                    <div class="questions">
                        <p><?= $question['question']; ?></p>
                    </div>
                    <div class="answers">
                        <?php foreach ($question['options'] as $key => $option) { ?>
                            <label><input type="radio" name="question_<?= $index; ?>" value="<?= $key; ?>"> <?= $option; ?>
                            </label>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <button type="submit">Дізнатись результати</button>
        </div>
    </form>
</body>

</html>