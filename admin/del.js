

$(document).ready(function() {
    $('#delDataForm').submit(function(event) {
        event.preventDefault(); // Отменяем отправку формы по умолчанию

        // Получаем данные из формы
        let formData = $(this).serialize();

        // Отправляем AJAX-запрос на сервер
        $.ajax({
            type: 'POST',
            url: 'del.php',
            data: formData,
            success: function(response) {
                // Отображаем уведомление о добавлении данных
                alert(response);
                window.location.href = "maneAdmin.php"
            },
            error: function() {
                // Отображаем сообщение об ошибке, если что-то пошло не так
                alert('Ошибка при добавлении данных в базу данных.');
            }
        });
    });
});