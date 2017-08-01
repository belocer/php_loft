document.querySelector('.order__form-button').addEventListener('click', function (e) { // Проверка заполнености полей
    var warning = [];
    var name = document.forms['order-form'].name.value;
    var phone = document.forms['order-form'].phone.value;
    var email = document.forms['order-form'].email.value;
    var street = document.forms['order-form'].street.value;
    var home = document.forms['order-form'].home.value;

    (name.length < 1) ? warning.push('<li>* Введите пожалуйста Имя получателя</li>') : '';
    (phone.length < 1) ? warning.push('<li>* Введите пожалуйста номер телефона получателя</li>') : '';
    (email.length < 1) ? warning.push('<li>* Введите пожалуйста email получателя</li>') : '';
    (street.length < 1) ? warning.push('<li>* Укажите пожалуйста улицу доставки</li>') : '';
    (home.length < 1) ? warning.push('<li>* Укажите пожалуйста номер дома</li>') : '';

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

/* AJAX запрос поиск по БД email
==================================================*/
document.forms[0].elements.email.addEventListener('blur', function(e){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../php/email.php');
    xhr.send();
    xhr.addEventListener('load', function(){
       if(xhr.status < 400) {
           console.log(xhr.responseText);
       } else {
           console.log('ошибка');
       }
    });
});