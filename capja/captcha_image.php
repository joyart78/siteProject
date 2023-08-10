<?php
session_start();
function generateCaptchaCode($length = 6) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captchaCode = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $captchaCode .= $characters[$randomIndex];
    }

    return $captchaCode;
}

$captchaCode = generateCaptchaCode();

    $_SESSION['captcha_code'] = $captchaCode;

// Создаем изображение
$imageWidth = 200;
$imageHeight = 50;
$image = imagecreate($imageWidth, $imageHeight);

// Устанавливаем цвет фона и текста
$backgroundColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, 399, 29, $backgroundColor);

// Рисуем текст капчи на изображении
$fontFile = realpath('beer-money12.ttf'); // Путь к шрифту
$textSize = 20;
$textX = 30;
$textY = 35;
imagettftext($image, $textSize, 0, $textX, $textY, $textColor, $fontFile, $captchaCode);

// Отправляем заголовки, чтобы изображение было распознано как изображение
header('Content-type: image/png');

// Выводим изображение
imagepng($image);
imagedestroy($image);