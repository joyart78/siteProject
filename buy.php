<?php
$sqlConnect = mysqli_connect("localhost","root",'',"poject");

if ($sqlConnect->connect_error) {
    die("Connection failed: " . $sqlConnect->connect_error);
}
mysqli_set_charset($sqlConnect, "utf8");
$product_id = $_POST['product_id'];
session_start();
$login = $_SESSION['login'];


// Добавление товара в новую базу данных
$stmt = $sqlConnect->prepare("INSERT INTO shopigbag (login, name) VALUES (?, ?)");
$stmt->bind_param("si", $login,$product_id);
$stmt->execute();

// Проверка успешности добавления товара
if ($stmt->affected_rows > 0) {
    echo "Товар успешно добавлен.";
} else {
    echo "Войдите в аккаунт.";
}

$stmt->close();
$sqlConnect->close();