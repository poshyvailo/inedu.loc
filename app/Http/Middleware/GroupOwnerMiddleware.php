<?php

namespace App\Http\Middleware;

use Closure;

class GroupOwnerMiddleware
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
        if ($request->user()->id != $request->group->creator_id) {
            $request->session()->flash(
                'message_danger',
                'У Вас нет прав для посещения этой группы'
            );
            return redirect('/groups');
        }
        return $next($request);
    }
}
