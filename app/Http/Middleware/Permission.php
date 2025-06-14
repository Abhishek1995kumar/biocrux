<?php

namespace App\Http\Middleware;

use App\Models\Userpermission;
use App\Models\Userrole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $viewPermissions = Userpermission::where('userId', Auth::user()->id)->where('permission', 'like', 'view%')->pluck('permission')->toArray();
        $addPermissions = Userpermission::where('userId', Auth::user()->id)->where('permission', 'like', 'add%')->pluck('permission')->toArray();
        $updatePermissions = Userpermission::where('userId', Auth::user()->id)->where('permission', 'like', 'update%')->pluck('permission')->toArray();
        $deletePermissions = Userpermission::where('userId', Auth::user()->id)->where('permission', 'like', 'delete%')->pluck('permission')->toArray();

        config(
            [
                'viewPermissions' => $viewPermissions,
                'addPermissions' => $addPermissions,
                'updatePermissions' => $updatePermissions,
                'deletePermissions' => $deletePermissions,
            ]
        );
        $d = $request->route()->getPrefix();
        error_log($d);
        // get content after last slash
        $d = substr($d, strrpos($d, '/') + 1);

        $urlRedirects = Userpermission::where('userId', Auth::user()->id)->where('permission', 'like', '%view%')->where('permission', 'like', '%-' . $d . '%')->pluck('permission')->toArray();

        $whiteListed = [
            'permission',
            'dashboard',
            'attendanceworker',
            'profile',
            'bankdetail',
            'kyc',
            'wallet',
            'findvendors',
            'notification',
            'attendance'
        ];

        if (count($urlRedirects) > 0 || in_array($d, $whiteListed)) {
            return $next($request);
        } else {
            return abort(403);
        }
        // return $next($request);
    }
}
