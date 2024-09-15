# laravel_notification_system
A simple Laravel notification system for authenticated users.

![Screenshot 2024-09-06 172859](https://github.com/user-attachments/assets/57fe9a51-ac0e-4710-978d-1c89b01d0080)
![Screenshot 2024-09-06 172922](https://github.com/user-attachments/assets/d80e2527-4e09-4d66-b1c0-40b18187a5c1)

## Installation

### [1] Copy
Copy all the content of the `laravel` folder into your laravel project.

### [2] Setting up
Set up you route file `web.php` located in `/routes/` pasting inside this:
```
require base_path('routes/notifications.php');
```
Clear the route cache of your Laravel application:
```
php artisan route:cache
php artisan route:clear
```
Then you can run a migration:
```
php artisan migrate --path=/database/migrations/2024_09_06_000000_create_notifications_table.php
```
Or you can simply execute the SQL query (MySQL) in the file `/database/migrations/notifications.sql`

You are ready to go!
## Utilization
Include in you navigation or where you want your button the blade file:
```
@include('layouts.notifications')
```
And the notifications are all set up.
To create a notification in a controller, include the model:
```
use App\Models\Notifications;
```
and use the function:
```
Notifications::notifiy('some text as notification');
```
## Personalization
- Choose the number of last notification to see:
  In `app\Providers\NotificationServiceProvider.php` you will find this line of code
  ```
  ->limit(20)
  ```
  change to the desired number, default is 20.
- Change the receiver:
  To change the receiver, you can configure the function `notify` in `/app/Models/Notifications.php`
  ```
  $users = User::all();
  ```
  for now will send a notification to all the users, so it will create a record for each user.
### [5] Notes
- To mark a notification as read, you can simply click on it, this will hide the red dot.
- To hide "Unread notifications" mark all notifications as read.
- The style `notifications.blade.php` view was made using Bootstrap and FontAwesome, so the style will not be visible unless you include them. Alternatively, you can use you own styling by editing the `.css` and the view.
