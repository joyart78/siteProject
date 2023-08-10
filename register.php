<?php


    // Переменные с формы
    $sqlConnect = mysqli_connect("localhost","root",'',"poject");
    $password = $_POST['password'];
    $login = $_POST['login'];


    if ($sqlConnect->connect_error) {
        die("Connection failed: " . $sqlConnect->connect_error);
    }
    mysqli_set_charset($sqlConnect, "utf8");

    $stmt = $sqlConnect->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Такой логин уже существует"; // Отправляем ответ о повторении на клиентскую сторону
    }
    else {

        $stmt->close();

        $stmt = $sqlConnect->prepare("INSERT INTO users (login, pass) VALUES (?, ?)");
        $stmt->bind_param("ss", $login, $password);

        session_start();

        $captchaCode = $_SESSION['captcha_code'];
        $userCaptcha = $_POST['captcha'];
        
        if ($userCaptcha === $captchaCode) {
// Выполнение SQL-запроса
            if ($stmt->execute()) {
                $stmt->close();
                $sqlConnect->close();
                echo "Аккаунт добавлен"; // Отправляем ответ об успешном добавлении данных на клиентскую сторону
//            exit();
            } else {
                $stmt->close();
                $sqlConnect->close();
                echo "error"; // Отправляем ответ об ошибке на клиентскую сторону
//            exit();
            }
        }
    }



?>