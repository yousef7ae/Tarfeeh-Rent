var notificationsWrapper = $('.dropdown-notifications');
var notificationsCountElem = notificationsWrapper.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-product');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\CreateNewProduct', function(data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = `<p class="mess-content-subtitle">` + data.nameowner + `اضاف منتج <a href="/admin/products">` + data.product_name + `</a><br>` + data.date + data.time + `</p>`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
    $(".notify").play();

});