/* Проверка введённых данных
==============================*/
var btn = document.getElementById('save');
var age = document.getElementById('age');

btn.addEventListener('click', function (e) {

    var warning = [];
    var login = document.getElementById('login');
    var password = document.getElementById('password');
    var name = document.getElementById('name');
    var description = document.getElementById('description');

    (login.value.length < 6 || login.value.length > 16) ? warning.push('<li>* Логин должен состоять не меньше чем из 6 символов и не превышать 16 символов</li>') : '';
    (password.value.length < 6 || password.value.length > 16) ? warning.push('<li>* Пароль должен состоять не меньше чем из 6 символов и не превышать 16 символов</li>') : '';
    (name.value.length < 2 || name.value.length > 35) ? warning.push('<li>* Не корректное ИМЯ</li>') : '';
    (age.value < 1 || age.value > 120) ? warning.push('<li>* Не корректный возраст</li>') : '';
    (description.value.length < 0 || description.value.length > 1000) ? warning.push('<li>* Описание превышает 1000 символов</li>') : '';



    if (warning.length > 0) {
        e.preventDefault();
        var out = document.createElement('ul');
        for (var i = 0; i < warning.length; i++) {
            out.innerHTML += warning[i];
        }
        document.getElementById('warning').innerHTML = '';
        document.getElementById('warning').appendChild(out);
    }
});

// Отслеживаю что бы в поле с возрастом были только числа
age.addEventListener('keyup', function(){
    if(isNaN(age.value)){
        age.value = '';
    }
});
