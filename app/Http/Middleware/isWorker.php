<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\UserRole;

class isWorker
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
      $roleId = UserRole::select('role_id')->where('user_id', $request->user()->id)->get();
      $role = Role::select('role')->where('id', $roleId[0]->role_id)->get();
      if($role[0]->role == "Рабочий" || $role[0]->role == "Администратор"){
        return $next($request);
      }
      abort(403);
    }
}
