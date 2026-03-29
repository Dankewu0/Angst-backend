<?php

namespace App\Http\Services;

use App\Models\Notification;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class NotificationService
{
    protected string $centrifugoUrl;
    protected string $centrifugoKey;

    public function __construct()
    {
        $this->centrifugoUrl = config('services.centrifugo.url');
        $this->centrifugoKey = config('services.centrifugo.key');
    }

    public function getNotifications(int $perPage = 10): LengthAwarePaginator
    {
        $perPage = max(1, min($perPage, 100));
        return Notification::latest()->paginate($perPage);
    }

    public function sendNotification(array $data, string $channel): Notification
    {
        $notification = Notification::create($data);

        Http::withHeaders([
            'Authorization' => "apikey {$this->centrifugoKey}"
        ])->post("{$this->centrifugoUrl}/publish", [
            'channel' => $channel,
            'data' => $notification->toArray(),
        ]);

        return $notification;
    }

    public function deleteNotification(Notification $notification): void
    {
        $notification->delete();
    }
}
