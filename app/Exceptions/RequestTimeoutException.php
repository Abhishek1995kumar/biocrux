<?php

namespace App\Exceptions;

use Exception;

class RequestTimeoutException extends Exception {
    public function render($request) {
        return response()->view('admin.errors.408', [], 408);
    }
}
