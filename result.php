<link rel="stylesheet" href="style/profile.css">
<?php require "functional/cheackTheme.php"; ?>
<?php require "functional/resultFunctional.php"; ?>

<div class="result">
    <p>Ваш результат: <?= $_SESSION['score'] ?> з <?= $maxBal ?></p>
    <br>
    <p>Відсоток правильних відповідей: <?= $_SESSION['score'] / $max_score * 100 ?> % з 100</p>
    <br>
    <p>Дата: <?= $_SESSION['date'] ?></p>
    <br>
    <a href="profile.php">Повернутись до профілю</a>
</div>