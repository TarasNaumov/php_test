<table>
    <?php $stream = fopen("csv/users.csv", "r"); ?>
    <?php $userData = []; ?>
    <?php while (($row = fgetcsv($stream)) !== false) { ?>
        <?php $userData[] = $row; ?>
    <?php } ?>
    <?php fclose($stream); ?>
    <?php foreach ($userData as $user) { ?>
        <?php if ($user[0] != "Admin") { ?>
            <tr>
                <td>Ім'я: <?= $user[0] ?></td>
                <td>Фамілія: <?= $user[1] ?></td>
                <td>Результат: <?= $user[4] ?? "непройшов" ?></td>
                <td>Результат в відсотках: <?= $user[5] ?? "непройшов" ?></td>
                <td>Дата: <?= $user[6] ?? "непройшов" ?></td>
                <td>
                    <form method="get" action="view_results.php">
                        <button type="submit" name="user" value="<?= $user[0] ?>">Переглянути всі результати</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>