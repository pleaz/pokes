<?php

return [

    'login' => [
        'log' => 'Вход',
        'mail' => 'Эл. почта',
        'password' => 'Пароль',
        'remember' => 'Запомнить меня',
        'login' => 'Войти',
        'forgot' => 'Забыли Ваш пароль?'
    ],

    'register' => [
        'reg' => 'Регистрация',
        'name' => 'Имя',
        'conf_password' => 'Подтвердить пароль',
        'register' => 'Зарегистрироваться'
    ],

    'reset' => [
        'res' => 'Сброс пароля',
        'reset' => 'Сбросить пароль',
        'send' => 'Выслать ссылку для сброса пароля'
    ],

    'logout' => 'Выйти',
    'home' => 'На главную',
    'settings' => 'Настройки',
    'bounty' => 'Баунти',
    'reports' => 'Отчеты',
    'dashboard' => 'Главная',
    'logged' => 'Вы успешно вошли на сайт!',
    'pokes' => 'Pokes',

    'form-bounty-add' => [
        'title' => 'Добавить баунти',
        'name' => 'Название',
        'twitter_url' => 'Twitter url',
        'twitter_number' => 'Порядковый номер в таблице (Twitter)',
        'twitter_tags' => 'Twitter hashtags (без #)',
        'first_day' => 'Первый день отчета',
        'period' => 'Период за который нужно делать отчет',
        'close' => 'Закрыть',
        'save' => 'Сохранить'
    ],

    'form-bounty-edit' => [
        'title' => 'Редактировать баунти'
    ],

    'form-bounty-delete' => [
        'title' => 'Удалить баунти',
        'cancel' => 'Отменить',
        'delete' => 'Удалить'
    ],

    'bounty-page' => [
        'title' => 'Баунти',
        'add_button' => 'Добавить новую баунти',
        'edit_button' => 'Редактировать',
        'delete_button' => 'Удалить',
        'bounty_title' => 'Баунти #'
    ],

    'report' => [
        'title' => 'Отчет',
        'show_button' => 'Показать',
        'not_found' => 'Баунти не найдены',
        'bounty_title' => 'Баунти #',
        'show_hide_button' => 'Показать/Скрыть',
        'generate_button' => 'Сгенерировать отчет'
    ],

    'setting' => [
        'title' => 'Настройки',
        'twitter' => 'Twitter',
        'logout' => 'Выход',
        'sign' => 'Залогиниться с помощью Twitter',
        'template' => 'Шаблон для отчетов в Twitter',
        'save' => 'Сохранить'
    ],

    'errors' => [
        'no_report' => 'Не найдены отчеты',
        'no_bounty' => 'Баунти не найдены',
        'permission' => 'У Вас нет доступов',
        'twitter_error' => 'Ошибка! Что-то пошло не так при регистрации',
        'twitter_exist' => 'Данный аккаунт уже зарегистрирован на сайте',
        'twitter_login' => 'Мы не можем залогиниться в Twitter.',
        'twitter_in_use' => 'Данный твиттер аккаунт не может быть использован',
        'report_date' => 'Не правильная дата!',
        'report_period' => 'Не правильно указан период!',
        'report_twitter' => 'Сначала нужно залогиниться в твиттере!',
        'report_token' => 'Нужно перелогиниться в твиттере!',
        'report_bounty' => 'Баунти не имеет адрес и хештеги',
        'report_exist' => 'Отчет уже готов!'
    ],

    'status' => [
        'signed' => 'Поздравляю! Вы успешно вышли на сайт!',
        'logged' => 'Вы вышли с сайта!'
    ]

];