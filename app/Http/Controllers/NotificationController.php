<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    public function __construct(protected NotificationService $service) {}

    public function index(Request $request): JsonResponse
    {
        $perPage = $request->input('perPage', 10);
        return response()->json($this->service->getNotifications($perPage));
    }

    public function store(Request $request): JsonResponse
    {
        $channel = $request->input('channel', 'general');
        $notification = $this->service->sendNotification($request->all(), $channel);
        return response()->json($notification, 201);
    }

    public function destroy(Notification $notification): JsonResponse
    {
        $this->service->deleteNotification($notification);
        return response()->json(null, 204);
    }
}
