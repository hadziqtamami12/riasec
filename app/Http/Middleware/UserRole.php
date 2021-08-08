<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $roles = [
            'superadmin' => '1',
            'admin'      => '2',
            'user'       => '3',
        ];

        if (!in_array(auth()->user()->roleId, $roles[$role])) {
            abort(403);
        }
        return $next($request);

        // if (!$request->user()->hasRole($role)) {
        //     abort(403);
        // }
    }
}
