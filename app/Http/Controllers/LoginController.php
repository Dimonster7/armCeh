<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\UserRole;

class LoginController extends Controller
{
    public function login(Request $req){
      if(Auth::check()){

        // return redirect()->intended(route('user.private'));
        return redirect()->intended(route('sessions'));
      }

      $formFields = $req->only(['email', 'password']);

      if(Auth::attempt($formFields)){
        //$roleId = UserRole::select('role_id')->where('user_id', $req->user()->id)->get();
        // if($roleId->count() > 0)
        // $role = Role::select('role')->where('id', $roleId[0]->role_id)->get();
        // if($role[0]->role == "Администратор"){
        //   return redirect()->intended(route('sessions'));
        // }
        // if($role[0]->role == "Мастер"){
        //   return redirect()->intended(route('sessions'));
        // }
        // if($role[0]->role == "Рабочий"){
        //   return redirect()->intended(route('worker'));
        // }
        return redirect()->intended(route('sessions'));

      }
      return redirect(route('user.login'))->withErrors([
        'email' => 'не удалось авторизоваться'
      ]);
    }
}
