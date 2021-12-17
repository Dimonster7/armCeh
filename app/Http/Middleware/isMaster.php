<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserRole;

class isMaster
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
      if($roleId->count() != 0) {
        //$role = Role::select('role')->where('id', $roleId[0]->role_id)->get();
        //if($role[0]->role == "Мастер" || $role[0]->role == "Администратор"){
        if ($roleId[0]->role_id == 2 || $roleId[0]->role_id == 1){
          return $next($request);
        }
      }
      abort(403);
    }
}
