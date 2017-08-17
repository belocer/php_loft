/* Авторизация пользователя
==============================*/
var button = document.getElementById('button');
var login_auth = document.getElementById('login');
var password_auth = document.getElementById('password');

button.addEventListener('click', function (e) {
    e.preventDefault();

    var xhr = new XMLHttpRequest();
    var body = 'login=' + encodeURIComponent(login_auth.value) + '&password=' + encodeURIComponent(password_auth.value);
    xhr.open("POST", 'php/authoriz.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(body);
    xhr.addEventListener('load', function () {
        if (xhr.status < 400) {
            if(xhr.responseText != "<h1 style='color:darkred; display:block; margin:0 auto; width:500px;height:50px;text-align: center;'>Не верны логин или пароль</h1><br><br><a style='display:block; margin:0 auto;' href='index.php'>Попробовать ещё раз</a>"){
                document.getElementById('form_res_reg').innerHTML = xhr.responseText;
                setTimeout("document.location.href='list.php'", 1500);
            } else {
                document.getElementById('form_res_reg').innerHTML = xhr.responseText;
            }
        } else {
            var d = new Date();
            d.setYear(2016);
            document.cookie = "token=''; expires="+d;
            setTimeout("document.location.href='index.php'", 10);
            console.log('ошибка');
        }
    });
});