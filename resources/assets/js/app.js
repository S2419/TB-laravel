
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//import VueResource from "vue-resource"

window.Vue = require('vue');

window._ = require('lodash');

window.$ = window.jQuery = require ('jquery');

require('bootstrap-sass');

window.Pusher = require('pusher-js');


import Echo from "laravel-echo";

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '0650cfd9d97d2a766529',
    cluster: 'eu',
    encrypted: true,
});

var notifications = [];

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
//Vue.component('comments', require('./components/Comments.vue'));
//Vue.component('comment-add', require('./components/CommentAdd.vue'));
Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
//Vue.component('message-form', require('./components/MessageForm.vue'));
Vue.component('message-list', require('./components/MessageList.vue'));


const main = new Vue ({
    el: '#main',

});

const NOTIFICATION_TYPES = {
    comment: 'App\\Notifications\\NewComment',
    follow: 'App\\Notifications\\NewFollower'
};
$(document).ready(function(){
    //see logged in
    if(Laravel.userId){
        $.get('/notifications', function(data){
            addNotifications(data, "#notifications");
        });
    }
});

function addNotifications (newNotifications, target) {
    notifications =_.concat(notifications, newNotifications);
    //last 10
    notifications.slice(0,10);
    showNotifications(notifications, target);
}

function showNotifications(notifications, target){
    if(notifications.length){
        var htmlElements = notifications.map(function (notification){
            return makeNotification(notification);
        });
        $(target + 'Menu').html(htmlElements.join(''));
        $(target).addClass('has-notifications')
    }else{
        $(target + 'Menu').html('<li class="dropdown-header">No notifications</li>');
        $(target).removeClass('has-notifications');
    }

}
function makeNotification(notification) {
    var to = routeNotification(notification);
    var notificationText = makeNotificationText(notification);
    return '<li><a href="' + to + '">' + notificationText + '</a></li>';
}

// get the notification route based on it's type
function routeNotification(notification) {
    var to = '?read=' + notification.id;
    if (notification.type === NOTIFICATION_TYPES.comment) {
        to = 'post/' + notification.data.data.post_id + to;
        //console.log(to);
    } else if (notification.type === NOTIFICATION_TYPES.follow) {
        to = 'followlist' + to;
        console.log(to)
    } else if (notification.type === NOTIFICATION_TYPES.comment) {
        to = 'chat/' + notification.data.data.message_id + to;

    }
    return '/' + to;

}

// get the notification text based on it's type
function makeNotificationText(notification) {
    var text = '';
    if(notification.type === NOTIFICATION_TYPES.comment) {
        const name = notification.data.name;
        text += 'New comment on your post!'.fontcolor('black');
    } else if (notification.type === NOTIFICATION_TYPES.follow) {
        const name = notification.data.data.follower_name;
        text += '<strong> New </strong> follower'.fontcolor('black');
    } else if (notification.type === NOTIFICATION_TYPES.comment) {
        const name = notification.data.name;
        text += '<strong>' + name + '</strong> sent you a message'.fontcolor('black')
    }
    return text;
}

$(document).ready(function(){
    if(Laravel.userId){

        window.Echo.private('App.User.${Laravel.userId}')
            .notification((notification) => {
                addNotifications([notification], '#notifications');
                console.log(notification);
            });
    }
});



