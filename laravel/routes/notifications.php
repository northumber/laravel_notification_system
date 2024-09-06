<?php

use App\Http\Controllers\NotificationsController;

Route::post('/notifications/update', [NotificationsController::class, 'updateNotification']);