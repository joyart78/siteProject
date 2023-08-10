
<?php
// Подключение к базе данных
$sqlConnect = mysqli_connect("localhost","root",'',"poject");

if ($sqlConnect->connect_error) {
    die("Connection failed: " . $sqlConnect->connect_error);

}
mysqli_set_charset($sqlConnect, "utf8");

session_start();
$login = $_SESSION['login'];

// Получение товаров из базы данных
$sql = $sqlConnect->prepare("SELECT name FROM shopigbag WHERE login = ?");
$sql->bind_param("s", $login);
$sql->execute();

// Получение результата запроса
$result = $sql->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .back {
            font-size: 23px;
            border: 1px solid;
            background-color: black;
            color: white;
            padding: 2px 5px;
            text-decoration: none;
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #e9e9e9;
        }

        .total {
            margin-top: 20px;
            font-weight: bold;
        }

        .clear-button {
            margin-top: 20px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .clear-button:hover {
            background-color: #c0392b;
        }
        .clear-buttonSMAL{

            background-color: black;
            color: #fff;
            border: none;
            padding: 3px 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .hide{
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
<a href="maneUsers.php" class="back">назад</a>

<h2>Корзина</h2>

<table>
    <tr>
        <th>Название товара</th>
        <th>Цена</th>
        <th></th>
    </tr>
    <?php
    $num = 0;
    $sum = 0;
    // Вывод товаров
    if ($result->num_rows > 0) {

        foreach ($result as $key){
            $smaf = $sqlConnect->prepare("SELECT name, price, id FROM item WHERE id = ?");
            $smaf->bind_param("i", $key['name']);
            $smaf->execute();
            $rez = $smaf->get_result();

            $product = mysqli_fetch_array($rez);
            ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td>
                    <form method="POST">
                        <input type="text" value="<?php echo $product['id'];?>" class="hide" name="id">
                        <input name="del" type="submit" value="убрать" class="clear-buttonSMAL">
                    </form>
                </td>
            </tr>
            <?php
            $num++;
            $sum += $product['price'];
        }
    } else {
        echo "<tr><td colspan='2'>Корзина пуста</td></tr>";
    }
    ?>
</table>
<?echo "<p class='total'>количество = $num  общая сумма = $sum</p>";?>

<form method="POST">
    <input type="submit" value="очистить корзину" name="clear" class="clear-button">
</form>
</div>

</body>
</html>

<?php
if (isset($_POST['clear'])) {
    session_start();
    $clr = $sqlConnect->prepare("DELETE FROM shopigbag WHERE login = ?");
    $clr->bind_param("s", $login);
    $clr->execute();
    header("Refresh: 0");
};

?>
<?php
if (isset($_POST['del'])) {
    session_start();
    $id = $_POST['id'];
    $clr = $sqlConnect->prepare("DELETE FROM shopigbag WHERE name = ? LIMIT 1");
    $clr->bind_param("s", $id);
    $clr->execute();
    header("Refresh: 0");
};
$sqlConnect->close();
?>
