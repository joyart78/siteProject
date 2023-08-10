<?php
$sqlConnect = mysqli_connect("localhost","root",'',"poject");

if ($sqlConnect->connect_error) {
    die("Connection failed: " . $sqlConnect->connect_error);
}
mysqli_set_charset($sqlConnect, "utf8");

$id = $_POST['id'];

$sql = $sqlConnect->prepare("DELETE FROM item WHERE id = ?");
$sql->bind_param("i", $id);
//$sql->execute();

if ($sql->execute() === TRUE) {
    echo "Элемент успешно удален.";
} else {
    echo "Ошибка при удалении элемента: " . $sqlConnect->error;
}
