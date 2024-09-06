var notificationNotice = document.querySelector('.notification_notice');
var notificationPopup = document.querySelector('.notification_popup');
var notificationPopupHeader = document.querySelector('.notification_popup-header');

function toggleNotificationPopup() {
    notificationNotice.style.display = 'none';
    notificationPopup.classList.toggle('open');
    notificationPopupHeader.classList.toggle('open');
}

var notificationDivs = document.querySelectorAll('.notification_div');

notificationDivs.forEach(function(notificationDiv) {
    notificationDiv.addEventListener('click', function() {
        var notificationHeading = this.querySelector('.notifica_heading');
        notificationHeading.classList.remove('new');

        var notificationId = this.getAttribute('data-id');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/notifications/update', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.send(JSON.stringify({
            notification_id: notificationId
        }));
        checkIfAllNotificationsRead();
    });
});

function checkIfAllNotificationsRead() {
    var allRead = true;
    var notificationHeadings = document.querySelectorAll('.notifica_heading');
    notificationHeadings.forEach(function(heading) {
        if (heading.classList.contains('new')) {
            allRead = false;
        }
    });
    if (allRead) {
        document.getElementById('notification_icon').classList.remove('notification_icon_newnot');
    } else {
        document.getElementById('notification_icon').classList.add('notification_icon_newnot');
    }
}

checkIfAllNotificationsRead();