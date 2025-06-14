<?php

namespace App\Traits;

use Throwable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

trait EmailSendTrait {
    public function customEmailSend($email, $type, $data) {
        try {
            // $email = $data['email'];
            // $type = $data['type'];
            // $details = $data['details'];

            // Mail::send('emails.custom_email', [
            //     'type' => $type,
            //     'details' => $details,
            // ], function($message) use ($email, $type) {
            //     $message->to($email);
            //     $message->subject("New {$type} Created Notification");
            // });

            // $templates = config("email_templates.$type");
            $templates = config("email_templates.$type", []);
            $subject = __('emails.subjects.'. $type) ?? __('emails.subjects.default');

            if(!$templates) {
                $subject = "Notification";
                $contentLines = ["No template found for $type"];

            } else {
                $subject = $templates['subject'];
                $contentLines = [];
                foreach ($templates['lines'] as $line) {
                    $contentLines[] = preg_replace_callback('/:([a-zA-Z_]+)/', function ($matches) use ($data) {
                        return $data[$matches[1]] ?? 'N/A';
                    }, $line);
                }

                Mail::send('emails.email_templates', [
                        'lines' => $contentLines
                    ],
                    function ($message) use($email, $subject) {
                        $message->to($email)->subject($subject);
                    } 
                );
            }

        } catch(Throwable $th) {

        }
    }
}


