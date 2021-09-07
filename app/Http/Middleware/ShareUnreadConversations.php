<?php

namespace App\Http\Middleware;

use App\Models\ImConversation;
use Closure;
use Illuminate\Http\Request;

class ShareUnreadConversations
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            view()->share('unreadConversations', ImConversation::getUnreadConversations());
        }

        return $next($request);
    }
}
