<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //dd(1);
        Log::info('Tình trạng xác thực:', [
            'auth' => auth()->guard('admin')->check(),
            'user_id' => auth()->guard('admin')->id(),
        ]);

        if (! $request->expectsJson()) {
            dd($request->user());
            return route('admin.login');
        }
    }
}
