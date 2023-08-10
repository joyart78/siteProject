

$(document).ready(function() {
    $('#addDataForm').submit(function(event) {
        event.preventDefault(); // Отменяем отправку формы по умолчанию

        // Получаем данные из формы
        let formData = $(this).serialize();

        // Отправляем AJAX-запрос на сервер
        $.ajax({
            type: 'POST',
            url: 'include.php',
            data: formData,
            success: function(response) {

                // Отображаем уведомление о добавлении данных
                if (response === "admin")
                    window.location.href = "admin/maneAdmin.php";
                else if (response == "Неправильное имя пользователя или пароль.")
                    alert(response)
                else window.location.href = "maneUsers.php";;

            },
            error: function() {
                // Отображаем сообщение об ошибке, если что-то пошло не так
                alert('Ошибка при добавлении данных в базу данных.');
            }
        });
    });
});