
//window._ = require('lodash');
//window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

/* fonts awesome */
var fontawesome = require('@fortawesome/fontawesome');
var faUser = require('@fortawesome/fontawesome-free-solid/faUser');
var faSignOut = require('@fortawesome/fontawesome-free-solid/faSignOutAlt');
var faSpinner = require('@fortawesome/fontawesome-free-solid/faSpinner');
var faTwitter = require('@fortawesome/fontawesome-free-brands/faTwitter');
var faAlgolia = require('@fortawesome/fontawesome-free-brands/faAlgolia');
var faCalendar = require('@fortawesome/fontawesome-free-regular/faCalendarAlt');
fontawesome.library.add(faUser,faSignOut,faSpinner,faTwitter,faAlgolia,faCalendar);

/* datepicker */
require('bootstrap-datepicker');
!function(a){a.fn.datepicker.dates.ru={days:["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],daysShort:["Вск","Пнд","Втр","Срд","Чтв","Птн","Суб"],daysMin:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],months:["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],monthsShort:["Янв","Фев","Мар","Апр","Май","Июн","Июл","Авг","Сен","Окт","Ноя","Дек"],today:"Сегодня",clear:"Очистить",format:"dd.mm.yyyy",weekStart:1,monthsTitle:"Месяцы"}}(jQuery);

/* tagsinput && typeahead */
window.Bloodhound  = require('bloodhound-js');
require('bootstrap-3-typeahead');
require('bootstrap-tagsinput');

// for open popup
window.send = function send(url, id) {
    if(id) {
        var param = {
            action_id: id
        }
    }
    axios.get(url, {
        params: param
    })
    .then(function (response) {
        $('.modal').empty().append(response.data.html).modal();
    })
    .catch(function (error) {
        //console.log(error);
        if(error.response.data.message){
            alert(error.response.data.message);
        }
    });
};