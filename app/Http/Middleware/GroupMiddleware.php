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
        $members = $request->group->member()->get();
        if ($request->group->creator_id == $request->user()->id) {
            return $next($request);
        }

        foreach ($members as $member) {
            if ($member->user_id == $request->user()->id) {
                return $next($request);
            }
        }

        $request->session()->flash(
            'message_warning',
            'У Вас нет прав для посещения этой группы'
        );
        return redirect('/groups');
    }
}
