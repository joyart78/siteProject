<?php
$sqlConnect = mysqli_connect("localhost","root",'',"poject");

if ($sqlConnect->connect_error) {
    die("Connection failed: " . $sqlConnect->connect_error);
}
mysqli_set_charset($sqlConnect, "utf8");

$sql = "SELECT * FROM `item`";
$arrSql = mysqli_query($sqlConnect, $sql);

$rows = mysqli_fetch_all($arrSql, MYSQLI_ASSOC);

$jsonData = json_encode($rows);

header('Content-Type: application/json');
echo $jsonData;




