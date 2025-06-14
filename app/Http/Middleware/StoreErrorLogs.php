<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreErrorLogs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    protected $functionName;

    public function handle(Request $request, Closure $next)
    {
        try {
            $response = $next($request);
        } catch (\Exception $exception) {
            // Log the error to the database
            DB::table('errorlogs')->insert([
                'status_code' => $response->status(),
                'error_message' => $exception->getMessage(),
                'exception_trace' => $exception->getTraceAsString(),
                'function_name' => $this->functionName,
                'url' => $request->fullUrl(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'request_headers' => json_encode($request->header()),
                'request_payload' => json_encode($request->all()),
                'session_data' => json_encode($request->session()->all()),
                'route_name' => $request->route()->getName(),
                'route_parameters' => json_encode($request->route()->parameters()),
                'created_at' => now(),
            ]);
        }
        return $response;
    }

    public function __construct($functionName)
    {
        $this->functionName = $functionName;
    }
}
