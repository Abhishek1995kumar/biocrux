<?php

namespace App\Services;

use App\Models\Cronlog;

class CronJobLogger
{
    public static function log($functionName, $status, $message = null)
    {
        Cronlog::create([
            'function_name' => $functionName,
            'executed_at' => now(),
            'status' => $status,
            'message' => $message,
        ]);
    }
}
