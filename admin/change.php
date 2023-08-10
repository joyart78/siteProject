<!DOCTYPE html>
<html lang="en">
<head>

    <title>Изменение</title>
    <style>
        body{
            font-family: sans-serif;
            font-size: 17px;
        }
        .hid{
            display: none;
        }
        a{
            font-size: 23px;
            border: 1px solid;
            background-color: black;
            color: white;
            padding: 5px 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<?
$sqlConnect = mysqli_connect("localhost","root",'',"poject");

if ($sqlConnect->connect_error) {
    die("Connection failed: " . $sqlConnect->connect_error);
}
mysqli_set_charset($sqlConnect, "utf8");

$id = $_GET['id'];


$stmt = $sqlConnect->prepare("SELECT name, price, about FROM item WHERE id = ?");
$stmt->bind_param("i", $id);

// Выполнение SQL-запроса
$stmt->execute();

// Получение результата запроса
$result = $stmt->get_result();
$product = mysqli_fetch_array($result);
?>
<script src="../jquery-3.7.0.min.js"></script>
<script src="update.js"></script>
<script src="del.js"></script>

<a href="maneAdmin.php">Назад</a>

<form id="updateDataForm" method="POST">

    <input class="hid" type="text" name="id" value="<?echo $id?>">

    <label for="name">название продукта:</label>
    <input id="name"   type="text" name="name" value="<?echo $product['name']?>">
    <br>
    <label for="price">цена:</label>
    <input id="price" type="text" name="price" value="<?echo $product['price']?>">
    <p>описание:</p>
    <textarea name="about" cols="40" rows="10"><?echo $product['about']?></textarea>
    <br>
    <input type="submit" value="Изменить">

</form>

<form id="delDataForm" method="POST">
    <input type="submit" value="удалить товар">
    <input class="hid" type="text" name="id" value="<?echo $id?>">
</form>



</body>

<?php
