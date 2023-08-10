<?php
// Подключение к базе данных
$sqlConnect = mysqli_connect("localhost","root",'',"poject");

if ($sqlConnect->connect_error) {
    die("Connection failed: " . $sqlConnect->connect_error);
}
mysqli_set_charset($sqlConnect, "utf8");

// Получение идентификатора товара из параметра URL
$product_id = $_GET['id'];

// Подготовка SQL-запроса для получения информации о товаре
$stmt = $sqlConnect->prepare("SELECT * FROM item WHERE id = ?");
$stmt->bind_param("i", $product_id);

// Выполнение SQL-запроса
$stmt->execute();

// Получение результата запроса
$result = $stmt->get_result();

// Проверка наличия товара
if ($result->num_rows > 0) {
    // Информация о товаре найдена, извлекаем данные
    $row = $result->fetch_assoc();
    $product_name = $row['name'];
    $product_description = $row['about'];
    $product_price = $row['price'];
//    $product_image = $row['image'];

    echo "<script src='jquery-3.7.0.min.js'></script>";
    echo "<script src='buy.js'></script>";
    echo "<link rel='stylesheet' href='item.css'>";
    // Выводим информацию о товаре
    session_start();
    echo "<div class='container'>";
if ($_SESSION['login'] != null) {
    echo "<a href='maneUsers.php' class='back'>назад</a>";
}
else
    echo "<a href='mane.php' class='back'>назад</a>";

        echo "<h2>$product_name</h2>";
//    echo "<img src='$product_image' alt='$product_name'>";
        echo "<p>$product_description</p>";
        echo "<p>Цена: $product_price</p>";

        // Кнопка "Купить"
        echo "<form method='POST' id='addDataForm'>";
        echo "<input type='hidden' name='product_id' value='$product_id'>";
        echo "<input type='submit' value='Купить' class='btn'>";
        echo "</form>";

} else {
    // Товар не найден
    echo "Товар не найден.";
}
echo "</div>";
$stmt->close();
$sqlConnect->close();
?>
