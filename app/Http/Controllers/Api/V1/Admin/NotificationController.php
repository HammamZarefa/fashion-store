<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    /**
     * Get the list of notifications.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $notifications = Notification::getAllNotifications();

        return response()->json($notifications);
    }
}

