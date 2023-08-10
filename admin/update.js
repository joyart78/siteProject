

$(document).ready(function() {
    $('#updateDataForm').submit(function(event) {
        event.preventDefault(); // Отменяем отправку формы по умолчанию

        // Получаем данные из формы
        let formData = $(this).serialize();

        // Отправляем AJAX-запрос на сервер
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: formData,
            success: function(response) {
                // Отображаем уведомление о добавлении данных
                alert(response);
            },
            error: function() {
                // Отображаем сообщение об ошибке, если что-то пошло не так
                alert('Ошибка при добавлении данных в базу данных.');
            }
        });
    });
});