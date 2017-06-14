<?php

namespace App\Http\Middleware;

use Closure;

class GroupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->memberIn()) {
            $request->session()->flash(
                'message_warning',
                'У Вас нет прав для посещения этой группы'
            );
            return redirect('/groups');
        }
        return $next($request);
    }
}
