<?php

$sqlConnect = mysqli_connect("localhost", "root", '', "poject");

if ($sqlConnect->connect_error) {
    die("Connection failed: " . $sqlConnect->connect_error);
}
mysqli_set_charset($sqlConnect, "utf8");

$name = $_POST['name'];
$about = $_POST['about'];
$price = $_POST['price'];

$sql = $sqlConnect->prepare("INSERT INTO item (name, price, about) VALUES (?, ?, ?)");
$sql->bind_param("sis", $name, $price, $about);
//$sql->execute();

if ($sql->execute() === TRUE) {
    echo "Элемент успешно удален.";
} else {
    echo "Ошибка при удалении элемента: " . $sqlConnect->error;
}
