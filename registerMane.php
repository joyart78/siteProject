<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Страница регистрации</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .registration-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .registration-form h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            width: 100%;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<script src="jquery-3.7.0.min.js"></script>
<script src="register.js"></script>



<div class="registration-form">
    <h2>Регистрация</h2>
    <form id="addDataForm">
        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <label for="captcha">Введите код с картинки:</label>
        <img src="capja/captcha_image.php" alt="Captcha Image">
        <input type="text" name="captcha" id="captcha">

        <div class="form-group">
            <input type="submit" value="Зарегистрироваться">
        </div>
    </form>
    <a href="mane.php">Войти в аккаунт</a>
</div>


</body>
</html>


