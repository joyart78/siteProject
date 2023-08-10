<?php
$sqlConnect = mysqli_connect("localhost","root",'',"poject");

if ($sqlConnect->connect_error) {
    die("Connection failed: " . $sqlConnect->connect_error);
}
mysqli_set_charset($sqlConnect, "utf8");

$id = $_POST['id'];
$name = $_POST['name'];
$about = $_POST['about'];
$price = $_POST['price'];

$sql = $sqlConnect->prepare("UPDATE item SET name = ?,  price = ?, about = ? WHERE id = ?");
$sql->bind_param("sisi", $name, $price, $about, $id);
//$sql->execute();

if ($sql->execute() === TRUE) {
    echo "Элемент успешно обновлен.";
} else {
    echo "Ошибка при обновлении элемента: " . $sqlConnect->error;
}
