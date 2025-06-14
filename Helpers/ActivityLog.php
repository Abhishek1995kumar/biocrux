<?php 

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use App\Traits\EmailSendTrait;
use Throwable;
class ActivityLog {
    use EmailSendTrait;
    public static function log($type, $data)
    {
        try {
            // Log the activity
            Log::info("Activity Log: {$type}", $data);

            // Send email notification
            $email = $data['email'] ?? '';
            if ($email) {
                App::make(ActivityLog::class)->customEmailSend($email, $type, $data);
            }
        } catch (Throwable $th) {
            // Handle any exceptions that occur during logging or email sending
            Log::error("Error logging activity: {$type}", [
                'error' => $th->getMessage(),
                'data' => $data
            ]);
            // Optionally, you can rethrow the exception or handle it as needed
        }
    }
    public static function logError($message, $data = [])
    {
        try {
            // Log the error
            Log::error("Error: {$message}", $data);
        } catch (Throwable $th) {
            // Handle any exceptions that occur during error logging
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logWarning($message, $data = [])
    {
        try {
            // Log the warning
            Log::warning("Warning: {$message}", $data);
        } catch (Throwable $th) {
            // Handle any exceptions that occur during warning logging
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logInfo($message, $data = [])
    {
        try {
            // Log the info
            Log::info("Info: {$message}", $data);
        } catch (Throwable $th) {
            // Handle any exceptions that occur during info logging
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logDebug($message, $data = [])
    {
        try {
            // Log the debug message
            Log::debug("Debug: {$message}", $data);
        } catch (Throwable $th) {
            // Handle any exceptions that occur during debug logging
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logCritical($message, $data = [])
    {
        try {
            // Log the critical message
            Log::critical("Critical: {$message}", $data);
        } catch (Throwable $th) {
            // Handle any exceptions that occur during critical logging
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logAlert($message, $data = [])
    {
        try {
            // Log the alert message
            Log::alert("Alert: {$message}", $data);
        } catch (Throwable $th) {
            // Handle any exceptions that occur during alert logging
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logEmergency($message, $data = [])
    {
        try {
            // Log the emergency message
            Log::emergency("Emergency: {$message}", $data);
        } catch (Throwable $th) {
            // Handle any exceptions that occur during emergency logging
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logNotice($message, $data = [])
    {
        try {
            // Log the notice message
            Log::notice("Notice: {$message}", $data);
        } catch (Throwable $th) {
            // Handle any exceptions that occur during notice logging
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logEmergencyWithEmail($message, $data = [])
    {
        try {
            // Log the emergency message
            Log::emergency("Emergency: {$message}", $data);
            // Send email notification if email is provided
            $email = $data['email'] ?? '';
            if ($email) {
                App::make(ActivityLog::class)->customEmailSend($email, 'emergency', $data);
            }
        } catch (Throwable $th) {
            // Handle any exceptions that occur during emergency logging or email sending
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logAlertWithEmail($message, $data = [])
    {
        try {
            // Log the alert message
            Log::alert("Alert: {$message}", $data);
            // Send email notification if email is provided
            $email = $data['email'] ?? '';
            if ($email) {
                App::make(ActivityLog::class)->customEmailSend($email, 'alert', $data);
            }
        } catch (Throwable $th) {
            // Handle any exceptions that occur during alert logging or email sending
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logNoticeWithEmail($message, $data = [])
    {
        try {
            // Log the notice message
            Log::notice("Notice: {$message}", $data);
            // Send email notification if email is provided
            $email = $data['email'] ?? '';
            if ($email) {
                App::make(ActivityLog::class)->customEmailSend($email, 'notice', $data);
            }
        } catch (Throwable $th) {
            // Handle any exceptions that occur during notice logging or email sending
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logDebugWithEmail($message, $data = [])
    {
        try {
            // Log the debug message
            Log::debug("Debug: {$message}", $data);
            // Send email notification if email is provided
            $email = $data['email'] ?? '';
            if ($email) {
                App::make(ActivityLog::class)->customEmailSend($email, 'debug', $data);
            }
        } catch (Throwable $th) {
            // Handle any exceptions that occur during debug logging or email sending
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logInfoWithEmail($message, $data = [])
    {
        try {
            // Log the info message
            Log::info("Info: {$message}", $data);
            // Send email notification if email is provided
            $email = $data['email'] ?? '';
            if ($email) {
                App::make(ActivityLog::class)->customEmailSend($email, 'info', $data);
            }
        } catch (Throwable $th) {
            // Handle any exceptions that occur during info logging or email sending
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
    public static function logWarningWithEmail($message, $data = [])
    {
        try {
            // Log the warning message
            Log::warning("Warning: {$message}", $data);
            // Send email notification if email is provided
            $email = $data['email'] ?? '';
            if ($email) {
                App::make(ActivityLog::class)->customEmailSend($email, 'warning', $data);
            }
        } catch (Throwable $th) {
            // Handle any exceptions that occur during warning logging or email sending
            Log::critical("Critical error logging failed: {$th->getMessage()}", [
                'original_message' => $message,
                'data' => $data
            ]);
        }
    }
}

