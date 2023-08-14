import './bootstrap';
import axios from 'axios';

window.onload = function() {
    axios.get('/api/v1/admin/notifications')
        .then(function (response) {
            const notifications = response.data;
            const notificationsDiv = document.getElementById('notifications');
            notifications.forEach(function(notification) {
                const p = document.createElement('p');
                p.textContent = notification.message;
                notificationsDiv.appendChild(p);
            });
        })
        .catch(function (error) {
            console.log(error);
        });
}
