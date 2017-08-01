/* Меню скрыть показать
==================================================*/
var users = document.querySelector('.users');
var orders = document.querySelector('.orders');
var search_users = document.querySelector('.search_users');
var search_orders = document.querySelector('.search_orders');

users.addEventListener('click', function (event) {
    var menu_color = document.querySelectorAll('.menu_color');
    for (var i = 0; i < menu_color.length; i++) {
        menu_color[i].removeAttribute('id');
    }
    event.target.setAttribute('id', 'active');

    var wrap = document.querySelectorAll('.wrap');
    for (var i = 0; i < wrap.length; i++) {
        wrap[i].classList.add('close');
    }
    document.querySelector('.content').classList.remove('close');
});

orders.addEventListener('click', function (event) {
    var menu_color = document.querySelectorAll('.menu_color');
    for (var i = 0; i < menu_color.length; i++) {
        menu_color[i].removeAttribute('id');
    }
    event.target.setAttribute('id', 'active');

    var wrap = document.querySelectorAll('.wrap');
    for (var i = 0; i < wrap.length; i++) {
        wrap[i].classList.add('close');
    }
    document.querySelector('.content1').classList.remove('close');
});

search_users.addEventListener('click', function (event) {
    var menu_color = document.querySelectorAll('.menu_color');
    for (var i = 0; i < menu_color.length; i++) {
        menu_color[i].removeAttribute('id');
    }
    event.target.setAttribute('id', 'active');

    var wrap = document.querySelectorAll('.wrap');
    for (var i = 0; i < wrap.length; i++) {
        wrap[i].classList.add('close');
    }
    document.querySelector('.content').classList.remove('close');
});

search_orders.addEventListener('click', function (event) {
    var menu_color = document.querySelectorAll('.menu_color');
    for (var i = 0; i < menu_color.length; i++) {
        menu_color[i].removeAttribute('id');
    }
    event.target.setAttribute('id', 'active');

    var wrap = document.querySelectorAll('.wrap');
    for (var i = 0; i < wrap.length; i++) {
        wrap[i].classList.add('close');
    }
    document.querySelector('.content').classList.remove('close');
});

