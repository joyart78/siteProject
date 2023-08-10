<?php
$sqlConnect = mysqli_connect("localhost","root",'',"poject");

if ($sqlConnect->connect_error) {
    die("Connection failed: " . $sqlConnect->connect_error);
}
mysqli_set_charset($sqlConnect, "utf8");

$login = $_POST['login'];
$password = $_POST['password'];

$stmt = $sqlConnect->prepare("SELECT * FROM users WHERE login = ? AND pass = ?");
$stmt->bind_param("ss", $login, $password);

// Выполнение SQL-запроса
$stmt->execute();

// Получение результата запроса
$result = $stmt->get_result();

// Проверка наличия пользователя
if ($result->num_rows > 0) {
    // Пользователь найден, выполните необходимые действия (например, установите сеанс авторизации)
    session_start();
    $_SESSION['login'] = $login;

    // Перенаправление на защищенную страницу
    if ($login === "admin")
        echo "admin";

} else {
    // Пользователь не найден, выводите сообщение об ошибке
    echo "Неправильное имя пользователя или пароль.";
}

$stmt->close();
$sqlConnect->close();