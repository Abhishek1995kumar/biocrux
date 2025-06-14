<?php

namespace App\Http\Controllers;

use Exception;
use Pusher\Pusher;
use App\Models\Log;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Cron Job
    function testingCronJob() {
        $log = new Log();
        $log->ip = 111;
        $log->save();
    }
    // End of Cron Job

    // common functions
    function storeLog($action, $function, $data) {
        $log = new Log();
        $log->userId = Auth::user()->id;
        $log->action = $action;
        $log->function = $function;
        $log->data = $data;
        $log->ip = request()->ip();
        $log->save();
    }

    // generate UUID function
    function generateUUID() {
        $uuid = Str::uuid();
        $uuidInstance = Uuid::fromString($uuid);
        $uuidInteger = $uuidInstance->getInteger();
        $newUID = substr($uuidInteger, 0, 10);
        return $newUID;
    }
    // end of common functions

    // these functions are used in all controllers and routes are defined in web.php
        function notify($title, $message, $redirectTo = '/') {
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
                'title' => $title,
                'message' => $message,
                'redirectTo' => env('APP_URL') . $redirectTo
            ];

            $pusher->trigger('generalChannel', 'generalEvent', $messageData);
        }
    //? For app usage
    

}
