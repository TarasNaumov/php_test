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
    <link rel="stylesheet" href="style/style.css">
    <?php require "functional/cheackTheme.php"; ?>
</head>

<body>
    <form action="result.php" method="post">
        <div class="wrapper">
            <?php require "functional/testCookie.php"; ?>
            <?php foreach ($randomQuestions as $index) { ?>
                <?php require "functional/testFunctionalInForeach.php"; ?>
                <div>
                    <div class="questions">
                        <p><?= $question['question']; ?></p>
                    </div>
                    <div class="answers">
                        <?php foreach ($shuffledOptionsOrdered as $key => $option) { ?>
                            <label>
                                <input type="radio" name="answers[question_<?= $index; ?>]" value="<?= $key; ?>"> <?= $option; ?>
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