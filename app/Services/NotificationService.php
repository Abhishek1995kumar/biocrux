<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;
use Pusher\Pusher;

class NotificationService
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function sendPushNotificationToManagers($plantId, $title, $message, $redirectToWebUrl, $redirectToAppUrl)
    {
        try {
            // get the plant manager id of the plant
            $plantManagerIds = User::where('plantId', $plantId)->where('role', 'plant-manager')->pluck('id')->toArray();

            // add the plant manager id to the user ids array
            $userIds[] = 2;
            $userIds = array_merge($userIds, $plantManagerIds);

            foreach ($userIds as $userId) {
                $notify = new Notification();
                $notify->userId = $userId;
                $notify->plantId = $plantId;
                $notify->title = $title;
                $notify->message = $message;
                $notify->redirectToWebUrl = $redirectToWebUrl;
                $notify->redirectToAppUrl = $redirectToAppUrl;
                $notify->status = 1; // 1 means unread
                $notify->save();
            }

            $oneSignalUserIds = array_map(function ($userId) {
                return 'oneSignalSESPL_' . $userId;
            }, $userIds);

            $this->apiService->makeApiRequest('https://onesignal.com/api/v1/notifications', 'POST', [
                'headers' => [
                    'Authorization' => 'Basic ' . env('ONESIGNAL_REST_API_KEY'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'app_id' => env('ONESIGNAL_APP_ID'),
                    'include_aliases' => [
                        'external_id' => $oneSignalUserIds,
                    ],
                    'target_channel' => ['push'],
                    'data' => [
                        'urlRedirectTo' => $redirectToAppUrl,
                    ],
                    'headings' => ['en' => $title],
                    'contents' => ['en' => $message],
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Error sending push notification: ' . $e->getMessage());
        }
    }

    public function sendApprovalNotifications($plant, $title, $message, $redirectTo = '/')
    {
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $messageData = [
            'plantId' => $plant,
            'title' => $title,
            'message' => $message,
            'redirectTo' => env('APP_URL') . $redirectTo
        ];

        $pusher->trigger('generalChannel', 'generalEvent', $messageData);
    }
}
