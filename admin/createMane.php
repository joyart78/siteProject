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

<script src="../jquery-3.7.0.min.js"></script>
<script src="create.js"></script>

<a href="maneAdmin.php">Назад</a>

<form id="createDataForm" method="POST">

    <label for="name">название продукта:</label>
    <input id="name"   type="text" name="name" value="">
    <br>
    <label for="price">цена:</label>
    <input id="price" type="text" name="price" value="">
    <p>описание:</p>
    <textarea name="about" cols="40" rows="10"></textarea>
    <br>
    <input type="submit" value="Добавить">
</form>


</body>

<?php
