<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function save(Request $req){
      if(Auth::check()){
        // return redirect(route('user.private'));
        return redirect(route('sessions'));
      }

      $validateFields = $req->validate([
        'email' => 'required|email',
        'password' => 'required'
      ]);

      if(User::where('email', $validateFields['email'])->exists()){
        return redirect(route('user.registration'))->withErrors([
          'email' => 'Такой поьзователь уже зарегистрирован'
        ]);
      }

      $user = User::create($validateFields);
      if ($user){
        Auth::login($user);
        // return redirect(route('user.private'));
        return redirect(route('sessions'));
      }
      return redirect(route('user.login'))->withErrors([
        'formError' => 'Произошла ошибка при сохранении пользователя'
      ]);
    }
}
