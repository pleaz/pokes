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
    'catalog' => 'Каталог',
    'airdrop' => 'Airdrop',
    'faq' => 'FAQ',
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
    ],

    'main' => [
        'title' => 'Генерирование отчетов для баунти кампаний',
        'description' => 'Создай отчет в твиттер менее чем за 1 минуту',
        'button' => 'Начать бесплатно',
        'mes' => 'Какие проблемы решит Pokes?',
        'mes_desc' => 'Создание отчетов для социальных сетей <br />twitter и facebook',
        'mes1' => 'Потерянное время',
        'mes1_desc' => 'Когда на копирование всех ссылок и составления отчетов тратить очень много времени.',
        'mes2' => 'Больше проектов',
        'mes2_desc' => 'Когда хочется вести больше проектов, но времени катастрофически не хватает',
        'mes3' => 'Хаос в документах',
        'mes3_desc' => 'Когда большое количество отчетов и документов с ссылками, Pokes поможет систематизировать данные и избавится от рутины'
    ],

    'faq_page' => [
        'faq1' => 'Как добавить баунти кампанию',
        'faq2' => 'Затем заполняете поля в всплывающем окошке:',
        'faq3' => 'В итоге должно получиться так:',
        'faq4' => 'Нажимаете «сохранить».',
        'faq5' => 'Поздравляем! Вы добавили первую баунти кампанию.',
        'faq6' => 'Как создать отчет',
        'faq7' => 'Выберите день за который вам нужно создать отчет, затем нажмите кнопку «показать»',
        'faq8' => 'Нажимаете «Сгенерировать отчет»',
        'faq9' => 'Отчет сгенерировался, теперь вы можете посмотреть его:',
        'faq10' => 'Отчет готов! Поздравляем!',
        'faq11' => 'Первоначальные настройки',
        'faq12' => '1. Войти своей учетной записью в твиттер;',
        'faq13' => '2. Введите шаблонный текст для отчетов.',
        'faq14' => 'У Вас должно получиться так:'
    ],

    'drop' => '<iframe width="402" height="346" frameborder="0" scrolling="no" src="https://onedrive.live.com/embed?resid=AB3992978091DCA5%21105&authkey=%21AEmwycsXOJSRHSQ&em=2&wdHideGridlines=True&wdHideHeaders=True&wdDownloadButton=True&wdInConfigurator=True"></iframe>',
    'cat' => '<iframe width="402" height="346" frameborder="0" scrolling="no" src="https://onedrive.live.com/embed?resid=AB3992978091DCA5%21112&authkey=%21ABscCrxwmOqA-Tc&em=2&wdHideGridlines=True&wdHideHeaders=True&wdDownloadButton=True&wdInConfigurator=True"></iframe>'

];