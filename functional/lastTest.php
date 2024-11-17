<?php if (!isset($_SESSION['score']) || !isset($_SESSION['response_rate']) || !isset($_SESSION['date'])) {
    echo "Ви повині пройти тест щоб отримати остані дані.";
} else { ?>
    <h2>Дані про останє проходження</h2>
    <table>
        <tr>
            <td><?php echo "Ваш результат: " . $_SESSION['score'] . " з 5"; ?></td>
        </tr>
        <tr>
            <td><?php echo "Відсоток правильних відповідей: " . $_SESSION['response_rate'] . "% з 100%" ?></td>
        </tr>
        <tr>
            <td><?php echo "Дата: " . $_SESSION['date'] ?></td>
        </tr>
    </table>
<?php } ?>