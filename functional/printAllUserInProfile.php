<table>
    <thead>
        <tr>
            <th>Аватарка</th>
            <th>Ім'я</th>
            <th>Прізвище</th>
            <th>Email</th>
            <th>Результати</th>
        </tr>
    </thead>
    <?php $stream = fopen("csv/users.csv", "r"); ?>
    <?php $userData = []; ?>
    <?php while (($row = fgetcsv($stream)) !== false) { ?>
        <?php $userData[] = $row; ?>
    <?php } ?>
    <?php fclose($stream); ?>
    <?php foreach ($userData as $user) { ?>
        <?php if ($user[0] != "Admin") { ?>
            <tr>
                <td><img src='img/<?= $user[4] ?? "profile.jpg"?>'> </td>
                <td><?= $user[0] ?></td>
                <td><?= $user[1] ?></td>
                <td><?= $user[2] ?></td>
                <td>
                    <form method="get" action="view_results.php">
                        <button type="submit" name="user" value="<?= $user[0] ?>">Переглянути</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>