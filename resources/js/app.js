import './bootstrap';

// Оставляем логовую запись на странице
function log(message) {
    $(".logs").prepend("<div class=\"logs__item\">" + message + "</div>");
}

// Меняем цвет светофора
function setColor(color) {
    $('.traffic-lights__item').removeClass('active');
    $('.traffic-lights__item.'+color).addClass('active');
}

// Системные данные для распознавания фазы светофора
let previousColor = null;
let phase = "green";

// Функция переключения светофора
function runTrafficLights(color) {
    switch (color) {
        case "green":
            setTimeout(function () {
                previousColor = "green"; // Хотел вынести в самое начало функции, чтобы не повторяться, но вспомнил про таймаут
                phase = "yellow";

                setColor(phase); //здесь вместо "yellow" подставляю сразу phase, тк различий нет, и нет смысла лишний раз слово писать
                runTrafficLights(phase);
            }, 5000);
            break;
        case "red":
            setTimeout(function () {
                previousColor = "red";
                phase = "early_yellow";

                setColor(phase);
                runTrafficLights(phase);
            }, 5000);

            break;
        case "yellow":
            setTimeout(function () {
                previousColor = "yellow";
                phase = "red";

                setColor(phase);
                runTrafficLights(phase);
            }, 2000);

            break;
        case "early_yellow":
            setTimeout(function () {
                previousColor = "early_yellow";
                phase = "green";

                setColor(phase);
                runTrafficLights(phase);
            }, 2000);
    }
}

// При загрузке основных модулей страницы запустим обработку
$(document).ready(function () {
    // Вызываем рекурсивное переключение светофора с заданным стартовым цветом
    runTrafficLights('green');

    // Обработчик клика на кнопку "Вперёд"
    $('#handleMove').click(function () {
        $.ajax({
            url: "/api/traffic/move/" + phase,
            method: "post",
            complete: function (data) {
                log(data.responseJSON.message);
            }
        });
    });
});
